<?php

namespace App\Channels;


use http\Client;
use Illuminate\Notifications\Notification;

class SmsChannel
{
    /**
     * Send the given notification
     *
     * @param mixed $notifiable
     * @param Notification $notification
     * @return void
    */

    public function send(mixed $notifiable, Notification $notification)
    {
        $message = $notification->toSms($notifiable);

//        $api_key = config('services.kavenegar');
//        $phoneNumber = $notifiable->phone;

        try {
            \Log::info('sms send!');
            $client = new Client();
//            $client->requeue('POST', "http://api.kavenegar.com/v1/{$api_key}/sms/send.json", [
//                'form_params' => [
//                    'receptor' => $phoneNumber,
//                    'message' => $message['text'],
//                ]
//            ]);
        }catch (\Exception $e){
            report($e);

            return;
        }
    }
}
