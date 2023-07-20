<?php
require_once('jewelry_store.php');

$dsn = 'mysql:host=localhost;dbname=jewelry_store';
$username = 'web_user';
$password = 'pa55word';

// Connect to the database
function getDB() {
    global $dsn, $username, $password;
    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch(PDOException $exception) {
        // If there is an error connecting to the database, show an error message and exit the script
        $error_message = $exception->getMessage();
        include('database_error.php');
        exit();
    }
}

// Define an array of email, password, first name, and last name pairs for new accounts
$accounts = [
    [
        'email' => 'user12@gmail.com',
        'password' => 'user12',
        'firstName' => 'Arya',
        'lastName' => 'Thaker'
    ],
    [
        'email' => 'user22@gmail.com',
        'password' => 'user22',
        'firstName' => 'Jane',
        'lastName' => 'Smith'
    ],
    [
        'email' => 'user33@gmail.com',
        'password' => 'user33',
        'firstName' => 'Bob',
        'lastName' => 'Marley'
    ]
];
  
// Loop through the accounts and insert them into the database
foreach ($accounts as $account) {
    add_jewelry_manager($account['email'], $account['password'], $account['firstName'], $account['lastName']);
}

echo 'Accounts added successfully.';

// Add a new jewelry manager to the database
function add_jewelry_manager($email, $password, $firstName, $lastName) {
    try {
        $db = getDB();
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = 'INSERT INTO jewelryManagers (emailAddress, password, firstName, lastName)
                  VALUES (:email, :password, :firstName, :lastName)';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $hash);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->execute();
        $statement->closeCursor();
        echo "Account added successfully! Email: $email, Password: $password, First Name: $firstName, Last Name: $lastName";
    } catch(PDOException $exception) {
        // If there is an error inserting the new account, show an error message and exit the script
        $error_message = $exception->getMessage();
        echo $error_message;
        exit();
    }
}

?>

