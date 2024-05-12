<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body >


<div class="loginbox">
<form action="{{route('post_user')}}" method="post">
@csrf

  <div class="imgcontainer">
    <h1>Bank</h1>
  </div>

  <div class="container">
    <label for="user"><b>Name </b></label>
    <input type="text" placeholder="Enter Name"  name="name"  required>
    <label for="accountType"><b>Account Type </b></label></br>
                        <select class="form-control" name='account_type' id='type'>
                       
                                <option value='Individual'>Individual</option>
                                <option value='Business'>Business</option>
                               
                            </select></br>
                       
    <label for="email"><b>Email </b></label>
    <input type="text" placeholder="Email"  name="email"  required>

    <label for="psw"><b>Password  </b></label>
    <input type="password" placeholder="Enter Password" name="password"  required>
        
    <button type="submit">Register</button>
   </br>
    
  </div>
  @if($errors->any())
		<ul>
			@foreach($errors->all() as $err)
				<li >{{$err}}</li>
			@endforeach
		</ul>
	@endif
  <a href="{{route('login')}}" class="btn btn-lg btn-primary" >Back</a>
</div>
</form>


</body>
</html>
