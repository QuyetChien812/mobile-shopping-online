<!DOCTYPE HTML>
<head>
<title>Free Smart Store Website Template</title>
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
		?>
		

 <div class="main">
    <div class="content">
    	
		<?php
		if ($_SERVER['REQUEST_METHOD']=='POST'){
            $tukhoa = $_POST['tukhoa'];
            $search_product = $product ->search_product($tukhoa);{
		?>
    		<div class="heading">
    		<h3>Từ khóa tìm kiếm <?php echo $tukhoa?></h3>
    		<div class="clear"></div>

			<?php	
			}
			}
				?>
    	</div>
	    <div class="section group">
			<?php
			
			if ($search_product){
				while($result=$search_product->fetch_assoc()){
			?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/upload/<?php echo $result['image']?>" width="200px" alt="" /></a>
					 <h2><?php echo $result['productName']?></h2>
					 <p><?php echo $fm->textShorter($result['product_desc'],50)?></p>
					 <p><span class="price"><?php echo $result['price'].' '.'VND'?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productid']?>" class="details">Chi tiết</a></span></div>
				</div>
			<?php	
			}
			}
				?>
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

