<?php 
	include('chngpasswordck.php');
	if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   
?>




   
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                        Change Password
                        </div>
                        <div class="panel-body"> 
						<a href="index.php" class="buttonss">&nbsp; BACK TO HOME</a> <br> 
						<font color="red">	<?php include('errors.php'); ?> </font>
						<br>
						<p>	
						
						
	 <form method="post" autocomplete="off">
	

		<div id="container">
		
			<div id="row">
				<div id="left"> Old Password
				</div>	
				<div id="middle-1"> New Password
				</div>
				<div id="middle-2"> Confirm Password
				</div>
				<div id="right"> Username
				</div>
			</div>
			
			<div id="row">
				<div id="left">	<input type="password" name="op">
				</div>
				<div id="middle-1">	<input type="password" name="np">
				</div>
				<div id="middle-2"> <input type="password" name="c_np">
				</div>
				<div id="right"> 	<input type="text" value="<?=$_SESSION['username'] ?>" disabled/>
				</div>
			</div>
			
			<br>
			
				<button name="change_pass" type="submit" class="button button2">Submit</button>
		
						</p>
                        </div>
                       
						
						</form>
                    </div>
            



<?php }else{ ?>
			
			<script type="text/javascript">
				alert('A C C E S S  D E N I E D !');
				window.location="../../module/redirect.php";
			</script>

<?php } ?>