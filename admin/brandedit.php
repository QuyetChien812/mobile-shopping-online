<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php 
$brand = new Brand();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    if(isset($_POST['brandName'])){
        $new = $_POST['brandName'];
        $action = $brand->editBrand($new, $id);
    }
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa thương hiệu</h2>
                <?php if(isset($action)) echo $action; ?>
               <div class="block copyblock"> 
                 <form method="post" action="">
                    <table class="form">
                        <?php
                        $num = $brand->getNumberOfBrand();
                        if($num > 0){ 
                            $id = $_GET['id'];
                            $data = $brand->getBrandById($id);
                            while($row = $data->fetch_assoc()){  ?>					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $row['brand_Name']; ?>" placeholder="Nhập tên thương hiệu..." class="medium" name="brandName" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Lưu" />
                            </td>
                        </tr>
                        <?php }
                        }
                         ?>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>