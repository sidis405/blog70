<?php

namespace App\Jobs;

use App\Post;
use App\User;
use App\Mail\PostUpdateEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendPostUpdateEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $post;
    protected $recipient;
    protected $sender;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Post $post, User $recipient, User $sender)
    {
        $this->post = $post;
        $this->recipient = $recipient;
        $this->sender = $sender;
    }

    //aggiornato il record
    //emesso evento
    //trovato listener
    //emesso il job
    //inviato la mail

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->recipient)->send(new PostUpdateEmail($this->post, $this->recipient, $this->sender));
    }
}
