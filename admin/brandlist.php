<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php
$brand  = new Brand();
$data = $brand->getAllBrand();
$brand_num = $brand->getNumberOfBrand();
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách thương hiệu</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Mã thương hiệu</th>
							<th>Tên thương hiệu</th>
							<th>Hành động</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 0;
						if($brand_num > 0){?>
						<?php while( $row = $data->fetch_assoc()) { $i++; ?>
						<tr class="odd gradeX">
							<td><?php echo $i ?></td>
							<td><?php echo  $row['brand_Name']; ?></td>
							<td><a href="brandedit.php?id=<?php echo $row['id'] ?>">Sửa</a> || <a href="branddelete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('do you want to delete')" >Xóa</a></td>
						</tr>
						<?php } ?>
					    <?php }
						else{?>
                        <tr>
							<td colspan="3">Hiện chưa có thương hiệu nào</td>
						</tr>
						<?php
						}
						?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
		<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>

