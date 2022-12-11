<?php 
	include "../../connect/db_conn.php";
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
	
	$sql="DELETE FROM course WHERE course_id=$id";
	$result=mysqli_query($conn, $sql);
      

?>
<script type="text/javascript">
	alert('DELETED');
	window.location="index.php";
	</script>

	<?php
	}
	?>






                    <div class="panel panel-primary">
                        <div class="panel-heading">
                          Edit Course Details
                        </div>
                        <div class="panel-body">
						<a href="index.php" class="buttonss">BACK TO HOME</a> <br>
                        <p>	
<div style="overflow:auto;">
  <table class="table" id="example">
    <thead>
      <tr>
        <th>S No</th>
    <th>Code</th>
    <th>Course Title</th>
    <th>Duration</th>
    <th>Registration Fee</th>
    <th>Certificate Fee</th>
    <th>Tution Fee</th>
    <th>Total Fee</th>
    <th>Update</th>
    <th>Delete</th>
      </tr>
    </thead>
    
      
   <?php
  
	$sql="SELECT * FROM course";
	$result=mysqli_query($conn, $sql);
    $i=0;
    while($row=mysqli_fetch_array($result)){
    $i++;
    ?>
  <tr >
    <td><?php echo $i;?></td>
    <td><?php echo $row['code'];?></td>
    <td><?php echo $row['title'];?></td>
    <td><?php echo $row['duretion'];?></td>
    <td><?php echo $row['reg_fee'];?></td>
    <td><?php echo $row['cer_fee'];?></td>
    <td><?php echo $row['tution_fee'];?></td>
    <td><?php echo $row['total_fee'];?></td>
    <td>&nbsp;<a href="?tag=edit_course&opr=upd&rs_id=<?php echo $row['course_id'];?>" title="Update"><img height="25px" src="../../upload/edit10.png" /></a></td>
    <td>&nbsp;<a href="?tag=modify_course&opr=del&rs_id=<?php echo $row['course_id'];?>" 
					onclick="return confirm('sure DELETE?');"
					title="Delete"><img height="25px" src="../../upload/delete2.png" />
		</td>
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