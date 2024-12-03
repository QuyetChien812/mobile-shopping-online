 <?php
 $filepath= realpath(dirname(__FILE__));
require_once($filepath.'/../lib/database.php');
require_once($filepath."/../helpers/format.php");
?>
<?php
class Brand{
    private $db ;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function addBrand($brandName){
          $Name = $this->fm->validation($brandName);
          if(empty($Name)){
            return 'Tên thương hiệu không được để trống';
          }
          else{
            $query = "INSERT INTO `tbl_brand`( `brand_Name`) VALUES ('$Name')";
            $result = $this->db->insert($query);
            if($result){
                return "Thêm thương hiệu thành công";
            }
            else{
                return "Thêm thương hiệu thất bại";
            }
          }
    }
    public function getAllBrand(){
        $query = "SELECT * FROM tbl_brand";
        $result = $this->db->select($query);
        if($result){
            return $result;
        }
        else{
            return "lỗi";
        }
    }
    public function getNumberOfBrand(){
        $query = "SELECT * FROM tbl_brand";
        $result = $this->db->number($query);
        if($result !== false){
            return $result;
        }
        else{
            return 0;
        }
        
    }
    public function getBrandById($id){
        $query = "SELECT * FROM tbl_brand WHERE id = '$id' ";
        $result = $this->db->select($query);
        if($result){
            return $result;
        }
        else{
            return "Lỗi";
        }
    }
    public function editBrand($brandName, $id){
        $Name = $this->fm->validation($brandName);
        $Name = mysqli_real_escape_string($this->db->link,$brandName);
        $query = "UPDATE tbl_brand SET `brand_Name` = '$Name' WHERE id = '$id' ";
        $result = $this->db->update($query);
        if($result){
            return 'Cập nhật thành công';
        }
        else{
            return 'Cập nhật thất bại';
        }

    } 
    public function deleteBrand($id){
        $query = "DELETE FROM tbl_brand WHERE id = '$id'";
        $result = $this->db->delete($query);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
}
?>