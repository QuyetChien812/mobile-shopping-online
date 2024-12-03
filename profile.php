<!DOCTYPE php>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" href="css/profile.css">
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
		<?php require_once('inc/header.php');
    $login = Session::get('customer_login');
    if(!$login){
      ?>
      <div class="main-box">
        <div class="member-not-login">
          <p>Bạn cần đăng nhập để truy cập trang profile.</p>
          <div>
            <p>Đăng nhập ở đây:</p>
            <a href="login.php">Login</a>
          </div>
        </div>
      </div>
      <?php
    }
    else{ 
      if(isset($_GET['act'])){
        $action = $_GET['act'];
        if($action == 'edit'){
          require_once('profile_edit.php');
        }
        if($action == 'chanepassword'){
          require_once('profile_changepassword.php');
        }
      }
      else{
        require_once('profile_main.php');
      }
      
    }
    ?>
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

