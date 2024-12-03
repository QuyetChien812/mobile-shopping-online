<?php
$filepath= realpath(dirname(__FILE__));
require_once($filepath."/../lib/database.php");
require_once($filepath."/../helpers/format.php");
?>
<?php
class Category{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function addCate($cateName){
        $Name = $this->fm->validation($cateName);
        $Name = mysqli_real_escape_string($this->db->link, $cateName);
        if(empty($Name)){
            $alert = 'Tên danh mục không được để trống';
            return $alert;
        }
        else{
            $query = "INSERT INTO `tbl_category`(`category_Name`) VALUES('$Name')";
            $result =  $this->db->insert($query);
            if($result){
                return 'Thêm danh mục thành công';
            }
            else{
                return 'thêm danh mục bị lỗi';
            }
            
        }
    }
    public function deleteCate($id){
        $query = "DELETE FROM `tbl_category` WHERE id = '$id'";
        $result = $this->db->delete($query);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
    public function eidtCate($cateName, $id){
        $Name = $this->fm->validation($cateName);
        $Name = mysqli_real_escape_string($this->db->link, $cateName);
        if(empty($Name)){
            return 'Tên danh mục không được để trống';
        }
        else{
            $query = "UPDATE `tbl_category` SET `category_Name` = '$Name' WHERE id = '$id' ";
            $result = $this->db->update($query);
            if($result){
                return 'Cập nhật thành công';
            }
            else{
                return 'Cập nhật thất bại';
            }
        }
    }
    public function getCategoryByID($id){
        $query = "SELECT * FROM `tbl_category` WHERE id = '$id' ";
        $result = $this->db->select($query);
        if($result && $result->num_rows > 0){
            return $result;
        } else {
            return [];
        }
    }
    public function getAllCategory(){
        $query = "SELECT * FROM tbl_category ORDER BY id ASC";
        $data = $this->db->select($query);
        if ($data && $data->num_rows > 0) {
            return $data;
        } else {
            return [];
        }
    }
    public function getNumberOfCategory(){
        $query = "SELECT * FROM tbl_category ORDER BY id ASC";
        $data = $this->db->select($query);
        if($data !== false){
            $number = $data->num_rows;
            return $number;
        }
        else{
            return 0;
        }
    }
    public function show_category_frontend(){
        $query = "SELECT * FROM tbl_category ORDER BY id ASC";
        $data = $this->db->select($query);
        if ($data && $data->num_rows > 0) {
            return $data;
        } else {
            return [];
        }
    }
    public function get_product_by_cat($id){
        $query = "SELECT * FROM tbl_product WHERE catid='$id' ORDER BY catid ASC LIMIT 8";
        $data = $this->db->select($query);
        if ($data && $data->num_rows > 0) {
            return $data;
        } else {
            return [];
        }
    }
    public function get_name_by_cat($id){
        $query = "SELECT tbl_product.*,tbl_category.category_Name,tbl_category.id FROM tbl_product,tbl_category WHERE tbl_product.catid=tbl_category.id AND tbl_product.catid='$id' LIMIT 1";
        $data = $this->db->select($query);
        if ($data && $data->num_rows > 0) {
            return $data;
        } else {
            return [];
        }
    }
}
?>