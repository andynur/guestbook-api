<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Congrat extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $hidden = ['created_at', 'updated_at'];
}
