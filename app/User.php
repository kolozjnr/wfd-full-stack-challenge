<?php

namespace App;

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
        'name', 'email', 'password','status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function referral() {
  
        return $this->hasMany(Referral::class);
     
    }

    public function roles()

    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
    //check Roles
    public function authorizeRoles($roles)

    {
        if ($this->hasAnyRole($roles)) {
        return true;
        }
        abort(401, 'This action is unauthorized.');
    }
    public function hasAnyRole($roles)
    {
    if (is_array($roles)) {
        foreach ($roles as $role) {
            if ($this->hasRole($role)) {
                return true;
            }
        }
    } else {
        if ($this->hasRole($roles)) {
        return true;
        }
    }
    return false;
    }
    public function hasRole($role)
    {
    if ($this->roles()->where('name', $role)->first()) {
        return true;
    }
    return false;
    }

}
