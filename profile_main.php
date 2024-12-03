<div class="main">
        <div class="member-account-box">
    <div class="welcome-title">Xin chào:<?php echo Session::get('customer_name'); ?> </div>
    <input id="name" name="username" type="text" disabled="disabled" value="Họ và tên: <?php echo Session::get('customer_name'); ?> "> 
    <input id="email" name="email" type="email" disabled="disabled" value="email: <?php echo Session::get('customer_email'); ?>">
    <select id="country" disabled="disabled" name="country"  class="frm-field required" style="color: black;">
    <option value="null" <?php echo Session::get('customer_country') === 'null' ? 'selected' : ''; ?>>Chọn quốc gia</option>         
    <option value="AF" <?php echo Session::get('customer_country') === 'AF' ? 'selected' : ''; ?>>Afghanistan</option>
    <option value="AL" <?php echo Session::get('customer_country') === 'AL' ? 'selected' : ''; ?>>Albania</option>
    <option value="DZ" <?php echo Session::get('customer_country') === 'DZ' ? 'selected' : ''; ?>>Algeria</option>
    <option value="AR" <?php echo Session::get('customer_country') === 'AR' ? 'selected' : ''; ?>>Argentina</option>
    <option value="AM" <?php echo Session::get('customer_country') === 'AM' ? 'selected' : ''; ?>>Armenia</option>
    <option value="AW" <?php echo Session::get('customer_country') === 'AW' ? 'selected' : ''; ?>>Aruba</option>
    <option value="AU" <?php echo Session::get('customer_country') === 'AU' ? 'selected' : ''; ?>>Australia</option>
    <option value="AT" <?php echo Session::get('customer_country') === 'AT' ? 'selected' : ''; ?>>Austria</option>
    <option value="AZ" <?php echo Session::get('customer_country') === 'AZ' ? 'selected' : ''; ?>>Azerbaijan</option>
    <option value="BS" <?php echo Session::get('customer_country') === 'BS' ? 'selected' : ''; ?>>Bahamas</option>
    <option value="BH" <?php echo Session::get('customer_country') === 'BH' ? 'selected' : ''; ?>>Bahrain</option>
    <option value="BD" <?php echo Session::get('customer_country') === 'BD' ? 'selected' : ''; ?>>Bangladesh</option>
    <option value="VIE" <?php echo Session::get('customer_country') === 'VIE' ? 'selected' : ''; ?>>Việt Nam</option>
	</select>
    <input type="text" name="phone" disabled="disabled" value="Số điện thoại: <?php echo Session::get('customer_phone') ?>">
    <input type="text" name="zipcode" disabled="disabled" value="Zip Code:  <?php echo Session::get('customer_zipcode') ?> ">
    <input type="text" name="city" disabled="disabled" value="Thành phố: <?php echo Session::get('customer_city') ?> ">
    <input type="text" name="address" disabled="disabled" value="Địa chỉ: <?php echo Session::get('customer_address') ?>  "> 
    <a class="changePass" href="profile.php?act=chanepassword"><span>Đổi mật khẩu</span> </a>
    <a class="editProfile" href="profile.php?act=edit"> 
    <input type="submit" name="edit-info" value="Sửa thông tin">
    </a>
    </div>
        	
       <div class="clear"></div>
        </div>