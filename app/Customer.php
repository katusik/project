<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'last_name', 'patronymic', 'gender_id', 'birthday', 'email', 'phone', 'address', 'comment'];

    public function gender() {
        return $this->belongsTo('App\Gender', 'gender_id', 'id');
    }

    public function passport() {
        return $this->hasOne('App\Passport');
    }

    public function tour() {
        return $this->belongsToMany('App\Tour', 'customer_tour', 'customer_id', 'tour_id');
    }
}
