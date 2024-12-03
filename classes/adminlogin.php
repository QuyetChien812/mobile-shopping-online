<?php
$filepath= realpath(dirname(__FILE__));
require_once($filepath.'/../lib/database.php');
require_once($filepath.'/../helpers/format.php');
require_once($filepath.'/../lib/session.php');
session::checkLogin();
class adminlogin {
    private $db;
    private $fm;
    public function __construct(){
    $this->db = new Database();
    $this->fm = new Format();
    }
    public function login_admin($adminUser, $adminPass){
    $adminUser = $this->fm->validation($adminUser);
    $adminPass = $this->fm->validation($adminPass);
    $adminUser = mysqli_real_escape_string($this->db->link,$adminUser);
    $adminPass = mysqli_real_escape_string($this->db->link,$adminPass);
    if(empty($adminUser) || empty($adminPass)){
        $alert = "User and Pass must be not empty";
        return $alert;
    }
    else{
        $query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser' AND adminPass = '$adminPass'";
        $result = $this->db->select($query);
        if($result != false){
          $value = $result->fetch_assoc();
          Session::set('login', true);
          Session::set('name', $value['adminName']);
          Session::set('pass', $value['adminPass']);
          Session::set('id', $value['adminID']);
          Session::set('admin_email', $value['adminEmail']);
          Session::set('userName', $value['adminUser']);
          header('location:index.php');
          exit();
        }
        else{
            $alert = "User and Pass not match";
            return $alert;
        }
    }
    }
}
?>