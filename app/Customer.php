<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{
	public function scopeSearch($query, $s){
        return $query->where('name', 'like', '%' .$s. '%')
            ->orWhere('surname', 'like', '%' .$s. '%')
            ->orWhere('email', 'like', '%' .$s. '%')
            ->orWhere('cell', 'like', '%' .$s. '%');
    }
	
    public function Vehicles(){
    	return $this->hasMany('App\Vehicle');
    }
}