<?php
require "class/user.php";
session_start();

$loggedin = $_SESSION['loggedin'] ?? NULL;
$logout = $_GET['logout'] ?? NULL;

if($logout && $loggedin) {
    session_destroy();
    header("Location: index.php");
}

if($loggedin) {
    header("Location: inventory.php");
} else {
    header("Location: login.php");
};

if(!is_null($_POST)) {
    $user = new User($_POST['username'], $_POST['password']);
    switch($_POST['action']) {
        case "login":
            $user->login();
            break;

        case "register":
            $user->register();
            break;
    };
};

?>