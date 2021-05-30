<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\LiqPay;
class PaymentController extends Controller
{
    public function format($info)
    {
        $public_key="sandbox_i76042470490";
        $private_key="sandbox_s17fLzvnXhVj0ePaM3pCdDLkqTRqTAOfpXKDtZYc";
        $liqpay = new LiqPay($public_key, $private_key);
        $html = $liqpay->cnb_form(array(
            'action'         => 'pay',
            'amount'         => $info,
            'currency'       => 'USD',
            'description'    => 'description text',
            'order_id'       => 'order_id_1',
            'version'        => '3'
            ));
       //$array = array('public_key'=>'i00000000','version'=>3,'action'=>'pay','amount'=>3,'currency'=>'UAH','description'=>'test','order_id'=>'000001');
       //$json_string = "{'public_key':'i00000000','version':'3','action':'pay','amount':'3','currency':'UAH','description':'test','order_id':'000001'}"; 
       //$json_string = json_encode($array);
       
      // $data =base64_encode($json_string);
      // $private_key.$data + private_key
     // $link="https://www.liqpay.ua/api/3/checkout?data=eyJwdWJsaWNfa2V5IjoiaTAwMDAwMDAwIiwidmVyc2lvbiI6IjMiLCJhY3Rpb24iOiJwYXkiLCJhbW91bnQiOiIzIiwiY3VycmVuY3kiOiJVQUgiLCJkZXNjcmlwdGlvbiI6InRlc3QiLCJvcmRlcl9pZCI6IjAwMDAwMSJ9&signature=GDTANBZLfJKKraEtqUTfiCzOp2I=";
       return $html;
        //https://www.liqpay.ua/api/3/checkout
    }
    
}
