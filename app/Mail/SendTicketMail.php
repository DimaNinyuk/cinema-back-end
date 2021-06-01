<?php

namespace App\Mail;

use App\Buying;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade as PDF;
class SendTicketMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $buying_id;
    public function __construct($buying_id)
    {
        //
        $this->buying_id=$buying_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $buying = Buying::find($this->buying_id);
        return $this->subject('Tickets CinemaX')->from('cinemaxcinematicket@gmail.com','CinemaX')->view('pdf',compact('buying'));
        
    }
}
