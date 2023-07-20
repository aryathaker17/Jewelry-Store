<?php
$dsn = 'mysql:host=localhost;dbname=jewelry_store';
$username = 'web_user';
$pa55word = 'pa55word';
//Arya Thaker IT202-004 04/05/23, Semester Project Phase 4  at54@njit.edu.


try {
    $db = new PDO($dsn, $username, $pa55word);
} catch(PDOException $exception) {
    $error_message = $exception->getMessage();
    include('database_error.php');
    echo $error_message;
    exit();
}

if (isset($_POST['jewelryCode'])) {
    $id = $_POST['jewelryCode'];
    $query = "DELETE FROM jewelry 
                WHERE jewelryCode = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}
header("Location: jewl.php");
?>