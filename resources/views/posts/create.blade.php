@extends('layouts.app') @section('title') Create Page @endsection
@section('content')

<div class="card text-center">
    <div class="card-header">
        Add post
    </div>
    <div class="card-body">
        <form action="/posts" method="POST">
            
            <div
                style="border-radius:20px; border:2px solid #007bff; margin: 10px; padding:20px; ">
                <div class="form-group">
                    Title :<input name="title" type="text" class="form-control" placeholder="Title...">
                </div>
                <div class="form-group ">
                    Description :
                    <textarea
                        name="description"
                        class="form-control"
                        rows="3"
                        placeholder="Description..."></textarea>
                </div>

                <div class="form-group">
                    Poster creator :
                    <select name="posted_by" class="form-control">
                        @foreach($users as $user)
                        <option value='{{$user->id}}'>{{$user->name}}</option>

                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</div>

@endsection