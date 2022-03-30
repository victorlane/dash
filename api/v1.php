<?php
session_start();
require "../class/api.php";
$api = new API();

if(empty($_SESSION) || !isset($_SESSION['loggedin'])) {
    header("Location: ../index.php");
}

if(empty($_GET)) {
    echo "no get parameters given";
    exit();
}

switch($_GET['action']) {
    case null:
        echo "no action given";
        break;

    case "list":
        $shoe_list = $api->get_shoe_list();
        echo json_encode($shoe_list);
        break;
}

?>