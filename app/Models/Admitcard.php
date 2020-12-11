<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admitcard extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function request()
    {
        return $this->belongsTo('App\Models\Request', 'request_id', 'id');
    }


    // public function getImageAttribute($value)
    // {
    //     return 'http://127.0.0.1:8000/' . $value;
    // }
    public function getDateOfBirthAttribute($value)
    {

        return date('d-m-Y', strtotime($value));
    }
}
