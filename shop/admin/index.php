<?php include 'header.php'; ?> 
<div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 
  		<!--banner-->	
		    <div class="banner">
		   
				<h2>
				<a href="index.php">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Dashboard</span>
				</h2>
		    </div>
		<!--//banner-->
		<!--content-->
		<div class="content-top">
			
			<?php
                           // include('../connect.php');
				$result = $db->prepare("SELECT count(*) as total FROM products");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
                                    
                  
               ?> 
			<div class="col-md-12 ">
				<div class="content-top-1">
				<div class="col-md-6 top-content">
					<h5>Total Products</h5>
					<label><?php echo $row['total']; ?></label>
				</div>
                                <?php }?>
                                    
				<div class="col-md-6 top-content1">	   
                                    <div ><a href="add_product.php"> <span class="pie-value">Add Product</span></a> </div>
				</div>
                                    
				 <div class="clearfix"> </div>
				</div>
				<div class="content-top-1">
                                    <?php
                           // include('../connect.php');
				$result = $db->prepare("SELECT count(*) as total FROM category");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
                                    
                  
               ?> 
				<div class="col-md-6 top-content">
					<h5>Categories</h5>
					<label><?php echo $row['total']; ?></label>
				</div>
                                <?php }?>
				<div class="col-md-6 top-content1">	   
                                    <div > <a href="category.php"><span class="pie-value">Add Category</span></a> </div>	
                                </div>
				 <div class="clearfix"> </div>
				</div>
			</div>
                </div>
       </div>
       </div>

	 

     <?php include 'footer.php';?>