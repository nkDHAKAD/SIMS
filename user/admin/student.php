<?php 
	include('addstudent.php');
	if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   
?>



<!-- start uppercase -->
<script>
jQuery(document).ready(function(){ 
        jQuery('text').keyup(function() {
            this.value = this.value.toLocaleUpperCase();
        });
        jQuery('textarea').keyup(function() {
            this.value = this.value.toLocaleUpperCase();
        });
 });
</script>
<!-- end uppercase -->

<script>

function ValidateFileUpload() {

var fuData = document.getElementById('fileChooser');
var FileUploadPath = fuData.value;


if (FileUploadPath == '') {
    alert("Please upload an image");

} else {
    var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();



    if (Extension == "jpeg" || Extension == "jpg") {


            if (fuData.files && fuData.files[0]) {

                var size = fuData.files[0].size;

                if(size > 50000 || size < 20000){
                    alert("file size between 20 to 50 kb allowed");
                    return;
                }else{
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(fuData.files[0]);
                }
            }

    } 


else {
        alert("Photo only allows file types of JPG and JPEG.");
    }
}}

</script>


   
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                        Online Admission
                        </div>
                        <div class="panel-body"> 
						<a href="index.php" class="buttonss">&nbsp; BACK TO HOME</a> <br> 
						<font color="red">	<?php include('errors.php'); ?> </font>
						<br>
						<p>	
						
						
	 <form method="post" autocomplete="off" >
	

		<div id="container">
		
			<div id="row">
				<div id="left">Registration No
				</div>	
				<div id="middle-1"> Learner Full Name
				</div>
				<div id="middle-2"> Father/Husband Name
				</div>
				<div id="right"> Course Applied For
				</div>
			</div>
			
			<div id="row">
				<div id="left">	<input type="text"  name="reg_no">
				</div>
				<div id="middle-1">	<input type="text" name="name" onKeyUP="this.value = this.value.toUpperCase();"  placeholder="Learner Full Name">
				</div>
				<div id="middle-2"> <input type="text" name="fname" onKeyUP="this.value = this.value.toUpperCase();" placeholder="Father/Husband Name">
				</div>
				<div id="right"> 		
				 
				
          
        <select name="course[]" multiple multiselect-search="true" multiselect-select-all="true" multiselect-max-items="2" onchange="console.log(this.selectedOptions)">
      
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
	  
     
      <script src="../../assets/js/multiselect-dropdown.js" ></script>
		
	
				
				
				</div>
			</div>
			
			<br>
			<br>
			
			<div id="row">
				
				<div id="left">Date of Birth
				</div>
				<div id="middle-1"> Gender
				</div>
				<div id="middle-2"> Email
				</div>
				<div id="right"> Physically Challenged
				</div>
			</div>
			<div id="row">
				<div id="left">	<input type="date" name="date_of_birth" placeholder="Date of Birth">
				</div>
				<div id="middle-1"> <select name="gender">
									<option value=""> </option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									</select> 
				</div>
				<div id="middle-2"> <input type="email" name="email" placeholder="Email">
				</div>
				<div id="right"> <select name="physically_ch">
									<option value="No">No</option>
									<option value="Yes">Yes</option>
									</select> 
				</div>
			</div>
			
			<br>
			<br>
			
			
			<div id="row">
				
				<div id="left">Proof of Identity
				</div>
				<div id="middle-1"> PID No
				</div>
				<div id="middle-2"> Mobile No (Self)
				</div>
				<div id="right"> Mobile No (alternate)
				</div>
			</div>
			<div id="row">
				<div id="left">	 <select name="proof_of_id">
											<option value=""> </option>
                            <option value="Aadhar Card">Aadhar Card</option>
                            <option value="PAN Card">PAN Card</option>
                            <option value="Voter ID Card">Voter ID Card</option>
                            <option value="Driving License">Driving License</option>
                            <option value="Passport">Passport</option>
                            <option value="Employer ID Card">Employer ID card</option>
                            <option value="Government ID Card">Government ID Card</option>
                            <option value="College ID Card">College ID Card</option>
                            <option value="School ID Card">School ID Card</option>
						</select>
				</div>
				<div id="middle-1"><input type="text" name="id_no" placeholder="PID No">
				</div>
				<div id="middle-2"> <input type="text" name="phone_self" placeholder="Mobile No (Self)">
				</div>
				<div id="right"> <input type="text" name="phone_parent" placeholder="Mobile No (alternate)">
				</div>
			</div>
			
			<br>
			<br>
			
			<div id="row">
				
				<div id="left">Address
				</div>
				<div id="middle-1"> 
				</div>
				<div id="middle-2"> 
				</div>
				<div id="right"> Remark
				</div>
			</div>
			
			<div id="row">
				<div id="left">	<textarea name="address" onKeyUP="this.value = this.value.toUpperCase();"> </textarea>
				</div>
				<div id="middle-1"> <input type="text" name="pin" placeholder="Pin Code">
				</div>
				<div id="middle-2"> 
				</div>
				<div id="right"> <textarea> </textarea>
				</div>
			</div>
				
				<br>
				<br>
				
			<div id="row">
				
				<div id="left"> Photo
				</div>
				<div id="middle-1"> 
				</div>
				<div id="middle-2">
				</div>
				<div id="right"> 
				</div>
			</div>
			<div id="row">
				<div id="left">	              
                                                    <img id="blah"  style="width:130px;height:150px;" /> <br>
                                                    <input type="file" name="pp" value="" id="fileChooser" onchange="return ValidateFileUpload();" style="margin-top:7px;"  />
				</div>
				<div id="middle-1">
				</div>
				<div id="middle-2"> 	
				</div>
				<div id="right">
				</div>
			</div>
	
			
		</div>
				
		
						</p>
                        </div>
                        <div class="panel-footer">
                           <button name="new_add" type="submit" class="button button2">Submit</button>
                        </div>
						
						</form>
                    </div>
            


<?php }else{ ?>
			
			<script type="text/javascript">
				alert('A C C E S S  D E N I E D !');
				window.location="../../module/redirect.php";
			</script>

<?php } ?>