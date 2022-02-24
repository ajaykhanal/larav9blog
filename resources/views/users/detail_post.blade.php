@extends('base')
@section('title','Detail')
@section('mainarea')
  <div class="container my-3">
      
      <h3>Detail Post</h3><hr><br>
       <table class="table">
           <tr>
               <th>Title</th>
               <td>{{$post->title}}</td>
           </tr>

           <tr>
            <th>Description</th>
            <td>{{$post->about}}</td>
           </tr>

           <tr>
            <th>Author Name</th>
            <td>{{$post->user->email}}</td>
           </tr>

           <tr>
            <th>Post Category</th>
            <td>{{$post->category->title}}</td>
           </tr>

           <tr>
            <th>Thumbnail</th>
            <td><img src="{{asset('imgs/'.$post->thumb_image)}}" height="100px" width="100px"></td>
           </tr>
           @if(isset(Auth::user()->id))
                @if(Auth::user()->id==$post->user->id)
                <a href="{{route('edit_post',$post->id)}}" class="btn btn-success">Edit</a>
                  <a href="{{route('delete_post',$post->id)}}" class="btn btn-danger">Delete</a>
                @endif
          @endif
       </table>
       
      
     </div>
     
@endsection