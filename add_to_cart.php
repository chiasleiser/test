<?php
// Add to Cart functionality

function addToCart($productId, $quantity) {
    // Start session to store cart information
    session_start();

    // Initialize cart if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Add product to cart
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] += $quantity; // Update quantity
    } else {
        $_SESSION['cart'][$productId] = $quantity; // Set initial quantity
    }

    return $_SESSION['cart'];
}

// Example usage:
// addToCart(1, 2); // Adds 2 units of product with ID 1 to the cart
?>