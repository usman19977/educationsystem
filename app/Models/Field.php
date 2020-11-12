<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    protected $fillable = [
        'carier_id',
        'name'
    ];
    public function carier()
    {
        return $this->belongsTo('App\Models\Carier', 'carier_id', 'id');
    }
    public function criterias()
    {
        return $this->hasMany('App\Models\Criteria', 'field_id', 'id');
    }
    public  function subjects()
    {
        return $this->hasManyThrough(
            'App\Models\Subject',
            'App\Models\Criteria',
            'field_id',
            'criteria_id'
        );
    }
}
