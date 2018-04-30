<?php
if(isset($_POST['btnCheckout'])) {
    $name = $_POST['tbName'];
    $address = $_POST['tbAddress'];


    if (!isset($_SESSION['card']) || empty($_SESSION['card'])) {
        echo 'Card is empty';
    } else {
        $cardcontent = json_encode($_SESSION['card']);//pretvara asocijativni niz u string

        $q = "insert into orders values (null,'{$name}','{$address}','{$cardcontent}')";
        mysqli_query($conn, $q);
		echo "Poslato";
    }
}


?>
<form action="" method="post">
    Name: <input type="text" name="tbName"><br>
    Adress: <textarea type="text" name="tbAddress"></textarea><br>
    <input type="submit" name="btnCheckout">
</form>