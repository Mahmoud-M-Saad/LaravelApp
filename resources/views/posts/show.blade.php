@extends('layouts.app') 
@section('title') View Page @endsection 
@section('content')

<div class="card text-center">
    <div class="card-header">
        POST
    </div>
    
    <div class="card-body" style="border-radius:20px; margin: 10px; background-color:;">
        <div class="card  bg-primary mb-3" style="border-radius:10px; border: #007bff;">
            <div class="card-header text-white">Post #{{$post['id']}}</div>
            <div class="card-body" style="background-color:white; border:2px solid #007bff;">
              <h5 class="card-title"><b>- {{$post['title']}} - </b></h5>
              <p class="card-text">{{$post['description']}}</p>
              <hr> Posted by : {{$post->user?->name}}<br>
              At : {{$post['created_at']}}
            </div>
          </div>
        
        
        <a href="{{route('posts.index')}}" class="btn btn-primary">
            <svg
             xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="20" height="20" viewBox="5 1 15 24" stroke-width="2" stroke="currentColor" fill="none"><path d="M5 12l14 0"></path><path d="M5 12l6 6"></path><path d="M5 12l6 -6"></path></svg>
         Back</a>
    </div>
</div>

@endsection