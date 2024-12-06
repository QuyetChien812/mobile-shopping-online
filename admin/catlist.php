<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php
$cate = new Category();
$category_row = $cate->getAllCategory();
$category_num = $cate->getNumberOfCategory();
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách danh mục</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Mã danh mục</th>
							<th>Tên danh mục</th>
							<th>Hành động</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 0;
						if($category_num > 0){?>
						<?php while( $row = $category_row->fetch_assoc()) { $i++; ?>
						<tr class="odd gradeX">
							<td><?php echo $i ?></td>
							<td><?php echo  $row['category_Name']; ?></td>
							<td><a href="catedit.php?id=<?php echo $row['id'] ?>">Sửa</a> || <a href="catdelete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('do you want to delete')" >Xóa</a></td>
						</tr>
						<?php } ?>
					    <?php }
						else{?>
                        <tr>
							<td colspan="3">Không có danh mục nào</td>
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

