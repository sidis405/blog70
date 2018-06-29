<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostUpdateEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $post;
    public $recipient;
    public $sender;

    /**
     * Create a new message instance.
     *
     * @param mixed $post
     * @param mixed $recipient
     * @param mixed $sender
     *
     * @return void
     */
    public function __construct($post, $recipient, $sender)
    {
        $this->post = $post;
        $this->recipient = $recipient;
        $this->sender = $sender;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('The post ' . $this->post->title . ' was updated.')
        ->markdown('emails.posts.updated-email');
    }
}
