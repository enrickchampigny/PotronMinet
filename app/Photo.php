<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'chemin', 'chat_id'
    ];

    /**
     * Get the family that takes care of the cat.
     */
    public function chat()
    {
        return $this->belongsTo('App\Chat');
    }
}
