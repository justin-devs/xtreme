<?php

namespace App;

use App\Notifications\EmployeeResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'address', 'cell', 'employeeid', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new EmployeeResetPassword($token));
    }
    public function job()
    {
        return $this->hasMany('App\Job');
    }
    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    public function scopeSearch($query, $s){
        return $query->where('name', 'like', '%' .$s. '%')
            ->orWhere('surname', 'like', '%' .$s. '%');
    }
}
