<?php

namespace App\Http\Controllers;

use KingFlamez\Rave\Facades\Rave as Flutterwave;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;



class FlutterwaveController extends Controller
{
    
     /**
     * Initialize Rave payment process
     * @return void
     */
    public function initialize()
    {
    
        
        //This generates a payment reference
        $reference = Flutterwave::generateReference();

        // Enter the details of the payment
        $data = [
            'payment_options' => 'card,banktransfer',
            'amount' => request()->pieces *50,
            'email' => request()->email,
            'tx_ref' => $reference,
            'currency' => "KES",
            'redirect_url' => route('callback'),
            'customer' => [
                'email' => request()->email,
                "phone_number" => request()->phone,
                "name" => request()->name
            ],

            "customizations" => [
                "title" => 'Laundry Ticket',
                "description" => "20th October"
            ]
        ];

        {{$data =(object)$data;}};
        $payment = Payment::create([
            'email' =>$data->email,
            'tx_ref' =>$data->tx_ref,
            'amount'=>$data->amount,
        ]);

        {{$data =(array)$data;}};

        $payment = Flutterwave::initializePayment($data);


        if ($payment['status'] !== 'success') {
            // notify something went wrong
            return;
        }

        return redirect($payment['data']['link']);
    }

    
    
    /**
     * Obtain Rave callback information
     * @return void
     */
    public function callback()
    {
        
        $status = request()->status;

        //if payment is successful
        if ($status ==  'successful') {
        
        $transactionID = Flutterwave::getTransactionIDFromCallback();
        $data = Flutterwave::verifyTransaction($transactionID); 
        
        
        //{{$data =(object)$data;}};
        //return view('tickets.pay', compact('data'));
        //dd($data);

        }
        elseif ($status ==  'cancelled'){
            //Put desired action/code after transaction has been cancelled here
        }
        else{

            //Put desired action/code after transaction has failed here
        }

        return redirect()->route('dashboard.index')->with('success', 'payment done succefuly');
        // Get the transaction from your DB using the transaction reference (txref)
        // Check if you have previously given value for the transaction. If you have, redirect to your successpage else, continue
        // Confirm that the currency on your db transaction is equal to the returned currency
        // Confirm that the db transaction amount is equal to the returned amount
        // Update the db transaction record (including parameters that didn't exist before the transaction is completed. for audit purpose)
        // Give value for the transaction
        // Update the transaction to note that you have given value for the transaction
        // You can also redirect to your success page from here

    }


    public function webhook(Request $request)
    {
      //This verifies the webhook is sent from Flutterwave
      $verified = Flutterwave::verifyWebhook();
  
      // if it is a charge event, verify and confirm it is a successful transaction
      if ($verified && $request->event == 'charge.completed' && $request->data->status == 'successful') {
          $verificationData = Flutterwave::verifyPayment($request->data['id']);
          if ($verificationData['status'] === 'success') {
          // process for successful charge
  
          }
  
      }
  
      // if it is a transfer event, verify and confirm it is a successful transfer
      if ($verified && $request->event == 'transfer.completed') {
  
          $transfer = Flutterwave::transfers()->fetch($request->data['id']);
  
          if($transfer['data']['status'] === 'SUCCESSFUL') {
              // update transfer status to successful in your db
          } else if ($transfer['data']['status'] === 'FAILED') {
              // update transfer status to failed in your db
              // revert customer balance back
          } else if ($transfer['data']['status'] === 'PENDING') {
              // update transfer status to pending in your db
          }
  
      }
    }





}
