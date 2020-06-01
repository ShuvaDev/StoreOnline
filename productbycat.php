<?php 
	include "inc/header.php";
?>
<?php
    if(isset($_GET['catId']) && $_GET['catId']!=NULL)
    {
        $id = $_GET['catId'];
    }else{
        echo "<script>window.location='404.php'</script>";
    }
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Latest from Iphone</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
		  		<?php
					$productbycat=$pd->productByCat($id);
					if($productbycat)
					{
						while($result=$productbycat->fetch_assoc())
						{
				  ?>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="details.php?proid=<?php echo $result['productId']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2><?php echo $result['productName']?>;</h2>					 
					 <p><span class="price"><?php echo $result['price']?></span></p>   
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
				</div>
				<?php } }else{
					echo "<p>Product of this category are not available!</p>";
				} ?>
			</div>

	
	
    </div>
 </div>
 <?php 
	include "inc/footer.php";
?>