<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>
<?php include_once '../helpers/format.php';?>
<?php require '../classes/admin.php'; ?>
<?php $ad = new admin();
	$admin = $ad->get_all_admin_account();	
	?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách tài khoản admin</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Mã Admin</th>
					<th>Tên Admin</th>
					<th>Email Admin</th>
					<th>Phân quyền</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if(isset($admin)){
					while($row = $admin->fetch_assoc()){
				?>
				<tr class="odd gradeX">
					<td><?php echo $row['adminID']?></td>
					<td><?php echo $row['adminName']?></td>
					<td><?php echo $row['adminEmail']?></td>
					<td><?php echo $row['level']?></td>
				</tr>
				<?php
					}
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
