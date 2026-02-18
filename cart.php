<?php
// Display shopping cart items

// Sample cart items array
$cartItems = [
    ['name' => 'Item 1', 'quantity' => 2, 'price' => 10.00],
    ['name' => 'Item 2', 'quantity' => 1, 'price' => 15.00],
    ['name' => 'Item 3', 'quantity' => 3, 'price' => 7.50],
];

// Function to display cart items
function displayCartItems($items) {
    echo '<h2>Your Shopping Cart</h2>';
    echo '<ul>';
    foreach ($items as $item) {
        echo '<li>' . $item['name'] . ' - Quantity: ' . $item['quantity'] . ' - Price: $' . number_format($item['price'], 2) . '</li>';
    }
    echo '</ul>';
}

displayCartItems($cartItems);
?>