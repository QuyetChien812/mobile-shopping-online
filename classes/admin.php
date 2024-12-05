<?php
$filepath= realpath(dirname(__FILE__));
require_once($filepath.'/../lib/database.php');
require_once($filepath.'/../helpers/format.php');
require_once($filepath.'/../lib/session.php');
?>
<?php
class admin{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }
    public function get_all_admin_account(){
        $qr = "SELECT * FROM tbl_admin";
        $result = $this->db->select($qr);
        if($result){
            return $result;
        }
        else{
            return "Không tìm thấy tài khoản";
        }
    }
}
?>