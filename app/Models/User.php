<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'email', 'last_name','role_id', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','created_at'
    ];

    protected $appends = ['name'];

    public function role()
    {
        return $this->belongsTo(Role::class,'role_id'); //how does it relates to id of role
    }

    public function getNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function createToken()
    {
        $this->auth_token = md5($this->email . time(). str_random(8));
    }

    public function scopeWithToken($query, $token)
    {
        return $query->where('auth_token', $token)->whereNotNull('auth_token');
    }
}
