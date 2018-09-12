<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Famille extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id'
    ];

    /**
     * Get the cats for the FA.
     */
    public function cats()
    {
        return $this->hasMany('App\Chat');
    }
}
