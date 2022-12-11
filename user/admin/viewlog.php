<?php 
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   
?>



<style>
	
.button7 {
    background-color:#dddddd;
    color: #333; 
	box-shadow:0px 8px 8px 0px #f7f7f7;
    border: 2px solid #dddddd;
}

.button7:hover {
    cursor:pointer;
    color:#fff;
	border: 2px solid #428bca;
}
	
</style>



                    <div class="panel panel-primary">
                        <div class="panel-heading">
                          UserLog History
                        </div>
                        <div  class="panel-body">
                      <a href="index.php" class="buttonss">&nbsp; BACK TO HOME</a> <br>
						
					  <br>



 <div>
 <table class="table" id="example">
    <thead >
      <tr>
    <th>S No</th>
    <th>Username</th>
    <th>LogIn Time</th>
    <th>Logout Time</th>
 
	
	
      </tr>
    </thead>
    
    <?php

		$sql_sel="SElECT * FROM user_log";
		$result=mysqli_query($conn, $sql_sel);
		if (mysqli_num_rows($result)>0){
		$i=0;
		while($row=mysqli_fetch_array($result)){
		$i++;
	?>
	
  <tr >
    <td><?php echo $i;?></td>
    <td><?php echo $row['username'];?></td>
    <td><?php echo nl2br(date("F j\nY, g:i A", strtotime($row['login_time'])));?></td>
    <td><?php echo nl2br(date("F j\nY, g:i A", strtotime($row['logout_time'])));?></td>

	
	
  </tr>
  

  <?php	
   }}
	// ----- for search studnens------	
		
	
    ?>
	
  </table>
  </div>





  </div>
  
                       
                    </div>
            
			





<?php }else{ ?>
			
			<script type="text/javascript">
				alert('A C C E S S  D E N I E D !');
				window.location="../../module/redirect.php";
			</script>

<?php } ?>	