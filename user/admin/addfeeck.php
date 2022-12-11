<?php
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
	
// initializing variables
$errors = array(); 

// connect to the database
include "../../connect/db_conn.php";

// REGISTER Student
if (isset($_POST['pay_fee'])) {
	
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	
	// receive all input values from the form
	$reciept = test_input($_POST['reciept']);
	$reg_no = test_input($_POST['reg_no']);
	$installment = test_input($_POST['installment']);
	$amount = test_input($_POST['amount']);
	$pmode = test_input($_POST['pmode']);
	$discount = test_input($_POST['discount']);
	
	
	
	date_default_timezone_set('Asia/Kolkata');
	$year=date("Y");
	$month=date("F");
	$date=date("Y-m-d H:i:s");

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($installment)) { array_push($errors, "Installment No is required"); }
  if (empty($amount)) { array_push($errors, "amount is required"); }
//  if (empty($course)) { array_push($errors, "Course is required"); }
  
 
       
  
  
  
  
  
  // first check the database to make sure 
  // a student does not already exist with the same reg_no and/or phone
  $user_check_query = "SELECT installment FROM student_payment WHERE reg_no='$reg_no' and installment='$installment' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
   

    if ($user['installment'] == $installment) {
      array_push($errors,  "Selected Installment Already Paid");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {

			$sql = "select fees,balance  from student_fee where reg_no = '$reg_no'";
			$sq = $conn->query($sql);
			$sr = $sq->fetch_assoc();
			$totalfee = $sr['fees'];
			if($sr['balance']>0)
			{
			$sql = "insert into student_payment(reciept, reg_no, amount, discount, installment, pay_mode, month, year, date) 
						values('$reciept', '$reg_no', '$amount', '$discount', '$installment', '$pmode', '$month', '$year', '$date') ";
			$conn->query($sql);
			$sql = "SELECT sum(amount) as totalpaid, sum(discount) as dis FROM student_payment WHERE reg_no = '$reg_no'";
			$tpq = $conn->query($sql);
			$tpr = $tpq->fetch_assoc();
			$totalpaid = $tpr['totalpaid'];
			$dis = $tpr['dis'];
			$tbalance = $totalfee - ($totalpaid + $dis);
			
			$sql = "update student_fee set balance='$tbalance' where reg_no = '$reg_no'";
			$conn->query($sql);
			
			}else{
				?>
			
			<script type="text/javascript">
				alert('there is no due fee to pay');
				window.location="index.php";
			</script>
<?php
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