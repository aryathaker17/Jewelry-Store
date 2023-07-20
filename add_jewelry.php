<?php
// Get the product data
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST, 'code', FILTER_VALIDATE_INT);
$name = filter_input(INPUT_POST, 'name');
$description = filter_input(INPUT_POST, 'description');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

 
// Validate inputs
if ($category_id == NULL || $category_id == FALSE || $code == NULL
                         || $name == NULL || $price == NULL
                         || $price == FALSE ) {
    echo "Invalid product data. Check all fields and try again.";
} else {
    require_once('jewelry_store.php');

// Check if jewelry code already exists
$query = 'SELECT COUNT(*) FROM jewelry WHERE jewelryCode = :code';
$statement = $db->prepare($query);
$statement->bindValue(':code', $code);
$statement->execute();
$count = $statement->fetchColumn();
$statement->closeCursor();

if ($count > 0) {
    echo "Jewelry code '$code' already exists. Please enter a different code.";
} else {
    
//  Add the product to the database
$query = 'INSERT INTO jewelry
(jewelryCategoryID, jewelryCode, jewelryName, description, price)
VALUES (:category_id, :code, :name, :description, :price)';
$statement = $db->prepare($query);
$statement->bindValue(':category_id', $category_id);
$statement->bindValue(':code', $code);
$statement->bindValue(':name', $name);
$statement->bindValue(':description', $description);
$statement->bindValue(':price', $price);
$statement->execute();
$statement->closeCursor();

// Display the Product List page
header('Location: jewl.php');
}
}
?>

