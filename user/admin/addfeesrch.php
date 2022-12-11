<?php 
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
                          Fee Deposite
                        </div>
                        <div  class="panel-body">
                      <a href="index.php" class="buttonss">&nbsp; BACK TO HOME</a> <br>
						
					  <br>
						<p>	
	<form method="post" autocomplete="off" >				
		<div id="container">
			<br>
			 Registration No
					<br>
			
			
					<input type="text" name="reg_no">
						
					&nbsp; <button type="submit" name="submit" class="button button2"> Submit </button>
			
		</div>
			<br>
			
			
</form>

						</p>




	


 <div id="printarea" style="overflow:auto;">
 <table class="table" id="example">
    <thead >
      <tr>
    <th> Reg No</th>
    <th> Name</th>
    <th>Father/Husband Name</th>
    <th>Gender</th>
    <th>Date of Birth</th>
    <th>Registration Date</th>
    <th>Add Payment</th>
	
	
      </tr>
    </thead>
    
   <?php
	if(isset($_POST['submit'])){
		$reg_no=$_POST['reg_no'];
	
	
	if($reg_no !=""){
		$sql_sel="SElECT * FROM student WHERE reg_no='$reg_no'";
		$result=mysqli_query($conn, $sql_sel);
		if (mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_array($result)){
    ?>
	
  <tr >
    <td><?php echo $row['reg_no'];?></td>
    <td><?php echo $row['name'];?></td>
    <td><?php echo $row['fname'];?></td>
    <td><?php echo $row['gender'];?></td>
    <td><?php echo $row['date_of_birth'];?></td>
    <td><?php echo $row['reg_month'];?>  &nbsp; <?php echo $row['reg_date'];?></td>
    <td> <a href="?tag=fees_deposite&opr=upd&rs_id=<?php echo $row['reg_no'];?>" class="buttonsss"> Fee Deposite </a> </td>
	
	
  </tr>
  
		<?php } ?> 

	<font color="green"> <h3> Student Fetched Successfully </h3> </font>
 <?php	
	}else{
	
		?>
		<font color="red"> <h3> Record Not Found </h3> </font>
  <?php	
    }}}
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