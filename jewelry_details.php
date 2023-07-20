<?php
require('jewelry_store.php');

//Get jewelry ID from URL
$jewelryID = filter_input(INPUT_GET, 'jewelry_id', FILTER_VALIDATE_INT);
if ($jewelryID == NULL || $jewelryID == FALSE) {
    $error = "Invalid jewelry ID.";
} else {
    // Get the jewelry record from the database
    $queryJewelry = 'SELECT * FROM jewelry
                    WHERE jewelryID = :jewelryID';
    $statement = $db->prepare($queryJewelry);
    $statement->bindValue(':jewelryID', $jewelryID);
    $statement->execute();
    $jewelry = $statement->fetch();
    $statement->closeCursor();

    // Check if the jewelry record exists
    if (empty($jewelry)) {
        $error = "Jewelry record not found.";
    }
}

?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exquisite Jewelers | Jewelry Details</title>
    <link rel="stylesheet" href="jewl.css">
    <link rel="shortcut icon" href="images/Jewl_logo.png">
</head>
<header id="container">
    <img src="images/Jewl_logo.png" alt="logo" class="logo">
    <?php include("header.php") ?>
</header>

<main>
    <?php if (isset($error)) {
        echo '<p>' . $error . '</p>';
    } else {
    ?>
        <h1>Jewelry Details</h1>
        <div class="details">
            <img id="jewelry-image" src="<?php echo $jewelry['imagePath']; ?>" alt="Jewelry Image">
            
            <ul>
                <li><strong>Code:</strong> <?php echo $jewelry['jewelryCode']; ?></li>
                <li><strong>Name:</strong> <?php echo $jewelry['jewelryName']; ?></li>
                <li><strong>Price:</strong> <?php echo $jewelry['price']; ?></li>
                <li><strong>Description:</strong> <?php echo $jewelry['description']; ?></li>
            </ul>
        </div>
    <?php } ?>
    <script>
        const image = document.querySelector('#jewelry-image');

        image.addEventListener('mouseover', function() {
          this.style.filter = 'grayscale(100%)';
        });

        image.addEventListener('mouseout', function() {
          this.style.filter = 'none';
        });
    </script>
</main>

<footer>
    <p>&copy; <?php echo date('Y'); ?>
        Arya Thaker, 02/17/23, IT202004, Semester Project</p>
</footer>

</html>
