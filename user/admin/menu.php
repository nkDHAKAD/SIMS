<?php 
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {      
?>
   
<link href="../../assets/css/menu.css" rel="stylesheet" type="text/css">

<ul class="nav">

				<li>
					<a href="#"> &nbsp; MySIMS </a>
			<div>
				<div class="nav-column">
					<h3>MySIMS Profile</h3>
					<ul>
						<li><a href="index.php?tag=profile">View Profile</a></li>
						<li> <a href="#">Edit Profile</a> </li>
						<li><a href="index.php?tag=change_pass">Change Password</a></li>
					</ul>
					
				</div>
				
				<div class="nav-column">
					<h3>Other Details</h3>
					<ul>
						<li><a href="#">Messages</a></li>
						<li> <a href="index.php?tag=view_support">Support</a> </li>
						
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
						<li><a href="index.php?tag=new_admission">New Admission</a></li>
						<li><a href="index.php?tag=view_admission">View Student</a></li> 
						<li><a href="index.php?tag=edit_admission">Edit Student</a></li>
						<li><a href="index.php?tag=inactive_admission">In-Active Student</a></li>
					</ul>
				
				</div>
				<div class="nav-column">
					<h3>Fee Management</h3>
					<ul>
						<li><a href="index.php?tag=fee_deposite">Fee Deposit</a></li>
						<li><a href="#">Print Slip</a></li>
					
						
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
						<li><a href="index.php?tag=modify_course">Edit Course</a></li>
					</ul>
					
				</div>


				

				
			</div>
		
		
		
		</li>
		<li>
			<a href="#">EXAMINATION</a>
			<div>
				

				<div class="nav-column">
					<h3>Result</h3>
					<ul>
						<li><a href="#">PYQ</a></li>
						<li><a href="#">Get Result</a></li>
					</ul>
				
				</div>

			</div>
		</li>
		
		<li>
			<a href="#">CERTIFICATE</a>
			<div>
				

				<div class="nav-column">
					<h3>Certificate Management</h3>
					<ul>
						<li><a href="#">New Certificate (First Time)</a></li>
						<li><a href="#">Duplicate Certificate</a></li>
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
						<li><a href="index.php?tag=view_admreport">View Admission</a></li>
					</ul>
					
				
				</div>
				
				<div class="nav-column">
					<h3>Fee Report</h3>
					<ul>
						<li><a href="index.php?tag=view_tranreport">Transaction History</a></li>
					</ul>
				</div>
				
				<div class="nav-column">	
					<h3> View Log</h3>
					<ul>
						<li><a href="index.php?tag=view_userlog">UserLog</a></li>
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