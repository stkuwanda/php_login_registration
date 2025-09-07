<?php 
session_start();

if(!isset($_SESSION['email'])){
  header("Location: index.php");
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Admin Page</title>
</head>
<body class="bg-light">
  <div class="box">
    <h1>Welcome, <span><?= $_SESSION['name'] ?></span></h1>
    <p>This is an <span>Admin</span> page</p>
    <button onclick="window.location.href='logout.php'">Logout</button>
  </div>
</body>
</html>