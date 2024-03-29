<?php

namespace App\Http\Controllers;

use Chapa\Chapa\Facades\Chapa as Chapa;
use Illuminate\Http\Request;

class ChapaController extends Controller
{
    /**
     * Initialize Rave payment process
     * @return void
     */
    protected $reference;

    public function __construct(){
        $this->reference = Chapa::generateReference();
    }

    public function initialize()
    {
        //This generates a payment reference
        $reference = $this->reference;
        

        // Enter the details of the payment
        $data = [
            
            'amount' => 10,
            'email' => 'abrish.d143t@gmail.com.com',
            'tx_ref' => $reference,
            'currency' => "ETB",
            // 'callback_url' => route('callback',[$reference]),
            'first_name' => "Abraham",
            'last_name' => "Dulla",
            "customization" => [
                "title" => 'Chapa ',
                "description" => "I amma testing this"
            ]
        ];
        

        $payment = Chapa::initializePayment($data);
        
        // return $payment;


        if ($payment['status'] !== 'success') {
            return response()->json(['error' => 'Something went wrong'], 400);
        }
        

        return response()->json($payment['data']['checkout_url']);
        
        // return redirect($payment['data']['https://api.chapa.co/v1/transaction/initialize']);
    }

    

    public function callback($reference)
    {
        
        $data = Chapa::verifyTransaction($reference);
        dd($data);

        //if payment is successful
        if ($data['status'] ==  'success') {
        dd($data);
        }

        else{
            //oopsie something ain't right.
        }


    }
    
}