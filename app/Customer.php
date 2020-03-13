<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];

    public function gender() {
        return $this->belongsTo('App\Gender', 'gender_id', 'id');
    }
}
