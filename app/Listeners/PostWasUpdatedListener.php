<?php

namespace App\Listeners;

use App\User;
use App\Events\PostWasUpdated;
use App\Jobs\SendPostUpdateEmail;

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

        $admin = User::where('role', 'admin')->first();

        $author = $event->post->user;

        list($recipient, $sender) = (auth()->id() == $author->id) ? [$admin, $author] : [$author, $admin];

        SendPostUpdateEmail::dispatch($event->post, $recipient, $sender);
    }
}
