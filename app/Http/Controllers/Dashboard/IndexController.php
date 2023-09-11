<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProfileRequest;
use App\Models\booking;
use App\Models\room;
use App\Models\staff;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function ImageUpload($request){
        $ImageNAME = Carbon::now()->format('Y-m-d-H.i.s') . '.' . $request->extension();
        $request->move(public_path('images/StaffIdentity/'),$ImageNAME);
        return $ImageNAME;
    }

    public function index(){

        $totalBookings = booking::count();
        $totalRooms = room::count();
        $totalCustomers = booking::count();
        $totalStaffs = staff::count();
        $allBookings = booking::with('rooms')->get();

        return view('dashboard.index',compact('totalBookings','totalRooms','totalCustomers','totalStaffs','allBookings'));
    }


    public function profile()
    {
        $userDetails = Auth::user();

        $staffDetails = staff::where('user_id_fk',$userDetails['id'])->first();


        return view('dashboard.profile',compact('userDetails','staffDetails'));
    }

    public function edit(ProfileRequest $request)
    {

        if(isset($request['image'])){
            $request['img']= IndexController::ImageUpload($request['image']);
        }else{
            $request['img'] = $request['temp_img'];
        }
        staff::where('id', $request['id'])->update([
            'userName'=>$request['userName'],
            'birthdate'=>$request['birthdate'],
            'phoneNumber'=>$request['phoneNumber'],
            'gender'=>$request['gender'],
            'country'=>$request['country'],
            'address'=>$request['address'],
        ]);

        User::where('id',$request['user_id'])->update([
            'image'=>$request['img'],
        ]);
        return redirect()->route('dashboard.profile')->with('success', 'تمت تحديث البيانات بنجاح');
    }


    public function userLogout(){

        auth()->logout();
        return redirect()->route('login');

    }

}
