<?php
  include_once('lib/session.php');
  Session::init();
?>
<?php
require_once('lib/database.php');
require_once('helpers/format.php');
spl_autoload_register(function($className){
include_once "classes/".$className.".php";
});
$db= new Database();
$fm= new Format();
$ct= new Cart();
$us= new User();
$cat= new Category();
$cs = new customer();
$product= new product();
$customer = new Customer();
?>
<?php  
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache"); 
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
header("Cache-Control: max-age=2592000");
  ?>
<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form action="search.php" method="post">
				    	<input type="text" placeholder="Tìm kiếm sản phẩm" name="tukhoa">
						<input type="submit" name="search_product" value="Tìm kiếm">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="./cart.php" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Cart</span>
								<span class="no_product">
								<?php
								   $check_cart = $ct->check_cart();
											if($check_cart){ 								
											    $sum = Session::get("sum");
												$qty = Session::get("qty");
												echo $sum.' '.'đ'.'-'.'Qty:'.$qty ;
													}else{
												echo 'Empty';
												}
								?>
								</span>
							</a>
						</div>
			      </div>
		   <?php
		   $login = Session::get('customer_login');
		   if($login){
		   ?>
		   <div class="login"><a href="logout.php">logout</a></div>
		   <?php }
		   else{
		   ?>
		   <div class="login"><a href="login.php">Login</a></div>
		   <?php
		   }
		   ?>

		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
 <div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Trang chủ</a></li>
	  <li><a href="products.php">Sản phẩm</a> </li>
	  <li><a href="cart.php">Cart</a></li>
	  <li><a href="compare.php">So Sánh</a></li>
	  <li><a href="contact.php">Liên hệ</a> </li>   
	  <li><a href="orderdetails.php">Đơn hàng đã đặt</a></li>  


	<?php
	    $customer_id= Session::get('customer_id');	
		$check_order = $ct->check_order('customer_id');
		if($check_order == true){ 																			    
		   echo '<li><a href="orderdetails.php">ORDERED</a></li>' ;
		}else{
		   echo '';
		}
	?>
	  <li><a href="profile.php">Thông tin cá nhân</a> </li>
	  <div class="clear"></div>
	</ul>
</div>
