<?php

namespace App\Listeners;

use App\Events\VideoUploadedEvent;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\contract\Mailer;
use Illuminate\Support\Facades\Mail;

class VideoUploadedListener
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
     * @param  VideoUploadedEvent  $event
     * @return void
     */
    public function handle(VideoUploadedEvent $event)
    {
        $data = array('name' => $event->userEmail->name, 'email' => $event->userEmail->email, 'body' => 'Welcome to our website. Hope you will enjoy our articles');
 
        Mail::send('mail', $data, function($message) use ($data) {
            $message->to($data['email'])
                    ->subject('Welcome to our Website');          
                             
        });
    }
}
