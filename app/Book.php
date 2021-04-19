<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $fillable = [
      'author_id',
      'title'
    ];

    public function scores() {
        return $this->hasMany('App\Score');
    }

    public function author() {
        return $this->belongsTo('App\Author');
    }
}
