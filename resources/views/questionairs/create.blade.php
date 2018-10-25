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
      <form method="post" action="{{ route('Questionair.store') }}">
          <div class="form-group">
              @csrf
              <label for="questionair_name">Questionair Name</label>
              <input type="text" class="form-control" name="questionair_name"/>
          </div>
          <div class="form-group">
          <label for="duration">Duration :</label>
          <input type="text" class="form-control" name="duration"/>
        </div>

        <div class="select">
        <select name="minute_hour" id="minute_hour" >
        <option value="Minutes">Minutes</option>
        <option value="Hours">Hours</option>

        </select>
        </div>

          <div class="form-group">

              <label for="resumable">Can Resume?</label>
              <br>
              <label><input type="radio" class="form-control" name="resumable" value ="yes">YES</label>
              <label><input type="radio" class="form-control" name="resumable" value ="no">NO</label>
              
              
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection