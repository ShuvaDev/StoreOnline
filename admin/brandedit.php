<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    if(isset($_GET['brandid']) && $_GET['brandid']!=NULL)
    {
        $id = $_GET['brandid'];
    }else{
        echo "<script>window.location='brandlist.php'</script>";
    }
    include "../classes/Brand.php";
    $brand = new Brand();
?>
<?php
	if(isset($_POST['submit']))
	{
		$brandName=$_POST['brandName'];
		$updateBrand=$brand->brandUpdate($brandName,$id);
	}

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Bran</h2>
               <div class="block copyblock"> 
               <?php
                    if(isset($updateBrand))
                    {
                        echo $updateBrand;
                    }
               ?>
               <?php
                    $getBrand=$brand->getBrandById($id);
                    if($getBrand)
                    {
                        while($result=$getBrand->fetch_assoc())
                        {
               ?>
                 <form method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['brandName'] ?>" class="medium" name="brandName"/>
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
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