<?php
  session_start();

  if (!isset(($_SESSION["status"]))) {
    header("location:index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Admin</title>
</head>
<body>
  <form method="post">
    <h1>Selamat datang <?php echo $_SESSION["nama_pengguna"] ?></h1>
    <button type="submit" name="logout">Log Out</button>
  </form>
  <?php
    if (isset($_POST["logout"])) {
      session_unset();
      session_destroy();
      header("location:index.php");
    }
  ?>
</body>
</html>