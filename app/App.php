<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    //
    protected $table = 'band';
    protected $guarded = array('id');

    public static $rules = array(
        'band_name' => 'required',
        'description' => 'required',
    );
    // App Modelに関連付けを行なう
    public function histories()
    {
      return $this->hasMany('App\History','user_id');
    }
    public function likes()
    {
      return $this->hasMany('App\Like','outfit_id');
    }
}
