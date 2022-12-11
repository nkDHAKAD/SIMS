<?php 
   include "../../connect/db_conn.php";
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

<script type="text/javascript">

       function PrintDoc() {

        var toPrint = document.getElementById('printarea');

        var popupWin = window.open('', '_blank', 'width=595,height=842,location=no,left=200px');

        popupWin.document.open();

        popupWin.document.write('<html><title> Preview </title> <p align="center"> Course Details  </p> <link rel="stylesheet" type="text/css" href="css/bootstrap.css" /> <link rel="stylesheet" type="text/css" href="css/dashboard.css" /> <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css" /> </head><body onload="window.print()">')

        popupWin.document.write(toPrint.innerHTML);

        popupWin.document.write('</html>');

        popupWin.document.close();

    }

</script>


                    <div class="panel panel-primary">
                        <div class="panel-heading">
                          View Course Details
                        </div>
                        <div  class="panel-body">
                      <a href="index.php" class="buttonss">BACK TO HOME</a> <br> <br>
						<p>	
					
<button class="button7" onclick="PrintDoc()"> Print </button>
<button class="button7" onclick="PrintDo()"> Copy </button>
<button class="button7" onclick="PrintDo()"> PDF </button>
	


 <div id="printarea" style="overflow:auto;">
 <table class="table" id="example">
    <thead >
      <tr>
    <th>S No</th>
    <th> Code</th>
    <th>Title</th>
    <th>Duretion</th>
    <th>Registration Fee</th>
    <th>Certificate Fee</th>
    <th>Tution Fee</th>
    <th>Total Fee</th>
	
	
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
	
	
  </tr>
  
  
    <?php	
    }
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