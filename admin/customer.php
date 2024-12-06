<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php $filepath= realpath(dirname(__FILE__));
require_once($filepath."/../classes/customer.php");
require_once($filepath."/../helpers/format.php");
?>
<?php 
$cs = new Customer();
if(!isset($_GET['customerid'])||$_GET['customerid']==NULL){
echo "<script>window.location='inbox.php'</script>";
}else{
    $id=$_GET['customerid'];
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục</h2>
               <div class="block copyblock"> 
                 <form method="post" action="">
                    <table class="form">
                        <?php $get_customer = $cs->show_customer($id);
                        if($get_customer){
                            while($result = $get_customer->fetch_assoc()){
                        ?>					
                        <tr>
                            <td>Tên</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['name'] ?>" class="medium" name="cateName" />
                            </td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['phone'] ?>" class="medium" name="cateName" />
                            </td>
                        </tr>
                        <tr>
                            <td>Thành phố</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['city'] ?>" class="medium" name="cateName" />
                            </td>
                        </tr>
                        <tr>
                            <td>Quốc gia</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['country'] ?>" class="medium" name="cateName" />
                            </td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['address'] ?>" class="medium" name="cateName" />
                            </td>
                        </tr>
                        <tr>
                            <td>Zipcode</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['zipcode'] ?>" class="medium" name="cateName" />
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['email'] ?>" class="medium" name="cateName" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php
                            }
                        }
                        ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>