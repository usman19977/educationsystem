<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManagerStatic as Image;

class Student extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    protected $casts = [
        'date_of_birth' => 'date',

    ];
    protected $guarded = ['id', 'created_at', 'updated_at', 'status'];
    public function requests()
    {
        return $this->hasMany('App\Models\Request', 'student_id', 'id');
    }
    public function admitcards()
    {
        return $this->hasMany('App\Models\AdmitCard', 'student_id', 'id');
    }
    public function school()
    {
        return $this->belongsTo('App\Models\School', 'school_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    //ACESOR//
    public function getImageAttribute($value)
    {
        return 'http://sleepy-coast-04760.herokuapp.com/' . $value;
    }
    public function getDateOfBirthAttribute($value)
    {

        return date('d-m-Y', strtotime($value));
    }
    //MUTATOR//
    public function setImageAttribute($value)
    {

        $attribute_name = "image";
        // or use your own disk, defined in config/filesystems.php
        $disk = config('backpack.base.root_disk_name');
        // destination path relative to the disk above
        $destination_path = "public/uploads/student/images";


        // if the image was erased
        if ($value == null) {
            // delete the image from disk
            \Illuminate\Support\Facades\Storage::disk($disk)->delete($this->{$attribute_name});

            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }


        // if a base64 was sent, store it in the db



        // 0. Make the image
        $image = Image::make($value)->encode('jpg', 90);

        // 1. Generate a filename.
        $filename = md5($value . time()) . '.jpg';


        // 2. Store the image on disk.
        \Illuminate\Support\Facades\Storage::disk($disk)->put($destination_path . '/' . $filename, $image->stream());


        // 3. Delete the previous image, if there was one.
        \Illuminate\Support\Facades\Storage::disk($disk)->delete($this->{$attribute_name});



        // 4. Save the public path to the database
        // but first, remove "public/" from the path, since we're pointing to it
        // from the root folder; that way, what gets saved in the db
        // is the public URL (everything that comes after the domain name)

        $public_destination_path = \Illuminate\Support\Str::replaceFirst('public/', '', $destination_path);


        $this->attributes[$attribute_name] = $public_destination_path . '/' . $filename;
    }
}
