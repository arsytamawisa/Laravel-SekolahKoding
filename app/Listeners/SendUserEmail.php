<?php

namespace App\Listeners;

use App\Mail\BlogPosted;
use App\Events\BlogCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendUserEmail
{
    public function __construct()
    {
        //
    }

    public function handle(BlogCreated $event)
    {
         Mail::to('user@gmail.com')->send(new BlogPosted($event->blog));
    }
}
