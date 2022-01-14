<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'language',
        'type',
        'date',
        'publicationDate',
        'hour',
        'price',
        'url',
        'townName',
        'image',
        'townId',
        'provinceId',
        'checked',
    ];
   


    public function users()
	{
    	return $this->belongsToMany('App\Models\User');
	}

}

