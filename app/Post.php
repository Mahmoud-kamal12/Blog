<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Category;
use App\Tag;
class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id' , 'title','description','content','image' , 'category_id'];

    public function category(){
        return $this->belongsTo(Category::class , 'category_id' , 'id');
    }

    public function user(){
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class , 'post_tag' , 'post_id' , 'tag_id');
    }

    public function hasTag($tagID){
        $tags = $this->tags->pluck('id')->toArray();
        return in_array($tagID , $tags);
    }

    public function hasCategory($categoryID){
        return in_array($categoryID , $this->category->pluck('id')->toArray());
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}




