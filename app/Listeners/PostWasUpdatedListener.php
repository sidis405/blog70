<?php

namespace App\Listeners;

use App\User;
use App\Events\PostWasUpdated;

class PostWasUpdatedListener
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
     * @param  PostWasUpdated  $event
     *
     * @return void
     */
    public function handle(PostWasUpdated $event)
    {
        $event->post->load('user');

        // logger($event->post->title . ' was updated');
        //inviare una mail a admin o autore

        // trovare utente admin
        $admin = User::where('role', 'admin')->first();

        // trovare l'autore
        $author = $event->post->user;

        // decidere a chi inviare la mail
        // if (auth()->id() == $author->id) {
        //     $recipient = $admin;
        //     $sender = $author;
        // }

        // if (auth()->id() !== $author->id) {
        //     $recipient = $author;
        //     $sender = $admin;
        // }

        // $recipient = (auth()->id() == $author->id) ? $admin : $author;
        // $sender = (auth()->id() !== $author->id) ? $admin : $author;

        list($recipient, $sender) = (auth()->id() == $author->id) ? [$admin, $author] : [$author, $admin];

        // inviare la mail
    }
}
