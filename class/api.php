<?php
require "database.php";

class API extends Database {

    public function __construct() {
        parent::__construct();
    }

    public function get_shoe_list() {
        $this->prepare("SELECT * FROM sneakers");
        $this->execute();
        return $this->fetchAll();
    }
}

?>