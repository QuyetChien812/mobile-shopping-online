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
<?php 
	$login_check = Session::get('customer_login');
	if($login_check){
		header('Location:order.php');
	}
?>
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

    $insertCustomers = $cs->insert_customers($_POST);
}
?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){

    $login_Customers = $cs->login_customers($_POST);
}
?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
			<?php
			 if (isset($insertCustomers)){
				echo $insertCustomers;
			}
			?>
        	<form action="" method="POST" >
                	<input type="text" name="email" class="field" placeholder="Nhập email...">
                    <input type="password" name="password" class="field" placeholder="Nhập mật khẩu...">
                 <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                    <div class="buttons"><div><input type="submit" name="login" class="grey" value="Đăng nhập"></div></div>
			</form>
         </div>
		<?php

		?>
    	<div class="register_account">
    		<h3>Đăng ký tài khoản mới</h3>
			<?php
			if (isset($insertCustomers)){
				echo $insertCustomers;
			}
			?>
    		<form action="" method="POST">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Nhập tên..."  >
							</div>
							
							<div>
							<select id="gioi_tinh" name="gioi_tinh" onchange="change_gioitinh(this.value)" class="frm-field required">
							<option value="null">Chọn giới tính: </option>         
							<option value="Nam">Nam</option>
							<option value="Nữ">Nữ</option>
							</div>
							
							<div>
								<input type="text" name="birthday" placeholder="Nhập ngày sinh..." >
							</div>
							<div>
								<input type="text" name="email" placeholder="Nhập email..." >
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Nhập địa chỉ..." >
						</div>
		    		<div>
						<select id="province" name="province" onchange="change_province(this.value)" class="frm-field required">
							<option value="null">Chọn tỉnh/thành phố :</option>         
							<option value="Hà Nội">Hà Nội</option>
							<option value="Thái Bình">Thái Bình</option>
							<option value="Nam Định">Nam Định</option>
							<option value="Yên Bái">Yên Bái</option>
							<option value="Bắc Ninh">Bắc Ninh</option>
							<option value="Thanh Hóa">Thanh Hóa</option>
							<option value="Vĩnh Phúc">Vĩnh Phúc</option>
							<option value="Sơn La">Sơn La</option>
							<option value="Cao Bằng">Cao Bằng</option>
							<option value="Hải Phòng">Hải Phòng</option>
							<option value="Hòa Bình">Hòa Bình</option>
							<option value="Quảng Ninh">Quảng Ninh</option>
							<option value="Bắc Giang">Bắc Giang</option>
							<option value="Hải Dương">Hải Dương</option>
							<option value="Hà Nam">Hà Nam</option>

		         </select>
				 </div>		        
	
		           <div>
		          <input type="text" name="phone" placeholder="Nhập số điện thoại...">
		          </div>
				  
				  <div>
					<input type="text" name="password" placeholder="Nhập mật khẩu..." >
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><input type="submit" name="submit" class="grey" value="Tạo tài khoản"></div></div>
		    
		    <div class="clear"></div>
		    </form>
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
</html>

