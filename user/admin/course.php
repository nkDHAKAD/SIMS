<?php 
	include('addcourse.php');
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   
?>


<!-- start uppercase -->
<script>
jQuery(document).ready(function(){ 
        jQuery('input').keyup(function() {
            this.value = this.value.toLocaleUpperCase();
        });
        jQuery('textarea').keyup(function() {
            this.value = this.value.toLocaleUpperCase();
        });
 });
</script>
<!-- end uppercase -->

<script>
function sum() {
      var txtFirstNumberValue = document.getElementById('txt1').value;
      var txtSecondNumberValue = document.getElementById('txt2').value;
      var txtThirdNumberValue = document.getElementById('txt3').value;
      var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue) + parseInt(txtThirdNumberValue);
      if (!isNaN(result)) {
         document.getElementById('txt4').value = result;
      }
}
</script>


    
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                          Add New Course
                        </div>
                        <div class="panel-body">
						<a href="index.php" class="buttonss">BACK TO HOME</a> <br> 
						<font color="red">	<?php include('errors.php'); ?> </font>
						<br>
					  <p>	
						
						
	<form method="post" autocomplete="off">

        <!-- You only need this form and the form-labels-on-top.css -->

		<div id="container">
			<div id="row">
				<div id="left"> Course Code
				</div>
				<div id="middle-1"> Course Title
				</div>
				<div id="middle-2"> Course Duretion
				</div>
				<div id="right">
				</div>
			</div>
			<div id="row">
				<div id="left">	 <input type="text" name="code" placeholder="Course Code">
				</div> 
				<div id="middle-1">	 <input type="text" name="title" placeholder="Course Title">
				</div>
				<div id="middle-2"> <select name="duretion"> 
										<option value=""> select </option> 
										<option> 1 Month </option>
										<option> 2 Months </option>
										<option> 3 Months </option>
										<option> 4 Months </option>
										<option> 5 Months </option>
										<option> 6 Months </option>
										<option> 7 Months </option>
										<option> 8 Months </option>
										<option> 9 Months </option>
										<option> 10 Months </option>
										<option> 11 Months </option>
										<option> 1 Year </option>
										<option> 2 Years </option>
										<option> 3 Years </option>
								</select>
				</div>
				<div id="right"> 
				</div>
			</div>
			<br>
			<div id="row">
				<div id="left">Registration Fee
				</div>
				<div id="middle-1">Certificate Fee
				</div>
				<div id="middle-2">Tution Fee
				</div>
				<div id="right">Total Fee
				</div>
			</div>
			<div id="row">
				<div id="left">	<input type="text" id="txt1" value="100"  onkeyup="sum();" name="reg_fee" placeholder="Registration Fee">
				</div>
				<div id="middle-1">	<input type="text" id="txt2"  value="200" onkeyup="sum();" name="cer_fee" placeholder="Certificate Fee">
				</div>
				<div id="middle-2"> <input type="text" id="txt3" onkeyup="sum();" name="tution_fee" placeholder="Tution Fee">
				</div>
				<div id="right"> <input type="text" id="txt4" name="total_fee" placeholder="Calculate Autometically" readonly>
				</div>
			</div>
			<br>
			

			
		</div>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  			
						&nbsp;
<button name="new_course" type="submit" class="button button2">Submit</button>						
						</p>
						
					</form>
                        </div>
                        
                    </div>

					

					
            

<?php }else{ ?>
			
			<script type="text/javascript">
				alert('A C C E S S  D E N I E D !');
				window.location="../../module/redirect.php";
			</script>

<?php } ?>