<?php
include "../connect.php";


$categoriesid=filterRequest("id");

getAllData("itemsview", "categories_id = $categoriesid && items_active != 0" ); 

?>