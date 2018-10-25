<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionair extends Model
{
    protected $fillable = [
        'questionair_name',
        'duration',
        'minute_hour',
        'resumable',
      ];
    
      public function questions()
      {
          return $this->hasMany('App\Question', 'questionair_id');
      }

}
