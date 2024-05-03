<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PathCourse extends Model
{
    use HasFactory;
    
    protected $table = 'path_courses';
    protected $fillable = ['path_id', 'course_id'];
}
