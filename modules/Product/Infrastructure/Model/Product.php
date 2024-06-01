<?php

namespace Modules\Product\Infrastructure\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [];

}
