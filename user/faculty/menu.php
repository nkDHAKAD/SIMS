<?php 
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   
?>

<link href="../../assets/css/menu.css" rel="stylesheet" type="text/css">

<ul class="nav">

				<li>
					<a href="#"> &nbsp; PROFILE </a>
			<div>
				<div class="nav-column">
					<h3>MyProfile</h3>
					<ul>
						<li><a href="index.php?tag=profile">View Profile</a></li>
						<li> <a href="#">Edit Profile</a> </li>
						<li><a href="index.php?tag=change_pass">Change Password</a></li>
					</ul>
					
				</div>
				
				<div class="nav-column">
					<h3>Other Details</h3>
					<ul>
						<li><a href="index.php?tag=add_corse">Messages</a></li>
						<li> <a href="index.php?tag=view_corse">Support</a> </li>
						
					</ul>
					
				</div>

				

				
			</div>
		
		
		
		</li>
		
		<li>
			<a href="#">STUDENT</a>
			<div>
				<div class="nav-column">
					<h3>Admission Management</h3>
					<ul>
						<li><a href="index.php?tag=online_admission">New Admission</a></li>
						<li><a href="index.php?tag=view_admission">View Student</a></li>
					
					</ul>
				
				</div>

			


				
			</div>
		</li>
		<li>
					<a href="#">COURSE</a>
			<div>
				<div class="nav-column">
					<h3>Course Management</h3>
					<ul>
						<li><a href="index.php?tag=add_course">Add New</a></li>
						<li> <a href="index.php?tag=view_course">View Course</a> </li>
						
					</ul>
					
				</div>


				

				
			</div>
		
		
		
		</li>
		<li>
			<a href="#">EXAMINATION</a>
			<div>
				

				<div class="nav-column">
				
					
					<h3>Examination Result</h3>
					<ul>
						<li><a href="#">Final Exam Result Data</a></li>
					</ul>
				</div>

				

				<div class="nav-column">
					<h3>Exam Schedule</h3>
					<ul>
						<li><a href="#">---</a></li>
					</ul>
				</div>
			</div>
		</li>
		
		<li>
			<a href="#">CERTIFICATE</a>
			<div>
				

				<div class="nav-column">
					<h3>Certificate Application</h3>
					<ul>
						<li><a href="#">Apply for Certificate (First Time) </a></li>
					</ul>
					
				</div>

				<div class="nav-column">
					

					<h3>Duplicate Certificate Application</h3>
					<ul>
						<li><a href="#">Apply for Duplicate Certificate</a></li>
					</ul>
				</div>

			</div>
		</li>
		
		
		<li>
			<a href="#">REPORTS</a>
			<div>
				

				<div class="nav-column">
					<h3>Admission List</h3>
					<ul>
						<li><a href="index.php?tag=view_admission">View Admission</a></li>
					</ul>
					
					<h3></h3>
					<ul>
						<li><a href="#"></a></li>
					</ul>
				</div>

				<div class="nav-column">
					

					<h3>Fee Details</h3>
					<ul>
						<li><a href="#"> Due Fee Admission List</a></li>
					</ul>
				</div>

				<div class="nav-column">
					<h3></h3>
					<ul>
						<li><a href="#"></a></li>
					</ul>
					
					<h3></h3>
					<ul>
						<li><a href="#"></a></li>
					</ul>
				</div>
			</div>
		</li>
		
		
	
		
		<li class="nav-search">
			<form action="#">
				<input type="text" placeholder=" Search...">
				<input type="submit" value="">
			</form>
		</li>
	</ul>
	
<?php }else{ ?>
			
			<script type="text/javascript">
				alert('A C C E S S  D E N I E D !');
				window.location="../../module/redirect.php";
			</script>

<?php } ?>