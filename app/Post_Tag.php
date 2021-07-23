<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_Tag extends Model
{
    protected $fillable = ['post_id' , 'tag_id'];
    protected $table = 'post_tag';
    protected $primaryKey = ['post_id', 'tag_id'];
    public $incrementing = false;
}
