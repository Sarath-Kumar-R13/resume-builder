<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable=['user_id','resume_data','image'];

    protected $casts=['resume_data'=> 'array'];
}
