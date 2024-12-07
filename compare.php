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
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>So sánh sản phẩm</h2>
                    <?php
                    if(isset($update_quantity_cart)){
                        echo $update_quantity_cart;
                    } 
                    ?>
                   
                    <?php
                    if (isset($_GET['proid'])) {
                         $productId = $_GET['proid'];
                         $customer_id = Session::get('customer_id');
                         $deleteCompare = $product->delete_from_compare($customer_id, $productId);
                    if ($deleteCompare) {
                         echo $deleteCompare;
    }
}
?>
                        <table class="tblone">
                            <tr>
                                <th width="10%">Thứ tự</th>
                                <th width="20%">Tên sản phẩm</th>
                                <th width="20%">Hình ảnh</th>
                                <th width="15%">Giá tiền</th>
                                <th width="15%">Hành động</th>
                            </tr>
                            <?php
                            $customer_id = Session::get('customer_id');
                            $get_compare = $product->get_compare($customer_id);
                            if($get_compare){
                                $i =0;
                                
                                while($result =$get_compare->fetch_assoc()){
                                    $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result['productName'] ?></td>
                                <td><img src ="admin/upload/<?php echo $result['image'] ?>" alt=""/></td>
                                <td><?php echo $result['price'] ?></td>
                                <td>
                                <a  href="?proid=<?php echo $result['productId'] ?>">Xóa</a> |
                                <a  href="details.php?proid=<?php echo $result['productId'] ?>">Xem</a>
                            </td>
                            </tr>
                        <?php 
                        
                        }
                    }
                            
                            ?>
                        </table>
					
    	</div>
        </div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
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

