<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Main extends Model
{
    protected $fillable=[
        'title',
        'sub_title',
        'bg_image',
        'resume'
    ];
}
