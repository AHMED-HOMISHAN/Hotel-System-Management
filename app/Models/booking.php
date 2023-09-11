<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class booking extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = ['id', 'roomNumber', 'staffName', 'personalName', 'totalMembers', 'arrivalDate', 'depatureDate', 'email', 'phoneNumber', 'message', 'image', 'paied', 'Status', 'created_at', 'updated_at', 'deleted_at'];
    protected $table= 'bookings';

    public function rooms(){
        return $this->belongsTo(room::class,'roomNumber');
    }
    public function staff(){
        return $this->HasMany(staff::class,'staffName');
    }
}
