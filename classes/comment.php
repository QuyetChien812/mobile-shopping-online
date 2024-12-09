<?php
$filepath = realpath(dirname(__FILE__));
require_once($filepath.'/../lib/database.php');
require_once($filepath.'/../helpers/format.php');
?>
<?php
class Comment{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }
    public function insert_comment($idPro, $name, $comment,$date){
    if($comment != ''){
    $sql = "INSERT INTO `tbl_comment`(`idProduct`, `comment`, `customerName`, `date`)
                              VALUES ('$idPro','$comment','$name', '$date')";
    $result = $this->db->insert($sql);
    if($result){
        return $result;
    }
    else{
        return "đã xảy ra lỗi, vui lòng thử lại";
    }
    }
    else{
        return "bình luận không được để trống";
    }
    }
    public function get_comment_byIdProduct($idPro){
        $query = "SELECT * FROM tbl_comment WHERE idProduct = '$idPro'";
        $result = $this->db->select($query);
        if($result){
            return $result;
        }
        return false;
    }
}
?>