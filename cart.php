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
     if(isset($_GET['cartId'])) {
		$cartId = $_GET['cartId'];
		$delcart = $ct -> del_product_cart($cartId);
	 }
     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
		$cartId = $_POST['cartId'];
         $quantity = $_POST['quantity'];
		 $update_quantity_cart = $ct->update_quantity_cart($quantity,$cartId);
		 if($quantity<=0){
			$delcart = $ct -> del_product_cart($cartId);
		 }


	 }
?>
<?php
   if(!isset($_GET['id'])) {
	echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
   }
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2 style = "width:500px;">Giỏ hàng của bạn</h2>
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
								<th width="20%">Tên sản phẩm</th>
								<th width="10%">Hình ảnh</th>
								<th width="15%">Giá</th>
								<th width="25%">Số lượng</th>
								<th width="20%">Tổng cộng</th>
								<th width="10%">Chỉnh sửa</th>
							</tr>
							<?php
							$get_product_cart = $ct->get_product_cart();
							if($get_product_cart){
								$subtotal = 0;
								$qty = 0;
								while($result = $get_product_cart->fetch_assoc()){
									
							?>
							<tr>
								<td><?php echo $result['productName'] ?></td>
								<td><img src="admin/upload/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo $result['price'] ?></td>
								<td>
									<form action="" method="post">
									    <input type="hidden" name="cartId" value="<?php echo $result['cartId'] ?>"/>
										<input type="number" name="quantity" min ="0" value="<?php echo $result['quantity'] ?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td><?php
								 $total = $result['price'] * $result['quantity'];
								 echo $total;
								 ?></td>
								<td><a onclick="return confirm('Bạn chắc chắn muốn xóa chứ?');" href="?cartId=<?php echo $result['cartId'] ?>">Xóa</a></td>
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
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Tổng chưa thuế : </th>
								<td><?php
									echo $subtotal;									
									Session::set('sum',$subtotal);
									Session::set('qty',$qty);

								?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Tổng sau thuế :</th>
								<td><?php
								$vat = $subtotal * 0.1;
								$gtotal = $subtotal + $vat;
								echo $gtotal;
								?> </td>
							</tr>
					   </table>
					   <?php 
					  }else {
                          echo 'Giỏ hàng của bạn trống ! Hãy quay lại mua hàng nhé';
					  }    
 					   ?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
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

