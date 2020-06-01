<?php include 'header.php'; ?>
<?php
    
    if(isset($_POST['addcategory'])){
        $category = $_POST['category']; 
        $jim->addcategory($category);
    }
   
?>
		 <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 
 	<!--banner-->	
		     <div class="banner">
		    	<h2>
				<a href="index.php.html">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Categories</span>
				</h2>
		    </div>
		<!--//banner-->
 	<!--grid-->
 	<div class="grid-form">
 		<div class="grid-form1">
 		<h3 id="forms-example" class="">Add New Category</h3>
 		<form method="POST" action="category.php">
  <div class="form-group">
    <label for="category">Category Name </label>
    <input type="text" name="category" class="form-control" placeholder="Category Name">
  </div>
  
  <button type="submit" name="addcategory" class="btn btn-default">Save</button>
</form>
</div>
<!----->

<div class="clearfix"> </div>

<div class="col-md-12 tab-content tab-content-in">
<div class="tab-pane active text-style" id="tab1">
  <div class="inbox-right">
         
      <div class="mailbox-content">
          <div class="mail-toolbar clearfix" style="background-color:#90C9DC; padding: 10px;">
			     <div class="float-left">
			       <div class="btn-group m-r-sm mail-hidden-options" style="display: inline-block;">
                                   <div> <span>Category</span></div>
                            </div>
			        
			        
			    </div>
			    <div class="float-right">
      
                            <div class="btn-group">
                                <span> Action</span>
                            </div>
                        
			        
			    </div>
				
               </div>
                <table class="table">
                    <?php $category = $jim->getcategory();?>
                        <?php while($row = mysql_fetch_array($category)):?>
                    <tbody>
                        <tr class="table-row">
                           
                            <td class="table-text">
                            	<h6> <?php echo $row['title'];?></h6>
                            </td>
                            <td class="table-text">
                                 <a href="category.php?p=delete&&table=category&&id=<?php echo $row['id']; ?>"<i class="fa fa-times-circle fa-lg text-danger"></i> <small>Remove</small> </a>
                            </td>
                        </tr>
                     
                    </tbody>
                    <?php endwhile; ?>
                </table>
               </div>
            </div>
</div>
</div>
        </div>
 	


<div class="clearfix"> </div>
   </div>
    
</div>
                 </div>


<?php include 'footer.php'; ?>