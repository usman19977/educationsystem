<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable = ['criteria_id',
        'name'
    ];
    public function criteria(){
        return $this->belongsTo('App\Models\Criteria','criteria_id','id');
    }
    public function requests(){
        return $this->belongsToMany('App\Models\Request','request_subject','subject_id',
            'request_id')->withTimestamps();
    }
}
