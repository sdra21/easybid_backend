<?php 
include "connect.php"; 
 
$alldata =array(); 
$alldata['status'] = "success"; 
 
//categories table 
$categories = getAllData("categories", null , null , false); 
$alldata['categories'] = $categories; 

//New Arrival Data 
$new_arrival = getAllData("itemsview", "items_date >= DATE_SUB(NOW()  ,INTERVAL 1 MONTH ) AND items_active = 1" , null , false); 
$alldata['new_arrival'] = $new_arrival;

//Bidding Items Data 
$bidding_items = getAllData("itemsview", " items_active = 1 AND CURTIME() BETWEEN start_time AND end_time" , null , false); 
$alldata['bidding_items'] = $bidding_items;


// items table 
$items = getAllData("itemsview", "items_active != 0" , null , false); 


$alldata['items'] = $items; 


echo json_encode($alldata);

?>