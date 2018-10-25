@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    <h3>CREATE</h3>
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
      <form method="post" action="{{ route('QuestionType.store') }}">
        @csrf
        <div class="form-group">
          @csrf
          <label for="question_type">Name</label>
          <input type="text" class="form-control" name="question_type"/>
      </div>
      <br>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection