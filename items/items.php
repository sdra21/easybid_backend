<?php
include "../connect.php";

$categoriesid = filterRequest("id");
$subcategoriesid = filterRequest("sub_cat_id");


if ($subcategoriesid <> "*") {
    // If a subcategory is selected, fetch items based on both category and subcategory
    getAllData("itemsview", "categories_id = $categoriesid AND items_subcat = $subcategoriesid");
} else {
    // If no subcategory is selected, fetch items based only on the category
    getAllData("itemsview", "categories_id = $categoriesid");
}
?>