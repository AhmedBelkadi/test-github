<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ["name","post_id"];

    public function Post()
    {
        return $this->belongsTo(Post::class , "id_post" );
    }

}
