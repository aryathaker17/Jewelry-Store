<?php

session_start();


//grabbing info from database
require_once('jewelry_store.php');

$query = 'SELECT *
          FROM jewelryCategories
          ORDER BY jewelryCategoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>


<!DOCTYPE html>
<html>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Exquisite Jewelers | Create</title>
    <link rel="stylesheet" href="create.css">
    <link rel="shortcut icon" href="images/Jewl_logo.png">
</head>
<header id="container">
    <img src="images/Jewl_logo.png" alt="logo" class="logo">
    <?php include("header.php") ?>
</header>

<body>
    <header>
        <h1 id="pm">Product Manager</h1>
    </header>
    <main>
        <h1>Add Product</h1>
        <form action="add_jewelry.php" method="post" id="add_product_form">


            <label>Category:</label>
            <select name="category_id">
                <?php foreach ($categories as $jewelryCat) : ?>
                    <option value="<?php echo $jewelryCat['jewelryCategoryID']; ?>">
                        <?php echo $jewelryCat['jewelryCategoryName']; ?>
                    </option>
                <?php endforeach; ?>
            </select><br>
            <label>Code:</label>
            <input type="number" name="code"><br>

            <label>Name:</label>
            <input type="text" name="name"><br>

            <label> Jewelry Description:</label>
            <textarea name="description" rows="4" cols="35"></textarea><br>

            <label>List Price:</label>
            <input type="number" name="price" step="0.01" min="0" max="100000"><br>


            <label>&nbsp;</label>
            <input type="reset" value="Reset">
            <input type="submit" value="Add Product"><br>


        </form>
        <p><a href="jewl.php">View Product List</a></p>
        <script>
            // Function to validate the form inputs
            function validateForm() {
                // Get the form inputs
                var code = document.forms["add_product_form"]["code"].value;
                var name = document.forms["add_product_form"]["name"].value;
                var description = document.forms["add_product_form"]["description"].value;
                var price = document.forms["add_product_form"]["price"].value;

                // Check the code field
                if (code == "" || code.length < 4 || code.length > 10) {
                    alert("Invalid code input. The code should not be blank and should have a length between 4 and 10 characters.");
                    return false;
                }

                // Check the name field
                if (name == "" || name.length < 10 || name.length > 100) {
                    alert("Invalid name input. The name should not be blank and should have a length between 10 and 100 characters.");
                    return false;
                }

                // Check the description field
                if (description == "" || description.length < 10 || description.length > 255) {
                    alert("Invalid description input. The description should not be blank and should have a length between 10 and 255 characters.");
                    return false;
                }

                // Check the price field
                if (price == "" || price <= 0 || price > 100000) {
                    alert("Invalid price input. The price should not be blank, should not be negative or zero, and should not exceed $100,000.");
                    return false;
                }

                // Return true if all inputs are valid
                return true;
            }

            // Attach the validateForm function to the submit event of the form
            document.forms["add_product_form"].addEventListener("submit", function(event) {
                if (!validateForm()) {
                    // Prevent the form from submitting if the inputs are invalid
                    event.preventDefault();
                }
            });
        </script>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?>
            Arya Thaker, 02/17/23, IT202004, Semester Project</p>
    </footer>
</body>

</html>