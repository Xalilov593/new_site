<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Tag;

class Post extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'content',
        'category_id',
        'second_category_id',
        'image'
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function secondcategory(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

}
