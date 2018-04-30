<?php
$category = isset($_GET['cat'])&& is_numeric($_GET['cat'])?$_GET['cat']:1;
$title=isset($_GET['g'])?" and title like '%".$_GET['g']."%'":"";
$q = mysqli_query($conn,"select * from movies where category = $category {$title}");
while($rw = mysqli_fetch_object($q)){
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