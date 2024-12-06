﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
$filepath= realpath(dirname(__FILE__));
require_once($filepath."/../classes/cart.php");
require_once($filepath."/../helpers/format.php");
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>STT</th>
							<th>Order time</th>
							<th>Product</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$ct = new cart();
						$fm = new Format();
						$get_inbox_cart = $ct->get_inbox_cart();
						if($get_inbox_cart){
							$i = 0;
							while($result = $get_inbox_cart->fetch_assoc()){
						       $i++;
						?>
							
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $fm->formatDate($result['date_order']) ?></td>
							<td><?php echo $result['productName'] ?></td>
							<td><?php echo $result['quantity'] ?></td>
							<td><?php echo $result['price'].' '.'VND' ?></td>
							<td><a href="customer.php?customerid=<?php echo $result['customer_id']?>">View Address</a></td>
							<td>
								<?php
								if($result['status']==0){
								?>
								<a href="?shiftid=<?php echo $result['id']?>&price=<?php echo $result['price']?>&time=<?php echo $result['date_order']?>">Đang chờ xử lý</a> 
								<?php 
							}else{								
								?>
								<a href="?shiftid=<?php echo $result['id']?>&price=<?php echo $result['price']?>&time=<?php echo $result['date_order']?>">Xóa</a>
								<?php 
								}
								?>
								
							</td>
						</tr>
						<?php
							}}
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
