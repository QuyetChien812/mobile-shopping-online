<!DOCTYPE php>
<head>
<title>Free Smart Store Website Template</title>
<meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
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
</head>
<body>
  <div class="wrap">
		<?php require_once('inc/header.php') ?>
		<?php
		$login_check= Session::get('customer_login');	
		if($login_check == false) {
			header('Location:login.php');
			}
		$ct = new Cart();
		if(isset($_GET['confirmid'])){
				$id = $_GET['confirmid'];
				$time = $_GET['time'];
				$price = $_GET['price'];
				$shifted_confirm = $ct->shifted_confirm($id,$time,$price);
		}
		?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2 style = "width:500px;">Thông tin đơn hàng đã đặt</h2>
		
						<table class="tblone">
							<tr>
							  <th width="10%">Mã sản phẩm</th>
								<th width="20%">Tên sản phẩm</th>
								<th width="10%">Hình ảnh</th>
								<th width="15%">Giá</th>
								<th width="15%">Số lượng</th>
								<th width="10%">Ngày đặt</th>
								<th width="10%">Trạng thái</th>
								<th width="10%">Đã nhận</th>
							</tr>
							<?php
							$customer_id= Session::get('customer_id');
							$get_cart_ordered = $ct->get_cart_ordered($customer_id);
							if($get_cart_ordered){
								$i = 0;
								$qty = 0;
								while($result = $get_cart_ordered->fetch_assoc()){
									$i++;
							?>
							<tr>
							  <td><?php echo $i; ?></td>
								<td><?php echo $result['productName'] ?></td>
								<td><img src="admin/upload/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo $result['price'].' '.'VND' ?></td>
								<td>
									
									<?php echo $result['quantity'] ?>
										
								
								</td>
								<td><?php echo $fm->formatDate($result['date_order']) ?>	</td>
								<td>
									<?php  
									if($result['status']=='0'){
										echo 'Đang chờ xử lý';
									}elseif($result['status']=='1'){
										?>
										<span>Đang giao</span>
										<?php
									}elseif($result['status']=='2'){
										echo 'Đã nhận hàng';
									}
									?>
								</td>
								<?php
								  if($result['status']=='0'){
									
								 ?>
								 <td> <?php echo'N/A';?></td> 
								 <?php 
								  
									}elseif($result['status']=='1'){
								 ?>
								 <td><a href="?confirmid=<?php echo $customer_id ?>&price=<?php echo $total= $result['price']; ?>&time=<?php echo $result['date_order']?>">Xác nhận</a></td>
								 <?php
									}else{
								 ?>
								<td><?php echo 'Đã nhận hàng'?></td>
							<?php 
						  }
							?>
							</tr>
							<?php 
							
								}
								
						    }
							?>
								
						</table>
						
						
					  
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
   <?php
   require_once('inc/footer.php');
   ?>
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>
</php>

