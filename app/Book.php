<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function scores() {
        return $this->hasMany('App\Score');
    }

    public function author() {
        return $this->belongsTo('App\Author');
    }
}
