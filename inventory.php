<?php
session_start();
$loggedin = $_SESSION['loggedin'] ?? NULL;

if(!$loggedin) {
    header("Location: index.php");
}

require "class/inventory.php";
$inv = new Inventory();


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Meta tags -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta name="viewport" content="width=device-width" />

  <link rel="icon" href="img/favicon.png">
  <title>dash - Dashboard</title>
  <script src="https://kit.fontawesome.com/7fc770c59a.js" crossorigin="anonymous"></script>
  <link href="css/inventory.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/halfmoon@1.1.1/css/halfmoon-variables.min.css" rel="stylesheet" />

</head>
<body class="with-custom-webkit-scrollbars with-custom-css-scrollbars" data-dm-shortcut-enabled="true" data-set-preferred-mode-onload="true">
  <div class="page-wrapper with-navbar with-sidebar">
    <div class="sticky-alerts"></div>
    <nav class="navbar justify-content-center">
        <a href="index.php" class="navbar-brand">
            dash
          </a>
        <ul class="navbar-nav d-none d-md-flex">
        <li class="nav-item active">
            <a href="inventory.php" class="nav-link">Inventory</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">Transactions</a>
        </li>
        <li class="nav-item">
            <a href="index.php?logout=true" class="nav-link">Logout</a>
        </li>
        </ul>
    </nav>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="content">
                <h1 class="content-title font-size-22">
                    Inventory
                  </h1>
                  Here you can find all your inventory
            </div>
        </div>

        <div class="row row-eq-spacing">
            <div class="col-6 col-xl-3">
                <div class="card">
                  <h2 class="card-title">Stock</h2>
                  <span id="primary-number" class="text-success">302</span>
                </div>
        </div>
        <div class="v-spacer d-xl-none"></div>
        <div class="col-6 col-xl-3">
            <div class="card">
              <h2 class="card-title">Purchases</h2>
              <span id="primary-number" class="text-success">7902</span>
            </div>
          </div>

          <div class="col-6 col-xl-3">
            <div class="card">
              <h2 class="card-title">Retail Value</h2>
              <span id="primary-number" class="text-success">€2.000</span>
            </div>
          </div>


          <?= $inv->create_card("Nike Dunk Low Black White", "04/03/22", "DD1391-100", "100", "300", "45.5", "Footlocker", "03/09/2022", "img/dunk-low-bw.png")?>

    </div>
    <!-- Content wrapper end -->

  </div>
  <!-- Page wrapper end -->

  <!-- Halfmoon JS -->
  <script src="https://cdn.jsdelivr.net/npm/halfmoon@1.1.1/js/halfmoon.min.js"></script>
  <script src="js/inventory.js"></script>	
</body>
</html>