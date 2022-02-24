@extends('base')
@section('title','Edit Posts')
@section('mainarea')
  <div class="container">
      <h3>Edit Posts</h3><hr>
      <form method="POST" action="{{route('edit_post_data',$post)}}" enctype="multipart/form-data">
        @csrf()
       @method('PUT')
        <label>Category</label>
        <select class="form-control" name="category">
            @foreach($cats as $cat)
               @if($cat->id==$post->cat_id)
            <option value="{{$cat->id}}" selected>{{$cat->title}}</option>
            @else 
            <option value="{{$cat->id}}">{{$cat->title}}</option>
            @endif
            @endforeach
        </select>

        <label>Title</label>
        <input type="text" class="form-control" name="title" value="{{$post->title}}">

        <label>Detail</label><br>
        <textarea class="form-control" rows="4" cols="4" name="about">{{$post->about}}</textarea><br>

        <label>Thumbnail</label>
        <img src="{{asset('imgs/'.$post->thumb_image)}}" height="70px" width="70px"><br>
        <input type="hidden" value="{{$post->thumb_image}}" name="thumb_image">
        <input type="file" name="thumb_image"><br><br>
        
        
        <input type="submit" class="btn btn-success" value="Edit Post">
       
    </form>
      
  </div>
@endsection