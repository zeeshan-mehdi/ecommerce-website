@extends('layouts.template')

@section('content')
@if($post)
  <div class="post">
    <div class="thumb">
        <img src="/storage/images/{{$post->image}}" alt="Lights" style="width:100%">
    </div>
    <p>{{$post->title}}</p>
    <p>{{$post->price}}</p>     
    <p>{{$post->description}}</p>
</div>
@endif    
@endsection


