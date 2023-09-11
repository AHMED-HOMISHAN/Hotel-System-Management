<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class room extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = ['id', 'roomType', 'AC', 'Food', 'BedCount', 'cancellation',  'PhoneNumber', 'image','status', 'message', 'created_at', 'updated_at',];
    protected $table= 'rooms';

    public function roomPrice(){
        return $this->belongsTo(pricing::class,'roomType');
    }
    public function bookings(){
        return $this->Hasone(booking::class,'roomNumber');
    }
}
