<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */    protected $fillable = ['name', 'email', 'password', 'role_id'];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relationship to the Role model.
     */
   

    /**
     * Relationship to the Profile model.
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Relationship to the Review model.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
