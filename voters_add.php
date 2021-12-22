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
		//generate voters id
		// $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

		$sql = "INSERT INTO voters (voters_id, password, firstname, lastname, email, phone1, phone2, adhaar_no, Voter_id, gender, photo) 
		VALUES ('$voter', '$password', '$firstname', '$lastname', '$email', '$phone1', '$phone2', '$Aadhaar_no', '$Voter_Id', '$gender', '$filename')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Voter added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: success.php');
?>