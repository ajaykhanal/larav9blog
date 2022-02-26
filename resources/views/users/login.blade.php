@extends('base')
@section('title','Login')
@section('mainarea')
  <div class="container my-2 col-md-6">
      <h3>Login Page</h3><hr>
      <form method="POST" action="{{route('login_data')}}">
          @csrf
          <labe>Email</label>
            <input type="text" class="form-control" placeholder="abc@gmail.com" name="email">
            <span class="text-danger">@error('email'){{$message}} @enderror</span><br>
         <labe>Password</label>
            <input type="password" class="form-control"  name="password">
            <span class="text-danger">@error('password'){{$message}} @enderror</span><br><br>
            <input type="submit" class="btn btn-success" value="Login" >
            <a href="register" class="ml-3">Don't have an account yet?</a>
            
    </form>
  </div>
@endsection