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
<style>
    h3.payment{
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        text-decoration: underline;
    }
    .wrapper_method{
        text-align: center;
        width: 550px;
        margin: 0 auto;
        border: 1px solid #666;
        padding: 20px;
        background: cornsilk;
    }
    .wrapper_method a{
       padding: 10px;
       background: red;
       color: #fff;
    }
    .wrapper_method h3{
        margin-bottom: 20px;
    }
</style>
</head>
<?php include 'inc/header.php';
?>
<?php
$login_check = Session::get('customer_login');
if($login_check==false){
    header('Location:login.php');
}
?>
<body>
<div class="wrap">
<div class="main">
    <div class="content">
        <div class="section group">
            <div class="content_top">
                <div class="heading">
                    <h3>Phương thức thanh toán</h3>
                </div>
                <div class="clear"></div>
                <div class="wrapper_method">
                <h3 class="payment">Chọn phương thức thanh toán</h3>
                <a class="payment_href" href="offlinepayment.php">Thanh toán trực tiếp</a>
                <a class="payment_href" href="onlinepayment.php">Thanh toán chuyển khoản</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php include 'inc/footer.php';
?>
</body>