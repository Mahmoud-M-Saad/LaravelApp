@extends('layouts.app')

@section('title') Create @endsection

@section('content')


<div class="card text-center">
  <div class="card-header">
    Add post
  </div>
  <div class="card-body">
  <form style= "border-radius:20px; border:2px solid #007bff; margin: 10px; ">
  <div class="form-group" style= " margin: 20px; ">
    <label for="exampleInputEmail1">Title :</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title...">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group " style= " margin: 20px; ">
  <label for="exampleFormControlTextarea1">Description :</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description..."></textarea>
  </div>
  <div class="form-check" style= " margin: 20px; ">
  <label for="exampleFormControlSelect2">Poster creator :</label>
    <select multiple class="form-control" id="exampleFormControlSelect2">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <!-- <button type="submit" class="btn btn-primary" style= " margin: 20px;">Submit</button> -->
</form>
    <a href="{{route('posts.index')}}" class="btn btn-primary">Add</a>
  </div>
  <!-- <div class="card-footer text-muted">
    2 days ago
  </div> -->
</div>




@endsection