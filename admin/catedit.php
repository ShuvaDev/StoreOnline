<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    if(isset($_GET['catid']) && $_GET['catid']!=NULL)
    {
        $id = $_GET['catid'];
    }else{
        echo "<script>window.location='catlist.php'</script>";
    }
    include "../classes/Category.php";
    $cat = new Category();
?>
<?php
	if(isset($_POST['submit']))
	{
		$catName=$_POST['catName'];
		$updateCat=$cat->catUpdate($catName,$id);
	}

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Category</h2>
               <div class="block copyblock"> 
               <?php
                    if(isset($updateCat))
                    {
                        echo $updateCat;
                    }
               ?>
               <?php
                    $getCat=$cat->getCatById($id);
                    if($getCat)
                    {
                        while($result=$getCat->fetch_assoc())
                        {
               ?>
                 <form method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['catName'] ?>" class="medium" name="catName"/>
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