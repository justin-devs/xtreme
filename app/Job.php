<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function employee(){
    	return $this->belongsTo('App\Employee');
    }
    public function vehicle(){
    	return $this->belongsTo('App\Vehicle');
    }
}
