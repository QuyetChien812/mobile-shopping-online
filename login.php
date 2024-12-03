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
		// đăng ký
		if(isset($_POST['regis'])){
			 $act2 = $customer->add_customer($_POST);
		}
		?>
		<?php
		// đăng nhập
		if(isset($_POST['login'])){
           $act = $customer->customer_login($_POST);
		}
		?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Tài khoản</h3>
        	<p>Đăng nhập tài khoản ở đây.</p>
            <?php
            if(isset($act)){ 
            echo $act;
            }
            ?>
        	<form action="" method="post" id="member">
                	<input  type="text" name="Username" class="field" placeholder="Tên tài khoản">
                    <input  type="password" name="Password" class="field" placeholder="Mật khẩu" >
					<input type="submit" class="regis-submit" name="login" value="Đăng nhập">
                 </form>
                 
                    
						
					<p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
					</div>
                    </div>

    	<div class="register_account">
    		<h3>Đăng ký tài khoản mới.</h3>
            <?php if(isset($act2)) echo $act2; ?>
    		<form method="post" action="">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input style="color: black;" type="text" name="user"  placeholder="Họ và tên">
							</div>
							
							<div>
							   <input style="color: black;" type="text" name="City" placeholder="Thành phố" >
							</div>
							
							<div>
								<input style="color: black;" type="text" name="zipcode" placeholder="Zip-Code">
							</div>
							<div>
								<input style="color: black;" class="input-cs" type="email" name="email" placeholder="Email">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input style="color: black;" type="text" name="Address" placeholder="Địa chỉ">
						</div>
		    		<div>
						<select id="country" name="country"  class="frm-field required">
							<option value="null">Chọn quốc gia</option>         
							<option value="AF">Afghanistan</option>
							<option value="AL">Albania</option>
							<option value="DZ">Algeria</option>
							<option value="AR">Argentina</option>
							<option value="AM">Armenia</option>
							<option value="AW">Aruba</option>
							<option value="AU">Australia</option>
							<option value="AT">Austria</option>
							<option value="AZ">Azerbaijan</option>
							<option value="BS">Bahamas</option>
							<option value="BH">Bahrain</option>
							<option value="BD">Bangladesh</option>
							<option value="VIE">Việt Nam</option>

		         </select>
				 </div>		        
	
		           <div>
		          <input style="color: black;" class="customer-input" type="text" name="Phone" placeholder="Điện thoại">
		          </div>
				  
				  <div>
					<input style="color: black;" class="input-cs" type="password" name="Password" placeholder="Mật khẩu">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div>
			<input type="submit" class="regis-submit" name="regis" value="Đăng ký tài khoản"></div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
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
<style>
	.edit-msg{
    padding: 5px 15px;
    background-color: rgb(130, 174, 130);
    color: white;
    margin: 0 auto;
    text-align: center;
    border-radius: 5px
}
.er{
	background-color:red;
	color: white;
}
</style>
