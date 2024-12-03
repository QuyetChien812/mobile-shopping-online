<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php 
$cate = new Category();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $cateName = $_POST['cateName'];
    $action = $cate->addCate($cateName);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm mới danh mục sản phẩm</h2>
                <?php if(isset($action)) echo $action; ?>
               <div class="block copyblock"> 
                 <form method="post" action="catadd.php">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Nhập tên danh mục..." class="medium" name="cateName" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Lưu" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>