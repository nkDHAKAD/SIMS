<?php 
   include "../../connect/db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   
?>

<?php

$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];


?>	

<?php
// initializing variables
$errors = array(); 


// REGISTER USER
if (isset($_POST['upd_course'])) {
	
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	
	// receive all input values from the form
	//$code = test_input($_POST['code']);
	$title = test_input($_POST['title']);
	$duretion = test_input($_POST['duretion']);
	$reg_fee = test_input($_POST['reg_fee']);
	$cer_fee = test_input($_POST['cer_fee']);
	$tution_fee = test_input($_POST['tution_fee']);
	$total_fee = test_input($_POST['total_fee']);
	

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  //if (empty($code)) { array_push($errors, "Code is required"); }
  if (empty($total_fee)) { array_push($errors, "Total Fee is required"); }
  if (empty($tution_fee)) { array_push($errors, "Tution Fee is required"); }
  if (empty($duretion)) { array_push($errors, "course duretion is required"); }
  if (empty($title)) { array_push($errors, "course title is required"); }
  
    
  
  // first check the database to make sure 
  // a student does not already exist with the same reg_no and/or phone
  /*$user_check_query = "SELECT * FROM course WHERE code='$code' OR title='$title' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['code'] === $code) {
      array_push($errors, "Course code already exists");
    }

    if ($user['title'] === $title) {
      array_push($errors, "course title already exists");
    }
  }*/

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {

  	$query = "update course set 
							title='$title',
							duretion='$duretion', 
							reg_fee='$reg_fee',
							cer_fee='$cer_fee', 
							tution_fee='$tution_fee', 
							total_fee='$total_fee' 
							WHERE
							course_id=$id";
	mysqli_query($conn, $query);
	

  
?>

<script type="text/javascript">
				alert('SUCCESS');
				window.location="../index.php";
			</script>

<?php
  } 
}


?>



<!-- start uppercase -->
<script>
jQuery(document).ready(function(){ 
        jQuery('input').keyup(function() {
            this.value = this.value.toLocaleUpperCase();
        });
        jQuery('textarea').keyup(function() {
            this.value = this.value.toLocaleUpperCase();
        });
 });
</script>
<!-- end uppercase -->

<script>
function sum() {
      var txtFirstNumberValue = document.getElementById('txt1').value;
      var txtSecondNumberValue = document.getElementById('txt2').value;
      var txtThirdNumberValue = document.getElementById('txt3').value;
      var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue) + parseInt(txtThirdNumberValue);
      if (!isNaN(result)) {
         document.getElementById('txt4').value = result;
      }
}
</script>



<?php

if($opr=="upd")
{
	$sql="SELECT * FROM course WHERE course_id=$id";
	$result=mysqli_query($conn, $sql);
	$row=mysqli_fetch_array($result);
}
?>

    
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                          Edit Course
                        </div>
                        <div class="panel-body">
						<a href="index.php?tag=modify_course" class="buttonss">&nbsp; BACK</a> <br> 
						<font color="red">	<?php include('errors.php'); ?> </font>
						<br>
                        <p>	
						
						
	<form method="post">

        <!-- You only need this form and the form-labels-on-top.css -->

		<div id="container">
			<div id="row">
				<div id="left"> Course Code
				</div>
				<div id="middle-1"> Course Title
				</div>
				<div id="middle-2"> Course Duretion
				</div>
				<div id="right">
				</div>
			</div>
			<div id="row">
				<div id="left">	 <input type="text" value="<?php echo $row['code'];?>" placeholder="Course Code" disabled />
				</div> 
				<div id="middle-1">	 <input type="text" name="title"  value="<?php echo $row['title'];?>" placeholder="Course Title" required/>
				</div>
				<div id="middle-2"> <select name="duretion" id="dur" required/> 
										<option value=""> <?php echo $row['duretion'];?> </option> 
										<option> 1 Month
										<option> 2 Months
										<option> 3 Months
										<option> 4 Months
										<option> 5 Months
										<option> 6 Months
										<option> 7 Months
										<option> 8 Months
										<option> 9 Months
										<option> 10 Months
										<option> 11 Months
										<option> 1 Year
										<option> 2 Years
										<option> 3 Years
								</select>
				</div>
				<div id="right"> 
				</div>
			</div>
			<br>
			<div id="row">
				<div id="left">Registration Fee
				</div>
				<div id="middle-1">Certificate Fee
				</div>
				<div id="middle-2">Tution Fee
				</div>
				<div id="right">Total Fee
				</div>
			</div>
			<div id="row">
				<div id="left">	<input type="text" id="txt1" value="<?php echo $row['reg_fee'];?>"  onkeyup="sum();" name="reg_fee" placeholder="Registration Fee" required/>
				</div>
				<div id="middle-1">	<input type="text" id="txt2"  value="<?php echo $row['cer_fee'];?>" onkeyup="sum();" name="cer_fee" placeholder="Certificate Fee" required/>
				</div>
				<div id="middle-2"> <input type="text" id="txt3" value="<?php echo $row['tution_fee'];?>" onkeyup="sum();" name="tution_fee" placeholder="Tution Fee">
				</div>
				<div id="right"> <input type="text" id="txt4" name="total_fee" value="<?php echo $row['total_fee'];?>" placeholder="Calculate Autometically" readonly required/>
				</div>
			</div>
			<br>
			

			
		</div>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  			
						&nbsp;
<button name="upd_course" type="submit" class="button button2">Submit</button>						
						</p>
						
					</form>
                        </div>
                        
                    </div>



<?php }else{ ?>
			
			<script type="text/javascript">
				alert('A C C E S S  D E N I E D !');
				window.location="../../module/redirect.php";
			</script>

<?php } ?>