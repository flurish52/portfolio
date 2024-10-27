<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HireMe extends Model
{
    //

    protected $fillable = ['fullname', 'email', 'telephone', 'message', 'read_status'];
}
