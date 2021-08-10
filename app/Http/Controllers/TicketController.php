<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    public function index(){

        return view('tickets.create');
    }
 
    public function view_pay(){
        $payments = Payment::paginate(10);
        return view ('tickets.index', compact('payments'));
    }
    
}
