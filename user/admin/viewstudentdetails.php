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




 <?php

	$sql="SELECT * FROM student WHERE reg_no=$id";
	$result=mysqli_query($conn, $sql);
	$row=mysqli_fetch_array($result);
?>
 




                    <div class="panel panel-primary">
                        <div class="panel-heading">
                          Payment History
                        </div>
                        <div  class="panel-body" style="background: linear-gradient(to top left, #ffffff 0%, #ffffee 100%);">
                      <a href="index.php?tag=view_admission" class="buttonss"> &nbsp; BACK </a> <br>
						
					  
						<p>					
	
<br>

<?php $sqlc="select sum(amount) as dis from student_payment where reg_no=$id";
			$resultc=mysqli_query($conn,$sqlc);
			$rowc=mysqli_fetch_array($resultc);
			$dis=$rowc['dis'];
		
			
	?>
	
	Total Fees Collection: 	<h3>&#x20B9;<?php echo $dis;?></h3>


<div id="printarea" style="overflow:auto;">
 <table class="table" id="example">
    <thead >
      <tr>
    <th>S No</th>
    <th> Reciept No</th>
    <th>amount paid</th>
    <th>Total Discount</th>
    <th>installment no</th>
    <th>Pay mode</th>
    <th>Date </th>

	
	
      </tr>
    </thead>
    
      
  <?php
  
	$sql="SELECT * FROM student_payment where reg_no=$id";
	$result=mysqli_query($conn, $sql);
    $i=0;
    while($row=mysqli_fetch_array($result)){
    $i++;
    ?>
  <tr >
    <td><?php echo $i;?></td>
    <td><?php echo $row['reciept'];?></td>
    <td><?php echo $row['amount'];?></td>
    <td><?php echo $row['discount'];?></td>
    <td><?php echo $row['installment'];?></td>
    <td><?php echo $row['pay_mode'];?></td>
    <td><?php echo $row['month'];?> &nbsp; <?php echo $row['date'];?></td>
  

	
	
  </tr>
  
  
    <?php	
    }
	// ----- for search studnens------	
		
	
    ?>
    
  </table>


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