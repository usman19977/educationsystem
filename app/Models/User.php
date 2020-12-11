<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasApiTokens, HasFactory, Notifiable, HasRoles, TwoFactorAuthenticatable;
    protected $guard_name = 'backpack';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    public function students()
    {
        return  $this->hasOne('App\Models\Student', 'user_id', 'id');
    }
    public function school()
    {
        return $this->hasOne('App\Models\School', 'user_id', 'id');
    }

    public function admitcards()
    {

        return $this->hasManyThrough(
            'App\Models\AdmitCard',
            'App\Models\Student',
            'user_id',
            'student_id'
        );
    }
    public function carier_requests()
    {
        return $this->hasManyThrough(
            'App\Models\Request',
            'App\Models\Student',
            'user_id',
            'student_id'
        );
    }
}
