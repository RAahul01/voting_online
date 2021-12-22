<?php
  	session_start();
  	if(isset($_SESSION['admin'])){
    	header('location: admin/home.php');
  	}

    if(isset($_SESSION['voter'])){
      header('location: dashboard.php');
    }
?>
<?php include 'includes/header.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Log In Page</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <style>
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-image {
	background-image: url('home.jpg');  

  filter: blur(8px);
  -webkit-filter: blur(8px);
  

  height: 86%; 
  

  background-position: center;

  background-repeat: no-repeat;
  background-size: cover;
}

.bg-text {
  background-color: rgb(0,0,0); 
  background-color: rgba(0,0,0, 0.4); 
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 49.5%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
}
</style>
</head>
<body>
	<h1><center>
  <font color="Green"><br>Vote My India</font>
  </center></h1>
  <div class="bg-image"></div>
  <div class="bg-text">
  <div class="container">
	<div class="row">
		<div style="width: 40%; margin: 25px auto;">
		  <h3 style="text-align: center;">User Login Page</h3>
    
    	<form action="login.php" method="POST">
		  	<div class="form-group">
			    <label>Username: </label>        		<input type="text" class="form-control" name="voter" placeholder="Voter's ID" required>

			  </div>
			  <div class="form-group">
				  <label>Password: </label>            <input type="password" class="form-control" name="password" placeholder="Password" required>
	
			  </div>
        <label>Enter Captcha: </label>
        <div class="form-row">
          <div class="form-group col-md-6">
            <input type="text" class="form-control" readonly id="capt">
          </div>
          <div class="form-group col-md-6">
            <input type="text" class="form-control" id="textinput" placeholder="Enter Captcha">
          </div>
        </div>
      	<p style="text-align:center;">Captcha not visible<img src="refresh.jpg" width="40px" onclick="cap()"></p> 
        <div class="form-group">
			  	<button name="login" class="btn btn-lg btn-success btn-block">LOGIN</button>
          <a href="votesystem/admin/index.php"><p style="text-align:center;">Admin Login</p></a>
			  </div>
		  </form>
    <p>New User?<a href="newreg.php">Sign Up</a> </p>
	<!--	<p>Forgotten Password?<a href="#">Recover here</a> </p>!-->
    
  	</div>
</div>
</div>
</div>
<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
<script type="text/javascript">
  function cap(){
    var alpha = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V'
                 ,'W','X','Y','Z','1','2','3','4','5','6','7','8','9','0','a','b','c','d','e','f','g','h','i',
                 'j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z', '!','@','#','$','%','&','*'];
                 var a = alpha[Math.floor(Math.random()*71)];
                 var b = alpha[Math.floor(Math.random()*71)];
                 var c = alpha[Math.floor(Math.random()*71)];
                 var d = alpha[Math.floor(Math.random()*71)];
                 var e = alpha[Math.floor(Math.random()*71)];
                 var f = alpha[Math.floor(Math.random()*71)];

                 var final = a+b+c+d+e+f;
                 document.getElementById("capt").value=final;
               }
               function validcap(){
                var stg1 = document.getElementById('capt').value;
                var stg2 = document.getElementById('textinput').value;
                if(stg1==stg2){
                  temp=1
                  return true;
                }else{
                  alert("Please enter a valid captcha");
                  
                  return false;
                }
               }
</script>
<?php //include 'includes/scripts.php' ?>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</html>
