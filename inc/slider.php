	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php 
				$getLastestip = $product->getLastestip();
				if($getLastestip){
					while($resultip = $getLastestip->fetch_assoc()){
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php"> <img src="admin/upload/<?php echo $resultip['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Iphone</h2>
						<p><?php echo $resultip['productName'] ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultip['productid'] ?>">Add to cart</a></span></div>
				   </div>
			   </div>
			   <?php 
					}}
			   ?>
			   <?php 
				$getLastestSS = $product->getLastestsamsung();
				if($getLastestSS){
					while($resultSS = $getLastestSS->fetch_assoc()){
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="details.php"><img src="admin/upload/<?php echo $resultSS['image'] ?>" alt="" ></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Samsung</h2>
						  <p><?php echo $resultSS['productName'] ?></p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $resultSS['productid'] ?>">Add to cart</a></span></div>
					</div>
				</div>
				<?php 
					}}
			   ?>
			</div>
			<div class="section group">
			<?php 
				$getLastestop = $product->getLastestoppo();
				if($getLastestop){
					while($resultop = $getLastestop->fetch_assoc()){
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php"> <img src="admin/upload/<?php echo $resultop['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Oppo</h2>
						<p><?php echo $resultop['productName'] ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultop['productid'] ?>">Add to cart</a></span></div>
				   </div>
			   </div>	
			   <?php 
					}}
			   ?>	
			   <?php 
				$getLastestXiaomi = $product->getLastestXiaomi();
				if($getLastestXiaomi){
					while($resultXiaomi = $getLastestXiaomi->fetch_assoc()){
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="details.php"><img src="admin/upload/<?php echo $resultXiaomi['image'] ?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Xiaomi</h2>
						  <p><?php echo $resultXiaomi['productName'] ?></p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $resultXiaomi['productid'] ?>">Add to cart</a></span></div>
					</div>
				</div>
				<?php 
					}}
			   ?>
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<?php
						$get_slider = $product->show_slider();
						if($get_slider){
							while($result_slider = $get_slider ->fetch_assoc()){

							
						
						?>
						<li><img src="admin/upload/<?php echo $result_slider['slider_image'] ?>" 
						alt="<?php echo $result_slider['sliderName'] ?>"/></li>
						<?php
							}
						}		
						?>
						
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>