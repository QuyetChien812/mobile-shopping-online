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
</head>
  <div class="wrap">
	<?php
    require_once('inc/header.php');
	?>
<?php if(!isset($_GET['proid'])||$_GET['proid']==NULL){
echo "<script>window.location='404.php'</script>";
}else{
    $id=$_GET['proid'];
}
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
			<?php
			$get_product_details = $product->get_details($id);
			if($get_product_details){
				while($result_details=$get_product_details->fetch_assoc()){
			?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/upload/<?php echo $result_details['image']?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result_details['productName']?></h2>
					<p><?php echo $fm->textShorter($result_details['product_desc'],1000)?></p>					
					<div class="price">
						<p>Price: <span><?php echo $result_details['price'].".","VN"?></span></p>
						<p>Category: <span><?php echo $result_details['category_Name']?></span></p>
						<p>Brand:<span><?php echo $result_details['brand_Name']?></span></p>
					</div>
				<div class="add-cart">
					<form action="cart.php" method="post">
						<input type="number" class="buyfield" name="" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>				
				</div>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<p><?php echo $fm->textShorter($result_details['product_desc'],1000)?></p>
	    </div>
				
	</div>
	<?php
			}
		}
			?>
				<div class="rightsidebar span_3_of_1">
					<h2>Danh mục</h2>
					<ul>
				      <li><a href="productbycat.php">Mobile Phones</a></li>
    				</ul>
    	
 				</div>
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
</html>
