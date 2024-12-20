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
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
<?php 
	if(!isset($_GET['proid']) || $_GET['proid']==NULL){
	echo "<script>window.location='404.php'</script>";
	}else{
    		$id=$_GET['proid'];
	}
	$customer_id = Session::get('customer_id');
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])){
    $productid  = $_POST['productid'];
    $insertCompare = $product->insertCompare($productid,$customer_id);	
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $quantity  = $_POST['quantity'];
    $insertCart = $ct->add_to_cart($quantity,$id);	
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
					<p><?php echo $fm->textShorter($result_details['product_desc'],5000)?></p>					
					<div class="price">
						<p>Giá: <span><?php echo $result_details['price'].".","VN"?></span></p>
						<p>Danh mục: <span><?php echo $result_details['category_Name']?></span></p>
						<p>Thương hiệu:<span><?php echo $result_details['brand_Name']?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1" min = "1"/>
						<input type="submit" class="buysubmit" name="submit" value="Thêm vào giỏ"/>
						<?php
						if (isset($insertCompare)){
							echo $insertCompare;
						}
						 ?>
					</form>		
					<?php 
						if(isset($Addtocart)) {
							echo '<span style="color:red;font-size:18px;">Sản phẩm đã được thêm vào giỏ hàng</span>';
						}
						?>		
				</div>
				<div class="add-cart">
					<!-- <a href="" class="buysubmit">Lưu vào danh sách ưa thích</a> -->
				</div>
				<div class="add-cart">
					<form action="" method="POST">
					<!-- <a href="?wlist=<?php echo $result_details['productid'] ?>" class ="buysubmit"> Lưu vào sản phẩm yêu thích </a>
					<a href="?wlist=<?php echo $result_details['productid'] ?>" class ="buysubmit"> So sánh sản phẩm </a> -->
					<input type="hidden" name="productid" value="<?php echo $result_details['productid'] ?>"/>
					<input type="submit" class="buysubmit" name="compare" value="So sánh"/>
				
					</form>
				</div>
			</div>
			<div class="product-desc">
			<h2>Thông tin chi tiết về sản phẩm</h2>
			<p><?php echo $fm->textShorter($result_details['product_desc'],1000)?></p>
	        </div>

			<?php
			// comment
			require_once("comment.php");
			?>
				
	</div>
	<?php
			}
		}
			?>
				<div class="rightsidebar span_3_of_1">
					<h2>Danh mục</h2>
					<ul>
						<?php
						$getall_category = $cat->show_category_frontend();
						if($getall_category){
							while($result_allcat=$getall_category->fetch_assoc()){
						?>
				      <li><a href="productbycat.php?id=<?php echo $result_allcat['id']?>"><?php echo $result_allcat['category_Name']?></a></li>
					  <?php
						}
					}
						?>
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

