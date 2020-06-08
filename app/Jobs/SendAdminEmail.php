<?php

namespace App\Jobs;

use App\Models\Blog;
use App\Mail\BlogPosted;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendAdminEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $blog;

    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    public function handle()
    {
        Mail::to('admin@gmail.com')->send(new BlogPosted($this->blog));
    }
}
