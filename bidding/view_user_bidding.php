<?php
include "../connect.php";

$userId = filterRequest("user_id");

getAllData("itemsview", "items_user = $userId");