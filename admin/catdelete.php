<?php include '../classes/category.php';?>
<?php 
$category = new Category();
if(isset($_GET['id']) && $_GET['id'] != ''){
    $id  = $_GET['id'];
    $action = $category->deleteCate($id);
    if($action == true){
        header('location: catlist.php');
    }
}
?>