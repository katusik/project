<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{

    public function account() {
        return $this->hasOne('App\Account');
    }

    public function customer() {
        return $this->hasOne('App\Customer');
    }
}
