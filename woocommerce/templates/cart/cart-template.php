<?php
get_header();
?>
    <main>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-5xl pt-16">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900"><?php echo __('Shopping Cart', 'wpstorm-theme') ?></h1>

                <form class="mt-12">
                    <section aria-labelledby="cart-heading">
                        <h2 id="cart-heading"
                            class="sr-only"><?php echo __('Items in your shopping cart', 'wpstorm-theme') ?></h2>

                        <ul role="list" class="divide-y divide-gray-200 border-b border-t border-gray-200">
                            <?php
                            // Assuming you have the WooCommerce loop set up to retrieve cart items
                            foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                                $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                                $product_name = $_product->get_name();
                                $product_quantity = $_product->get_stock_quantity(); // Get the stock quantity of the product
                                // Check if the product can only be purchased once or if it's out of stock
                                if ($product_quantity === 1 || $product_quantity <= 0) {
                                    // Don't show the quantity options
                                    $quantity_select_html = "";
                                } else {
                                    // Generate quantity options based on available stock
                                    $quantity_select_html = "<label for='quantity-$cart_item_key' class='sr-only'>Quantity, $product_name</label>
                                 <select id='quantity-$cart_item_key' name='quantity' class='block max-w-full rounded-md border border-gray-300 py-1.5 text-left text-base font-medium leading-5 text-gray-700 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm'>";

                                    // Generate options based on available stock
                                    for ($i = 1; $i <= $product_quantity; $i++) {
                                        $quantity_select_html .= "<option value='$i'>$i</option>";
                                    }

                                    $quantity_select_html .= "</select>";
                                }


                                // Get the sale price if available, otherwise get the regular price
                                $regular_price = $_product->get_regular_price();
                                $sale_price = $_product->get_sale_price();

                                if ($_product->is_on_sale() && $sale_price) {
                                    // Display both prices with different styles
                                    $product_price_html = "<div class='text-right'>
                                    <p class='text-lg font-medium text-gray-900'>$sale_price</p>
                                    <p class='text-sm font-medium text-gray-700 line-through'>$regular_price</p>
                                </div>";
                                } else {
                                    // Display only the regular price
                                    $product_price_html = "<p class='text-right text-sm font-medium text-gray-900'>$regular_price</p>";
                                }

                                $product_image_html = $_product->get_image(); // Get the product image HTML

                                // Extract the image URL from the generated HTML
                                preg_match('/<img[^>]+src=[\'"]([^\'"]+)[\'"][^>]*>/i', $product_image_html, $matches);
                                $product_image_url = $matches[1] ?? '';

                                $is_in_stock = $_product->is_in_stock(); // Check if the product is in stock


                                ?>
                                <li class="flex py-6 sm:py-10">
                                    <div class="flex-shrink-0">
                                        <img src="<?php echo esc_url($product_image_url); ?>"
                                             alt="<?php echo esc_attr($product_name); ?>"
                                             class="h-24 w-24 rounded-lg object-cover object-center sm:h-32 sm:w-32">
                                    </div>

                                    <div class="relative ml-4 flex flex-1 flex-col justify-between sm:ml-6">
                                        <div>
                                            <div class="flex justify-between sm:grid sm:grid-cols-2">
                                                <div class="pr-6">
                                                    <h3 class="text-sm">
                                                        <a href="<?php echo get_permalink($_product->get_id()); ?>"
                                                           class="font-medium text-gray-700 hover:text-gray-800"><?php echo esc_html($product_name); ?></a>
                                                    </h3>
                                                    <p class="mt-1 text-sm text-gray-500">White</p>
                                                </div>
                                                <?php echo $product_price_html; ?>
                                            </div>

                                            <div class="mt-4 flex items-center sm:absolute sm:left-1/2 sm:top-0 sm:mt-0 sm:block">
                                                <label for="quantity-<?php echo esc_attr($cart_item_key); ?>"
                                                       class="sr-only">Quantity, <?php echo esc_html($product_name); ?></label>
                                                <?php echo $quantity_select_html; ?>

                                                <button type="button"
                                                        class="ml-4 text-sm font-medium text-indigo-600 hover:text-indigo-500 sm:ml-0 sm:mt-3 remove-from-cart"
                                                        data-cart-item-key="<?php echo esc_attr($cart_item_key); ?>">
                                                    <span>Remove</span>
                                                </button>
                                            </div>
                                        </div>

                                        <p class="mt-4 flex space-x-2 text-sm text-gray-700">
                                            <svg class="h-5 w-5 flex-shrink-0 text-green-500" viewBox="0 0 20 20"
                                                 fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                      d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                            <span><?php echo $is_in_stock ? 'In stock' : 'Out of stock'; ?></span>
                                        </p>
                                    </div>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </section>

                    <!-- Order summary -->
                    <section aria-labelledby="summary-heading" class="mt-10 sm:mx-24 sm:px-6">
                        <div class="rounded-lg bg-gray-50 px-4 py-6 sm:p-6 lg:p-8">
                            <h2 id="summary-heading"
                                class="sr-only"><?php echo __('Order summary', 'wpstorm-theme') ?></h2>

                            <div class="flow-root">
                                <dl class="-my-4 divide-y divide-gray-200 text-sm">
                                    <?php
                                    $subtotal = WC()->cart->get_subtotal();
                                    $shipping_total = WC()->cart->get_shipping_total();
                                    $tax_total = WC()->cart->get_cart_contents_tax();
                                    $order_total = WC()->cart->get_total();

                                    // Display Subtotal
                                    echo '<div class="flex items-center justify-between py-4">';
                                    echo '<dt class="text-gray-600">' . __('Subtotal', 'wpstorm-theme') . '</dt>';
                                    echo '<dd class="font-medium text-gray-900">' . wc_price($subtotal) . '</dd>';
                                    echo '</div>';

                                    // Display Shipping
                                    echo '<div class="flex items-center justify-between py-4">';
                                    echo '<dt class="text-gray-600">' . __('Shipping', 'wpstorm-theme') . '</dt>';
                                    echo '<dd class="font-medium text-gray-900">' . wc_price($shipping_total) . '</dd>';
                                    echo '</div>';

                                    // Display Tax
                                    echo '<div class="flex items-center justify-between py-4">';
                                    echo '<dt class="text-gray-600">' . __('Tax', 'wpstorm-theme') . '</dt>';
                                    echo '<dd class="font-medium text-gray-900">' . wc_price($tax_total) . '</dd>';
                                    echo '</div>';

                                    // Display Order Total
                                    echo '<div class="flex items-center justify-between py-4">';
                                    echo '<dt class="text-base font-medium text-gray-900">' . __('Order total', 'wpstorm-theme') . '</dt>';
                                    echo '<dd class="text-base font-medium text-gray-900">' . wc_price($order_total) . '</dd>';
                                    echo '</div>';
                                    ?>
                                </dl>
                            </div>
                        </div>
                        <div class="mt-10 text-center">
                            <a href="<?php echo wc_get_checkout_url(); ?>"
                               class="w-full block rounded-md border border-transparent bg-indigo-600 px-4 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50">
                                <?php echo __('Checkout','wpstorm-theme')?>
                            </a>
                        </div>

                        <div class="mt-6 text-center text-sm text-gray-500">
                            <p>
                                <?php echo __('or ','wpstorm-theme')?>
                                <a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>"
                                   class="font-medium text-indigo-600 hover:text-indigo-500">
                                    <?php echo __('Continue Shopping','wpstorm-theme')?>
                                    <span aria-hidden="true"> &rarr;</span>
                                </a>
                            </p>
                        </div>
                    </section>
                </form>
            </div>
        </div>

        <!-- Policy grid -->
        <section aria-labelledby="policies-heading" class="mt-24 border-t border-gray-200 bg-gray-50">
            <h2 id="policies-heading" class="sr-only">Our policies</h2>

            <div class="mx-auto max-w-7xl px-4 py-24 sm:px-6 sm:py-32 lg:px-8">
                <div class="grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 lg:gap-x-8 lg:gap-y-0">
                    <div class="text-center md:flex md:items-start md:text-left lg:block lg:text-center">
                        <div class="md:flex-shrink-0">
                            <div class="flow-root">
                                <img class="-my-1 mx-auto h-24 w-auto"
                                     src="https://tailwindui.com/img/ecommerce/icons/icon-returns-light.svg" alt="">
                            </div>
                        </div>
                        <div class="mt-6 md:ml-4 md:mt-0 lg:ml-0 lg:mt-6">
                            <h3 class="text-base font-medium text-gray-900">Free returns</h3>
                            <p class="mt-3 text-sm text-gray-500">Not what you expected? Place it back in the parcel and
                                attach the pre-paid postage stamp.</p>
                        </div>
                    </div>
                    <div class="text-center md:flex md:items-start md:text-left lg:block lg:text-center">
                        <div class="md:flex-shrink-0">
                            <div class="flow-root">
                                <img class="-my-1 mx-auto h-24 w-auto"
                                     src="https://tailwindui.com/img/ecommerce/icons/icon-calendar-light.svg" alt="">
                            </div>
                        </div>
                        <div class="mt-6 md:ml-4 md:mt-0 lg:ml-0 lg:mt-6">
                            <h3 class="text-base font-medium text-gray-900">Same day delivery</h3>
                            <p class="mt-3 text-sm text-gray-500">We offer a delivery service that has never been done
                                before. Checkout today and receive your products within hours.</p>
                        </div>
                    </div>
                    <div class="text-center md:flex md:items-start md:text-left lg:block lg:text-center">
                        <div class="md:flex-shrink-0">
                            <div class="flow-root">
                                <img class="-my-1 mx-auto h-24 w-auto"
                                     src="https://tailwindui.com/img/ecommerce/icons/icon-gift-card-light.svg" alt="">
                            </div>
                        </div>
                        <div class="mt-6 md:ml-4 md:mt-0 lg:ml-0 lg:mt-6">
                            <h3 class="text-base font-medium text-gray-900">All year discount</h3>
                            <p class="mt-3 text-sm text-gray-500">Looking for a deal? You can use the code &quot;ALLYEAR&quot;
                                at checkout and get money off all year round.</p>
                        </div>
                    </div>
                    <div class="text-center md:flex md:items-start md:text-left lg:block lg:text-center">
                        <div class="md:flex-shrink-0">
                            <div class="flow-root">
                                <img class="-my-1 mx-auto h-24 w-auto"
                                     src="https://tailwindui.com/img/ecommerce/icons/icon-planet-light.svg" alt="">
                            </div>
                        </div>
                        <div class="mt-6 md:ml-4 md:mt-0 lg:ml-0 lg:mt-6">
                            <h3 class="text-base font-medium text-gray-900">For the planet</h3>
                            <p class="mt-3 text-sm text-gray-500">We’ve pledged 1% of sales to the preservation and
                                restoration of the natural environment.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php
get_footer();
?>