<?php
    $filepath=realpath(dirname(__FILE__));

    include_once ($filepath."/../lib/Database.php");
    include_once ($filepath."/../helper/format.php");
?>
<?php
class Cart{
    private $db;
    private $fm;
    public function __construct(){
        $this->db=new Database();
        $this->fm=new Format();
    }
    public function addToCart($quantity,$id){
        $quantity=$this->fm->validation($quantity);
        $quantity=mysqli_real_escape_string($this->db->link,$quantity);
        $productId=mysqli_real_escape_string($this->db->link,$id);
        $sId=session_id();
        $squery="SELECT * FROM tbl_product WHERE productId='$productId'";
        $result=$this->db->select($squery)->fetch_assoc();
        $productName=$result['productName'];
        $price=$result['price'];
        $image=$result['image'];

        $chquery=$squery="SELECT * FROM tbl_cart WHERE productId='$productId' AND sId='$sId'";
        $getPro=$this->db->select($squery);
        if($getPro)
        {
            $msg="Product alreay added!";
            return $msg;
        }else{

            $query = "INSERT INTO tbl_cart(sId,productId,productName,price,quantity,image) VALUES('$sId','$productId','$productName','$price','$quantity','$image')";
            $productInsert=$this->db->insert($query);
            if($productInsert)
            {
                header("Location: cart.php");
            }else{
                header("Location: 404.php");
            }
        }   
    }
    public function getCartProduct(){
        $id=session_id();
        $query="SELECT * FROM tbl_cart WHERE sId='$id'";
        $result=$this->db->select($query);
        return $result;
    }
    public function updateToCartQuantity($cartId,$quantity)
    {
        $cartId=mysqli_real_escape_string($this->db->link,$cartId);
        $quantity=mysqli_real_escape_string($this->db->link,$quantity);
        $query="UPDATE tbl_cart SET quantity='$quantity' WHERE cartId='$cartId'";
        $updated_row=$this->db->update($query);
        if($updated_row)
        {
            header("Location: cart.php");
        }else{
            $msg="<span class='error'>Quantity not updated!</span>";
            return $msg;
        }
    }
    public function delProductByCart($delId){
        $query="DELETE FROM tbl_cart WHERE cartId='$delId'";
        $deldata=$this->db->delete($query);
        if($deldata)
        {
            header("Location: cart.php");
        }else{
            $msg="<span class='error'>Product not deleted!</span>";
            return $msg;
        }
    }
    public function checkCartTable()
    {
        $sId=session_id();
        $query="SELECT * FROM tbl_cart WHERE sId='$sId'";
        $result=$this->db->select($query);
        return $result;
    }
    public function delCustomerCart()
    {
        $sId=session_id();
        $query ="DELETE FROM tbl_cart WHERE sId='$sId'";
        $this->db->delete($query);
    }
    public function orderProduct($cmrId)
    {
        $sId=session_id();
        $query="SELECT * FROM tbl_cart WHERE sId='$sId'";
        $getPro=$this->db->select($query);
        if($getPro)
        {
            while($result=$getPro->fetch_assoc())
            {
                $productId=$result['productId'];
                $productName=$result['productName'];
                $quantity=$result['quantity'];
                $price=$result['price']*$quantity;
                $image=$result['image'];
                $query = "INSERT INTO tbl_order(cmrid,productId,productName,quantity,price,image) VALUES('$cmrId','$productId','$productName','$quantity','$price','$image')";
                $insertRow=$this->db->insert($query);
            }
        }
    }
    public function payableAmmount($cmrId){
        $query="SELECT price FROM tbl_order WHERE cmrId='$cmrId' AND date=now()";
        $result=$this->db->select($query);
        return $result;
    }
    public function getOrderProduct($cmrId)
    {
        $query="SELECT * FROM tbl_order WHERE cmrId='$cmrId' ORDER BY date DESC";
        $result=$this->db->select($query);
        return $result;
    }
    public function checkOrderTable($cmrId)
    {
        $query="SELECT * FROM tbl_order WHERE cmrId='$cmrId'";
        $result=$this->db->select($query);
        return $result;
    }
    public function getAllOrderProduct()
    {
        $query="SELECT * FROM tbl_order ORDER BY date DESC";
        $result=$this->db->select($query);
        return $result;
    }
    public function productShifted($id,$time,$price){
        $query="UPDATE tbl_order SET status='1' WHERE cmrId='$id' AND price=$price AND date='$time'";
        $updated_row=$this->db->update($query);
        if($updated_row)
        {
            $msg="<span class='success'>Update Successfully!</span>";
            return $msg;
        }else{
            $msg="<span class='error'>Not updated!</span>";
            return $msg;
        }
    }
    public function delProductShifted($id,$time,$price)
    {
        $query="DELETE FROM tbl_order WHERE cmrId='$id' AND price=$price AND date='$time'";
            $deldata=$this->db->delete($query);
            if($deldata)
            {
                $msg="<span class='success'>Deleted successfully!</span>";
                    return $msg;
            }else{
                $msg="<span class='error'>Not deleted!</span>";
                return $msg;
            }
    }
    public function productShiftConfirm($id,$time,$price)
    {
        $query="UPDATE tbl_order SET status='2' WHERE cmrId='$id' AND price=$price AND date='$time'";
        $updated_row=$this->db->update($query);
        if($updated_row)
        {
            $msg="<span class='success'>Update Successfully!</span>";
            return $msg;
        }else{
            $msg="<span class='error'>Not updated!</span>";
            return $msg;
        }
    }
    
}
?>