<?php
	session_start();
	require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="assets/styles/login-style.css" />
    <title>Login Apps</title>
  </head>
  <body>
    <main>
      <header>
        <img src="assets/images/UNPAM.png" alt="UNPAM logo" />
      </header>
      <form id="loginForm" class="login-input">
        <label for="inputEmail">NIM</label>
        <input id="NIM" name="NIM" required />
        <label for="inputPassword">Password</label>
        <input id="inputPassword" name="password" type="fpassword" required />
        <button id="buttonLogin" type="summit" name="Login">Login</button>
      </form>
    </main>
    <div id="modal" class="pop-up-modal">
      <h2>Login gagal!</h2>
      <p>Silakan coba lagi</p>
    </div>
    <?php
    if (isset($_POST['Login'])){
        $username = $_POST['NIM'];
        $password = $_POST['fpassword'];
        $qry = mysqli_query($config,"SELECT + FROM tab_login WHERE username = '$username' AND password = md5 ('$password')");
        $cek = mysqli_num_rows($qry);
        if ($cek==1){
            $_SESSION['userweb']=$username;
            header("location:home.php");
            exit;
        }
        else{
            echo "Maaf Username dan password anda salah";
        }
    }
    ?>
  </body>
</html>
