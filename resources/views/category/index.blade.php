@extends('base')
@section('title','Category')
@section('mainarea')
<div class="container my-3">
    <h3>Add Category</h3><hr>
    <form method="POST" action="{{route('add')}}">
        @csrf()
     <label>Title</label>
     <input type="text" class="form-control" name="title">
     <label>Detail</label>
     <textarea class="form-control" name="detail" rows="4" cols="4">
     </textarea>
     <input type="submit" class="btn btn-success" value="Create Category">
</div>
@endsection