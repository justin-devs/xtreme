<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Vehicle extends Model
{
    public function Customer(){
    	return $this->belongsTo('App\Customer');
    }
    public function scopeSearch($query, $s){
        return $query->where('make', 'like', '%' .$s. '%')
            ->orWhere('model', 'like', '%' .$s. '%');
    }
}
