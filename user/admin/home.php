<?php 
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   
?>

          
		  
<style>

a b{
	background-color:#fff;
	color:green;
	padding:10px;
	border-radius:100%;
}

</style>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           DashBoard
                        </div>
						
						
						
                        <div class="panel-body">
                        
							
						<p align="center">
						
						<a class="buttons button1">Total Students <br> <br> <b><?php 
						  $sql = "SELECT * FROM student";
							$query = $conn->query($sql);
							echo "$query->num_rows";
						
						?></b> </a>
						<a class="buttons button2">  Gallery <br> &nbsp;   </a>
						
						
						<a class="buttons button6">Total Courses <br><br> <b><?php 
						  $sql = "SELECT * FROM course";
							$query = $conn->query($sql);
							echo "$query->num_rows";
						
						?></b></a>
						<a class="buttons button3">  error_<br> solutions   </a>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						
			
						
						
						<a class="buttons button5">Active Students <br><br> <b><?php 
						  $sql = "SELECT * FROM student WHERE delete_status='active'";
							$query = $conn->query($sql);
							echo "$query->num_rows";
						
						?></b> </a>
						
						<a class="buttons button6">Thought <br> of Day</button> </a>
				
						<a class="buttons button1">In-Active Students <br><br> <b><?php 
						  $sql = "SELECT * FROM student WHERE delete_status='leave'";
							$query = $conn->query($sql);
							echo "$query->num_rows";
						
						?></b> </a>
					
						
							
										
							
						
							
							
							
						
						</p>
							
							
							
                        </div>
						 <div class="panel-footer">
                            <font size="4px" face="cursive">
								<div id="clockbox"></div>
							</font>
                        </div>
						
						<div class="panel-footer">
                            <font size="5px" face="cursive">
								<div id="clockbox1"></div>
							</font>
                        </div>
                       
						
						
                    </div>
               
				
				
<?php }else{ ?>
			
			<script type="text/javascript">
				alert('A C C E S S  D E N I E D !');
				window.location="../../module/redirect.php";
			</script>

<?php } ?>