<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    protected $fillable = [
        'field_id',
        'name'
    ];

    public function field()
    {
        return $this->belongsTo('App\Models\Field', 'field_id', 'id');
    }
    public function subjects()
    {
        return $this->hasMany('App\Models\Subject', 'criteria_id', 'id');
    }
    public function requests()
    {
        return $this->hasMany('App\Models\Request', 'criteria_id', 'id');
    }
    public function students()
    {
        return $this->hasManyThrough(
            'App\Models\Student',
            'App\Models\RequestUserPivot',
            'student_id', // through ki foreng key
            'id', // related ki foreng key

        );
    }
}
