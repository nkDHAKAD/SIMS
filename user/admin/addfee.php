<?php 
	include('addfeeck.php');
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {  
?>

	<?php 
				
				function generateRandomString($conn) {
						$length =5;
						$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
						$randomString = '';
						for ($i = 0; $i < $length; $i++) {
							$randomString .= $characters[rand(0, strlen($characters) - 1)];
						}
						$RCP='RC'.$randomString;
						$result=mysqli_query($conn,"select * from student_payment where reciept='$RCP'");
					//	var_dump($result);
						if((mysqli_num_rows($result))!=null){
							generateRandomString($conn);
						}
						return $RCP;
					} 	
			?>
	


<?php
$RCP= generateRandomString($conn);
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
?>

<script>
$(document).ready(function() {
  $('#installm').on('change.txt2', function() {
    $("#txt2").toggle($(this).val() == '1st');
  }).trigger('change.txt2');
});
</script>






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




 <?php

	$sql="SELECT * FROM student WHERE reg_no=$id";
	$result=mysqli_query($conn, $sql);
	$row=mysqli_fetch_array($result);
?>
 




                    <div class="panel panel-primary">
                        <div class="panel-heading">
                          Fee Deposite
                        </div>
                        <div  class="panel-body">
                      <a href="index.php?tag=fee_deposite" class="buttonss"> &nbsp; BACK </a> <br>
							<font color="red">	<?php include('errors.php'); ?> </font> <br>
					  
						<p>	
	<form method="post" autocomplete="off" >				
		<br>
		<div id="container">
			<div id="row">
				<div id="left"> Reciept Number
				</div>
				<div id="middle-1"> <input type="text" name="reciept" value="<?php echo($RCP); ?>" readonly/> 
				</div>
				<div id="middle-2"> Registration No
				</div>
				<div id="right"> <input type="text" name="reg_no" value="<?php echo $row['reg_no']; ?>" readonly/>
				</div>
			</div>
		</div>
		<br>
		<br>
		<div id="container">
			<div id="row">
				<div id="left"> Name
				</div>
				<div id="middle-1">  <h2> <?php echo $row['name']; ?> </h2>
				</div>
					<div id="middle-2"> Registration Date
				</div>
				<div id="right">  <h2> <?php echo $row['reg_date']; ?> </h2>
				</div>
		
			</div>
		</div>
	<br> <br>
	
	<div id="container">
			<div id="row">
			
		
				
				<div id="middle-2"> Course Enrollled
				</div>
						 <?php
	$sqlc="select c.code as code, c.total_fee as total_fee from student_course sc join course c on sc.course_id=c.course_id WHERE sc.reg_no=$id";
	$resultc=mysqli_query($conn, $sqlc);
    while($rowc=mysqli_fetch_array($resultc)){
    ?>
				<div id="right"> <table> <th> <h3> <?php echo  $rowc['code']; ?> </h3> </th> </table>
								<table> <td> <h3> <?php echo  $rowc['total_fee']; ?> </h3> </td> </table>
				</div>
			
	<?php }?>
			
		
	
			</div>
		</div>


	
		<br> 
		<br> 
		
		
			<div id="container">
			<div id="row">
				<div id="left"> Installment No
				</div>
				<div id="middle-1"> <select name="installment" id="installm">
										<option> </option>
										<option value="1st">1st Installment </option>
										<option value="2nd">2nd Installment </option>
										<option value="3rd">3rd Installment </option>
										<option value="4th">4th Installment </option>
										<option value="5th">5th Installment </option>
										<option value="6th">6th Installment </option>
										<option value="7th">7th Installment </option>
										<option value="8th">8th Installment </option>
										<option value="9th">9th Installment </option>
										<option value="10th">10th Installment </option>
										<option value="11th">11th Installment </option>
										<option value="12th">12th Installment </option>
									</select>
				</div>
				<div id="middle-2"> Discount 
				</div>
				<div id="right"> <input type="text" name="discount" value="0" id="txt2" onkeyup="sum();">
				</div>
			</div>
		</div>
		
		
		
		<br> 
		<br> 
			<div id="container">
			<div id="row">
				<div id="left"> Total Fee
				</div>
				<div id="middle-1"> Net Fee
				</div>
				<div id="middle-2"> due fee
				</div>
				<div id="right"> amount Paid
				</div>
			</div>
		
	
	
			<div id="row">
			
								
   <?php $sqlc="select * from student_fee where reg_no=$id";
			$resultc=mysqli_query($conn,$sqlc);
			$rowc=mysqli_fetch_array($resultc);
			$fees=$rowc['fees'];
			$balance=$rowc['balance'];
	?>
				<div id="left"> <input type="text" value="<?php echo $fees; ?>" disabled />
				</div>
	
	<?php $sqlc="select sum(discount) as dis from student_payment where reg_no=$id";
			$resultc=mysqli_query($conn,$sqlc);
			$rowc=mysqli_fetch_array($resultc);
			$dis=$rowc['dis'];
			$netfees=$fees-$dis;
			
	?>
	
	
				<div id="middle-1"> <input type="text" value="<?php echo $netfees;?>" disabled />
				</div>
				<div id="left"> <input type="text" name="balance"  value="<?php echo $balance;?>" readonly />
				</div>

	
	
	

			<div id="right"> <input type="text" name="amount">
				</div>
			
			
			</div>
		
		</div>
		<br>
		<br>
		
				<div id="container">
			<div id="row">
				<div id="left"> Payment Mode
				</div>
				<div id="middle-1">  
				</div>
				<div id="middle-2"> 
				</div>
				<div id="right">  Remark
				</div>
			</div>
		
	
	
			<div id="row">
				<div id="left"> <select name="pmode"> 
									<option> Cash </option>
									<option> online UPI </option>
								</select>
				</div>
	


				<div id="middle-1">
				</div>
		

			<div id="middle-2"> 
				</div>
				<div id="right"> <textarea> </textarea>
				</div>
			</div>
		
		</div>
		
		<br>
		<br>



		
		<div id="container">
		<button type="submit" name="pay_fee" class="button button2"> Submit </button>
		
		</div>
		
		
		</div>
			
			
</form>

						</p>







  </div>
  
                       
                    </div>
            
	






<?php }else{ ?>
			
			<script type="text/javascript">
				alert('A C C E S S  D E N I E D !');
				window.location="../../module/redirect.php";
			</script>

<?php } ?>	