@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>


<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<div class="card uper">
  <div class="card-header">
    <h3>CREATE</h3>
  </div>
  <div class="card-body"  id = "megaparent">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
      @endif


      
      
        <div class="contianer">
          <h2 class="text-center">Add Questions</h2> <hr>
          <button class="btn btn-primary btn-add col-md-offset-8"><span class="glyphicon glyphicon-plus"></span> Add Question</button><br><br>
          <form method="post" class="form-horizontal" name="add_all" id="add_all" action="{{ route('Question.store',['id' => $questionair->id])}}">
            @csrf
                <div class="edit-question">

                </div> 
             
            <!-- Append when click on Add Question button through Jquery -->
              <div class="add-question">
      
              </div> 
              <!-- end -->
              <div class="form-group btn-submit">
                  <label for="btn-submit" class="control-label col-md-4"></label>
                  <div class="col-md-4">
                      <button type="submit" id = "submit" class="form-control btn btn-success">Submit</button>
                  </div>
              </div>
</form>  
      </div>

{{-- ADD QUESTION --}}

<script type="text/javascript">
$(document).ready(function() {
    $('.btn-success').hide(); 
   var type = 0;
   var question = 0;
   var choice = 0;
   var choicecount = 0;
   var correct = 0;

   var edittype = 0;
   var editquestion = 0;
   var editchoice = 0;
   var editcorrect = 0;

    edit_question();

function edit_question(){
        //  counter++;
   @foreach($questions as $question)

        // editchoice = 0;
       $('.edit-question').append(
       '<div class="question_edit'+question+++'">'+
            '<div class="form-group '+editchoice+'">'+
               '<div class="form-group">'+
            '<label class="control-label col-md-4" for="question-type">Question Type:</label>'+
            '<input type="hidden" name= "questions['+question+'][question_id]" value="{{$question->id}}">'+
            '<div class="col-md-4">'+
                '<select name="questions['+question+'][question_type_id]" class="form-control question-type" id="'+edittype+'">'+
                  @foreach($questiontypes as $questiontype)
                    '<option value="{{$questiontype->id}}"{{ $questiontype->question_type === $question->questiontype->question_type ? 'selected' : '' }}>{{$questiontype->question_type}}</option>'+
                    @endforeach
                   
                '</select>'+
            '</div>'+
            '</div>'+
        '<div class="form-group">'+
            '<label class="control-label col-md-4" for="question">Enter Question:</label>'+
            '<div class="col-md-4">'+
                '<input type="text" name="questions['+question+'][question]" class="form-control" value="{{ $question->question }}">'+
            '</div>'+
            '<div class="col-md-4">'+
                    '<form action="{{ route('Question.destroy', $question->id)}}" method="post">'+
                 '@csrf'+
                 '@method('DELETE')'+
                  '<button class="btn btn-danger" type="submit">Delete Question</button>'+
                '</form>'+
            '</div>'+
        '</div>'+
        @foreach($question->choices as $choice)
    
        '<div class="form-group '+editchoice+++'">'+
        '<div class="form-group" id="remove-editchoice'+editchoice+'">'+    
            '<label class="control-label col-md-4" for="choices">Choices:</label>'+
            '<div class="col-md-4">'+
                '<input type="text" name="questions['+question+'][choices]['+editchoice+'][name]" id="'+editchoice+'" class="form-control" value="{{$choice->name}}">'+
            '</div>'+
            '<div class="col-md-2 add-choice">'+
            '<label class="" for="choices"></label>'+
                '<input type="checkbox" name="questions['+question+'][choices]['+editchoice+'][correct_yn]" id="'+editcorrect+'" value ="1" {{ $choice->correct_yn === 1 ? 'checked' : '' }}> Correct?'+
                '<button type="button" class="btn btn-link btn-remove-editchoice" data-id="'+editchoice+'">Delete Choice</button>'+
            '</div>'+
        '</div>'+
        '</div>'+
        @endforeach
        '<button type ="button" class="btn btn-link col-md-offset-4 btn-editaddchoice" data-editquestion='+question+'  data-editchoiceCount='+editchoice+'>Add Choice</button>'+

        '<hr>'+ 
        '<div>'+
        '</div>'
       
        );@endforeach
     $('.btn-success').show();  


      $(document).on('click', '.btn-editaddchoice', function() {
      var editchoice = parseInt($(this).attr('data-editchoiceCount')) + 1;
      var question = parseInt($(this).attr('data-editquestion'))
      $(this).attr('data-editchoiceCount', editchoice,editquestion);
      $(
          '<div class="form-group " id="remove-editchoice'+editchoice+'">'+     
            '<label class="control-label col-md-4" for="choices">Choices:</label>'+
            '<div class="col-md-4">'+
                '<input type="text" name="questions['+question+'][choices]['+editchoice+'][name]" id="choices" class="form-control" />'+
            '</div>'+
            '<div class="col-md-2">'+
            '<label class="" for="choices"></label>'+
                '<input type="checkbox" name="questions['+question+'][choices]['+editchoice+'][correct_yn]" id="correct_yn'+editcorrect+'" /> Correct?'+
                '<button type="button" class="btn btn-link btn-remove-editchoice" data-id="'+editchoice+'">Delete Choice</button>'+
            '</div>'+
            '<br>'+
        '</div>').insertBefore(this); 

        
  
   });
   }

   $(document).on('click', '.btn-remove-editchoice', function() {
       var buttonId = $(this).data("id");
       $('#remove-editchoice'+buttonId).remove();
 });


$('.btn-add').on('click', function(){
    add_question();
   });

   function add_question(){
        //  counter++;
        question++;
        type++;

       $('.add-question').append('<br>' + '<div class="question_'+question+'">'+
               '<div class="form-group">'+
            '<label class="control-label col-md-4" for="question-type">Question Type:</label>'+
            '<input type="hidden" name= "questions['+question+'][question_id]" value="Null">'+
            '<div class="col-md-4">'+
                '<select name="questions['+question+'][question_type_id]" class="form-control question-type" id="'+type+'">'+
                  @foreach($questiontypes as $questiontype)
                    '<option value={{$questiontype->id}}>{{$questiontype->question_type}}</option>'+
                    @endforeach
                   
                '</select>'+
            '</div>'+
            '</div>'+
        '<div class="form-group">'+
            '<label class="control-label col-md-4" for="question">Enter Question:</label>'+
            '<div class="col-md-4">'+
                '<input type="text" name="questions['+question+'][question]" class="form-control" />'+
            '</div>'+
            '<div class="col-md-4">'+
                '<button type="button" class="btn btn-danger btn-delete " id="'+question+'">Delete Question</button>'+
            '</div>'+
        '</div>'+/////////////////////////
        '<div class="form-group '+choice+++'">'+
        '<div class="form-group" id ="remove-choice'+choice+'">'+    
            '<label class="control-label col-md-4" for="choices">Choices:</label>'+
            '<div class="col-md-4">'+
                '<input type="text" name="questions['+question+'][choices]['+choice+'][name]" id="'+choice+'" class="form-control" />'+
            '</div>'+
            '<div class="col-md-2 add-choice">'+
            '<label class="" for="choices"></label>'+
                '<input type="checkbox" name="questions['+question+'][choices]['+choice+'][correct_yn]" id="'+correct+'" value ="1" /> Correct?'+
                '<button type="button" class="btn btn-link btn-remove-choice" data-id="'+choice+'">Delete Choice</button>'+ 
            '</div>'+
            '<button type ="button" class="btn btn-link col-md-offset-4 btn-choice" data-question='+question+'  data-choiceCount='+choice+'>Add Choice</button>'+
        '</div>'+
        '<hr>'+
        '<div>'+
        '</div>'+
        '</div>'
        );
     $('.btn-success').show();  
   }
   
   $(document).on('click', '.btn-choice', function() {
       var choice = parseInt($(this).attr('data-choiceCount')) + 1;
       var question = parseInt($(this).attr('data-question'))
      $(this).attr('data-choiceCount', choice);
      $('<div class="form-group '+choice+++'">'+
          '<div class="form-group " id="remove-choice'+choice+'">'+     
            '<label class="control-label col-md-4" for="choices">Choices:</label>'+
            '<div class="col-md-4">'+
                '<input type="text" name="questions['+question+'][choices]['+choice+'][name]" id="choices" class="form-control" />'+
            '</div>'+
            '<div class="col-md-2">'+
            '<label class="" for="choices"></label>'+
                '<input type="checkbox" name="questions['+question+'][choices]['+choice+'][correct_yn]" id="correct_yn'+correct+'" /> Correct?'+
                '<button type="button" class="btn btn-link btn-remove-choice" data-id="'+choice+'">Delete Choice</button>'+
            '</div>'+
            '<br>'+
        '</div>').insertBefore(this); 
   });
   
   

    $(document).on('click', '.btn-remove-choice', function() {
       var buttonId = $(this).data("id");
       $('#remove-choice'+buttonId).remove();
   });

   $(document).on('click', '.btn-delete' , function() {
       var buttonId = $(this).attr("id");
       $('.question_'+buttonId).remove();
       if($('.question_'+buttonId) === "undefined") {
       $('.btn-success').hide();
   }
   });
   

   
});
</script>
</div>
@endsection