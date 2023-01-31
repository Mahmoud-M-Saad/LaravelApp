@extends('layouts.app') @section('title') View Page @endsection
@section('content')

<div class="card text-center">
    <div class="card-header">
        Edit
    </div>
    <div class="card-body">

        <form action="/posts/{post}" method="POST" >
        @csrf
        @method('PUT')
            <div style="border-radius:20px; border:2px solid #007bff; margin: 10px; padding:20px; ">
                <div class="form-group">
                    Title :<input type="text" class="form-control" value="{{$post['title']}}">
                </div>
                <div class="form-group ">
                    Description :<textarea class="form-control" rows="3">{{$post['description']}}</textarea>
                </div>
                <div class="form-group">
                    Poster creator :<input type="text" class="form-control" value="{{$post['posted_by']}}">
                </div>
                <button type="submit" class="btn btn-primary">Save editing</button>
            </div>
        </form>

    </div>
</div>

@endsection