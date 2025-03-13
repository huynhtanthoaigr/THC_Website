<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use SePay\SePay\Events\SePayWebhookEvent;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Models\Order;

class SePayWebhookListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle($event): void
    {
        try {
            if ($event['transferType'] === 'in') {
                $order = Order::where('id', session('order_id'))->first();
                $order->status = 'processing';
                $order->save();
            } else {

            }
        } catch (\Exception $e) {
            Log::error("Error handling SePay Webhook", ['message' => $e->getMessage()]);
        }
    }
}
