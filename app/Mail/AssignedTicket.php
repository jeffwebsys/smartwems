<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AssignedTicket extends Mailable
{
    use Queueable, SerializesModels;
    public $ticket2;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ticket2)
    {
        //
        $this->ticket2 = $ticket2;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      
        return $this->markdown('emails.assign')->with([
            'ticket' => $this->ticket2->id
        ]);

    }
}
