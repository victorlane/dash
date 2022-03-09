<?php
session_start();
$loggedin = $_SESSION['loggedin'] ?? NULL;

if(!$loggedin) {
    header("Location: index.php");
}

require "class/inventory.php";
$inv = new Inventory();


?>

<!-- https://www.gethalfmoon.com/docs/dropdown/#usage-in-other-places -->

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
  <div class="modal" id="add-shoe" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <a href="#" class="close" role="button" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
        <h5 class="modal-title">Add to inventory</h5>

          <!-- Retail purchase amount -->
          <p>Purchase amount <i class="fa-solid fa-hand-holding-dollar"></i></p>
          <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">€</span>
              </div>
            <input name="purchase-amount" type="number" step="0.01" value="0.00" class="form-control">
          </div>

          <!-- Selling target -->
          <p>Sell target <i class="fa-solid fa-chart-line"></i></p>
          <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">€</span>
              </div>
            <input name="sell-target" type="number" step="0.01" value="0.00" class="form-control">
          </div>

          <div class="input-group" style="margin-top: 1em;">
            <div class="input-group-prepend">
              <span class="input-group-text">SKU</span>
            </div>
            <input type="text" class="form-control" placeholder="XX-XXXXX" name="sku">
            <div class="input-group-append">
              <button class="btn btn-secondary" type="button">Search</button>
            </div>
          </div>

        <div class="text-right mt-20">
          <a href="#" class="btn mr-5" role="button">Cancel</a>
          <a href="#" class="btn btn-primary" role="button">Add shoe</a>
        </div>
      </div>
    </div>
  </div>

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
                  Here you can find all the shoes in your inventory
            </div>
        </div>

        <div class="row row-eq-spacing">
            <div class="col-6 col-xl-3">
                <div class="card">
                  <h2 class="card-title">Stock <i class="fa-solid fa-box ml-5"></i></h2>
                  <span id="primary-number" class="text-success">302</span>
                </div>
        </div>
        <div class="v-spacer d-xl-none"></div>
        <div class="col-6 col-xl-3">
            <div class="card">
              <h2 class="card-title">Purchases <i class="fa-solid fa-money-bill-wave ml-5"></i></h2>
              <span id="primary-number" class="text-success">7902</span>
            </div>
          </div>

          <div class="col-6 col-xl-3">
            <div class="card">
              <h2 class="card-title">Retail Value <i class="fa-solid fa-receipt ml-5"></i></h2>
              <span id="primary-number" class="text-success">€2.000</span>
            </div>
          </div>

        <div class="col-9" style="margin-top: 1em;">
          <a href="#add-shoe"><button class="btn btn-block btn-primary" type="button"><i class="fa-solid fa-plus mr-5"></i>Add a shoe to your inventory</button></a>
        </div>

        <div class="col-3" style="margin-top: 1.1em;">
          <div class="dropdown toggle-on-hover">
            <button class="btn" data-toggle="dropdown" type="button" id="filter" aria-haspopup="true" aria-expanded="false">
              All <i class="fa fa-angle-down ml-5" aria-hidden="true"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="filter">
              <h6 class="dropdown-header">Filter by</h6>
              <a href="#" class="dropdown-item">
                Brand <i class="fa-solid fa-moon"></i>
              </a>
              <a href="#" class="dropdown-item">
                Ascending price <i class="fa fa-angle-up ml-5" aria-hidden="true"></i>
              </a>
              <a href="#" class="dropdown-item">
                Descending price <i class="fa fa-angle-down ml-5" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>

          <?= $inv->create_card("Nike Dunk Low Black White", "04/03/22", "DD1391-100", "100", "300", "45.5", "Footlocker", "03/09/2022", "img/dunk-low-bw.png", "Nike")?>

    </div>
    <!-- Content wrapper end -->

  </div>
  <!-- Page wrapper end -->

  <!-- Halfmoon JS -->
  <script src="https://cdn.jsdelivr.net/npm/halfmoon@1.1.1/js/halfmoon.min.js"></script>
  <script src="js/inventory.js"></script>	
</body>
</html>