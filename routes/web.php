<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\WebhookController;

Route::get('/', function () {
    return view('app');
});

Route::get('/create', function () {
    return view('app');
});

Route::get('/gifts/{slug}', function () {
    return view('app');
});

// Payment callback routes
Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/payment/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');

// Stripe Webhook
Route::post('/webhook/stripe', [WebhookController::class, 'handleStripeWebhook'])->name('webhook.stripe');
