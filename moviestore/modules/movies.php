<?php
$category = isset($_GET['cid'])&& is_numeric($_GET['cid'])?$_GET['cid']:1;
$movies=Movie::getAll("where category = $category");
foreach($movies as $rw){
	?>
	<div class="leftbox">
          <h3><?php echo $rw->title; ?><h3>
          <img src="images/<?php echo $rw->image; ?>" width="93" height="95" alt="photo 1" class="left" />
          <p><b>Price:</b> <b>$<?php echo $rw->price; ?></b> &amp; eligible for FREE Super Saver Shipping on orders over <b>$195</b>.</p>
          <p><b><?php if($rw->supersaver){?>Availability:</b> Usually ships within 24 hours</p><?php } ?>
          <p class="readmore"><a href="?page=5&mid=<?php echo $rw->id;?>">BUY <b>NOW</b></a></p>
          <div class="clear"></div>
        </div>
	<?php
}
?>
<div class="clear"></div>
<?php 
	/*<div class="leftbox">
          <h3>Star Wars Trilogy (Widescreen Edition)</h3>
          <img src="images/photo_1.jpg" width="93" height="95" alt="photo 1" class="left" />
          <p><b>Price:</b> <b>$225.97</b> &amp; eligible for FREE Super Saver Shipping on orders over <b>$195</b>.</p>
          <p><b>Availability:</b> Usually ships within 24 hours</p>
          <p class="readmore"><a href="http://www.free-css.com/">BUY <b>NOW</b></a></p>
          <div class="clear"></div>
        </div>
        <!-- end .leftbox -->
        <div class="rightbox">
          <h3>Batman - The Animated Series </h3>
          <img src="images/photo_4.jpg" width="107" height="91" alt="photo 4" class="left" />
          <p><b>Price:</b> <b>$125</b> &amp; eligible for FREE Super Saver Shipping on orders over <b>$105</b>.</p>
          <p><b>Availability:</b> Usually ships within 24 hours</p>
          <p class="readmore"><a href="http://www.free-css.com/">BUY <b>NOW</b></a></p>
          <div class="clear"></div>
        </div>
        <!-- end .rightbox -->
        <div class="clear br"></div>
        <div class="leftbox">
          <h3>Harry Potter and the Prisoner of Azkaban </h3>
          <img src="images/photo_2.jpg" width="93" height="101" alt="photo 2" class="left" />
          <p><b>Price:</b> <b>$350</b> &amp; eligible for FREE Super Saver Shipping on orders over <b>$295</b>.</p>
          <p><b>Availability:</b> Usually ships within 24 hours</p>
          <p class="readmore"><a href="http://www.free-css.com/">BUY <b>NOW</b></a></p>
          <div class="clear"></div>
        </div>
        <!-- end .leftbox -->
        <div class="rightbox">
          <h3>Blade - Trinity (New Platinum Series)</h3>
          <img src="images/photo_5.jpg" width="90" height="103" alt="photo 5" class="left" />
          <p><b>Price:</b> <b>$115</b> &amp; eligible for FREE Super Saver Shipping on orders over <b>$95</b>.</p>
          <p><b>Availability:</b> Usually ships within 24 hours</p>
          <p class="readmore"><a href="http://www.free-css.com/">BUY <b>NOW</b></a></p>
          <div class="clear"></div>
        </div>
        <!-- end .rightbox -->
        <div class="clear br"></div>
        <div class="leftbox">
          <h3>Million Dollar Baby (Widescreen Edition)</h3>
          <img src="images/photo_3.jpg" width="106" height="100" alt="photo 3" class="left" />
          <p><b>Price:</b> <b>$105.97</b> &amp; eligible for FREE Super Saver Shipping on orders over <b>$99</b>.</p>
          <p><b>Availability:</b> Usually ships within 24 hours</p>
          <p class="readmore"><a href="http://www.free-css.com/">BUY <b>NOW</b></a></p>
          <div class="clear"></div>
        </div>
        <!-- end .leftbox -->
        <div class="rightbox">
          <h3>The Matrix Reloaded (Full Screen Edition)</h3>
          <img src="images/photo_6.jpg" width="91" height="99" alt="photo 6" class="left" />
          <p><b>Price:</b> <b>$75</b> &amp; eligible for FREE Super Saver Shipping on orders over <b>$55</b>.</p>
          <p><b>Availability:</b> Usually ships within 24 hours</p>
          <p class="readmore"><a href="http://www.free-css.com/">BUY <b>NOW</b></a></p>
          <div class="clear"></div>
        </div>
        <!-- end .rightbox -->
        <div class="clear"></div>
*/