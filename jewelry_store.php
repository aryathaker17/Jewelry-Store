<?php
$dsn = 'mysql:host=localhost;dbname=jewelry_store';
$username = 'web_user';
$password = 'pa55word';

try {
    $db = new PDO($dsn, $username, $password);   
} catch(PDOException $exception) {
    $error_message = $exception->getMessage();
    include('database_error.php');
    echo $error_message;
    exit();
}

// Check if the email and password provided by an administrator are valid
function is_valid_admin_login($email, $password) {
    global $db;
    $query = 'SELECT password FROM jewelryManagers WHERE emailAddress = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $row = $statement->fetch();
    $statement->closeCursor();

    if($row === false) {
        return false;
    } else {
        $hash = $row['password'];
        return password_verify($password, $hash);
    }
}
?>
