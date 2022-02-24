@extends('base')
@section('title','Home')
 @section('mainarea')
 <div class="container">
    <h4>Dashboard Page , Users Details</h4><hr><br>
       <h5>Full Name: {{Auth::user()->name}}</h5> <?php // auth()->user(); ?>
       <h5>Email: {{Auth::user()->email}}</h5>
       
      <a href="/logout" class="btn btn-info">Logout</a>
 </div>
@endsection