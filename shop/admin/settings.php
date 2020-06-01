<?php
/**................................................................
 * @package eblog v 1.0
 * @author Faith Awolu 
 * Hillsofts Technology Ltd.            
 * (hillsofts@gmail.com)
 * ................................................................
 */
include 'header.php';
?>
<div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 
 	<!--banner-->	
		     <div class="banner">
		    	<h2>
				<a href="index.php">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Site Settings</span>
				</h2>
		    </div>
		<!--//banner-->
 	<!--grid-->
       <div class="grid-form">
<div class="col-md-12 tab-content tab-content-in">
<div class="tab-pane active text-style" id="tab1">
  <div class="inbox-right">
         
      <div class="mailbox-content">

	   <div class="xs">
  	    <h3>Site Settings</h3>
            <hr>
  	    <div class="well1 white">
              <?php
                            //include('../connect.php');
				$result = $db->prepare("SELECT * FROM settings");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
              ?> 
                
        <form class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" action="savesettings.php" method="post" novalidate="novalidate" ng-submit="submit()">
          <fieldset>
            <div class="form-group">
              <label class="control-label">Your Site Name</label>
              <input type="text" name="site_name" value="<?php echo $row['site_name']; ?>" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required="">
            </div>
               <div  class="form-group" >
              <label class="control-label">Company Name </label>
              <input type="text" name="comp_name" value="<?php echo $row['comp_name']; ?>" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required="">
              </div>
              <div class="form-group">
              <label class="control-label">Your Phone</label>
              <input type="text" name="site_phone" value="<?php echo $row['site_phone']; ?>" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required="">
            </div>
               <div  class="form-group" >
              <label class="control-label">Your Fax </label>
              <input type="text" name="fax" value="<?php echo $row['fax']; ?>" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required="">
              </div>
            <div class="form-group">
              <label class="control-label">Your Site Email</label>
              <input type="email" name="site_email" value="<?php echo $row['site_email']; ?>" class="form-control1 ng-invalid ng-valid-email ng-invalid-required ng-touched" ng-model="model.email" required="">
            </div>
              <div  class="form-group" >
              <label class="control-label">Your Address </label>
              <input type="text" name="site_address" value="<?php echo $row['site_address']; ?>" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required="">
              </div>
               <div  class="form-group" >
              <label class="control-label">About Site </label>
              <textarea rows="4" id='body' name="site_about" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" > <?php echo $row['site_about']; ?></textarea>
                        <script>
                CKEDITOR.replace( 'site_about' );
            </script>  
              </div>

             
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-default">Reset</button>
            </div>
          </fieldset>
        </form>
                <?php
}
?>
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
    <?php include'footer.php'; ?>