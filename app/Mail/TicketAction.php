<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketAction extends Mailable
{
    use Queueable, SerializesModels;
    public $ticket2;
    public $userTicket2;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ticket2, $userTicket2)
    {
        //
        $this->ticket2 = $ticket2;
        $this->userTicket2 = $userTicket2;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.staff')->with([
            'ticket' => $this->ticket2->id,
            'name' => $this->ticket2->ticketuser->name,
            'name2' => $this->userTicket2->userTicket->name,
        ]);
    }
}
