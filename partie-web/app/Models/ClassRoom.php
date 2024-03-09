<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;

    protected $fillable = ["description","image"];


    public function element()
    {
        return $this->hasOne(Element::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class , "class_room_id");
    }
}
