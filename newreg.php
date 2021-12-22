<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="newreg.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
    <form class="form-horizontal" method="POST" action="newreg.php" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text"  name="fname"  placeholder="Enter your First Name" required>
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" name="lname" placeholder="Enter your Second Name" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="uname" placeholder="Enter your Username" required>
          </div>
          <div class="input-box">
            <span class="details">Email-Id</span>
            <input type="email" name="email" placeholder="Enter your Email-Id" required>
          </div>
            <div class="input-box">
              <span class="details">Phone Number 1</span>
              <input type="tel" name="ph1" pattern="[0-9]{10}"  title="Ten digits code" placeholder="Enter your Phone Number" required>
            </div>
            <div class="input-box">
              <span class="details">Phone Number 2 (Optional)</span>
              <input type="tel" name="ph2" pattern="[0-9]{10}"  title="Ten digits code" >
            </div>
            <div class="input-box">
              <span class="details">Aadhaar Number</span>
              <input type="number" name="aadhaar"  data-type="adhaar-number" maxLength="12" title="Twelve digits code" placeholder="Enter your Aadhaar number" required>
            </div>
            <div class="input-box">
              <span class="details">Voter-Id</span>
              <input type="text" name="voter" title="Ten digits code" placeholder="Enter your Voter-Id number" >
            </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Enter your password"required>          </div>
          <div class="input-box">
            <span class="details">Upload your Photo</span>
            <input type="file" id="photo" name="photo">
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1" required>
          <input type="radio" name="gender" id="dot-2">
          <input type="radio" name="gender" id="dot-3">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Prefer not to say</span>
            </label>
          </div>
        </div>
        <div class="policy">
        <input type="checkbox" required>
        <h3>I accept all terms & condition</h3>
      </div>
        <div class="button">
        <center><input type="submit" name="add" value="Register"/></center>
        
        <?php
	// include 'includes/session.php';
	$conn = new mysqli('localhost', 'root', '', 'votesystem');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
  
  

	if(isset($_POST['add'])){
		$firstname = $_POST['fname'];
		$lastname = $_POST['lname'];
		$voter = $_POST['uname'];
		$email = $_POST['email'];
		$phone1 = $_POST['ph1'];
		$phone2 = $_POST['ph2'];
		$Aadhaar_no = $_POST['aadhaar'];
		$Voter_Id = $_POST['voter'];
		$gender = $_POST['gender'];

		
		$password = password_hash($_POST['psw'], PASSWORD_DEFAULT);
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$filename);	
		}
    else{
      $filename = "nothing";
    }
		//generate voters id
		// $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
		$sql = "INSERT INTO voters (voters_id, password, firstname, lastname, email, phone1, phone2, adhaar_no, Voter_id, gender, photo) 
		VALUES ('$voter', '$password', '$firstname', '$lastname', '$email', '$phone1', '$phone2', '$Aadhaar_no', '$Voter_Id', '$gender', '$filename')";
		if($conn->query($sql)){
			// $_SESSION['success'] = 'Voter added successfully';
      echo "<h1>Added Successfully</h1>";
		}
		else{
      // $_SESSION['error'] = $conn->error;
      echo "Error".mysqli_error($conn);
		}

	}
	else{
    $_SESSION['error'] = 'Fill up add form first';
	}

	// header('location: success.php');
?>
  </div>
  </form>
        
      </div>
    </div>
  
  </body>
  </html>