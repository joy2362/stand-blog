<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class BlogPost extends Model
{
    use HasFactory , \Conner\Tagging\Taggable;

    protected $fillable = [
        'title',
        'poster',
        'category',
        'post_by',
        'tags',
        'details',
        'is_active',
    ];

    public function user(){
        return $this->hasOne(Admin::class ,'id','post_by');
    }

    public function categoryName(){
        return $this->hasOne(category::class,'id', 'category');
    }
}
