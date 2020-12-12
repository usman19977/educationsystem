<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    //    public function save(array $options = array()) {
    //        dd($this);
    //
    //    }
    protected $fillable = [
        'to',
        'from',
        'name'
    ];
    protected $casts = [
        'from' => 'datetime',
        'to' => 'datetime',

    ];
    public function requests()
    {
        return $this->hasMany('App\Models\Request', 'shift_id', 'id');
    }

    public function getFromAttribute($value)
    {

        return date('H:i A', strtotime($value));
    }
    public function getToAttribute($value)
    {

        return date('H:i A', strtotime($value));
    }
}
