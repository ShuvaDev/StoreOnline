<?php
    $filepath=realpath(dirname(__FILE__));
    include_once ($filepath."/../lib/Database.php");
    include_once ($filepath."/../helper/format.php");
?>
<?php
    class Brand{
        private $db;
        private $fm;
        public function __construct(){
            $this->db=new Database();
            $this->fm=new Format();
        }
        // Add brand function
        public function brandInsert($brandName){
            $brandName=$this->fm->validation($brandName);

            $brandName=mysqli_real_escape_string($this->db->link,$brandName);
            if(empty($brandName))
            {
                $msg="<span class='error'>Brand name must not be empty</span>";
                return $msg;
            }else{
                $query="INSERT INTO tbl_brand(brandName) VALUES('$brandName')";
                $brandInsert=$this->db->insert($query);
                if($brandInsert)
                {
                    $msg="<span class='success'>Brand name inserted successfully!</span>";
                    return $msg;
                }else{
                    $msg="<span class='error'>Brand name not inserted!</span>";
                    return $msg;
                }
            }
        }
        // Get all brand function
        public function getAllBrand()
        {
            $query="SELECT * FROM tbl_brand ORDER BY brandId DESC";
            $result=$this->db->select($query);
            return $result;
        }
        // Get Brand information with id function
        public function getBrandById($id)
        {
            $query="SELECT * FROM tbl_brand WHERE brandId='$id'";
            $result=$this->db->select($query);
            return $result;
        }
        // Update brand information
        public function brandUpdate($brandName,$id)
        {
            $brandName=$this->fm->validation($brandName);
            $brandName=mysqli_real_escape_string($this->db->link,$brandName);
            $id=mysqli_real_escape_string($this->db->link,$id);
            if(empty($brandName))
            {
                $msg="<span class='error'>Brand name field must not be empty</span>";
                return $msg;
            }else{
                $query="UPDATE tbl_brand SET brandName='$brandName' WHERE brandId='$id'";
                $updated_row=$this->db->update($query);
                if($updated_row)
                {
                    $msg="<span class='success'>Brand name updated successfully!</span>";
                    return $msg;
                }else{
                    $msg="<span class='error'>Brand name not updated!</span>";
                    return $msg;
                }
            }
        }
        // Delete brand with id
        public function delBrandById($id)
        {
            $id=mysqli_real_escape_string($this->db->link,$id);
            $query="DELETE FROM tbl_brand WHERE brandId='$id'";
            $deldata=$this->db->delete($query);
            if($deldata)
            {
                $msg="<span class='success'>Brand deleted successfully!</span>";
                    return $msg;
            }else{
                $msg="<span class='error'>Brand not deleted!</span>";
                return $msg;
            }
        }
    }

?>