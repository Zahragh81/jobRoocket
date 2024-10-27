<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Jobs\MonitorPendingOrder;
use App\Models\Order;
use Faker\Provider\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function checkout()
    {
        // validation
        //
        //

        $price = 10000;
        $order = null;

        DB::transaction(function () use (&$order, $price){
            $order = Order::create([
                'user_id' => 3,
                'status' => OrderStatus::PENDING->value,
                'price' => $price
            ]);

            auth()->user()->update([
                'x' => 'y'
            ]);

            Payment::create([]);


        });


        MonitorPendingOrder::dispatch($order)->delay(
            now()->addSeconds(20)
        );
    }
}
