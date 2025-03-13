<?php

namespace App\Listeners;

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
                $orderId = substr($event['code'], 3);
                $order = Order::where('id', $orderId)->first();
                if ($order) {
                    $order->status = 'processing';
                    $order->save();
                } else {
                    Log::error("Order not found", ['order_id' => $orderId]);
                }
            } else {
                // Handle other transfer types if necessary
            }
        } catch (\Exception $e) {
            Log::error("Error handling SePay Webhook", ['message' => $e->getMessage()]);
        }
    }
}
