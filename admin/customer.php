<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Customer.php';?>
<?php
    if(isset($_GET['custId']) && $_GET['custId']!=NULL)
    {
        $id = $_GET['custId'];
    }else{
        echo "<script>window.location='inbox.php'</script>";
    }
    $cus = new Customer();
    if(isset($_POST['submit']))
    {
        echo "<script>window.location='inbox.php'</script>";
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Customer Details</h2>
               <div class="block copyblock"> 
               <?php
                    $getCust=$cus->getCustomerData($id);
                    if($getCust)
                    {
                        while($result=$getCust->fetch_assoc())
                        {
               ?>
                 <form method="POST">
                    <table class="form">					
                        <tr>
                            <td>Name</td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['name'] ?>" class="medium"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['address'] ?>" class="medium"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Zipcode</td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['zip'] ?>" class="medium"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['phone'] ?>" class="medium"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['email'] ?>" class="medium"/>
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Ok" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php
                        }
                    }
                ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>