<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Jobs\MonitorPendingOrder;
use App\Jobs\SendWebhook;
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

//        $price = 10000;
//        $order = null;
//
//        DB::transaction(function () use (&$order, $price){
//            $order = Order::create([
//                'user_id' => 3,
//                'status' => OrderStatus::PENDING->value,
//                'price' => $price
//            ]);
//
//            auth()->user()->update([
//                'x' => 'y'
//            ]);
//
//            Payment::create([]);
//
//
//        });
//
//
//        MonitorPendingOrder::dispatch($order)->delay(
//            now()->addSeconds(20)
//        );

        $price = 10000;

        $order = Order::create([
            'user_id' => 3,
            'status' => OrderStatus::PENDING,
            'price' => $price
        ]);

        SendWebhook::dispatch('https://webhook.site/c1f90157-10d7-4c10-ac02', [
            'price' => 1000,
            'name' => 'zahra gholizadeh'
        ]);
    }
}
