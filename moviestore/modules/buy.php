<?php

$id=isset($_GET['mid'])&&is_numeric($_GET['mid'])?$_GET['mid']:0;
$rw=Movie::get($id);

if(!$rw){
    echo "Movie does not exist";
}else {
    ?>
    <div class="leftbox">
        <h3><?php echo $rw->title; ?>
            <h3>
                <img src="images/<?php echo $rw->image; ?>" width="93" height="95" alt="photo 1" class="left"/>
                <p><b>Price:</b> <b>$<?php echo $rw->price; ?></b> &amp; eligible for FREE Super Saver Shipping on
                    orders over <b>$195</b>.</p>
                <p><b><?php if ($rw->supersaver){ ?>Availability:</b> Usually ships within 24 hours</p><?php } ?>

                <form action="?indexP.php&page=3" method="post">
                    <input type="hidden" name="bbb" value="<?php echo $rw->id;?>">
                    <input type="number" name="quantity">
                    <input type="submit" value="add" >
                </form>
                <div class="clear"></div>
    </div>

    <?php
}
?>

<div class="clear"></div>













