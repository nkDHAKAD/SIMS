<?php 
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   
?>




                    <div class="panel panel-primary">
                        <div class="panel-heading">
                          View Transaction History
                        </div>
                        <div  class="panel-body">
                      <a href="index.php" class="buttonss">&nbsp; BACK TO HOME</a> <br>
						
				


<br>

<?php $sqlc="select sum(amount) as dis from student_payment";
			$resultc=mysqli_query($conn,$sqlc);
			$rowc=mysqli_fetch_array($resultc);
			$dis=$rowc['dis'];
		
			
	?>
	
	Total Fees Collection: 	<h3>&#x20B9;<?php echo $dis;?></h3>
	


 <div>
 <table class="table" id="example">
    <thead >
      <tr>
    <th>S No</th>
    <th>Reg No</th>
    <th>Reciept No</th>
    <th>amount paid</th>
    <th>discount</th>
    <th>installment</th>
    <th>pay mode</th>
    <th>date</th>
	
	
      </tr>
    </thead>
    
    <?php
		$sql_sel="SElECT * FROM student_payment";
		$result=mysqli_query($conn, $sql_sel);
		if (mysqli_num_rows($result)>0){
		$i=0;
		while($row=mysqli_fetch_array($result)){
		$i++;
	?>
	
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $row['reg_no'];?></td>
    <td><?php echo $row['reciept'];?></td>
    <td><?php echo $row['amount'];?></td>
    <td><?php echo $row['discount'];?></td>
    <td><?php echo $row['installment'];?></td>
    <td><?php echo $row['pay_mode'];?></td>
    <td><?php echo $row['date'];?></td>
	
	
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