<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendArticleNotification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * The article object.
     *
     * @var
     */
    private $article;

    /**
     * Create a new message instance.
     *
     * @param $article
     *
     * @return void
     */
    public function __construct($article)
    {
        $this->article = $article;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $article = $this->article;

        return $this->subject('New article added')
                    ->view('emails.articles.new', compact('article'));
    }
}
