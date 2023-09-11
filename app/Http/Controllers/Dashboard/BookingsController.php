<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\BookingStoreRequest;
use App\Services\BookingService;


use App\Models\booking;
use App\Models\room;

class BookingsController extends Controller
{
    private $bookingService;


    public function __construct(BookingService $bookingService)
    {
        $this->middleware('auth');
        $this->bookingService = $bookingService;
        $this->bookingService->CheckIfDepatureDateIsExpire();
    }

    public function index(){

        $mainbookings = booking::get();
        return view('bookings.index', compact('mainbookings'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingStoreRequest $request)
    {
        $boolean = $this->bookingService->store($request->validated());

        if($boolean == false){
            return redirect()->route('bookings.add')->with('error',"$request->roomNumber  لايوجد غرفه متاحه من نوع");
        }else{
            return redirect()->route('bookings.index')->with('success', 'تمت الاضافة بنجاح');
        }
    }



    public function modify($id)
    {
        $mainbookings = booking::find($id);
        $rooms = room::find($mainbookings['roomNumber']);
        if ($mainbookings) {
            return view('bookings.edit', compact('mainbookings','rooms'));
        }
        return redirect()->route('bookings.index');
    }



    public function edit(BookingStoreRequest $request)
    {
        $this->bookingService->update($request->id,$request->validated());
        return redirect()->route('bookings.index')->with('success', 'تمت تحديث البيانات بنجاح');

    }

    public function delete(Request $request)
    {
        booking::find($request->id)->update(
            [
                'Status'=>'0'
            ]
        );
        return redirect()->route('bookings.index')->with('error', 'تمت الغاء الحجز بنجاح');
    }


    public function addBooking(){
        return view('bookings.add');
    }

    public function editBooking(){
        return view('bookings.edit');
    }


}
