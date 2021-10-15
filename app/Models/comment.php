<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

    protected $table = "comments";
    protected $fillable = [
        'post_id',
        'name',
        'email',
        'comment',
    ];

    public function BlogPosts()
    {
        return $this->belongsTo(BlogPost::class ,'id','post_id');
    }
}
