@extends('base')
@section('title','Register')
@section('mainarea')
  <div class="container my-2 col-md-6">
      <h3>Register Page</h3><hr>
      <form method="POST" action="{{route('register_data')}}">
          @csrf
          <labe>Full Name</label>
            <input type="text" class="form-control" placeholder="Enter Full Name" name="name">
            <span class="text-danger">@error('name'){{$message}} @enderror</span><br>
            <labe>Email</label>
            <input type="text" class="form-control" placeholder="abc@gmail.com" name="email">
            <span class="text-danger">@error('email'){{$message}} @enderror</span><br>
            <labe>Password</label>
            <input type="password" class="form-control"  name="password">
            <span class="text-danger">@error('password'){{$message}} @enderror</span><br>
            <labe>Confirm Password</label>
                <input type="password" class="form-control"  name="password_confirmation">
                <span class="text-danger">@error('password_confirmation'){{$message}} @enderror</span><br>
            <input type="submit" class="btn btn-success" value="Register" >
            <a href="login" class="ml-3">Already have an account?</a>
    </form>
  </div>
@endsection