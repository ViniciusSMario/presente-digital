<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gift;
use Illuminate\Http\Request;
use Stripe\StripeClient;

class PaymentController extends Controller
{
    public function checkout(Request $request, Gift $gift)
    {
        $stripe = new StripeClient(env('STRIPE_SECRET_KEY'));

        try {
            $session = $stripe->checkout->sessions->create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'brl',
                        'unit_amount' => $gift->price_cents ?: 1990, // Default R$ 19,90
                        'product_data' => [
                            'name' => 'Presente Digital - ' . ($gift->title ?: 'Sem título'),
                            'description' => 'Presente digital personalizado',
                        ],
                    ],
                    'quantity' => 1
                ]],
                'mode' => 'payment',
                'metadata' => ['gift_id' => $gift->id],
                'success_url' => url('/payment/success?session_id={CHECKOUT_SESSION_ID}&gift_id=' . $gift->id),
                'cancel_url' => url('/payment/cancel?gift_id=' . $gift->id)
            ]);

            return response()->json(['url' => $session->url, 'session_id' => $session->id]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao criar sessão de pagamento: ' . $e->getMessage()], 500);
        }
    }

    public function success(Request $request)
    {
        $sessionId = $request->query('session_id');
        $giftId = $request->query('gift_id');

        if (!$sessionId || !$giftId) {
            return redirect('/#/payment-error');
        }

        try {
            $stripe = new StripeClient(env('STRIPE_SECRET_KEY'));
            $session = $stripe->checkout->sessions->retrieve($sessionId);

            if ($session->payment_status === 'paid') {
                $gift = Gift::findOrFail($giftId);
                $gift->update(['paid' => true]);
                return redirect('/#/payment-success/' . $gift->slug);
            } else {
                return redirect('/#/payment-error');
            }
        } catch (\Exception $e) {
            return redirect('/#/payment-error');
        }
    }

    public function cancel(Request $request)
    {
        $giftId = $request->query('gift_id');
        $gift = $giftId ? Gift::find($giftId) : null;
        return redirect('/#/payment-cancel/' . ($gift ? $gift->slug : ''));
    }
}
