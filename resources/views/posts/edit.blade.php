@extends('layouts.app') @section('title') View Page @endsection
@section('content')

<div class="card text-center">
    <div class="card-header">
        Edit
    </div>
    <div class="card-body">

        <form action="/posts/{{$post['id']}}" method="POST" >
        @csrf
        @method('PUT')
            <div style="border-radius:20px; border:2px solid #007bff; margin: 10px; padding:20px; ">
                <div class="form-group">
                    Title :<input type="text" class="form-control" name='title' value="{{$post['title']}}">
                    @error('title')
    <div class="alert alert-danger" style="height: 28px; padding:2px; margin-top:3px;">{{ $message }}</div>
@enderror
                </div>
                <div class="form-group ">
                    Description :<textarea class="form-control" name='description' rows="3">{{$post['description']}}</textarea>
                    @error('description')
    <div class="alert alert-danger" style="height: 28px; padding:2px; margin-top:3px;">{{ $message }}</div>
@enderror
                </div>
                <div class="form-group">
                    Poster creator :<select name="posted_by" class="form-control">
                        @foreach($users as $user)
                        <option value='{{$user->id}}'>{{$user->name}}</option>

                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save editing</button>
            </div>
        </form>

    </div>
</div>

@endsection