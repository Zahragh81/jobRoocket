<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\SendVerificationEmailJob;


class RegisterController extends Controller
{
    public function register()
    {
//        $validatedData = $this->validate(request(), [
//           'name' => 'required|min:3',
//           'email' => 'required|email|unique:users,email',
//            'password' => 'required|min:3'
//        ]);

        $validatedData = [
            'name' => 'zahra',
            'email' => 'zahra@gmail.com',
            'password' => '123456789'
        ];

        $user = \App\Models\User::whereEmail('zahra@gmail.com')->first();

        SendVerificationEmailJob::dispatch($user);


        return response()->json([
            'status' => 'success'
        ]);
    }
}
