<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
    protected $table = 'orders'; 
    protected $fillable =
    [
        'user_id',
        'fname',
        'lname',
        'email',
        'phone',
        'address1',
        'address2',
        'city',
        'state',
        'country',
        'pincode',
        'status',
        'message',
        'tracking_no',
    ];

    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
