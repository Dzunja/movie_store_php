<?php
session_start();
if(!isset($_SESSION['card'])){
    $_SESSION['card'] = array();
}
if(isset($_POST['bbb'])&&isset($_POST['quantity'])){
   if(isset($_SESSION['card'][$_POST['bbb']])){
       $_SESSION['card'][$_POST['bbb']]+=$_POST['quantity'];
   }else {
       $_SESSION['card'][$_POST['bbb']]=$_POST['quantity'];
   }
   if($_SESSION['card'][$_POST['bbb']]<=0){
       unset($_SESSION['card'][$_POST['bbb']]);
   }
}
if(empty($_SESSION['card'])){
    echo 'card is empty';

}

print_r($_SESSION['card']);


$movie_ids=array_keys($_SESSION['card']);//sadrzi sve id-ove iz niza
$movie_ids_string=implode(",",$movie_ids);

$r=Movie::getAll($filter=" where id in ({$movie_ids_string})");


/*$q = mysqli_query(Database::get_Instance(),"select * from movies where id in ({$movie_ids_string})");*/


foreach($r as $rw){
    ?>
    <div class="leftbox">
        <h3><?php echo $rw->title; ?></h3>
                <img src="images/<?php echo $rw->image; ?>" width="93" height="95" alt="photo 1" class="left" />
                <p><b>Price:</b> <b><?php echo $rw->price; ?></b> &amp; eligible for FREE Super Saver Shipping on orders over <b>$195</b>.</p>
                <p><b><?php if($rw->supersaver){?>Availability:</b> Usually ships within 24 hours</p><?php } ?>
        Quantity:<?php echo $_SESSION['card'][$rw->id];?>

        <p class="readmore"><a href="?page=5&mid=<?php echo $rw->id;?>">BUY <b>NOW</b></a></p>
                <div class="clear"></div>
    </div>
    <?php

}
?>
    <div class="clear"></div>

<div><a href="?page=6" style="font-size: 22px;">CHECK OUT</a></div>