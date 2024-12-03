<?php
if(isset($_POST['changepassword'])){
    $data = $_POST;
    $act = $customer->customer_changePassword($data, Session::get('customer_id'));
}
?>
<div class="main">
        <div class="member-account-box">
    <a href="profile.php" style="color: white; font-size: 16px; padding: 5px; border-radius: 5px;
    background-color: #333; max-width: 80px; display: flex; justify-content: center;">Quay lại</a>
    <div class="welcome-title">Đổi mật khẩu của bạn</div>
    <?php
    if(isset($act)){ 
        echo $act;
     }
    ?>
    
    <form action="" method="post" class="profile-form-edit">
    <div class="prf-title">Nhập mật khẩu cũ</div>
    <input id="name" name="oldPass" type="text"  placeholder="Mật khẩu cũ">
    <div class="prf-title">Nhập mật khẩu mới</div>
    <input id="name" name="newPass" type="text"  placeholder="Mật khẩu mới">
    <div class="prf-title">Nhập lại mật khẩu mới</div>
    <input id="name" name="retypePass" type="text"  placeholder="Xác nhận mật khẩu mới">
    <input class="prf-submit" type="submit" name="changepassword" value="Xác nhận">
    </form>
    </div>
        	
       <div class="clear"></div>
        </div>