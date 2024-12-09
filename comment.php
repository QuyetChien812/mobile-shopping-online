<?php
if(isset($_POST['submit_comment'])){
    if(Session::get('customer_login')){
        $datetime = date('Y-m-d H:i:s');
        $idProduct = $_POST['id_pro'];
        $customerName = Session::get('customer_name');
        $comment = isset($_POST['comment']) ? trim($_POST['comment']) : '';
        $action = $cm->insert_comment($idProduct, $customerName, $comment, $datetime);
    }
    else {
        echo "<script>
                if (confirm('Bạn chưa đăng nhập. Bạn có muốn đăng nhập để bình luận?')) {
                    window.location.href = 'login.php'; // Chuyển hướng đến trang đăng nhập
                }
              </script>";
    }
}
?>
<div class="comment">
				<div class="row">
					<div class="col-md-8">
						<h5>Bình luận về sản phẩm</h5>
                        <?php
                        if(isset($action)){
                            echo $action;
                        }
                        ?>
						<form action="" method="post">
                        <p><input type="hidden" name="id_pro" value="<?php echo $_GET['proid']; ?>"></p>
						<p><textarea name="comment" class="form-control" style="resize: none;" rows="5" placeholder="Thêm bình luận sản phẩm..."></textarea></p>
						<p><input type="submit" name="submit_comment" class="btn btn-success" value="Bình luận"></p>
						</form>
					</div>
				</div>
			</div>
            <div class="comments-section mt-5">
    <h5 class="mb-4 text-primary">Các bình luận của khách hàng:</h5>
    <?php
    $comment = $cm->get_comment_byIdProduct($_GET['proid']);
    if($comment){
        while($row = $comment->fetch_assoc()){
    ?>
    <div class="comment mb-4 p-3 border rounded shadow-sm" style="border-bottom: 1px solid #d4d4d4;">
        <div class="comment-header d-flex justify-content-between align-items-center">
            <strong class="customer-name"><?php echo $row['customerName']; ?></strong>
            <small class="text-muted"><?php echo $row['date']; ?></small>
        </div>
        <p class="mt-2 mb-0 comment-text"><?php echo $row['comment']; ?></p>
    </div>
    <?php
        }
    }
    else{
        echo '<div class="no-comments text-muted text-center mt-4">
                <em>Chưa có bình luận nào cho sản phẩm này.</em>
              </div>';
    }
    ?>
</div>
     