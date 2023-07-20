<?php
require('jewelry_store.php');

//Get Category ID
$jewelryCategoryID = filter_input(INPUT_GET, 'jewelryCategoryID', FILTER_VALIDATE_INT);
if ($jewelryCategoryID == NULL || $jewelryCategoryID == FALSE) {
    $jewelryCategoryID = 1;
}

// Get name for selected category 
$queryCategory = 'SELECT * FROM  jewelryCategories
WHERE jewelryCategoryID = :jewelryCategoryID';
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':jewelryCategoryID', $jewelryCategoryID);
$statement1->execute();
$category = $statement1->fetch();
$category_name = $category['jewelryCategoryName'];
$statement1->closeCursor();


// Get all categories 
$queryAllCategories = 'SELECT * FROM jewelryCategories
                        ORDER BY jewelryCategoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

//Get jewelry for selected category
$queryProducts = 'SELECT * FROM jewelry 
                    WHERE jewelryCategoryID = :jewelryCategoryID 
                    ORDER BY jewelryID';
$statement3 = $db->prepare($queryProducts);
$statement3->bindValue(':jewelryCategoryID', $jewelryCategoryID);
$statement3->execute();
$jewelry = $statement3->fetchAll();
$statement3->closeCursor();






?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exquisite Jewelers | Jewelry</title>
    <link rel="stylesheet" href="jewl.css">
    <link rel="shortcut icon" href="images/Jewl_logo.png">
</head>
<header id="container">
    <img src="images/Jewl_logo.png" alt="logo" class="logo">
    <?php include("header.php") ?>
</header>

<main>
    <h1 id="jewls">Jewelry List</h1>
    <aside>
        <!-- display a list of categories -->
        <h3 id="jewls">Select a preffered category below</h3>
        <nav id="cats">
            <ul>
                <?php foreach ($categories as $category) : ?>
                    <li>
                        <a href="?jewelryCategoryID=<?php echo $category['jewelryCategoryID']; ?>">
                            <?php echo $category['jewelryCategoryName']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </aside>
    <section>
        <!-- display a table of jewelry -->
        <h2><?php echo $category_name; ?></h2>
        <table>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>


                <?php if (isset($_SESSION['is_valid'])) {
                ?>
                    <th>Function</th>
                <?php } ?>
            </tr>

            <?php foreach ($jewelry as $j) : ?>
                <tr>
                    <td>
                        <a href="jewelry_details.php?jewelry_id=<?php echo $j['jewelryID']; ?>">
                            <?php echo $j['jewelryCode']; ?>
                        </a>
                    </td>
                    <td><?php echo $j['jewelryName']; ?></td>
                    <td class="right"><?php echo $j['price']; ?></td>
                    <td><?php echo $j['description']; ?></td>
                    <?php if (isset($_SESSION['is_valid'])) { ?>
                        <td>
                            <form action="delete.php" method="post">
                                <input type="hidden" name="jewelryCode" value="<?php echo $j['jewelryCode']; ?>">
                                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    <?php } ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
</main>

<footer>
    <p>&copy; <?php echo date('Y'); ?>
        Arya Thaker, 02/17/23, IT202004, Semester Project</p>
</footer>

</html>