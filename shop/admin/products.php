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
				<a href="index.php">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Products</span>
				</h2>
		    </div>
		<!--//banner-->
 	<!--grid-->
 	<div class="grid-form">

<div class="clearfix"> </div>

<div class="col-md-12 tab-content tab-content-in">
<div class="tab-pane active text-style" id="tab1">
  <div class="inbox-right">
      <div class="mailbox-content">
          <label for="filter">Search</label> <input type="text" name="filter" value="" id="filter" />
          <script>
              $('#filter').on('keyup', function(e) {
    if ('' != this.value) {
        var reg = new RegExp(this.value, 'i'); // case-insesitive

        $('.table tbody').find('tr').each(function() {
            var $me = $(this);
            if (!$me.children('td').text().match(reg)) {
                $me.hide();
            } else {
                $me.show();
            }
        });
    } else {
        $('.table tbody').find('tr').show();
    }
});
          </script>
          <div class="pull-right"><span style="background-color: #ccc; color: #FFF; padding: 5px;"> <a href="add_product.php">Add Product</a></span></div>
  
           <table class="table" id="resultTable">
                <thead>
							<tr>
								<th  style="border-left: 1px solid #C1DAD7"> ID </th>
								<th> Image </th>
								<th> Product </th>
								<th> Desciption </th>
								<th> Price </th>
								<th> Category </th>
                                <th> Action </th>
							</tr>
						</thead>
               
                   <tbody>
                        <?php
							include('db.php');
							$result = mysql_query("SELECT * FROM products");
							while($row = mysql_fetch_array($result))
								{
									echo '<tr class="record">';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['ID'].'</td>';
									echo '<td><a rel="facebox" href="editproductimage.php?id='.$row['ID'].'"><img src="../reservation/img/products/'.$row['imgUrl'].'" width="80" height="50"></a></td>';
									echo '<td><div align="right">'.$row['Product'].'</div></td>';
									echo '<td><div align="right">'.$row['Description'].'</div></td>';
									echo '<td><div align="right">'.$row['Price'].'</div></td>';
									echo '<td><div align="right">'.$row['Category'].'</div></td>';
									echo '<td><div align="center"><a rel="facebox" href="editproductdetails.php?id='.$row['ID'].'"><i class="fa fa-edit fa-lg text-success"></i></a> | <a href="#" id="'.$row['ID'].'" class="delbutton" title="Click To Delete"><i class="fa fa-times-circle fa-lg text-danger"></i></a></div></td>';
									echo '</tr>';
								}
?> 
                     
                    </tbody>
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