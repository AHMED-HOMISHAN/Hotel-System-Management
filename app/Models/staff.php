<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class staff extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable=['id', 'userName', 'birthdate', 'phoneNumber', 'gender', 'joinedDate', 'country', 'address', 'role', 'user_id_fk', 'created_at', 'updated_at', 'deleted_at'];
    protected $table='staffs';

    public function userDetail(){
        return $this->belongsTo(user::class,'user_id_fk');
    }

}
