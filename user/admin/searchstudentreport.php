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
                          View Admission Report
                        </div>
                        <div  class="panel-body">
                      <a href="index.php" class="buttonss">&nbsp; BACK TO HOME</a> <br>
						
					  <br>
						<p>	
	<form method="post" autocomplete="off" >				
		<div id="container">
		
			<div id="row">
				<div id="left"> Search By Name
				</div>	
				<div id="middle-1"> Select year
				</div>
				<div id="middle-2"> Search By Month
				</div>
				<div id="right"> Search By Course
				</div>
			</div>
			
			<div id="row">
				<div id="left">	<input type="text" name="name">
				</div>
				<div id="middle-1">	<select name="year">
										<option> </option>
										<?php
											for($n=2017;$n<=2050;$n++){
												?>
												<option value="<?php echo $n; ?>"><?php echo $n; ?></option>
												<?php
											}
										?>
									</select>
											
				</div>
				<div id="middle-2">   	
										<select name="month">
										<option> </option>
											<?php

												for ($i = 1; $i <= 12; $i++)
												{
													$month = date('F', mktime(0, 0, 0, $i, 1, 2011));
													?>
													<option value="<?php echo $i; ?>"><?php echo $month; ?></option>
													<?php
												}

											?>
										</select>
				</div>
				<div id="right"> 		
				 
				
          
        <select name="courses">
					<option> </option>
          <?php
include_once('../../connect/db_conn.php');
$sql="SELECT * FROM course";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
	while($row=mysqli_fetch_assoc($result)){
?> 
									
     								<option value="<?php echo $row["course_id"]; ?>"><?php echo $row['code']; ?></option>
<?php }} ?>
        </select>
	  
     
    
		
	
				
				
				</div>
			</div>
			<br>
			
			<button type="submit" name="submit" class="button button2"> Search </button>
</div>
</form>

						</p>


<br>

	


 <div id="printarea" style="overflow:auto;">
 <table class="table" id="example">
    <thead >
      <tr>
    <th> Reg No</th>
    <th> Name</th>
    <th>Father/Husband Name</th>
    <th>Gender</th>
    <th>Date of Birth</th>
    <th>Physically Challenged</th>
    <th>Status</th>
    <th>Proof of ID <br> ID NO</th>
    <th>Mobile No(self)</th>
    <th>Address</th>
    <th>Email ID</th>
    <th>Reg Month</th>
    <th>Reg Year</th>
    <th>Registration Date</th>
	
	
      </tr>
    </thead>
    
    <?php
	if(isset($_POST['submit'])){
		$name=$_POST['name'];
		$year=$_POST['year'];
		$month=$_POST['month'];
	
	
	if($year!="" and $month!=""){
		$sql_sel="SElECT * FROM student WHERE year(reg_date)='$year' and month(reg_date)='$month'";
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
    <td><?php echo $row['physically_ch'];?></td>
    <td><?php echo $row['status'];?></td>
    <td><?php echo $row['proof_of_id'];?> <?php echo $row['id_no'];?></td>
    <td><?php echo $row['phone_self'];?> <?php echo $row['phone_parent'];?></td>
    <td> <?php echo $row['address'];?> <?php echo $row['pin'];?> </td>
    <td><?php echo $row['email'];?></td>
    <td><?php echo $row['reg_month'];?></td>
    <td><?php echo $row['reg_year'];?></td>
    <td><?php echo $row['reg_date'];?></td>
	
	
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