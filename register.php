<?php
session_start();

$fail = $_GET['fail'] ?? NULL;
$loggedin = $_SESSION['loggedin'] ?? NULL;

if($loggedin){
    header("Location: inventory.php");
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta name="viewport" content="width=device-width" />
  <link rel="icon" href="img/favicon.png">
  <title>dash - Register</title>
  <link href="https://cdn.jsdelivr.net/npm/halfmoon@1.1.1/css/halfmoon-variables.min.css" rel="stylesheet" />

</head>
<body class="with-custom-webkit-scrollbars with-custom-css-scrollbars" data-dm-shortcut-enabled="true" data-set-preferred-mode-onload="true">
  <div class="page-wrapper">
    <div class="sticky-alerts"></div>
    <div class="content-wrapper">
        <div class="d-flex h-full align-items-center justify-content-center flex-column">
            <div class="card w-400 mw-full m-0 position-relative">
                <h2 class="card-title">Register to Dash</h2>
                <form action="index.php" method="POST">
                <div class="form-group">
                        <label for="username" class="required">Username</label>
                        <input type="text" id="username" class="form-control" placeholder="Your username" required="required" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password" class="required">Password</label>
                        <input type="password" type="text" id="password" class="form-control" placeholder="Your password" required="required" name="password">
                    </div>
                        <input type="hidden" name="action" value="register">
                        <input class="btn btn-primary btn-block" type="submit" value="Submit">
                    <div class="text-right mt-10">
                        <a href="login.php">Back to login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/halfmoon@1.1.1/js/halfmoon.min.js"></script>
  <script src="js/toast.js"></script>
</body>
</html>