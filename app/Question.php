<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question',
        'question_type_id',
        'questionair_id'

      ];

      public function questionair()
    {
        return $this->belongsTo('App\Questionair');
    }
    public function questiontype()
    {
        return $this->belongsTo('App\QuestionType','question_type_id');
    }
    public function choices()
       {
           return $this->hasMany('App\QuestionChoice');
       }
}
