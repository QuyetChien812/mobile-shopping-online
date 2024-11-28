<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php 
$brand = new Brand();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $brandName = $_POST['brandName'];
    $action = $brand->addBrand($brandName);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm mới thương hiệu</h2>
                <?php if(isset($action)) echo $action; ?>
               <div class="block copyblock"> 
                 <form method="post" action="brandadd.php">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Nhập tên thương hiệu..." class="medium" name="brandName" />
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