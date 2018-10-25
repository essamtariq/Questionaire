@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif

  <html lang="{{ app()->getLocale() }}">
      <head>
          <meta charset="utf-8"/>
          <meta http-equiv="X-UA-Compatible" />
          <meta name="viewport" content="width=device-width, initial-scale=1"/>
          <meta name="_token" content="{{csrf_token()}}" />
          <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"/>
          
                  <!-- Fonts -->
                  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
                  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
              
                  <!-- Styles -->
                  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
                   <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>

      <script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
      </script>
              
      </head>
  
      <body>


        <div class="card-header">
          <td><a href="{{ route('Questionair.create')}}" class="btn btn-primary">Create</a></td>
        </div>




  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Number of questions</td>
          <td>Duration</td>
          <td>Resumable</td>
          <td>Published</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($questionairs as $questionair)
        <tr>
            <td>{{$questionair->id}}</td>
            <td>{{$questionair->questionair_name}}</td>
        <td> {{$questionair->questions->count()}} <a href="{{ route('Question.create',['id' => $questionair->id])}}">add</a></td>
            <td>{{$questionair->duration}} {{$questionair->minute_hour}} </td>
            <td>{{$questionair->resumable}}</td>
            <td></td>

            <td><a href="{{ route('Questionair.edit',$questionair->id)}}">Edit</a></td>      
            <td>   
                <form action="{{ route('Questionair.destroy', $questionair->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>


        
<!-- Modal add questions -->





  </body>
  </html>
  
@endsection

