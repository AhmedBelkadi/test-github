<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ["class_room_id","content"];

    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class , "class_room_id" );
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class , "post_id");
    }

    public function documents()
    {
        return $this->hasMany(Document::class , "post_id");
    }

}
