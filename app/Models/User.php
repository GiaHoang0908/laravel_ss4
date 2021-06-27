<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
       
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hasPermission($route)
    {
        $routes = $this->routes();
        return in_array($route, $routes) ? true : false;
    }

    public function routes()
    {
        $data = [];
        foreach($this->getRoles as $role)
        {
            $permissions = json_decode($role->permission);
            foreach($permissions as $per)
                if(!in_array($per, $data))
                    array_push($data, $per);
            
        }
        //array_push($data, 'admin.dashboard');
        return $data;
    }

    public function getRoles()
    {
        return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role_id');
    }

    public function salesinvoices()
    {
        return $this->hasMany(SalesInvoice::class, 'user_id', 'id');
    }
}
