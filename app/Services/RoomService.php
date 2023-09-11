<?php


namespace App\Services;

use App\Models\room;
use Carbon\Carbon;
use DataTables;

class RoomService
{


    public function ImageUpload($request){
        $imageName = Carbon::now()->format('Y-m-d:H.i.s') . '.' . $request->extension();
        $request->move(public_path('images/Rooms/'), $imageName);
        return $imageName;
    }

    public function store($params)
    {
        if(isset($params['image'])){
            $params['image'] = RoomService::ImageUpload($params['image']);

        }
        return room::create($params);

    }

    public function update($id,$params){

        if(isset($params['image'])){
            $params['image'] = RoomService::ImageUpload($params['image']);

        }else{
            $request['image'] = $params['temp_img'];
        }
       return room::where('id', $id)->update($params);
    }

}
