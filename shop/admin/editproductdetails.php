<style type="text/css">
<!--
.ed{
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
margin-bottom: 4px;
}
#button1{
text-align:center;
font-family:Arial, Helvetica, sans-serif;
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
background-color:#00CCFF;
height: 34px;
}
-->
</style>
<!--sa input that accept number only-->
<SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->
   </SCRIPT>

<?php include 'header.php';?>
 <div id="page-wrapper" class="gray-bg dashbard-1">
  <div class="content-main">
<div class="grid-form">
<div class="grid-form1">
  	       <h3>Update Product</h3>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
                                                  <?php
	include('../db.php');
	$id=$_GET['id'];
	$result = mysql_query("SELECT * FROM products where ID='$id'");
		while($row = mysql_fetch_array($result))
			{
				$pname=$row['Product'];
				$desc=$row['Description'];
				$price=$row['Price'];
				$cat=$row['Category'];
			}
?>  
                                                    
                                                    
							<form class="form-horizontal" action="execeditproduct.php" method="post">
							<input type="hidden" name="prodid" value="<?php echo $id=$_GET['id'] ?>">
		<div class="form-group">
									<label for="text" class="col-sm-2 control-label">Product Name</label>
									<div class="col-sm-8">
                                                                            <input type="text" name="pname" class="form-control1" id="focusedinput" value="<?php echo $pname ?>">
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
								<div class="form-group">
									<label type="text" class="col-sm-2 control-label">Description</label>
									<div class="col-sm-8">
                                                                            <input type="text" name="desc" class="form-control1" id="disabledinput" value="<?php echo $desc ?>">
									</div>
								</div>
								<div class="form-group">
									<label type="text" class="col-sm-2 control-label">Price</label>
									<div class="col-sm-8">
                                                                            <input type="text" name="price" class="form-control1" id="inputPassword" value="<?php echo $price ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="cat" class="col-sm-2 control-label">Category</label>
									<div class="col-sm-8"><select name="cat" id="selector1" class="form-control1">
<?php
                include('../db.php');
                $r = mysql_query("select * from category"); 
                while($row = mysql_fetch_array($r)){
                    $selected = ($cat == $row['title']) ? " selected='selected'" : "";
                     echo '<option '.$selected.'>'.$row['title'].'</option>';
                }
            ?>
									</select></div>
								</div>
                                                            
      <div class="panel-footer">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<button class="btn-primary btn" name="Submit">Update</button>
			</div>
		</div>
	 </div>
							</form>
						</div>
					</div>
				
      
   
  </div>
</div></div></div>


<?php include 'footer.php'; ?>