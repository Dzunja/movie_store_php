<?php
require "../config.php";

Session::start();
if(!Session::get("status") || Session::get("status")!=3){
    header("location: index.html");
}



/*
$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DB);
$selected_id=-1;
$selected_title="";
$selected_price="";
$selected_image="";
$selected_availability=0;
$selected_supersaver = 0;
$selected_category = 0;
*/
$selectedMovie= new Movie;

if(isset($_GET['mid'])){
    $selectedMovie=Movie::get($_GET['mid']);
} 

if(isset($_POST['btn_insert'])){
    $selectedMovie= new Movie;
	$selectedMovie->title = $_POST['tb_title'];
    $selectedMovie->price = $_POST['tb_price'];
		if(isset($_FILES['fup_image'])){
			move_uploaded_file($_FILES['fup_image']['tmp_name'],"../images/".$_FILES['fup_image']['name']);
            $selectedMovie->image = $_FILES['fup_image']['name'];
		}
    $selectedMovie->availability = isset($_POST['cb_availability']);
    $selectedMovie->supersaver = isset($_POST['cb_supersaver']);
    $selectedMovie->category = $_POST['selcategory'];
    $selectedMovie->save();

if(isset($_POST['btn_update'])){
    $selectedMovie= Movie::get($_POST['selMovie']);
    $selectedMovie->title = $_POST['tb_title'];
    $selectedMovie->price = $_POST['tb_price'];
    if(isset($_FILES['fup_image']) &&$_FILES['fup_image']['size']>0){
        move_uploaded_file($_FILES['fup_image']['tmp_name'],"../images/".$_FILES['fup_image']['name']);
        $selectedMovie->image = $_FILES['fup_image']['name'];
    }
    $selectedMovie->availability = isset($_POST['cb_availability']);
    $selectedMovie->supersaver = isset($_POST['cb_supersaver']);
    $selectedMovie->category = $_POST['selcategory'];
    $selectedMovie->update();


}

if(isset($_POST['btn_delete'])){
    $selectedMovie= Movie::get($_POST['selMovie']);
	$selectedMovie->delete($_POST['selMovie']);
}
?>

<form action="" method="post" enctype="multipart/form-data">
<select onchange ="if(this.value<0)return;window.location='?mid=' + this.value" name="selMovie" >
<option value="-1">Select Movie</option>
<?php
$allMovies=Movie::getAll();
//$q = mysqli_query($conn,"select * from movies");
?>
<?php 
foreach($allMovies as $rw){
    {
        echo "<option " . ($selectedMovie->id==$rw->id?"selected":"") . " value='{$rw->id}'>{$rw->title}</option>";
    }
}
?>
</select>


<br>
Title:<br>
<input type="text" name="tb_title" value="<?php echo $selectedMovie->title; ?>">
<br>
<br>
Price:<br>
<input type="text" name="tb_price" value="<?php echo $selectedMovie->price; ?>" >
<br>
<br>
Availability:<br>
<input type="checkbox" name="cb_availability" <?php echo($selectedMovie->availability)?"checked":""?>>
<br>
<br>
Supersaver:<br>
<input type="checkbox" name="cb_supersaver" <?php echo($selectedMovie->supersaver)?"checked":""?>>
<br>
<br>
Category:<br>
<select name="selcategory">
<?php
//$q = mysqli_query($conn,"select * from categories");
$allCategory=Category::getAll();

?>
<option value="-1">Select category</option>
<?php
foreach($allCategory as $rw){
echo "<option " . ($selectedMovie->category==$rw->id?"selected":"") . " value='{$rw->id}'>{$rw->name}</option>";	}
?>
</select>
<br />
<img src="../images/<?php echo $selectedMovie->image; ?>" width="93" height="95" />
<input type="file" name="fup_image" />
<br /><br />
<input type="submit" name="btn_insert" value="Add new" />
<input type="submit" name="btn_update" value="Update" />
<input type="submit" name="btn_delete" value="Delete" />
</form>

<br>
<?php
/*
require "../config.php";
$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DB);
$selected_id=-1;
$selected_title="";
$selected_price="";
$selected_image="";
$selected_availability=0;
$selected_supersaver=0;
$selected_category=0;


if(isset($_GET['mid'])){
	$q = mysqli_query($conn,"select * from movies where id = {$_GET['mid']}");
	$rw = mysqli_fetch_object($q);
	if($rw){
		$selected_id = $rw->id;
		$selected_title = $rw->title;
		$selected_price = $rw->price;
		$selected_image = $rw->image;
		$selected_availability = $rw->availability;
		$selected_supersaver = $rw->supersaver;
		$selected_category = $rw->category;
	}
} 
if(isset($_POST['btn_insert'])){
	$selected_title=$_POST['tb_title'];
	$selected_price=$_POST['tb_price'];
	
	$selected_availability=isset($_POST['cb_availability']);
	$selected_supersaver=isset($_POST['cb_supersaver']);
	$selected_category=$_POST['selcategory'];
	
	if(isset($_FILES['fup_image'])){
			move_uploaded_file($_FILES['fup_image']['tmp_name'],"../images/".$_FILES['fup_image']['name']);
			$selected_image = $_FILES['fup_image']['name'];
		} 
	mysqli_query($conn,"insert into movies values (null,'{$selected_title}','{$selected_price}','{$selected_image}','{$selected_availability}','{$selected_supersaver}','{$selected_category}')");
	$selected_id = mysqli_insert_id($conn);
}

if(isset($_POST['btn_update'])){
	$selected_title=$_POST['tb_title'];
	$selected_price=$_POST['tb_price'];
	
	$selected_availability=isset($_POST['cb_availability']);
	$selected_supersaver=isset($_POST['cb_supersaver']);
	$selected_category=$_POST['selcategory'];
	$selected_id = $_POST['selMovie'];
	if(isset($_FILES['fup_image'])){
	move_uploaded_file($_FILES['fup_image']['tmp_name'],"../images/".$_FILES['fup_image']['name']);
			$selected_image = $_FILES['fup_image']['name'];
		} 
	mysqli_query($conn,"update movies set title='{$selected_title}',price='{$selected_price}',availability='{$selected_availability}', supersaver='{selected_supersaver}',category='{selected_category}' where id ={$selected_id} ");
}

if(isset($_POST['btn_delete'])){
	$selected_id = $_POST['selMovie'];
	mysqli_query($conn,"delete from movies where id ={$selected_id} ");
}
?>

<form method="post" action="">
<select onchange = "window.location='?mid=' + this.value" name="selMovie">
<option value="-1">Select Movie<option>
<?php 
$q=mysqli_query($conn,"select * from movies");
?>
<?php
while($rw=mysqli_fetch_object($q)){
	echo "<option " . ($selected_id==$rw->id?"selected":"") . " value='{$rw->id}'>{$rw->title}</option>";		
}
?>
</select>
<br>
Title:<br>
<input type="text" name="tb_title" value="<?php echo $selected_title;?>">
<br>
<br>
Price: <br>
<input type="text" name="tb_price" value="<?php echo $selected_price;?>">
<br>
<br>
Availability<br>
<input type="checkbox" name="cb_availability" value="<?php echo ($selected_availability)?"checked":""; ?>">
<br>
Supersaver<br>
<input type="checkbox" name="cb_supersaver" value="<?php echo ($selected_supersaver)?"checked":""; ?>">
<br>
Category<br>
<?php
$q = mysqli_query($conn,"select * from categories");
?>
<select name="selcategory">
<option value="-1">Select category</option>
<?php
while($rw=mysqli_fetch_object($q)){ 
	echo "<option " . ($selected_category==$rw->id?"selected":"") . " value='{$rw->id}'>{$rw->name}</option>";		
}
?>
</select><br><br>
<img src="../images/<?php echo $selected_image;?>" width="93" height="95" >
<input type="file" name="fup_image"><br><br>
<input type="submit" name="btn_insert" value="Add new" />
<input type="submit" name="btn_update" value="Update" />
<input type="submit" name="btn_delete" value="Delete" />
<br>
















</form>
*/