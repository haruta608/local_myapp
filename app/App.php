<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    //
    protected $table = 'app';
    protected $guarded = array('id');

    public static $rules = array(
        'band' => 'required',
        'introduction' => 'required',
    );
    // App Modelに関連付けを行なう
    public function histories()
    {
      return $this->hasMany('App\History');
    }
}
