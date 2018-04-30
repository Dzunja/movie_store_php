<?php
include "config.php";

$conn=Database::getInstance();

class Category extends ActiveRecord
{
    public static $table = "categories";
    public static $key = "id";
}
/*
$cat = Category::get(32);
print_r($cat);

$cat->name = "Action";
$cat->description="Ovo je promena";
$cat->save();
//print_r($cat);
*/



