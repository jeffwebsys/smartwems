<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketRequested extends Mailable
{
    use Queueable, SerializesModels;
    public $history;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($history)
    {
        //
        $this->history = $history;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.notify')->with([

            'remarks' => $this->history->description,
            'status' => $this->history->status,

        ]);
    }
}
