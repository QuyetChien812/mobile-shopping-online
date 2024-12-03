<?php
require_once("../classes/brand.php");
?>
<?php
$brand = new Brand();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $action = $brand->deleteBrand($id);
    if($action){
        header("location: brandlist.php");
    }
}
?>