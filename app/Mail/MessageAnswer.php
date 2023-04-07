<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageAnswer extends Mailable
{
    use Queueable, SerializesModels;

    public $answer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($answer)
    {
        $this->answer = $answer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.message', [
            'answer' => $this->answer,
        ]);
    }
}
