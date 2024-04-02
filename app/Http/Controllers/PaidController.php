<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaidController extends Controller
{
    public function payu(Request $request){
        $merchant_id = $request->merchantId;
        $reference_sale = $request->reference_sale;
        $value = $request->value;
        $new_value = number_format($value, 1, '.', '');
        $currency = $request->currency;
        $state_pol = $request->state_pol;

        $signature = md5(config('services.payu.api_key') . '~' . $merchant_id . '~' . $reference_sale . '~' . $new_value . '~' . $currency . '~' . $state_pol);

        if ($signature == $request->sign) {
            if($state_pol == 4) {
                
            } 
        }
    }
}
