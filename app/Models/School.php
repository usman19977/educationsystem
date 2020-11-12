<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at', 'status'];
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    // public static function boot()
    // {
    //     parent::boot();
    //     self::creating(function ($school) {
    //         dd('FROM BOOT METHOD', $school);
    //     });
    //     // static::created(function ($school) {
    //     //     dd('FROM BOOT METHOD', $school);
    //     // });
    // }
    public function managers()
    {
        return $this->hasMany('App\Models\SchoolManager', 'school_id', 'id');
    }
    public function manager_user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function students()
    {
        return $this->hasMany('App\Models\Student', 'school_id', 'id');
    }
    public function requests()
    {
        return $this->hasMany('App\Models\Request', 'school_id', 'id');
    }
    public function admitcards()
    {
        return $this->hasManyThrough(
            'App\Models\Admitcard',
            'App\Models\Student',
            'id',
            'student_id',
        );
    }
}
