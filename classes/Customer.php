<?php
    $filepath=realpath(dirname(__FILE__));

    include_once ($filepath."/../lib/Database.php");
    include_once ($filepath."/../helper/format.php");
?>
<?php
class Customer{
    private $db;
    private $fm;
    public function __construct(){
        $this->db=new Database();
        $this->fm=new Format();
    }
    public function customerReg($data)
    {
        $name     =mysqli_real_escape_string($this->db->link,$data['name']);
        $address  =mysqli_real_escape_string($this->db->link,$data['address']);
        $city     =mysqli_real_escape_string($this->db->link,$data['city']);
        $country  =mysqli_real_escape_string($this->db->link,$data['country']);
        $zip      =mysqli_real_escape_string($this->db->link,$data['zip']);
        $phone    =mysqli_real_escape_string($this->db->link,$data['phone']);
        $email    =mysqli_real_escape_string($this->db->link,$data['email']);
        $pass     =mysqli_real_escape_string($this->db->link,md5($data['pass']));
        if($name=="" || $address=="" || $city=="" || $country=="" || $zip=="" || $phone=="" || $email=="" || $pass=="")
        {
            $msg="<span class='error'>Fiels must not be empty</span>";
            return $msg;
        }
        $mailquery="SELECT * FROM tbl_customer WHERE email='$email'";
        $mailchk=$this->db->select($mailquery);
        if($mailchk)
        {
            $msg="<span class='error'>Email already exist</span>";
            return $msg;
        }
        else{
            $query="INSERT INTO tbl_customer(name,email,address,city,country,zip,phone,pass) VALUES('$name','$email','$address','$city','$country','$zip','$phone','$pass')";
                $inserted_row=$this->db->insert($query);
                if($inserted_row)
                {
                    $msg="<span class='success'>User registration successfully!</span>";
                    return $msg;
                }else{
                    $msg="<span class='error'>User registration failed!</span>";
                    return $msg;
                }
        }
    }
    public function customerLogin($data)
    {
        $email    =mysqli_real_escape_string($this->db->link,$data['email']);
        $pass     =mysqli_real_escape_string($this->db->link,md5($data['pass']));
        if(empty($email)|| empty($pass))
        {
            $msg="<span class='error'>Fiels must not be empty</span>";
            return $msg;
        }
        $loginquery="SELECT * FROM tbl_customer WHERE email='$email' AND pass='$pass'";
        $result=$this->db->select($loginquery);
        if($result!=false)
        {
            $value=$result->fetch_assoc();
            Session::set("cuslogin",true);
            Session::set("cmrId",$value['id']);
            Session::set("cmrName",$value['name']);
            header("Location: cart.php");
        }else{
            $msg="<span class='error'>Email or passwrod not match</span>";
            return $msg;
        }
    }
    public function getCustomerData($id)
    {
        $query="SELECT * FROM tbl_customer WHERE id='$id'";
        $result=$this->db->select($query);
        return $result;
    }
    public function customerUpdate($data,$id)
    {
        $name     =mysqli_real_escape_string($this->db->link,$data['name']);
        $address  =mysqli_real_escape_string($this->db->link,$data['address']);
        $city     =mysqli_real_escape_string($this->db->link,$data['city']);
        $country  =mysqli_real_escape_string($this->db->link,$data['country']);
        $zip      =mysqli_real_escape_string($this->db->link,$data['zip']);
        $phone    =mysqli_real_escape_string($this->db->link,$data['phone']);
        $email    =mysqli_real_escape_string($this->db->link,$data['email']);
        
        if($name=="" || $address=="" || $city=="" || $country=="" || $zip=="" || $phone=="" || $email=="")
        {
            $msg="<span class='error'>Fiels must not be empty</span>";
            return $msg;
        }
        else{
                $query="UPDATE tbl_customer SET name='$name',email='$email',address='$address',city='$city',country='$country',zip='$zip',phone='$phone' WHERE id='$id'";
                $updated_row=$this->db->update($query);
                if($updated_row)
                {
                    $msg="<span class='success'>Customer data updated successfully!</span>";
                    return $msg;
                }else{
                    $msg="<span class='error'>Customer data not updated!</span>";
                    return $msg;
                }
        }
    }
}
?>