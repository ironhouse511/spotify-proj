
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
  <head>
  
    <meta charset="UTF-8">
    <meta http-equiv="Content-type" content="text/html" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    
    <!-- Optional theme
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    -->
	
<style>
    body {
        font-family: Circular,Helvetica,Arial,sans-serif;
        font-size: 16px;
        line-height: 1.5;
        color: #222326;
        background-color: #fff;
    }
*,:after,:before{box-sizing:border-box}
.clearfix:after,.clearfix:before{content:'';display:table}
.clearfix:after{clear:both;display:block}
a{color:inherit;text-decoration:none}

.login-wrap{
	width:100%;
	margin:auto;
	max-width:525px;
	min-height:670px;
	position:relative;
	/*background:url(https://raw.githubusercontent.com/khadkamhn/day-01-login-form/master/img/bg.jpg) no-repeat center;*/
	box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
}
.login-html{
	width:100%;
	height:100%;
	position:absolute;
	padding:90px 70px 50px 70px;
	background:rgba(0,0,0,0);
}
.login-html .sign-in-htm,
.login-html .sign-up-htm{
	top:0;
	left:0;
	right:0;
	bottom:0;
	position:absolute;
	transform:rotateY(180deg);
	backface-visibility:hidden;
	transition:all .4s linear;
}
.login-html .sign-in,
.login-html .sign-up,
.login-form .group .check{
	display:none;
}
.login-html .tab,
.login-form .group .label,
.login-form .group .button{
	text-transform:uppercase;
}
.login-html .tab{
	font-size:22px;
	margin-right:15px;
	padding-bottom:5px;
	margin:0 15px 10px 0;
	display:inline-block;
	border-bottom:2px solid transparent;
}
.login-html .sign-in:checked + .tab,
.login-html .sign-up:checked + .tab{
	/*color:#fff;*/
	border-color:#1db954;
}
.login-form{
	min-height:345px;
	position:relative;
	perspective:1000px;
	transform-style:preserve-3d;
}
.login-form .group{
	margin-bottom:15px;
}

.login-form .group .input{
    width:100%;
    color:black;
    display:block;
}

.login-form .group .label,
.login-form .group .button{
	width:100%;
	color:#fff;
	display:block;
}
.login-form .group .input,
.login-form .group .button{
	/*border:none;*/
	padding:15px 20px;
	/*border-radius:25px;*/
	/*background:rgba(255,255,255,.1);*/
}
.login-form .group input[data-type="password"]{
	text-security:circle;
	-webkit-text-security:circle;
}
.login-form .group .label{
	color:#aaa;
	font-size:12px;
}
.login-form .group .button{
	background:#1db954;
}
.login-form .group label .icon{
	width:15px;
	height:15px;
	border-radius:2px;
	position:relative;
	display:inline-block;
	background:rgba(255,255,255,.1);
}
.login-form .group label .icon:before,
.login-form .group label .icon:after{
	content:'';
	width:10px;
	height:2px;
	background:#fff;
	position:absolute;
	transition:all .2s ease-in-out 0s;
}
.login-form .group label .icon:before{
	left:3px;
	width:5px;
	bottom:6px;
	transform:scale(0) rotate(0);
}
.login-form .group label .icon:after{
	top:6px;
	right:0;
	transform:scale(0) rotate(0);
}


.login-form .group .check:checked + label .icon{
	background:#1db954;
}
.login-form .group .check:checked + label .icon:before{
	transform:scale(1) rotate(45deg);
}
.login-form .group .check:checked + label .icon:after{
	transform:scale(1) rotate(-45deg);
}
.login-html .sign-in:checked + .tab + .sign-up + .tab + .login-form .sign-in-htm{
	transform:rotate(0);
}
.login-html .sign-up:checked + .tab + .login-form .sign-up-htm{
	transform:rotate(0);
}

.hr{
	height:2px;
	margin:60px 0 50px 0;
	background:rgba(255,255,255,.2);
}
.foot-lnk{
	text-align:center;
}


	</style>
    
    
    
  </head>
  
  <body>
  <?php
   session_start();
   if(isset($_COOKIE['uid'])){
       $_SESSION['uid']=$_COOKIE['uid'];
       header("Location:mainPage.php");
   }
   
     if(isset($_SESSION['success'])){
         $check = $_SESSION['success'];  
     IF($check==true){
     echo '<h3> Sign up Successfully</h3>';
     }
     else{
         echo '<h3> username is same as the other user, try again! </h3>';
     }
     unset($_SESSION['success']);
     }
     
     if(isset($_SESSION['sign'])){
        
     echo '<h3> username or password is invalid</h3>';
     
     unset($_SESSION['sign']);
     }
   ?>

  <div class="login-wrap">
	<div class="login-html">
             
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-form">
                    
			<div class="sign-in-htm">
                            <form action="check_login.php" method ='POST'>
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" required autocomplete="on" class="input" name="suid">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" required autocomplete="on" class="input" data-type="password" name="spw">
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign In" name="signin">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="#forgot">Forgot Password?</a>
				</div>
                                </form>
			</div>
			<div class="sign-up-htm">
                            <form action="check.php" method ='POST'>
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" required autocomplete="on" class="input" name="uid">
				</div>
				
				<div class="group">
					<label for="pass" class="label">Real Name</label>
                                        <input id="pass" type="text" required autocomplete="on" class="input" name="uname">
				</div>
                                <div class="group">
					<label for="pass" class="label">Email</label>
					<input id="pass" type="text" required autocomplete="on" class="input" name="email">
                                </div>
                               
                                <div class="group">
					<label for="pass" class="label">City</label>
					<input id="pass" type="text" required autocomplete="on" class="input" name="city">
				</div>
                                <div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" required autocomplete="on" class="input" data-type="password" name="pw">
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign Up" name="submit">
				</div>
                            </form>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">Already Member?</label>
				</div>
			</div>
		</div>
	</div>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
