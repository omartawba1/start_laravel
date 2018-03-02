<?php

namespace App\Listeners;

use Mail;
use App\Models\User;
use App\Events\ArticleCreated;
use App\Mail\SendArticleNotification;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyUsers implements ShouldQueue
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
     * @param  ArticleCreated $event
     *
     * @return void
     */
    public function handle(ArticleCreated $event)
    {
        $emails = User::pluck('email')->toArray();

        Mail::to(config('mail.from.address'))
            ->bcc($emails)
            ->send(new SendArticleNotification($event->article));
    }
}
