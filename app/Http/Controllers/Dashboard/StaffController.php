<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\staff;
use App\Models\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{


    public function __consturct(){
    $this->middleware('auth');
    }

    public function index(Request $request){

        if($request['StaffID'] != null ){


            $mainStaffs =staff::where('id',$request['StaffID'] )->with('userDetail')->get();

        }elseif( $request['StaffRole'] != null ){


            $mainStaffs =staff::where('role', $request['StaffRole'])->with('userDetail')->get();

        }else{
            $mainStaffs = staff::with('userDetail')->get();

        }
        $tempRole = $request['StaffRole'] == null ?'All' : $request['StaffRole']  ;
        $tempId= $request['StaffID'];

        return view('staffs.index',compact('mainStaffs','tempId','tempRole'));
    }




    public function modify($id){
        $mainStaff = staff::where('id',$id)->get()->first();

        $userDetail = User::where('id',$mainStaff->user_id_fk)->get()->first();


        return view('staffs.edit',compact('mainStaff','userDetail'));
    }


    public function edit(Request $request){

        User::where('id',$request['userId'])->update([
            'name'=>$request['personalName'],

        ]);
        staff::where('user_id_fk',$request['staffId'])->update([
            'userName'=>$request['userName'],
            'role'=>$request['role'],
            'phoneNumber'=>$request['phoneNumber'],
        ]);
        return redirect()->route('staffs.index')->with('success','تم تحديث بيانات الموظف بنجاح');
    }

    public function activate(Request $request){

        User::find($request->id)->update([
            'status'=>'1'
        ]);
        return redirect()->route('staffs.index')->with('success',' تم رفع الحظر عن الحساب بنجاح ');

    }

    public function delete(Request $request){
        User::find($request->id)->update([
            'status'=>'0'
        ]);
        return redirect()->route('staffs.index')->with('error','تم حظر الحساب بنجاح ');
    }

    public function To(Request $request){
        if($request->type == 'user'){
            User::find($request->id)->update([
                'type'=>'admin'
            ]);
            return redirect()->route('staffs.index')->with('success',' تم رفع الحساب الى ادمن  بنجاح ');

        }else{
                User::find($request->id)->update([
                    'type'=>'user'
                ]);
                return redirect()->route('staffs.index')->with('error',' تم أرجاع الحساب الى مستخدم  بنجاح ');
            }

     }



}
