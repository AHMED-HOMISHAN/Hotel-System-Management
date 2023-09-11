<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pricing;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = pricing::get();
        return view('home',compact('data'));
    }

    public function add()
    {
        return view('pricing.add');
    }
    public function store(Request $request)
    {
      pricing::create([
        'roomType'=>$request['roomType'],
        'price'=>$request['price'],
        'freeBreakfast'=>$request['freeBreakfast'] == 'on' ?'1':'0',
        'freeWifi'=>$request['freeWifi']  == 'on'?'1':'0',
        'laundry'=>$request['laundry'] == 'on'?'1':'0',
        'Parking'=>$request['parking'] == 'on'?'1':'0',
        'airConditioning'=>$request['airConditioning'] == 'on'?'1':'0',
      ]);
      return redirect()->route('home.index')->with('success','تمت اضافه السعر بنجاح');
    }

}
