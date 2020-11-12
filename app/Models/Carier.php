<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carier extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function fields()
    {
        return $this->hasMany(
            'App\Models\Field',
            'carier_id',
            'id'
        );
    }
    public function criterias()
    {
        return $this->hasManyThrough(
            'App\Models\Criteria',
            'App\Models\Field',
            'carier_id',
            'field_id',
            'id',
            'id'
        );
    }
    // public static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function ($schoolmanager) { // before delete() method call this
    //         $schoolmanager->fields()->delete();
    //         $schoolmanager->criterias()->delete();




    //         // do the rest of the cleanup...
    //     });
    // }
}
