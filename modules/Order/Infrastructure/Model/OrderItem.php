<?php

namespace Modules\Order\Infrastructure\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_item';
    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [];

    protected $fillable = [
        'id', 'order_id', 'product_id', 'name', 'quantity'
    ];

}
