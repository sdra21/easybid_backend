<?php

include "../connect.php";
$search = filterRequest("search");
getAllData("items","items_name LIKE '%$search%'");
// if (empty($search)) {
//     printFailure("Search term is empty");
// } else {
//     $query = "SELECT * FROM items WHERE items_name LIKE '%$search%'";

//     $stmt = $con->prepare($query);
//     $stmt->execute();

//     $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     $count = $stmt->rowCount();

//     if ($count > 0) {
//         echo json_encode(array("status" => "success", "data" => $data));
//     } else {
//         printFailure("No results found");
//     }
// }
?>
