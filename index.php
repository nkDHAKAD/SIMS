<?php 
//login template
   session_start();
   if (!isset($_SESSION['username']) && !isset($_SESSION['id'])) {   ?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	
		<title>SIMS Web Portal</title>
		<link href="assets/css/index.css" rel="stylesheet" type="text/css">
		
		<!-- Date and Time Js -->
		<script type="text/javascript" src="assets/js/date_time.js"></script>
		<!-- Date and Time Js -->
		
	</head>
	

    <style>
        .blink {
            animation: blinker 2s linear infinite;
            color: red;
            font-family: sans-serif;
        }
        @keyframes blinker {
            100% {
                opacity: 0;
            }
        }
    </style>

	
	
<body>

	<div class="top" style="background-image: url(upload/bg-noise.png);">
		<div>
			
			
						<b><p id="clockbox"></p></b>				
						<p id="clockbox1"></p>
					
			
		</div>
	</div>
	
	<div class="head">
		<div>
			SIMS Web Portal
		</div>
	</div>
	
	<div class="pages">
		<div class="pages_up">
		
				    <div class="panel panel-primary">
                      
					   <div class="panel-heading">
                          <H3 align="center">Welcome to SIMS Pannel</H3>
                        </div>
					
                        <div class="panel-body">
                        <p>	
							
							
					<ul class="tab">
  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">LogIn Space</a></li>
  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Paris')">Notification</a></li>
  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Tokyo')">Download</a></li>
</ul>

<div id="London" class="tabcontent">
  
		<table border="0" cellspacing="8px" width="500px" align="center">
						<form action="module/userlogin.php" method="post" autocomplete="off" >
						  <?php if (isset($_GET['error'])) { ?>
							<tr><td align="center" colspan="3" class="blink"> <font color="red"><?=$_GET['error']?> </font>  </td></tr>
						  <?php } ?>
						<tr height="12px">
							
						</tr>
						
						   <tr>
							<td rowspan="5" width="150px" align="center" style="padding-top:0px;padding-left:0px;">
								<img src="upload/login-icon-17.jpg"  height="100px" width="100px" /></td>
						</tr>
						  
						  <tr>
							<td><b>Access Type </b></td>
							<td> 
								<select name="role" required/>
								 	  <option value=""> </option>
								 	  <option value="admin">Admin</option>
								 	  <option value="faculty">Faculty</option>
									  
								</select>
							</td>
						  </tr>
						  
						  <tr>
							<td><b>Username </b></td>
							<td>
							  <input name="username" placeholder="Enter Username" type="text" id="username">
							</td>
						  </tr>
						  <tr>
							<td><b>Password </b></td>
							<td><input name="password" placeholder="Enter Password" type="password" id="password" ></td>
						  </tr>
 
						  <tr>
							<td colspan="2" align="center">
							  <input type="submit" value="LogIn"> &nbsp;
							  <input name="res" type="reset" id="res" value="Reset">
							</td>
						</tr>
							<tr>
								<td align="center" colspan="3"> <a href="#"> Forgot Password? for Admin Only </a></td>
							</tr>
							
							<tr height="20px">
							
						</tr>
						
						</form>
					</table>
  
</div>

<div id="Paris" class="tabcontent">
	
	<font color="#5f5f5f">  <p><b>Important Features</b></p><br>
					1) Secure Login <br>
					2) Admin Pannel <br>
					3) Faculty Pannel <br>
					4) Student Management <br>
					5) Fee Management <br> <br><br>
 				<p align="center">© SIMS 2019-2022 | All Rights Reserved, Site Designed & developed by nkDHAKAD </p>
						
			</font>
	
</div>

<div id="Tokyo" class="tabcontent">
 
 <font color="#5f5f5f"> not required </font>
 
</div>




						
						
						</p>
						
					
                        </div>
                        
                    </div>
			

		</div>
	</div>
	
	
	<div class="bottom" style="background-image: url(upload/bg-noise.png);">
		<div>
			&copy; SIMS 2019-<?php echo date("Y"); ?> | All Rights Reserved, Site Designed & developed by <b>nkDHAKAD</b>
		</div>
	</div>
	
</body>
</html>
<?php }else{
	header("Location: module/redirect.php");
} ?>

<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
	
	