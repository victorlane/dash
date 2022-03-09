<?php

class Inventory {

    // public function __construct(int $userid) {

    // }

    public function get_stock() {

    }

    public function get_purchases() {

    }

    public function get_retail_value() {

    }


    public function create_card(string $name, string $release_date, string $sku, string $price, string $target, 
                                string $size, string $store, string $purchase_date, string $image_url) {
        
        return <<<HTML
            <div class="w-300 mw-full">
            <div class="card p-0">
              <img src="{$image_url}" class="img-fluid rounded-top" alt="snkr-img"> 
              <div class="content">
                <h2 class="content-title">$name</h2>
                <div>
                  <span class="text-muted">
                    <i class="fa fa-clock-o mr-5" aria-hidden="true"></i>Release Date: $release_date
                  </span>
                  <span class="text-muted" id="sku" value="DD1391-100">
                    <i class="fa-solid fa-arrows-rotate mr-5" aria-hidden="true"></i>SKU: $sku
                  </span>
                </div>
                <div id="card-mtop">
                  <span class="badge">
                    <i class="fa-solid fa-dollar-sign text-success mr-5" aria-hidden="true"></i> <span>$</span>$price
                  </span>
                  <span class="badge ml-5">
                    <i class="fa-solid fa-dollar-sign text-danger mr-5" aria-hidden="true"></i> <span>$</span>$target
                  </span>
                </div>

                <div id="card-mtop">
                  <span class="badge">
                    <i class="fa-solid fa-ruler text-primary mr-5" aria-hidden="true"></i> $size
                  </span>
                </div>

                <div id="card-mtop">
                  <span class="text-muted">
                    Purchased at <span class="text-primary">$store</span> on <span class="text-primary">$purchase_date</span>
                  </span>
                </div>
                
                <div style="margin-top: 1em;">
                  <span class="badge">
                    <i class="fa-solid fa-check text-success mr-5"></i>Sold
                  </span>
                  <span class="badge">
                    <i class="fa-solid fa-check text-danger mr-5"></i>Delete
                  </span>
                </div>
              </div>
        </div>
        HTML;

    }
}

?>