<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $fillable = [
        'coursename',
        'coursedescription',
        'courseprise',
        'created_by',
    ];
}
