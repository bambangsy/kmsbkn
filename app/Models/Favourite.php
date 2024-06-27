<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','content_type','content_id'];

    public function addToFavourite($userId, $contentType, $contentId)
    {
    $favourite = new Favourite();
    $favourite->user_id = $userId;
    $favourite->content_type = $contentType;
    $favourite->content_id = $contentId;
    $favourite->save();
    }
}





