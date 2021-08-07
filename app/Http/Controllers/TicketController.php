<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(){

        return view('tickets.create');
    }

   /* public function pay(Request $request){
        
        $data = $request->input();
        $data = (object)$data;
        $data->total = $data->pieces *100;

        return view('tickets.pay', compact('data'));
    }
    */
    
}
