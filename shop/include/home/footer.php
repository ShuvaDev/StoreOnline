<div class="footer-bottom">
			<div class="container">
				<div class="row"> <?php
                            //include('../connect.php');
				$result = $db->prepare("SELECT * FROM settings");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
              ?> 
                                    
					<p class="pull-left">Copyright © 2017 <?php echo $row['site_name']; ?>. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="hillsofts.com">Hillsofts</a></span></p>
                                <?php }?></div>
			</div>
		</div>
						
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/script.js"></script>
</body>
</html>