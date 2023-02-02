@extends('layouts.app') 
@section('title') View Page @endsection 
@section('content')

<div class="card text-center">
    <div class="card-header">
        Add post
    </div>
    <div class="card-body">
        <form style="border-radius:20px; border:2px solid #007bff; margin: 10px; ">
            <div class="form-group" style=" margin: 20px; ">
                Title :<input
                    type="email"
                    class="form-control"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    readonly="readonly"
                    value="{{$post['title']}}">
            </div>
            <div class="form-group " style=" margin: 20px; ">
                Description :<textarea
                    class="form-control"
                    id="exampleFormControlTextarea1"
                    rows="3"
                    readonly="readonly">{{$post['description']}}</textarea>
            </div>
            <div class="form-group" style=" margin: 20px; ">
                Poster creator :<input
                    type="email"
                    class="form-control"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    readonly="readonly"
                    value="{{$post->user?->name}}">
            </div>
        </form>
        
        <a href="{{route('posts.index')}}" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="20" height="20" viewBox="0 0 25 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M5 12l14 0"></path>
            <path d="M5 12l6 6"></path>
            <path d="M5 12l6 -6"></path>
         </svg>Back</a>
    </div>
</div>

@endsection