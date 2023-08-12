document.addEventListener('DOMContentLoaded', function() {
    const removeButtons = document.querySelectorAll('.remove-from-cart');

    removeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const cartItemKey = button.getAttribute('data-cart-item-key');

            if (cartItemKey) {
                // Send an AJAX request to remove the item from the cart
                const data = {
                    action: 'remove_cart_item',
                    cart_item_key: cartItemKey,
                };

                fetch(wpstorm_theme_script_vars.admin_ajax_url, { // Use the localized URL here
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams(data),
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update the cart contents or redirect to the cart page as needed
                            location.reload(); // For example, you can reload the page
                        }
                    })
                    .catch(error => console.error('Error removing item from cart:', error));
            }
        });
    });
});
