<!DOCTYPE HTML>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<!--- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!--- bootstrap -->
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
<body>
    <?php
   require_once("inc/header.php");
   $cart = $ct->get_all_product_cart();
   
   $quantity_ct = 0;
   $total_price = 0;
   if($cart != false){
    while($row = $cart->fetch_assoc()){
        $quantity_ct += $row['quantity'];
        $total_price +=( $row['price'] * $row['quantity'] );
    }
   }
   ?>
   <div class="container">
        <!-- Section 1: Tổng tiền -->
        <div class="form-section">
            
            <div class="row align-items-center mb-3">
                
            </div>
            <div class="row">
                <div class="col-md-6">Số lượng sản phẩm</div>
                <div class="col-md-6 text-end"><?php echo $quantity_ct; ?></div>
            </div>
            <div class="row">
                <div class="col-md-6">Tiền hàng (tạm tính)</div>
                <div class="col-md-6 text-end"><?php echo number_format($total_price, 0, ',', '.')."đ"; ?></div>
            </div>
            <div class="row">
                <div class="col-md-6">Phí vận chuyển</div>
                <div class="col-md-6 text-end">Miễn phí</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 fw-bold">Tổng tiền (bao gồm VAT 10%)</div>
                <div class="col-md-6 text-end total-amount"><?php echo number_format($total_price*1.1, 0, ',', '.')."đ"; ?></div>
            </div>
        </div>

        <!-- Section 2: Thông tin thanh toán -->
        <div class="form-section">
            <h5>Thông tin thanh toán</h5>
            <div class="d-flex align-items-center">
                <img src="./images/MoMo.webp" alt="VNPay Logo" class="vnpay-logo" width="8%">        
            </div>
            <div><span >Hình thức thanh toán: MOMO</span></div>
        </div>

        <!-- Section 3: Thông tin nhận hàng -->
        <div class="form-section">
            <h5>Thông tin nhận hàng</h5>
            <div class="mb-2">
                <strong>Khách hàng:</strong> <?php echo Session::get('customer_name'); ?>
            </div>
            <div class="mb-2">
                <strong>Số điện thoại:</strong> <?php echo Session::get('customer_phone'); ?>
            </div>
            <div class="mb-2">
                <strong>Email:</strong> <?php echo Session::get('customer_email'); ?>
            </div>
            <div>
                <strong>Nhận hàng tại:</strong> <?php echo Session::get('customer_address'); ?>
            </div>
            <h5>Lưu ý:</h5>
            <div><span>- Hạn mức thanh toán tối đa bằng MoMo dưới 50.000.000vnđ</span></div>
            
        </div>

        <!-- Section 4: Điều khoản và nút thanh toán -->
        <div class="form-section">
            <div class="text-center">
                <form action="congthanhtoanQR.php" method="post">
                    <p><input name="total_price" type="hidden" value="<?php echo $total_price*1.1; ?>"></p>
                    <button name="captureWallet" class="btn btn-danger">Thanh toán MOMO QR</button>
                </form>
                <form action="congthanhtoanATM.php" method="post">
                    <p><input name="total_price" type="hidden" value="<?php echo $total_price*1.1; ?>"></p>
                    <button name="payWithATM" class="btn btn-danger">Thanh toán MOMO ATM</button>
                </form>
                
            </div>
            <div class="text-center mt-3">
                <a href="#" class="text-primary">Kiểm tra danh sách sản phẩm (2)</a>
            </div>
        </div>
    </div>

   <?php
   require_once('inc/footer.php');
   ?>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
   

