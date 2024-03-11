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
}
