	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php 
				$getLastestDell = $product->getLastestDell();
				if($getLastestDell){
					while($resultdell = $getLastestDell->fetch_assoc()){
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php"> <img src="admin/upload/<?php echo $resultdell['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Dell</h2>
						<p><?php echo $resultdell['productName'] ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultdell['productid'] ?>">Add to cart</a></span></div>
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
				$getLastesthw = $product->getLastesthuawei();
				if($getLastesthw){
					while($resulthw = $getLastesthw->fetch_assoc()){
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="details.php"><img src="admin/upload/<?php echo $resulthw['image'] ?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Huawei</h2>
						  <p><?php echo $resulthw['productName'] ?></p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $resulthw['productid'] ?>">Add to cart</a></span></div>
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