<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\RoomStoreRequest;
use App\Models\pricing;
use App\Services\RoomService;
use Illuminate\Http\Request;

use App\Models\room;


class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $roomService;


    public function __construct(RoomService $roomService)
    {
        $this->middleware('auth');
        $this->roomService = $roomService;
    }

    public function index()
    {
        $mainrooms = room::with('roomPrice')->get();

        return view('rooms.index', compact('mainrooms'));
    }

    public function addRooms()
    {
        $mainRoomType = pricing::get();
        return view('rooms.add',compact('mainRoomType'));
    }

    public function modify($id)
    {
        $mainrooms = room::find($id);
        if ($mainrooms) {
            return view('rooms.edit', compact('mainrooms'));
        }
        return redirect()->route('rooms.index');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomStoreRequest $request)
    {
        $this->roomService->store($request->validated());
        return redirect()->route('rooms.index')->with('success', 'تمت الاضافة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomStoreRequest $request)
    {
        $this->roomService->update($request->id,$request->validated());
        return redirect()->route('rooms.index')->with('success', 'تمت تحديث البيانات بنجاح');
    }

    public function delete(Request $request)
    {
        room::find($request->id)->update([
            'status'=>'0',
            'AC'=>'0',
        ]);
        return redirect()->route('rooms.index')->with('error', 'تمت اغلاق الغرفه بنجاح');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
