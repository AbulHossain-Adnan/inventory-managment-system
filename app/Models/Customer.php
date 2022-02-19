<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Customer extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'email',
        'phone',
        'address'
    ];
    public function orders(){
         return $this->hasMany(Order::class,'customer_id','id');
    }
}
