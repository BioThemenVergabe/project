<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Welcome extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'de', 'en',
    ];
}
