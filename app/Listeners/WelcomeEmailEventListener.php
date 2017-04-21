<?php

namespace App\Listeners;

use App\Events\WelcomeEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class WelcomeEmailEventListener implements  ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  WelcomeEmail  $event
     * @return void
     */
    public function handle(WelcomeEmail $event)
    {
        $user = $event->user;
        //发送邮件
        Mail::send('emails.welcome',['user'=>$user],function($message) use($user){
            $message->to($user->email);
            $message->subject('Welcome to your Phplib');
        });
    }
}
