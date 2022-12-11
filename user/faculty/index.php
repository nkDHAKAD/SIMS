<?php 
   session_start();
   include "../../connect/db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>


<?php
$tag="";
	if (isset($_GET['tag']))
	$tag=$_GET['tag'];
?>


<html>
	<head>
		
		<title>SIMS Web Portal</title>
		<link href="../../assets/css/dashboard.css" type="text/css" rel="stylesheet">
		<link href="../../assets/css/form_adm.css" rel="stylesheet" type="text/css">
		<link href="../../assets/css/DT_bootstrap.css" rel="stylesheet" type="text/css">
		<link href="../../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
		
		<!-- Date and Time Js -->
		<script type="text/javascript" src="../../assets/js/date_time.js"></script>
		<!-- Date and Time Js --> 

		<script src="../../assets/js/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="../../assets/js/jquery.validate.min.js"></script>
		
  
   <script type="text/javascript" charset="utf-8" language="javascript" src="../../assets/jst/jquery.dataTables.js"></script>
   <script type="text/javascript" charset="utf-8" language="javascript" src="../../assets/jst/DT_bootstrap.js"></script>
			
	
	</head>
<body>
  <?php if ($_SESSION['role'] == 'faculty') {?>
	<div class="top" style="background-image: url(../../upload/bg-noise.png);">
		<div>
		

            Welcome <b> ( <?=$_SESSION['name']?> )</b> as <b> <?=$_SESSION['role']?>! </b> &nbsp;

  
		 <a href="logout.php" onclick="return confirm('r u sure u want to  L O G O U T ?');"
		 style="background-color:hotpink; padding:10px;"> LogOut</a>					
			
		</div>
	</div>
	
	<div class="head">
		<div style="background-image: url(../../upload/bg-noise.png);">
			<p>
				<a href="index.php"><img src="../../upload/blue-search-1.png"> </a>
			</p>
		</div>
	</div>

	<div class="menu" >
		<div style="background-image: url(../../upload/bg-noise.png);">
			<?php include('menu.php'); ?>
		</div>
	</div>


	<div class="pages">
		<div class="pages_up">
		
			<?php
   						if($tag=="home" or $tag=="")
							include("home.php");
							
							elseif($tag=="profile")
							include("viewprofile.php");
							
							elseif($tag=="m_profile")
							include("modify_profile.php");
							
							elseif($tag=="change_pass")
							include("chngpassword.php");
							
							elseif($tag=="institution_staff")
							include("itgk_staff.php");
							
							elseif($tag=="gallery")
							include("gallery.php");
							
                            elseif($tag=="online_admission")
                            include("add_new_student.php");
							
							elseif($tag=="view_admission")
                            include("view_student.php");
							
							elseif($tag=="modify_admission")
                            include("modify_student.php");
                
							elseif($tag=="add_course")
                            include("add_new_course.php");
							
							elseif($tag=="view_course")
                            include("view_course.php");
							
							elseif($tag=="modify_course")
                            include("modify_course.php");
							
							elseif($tag=="edit_course")
                            include("edit_course.php");
							
                            elseif($tag=="package_entry")
                            include("Package_Entry.php");

                            elseif($tag=="printing")
                            include("Print.php");
							
							elseif($tag=="user_entry")
                            include("User_Entry.php");
                        	
									
                        ?>
			

		</div>
	</div>
	
	<div class="bottom" style="background-image: url(../../upload/bg-noise.png);">
		<div>
			&copy; SIMS 2019-<?php echo date("Y"); ?> | All Rights Reserved, Site Designed & developed by <b>nkDHAKAD</b>
		</div>
	</div>
	
		 <?php }else { ?>

	
			<script type="text/javascript">
				alert('A C C E S S  D E N I E D !');
				window.location="../index.php";
			</script>
		 
	  
	  <?php } ?>
	

</body>
</html>
<?php }else{
	header("Location: ../../module/redirect.php");
} ?>