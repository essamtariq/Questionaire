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
          <td><a href="{{ route('QuestionType.create')}}" class="btn btn-primary">Create</a></td>
        </div>




  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>type</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($questiontypes as $questiontype)
        <tr>
            <td>{{$questiontype->id}}</td>
            <td>{{$questiontype->question_type}}</td>
            


           

            <td><a href="{{ route('QuestionType.edit',$questiontype->id)}}" class="btn btn-primary">Edit</a></td>

            
            <td>
                <form action="{{ route('QuestionType.destroy', $questiontype->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
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

