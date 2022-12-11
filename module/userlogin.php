<?php  

//login login 
session_start();
include "../connect/db_conn.php";

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])) {

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$username = test_input($_POST['username']);
	$password = test_input($_POST['password']);
	$role = test_input($_POST['role']);

	if (empty($username)) {
		header("Location: ../index.php?error=User Name is Required");
	}else if (empty($password)) {
		header("Location: ../index.php?error=Password is Required");
	}else {

		// Hashing function
		$password = md5($password);
        
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
        	
        	$row = mysqli_fetch_assoc($result);
        	if ($row['username'] === $username && $row['password'] === $password && $row['role'] === $role) {
        		$_SESSION['name'] = $row['name'];
        		$_SESSION['id'] = $row['id'];
        		$_SESSION['role'] = $row['role'];
        		$_SESSION['username'] = $row['username'];
				
			if($role=='admin'){
			echo 'true_admin';	
			mysqli_query($conn,"insert into user_log (username,login_time,user_id)values('$username',NOW(),".$row['id'].")");
		}else
		if($role=='faculty'){
			echo 'true_user';	
			mysqli_query($conn,"insert into user_log (username,login_time,user_id)values('$username',NOW(),".$row['id'].")");
		}
		else{ 
				echo 'false';
		}
        		header("Location: redirect.php");

        	}else {
        		header("Location: ../index.php?error=Incorrect User name or password");
        	}
        }else {
        	header("Location: ../index.php?error=Incorrect User name or password");
        }

	}
	
}else {
	header("Location: ../index.php");
}