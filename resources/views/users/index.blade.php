@extends('base')
@section('title','Index')
 @section('mainarea')
 <div class="container">
   
    <h3>All Posts</h3>
    <table class="table table-bordered table-hovered table-striped">
        <thead>
           <tr>
               <th>Title</th>
               <th>About</th>
               {{-- <th>Category</th> --}}
               <th>Post Image</th>
              
           </tr>
        </thead>
        <tbody>
            @foreach($all_posts as $pos)
            <tr>
                <td><a href="{{route('detail',$pos->id)}}">{{$pos->title}}</a></td>
                <td>{{$pos->about}}</td>
                {{-- <td>{{$pos->category->title}}</td> --}}
                <td><img src="{{asset('imgs/'.$pos->thumb_image)}}" height="70px" weight="70px"></td>
                
            </tr>
            @endforeach
            {{-- @if(!$my_posts)
               <p>No any Posts yet</p>
            @endif --}}
        <tbody>
            
   </table>
   {!! $all_posts->links() !!}
 </div>
@endsection