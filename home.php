<?php 
include "connect.php"; 
 
$alldata =array(); 
$alldata['status'] = "success"; 
 
//categories table 
$categories = getAllData("categories", null , null , false); 
 
$alldata['categories'] = $categories; 

//subcategories table 
// $subcategories = getAllData("subcategories", null , null , false); 
 
// $alldata['subcategories'] = $subcategories;


//items table 
$items = getAllData("itemsview", "items_active != 0" , null , false); 
 
$alldata['items'] = $items; 


echo json_encode($alldata);

?>