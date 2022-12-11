<?php 
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   
?>

          
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           Support 
                        </div>
						
						
						
                        <div class="panel-body">
                        <a href="index.php" class="buttonss">&nbsp; BACK TO HOME</a> <br> <br>
                        <p>	
						
					<div id="container">
						
							<b> Contact: </b> nkdhakedjpr@gmail.com
					</div>
										
							
						
							
							
							
						
						</p>
							
							
							
                
                       
						
						
                    </div>
               
				
				
<?php }else{ ?>
			
			<script type="text/javascript">
				alert('A C C E S S  D E N I E D !');
				window.location="../../module/redirect.php";
			</script>

<?php } ?>