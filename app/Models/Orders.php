<?php

namespace App\Models;

use App\Models\OrderDetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'deliveryInformation_date',
        'total_amount',
        'status',
        'payment_method',

    ];
    public function orderdetails()
    {
        return $this->hasMany(OrderDetails::class);
    }
}
