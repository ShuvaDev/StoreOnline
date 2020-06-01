<?php include('header.php'); ?>

		 <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 
 	<!--banner-->	
		     <div class="banner">
		    	<h2>
				<a href="index.php">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Orders</span>
				</h2>
		    </div>
		<!--//banner-->
 	<!--grid-->
       <div class="grid-form">
<div class="col-md-12 tab-content tab-content-in">
<div class="tab-pane active text-style" id="tab1">
  <div class="inbox-right">
         
      <div class="mailbox-content">
						<h2 class="title text-center">Orders</h2>                                            					
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#data1" role="tab" data-toggle="tab">Unpaid Orders</a></li>
  <li><a href="#data2" role="tab" data-toggle="tab">Delivered Orders</a></li>
  <li><a href="#data3" role="tab" data-toggle="tab">Paid Orders</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane active" id="data1">
        <table class="table table-bordered">
            <thead class="bg-primary">
                <th>Date Ordered</th>
                <th>Customer</th>
                <th>Item</th>
                <th>Action</th>
            </thead>
            <?php $unpaid = $jim->getunpaidorders(); ?>
            <?php while($row = mysql_fetch_array($unpaid)){ ?>
                <tr>
                    <td class="text-center"><?php echo $row['dateOrdered']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td class="text-center"><a href="item.php?id=<?php echo $row['id']?>&&p=unconfirmed" target="_blank"><i class="fa fa-external-link"></i> View Item</a></td>
                    <td class="text-center"><a href="order.php?p=deliver&&id=<?php echo $row['id']; ?>" class="btn btn-warning">Deliver</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <div class="tab-pane" id="data2">
        <table class="table table-bordered">
            <thead class="bg-primary">
                <th>Date Delivered</th>
                <th>Customer</th>
                <th>Item</th>
                <th>Action</th>
            </thead>
            <?php $delivered = $jim->getdeliveredorders(); ?>
            <?php while($row = mysql_fetch_array($delivered)){ ?>
                <tr>
                    <td class="text-center"><?php echo $row['dateDelivered']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td class="text-center"><a href="item.php?id=<?php echo $row['id']?>&&p=delivered" target="_blank"><i class="fa fa-external-link"></i> View Item</a></td>
                    <td class="text-center"><a href="order.php?p=paid&&id=<?php echo $row['id']; ?>" class="btn btn-warning">Paid</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <div class="tab-pane" id="data3">
        <table class="table table-bordered">
            <thead class="bg-primary">
                <th>Date Paid</th>
                <th>Customer</th>
                <th>Item</th>
            </thead>
            <?php $paid = $jim->getpaidorders(); ?>
            <?php while($row = mysql_fetch_array($paid)){ ?>
                <tr>
                    <td class="text-center"><?php echo $row['dateDelivered']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td class="text-center"><a href="item.php?id=<?php echo $row['id']?>" target="_blank"><i class="fa fa-external-link"></i> View Item</a></td>                    
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
</div>
</div>
</div>
</div> 
       </div>
        <div class="clearfix"> </div>
       </div>
                    
                 </div>
                     
    

<?php include('footer.php'); ?>