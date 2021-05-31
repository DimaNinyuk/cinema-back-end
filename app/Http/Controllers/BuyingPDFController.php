<?php

namespace App\Http\Controllers;

use App\Buying;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class BuyingPDFController extends Controller
{
    //
    public function downloadPDF($id) {
        $buying = Buying::find($id);
        $pdf = PDF::loadView('pdf', compact('buying'));
        return $pdf->download('ticket.pdf');
}
}