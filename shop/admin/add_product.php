
<script type="text/javascript">
function validateForm()
{
var a=document.forms["addproduct"]["pname"].value;
if (a==null || a=="")
  {
  alert("Pls. Enter the product name");
  return false;
  }
var b=document.forms["addproduct"]["desc"].value;
if (b==null || b=="")
  {
  alert("Pls. Enter the product description");
  return false;
  }
 var c=document.forms["addproduct"]["price"].value;
if (c==null || c=="")
  {
  alert("Pls. enter the price");
  return false;
  }
var d=document.forms["addproduct"]["cat"].value;
if (d==null || d=="")
  {
  alert("Pls Enter the oroduct category");
  return false;
  }
 var e=document.forms["addproduct"]["image"].value;
if (e==null || e=="")
  {
  alert("Pls. browse an image");
  return false;
  }
/*if (c.which!=8 && c.which!=0 && (c.which<48 || c.which>57))
  {
  alert("The input U enter in Quantity field is not valid, only numbers are accepted (ex. 1, 2, 3, 4.......)");
  return false;
  }
if (b.which!=8 && b.which!=0 && (b.which<48 || b.which>57))
  {
  alert("The input U enter in Quantity field is not valid, only numbers are accepted (ex. 1, 2, 3, 4.......)");
  return false;
  }*/
}
</script>

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
       <div class="banner">
		    	<h2>
				<a href="index.php">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Add Product</span>
				</h2>
		    </div>
      
<div class="grid-form">
<div class="grid-form1">
  	       <h3>New Product</h3>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" action="addexec.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
								<div class="form-group">
									<label for="text" class="col-sm-2 control-label">Product Name</label>
									<div class="col-sm-8">
                                                                            <input type="text" name="pname" class="form-control1" id="focusedinput" placeholder="Product Name">
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
								<div class="form-group">
									<label type="text" class="col-sm-2 control-label">Product Description</label>
									<div class="col-sm-8">
                                                                            <textarea rows="4" id='body' name="desc" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" ></textarea>
                        <script>
                CKEDITOR.replace( 'desc' );
            </script>  </div>
								</div>
								<div class="form-group">
									<label type="text" class="col-sm-2 control-label">Price</label>
									<div class="col-sm-8">
                                                                            <input type="text" name="price" class="form-control1" id="inputPassword" placeholder="Price">
									</div>
								</div>
								<div class="form-group">
									<label for="cat" class="col-sm-2 control-label">Category</label>
									<div class="col-sm-8"><select name="cat" id="selector1" class="form-control1">
										<?php
    include('db.php');
    $r = mysql_query("select * from category"); 
    while($row = mysql_fetch_array($r)){
         echo '<option>'.$row['title'].'</option>';
    }
?>
									</select></div>
								</div>
                                                            <div class="form-group">
        <label for="exampleInputFile">Product Photo</label>
        <input type="file" name='image' >
      </div>
      <div class="panel-footer">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<button class="btn-primary btn" name="Submit">Submit</button>
			</div>
		</div>
	 </div>
							</form>
						</div>
					</div>
				
      
   
  </div>
</div></div></div>


<?php include 'footer.php'; ?>