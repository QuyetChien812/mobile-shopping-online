<?php
$filepath = realpath(dirname(__FILE__));
require_once($filepath.'/../lib/database.php');
require_once($filepath.'/../helpers/format.php');
?>
<?php
class customer
{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_customers($data){
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $gioi_tinh = mysqli_real_escape_string($this->db->link, $data['gioi_tinh']);
        $birthday = mysqli_real_escape_string($this->db->link, $data['birthday']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $province = mysqli_real_escape_string($this->db->link, $data['province']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $password = mysqli_real_escape_string($this->db->link, $data['password']);
        if($name==""||$gioi_tinh==""||$birthday==""||$email==""||$address==""||$province==""||$phone==""||$password==""){
            $alert = "<span class='error'>Vui lòng nhập đầy đủ thông tin</span>";
            return $alert;
        }else{
            $check_email = "SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
            $result_check = $this ->db->select($check_email);
            if($result_check){
                $alert = "<span class='error'>Email này đã tồn tại</span>";
                return $alert;   
            }else{
                $query = "INSERT INTO tbl_customer (name,gioi_tinh,birthday,email,address,province,phone,password) VALUES('$name','$gioi_tinh','$birthday','$email',
                '$address','$province','$phone','$password')";
                $result =  $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'>Tạo tài khoản thành công</span>";
                    return $alert;
                }
                else{
                    $alert = "<span class='success'>Tạo tài khoản thất bại</span>";
                    return $alert;
                }
            }

        }
    }
    public function login_customers($data){
         $email = mysqli_real_escape_string($this->db->link, $data['email']);
         $password = mysqli_real_escape_string($this->db->link, $data['password']);
        if($email==""||$password==""){
            $alert = "<span class='error'>Vui lòng nhập đầy đủ thông tin</span>";
            return $alert;
        }else{
            $check_login = "SELECT * FROM tbl_customer WHERE email='$email' AND password='$password'";
            $result_check = $this ->db->select($check_login);
            if($result_check ){
                $value = $result_check -> fetch_assoc();
                Session::set('customer_login',true);
                Session::set('customer_id',$value['id']);
                Session::set('customer_name',$value['name']);
                header('Location:order.php');
            }else{
                $alert = "<span class='error'>Email hoặc Mật khẩu không chính xác</span>";
                return $alert;
                
            }

        }
    }
    
}

?>