<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\LiqPay;
use App\Buying;
use App\BuyingSeat;
class PaymentController extends Controller
{
    public function format(Request $request)
    {
      $b=Buying::create([
            'session_id'=>(int)($request['session_id']),
            'sum'=>$request['sum'],
        ]);
          for($i=0;$i<(int)count($request['seats']);$i++)
      {
        BuyingSeat::create([
          'seat_id'=>(int)($request['seats'][$i]['id']),
          'buying_id'=>$b->id,
        ]);
      }
        $public_key="sandbox_i76042470490";
        $private_key="sandbox_s17fLzvnXhVj0ePaM3pCdDLkqTRqTAOfpXKDtZYc";
        $liqpay = new LiqPay($public_key, $private_key);
        $html = $liqpay->cnb_form(array(
            'action'         => 'pay',
            'amount'         => '1',
            'currency'       => 'UAH',
            'description'    => 'description text',
            'order_id'       => $b->id,
            'version'        => '3',
            'server_url'     =>'http://localhost:8000/api/callback-payment',
            'result_url'     =>'http://localhost:3000/order-detail/'.$b->id,
            ));
      return $html;
     

    }
    
}
