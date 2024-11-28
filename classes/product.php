<?php
$filepath= realpath(dirname(__FILE__));
require_once($filepath."/../lib/database.php");
require_once($filepath."/../helpers/format.php");
?>
<?php
class product{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function addProduct($data,$files){

        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
        $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        $permitted = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];
        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;
        if($productName==""||$category==""||$brand==""||$product_desc==""||$price==""||$type==""||$file_name==""){
            $alert = "<span class='error'>Các trường không được rỗng</span>";
            return $alert;
        }
        else{
            move_uploaded_file($file_temp,$uploaded_image);
            $query = "INSERT INTO tbl_product (productName,catid,brandid,product_desc,price,type,image) VALUES('$productName','$category','$brand','$product_desc','$price','$type','$unique_image')";
            $result =  $this->db->insert($query);
            if($result){
                return 'Thêm sản phẩm thành công';
            }
            else{
                return 'thêm sản phẩm bị lỗi';
            }
            
        }
    }
    public function deleteProduct($id){
        $query = "DELETE FROM tbl_product WHERE productid = '$id'";
        $result = $this->db->delete($query);
        if($result){
            $alert="<span class='success'>Xóa sản phẩm thành công</span>";
            return $alert;
        }
        else{
            $alert="<span class='error'>Xóa sản phẩm thất bại</span>";
            return $alert;
        }
    }
    public function update_product($data,$files, $id){
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
        $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        $permitted = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];
        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;
        if($productName==""||$category==""||$brand==""||$product_desc==""||$price==""||$type==""){
            $alert = "<span class='error'>Các trường không được rỗng</span>";
            return $alert;
        }else{
            if(!empty($file_name)){
                //Nếu chọn ảnh
            if($file_size >20480000){
            $alert="<span class='success'>Dung lượng ảnh phải dưới 20 MB</span>";
            return $alert;
            }
            elseif(in_array($file_ext,$permitted)===false)
            {//echo "<span class='error'>Bạn chỉ có thể tải lên:-".implode(',',$permitted)."</span>";
                $alert = "<span class='success'>Bạn chỉ có thể tải lên:-".implode(',',$permitted)."</span>";
                return $alert;
            }
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "UPDATE tbl_product SET 
            productName = '$productName' ,
            catid = '$category' ,
            brandid = '$brand' ,
            type = '$type' ,
            price = '$price' ,
            image = '$unique_image' ,
            product_desc = '$product_desc' 
            WHERE productid = '$id' ";
        }else{
        //Nếu không chọn ảnh
        $query = "UPDATE tbl_product SET 
        productName = '$productName' ,
            catid = '$category' ,
            brandid = '$brand' ,
            type = '$type' ,
            price = '$price' ,
            product_desc = '$product_desc' 
            WHERE productid = '$id' ";
        }
    }
            $result = $this->db->update($query);
            if($result){
                $alert ="<span class='success'>Cập nhật thành công</span>";
                return $alert;
            }else{
                $alert ="<span class='error'>Cập nhật thất bại</span>";
                return $alert;
            }
    }
    public function getProductByID($id){
        $query = "SELECT * FROM tbl_product WHERE productid = '$id' ";
        $result = $this->db->select($query);
        if($result && $result->num_rows > 0){
            return $result;
        } else {
            return [];
        }
    }
    public function getAllProduct(){
        $query = "SELECT tbl_product.*,tbl_category.category_Name,tbl_brand.brand_Name FROM tbl_product INNER JOIN tbl_category ON tbl_product.catid = tbl_category.id 
        INNER JOIN tbl_brand ON tbl_product.brandid = tbl_brand.id
        ORDER BY tbl_product.productid desc";
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
    public function getproduct_Featured(){
        $query="SELECT * FROM tbl_product WHERE type='0'";
        $result =$this->db->select($query);
        return $result;
    }
    public function getproduct_new(){
        $query="SELECT * FROM tbl_product order by productid desc LIMIT 8";
        $result =$this->db->select($query);
        return $result;
    }
    public function get_details($id){
        $query ="SELECT tbl_product.*,tbl_category.category_Name,tbl_brand.brand_Name FROM tbl_product INNER JOIN tbl_category ON tbl_product.catid = tbl_category.id 
        INNER JOIN tbl_brand ON tbl_product.brandid = tbl_brand.id WHERE tbl_product.productid='$id'";
        $result=$this->db->select($query);
        return $result;
    }
    }
?>