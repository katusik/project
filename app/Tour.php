<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $guarded = [];

    public function customer() {
        return $this->belongsToMany('App\Customer', 'customer_tour', 'tour_id', 'customer_id');
    }
}
