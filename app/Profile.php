<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Profile extends Model
{
    protected $fillable = [
        'user_id' ,'about', 'facebook', 'twitter', 'image',
    ];

    public function user(){
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }

}
