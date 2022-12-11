<?php 
   include "../../connect/db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   
?>

<?php
$id=$_SESSION['id'];
$sql="SELECT * FROM user WHERE id='$id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

$full_name=$row['name'];
$username=$row['username'];
$role=$row['role'];
?>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                          Profile <b> <?=$_SESSION['id']?> </b>  
                        </div>
                        <div class="panel-body">
						<a href="index.php" class="buttonss">&nbsp; BACK TO HOME</a> <br> <br>
                        <p>	
						
					<div id="container">
		
			<div id="row">
				<div id="left"> Name
				</div>	
				<div id="middle-1"> Username
				</div>
				<div id="middle-2"> Access
				</div>
				<div id="right"> Photo
				</div>
			</div>
			
			<div id="row">
				<div id="left">	<input type="text" value="<?php echo $full_name;?>" disabled/>
				</div>
				<div id="middle-1">	<input type="text" value="<?php echo $username;?>" disabled/>
				</div>
				<div id="middle-2"> <input type="text" value="<?php echo $role;?>" disabled/>
				</div>
				<div id="right">  <input type="text" disabled/>
				</div>
			</div>
			
			<br>
		</div>
					
	
				
						

		
	</p>
                        </div>
                        
                    </div>

<?php }else{ ?>
			
			<script type="text/javascript">
				alert('A C C E S S  D E N I E D !');
				window.location="../../module/redirect.php";
			</script>

<?php } ?>	