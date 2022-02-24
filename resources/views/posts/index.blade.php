@extends('base')
@section('title','Posts')
@section('mainarea')
  <div class="container">
      <h3>Posts Page</h3><hr>
      <form method="POST" action="{{route('add_post')}}" enctype="multipart/form-data">
        @csrf()
       
        <label>Category</label>
        <select class="form-control" name="category">
            @foreach($cats as $cat)
            <option value="{{$cat->id}}">{{$cat->title}}</option>
            @endforeach
        </select>

        <label>Title</label>
        <input type="text" class="form-control" name="title">

        <label>Detail</label><br>
        <textarea class="form-control" rows="4" cols="4" name="detail"></textarea><br>

        <label>Thumbnail</label>
        <input type="file" name="thumb_image"><br><br>
        {{-- <?php 
        //   if(Session::has('loginId')){
        //       $data= Session::get('loginId');
          }
        ?> --}}
        {{-- <input type="hidden" name="userid" value="{{$data}}"> --}}
        <input type="submit" class="btn btn-success" value="Add Post">
       
    </form>
      
  </div>
@endsection