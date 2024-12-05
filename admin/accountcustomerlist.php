<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>
<?php include_once '../helpers/format.php';?>
<?php require '../classes/customer.php'; ?>
<?php $cs = new customer();
	$customer = $cs->get_all_customer();	
	?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách tài khoản khách hàng</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Tên khách hàng</th>
					<th>Email</th>
					<th>Địa chỉ</th>
					<th>Thành phố</th>
					<th>Số điện thoại</th>
					<th>Zip Code</th>
					<th>Quốc gia</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if(isset($customer)){
					while($row = $customer->fetch_assoc()){
				?>
				<tr class="odd gradeX">
					<td><?php echo $row['name']?></td>
					<td><?php echo $row['email']?></td>
					<td><?php echo  $row['address']?></td>
					<td><?php echo  $row['city']?></td>
					<td><?php echo  $row['phone']?></td>
					<td><?php echo $row['zipcode']?></td>
					<td><?php echo $row['country']?></td>
					<td><a></a> 
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
