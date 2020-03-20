<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passport extends Model
{
    protected $fillable = ['series', 'issue', 'expire'];

    public function customer() {
        return $this->belongsTo('App\Customer');
    }
}
