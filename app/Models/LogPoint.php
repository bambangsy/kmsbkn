<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogPoint extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','type','task_id','point'];
}
