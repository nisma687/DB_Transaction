<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name',
        'class',
        'roll',
    ] ;
    public function details(){
        return $this->hasOne(StudentDetail::class);
    }
    public function courses(){
        return $this->hasMany(Course::class,'student_id','id');
    }
    public function posts(){
        return $this->hasMany(Post::class,'student_id','id');
    }

}
