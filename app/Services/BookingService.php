<?php


namespace App\Services;

use App\Models\booking;
use App\Models\pricing;
use App\Models\room;
use App\Models\staff;
use Carbon\Carbon;
use DataTables;

class BookingService
{


    public function ImageUpload($request)
    {
        $imageName = Carbon::now()->format('Y-m-d:H.i.s'). '.' . $request->extension();
        $request->move(public_path('images/PersonalIdentity/'), $imageName);
        return $imageName;
    }

    public function store($params)
    {
        if (isset($params['image'])) {
            $params['image'] = BookingService::ImageUpload($params['image']);
        }else{
            $request['image'] = $params['temp_img'];
        }
        $roomNumber = pricing::where('roomType', $params['roomNumber'])->first();

    $roomType =  room::where('roomType',$roomNumber['id'])->where('AC','0')->where('status','1')->first();

        if ($roomType) {
            $roomType['AC'] = 1;
            $params['staffName'] = staff::where('user_id_fk',auth()->user()->id)->get(['id'])->first();
            $params['staffName'] = $params['staffName'] ->id;
            $params['roomNumber'] = $roomType['id'];
            booking::create($params);
            return room::where('id', $roomType['id'])->update([
                'AC' => $roomType['AC'],
            ]);
        }
        return false;
    }

    public function update($id, $params)
    {

        if (isset($params['image'])) {
            $params['image'] = BookingService::ImageUpload($params['image']);
        }
        return booking::where('id', $id)->update($params);
    }

    public function apiStore($params)
    {
        $roomNumber = pricing::where('roomType', $params['roomNumber'])->first();

        $roomType =  room::where('roomType',$roomNumber['id'])->where('AC','0')->where('status','1')->first();

            if ($roomType) {
                $roomType['AC'] = 1;
                $params['staffName'] = staff::where('user_id_fk',auth()->user()->id)->get(['id'])->first();
                $params['staffName'] = $params['staffName'] ->id;
                $params['roomNumber'] = $roomType['id'];
                booking::create($params);
                return room::where('id', $roomType['id'])->update([
                    'AC' => $roomType['AC'],
                ]);
        }
        return false;
    }


    public function CheckIfDepatureDateIsExpire()
    {
        $checkIfDepatureDateIsExpire = booking::whereDate('depatureDate', '<', Carbon::now()->format('Y-m-d'))->get();

        if ($checkIfDepatureDateIsExpire != null) {
            foreach ($checkIfDepatureDateIsExpire as $temp) {
                room::where('id', $temp->roomNumber)->update([
                    'AC' => '0',
                ]);
            }
            return true;
        } else {
            return false;
        }
    }
}
