<?php
require "database.php";

class Transactions extends Database {
    private int $userid;
    private int $retail_sum;
    private int $sold_sum;

    public function __construct(int $userid)
    {
        parent::__construct();
        $this->userid = $userid;
        $this->retail_sum = $this->get_sum_retail();
        $this->sold_sum = $this->get_sum_sold();
    }

    public function get_sum_retail(): int
    {
        $this->prepare("SELECT SUM(retail) AS retail_value FROM transactions WHERE userid = :userid");
        $this->bind(":userid", $this->userid);
        $this->execute();
        $result = $this->fetch();
        return $result["retail_value"];
    }

    public function get_sum_sold(): int 
    {
        $this->prepare("SELECT SUM(sold) AS sold_value FROM transactions WHERE userid = :userid");
        $this->bind(":userid", $this->userid);
        $this->execute();
        $result = $this->fetch();
        return $result["sold_value"];
    }

    public function get_profit(): int {
        return $this->sold_sum - $this->retail_sum;
    }

}

?>