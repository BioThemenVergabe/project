<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user','workgroup','rating',
    ];

    /**
     * Returns all Ratings for given User.
     *
     * @param integer $id
     * @return Rating
     */
    public static function findByUser($id) {
        return Rating::where('user','=',$id)->get();
    }

    /**
     * Returns all Ratings for given Workgroup.
     *
     * @param $id
     * @return Rating
     */
    public static function findByWorkgroup($id) {
        return Rating::where('workgroup','=',$id)->get();
    }

}
