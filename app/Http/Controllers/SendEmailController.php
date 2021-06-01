<?php

namespace App\Http\Controllers;

use App\Buying;
use App\Mail\SendTicketMail;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade as PDF;


class SendEmailController extends Controller
{

    public function send()
    {
        /*$to_name = '';
        $to_email = $email;
        $data = array('name' => "Ticket CINEMAX", "body" => "Test mail");
        Mail::send('emails', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('Artisans Web Testing Mail');
            $message->from('FROM_EMAIL_ADDRESS', 'Artisans Web');
        });*/
        $buying_id = $_POST['buyingId'];
        $to_email = $_POST['email'];
        $buying = Buying::find($buying_id);
        $pdf = PDF::loadView('pdf', compact('buying'));
        $message = new SendTicketMail($buying_id);
        $message->attachData($pdf->output(), "Ticket.pdf");
        Mail::to($to_email)->send($message);
        return $message;
    }
}
