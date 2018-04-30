<?php
require "../config.php";

Session::start();
if(!Session::get("status") || Session::get("status")!=3){
    header("location: index.html");
}


/*
$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DB);
$selected_id = -1;
$selected_name = "";
$selected_description = "";
*/

$selectedCategory = new Category();

if(isset($_GET['cid'])){
    $selectedCategory=Category::get($_GET['cid']);
}

if(isset($_POST['btn_insert'])){
    $selectedCategory=new Category;
    $selectedCategory->name=$_POST['tb_name'];
    $selectedCategory->description=$_POST['tb_description'];
    $selectedCategory->insert();
}

if(isset($_POST['btn_update'])){
    $selectedCategory=Category::get($_POST['selcategory']);
    $selectedCategory->name=$_POST['tb_name'];
    $selectedCategory->description=$_POST['tb_description'];
    $selectedCategory->update();
}

if(isset($_POST['btn_delete'])){
	$selected_id=$_POST['selcategory'];
	mysqli_query($conn,"delete from categories where id={$selected_id}");
}
?>

<form action="" method="post">
    <?php
    $allCategories=Category::getAll();

    ?>
<select onchange="window.location='?cid=' +this.value" name="selcategory">
<option value="-1">Movie category</option>
<?php
foreach($allCategories as $rw){
echo "<option " . ($selectedCategory->id==$rw->id?"selected":"") . " value='{$rw->id}'>{$rw->name}</option>";	}

?>
</select>
Name:<br>
<input type="text" name="tb_name" value="<?php echo $selectedCategory->name;?>"><br>
Description:<br>
<input type="text" name="tb_description" value="<?php echo $selectedCategory->description;?>"></br><br>
<input type="submit" value="Add new" name="btn_insert">
<input type="submit" value="Update" name="btn_update">
<input type="submit" value="Delete" name="btn_delete">
</form>













