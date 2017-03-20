<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendArticleNotification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    
    /**
     * The article object
     *
     * @var $article
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
        
        return $this->view('emails.articles.new', compact('article'));
    }
}
