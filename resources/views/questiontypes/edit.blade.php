@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
  <h3>EDIT {{$questiontype->quesrion_type}} </h3>
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('QuestionType.update', $questiontype->id) }}">
        @csrf
        @method('PATCH')

          <div class="form-group">
         
            <label for="question_type">Name</label>
            <input type="text" class="form-control" name="question_type" value= "{{ old('question_type', $questiontype->question_type) }}" />
        </div>
<br>


        <button type="submit" class="btn btn-primary">Update</button>
        <br>
        <a class="navbar-brand" href="{{ route('QuestionType.index') }}">close</a>
      </form>
  </div>
</div>
@endsection