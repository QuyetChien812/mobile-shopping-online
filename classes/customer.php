<?php
$filepath = realpath(dirname(__FILE__));
require_once($filepath.'/../lib/database.php');
require_once($filepath.'/../helpers/format.php');
require_once($filepath.'/../lib/session.php');
?>
<?php
class Customer{
     private $db;
     private $session;
     private $fm ;
     public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
        $this->session = new Session();
     }
     public function add_customer($customer){
        $name = mysqli_real_escape_string($this->db->link,$customer['user']); 
        $city = mysqli_real_escape_string($this->db->link,$customer['City']);
        $zip = mysqli_real_escape_string($this->db->link,$customer['zipcode']);
        $email = mysqli_real_escape_string($this->db->link, $customer['email']) ;
        $address = mysqli_real_escape_string($this->db->link, $customer['Address']);
        $country = mysqli_real_escape_string($this->db->link,$customer['country']);
        $phone = mysqli_real_escape_string($this->db->link, $customer['Phone']);
        $password = mysqli_real_escape_string($this->db->link, md5($customer['Password']) );
        if($name == '' || $city == '' || $zip == '' || $email == '' || $address == '' || $country == '' || $phone =='' || $password == ''){
            return  '<div class="edit-msg er">Vui lòng điền đầy đủ thông tin!</div>';
            return $message;
        }
        else{
            if($this->check_email_exist($email) == true){
                return  '<div class="edit-msg er">Email đã tồn tại!</div>';
            } 
            else{
                $query = "INSERT INTO `tbl_customer`( `name`, `address`, `city`, `country`, `zipcode`, `phone`, `email`, `password`) 
                          VALUES ('$name','$address','$city','$country','$zip','$phone','$email','$password')";
                $action = $this->db->insert($query);
                if($action){
                    return "Thêm thành công";
                }
                return  '<div class="edit-msg er">Thêm thất bại, vui lòng thử lại!</div>';
            }
        }
     }
     public function customer_login($data){
        $email = mysqli_real_escape_string($this->db->link, $data['Username']);
        $password = mysqli_real_escape_string($this->db->link, md5($data['Password']));
        if($email == '' || $password == ''){
            return  '<div class="edit-msg er">Vui lòng điền đầy đủ thông tin!</div>';
        }
        else{
          $check = $this->check_account($email, $password);
          if($check != false){
            $this->session->init();
            $id = $check;
            $customer = $this->getAccountById($id);
            if($customer){
                $this->session->set('customer_id', $customer['id']);
                $this->session->set('customer_name', $customer['name']);
                $this->session->set('customer_email', $customer['email']);
                $this->session->set('customer_address',$customer['address']);
                $this->session->set('customer_city', $customer['city']);
                $this->session->set('customer_country', $customer['country']);
                $this->session->set('customer_phone', $customer['phone']);
                $this->session->set('customer_password', $customer['password']);
                $this->session->set('customer_zipcode', $customer['zipcode']);
                $this->session->set('customer_login', true);
                header('location: index.php');
            }

          } 
          else{
            return  '<div class="edit-msg er">sai tài khoản hoặc mật khẩu!</div>';
          } 
        }
        
     }
     public function customer_edit_profile($data, $id){
        $name = mysqli_real_escape_string($this->db->link,$data['username']);
        $country = mysqli_real_escape_string($this->db->link,$data['country']);
        $phone = mysqli_real_escape_string($this->db->link,$data['phone']);
        $zipcode = mysqli_real_escape_string($this->db->link,$data['zipcode']);
        $city = mysqli_real_escape_string($this->db->link,$data['city']);
        $address = mysqli_real_escape_string($this->db->link,$data['address']);
        if($name != '' && $country != '' && $phone != '' && $zipcode != '' && $city != '' && $address != ''){
            $query = "UPDATE `tbl_customer` SET `name`='$name',`address`='$address',`city`='$city',
                      `country`='$country',`zipcode`='$zipcode',`phone`='$phone' WHERE id = '$id'";
            $result = $this->db->update($query);
            if($result){
                $this->session->set('customer_name', $name);
                $this->session->set('customer_country', $country);
                $this->session->set('customer_phone', $phone);
                $this->session->set('customer_zipcode', $zipcode);
                $this->session->set('customer_city', $city);
                $this->session->set('customer_address', $address);
                return "Cập nhật thành công";
            }
            else{
                return "Cập nhật thất bại";
            }
        }
        else{
            return "Vui lòng điền đầy đủ thông tin";
        }
     }
     public function customer_changePassword($data, $id){
            $old_password = mysqli_real_escape_string($this->db->link, md5($data['oldPass']));
            $new_password = mysqli_real_escape_string($this->db->link, md5($data['newPass']));
            $retype_password = mysqli_real_escape_string($this->db->link,md5($data['retypePass']));
            if($old_password != '' && $new_password != '' && $retype_password != ''){
                if($this->check_password($old_password, $id)){
                        if($new_password === $retype_password){
                          $query = "UPDATE tbl_customer SET password = '$new_password'";
                          $result = $this->db->update($query);
                          if($result){
                            return  '<div class="edit-msg">Đổi mật khẩu thành công</div>';
                          }
                        }
                        else{
                            return  '<div class="edit-msg" style="background-color:#ff6d6d">Mật khẩu nhập lại không khớp!</div>';
                        }
                }
                else{
                    return'<div class="edit-msg" style="background-color:#ff6d6d">Sai mật khẩu!</div>';
                }
            }
            else{
                return '<div class="edit-msg" style="background-color:#ff6d6d">Vui lòng điền đầy đủ thông tin!</div>';
            }
     }
     public function check_password($password , $id){
           $query = "SELECT * FROM tbl_customer WHERE id = '$id' AND password = '$password'";
           $result = $this->db->select($query);
           if($result && $result->num_rows > 0){
            return true;
           }
           else{
            return false;
           }
     }
     public function getAccountById($Id){
        $query = "SELECT *FROM tbl_customer WHERE id = '$Id'";
        $result = $this->db->select($query);
        if($result && $result->num_rows >0){
            return $result->fetch_assoc();
        }
        return false;
     }
     public function check_account($email, $password){
        $query = "SELECT * FROM tbl_customer WHERE email = '$email' AND password = '$password'";
        $result = $this->db->select($query);
        
        if($result && $result->num_rows > 0){
            $row = $result->fetch_assoc();
            return $row['id'];
        }
        return false;
     }
     
     public function check_email_exist($email){
        $query = "SELECT * FROM tbl_customer WHERE email = '$email' ";
        $act = $this->db->select($query);
        return $act ? true : false;
     }
 };
?>