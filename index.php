<?php

// Set the timezone
date_default_timezone_set('UTC');

// Home Page
function homePage() {
    echo "<h1>Welcome to Our Store</h1>";  
    echo "<p>Current Date and Time: " . date('Y-m-d H:i:s') . "</p>";
}

// Product Listing
function productListing() {
    $products = [
        ['id' => 1, 'name' => 'Product 1', 'price' => 29.99],
        ['id' => 2, 'name' => 'Product 2', 'price' => 39.99],
        ['id' => 3, 'name' => 'Product 3', 'price' => 19.99]
    ];
    echo "<h2>Product Listing</h2>";
    echo "<ul>";
    foreach ($products as $product) {
        echo "<li>\" . $product['name'] . \" \\$(" . number_format($product['price'], 2) . ")</li>"; 
    }
    echo "</ul>";
}

// Execute Functions
homePage();
productListing();

?>
