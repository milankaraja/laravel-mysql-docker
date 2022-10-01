@extends('master')

@section('title','Homepage')

@section('content')


Post Messages:


<form action="/create" method="post">
<input type="text" name="title" placeholder="Title">
<input type="text" name="content" placeholder="Content">
{{csrf_field()}}

 
<button type="submit">Submit</button>

</form>


<ul>
<li> Twitter example</li>

 @foreach($messages as $message)

<li>
    <strong> {{$message -> title}} </strong>  <br>
    {{$message -> content}}

    <br>
    {{ $message -> created_at}}
</li>

 @endforeach 

</ul>


<h1>Content!</h1>

@endsection