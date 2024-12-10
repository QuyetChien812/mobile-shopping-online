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
<style type="text/css">
    h2.success_order{
      text-align: center;
      color: red;
    }
    p.success_note{
      text-align: center;
      padding: 8px;
      font-size: 17px;
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
}
	?>
<div>
 <div class="main">
    <div class="content">
    	<div class="section group">
            <h2 class="success_order">Đặt hàng thành công!</h2>
            <?php
            $customer_id= Session::get('customer_id');
            $get_amount = $ct->getAmountPrice($customer_id);
            if($get_amount){
              $amount=0;
              while($result=$get_amount->fetch_assoc()){
                $price=$result['price'];
                $amount+= $price;
              }
            }
            ?>
            <p class="success_note">Tổng tiền bạn đã đặt là <?php $vat=$amount *0.1; $total= $vat+$amount;echo $total.'VND';?></p>
            <p class="success_note">Chúng tôi sẽ liên lạc tới bạn sớm nhất. Xem thông tin đặt hàng ở <a href="orderdetails.php">đây</a></p>
        </div>
        </div>
        </div>
</form>
   <?php
   require_once('inc/footer.php');
   ?>

