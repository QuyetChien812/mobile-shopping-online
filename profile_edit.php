<?php
if(isset($_POST['edit-info'])){
    $data = $_POST;
    $act = $customer->customer_edit_profile($data, Session::get('customer_id'));
}
?>
<div class="main">
        <div class="member-account-box">
    <a href="profile.php" style="color: white; font-size: 16px; padding: 5px; border-radius: 5px;
    background-color: #333; max-width: 80px; display: flex; justify-content: center;">Quay lại</a>
    <div class="welcome-title">Sửa thông tin của bạn </div>
    <?php
    if(isset($act)){ ?>
    <div class="edit-msg"><?php echo $act ?></div>
    <?php }
    ?>
    <form action="" method="post" class="profile-form-edit">
    <div class="prf-title">Họ và tên:</div>
    <input id="name" name="username" type="text"  value="<?php echo Session::get('customer_name'); ?> "> 
    <div class="prf-title">Quốc gia:</div>
    <select id="country"  name="country"  class="frm-field required" style="color: black;">
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
    <div class="prf-title">Số điện thoại:</div>
    <input type="text" name="phone"  value="<?php echo Session::get('customer_phone') ?>">
    <div class="prf-title">zip code:</div>
    <input type="text" name="zipcode"  value="<?php echo Session::get('customer_zipcode') ?> ">
    <div class="prf-title">Thành phố:</div>
    <input type="text" name="city" value="<?php echo Session::get('customer_city') ?> ">
    <div class="prf-title">Địa chỉ:</div>
    <input type="text" name="address"  value="<?php echo Session::get('customer_address') ?>  "> 
    <input class="prf-submit" type="submit" name="edit-info" value="Xác nhận">
    
    </form>
    </div>
        	
       <div class="clear"></div>
        </div>