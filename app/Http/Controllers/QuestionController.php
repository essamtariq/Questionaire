<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Questionair;
use App\QuestionChoice;
use App\QuestionType;

class QuestionController extends Controller
{

    public function create($id)
    {
        
        $questionair = Questionair::find($id);
        $questions =  Question::where('questionair_id',$id)->get();
        $questiontypes = QuestionType::get();
        return view('questions.create', compact('questionair','questiontypes','questions'));
    }

    public function store(Request $request, $id)
    { 
        

// dd($request->all());

          $questionaire = Questionair::find($id);

          foreach(request('questions') as $question_new)
          {
              //save question 
          
              $questionid = $question_new['question_id'];
              $create_update = Question::firstOrCreate(
                  ['id' => $questionid],
                  [
                    'question_type_id' => $question_new['question_type_id'],
                    'question' => $question_new['question'] ,
                    'questionair_id' =>$questionaire->id
                ]
            );
            $create_update->choices()->delete();
            $choices = $question_new['choices'];
            $create_update->choices()->createMany($choices);

          }
          return redirect('/Questionair')->with('success', 'questions have been updated and added');

    }   

    public function destroy($id)
    {
     
        $questions = Question::find($id);
        $questionairid = $questions->questionair_id;
        $questions->delete();
   
        return redirect(route('Question.create',['id'=>$questionairid]))->with('success', 'question has been deleted Successfully');
    }

}
