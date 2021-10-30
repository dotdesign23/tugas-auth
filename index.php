<?php include "database.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Log In</title>
</head>
<body>
  <form method="post">
    <input type="email" name="email" placeholder="Masukkan email anda">
    <input type="password" name="password" placeholder="Masukkan password anda">
    <button type="submit" name="login">Log In</button>
  </form>
  <?php
    session_start();

    if (isset($_POST["login"])) {
      $email = $_POST["email"];
      $password = md5($_POST["password"]);

      $user = mysqli_query($connect, "SELECT * FROM pengguna WHERE email = '$email' AND password = '$password'");

      if (mysqli_num_rows($user) > 0) {
        $_SESSION["status"] = "login";
        foreach ($user as $data) {
          $_SESSION["nama_pengguna"] = $data["nama"];
        }
        header("location:admin.php");
      } else {
        ?>
          <span>Gagal login</span>
        <?php
      }
    }
  ?>
</body>
</html>
