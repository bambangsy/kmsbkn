<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Highlight extends Model
{
    use HasFactory;
    protected $table = 'admin_highlight';
    protected $fillable = ['content_id', 'type', 'order'];
}
