<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\booking;
use Illuminate\Http\Request;

class CustomersController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $maincustomers =booking::get();
        return view('customers.index',compact('maincustomers'));
    }
}
