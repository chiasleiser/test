<?php
// Function to remove an item from the cart
function removeFromCart($itemId) {
    // Start session to access the cart
    session_start();
    
    // Check if the cart exists in the session
    if(isset($_SESSION['cart'])) {
        // Loop through the cart items
        foreach($_SESSION['cart'] as $key => $item) {
            // If the item ID matches, remove it from the cart
            if($item['id'] == $itemId) {
                unset($_SESSION['cart'][$key]);
                // Optionally, reindex the array to maintain sequential keys
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                return "Item removed from cart.";
            }
        }
        return "Item not found in the cart.";
    }
    return "Cart is empty.";
}

// Example usage of the function
// echo removeFromCart(2);
?>