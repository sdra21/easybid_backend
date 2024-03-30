<?php
include "../connect.php";

$itemsId = filterRequest("items_id");
$itemsName = filterRequest("items_name");
$itemsDesc = filterRequest("items_desc");
$itemsPrice = filterRequest("items_price");
$itemsCat = filterRequest("items_cat");
$itemsSubCat = filterRequest("items_subcat");
$startTime = filterRequest("items_start_time");
$biddingTime = filterRequest("items_bidding_time");

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
    "start_price" => $itemsPrice,
    "items_cat" => $itemsCat,
    "items_subcat" => $itemsSubCat,
    "start_time" => $startTime,
    "end_time" => $newEndTime,
);

// Assuming updateData function exists and works as expected
updateData("items", $data, "items_id = $itemsId");
?>
