<?php include('include/home/header.php'); ?>
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>About Us</h2>
						<?php
                            //include('../connect.php');
				$result = $db->prepare("SELECT * FROM settings");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
              ?> 
                                                
                             <?php echo $row['site_about']; ?>                   
                                                
                                <?php }?>
					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
<?php include('include/home/footer.php'); ?>