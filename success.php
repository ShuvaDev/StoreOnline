<?php 
	include "inc/header.php";
?>
<?php
	$login=Session::get("cuslogin");
	if($login==false)
	{
		header("Location: login.php");
	}
?>
<style>
    .payment{width: 500px;min-height: 200px;text-align:cener;border: 1px solid $ddd;margin:0 auto;padding: 50px;}
    .payment h2{border-bottom: 1px solid #ddd;margin-bottom: 40px; padding-bottom: 10px;}
</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
           <div class="payment">
                <h2>Success</h2>
                <?php
                    $cmrId=Session::get("cmrId");
                    $ammount=$ct->payableAmmount($cmrId);
                    $sum=0;
                    if($ammount){
                        while($result=$ammount->fetch_assoc()){
                            $sum=$sum+$result['price'];
                        }
                    }
                ?>
                <p>Total payable ammount(Including Vat) :
                    <?php
                        $vat=$sum*0.1;
                        $total=$sum+$vat;
                        echo $total;
                    ?>
                </p>
                <p>Thanks for puchase. Recive your orer successfully. We will contact you ASAP with delivery details. Here is your order details..<a href="orderdetails.php">Visit Here</a></p>
            </div>
 		</div>
 	</div>
</div>
	 <?php 
	include "inc/footer.php";
?>