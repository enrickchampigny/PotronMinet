<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','nom', 'ancien_nom','couleur','numero_puce','date_naissance', 'resume', 'famille_id'
    ];

    /**
     * Get the family that takes care of the cat.
     */
    public function family()
    {
        return $this->belongsTo('App\Famille');
    }
}
