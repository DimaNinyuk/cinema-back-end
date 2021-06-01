<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Mail;


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
        $email = $_POST['email'];
        $buying_id =$_POST['buying_id'];
        $to_name = "";
        $to_email = $email;

        $data = array('name' => "CinemaX", "body" => "Test mail");
        Mail::send('emails', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('Artisans Web Testing Mail');
            $message->from('FROM_EMAIL_ADDRESS', 'Artisans Web');
        });
        return $email;
    }
}
