<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','sexe','nom', 'ancien_nom','couleur','numero_puce','date_naissance', 'resume','info_potron', 'famille_id', 'deleted_at'
    ];

    /**
     * Get the family that takes care of the cat.
     */
    public function famille()
    {
        return $this->belongsTo('App\Famille');
    }

    public function photo()
    {
        return $this->hasMany('App\Photo');
    }
}
