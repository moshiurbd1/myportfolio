<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable=[
        'image',
        'name',
        'designation',
        'facebook',
        'linkedin',
        'x'
    ];
}
