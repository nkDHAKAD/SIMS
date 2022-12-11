<?php
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
	
// initializing variables
$errors = array(); 

// connect to the database
include "../../connect/db_conn.php";

// REGISTER Student
if (isset($_POST['new_add'])) {
	
		
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	
	// receive all input values from the form
	$reg_no = test_input($_POST['reg_no']);
	$name = test_input($_POST['name']);
	$fname = test_input($_POST['fname']);
	$date_of_birth = test_input($_POST['date_of_birth']);
	$gender = test_input($_POST['gender']);
	$email = test_input($_POST['email']);
	$phone_self = test_input($_POST['phone_self']);
	$phone_parent = test_input($_POST['phone_parent']);
	$address = test_input($_POST['address']);
	$pin = test_input($_POST['pin']);
	$proof_of_id = test_input($_POST['proof_of_id']);
	$id_no = test_input($_POST['id_no']);
	$physically_ch = test_input($_POST['physically_ch']);
	
	// photo upload

	
	date_default_timezone_set('Asia/Kolkata');
	$reg_year=date("Y");
	$reg_month=date("F");
	$reg_date=date("Y-m-d H:i:s");

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($reg_no)) { array_push($errors, "Registration No is required"); }
  if (empty($phone_self)) { array_push($errors, "Mobile No(Self) is required"); }
//  if (empty($course)) { array_push($errors, "Course is required"); }
  
     if(!empty($_POST['course'])){
        foreach($_POST['course'] as $checked){
          echo $checked . ' ';
        }
      } else {
		array_push($errors,"Course is required"); 
	  }
       
  
  
  
  
  
  // first check the database to make sure 
  // a student does not already exist with the same reg_no and/or phone
  $user_check_query = "SELECT * FROM student WHERE reg_no='$reg_no' OR phone_self='$phone_self' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['reg_no'] === $reg_no) {
      array_push($errors, "Registration No already exists");
    }

    if ($user['phone_self'] === $phone_self) {
      array_push($errors, "Mobile No(Self) already exists");
    }
  }



  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {

 
  	$query = "INSERT INTO student (reg_no, name, fname, gender, date_of_birth, proof_of_id, id_no, physically_ch, address, pin, phone_self, phone_parent, email, reg_year, reg_month, reg_date) 
  			  VALUES('$reg_no', '$name', '$fname', '$gender', '$date_of_birth', '$proof_of_id', '$id_no', '$physically_ch', '$address', '$pin', '$phone_self', '$phone_parent', '$email', '$reg_year', '$reg_month', '$reg_date' )";
	mysqli_query($conn, $query);
	

	for($i=0; $i<count($_POST['course']); $i++)
	{
		$checked = $_POST['course'];
		
		$query2= "INSERT INTO student_course (reg_no, course_id) values ('$reg_no', '$checked[$i]')";
		mysqli_query($conn, $query2);
	}
	
									 
	$sqlc="select sum(c.total_fee) as total_fee from student_course sc join course c on sc.course_id=c.course_id WHERE sc.reg_no=$reg_no";
	$resultc=mysqli_query($conn, $sqlc);
    while($rowc=mysqli_fetch_array($resultc)){
    
		
	$query3= "INSERT INTO student_fee (reg_no, fees, balance) values ('$reg_no', ".$rowc['total_fee'].", ".$rowc['total_fee']." )";
	mysqli_query($conn, $query3);
	
	}
  
?>

<script type="text/javascript">
				alert('SUCCESS');
				window.location="../index.php";
			</script>

<?php
  }
}


?>

<?php }else{ ?>
			
			<script type="text/javascript">
				alert('A C C E S S  D E N I E D !');
				window.location="../../module/redirect.php";
			</script>

<?php } ?>