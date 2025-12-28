<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use Illuminate\Http\Request;
use Stripe\Webhook;
use Stripe\Exception\SignatureVerificationException;

class WebhookController extends Controller
{
    public function handleStripeWebhook(Request $request)
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $webhookSecret = env('STRIPE_WEBHOOK_SECRET');

        try {
            $event = Webhook::constructEvent($payload, $sigHeader, $webhookSecret);
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            return response()->json(['error' => 'Invalid payload'], 400);
        } catch (SignatureVerificationException $e) {
            // Invalid signature
            return response()->json(['error' => 'Invalid signature'], 400);
        }

        // Handle the event
        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;
                
                // Get gift_id from metadata
                $giftId = $session->metadata->gift_id ?? null;
                
                if ($giftId && $session->payment_status === 'paid') {
                    $gift = Gift::find($giftId);
                    if ($gift) {
                        $gift->update([
                            'paid' => true,
                            'is_paid' => true
                        ]);
                    }
                }
                break;

            case 'payment_intent.succeeded':
            case 'charge.succeeded':
                // Optional: Log or handle these events
                \Log::info('Stripe event: ' . $event->type, ['event_id' => $event->id]);
                break;

            default:
                \Log::info('Unhandled Stripe event: ' . $event->type);
        }

        return response()->json(['status' => 'success']);
    }
}
