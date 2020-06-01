                        <?php
                        /**................................................................
 * @package eblog v 1.0
 * @author Faith Awolu 
 * Hillsofts Technology Ltd.            
 * (hillsofts@gmail.com)
 * ................................................................
 */
                        
session_start();
include('../db.php');

$a = $_POST['site_name'];
$b = $_POST['site_phone'];
$c = $_POST['site_email'];
$d = $_POST['site_address'];
$e = $_POST['fax'];
$f = $_POST['comp_name'];
$g = $_POST['site_about'];
// query

$sql = "UPDATE settings SET 
        `site_name`=?,`site_phone`=?,`site_email`=?,`site_address`=?,`fax`=?,`comp_name`=?,`site_about`=? WHERE id= 1";


//$sql = "INSERT INTO settings (site_name,site_title,email,site_keyword,street,city,country,phone,facebook,twitter,linkedin,status) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l)";

$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$f,$g));

//$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d));
if($q){
header("location: settings.php");
}
 else {
     	
  echo '<script language = "javascript">';
  // echo "window.location.href='login.php'"; 
  echo "alert('Something went wrong, Enter correct details');window.location.href='login.php'";
   echo '</script>';
    exit;
    
}

?>