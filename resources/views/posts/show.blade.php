@extends('layouts.app') @section('title') View Page @endsection
@section('content')

<div class="card text-center">
    <div class="card-header">
        POST
    </div>

    <div class="card-body" style="border-radius:20px; margin: 10px; background-color:;">
        <div class="card  bg-primary mb-3" style="border-radius:10px; border: #007bff;">
            <div class="card-header text-white">Post #{{$post['id']}}</div>
            <div
                class="card-body"
                style="background-color:white; border:2px solid #007bff;">
                <h4 class="card-title">
                    <b> -
                        {{$post['title']}}
                        -
                    </b>
                </h4>
                <h5 class="card-text">{{$post['description']}}</h5><hr>
                

                @if ($post->image)
              <img
              src="{{url($post->image)}}"
              class="object-fit-contain"
              alt="post image"
              style="height: 100px; width: 150px;"
              />
              @endif

                Posted by :
                {{$post->user?->name}}
                <br>
                At :
                {{$post['created_at']->format('l h:ia (j-M-Y)')}}

            </div>
        </div>

        <div class="card-body" style="width:100%">
            <div class="card  bg-primary mb-3" style=" border: #007bff;">
                <div class="card-header text-white">
                    <b>Comments</b>

                    <div class="card-body">
                        <form action="/posts/comments" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <input
                                    type="text"
                                    name="comment_body"
                                    class="form-control"
                                    placeholder="Write your comment..."/>
                                <input
                                    type="hidden"
                                    name="post_id"
                                    class="form-control"
                                    value="{{$post['id']}}">
                                <input
                                    type="hidden"
                                    name="user_id"
                                    class="form-control"
                                    value="value='{{$post['user_id']}}">
                            </div>
                            <div class="input-group mb-3">
                                <input type="file" name="file_path" class="form-control" id="inputGroupFile02">
                            </div>
                            <button type="submit" value="Add" class="btn btn-light">
                                + Add Comment</button>

                        </div>
                    </div>
                </form>
            </div>
            {{-- @if ($errors->any()) @foreach ($errors->all() as $error)
                <p class="mb-0 text-danger">
                    {{ $error }}
        </p>
        @endforeach @endif --}} @foreach ($comments as $comment)
        <div class="card bg-light mt-2">
            <div class="card-body">
                <b>
                    {{$comment['comment_body']}}</b>

                <div class="d-flex justify-content-between small text-muted">From :
                  @if($comment->created_at){
                    {{$comment->created_at->diffForHumans()}}
                  }
                  @endif
                    

                <form method="POST" action="/posts/comments/{{$post['id']}}">
                    @csrf @method('DELETE')
                    <button
                        type="submit"
                        class="btn btn-danger"
                        style="width: 34px; height:30px; padding:0px;"
                        onclick="return confirm('Are you sure?')">
                        <a
                            class="btn btn-danger"
                            style="width: 34px; height:30px; padding:0px;"
                            href="{{ route('comments.destroy', $post['id']) }}">
                            <svg
                                style="width: 100%; height:90%"
                                xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-trash"
                                width="24"
                                height="24"
                                viewbox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 7l16 0"></path>
                                <path d="M10 11l0 6"></path>
                                <path d="M14 11l0 6"></path>
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                            </svg>
                        </a>
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    <br>
    <a href="{{route('posts.index')}}" class="btn btn-primary">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="icon icon-tabler icon-tabler-arrow-left"
            width="20"
            height="20"
            viewbox="5 1 15 24"
            stroke-width="2"
            stroke="currentColor"
            fill="none">
            <path d="M5 12l14 0"></path>
            <path d="M5 12l6 6"></path>
            <path d="M5 12l6 -6"></path>
        </svg>
        Back</a>
</div>


@endsection