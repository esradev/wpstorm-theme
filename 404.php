<?php
get_header();
?>

    <div class="bg-white">
        <main class="mx-auto w-full max-w-7xl px-6 pb-16 pt-10 sm:pb-24 lg:px-8">
            <img class="mx-auto h-10 w-auto sm:h-12" src="<?php echo esc_url(get_site_icon_url()) ?>"
                 alt="Your Company">
            <div class="mx-auto mt-20 max-w-2xl text-center sm:mt-24">
                <p class="text-base font-semibold leading-8 text-indigo-600">404</p>
                <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl"><?php echo get_theme_mod('404_heading', 'This page does not exist'); ?></h1>
                <p class="mt-4 text-base leading-7 text-gray-600 sm:mt-6 sm:text-lg sm:leading-8"><?php echo get_theme_mod('404_sub_heading', 'Sorry, we couldn’t find the page you’re looking for.'); ?></p>
            </div>
            <div class="mx-auto mt-16 flow-root max-w-lg sm:mt-20">
                <h2 class="sr-only"><?php echo __('Popular pages' , 'wpstorm-theme'); ?></h2>
                <ul role="list" class="-mt-6 divide-y divide-gray-900/5 border-b border-gray-900/5">
                    <?php
                    // Retrieve the 404 menu items
                    $menu_name = '404-menu';
                    $locations = get_nav_menu_locations();
                    $menu = wp_get_nav_menu_object($locations[$menu_name]);

                    if ($menu) {
                        $menu_items = wp_get_nav_menu_items($menu->term_id);
                        foreach ($menu_items as $menu_item) {
                            $title = $menu_item->title;
                            $description = $menu_item->description;
                            ?>
                            <li class="relative flex gap-x-6 py-6">
                                <div class="flex h-10 w-10 flex-none items-center justify-center rounded-lg shadow-sm ring-1 ring-gray-900/10">
                                    <svg class="h-6 w-6 text-indigo-600" viewBox="0 0 24 24" fill="currentColor"
                                         aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/>
                                    </svg>

                                </div>
                                <div class="flex-auto">
                                    <h3 class="text-sm font-semibold leading-6 text-gray-900">
                                        <a href="<?php echo esc_url($menu_item->url); ?>">
                                            <span class="absolute inset-0" aria-hidden="true"></span>
                                            <?php echo esc_html($title); ?>
                                        </a>
                                    </h3>
                                    <p class="mt-2 text-sm leading-6 text-gray-600"><?php echo esc_html($description); ?></p>
                                </div>
                                <div class="flex-none self-center">
                                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                         aria-hidden="true">
                                        <path fill-rule="evenodd"
                                              d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>
                <div class="mt-10 flex justify-center">
                    <a href="<?php echo esc_url(get_home_url())?>" class="text-sm font-semibold leading-6 text-indigo-600">
                        <span aria-hidden="true">&larr;</span>
                        <?php echo(esc_html(__('Back to Home', 'wpstorm-theme'))) ?>
                    </a>
                </div>
            </div>
        </main>
    </div>

<?php
get_footer();
?>