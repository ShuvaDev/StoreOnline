
<!--
Author: Awolu Faith 
Author URL: http://hillsofts.com
Email: awolu_faith@live.com 
Mobile No: +234 813 865 2645
-->

<?php include('../db.php'); ?>
<?php date_default_timezone_set('Asia/Manila'); ?>
<?php

session_start();
if(!isset($_SESSION['SESS_FIRST_NAME'])){
    header("location: login.php");
}

    $jim = new Admin();
    $p = isset($_GET['p']) ? $_GET['p'] : null;
    if($p == 'deliver'){
        $jim->deliver(); 
    }else if($p == 'paid'){
        $jim->paid();   
    }else if($p == 'delete'){
        $jim->delete();   
    }
    
    class Admin {
        
        function getunpaidorders(){
                $q = "SELECT * FROM dbgadget.order where status='unconfirmed' order by dateOrdered desc";
                $result = mysql_query($q);
            
                return $result;
        }
        function getdeliveredorders(){
                $q = "SELECT * FROM dbgadget.order where status='delivered' order by dateDelivered desc";
                $result = mysql_query($q);
            
                return $result;
        }
        function getpaidorders(){
                $q = "SELECT * FROM dbgadget.order where status='confirmed' order by dateDelivered desc";
                $result = mysql_query($q);
            
                return $result;
        }
        
        function getorder(){
            $id = $_GET['id'];
            $q = "SELECT * FROM dbgadget.order where id=$id";
            $result = mysql_query($q);
            
            return $result;
        }
        
        function deliver(){
            $date = date('m/d/y h:i:s A');
            $id = $_GET['id'];
            $q = "UPDATE dbgadget.order set dateDelivered='$date', status='delivered' where id=$id";
            mysql_query($q);
            
            return true;
        }
        function paid(){
            $id = $_GET['id'];
            $date = date('m/d/y h:i:s A');
            $q = "UPDATE dbgadget.order set dateDelivered='$date', status='confirmed' where id=$id";
            mysql_query($q);
            
            return true;
        }
        
        function getcategory(){
            $q = "SELECT * from dbgadget.category order by title asc";
            $result = mysql_query($q);
            
            return $result;
        }
        function addcategory($cat){
            $q = "INSERT INTO dbgadget.category values('','$cat')";
            mysql_query($q);
            return true;
        }
        
        function delete(){
            $table = $_GET['table'];
            $id = $_GET['id'];
            //echo $q = "DELETE FROM dbgadget.$table where id=$id";
            mysql_query("DELETE FROM dbgadget.$table where id=$id");
            return true;
        }
        
        function getcategorybyid($id){
            $q = "Select * from dbgadget.category where id=$id";
            $result = mysql_query($q);
            if($row = mysql_fetch_array($result)){
                $category = $row['title'];
            }
            return $category;
        }
        
        function updatecategory($cat,$id){
            $q = "update dbgadget.category set title='$cat' where id=$id";   
            mysql_query($q);
            return true;
        }
    }
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Minimal an Admin Panel Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="../css/style1.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery.min.js"> </script>
<!-- Mainly scripts -->

<script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script src="ckeditor/ckeditor.js"></script>
<script src="js/jquery.metisMenu.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<link href="css/custom.css" rel="stylesheet">
<script src="js/custom.js"></script>
<script src="js/screenfull.js"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});
			

			
		});
		</script>

<!----->

<!--pie-chart--->
<script src="js/pie-chart.js" type="text/javascript"></script>
 <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#3bb2d0',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#fbb03b',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ed6498',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

           
        });

    </script>
<!--skycons-icons-->
<script src="js/skycons.js"></script>
<!--//skycons-icons-->
</head>

<!----->
        <nav class="navbar-default navbar-static-top" role="navigation">
             <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                  <?php
                            //include('../connect.php');
				$result = $db->prepare("SELECT * FROM settings");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
              ?> 
               <h1> <a class="navbar-brand" href="index.php"><?php echo $row['site_name']; ?></a></h1>         
                                <?php } ?> </div>
			 <div class=" border-bottom">
        	<div class="full-left">
        	  <section class="full-top">
				<button id="toggle"><i class="fa fa-arrows-alt"></i></button>	
			</section>
			
            <div class="clearfix"> </div>
           </div>
     
       
            <!-- Brand and toggle get grouped for better mobile display -->
		 
		   <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="drop-men" >
		        <ul class=" nav_1">
		           
					<li class="dropdown">
		              <a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret">Rackham<i class="caret"></i></span><img src="images/wo.jpg"></a>
		              <ul class="dropdown-menu " role="menu">
		                <li><a href="settings.php"><i class="fa fa-edit"></i>Settings</a></li>
		                <li><a href="logout.php"><i class="fa fa-sign-out "></i>LogOut</a></li>
		              </ul>
		            </li>
		           
		        </ul>
		     </div><!-- /.navbar-collapse -->
			<div class="clearfix">
       
     </div>
	  
		    <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
				
                    <li>
                        <a href="index.php" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Dashboard</span> </a>
                    </li>
                    <li>
                        <a href="products.php" class=" hvr-bounce-to-right"><i class="fa fa-file-text-o nav_icon "></i><span class="nav-label">Products</span> </a>
                    </li>
                    <li>
                        <a href="add_product.php" class=" hvr-bounce-to-right"><i class="fa fa-plus-square-o nav_icon "></i><span class="nav-label">Add Product</span> </a>
                    </li>
                   <li>
                       <a href="category.php" class=" hvr-bounce-to-right"><i class="fa fa-file-o nav_icon "></i><span class="nav-label">Categories</span> </a>
                    </li>
                    <li>
                        <a href="order.php" class=" hvr-bounce-to-right"><i class="fa fa-cart-plus nav_icon "></i><span class="nav-label">Orders</span> </a>
                    </li>
                    <li>
                        <a href="settings.php" class=" hvr-bounce-to-right"><i class="fa fa-edit nav_icon "></i><span class="nav-label">Site Settings</span> </a>
                    </li>
              <li><a href="logout.php" class=" hvr-bounce-to-right"><i class="fa fa-sign-out nav_icon"></i><span class="nav-label">LogOut</span></a>
              </li>
                </ul>
            </div>
			</div>
        </nav>