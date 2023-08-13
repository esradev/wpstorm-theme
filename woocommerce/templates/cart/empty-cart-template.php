<?php
get_header();
?>
    <main class="grid min-h-full place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8">
        <div class="text-center">
            <p class="text-base font-semibold text-indigo-600"><?php echo __('Cart is Empty', 'wpstorm-theme') ?></p>
            <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl"><?php echo __('There is no item on the cart', 'wpstorm-theme') ?></h1>
            <p class="mt-6 text-base leading-7 text-gray-600"><?php echo __('Sorry, Your cart is empty. Go to shop and add some products to your cart.', 'wpstorm-theme') ?></p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><?php echo __('Go to Shop', 'wpstorm-theme') ?></a>
                <a href="<?php echo esc_url(wc_get_account_endpoint_url('dashboard'))?>" class="text-sm font-semibold text-gray-900"><?php echo __('Contact support ', 'wpstorm-theme') ?><span aria-hidden="true">&rarr;</span></a>
            </div>
        </div>
    </main>

<?php
get_footer();
?>