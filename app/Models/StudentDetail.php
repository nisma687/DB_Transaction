<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        "father_name",
        "mother_name",
        "number",
        "address",
        "student_id"

    ] ;
    public function student(){
        return $this->belongsTo(Student::class);
    }
}
