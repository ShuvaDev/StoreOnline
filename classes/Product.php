<?php
    $filepath=realpath(dirname(__FILE__));

    include_once ($filepath."/../lib/Database.php");
    include_once ($filepath."/../helper/format.php");
?>
<?php
    class Product{
        private $db;
        private $fm;
        public function __construct(){
            $this->db=new Database();
            $this->fm=new Format();
        }
        public function productInsert($data,$file){
            $productName=mysqli_real_escape_string($this->db->link,$data['productName']);
            $catId      =mysqli_real_escape_string($this->db->link,$data['catId']);
            $brandId    =mysqli_real_escape_string($this->db->link,$data['brandId']);
            $body       =mysqli_real_escape_string($this->db->link,$data['body']);
            $price      =mysqli_real_escape_string($this->db->link,$data['price']);
            $type       =mysqli_real_escape_string($this->db->link,$data['type']);
            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_temp = $file['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "upload/".$unique_image;
            if($productName=="" || $catId=="" || $brandId=="" || $body=="" || $price=="" || $type=="" || $file_name=="")
            {
                $msg="<span class='error'>Fiels must not be empty</span>";
                return $msg;
            }
            elseif ($file_size >1048567) {
                $msg= "<span class='error'>Image Size should be less then 1MB!</span>";
                return $msg;
            }elseif (in_array($file_ext, $permited) === false){
                $msg= "<span class='error'>You can upload only:-" .implode(', ', $permited)."</span>";
                return $msg;
            }
            else{
                move_uploaded_file($file_temp,$uploaded_image);
                $query = "INSERT INTO tbl_product(productName,catId,brandId,body,price,image,type) VALUES('$productName','$catId','$brandId','$body','$price','$uploaded_image','$type')";
                $productInsert=$this->db->insert($query);
                if($productInsert)
                {
                    $msg="<span class='success'>Product inserted successfully!</span>";
                    return $msg;
                }else{
                    $msg="<span class='error'>Product not inserted!</span>";
                    return $msg;
                }
            }
            
        }
        // GEt all product
        public function getAllProduct()
        {
            $query="SELECT p.*,c.catName,b.brandName
            FROM tbl_product as p,tbl_category as c,tbl_brand as b WHERE p.catId=c.catID AND p.brandId=b.brandId ORDER BY p.productId DESC";
            // $query="SELECT tbl_product.*, tbl_category.catName,tbl_brand.brandName 
            // FROM tbl_product
            // INNER JOIN tbl_category
            // ON tbl_product.catId=tbl_category.catId
            // INNER JOIN tbl_brand
            // ON tbl_product.brandId=tbl_brand.brandId
            // ORDER BY tbl_product.productId DESC";
            $result=$this->db->select($query);
            return $result;
        }

        public function getProById($id)
        {
            $query="SELECT * FROM tbl_product WHERE productId='$id'";
            $result=$this->db->select($query);
            return $result;
        }
        // Update product
        public function productUpdate($data,$file,$id){
            $productName=mysqli_real_escape_string($this->db->link,$data['productName']);
            $catId      =mysqli_real_escape_string($this->db->link,$data['catId']);
            $brandId    =mysqli_real_escape_string($this->db->link,$data['brandId']);
            $body       =mysqli_real_escape_string($this->db->link,$data['body']);
            $price      =mysqli_real_escape_string($this->db->link,$data['price']);
            $type       =mysqli_real_escape_string($this->db->link,$data['type']);
            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_temp = $file['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "upload/".$unique_image;
            if($productName=="" || $catId=="" || $brandId=="" || $body=="" || $price=="" || $type=="")
            {
                $msg="<span class='error'>Fiels must not be empty</span>";
                return $msg;
            }
            else{
                if(!empty($file_name)){
                    if ($file_size >1048567) {
                        $msg= "<span class='error'>Image Size should be less then 1MB!</span>";
                        return $msg;
                    }elseif (in_array($file_ext, $permited) === false){
                        $msg= "<span class='error'>You can upload only:-" .implode(', ', $permited)."</span>";
                        return $msg;
                    }
                    else{
                        move_uploaded_file($file_temp,$uploaded_image);

                        $query="UPDATE tbl_product SET productName='$productName',
                        catId='$catId',brandId='$brandId',body='$body',price='$price',image='$uploaded_image',type='$type' 
                        WHERE productId='$id'
                        ";
                        $productUpdate=$this->db->update($query);
                        if($productUpdate)
                        {
                            $msg="<span class='success'>Product updated successfully!</span>";
                            return $msg;
                        }else{
                            $msg="<span class='error'>Product not update!</span>";
                            return $msg;
                        }
                    }
                }else{
                    $query="UPDATE tbl_product SET productName='$productName',
                    catId='$catId',brandId='$brandId',body='$body',price='$price',type='$type' 
                    WHERE productId='$id'
                    ";
                    $productUpdate=$this->db->update($query);
                    if($productUpdate)
                    {
                        $msg="<span class='success'>Product updated successfully!</span>";
                        return $msg;
                    }else{
                        $msg="<span class='error'>Product not update!</span>";
                        return $msg;
                    }
                }
            }
        }
        // Delte product by id
        public function delProById($id)
        {
            $query="SELECT * FROM tbl_product WHERE productId='$id'";
            $getdata=$this->db->select($query);
            if($getdata)
            {
                while($delImg=$getdata->fetch_assoc())
                {
                    $dellink=$delImg['image'];
                    unlink($dellink);
                }
            }
            $id=mysqli_real_escape_string($this->db->link,$id);
            $delquery="DELETE FROM tbl_product WHERE productId='$id'";
            $deldata=$this->db->delete($delquery);
            if($deldata)
            {
                $msg="<span class='success'>Product deleted successfully!</span>";
                    return $msg;
            }else{
                $msg="<span class='error'>Product not deleted!</span>";
                return $msg;
            }
        }
        public function getFeaturedProduct(){
            $query="SELECT * FROM tbl_product WHERE type='0' ORDER BY productId DESC LIMIT 4";
            $result=$this->db->select($query);
            return $result;
        }
        public function getNewProduct()
        {
            $query="SELECT * FROM tbl_product ORDER BY productId DESC LIMIT 4";
            $result=$this->db->select($query);
            return $result;
        }
        public function getSingleProduct($id)
        {
            $query="SELECT p.*,c.catName,b.brandName
            FROM tbl_product as p,tbl_category as c,tbl_brand as b WHERE p.catId=c.catID AND p.brandId=b.brandId AND p.productId='$id'";
            $result=$this->db->select($query);
            return $result;
        }
        

        public function latestFromIphone(){
            $query="SELECT * FROM tbl_product WHERE brandId='3' ORDER BY productId DESC LIMIT 1";
            $result=$this->db->select($query);
            return $result;
        }
        public function latestFromSamsung(){
            $query="SELECT * FROM tbl_product WHERE brandId='2' ORDER BY productId DESC LIMIT 1";
            $result=$this->db->select($query);
            return $result;
        }
        public function latestFromAcer(){
            $query="SELECT * FROM tbl_product WHERE brandId='1' ORDER BY productId DESC LIMIT 1";
            $result=$this->db->select($query);
            return $result;
        }
        public function latestFromCanon(){
            $query="SELECT * FROM tbl_product WHERE brandId='4' ORDER BY productId DESC LIMIT 1";
            $result=$this->db->select($query);
            return $result;
        }
        public function productByCat($id)
        {
            $query="SELECT * FROM tbl_product WHERE catId='$id'";
            $result=$this->db->select($query);
            return $result;
        }
        public function insertCompareData($cmrId,$cmprId)
        {
            $cquery="SELECT * FROM tbl_compare WHERE productId='$cmprId' AND cmrId='$cmrId'";
            $check=$this->db->select($cquery);
            if($check)
            {
                $msg="<span>Already Added!</span>";
                return $msg;
            }
            $query="SELECT * FROM tbl_product WHERE productId='$cmprId'";
            $result=$this->db->select($query)->fetch_assoc();
            if($result)
            {
                $productId=$result['productId'];
                $productName=$result['productName'];
                $price=$result['price'];
                $image=$result['image'];
                $query = "INSERT INTO tbl_compare(cmrid,productId,productName,price,image) VALUES('$cmrId','$productId','$productName','$price','$image')";
                $insertRow=$this->db->insert($query);
                if($insertRow)
                {
                    $msg="<span class='success'>Added to compare!</span>";
                    return $msg;
                }else{
                    $msg="<span class='error'>Not added!</span>";
                    return $msg;
                }
            }
        }
        public function getCompareProduct($cmrId)
        {
            $query="SELECT * FROM tbl_compare WHERE cmrId='$cmrId'";
            $result=$this->db->select($query);
            return $result;
        }
        public function delCompareData($cmrId)
        {
            $delquery="DELETE FROM tbl_compare WHERE cmrId='$cmrId'";
            $deldata=$this->db->delete($delquery);
        }
        public function saveWlistData($cmrId,$productId)
        {
            $cquery="SELECT * FROM tbl_wishlist WHERE productId='$productId' AND cmrId='$cmrId'";
            $check=$this->db->select($cquery);
            if($check)
            {
                $msg="<span>Already Added!</span>";
                return $msg;
            }
            $pquery="SELECT * FROM tbl_product WHERE productId='$productId'";
            $result=$this->db->select($pquery)->fetch_assoc();
            if($result)
            {
                $productId=$result['productId'];
                $productName=$result['productName'];
                $price=$result['price'];
                $image=$result['image'];
                $query = "INSERT INTO tbl_wishlist(cmrid,productId,productName,price,image) VALUES('$cmrId','$productId','$productName','$price','$image')";
                $insertRow=$this->db->insert($query);
                if($insertRow)
                {
                    $msg="<span class='success'>Save to wishlist!</span>";
                    return $msg;
                }else{
                    $msg="<span class='error'>Not added!</span>";
                    return $msg;
                }
            }
        }
        public function checkWlistData($cmrId){
            $pquery="SELECT * FROM tbl_wishlist WHERE cmrId='$cmrId'";
            $result=$this->db->select($pquery);
            return $result;
        }
        public function delWlistData($productId,$cmrId)
        {
            $delquery="DELETE FROM tbl_wishlist WHERE cmrId='$cmrId' AND productId='$productId'";
            $deldata=$this->db->delete($delquery);
        }
        //Get brand name // It is not working on brand class 
        public function getAllBrand()
        {
            $query="SELECT * FROM tbl_brand ORDER BY brandId DESC";
            $result=$this->db->select($query);
            return $result;
        }
        ///////////
        public function getAllCat()
        {
            $query="SELECT * FROM tbl_category ORDER BY catId DESC";
            $result=$this->db->select($query);
            return $result;
        }
        ///////////


    }

?>