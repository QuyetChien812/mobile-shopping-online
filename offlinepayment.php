<!DOCTYPE HTML>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
<style>
    .box_left{
        width: 45%;
        border: 1px solid #666;
        float: left;
        padding: 4px;
    }
    .box_right{
        width: 45%;
        border: 1px solid #666;
        float: right;
        padding: 4px;
    }
	.a_order{
		padding: 7px 20px;
		background: red;
		font-size: 21px;
		color: #fff;
	}
</style>
</head>
<form action="" method="POST">
  <div class="wrap">
	<?php
    require_once('inc/header.php');
	?>
	<?php if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
	$customer_id= Session::get('customer_id');
	$insertOrder= $ct->insertOrder($customer_id);
	$delCart=$ct->del_all_data_cart();
	header('Location:success.php');
}
	?>
<div>
 <div class="main">
    <div class="content">
    	<div class="section group">
        <div class="heading">
                <h3>Thanh toán trực tiếp</h3>
                </div>
                <div class="clear"></div>
                <div class="box_left">
                <div class="cartpage">
					<?php
					if(isset($update_quantity_cart)) {
						echo $update_quantity_cart ;
					}
					?>
					<?php
					if(isset($delcart)) {
						echo $delcart ;
					}
					?>
						<table class="tblone">
							<tr>
                                <th width="5%">ID</th>
								<th width="15">Product Name</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
							</tr>
							<?php
							$get_product_cart = $ct->get_product_cart();
							if($get_product_cart){
								$subtotal = 0;
								$qty = 0;
                                $i = 0;
								while($result = $get_product_cart->fetch_assoc()){
									$i++;
							?>
							<tr>
                                <td><?php echo $i; ?></td>
								<td><?php echo $result['productName'] ?></td>
								<td><?php echo $result['price'].' '.'VND' ?></td>
								<td>
                                <?php echo $result['quantity'] ?>
								</td>
								<td><?php
								 $total = $result['price'] * $result['quantity'];
								 echo $total.' '.'VND';
								 ?></td>
							</tr>
							<?php 
							$subtotal += $total ;
							$qty = $qty + $result['quantity'] ;
								}
								
						    }
							?>
						</table>
						<?php
							$check_cart = $ct->check_cart();
							if($check_cart){ 								
						
						?>
						<table style="float:right;text-align:left;padding: 5px;margin: 5px" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td><?php
									echo $subtotal.' '.'VND';									
									Session::set('sum',$subtotal);
									Session::set('qty',$qty);

								?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10% (<?php echo $vat = $subtotal *0.1;?>)</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td><?php
								$vat = $subtotal * 0.1;
								$gtotal = $subtotal + $vat;
								echo $gtotal.' '.'VND';
								?> </td>
							</tr>
					   </table>
					   <?php 
					  }else {
                          echo 'Giỏ hàng của bạn trống ! Hãy quay lại mua hàng nhé';
					  }    
 					   ?>
					</div>
                </div>
                <div class="box_right">
                <table class="tblone">
    <tr>
		<td>Họ và tên</td>
		<td>:</td>
		<td><?php echo Session::get('customer_name'); ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><?php echo Session::get('customer_email'); ?></td>
	</tr>
	<tr>
		<td>Số điện thoại</td>
		<td>:</td>
		<td><?php echo Session::get('customer_phone'); ?></td>
	</tr>
	<tr>
		<td>Zipcode</td>
		<td>:</td>
		<td><?php echo Session::get('customer_zipcode'); ?></td>
	</tr> 
	<tr>
		<td>Thành phố</td>
		<td>:</td>
		<td><?php echo Session::get('customer_city'); ?></td>
	</tr> 
	<tr>
		<td>Địa chỉ</td>
		<td>:</td>
		<td><?php echo Session::get('customer_address'); ?></td>
	</tr> 
	<tr>
	<td colspan="3"><a href="profile_edit.php">Cập nhật</a></td>
	</tr>
 </table>
                </div>
 		</div>
 	</div>
	<center><a href="?orderid=order"class="a_order">Đặt hàng</a></center>
</div>
					</div>
</form>
   <?php
   require_once('inc/footer.php');
   ?>

