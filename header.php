<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo esc_html(the_title()); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="bg-white shadow-md">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-4 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="<?php echo site_url() ?>" class="-m-1.5 p-1.5 flex items-center justify-center">
                <span class="sr-only"><?php echo get_bloginfo('name'); ?></span>
                <?php
                if (get_site_icon_url()) {
                    echo '<img class="h-8 w-auto" src="' . esc_url(get_site_icon_url()) . '" alt="Site Icon">';
                } else {
                    echo '<img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">';
                }
                ?>
                <span class="text-2xl font-semibold leading-6 text-gray-900 px-4"><?php echo get_bloginfo('name'); ?></span>
            </a>
        </div>
        <div class="flex lg:hidden">
            <button id="mobile-menu-open-button" type="button"
                    class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                <span class="sr-only"><?php __('Open main menu', 'wpstorm-theme') ?></span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                     aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                </svg>
            </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            <?php
            $menu_items = wp_get_nav_menu_items('main-menu');

            if ($menu_items) {
                foreach ($menu_items as $menu_item) {
                    echo '<div class="relative">';

                    if (has_submenu_items($menu_items, $menu_item->ID)) {

                        echo '<button type="button" class="flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900 submenu-toggle" aria-expanded="false">';
                        echo esc_html($menu_item->title);
                        echo '<svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">';
                        echo '<path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />';
                        echo '</svg>';
                        echo '</button>';

                        $submenu_items = get_submenu_items($menu_items, $menu_item->ID);
                        if ($submenu_items) {
                            echo '<div class="absolute -left-8 top-full z-10 mt-3 w-96 rounded-3xl bg-white p-4 shadow-lg ring-1 ring-gray-900/5 hidden">';
                            foreach ($submenu_items as $submenu_item) {
                                echo '<div class="relative rounded-lg p-4 hover:bg-gray-50">';
                                echo '<a href="' . esc_url($submenu_item->url) . '" class="block text-sm font-semibold leading-6 text-gray-900">';
                                echo esc_html($submenu_item->title);
                                echo '<span class="absolute inset-0"></span>';
                                echo '</a>';
                                if (!empty($submenu_item->description)) {
                                    echo '<p class="mt-1 text-sm leading-6 text-gray-600">' . esc_html($submenu_item->description) . '</p>';
                                }
                                echo '</div>';
                            }
                            echo '</div>';
                        }
                    } else if (!$menu_item->menu_item_parent > 0) {
                        echo '<a href="' . esc_url($menu_item->url) . '" class="block text-sm font-semibold leading-6 text-gray-900">';
                        echo esc_html($menu_item->title);
                        echo '</a>';
                    }

                    echo '</div>';
                }
            } else {
                echo 'No menu items found.';
            }
            ?>
        </div>
        <script>
            const submenuToggles = document.querySelectorAll('.submenu-toggle');
            submenuToggles.forEach(toggle => {
                toggle.addEventListener('click', () => {
                    const submenuContent = toggle.nextElementSibling;
                    submenuContent.classList.toggle('hidden');
                });
            });
        </script>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end gap-6">
            <?php if (is_user_logged_in()) { ?>
                <a href="<?php echo esc_url(get_author_posts_url(get_current_user_id())) ?>"
                   class="group block flex-shrink-0">
                    <div class="flex items-center">
                        <div>
                            <img
                                    class="inline-block h-9 w-9 rounded-full"
                                    src="<?php echo get_avatar_url(get_current_user_id()); ?>"
                                    alt=""
                            />
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-700 group-hover:text-gray-900"><?php echo esc_html(wp_get_current_user()->display_name) ?></p>
                            <p class="text-xs font-medium text-gray-500 group-hover:text-gray-700"><?php echo __('View Profile', 'wpstorm-theme') ?></p>
                        </div>
                    </div>
                </a>
            <?php } else { ?>
                <a href="<?php echo esc_url(wp_login_url()) ?>"
                   class="text-sm font-semibold leading-6 text-gray-900"><?php echo __('Login', 'wpstorm-theme') ?></a>
                <a href="<?php echo esc_url(wp_registration_url()) ?>"
                   class="text-sm font-semibold leading-6 text-gray-900"><?php echo __('Sing up', 'wpstorm-theme') ?></a>
            <?php } ?>

        </div>
    </nav>
    <!-- Mobile menu, show/hide based on menu open state. -->
    <div id="mobile-menu-div" class="hidden" role="dialog" aria-modal="true">
        <!-- Background backdrop, show/hide based on slide-over state. -->
        <div class="fixed inset-0 z-10"></div>
        <div class="fixed inset-y-0 right-0 z-10 flex w-full flex-col justify-between overflow-y-auto bg-white sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only"><?php echo get_bloginfo('name'); ?></span>
                        <?php
                        $site_icon_url = get_site_icon_url();
                        if ($site_icon_url) {
                            echo '<img class="h-8 w-auto" src="' . esc_url($site_icon_url) . '" alt="' . get_bloginfo('name') . '">';
                        } else {
                            echo '<img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">';
                        }
                        ?>

                    </a>
                    <button id="mobile-menu-close-button" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                        <span class="sr-only"><?php __('Close menu', 'wpstorm-theme') ?></span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                             aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                            <?php
                            $menu_items = wp_get_nav_menu_items('main-menu');
                            if ($menu_items) {
                                foreach ($menu_items as $menu_item) {
                                    if (has_submenu_items($menu_items, $menu_item->ID)) {

                                        echo '<a href="' . esc_url($menu_item->url) . '" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">';
                                        echo esc_html($menu_item->title);
                                        echo '</a>';

                                        $submenu_items = get_submenu_items($menu_items, $menu_item->ID);
                                        if ($submenu_items) {
                                            foreach ($submenu_items as $submenu_item) {
                                                echo '<a href="' . esc_url($submenu_item->url) . '" class="-mx-5 block rounded-lg px-6 py-2 text-sm font-light leading-7 text-gray-900 hover:bg-gray-50">';
                                                echo esc_html($submenu_item->title);
                                                echo '</a>';
                                            }
                                        }
                                    } else if (!$menu_item->menu_item_parent > 0) {
                                        echo '<a href="' . esc_url($menu_item->url) . '" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">';
                                        echo esc_html($menu_item->title);
                                        echo '</a>';
                                    }
                                }
                            } else {
                                echo 'No menu items found.';
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
            <div class="sticky bottom-0 grid grid-cols-2 divide-x divide-gray-900/5 bg-gray-50 text-center">
                <?php if (is_user_logged_in()) { ?>
                    <a href="<?php echo esc_url(get_author_posts_url(get_current_user_id())) ?>"
                       class="p-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-100"><?php echo __('View Profile', 'wpstorm-theme') ?></a>
                    <a href="<?php echo esc_url(wp_logout_url()) ?>"
                       class="p-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-100"><?php echo __('Logout', 'wpstorm-theme') ?></a>
                <?php } else { ?>
                    <a href="<?php echo esc_url(wp_login_url()) ?>"
                       class="p-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-100"><?php echo __('Login', 'wpstorm-theme') ?></a>
                    <a href="<?php echo esc_url(wp_registration_url()) ?>"
                       class="p-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-100"><?php echo __('Sing up', 'wpstorm-theme') ?></a>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- The script to open and close the menu on the mobile. -->
    <script>
        const mobileMenuCloseButton = document.getElementById('mobile-menu-close-button');
        const mobileMenuOpenButton = document.getElementById('mobile-menu-open-button');
        const mobileMenu = document.getElementById('mobile-menu-div');

        if (mobileMenuCloseButton && mobileMenu) {
            mobileMenuCloseButton.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        }
        if (mobileMenuOpenButton && mobileMenu) {
            mobileMenuOpenButton.addEventListener('click', () => {
                mobileMenu.classList.remove('hidden');
            })
        }
    </script>
</header>

