<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php 
$category = new Category();
if(isset($_GET['id'])){
  $id = $_GET['id'];
  if(isset($_POST['cateName'])){
    $cate = $_POST['cateName'];
    $action = $category->eidtCate($cate, $id);
  }
}
else{
    header('location: catlist.php');
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục</h2>
                <?php if(isset($action)) echo $action; ?>
               <div class="block copyblock"> 
                 <form method="post" action="">
                    <table class="form">
                        <?php $show_cate = $category->getCategoryByID($id);
                        if($show_cate != false){
                            while($row = $show_cate->fetch_assoc()){
                        ?>					
                        <tr>
                            <td>
                                <input type="text" placeholder="" value="<?php echo $row['category_Name'] ?>" class="medium" name="cateName" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Lưu" />
                            </td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>