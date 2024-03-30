<?php

include "../connect.php";

$itemsName = filterRequest("items_name");
$itemsDesc = filterRequest("items_desc");
$itemsImage = filterRequest("items_image");
$itemsPrice = filterRequest("items_price");
$itemsCat=filterRequest("items_cat");
$itemsSubCat=filterRequest("items_subcat");
$startTime=filterRequest("items_start_time");
$biddingTime=filterRequest("items_bidding_time");
$itemUser=filterRequest("items_user");
$image = imageUpload('../upload/items' , 'files');


// Parse the start time string into a DateTime object
$startTimeDateTime = DateTime::createFromFormat('Y-m-d H:i', $startTime);
// Add bidding time to start time
$endTimeDateTime = clone $startTimeDateTime; // Clone the start time to avoid modifying it directly
$endTimeDateTime->add(new DateInterval('PT'.$biddingTime.'M'));
// Format the resulting time back into the desired format
$newEndTime = $endTimeDateTime->format('Y-m-d H:i');

$data = array(
    "items_name" => $itemsName,
    "items_desc" => $itemsDesc,
    "items_image" =>  $itemsImage,
    "start_price" => $itemsPrice,
    "items_cat" => $itemsCat,
    "items_subcat"=>$itemsSubCat,
    "start_time"=>$startTime,
    "items_user"=>$itemUser,
    "end_time"=>$newEndTime,
);
insertData("items" , $data) ; 
?>