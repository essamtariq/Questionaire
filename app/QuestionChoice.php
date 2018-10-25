<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionChoice extends Model
{
    protected $fillable = [
        'name',
        'correct_yn',
        'question_id'

      ];

      public function question()
      {
          return $this->belongsTo('App\question', 'question_id');
      }
}
