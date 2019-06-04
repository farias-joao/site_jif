<?php

namespace App;

use App\Models\Permission;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function teams()
    {
        return $this->hasMany('App\Team');
    }

    public function notices()
    {
        return $this->hasMany('App\Notice');
    }

    public function typeuser()
    {
        return $this->belongsTo('App\TypeUser');
    }

    public function comments()
    {
        return $this->hasManyThrough('App\Comment', 'App\Notice');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'role_users', 'user_id', 'role_id');
        /*$this->belongsToMany('relacao',
            'nome da tabela pivot',
            'key ref. model classe atual',
            'key ref. outro model classe relação');*/
    }

    public function hasPermission(Permission $permission)
    {
        return $this->hasAnyRoles($permission->roles);
    }

    public function hasAnyRoles($roles)
    {
        if (is_array($roles) || is_object($roles)) {
                return !! $roles->intersect($this->roles)->count();
        }

        return false;
    }
}
