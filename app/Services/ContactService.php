<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;

class ContactService
{
    public function sendMail(array $data): void
    {
        Mail::raw($data['message'], function ($mail) use ($data) {
            $mail->to('vite-gourmand@gmail.com')
                 ->subject($data['subject'])
                 ->from($data['email'], $data['name']);
        });
    }
}
