<?php

namespace App\Http\Controllers;

use App\Channels\SmsChannel;
use App\Jobs\SendYaldaPromotionForMailJob;
use App\Jobs\SendYaldaPromotionForSmsJob;
use App\Models\User;
use App\Notifications\YaldaPromotionNotification;
use Illuminate\Http\Request;

class CompainController extends Controller
{
    public function sendCampaign()
    {
        $users = User::all();

        foreach ($users->chunk(20) as $key => $usersGroup){
            foreach ($usersGroup as $user){
                SendYaldaPromotionForMailJob::dispatch($user);
                SendYaldaPromotionForSmsJob::dispatch($user)->onQueue('promotion-sms');
            }
        }


    }
}
