<?php

namespace Modules\User\Infrastructure\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'user';
    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [];

}
