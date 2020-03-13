<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['avatar', 'last_name', 'gender_id', 'birthday', 'phone'];


    public function user() {
        return $this->belongsTo('App\User');
    }

    public function gender() {
        return $this->belongsTo('App\Gender', 'gender_id', 'id');
    }




}
