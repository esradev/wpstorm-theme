<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="bg-white">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="<?php echo site_url() ?>" class="-m-1.5 p-1.5 flex items-center justify-center">
                <span class="sr-only"><?php echo get_bloginfo('name'); ?></span>
                <?php
                $site_icon_url = get_site_icon_url();
                if ($site_icon_url) {
                    echo '<img class="h-8 w-auto" src="' . esc_url($site_icon_url) . '" alt="Site Icon">';
                } else {
                    echo '<img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">';
                }
                ?>
                <span class="text-2xl font-semibold leading-6 text-gray-900 px-4"><?php echo get_bloginfo('name'); ?></span>
            </a>
        </div>
        <div class="flex lg:hidden">
            <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
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
            <?php if(is_user_logged_in()) { ?>
                <a href="<?php echo esc_url(get_author_posts_url(get_current_user_id()))?>" class="group block flex-shrink-0">
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
                            <p class="text-xs font-medium text-gray-500 group-hover:text-gray-700">View profile</p>
                        </div>
                    </div>
                </a>
            <?php } else { ?>
                <a href="<?php echo wp_login_url(); ?>" class="text-sm font-semibold leading-6 text-gray-900">Log in</a>
                <a href="<?php echo wp_registration_url(); ?>" class="text-sm font-semibold leading-6 text-gray-900">Sign Up</a>
            <?php } ?>

        </div>
    </nav>
    <!-- Mobile menu, show/hide based on menu open state. -->
    <div class="lg:hidden" role="dialog" aria-modal="true">
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
                            echo '<img class="h-8 w-auto" src="' . esc_url($site_icon_url) . '" alt="Site Icon">';
                        } else {
                            echo '<img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">';
                        }
                        ?>

                    </a>
                    <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                             aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                            <a href="#"
                               class="group -mx-3 flex items-center gap-x-6 rounded-lg p-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">
                                <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                    <svg class="h-6 w-6 text-gray-600 group-hover:text-indigo-600" fill="none"
                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                         aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z"/>
                                    </svg>
                                </div>
                                Analytics
                            </a>
                            <a href="#"
                               class="group -mx-3 flex items-center gap-x-6 rounded-lg p-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">
                                <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                    <svg class="h-6 w-6 text-gray-600 group-hover:text-indigo-600" fill="none"
                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                         aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zM12 2.25V4.5m5.834.166l-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243l-1.59-1.59"/>
                                    </svg>
                                </div>
                                Engagement
                            </a>
                            <a href="#"
                               class="group -mx-3 flex items-center gap-x-6 rounded-lg p-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">
                                <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                    <svg class="h-6 w-6 text-gray-600 group-hover:text-indigo-600" fill="none"
                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                         aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33"/>
                                    </svg>
                                </div>
                                Security
                            </a>
                            <a href="#"
                               class="group -mx-3 flex items-center gap-x-6 rounded-lg p-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">
                                <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                    <svg class="h-6 w-6 text-gray-600 group-hover:text-indigo-600" fill="none"
                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                         aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 002.25-2.25V6a2.25 2.25 0 00-2.25-2.25H6A2.25 2.25 0 003.75 6v2.25A2.25 2.25 0 006 10.5zm0 9.75h2.25A2.25 2.25 0 0010.5 18v-2.25a2.25 2.25 0 00-2.25-2.25H6a2.25 2.25 0 00-2.25 2.25V18A2.25 2.25 0 006 20.25zm9.75-9.75H18a2.25 2.25 0 002.25-2.25V6A2.25 2.25 0 0018 3.75h-2.25A2.25 2.25 0 0013.5 6v2.25a2.25 2.25 0 002.25 2.25z"/>
                                    </svg>
                                </div>
                                Integrations
                            </a>
                            <a href="#"
                               class="group -mx-3 flex items-center gap-x-6 rounded-lg p-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">
                                <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                    <svg class="h-6 w-6 text-gray-600 group-hover:text-indigo-600" fill="none"
                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                         aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/>
                                    </svg>
                                </div>
                                Automations
                            </a>
                        </div>
                        <div class="space-y-2 py-6">
                            <a href="#"
                               class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Features</a>
                            <a href="#"
                               class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Marketplace</a>

                            <a href="#"
                               class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">About
                                us</a>
                            <a href="#"
                               class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Careers</a>
                            <a href="#"
                               class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Support</a>
                            <a href="#"
                               class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Blog</a>
                        </div>
                        <div class="py-6">
                            <a href="#"
                               class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log
                                in</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sticky bottom-0 grid grid-cols-2 divide-x divide-gray-900/5 bg-gray-50 text-center">
                <a href="#" class="p-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-100">Watch demo</a>
                <a href="#" class="p-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-100">Contact
                    sales</a>
            </div>
        </div>
    </div>
</header>

