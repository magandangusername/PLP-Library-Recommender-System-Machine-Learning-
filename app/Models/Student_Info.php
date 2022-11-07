<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Info extends Model
{
    use HasFactory;
    
    protected $table = 'student_info';
    protected $primaryKey = 'student_info_ID';

    protected $fillable = [
        'student_number', 
        'firstname', 
        'surname', 
        'year_level',
        'contact_number',
        'email',
        'addedby',
        'student_status',
    ];
}
