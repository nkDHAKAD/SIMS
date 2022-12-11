<?php 
// this code is for redirecting to different pages if the credentials are correct.
   session_start();
   include "../connect/db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   
			
		//admin
      	if ($_SESSION['role'] == 'admin'){
			header("Location: ../user/admin/");
		 }
		 
		 //faculty
		 else if ($_SESSION['role'] == 'faculty'){ 
			header("Location: ../user/faculty/");
      	} 
		//student
		  else if ($_SESSION['role'] == 'student'){ 
			header("Location: ../user/student.php");	
		}
		//parent
		else if ($_SESSION['role'] == 'parent'){ 
			header("Location: ../user/parent.php");
		}
 }
else{
	header("Location:../index.php");
} ?>
