<?php
include "../connect.php";
$categoriesid=filterRequest("id");
getAllData("sub_categories", "sub_categories = $categoriesid" ); 
?>
