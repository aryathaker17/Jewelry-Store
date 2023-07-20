<?php 
//Arya Thaker IT202-004 04/05/23, Semester Project Phase 4  at54@njit.edu.

session_start();
if (!isset($login_message)) {
 $login_message = 'You must login to view this page.';
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Exquisite Jewelers | Login</title>
    <link rel="shortcut icon" href="images/Jewl_logo.png">
    <link rel="stylesheet" href="login.css">
  </head>
    <header id="container">
    <img src="images/Jewl_logo.png" alt="logo" class="logo">
    <?php include("header.php") ?>
</header>
    </header>
  <body>
  <main>
    <h1 id="log">Login</h1>
    <form id="login_form" action="authenticate.php"  method="post">
      <label>Email:</label>
      <input type="text" name="email" value="email">
      <br>
      <label>Password:</label>
      <input type="password" name="password" value="password">
      <br>
      <input type="submit" value="Login">
    </form>
    <p id="message"><?php echo $login_message; ?></p>
  </main>
  <footer>
        <p>&copy; <?php echo date('Y'); ?>
        Arya Thaker, 02/17/23, IT202004, Semester Project</p>
    </footer>
  </body>
</html>