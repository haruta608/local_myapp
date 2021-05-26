<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
    protected $table = 'likes';
    // Userとのリレーション
    public function user()
    {
      return $this->belongTo('App\User');
    }
    // outfitとのリレーション
    public function outfit()
    {
      return $this->belongTo('App\Outfit');
    }
    protected $fillable = [
      'user_id', 'outfit_id'
    ];
    protected $guarded = [
      'id'
    ];
}
