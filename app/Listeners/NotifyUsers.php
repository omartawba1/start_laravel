<?php

namespace App\Listeners;

use App\Events\ArticleCreated;
use App\Mail\SendArticleNotification;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

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
