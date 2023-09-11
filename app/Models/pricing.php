<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class pricing extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = ['id', 'roomType', 'price', 'freeBreakfast', 'freeWifi', 'airConditioning', 'laundry', 'Parking', 'created_at', 'updated_at'];
    protected $table= 'pricing';

}
