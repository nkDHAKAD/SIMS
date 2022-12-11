<?php 
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   
?>


<!--for delete Record -->
<?php
	
	$opr="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	if($opr=="del")
{
	
	$sql="update student set delete_status='active' where reg_no='$id'";
	$result=mysqli_query($conn, $sql);
      

?>
<script type="text/javascript">
	alert('Activated');
	window.location="index.php?tag=inactive_admission";
	</script>

	<?php
	}
	?>



<style>
	

p{
	padding:0px;
	color:#858796;
	font-family:calibri;
	
}
p b{
	color:#858796;
	font-family:calibri;
	font-size:16px;
}
.due{
	font-size:32px;
	color:red;
}
	
</style>




                    <div class="panel panel-primary">
                        <div class="panel-heading">
                          In-Active Admission
                        </div>
                        <div  class="panel-body">
                      <a href="index.php" class="buttonss">&nbsp; BACK TO HOME</a> <br> <br>
						<p>	
					
	<form method="post" autocomplete="off" >				
		<div id="container">
			<br>
				Select Year
					<br>
			
			
					<select name="year">
										<option> <?php echo date('Y'); ?> </option>
										<?php
											for($n=2017;$n<=2050;$n++){
												?>
												<option value="<?php echo $n; ?>"><?php echo $n; ?></option>
												<?php
											}
										?>
									</select>
						
					&nbsp; <button type="submit" name="submit" class="button button2">Fetch</button>
			
		</div>
			<br>
			
			
</form>

</p>


<p>
	




<div>
 <table class="table" id="example">
    <thead >
      <tr>
    <th width="10px">S No</th>
    <th>Personal Info</th>
    <th width="40px">Photo</th>
	<th width="190px">Contact Detail</th>
    <th width="70px">Course Enrolled</th>
    <th width="117px">Payment Detail</th>
    <th width="40px">Registration Date</th>
    
    <th width="40px">Action</th>
	
	
      </tr>
    </thead>
    
	 <?php
	if(isset($_POST['submit'])){
		$year=$_POST['year'];
	
	
	if($year !=""){
		$sql_sel="SElECT * FROM student WHERE year(reg_date)='$year' and delete_status='leave'";
		$result=mysqli_query($conn, $sql_sel);
		if (mysqli_num_rows($result)>0){
		$i=0;
		while($row=mysqli_fetch_array($result)){
		$i++;
	?>
	
	
  <tr >
    <td><?php echo $i;?></td>
    <td>	<p>Status
				<?php if($row['delete_status']=='active') { ?>
					<button class="buttonactive"><?php echo $row['delete_status'];?></button>
				<?php	}else{?>
					<button class="buttonleave"><?php echo $row['delete_status'];?></button>
				<?php }?>
			</p>
			<p>REG NO					<b><?php echo $row['reg_no'];?></b></p>
			<p>Name			 			<b><?php echo $row['name'];?></b></p> 
			<p>Father/Husband Name		<b><?php echo $row['fname'];?></b></p>
			<p>Gender 					<b><?php echo $row['gender'];?></b></p>
			<p>Date of Birth			<b><?php echo $row['date_of_birth'];?></b></p>
			<p>Physically Challenged	<b><?php echo $row['physically_ch'];?></b></p>
			<p>Proof of ID				<b><?php echo $row['proof_of_id'];?></b></p>
			<p>PID No					<b><?php echo $row['id_no'];?></b></p>
			<p>Remark(If any)			<b><?php echo $row['remark'];?></b></p>
			
	</td>
	
		<td> <p><img height="80px" width="77px" src="../../upload/demo.png" /></p>
			
		</td>
	<td>
			<p>Mobile(self/alternate)<br>	<b><?php echo $row['phone_self'];?><br><?php echo $row['phone_parent'];?></b></p>
			<p>Email<br>					<b><?php echo $row['email'];?></b></p>
			<p>Address<br>					<b><?php echo $row['address'];?> <?php echo $row['pin'];?></b></p>
			
	</td>
	<td>
			<?php
			$reg_no=$row['reg_no'];
			$sqlc="select c.code as code, c.total_fee as total_fee from student_course sc join course c on sc.course_id=c.course_id WHERE sc.reg_no=$reg_no";
			$resultc=mysqli_query($conn, $sqlc);
			while($rowc=mysqli_fetch_array($resultc)){
			?>
				<p><b><?php echo $rowc['code']; ?></b></p>		
					
			<?php }?>
    </td>
    <td> 
			<?php $sqlc="select * from student_fee where reg_no=$reg_no";
			$resultc=mysqli_query($conn,$sqlc);
			$rowc=mysqli_fetch_array($resultc);
			$fees=$rowc['fees'];
			$balance=$rowc['balance'];
			?>
				<p>Total Fees	<b>&#x20B9;<?php echo  $fees; ?></b></p>	
				
	
	<?php $sqlc="select sum(discount) as dis, sum(amount) as amt from student_payment where reg_no=$reg_no";
			$resultc=mysqli_query($conn,$sqlc);
			$rowc=mysqli_fetch_array($resultc);
			$dis=$rowc['dis'];
			$amt=$rowc['amt'];
			$netfees=$fees-$dis;
			
	?>
	
		<?php $sqlc="select max(date)  as reg_date from student_payment where reg_no=$reg_no";
			$resultc=mysqli_query($conn,$sqlc);
			$rowc=mysqli_fetch_array($resultc);
				$dates=$rowc['reg_date'];
	?>
	
					
				<p>Discount		<b>&#x20B9;<?php echo  $dis; ?></b></p>		
				<p>Net Fees		<b>&#x20B9;<?php echo  $netfees; ?></b></p><br>
				<p>Amount Paid	<b>&#x20B9;<?php echo  $amt; ?></b></p>
				<p>Last Payment on<br><b><?php echo nl2br(date("F j\nY, g:i a", strtotime($dates))); ?></b></p>
				<p>Due Fees<br><b class="due">&#x20B9;<?php echo  $balance; ?></b></p>					
		
	
	</td>
    <td><?php echo nl2br(date("F j\nY H:i:s", strtotime($row["reg_date"])));?></td>
    
	<td>
		<a href="?tag=inactive_admission&opr=del&rs_id=<?php echo $row['reg_no'];?>" 
					onclick="return confirm('sure Activate?');"
					title="Activate"><img height="25px" src="../../upload/active.png" />		

	</td>
	
	
  </tr>
  
  
  	<?php } ?> 

	<font color="green"> <h3>Student Fetched Successfully</h3> </font>
 <?php	
	}else{
	
		?>
		<font color="red"> <h3>No Record Found</h3> </font>
  <?php	
    }}}
	// ----- for search studnens------	
		
	
    ?>
    
  </table>

	</div>	



						</p>

  </div>
             <br/>           
                    </div>







<?php }else{ ?>
			
			<script type="text/javascript">
				alert('A C C E S S  D E N I E D !');
				window.location="../../module/redirect.php";
			</script>

<?php } ?>	