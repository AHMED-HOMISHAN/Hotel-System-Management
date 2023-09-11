<?php

namespace App\Http\Controllers\Application;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ApiBookingSotreRequest;
use App\Http\Requests\Dashboard\ApiRoomSotreRequest;
use App\Models\booking;
use App\Models\pricing;
use App\Models\room;
use App\Models\staff;
use App\Services\BookingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AppController extends Controller
{


    private $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    // Login

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->where('status','1')->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => 'something is wrong'
            ]);
        }
        return $user->createToken($request->email)->plainTextToken;
    }

    // Logout
    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();
        return 'token is deleted successfully';
    }

    //---------------------------  Rooms ---------------------------------//

    public function roomGetAll()
    {
        return room::with('roomPrice')->get();
    }

    public function getRoomType()
    {
        return pricing::get();
    }

    public function storeRoom(ApiRoomSotreRequest $request)
    {

        return room::create($request->validated());
    }



    //---------------------------  Bookings ---------------------------------//

    public function bookingGetAll()
    {
        return booking::get();
    }

    public function storeBooking(ApiBookingSotreRequest $request)
    {
        $this->bookingService->apiStore($request->validated());
    }

    //---------------------------  Staffs ---------------------------------//


    public function staffGetAll()
    {
        return staff::with('userDetail')->get();
    }
}
