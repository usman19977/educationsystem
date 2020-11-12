<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at', 'status'];

    public function criteria()
    {
        return $this->belongsTo('App\Models\Criteria', 'criteria_id', 'id');
    }
    public function shift()
    {
        return $this->belongsTo('App\Models\Shift', 'shift_id', 'id');
    }
    public function school()
    {
        return $this->belongsTo('App\Models\School', 'school_id', 'id');
    }
    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id', 'id');
    }

    public function subjects()
    {
        return $this->belongsToMany(
            'App\Models\Subject',
            'request_subject',
            'request_id',
            'subject_id'
        )->withTimestamps();
    }
    public function admitcard()
    {
        return $this->hasOne('App\Models\AdmitCard', 'request_id', 'id');
    }
}
