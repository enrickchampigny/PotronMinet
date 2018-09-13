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
        'id', 'nom', 'prenom', 'adresse', 'cp', 'ville', 'telephone'
    ];

    /**
     * Get the cats for the FA.
     */
    public function chat()
    {
        return $this->hasMany('App\Chat');
    }
}
