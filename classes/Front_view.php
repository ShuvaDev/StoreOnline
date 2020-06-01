<?php
    $filepath=realpath(dirname(__FILE__));

    include ($filepath."/../lib/Database.php");
    include ($filepath."/../helper/format.php");
?>
<?php
    class Front_view{
        private $db;
        public $fm;
        public function __construct(){
            $this->db=new Database();
            $this->fm=new Format();
        }
        // classes/Product.php code
        public function getFeaturedProduct(){
            $query="SELECT * FROM tbl_product WHERE type='0' ORDER BY productId DESC LIMIT 4";
            $result=$this->db->select($query);
            return $result;
        }

    }
?>