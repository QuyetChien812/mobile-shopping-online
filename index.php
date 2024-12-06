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
<body>
    <div class="wrap">
	<?php
    require_once('inc/header.php');
	require_once('inc/slider.php');
	?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Sản phẩm nổi bật</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
			<?php
			$product_featured= $product->getproduct_Featured();
			if($product_featured){
				while($result=$product_featured->fetch_assoc()){
			?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/upload/<?php echo $result['image']?>" alt="" /></a>
					 <h2><?php echo $result['productName']?> </h2>
					 <p><?php echo $fm->textShorter($result['product_desc'],50)?></p>
					 <p><span class="price"><?php echo $result['price']."."."VND"?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productid']?>" class="details">Chi tiết</a></span></div>
			</div>
			<?php
			}
			}
			?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Sản phẩm mới</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			<?php
			$product_new= $product->getproduct_new();
			if($product_new){
				while($result_new=$product_new->fetch_assoc()){
			?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/upload/<?php echo $result_new['image']?>" alt="" /></a>
					 <h2><?php echo $result_new['productName']?> </h2>
					 <p><?php echo $fm->textShorter($result_new['product_desc'],50)?></p>
					 <p><span class="price"><?php echo $result_new['price']."."."VND"?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result_new['productid']?>" class="details">Details</a></span></div>
			</div>
				<?php
			}
			}
			?>
			</div>
			<div class="">
			<?php 
				  $product_all= $product->get_all_product();
				  $product_count= mysqli_num_rows($product_all);
				  $product_button = ceil($product_count/4);
				  $i =1;
				  echo '<p>Trang </p>';
				  for($i=1;$i<=$product_button;$i++){
					echo '<a style="text-align: center; margin:0 5px "href="index.php?trang='.$i.'">'.$i.'</a>';
				  }
				  
			?>
			</div>
    </div>
 </div>
     <?php 
	 require_once('inc/footer.php');
	 ?>
</div>
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
    <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
	  <script defer src="js/jquery.flexslider.js"></script>
	  <script type="text/javascript">
		$(function(){
		  SyntaxHighlighter.all();
		});
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	  </script>
</body>
</html>
