<?php 
//login template
   session_start();
   if (!isset($_SESSION['username']) && !isset($_SESSION['id'])) {   ?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	
		<title>SIMS Web Portal</title>
		
	</head>
<body>

	<script type="text/javascript">
				alert('A C C E S S  D E N I E D !');
				window.location="../index.php";
			</script>
	
</body>
</html>
<?php }else{
	header("Location: ../module/redirect.php");
} ?>

	
	