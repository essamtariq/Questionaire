@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
  <h3>EDIT {{$questionair->questionair_name}}</h3>
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
      <form method="post" action="{{ route('Questionair.update', $questionair->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="questionair_name">Questionair Name:</label>
          <input type="text" class="form-control" name="questionair_name" value={{ $questionair->questionair_name }} />
        </div>
        <div class="form-group">
          <label for="duration">Duration :</label>
          <input type="text" class="form-control" name="duration" id="duration" value={{ $questionair->duration }} />
        </div>

                  <div class="select">
          <select name="minute_hour" id="minute_hour" >
          <option value="Minutes" {{ $questionair->minute_hour === 'Minutes' ? 'selected' : '' }}>Minutes</option>
          <option value="Hours" {{ $questionair->minute_hour === 'Hours' ? 'selected' : '' }} >Hours</option>
          
          </select>
          </div>

        <div class="form-group">


            <label for="q_resume">Can Resume?</label>
            <br>
            <label><input type="radio" class="form-control" name="resumable" value ="yes" {{ $questionair->resumable === 'yes' ? 'checked' : '' }}>YES</label>
            <label><input type="radio" class="form-control" name="resumable" value ="no" {{ $questionair->resumable === 'no' ? 'checked' : '' }}>NO</label>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <br>
        <a class="navbar-brand" href="{{ route('Questionair.index') }}">close</a>

      </form>  
      <br>
        


  </div>
</div>
@endsection
