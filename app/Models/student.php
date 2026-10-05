<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'student_name',
        'student_id',
        'email',
        'phone',
        'date_of_birth',
        'gender',
        'blood_group',
        'department',
        'admission_date',
        'student_image',
        'status',
        'address',
        'city',
        'country',
        'mother_name',
        'father_name',
        'mobile_number',
    ];
}