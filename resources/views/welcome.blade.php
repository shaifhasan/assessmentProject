<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body >


<div class="loginbox">
<form action="{{route('post_login')}}" method="post">
@csrf

  <div class="imgcontainer">
    <h1>Bank</h1>
  </div>

  <div class="container">
    <label for="userId"><b>User Email </b></label>
    <input type="text" placeholder="Enter Email"  name="email" @if(isset($_COOKIE['email'])) value="{{$_COOKIE['email']}}" @endif required>

    <label for="psw"><b>Password  </b></label>
    <input type="password" placeholder="Enter Password" name="password" @if(isset($_COOKIE['password'])) value="{{$_COOKIE['password']}}" @endif required>
        
    <button type="submit">Login</button>
    <label>
      <input type="checkbox"  name="remember_me"  @if(isset($_COOKIE['email'])) checked="true" @endif>Remember me 
    </label></br>
    <a  href="{{route('create_user')}}" class="btn btn-lg btn-primary" >Create User</a>
  </div>
  @if(session('message'))
		<li class="err" >{{session('message')}}</li>
	@endif

	@if($errors->any())
		<ul>
			@foreach($errors->all() as $err)
				<li >{{$err}}</li>
			@endforeach
		</ul>
	@endif
</div>
</form>

</body>
</html>
