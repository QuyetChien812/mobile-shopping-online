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
    public function search_product($tukhoa){
        $tukhoa = $this->fm->validation($tukhoa);
        $query = "SELECT * FROM tbl_product WHERE productName LIKE '%$tukhoa%'";
        $result = $this->db->select($query);
        return $result;
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
    public function insert_slider($data,$files){
        $sliderName = mysqli_real_escape_string($this->db->link, $data['sliderName']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        $permitted = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];
        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;

        if($sliderName==""||$type==""){
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
            $query = "INSERT INTO tbl_slider (sliderName,type,slider_image) VALUES('$sliderName','$type','$unique_image')";
            $result =  $this->db->insert($query);
            if($result){
                return 'Thêm Slider thành công';
            }
            else{
                return 'thêm Slider bị lỗi';
            }
        }
    }
    }
    public function show_slider(){
        $query = "SELECT * FROM  tbl_slider where type ='1' order by sliderId desc";
        $result = $this->db->select($query);
        return $result;

    }
    public function show_slider_list(){
        $query = "SELECT * FROM  tbl_slider order by sliderId desc";
        $result = $this->db->select($query);
        return $result;

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
    public function update_type_slider($id,$type){
        $type = mysqli_real_escape_string($this->db->link, $type);
        $query = "UPDATE tbl_slider SET type ='$type'  where sliderId ='$id'";
        $result = $this->db->update($query);
        return $result;

    }
    public function del_slider($id){
        $query = "DELETE FROM tbl_slider WHERE sliderId = '$id'";
        $result = $this->db->delete($query);
        if($result){
            $alert="<span class='success'>Xóa Slider thành công</span>";
            return $alert;
        }
        else{
            $alert="<span class='error'>Xóa Slider thất bại</span>";
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
        $sp_tungtrang =4;
        if(!isset($_GET['trang'])){
            $trang =1;
        }else{
            $trang =$_GET['trang'];
        }
        $tung_trang =($trang - 1)*$sp_tungtrang;
        $query="SELECT * FROM tbl_product order by productid desc LIMIT $tung_trang,$sp_tungtrang";
        $result =$this->db->select($query);
        return $result;
    }
    public function get_all_product(){
        $query="SELECT * FROM tbl_product";
        $result =$this->db->select($query);
        return $result;
    }
    public function get_details($id){
        $query ="SELECT tbl_product.*,tbl_category.category_Name,tbl_brand.brand_Name FROM tbl_product INNER JOIN tbl_category ON tbl_product.catid = tbl_category.id 
        INNER JOIN tbl_brand ON tbl_product.brandid = tbl_brand.id WHERE tbl_product.productid='$id'";
        $result=$this->db->select($query);
        return $result;
    }
    public function getLastestip(){
        $query = "SELECT * FROM tbl_product WHERE brandid = '11' order by productid desc LIMIT 1";
        $result = $this->db->select($query);
        return $result ;
    }
    public function getLastestoppo(){
        $query = "SELECT * FROM tbl_product WHERE brandid = '12' order by productid desc LIMIT 1";
        $result = $this->db->select($query);
        return $result ;
    }
    public function getLastestXiaomi(){
        $query = "SELECT * FROM tbl_product WHERE brandid = '10' order by productid desc LIMIT 1";
        $result = $this->db->select($query);
        return $result ;
    }
    public function getLastestsamsung(){
        $query = "SELECT * FROM tbl_product WHERE brandid = '9' order by productid desc LIMIT 1";
        $result = $this->db->select($query);
        return $result ;
    }
    public function get_compare($customer_id){
        $query = "SELECT * FROM tbl_compare WHERE customer_id = '$customer_id' order by id desc";
        $result = $this->db->select($query);
        return $result ;
    }
    public function delete_from_compare($customer_id, $productid) {
        $query = "DELETE FROM tbl_compare WHERE customer_id = '$customer_id' AND productid = '$productid'";
        $result = $this->db->delete($query);
        if ($result) {
        } else {
            return "<span class='error'>Có lỗi xảy ra khi xóa sản phẩm!</span>";
        }
    }
    
    
    public function insertCompare($productid,$customer_id){
        $productid = $this ->fm->validation($productid);
        $customer_id =  mysqli_real_escape_string($this->db->link, $customer_id);
        $check_compare = "SELECT * FROM tbl_compare WHERE productId = '$productid' AND customer_id = '$customer_id'";
        $result_check_compare = $this->db->select($check_compare);
         if($result_check_compare){
           $msg = "<span class='error'>Sản phẩm đã được thêm vào so sánh</spa";
           return $msg;
        } else{
        $query = "SELECT * FROM tbl_product WHERE productId = '$productid'";
        $result = $this->db->select($query)->fetch_assoc();

        $productName = $result["productName"];
        $price = $result["price"];
        $image = $result["image"];
       
           $query_insert = "INSERT INTO tbl_compare(productId,price,image,customer_id,productName) VALUES('$productid','$price','$image','$customer_id','$productName')";
           $insert_compare = $this->db->insert($query_insert);
           if($insert_compare){
            $alert ="<span class='success'>Thêm sản phẩm so sánh thành công</span>";
            return $alert;
        }else{
            $alert ="<span class='error'>Thêm sản phẩm so sánh thất bại</span>";
            return $alert;
        }
        }
    }
    }
?>