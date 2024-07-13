<header class="bg-white shadow-md" x-data="{mobile_menu : false, search_modal : false}">
  <nav class="mx-auto flex max-w-7xl items-center justify-between p-4 lg:px-8" aria-label="Global">
    <div class="flex lg:flex-1">
      <a href="<?php echo site_url() ?>" class="-m-1.5 p-1.5 flex items-center justify-center">
        <span class="sr-only"><?php echo get_bloginfo('name'); ?></span>
        <?php if (get_site_icon_url()) {
            echo '<img class="h-8 w-auto" src="' . esc_url(get_site_icon_url()) . '" alt="Site Icon">';
        } else {
            echo '<img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">';
        }?>
        <span class="text-2xl font-semibold leading-6 text-gray-900 px-4"><?php echo get_bloginfo('name'); ?></span>
      </a>
    </div>

    <!-- Mobile header actions -->
    <div class="flex gap-x-4 lg:hidden">
      <!-- Search Icon -->
      <button @click="search_modal = true" type="button"
        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
        <span class="sr-only"><?php __('Open search', 'wpstorm-theme') ?></span>
        <?php echo Wpstorm_Helpers::get_svg_icon('search', 'h-6 w-6') ?>
      </button>

      <!-- Mobile menu button -->
      <button @click="mobile_menu = true" type="button"
        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
        <span class="sr-only"><?php __('Open main menu', 'wpstorm-theme') ?></span>
        <?php echo Wpstorm_Helpers::get_svg_icon('bars-3', 'h-6 w-6') ?>
      </button>

    </div>

    <!-- Desktop header nav -->
    <div class="hidden lg:flex lg:gap-x-12">
      <?php
    $menu_items = Wpstorm_Menus::get_menu_items_by_location('primary-menu');

    if ($menu_items) {
        foreach ($menu_items as $menu_item) {
            if (Wpstorm_Menus::has_submenu_items($menu_items, $menu_item->ID)) {
                echo '<div class="relative" x-data="{show_submenu : false}">';
                echo '<button @click="show_submenu = ! show_submenu" type="button" class="flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900" aria-expanded="false">';
                echo esc_html($menu_item->title);
                echo '<svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">';
                echo '<path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />';
                echo '</svg>';
                echo '</button>';

                $submenu_items = Wpstorm_Menus::get_submenu_items($menu_items, $menu_item->ID);
                if ($submenu_items) {
                    echo '<div x-show="show_submenu" x-cloak x-transition @click.outside="show_submenu = false" class="absolute -left-8 top-full z-10 mt-3 w-96 rounded-3xl bg-white p-4 shadow-lg ring-1 ring-gray-900/5">';
                    foreach ($submenu_items as $submenu_item) {
                        $classes = 'relative rounded-lg p-4 hover:bg-gray-100';
                        // Compare the current menu item's URL with the current page URL
                        if (strcasecmp($submenu_item->url, get_permalink()) === 0) {
                            $classes .= ' bg-gray-50';
                        }
                        echo '<div class="' . $classes .'">';
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
                echo '</div>';
            } else if (!$menu_item->menu_item_parent > 0) {
                echo '<a href="' . esc_url($menu_item->url) . '" class="block text-sm font-semibold leading-6 text-gray-900">';
                echo esc_html($menu_item->title);
                echo '</a>';
            }
        }
    } else {
        echo 'No menu items found.';
    }
    ?>
    </div>
    <div class="hidden lg:flex lg:flex-1 lg:justify-end gap-6">
      <!-- Search Icon -->
      <button @click="search_modal = true" type="button"
        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
        <span class="sr-only"><?php __('Open search', 'wpstorm-theme') ?></span>
        <?php echo Wpstorm_Helpers::get_svg_icon('search', 'h-6 w-6') ?>
      </button>

      <!-- Desktop header actions for logged in users -->
      <?php if (is_user_logged_in()) { ?>

      <div class="relative inline-block" x-data="{user_actions: false}">
        <button @click="user_actions = ! user_actions" class="group block flex-shrink-0">
          <div class="flex items-center">
            <img class="inline-block h-9 w-9 rounded-full" src="<?php echo get_avatar_url(get_current_user_id()); ?>"
              alt="" />
            <div class="mr-3">
              <p class="text-sm font-medium text-gray-700 group-hover:text-gray-900">
                <?php echo esc_html(wp_get_current_user()->display_name) ?></p>
              <p class="text-xs font-medium text-gray-500 group-hover:text-gray-700">
                <?php echo __('Actions', 'wpstorm-theme') ?></p>
            </div>
          </div>
        </button>
        <div x-show="user_actions" x-cloak x-transition @click.outside="user_actions = false"
          class="absolute left-0 z-10 mt-2 w-56 origin-top-left divide-y divide-gray-100 rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
          role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
          <div class="px-4 py-3" role="none">
            <p class="text-sm" role="none"><?php echo __('Signed in as', 'wpstorm-theme'); ?></p>
            <p class="truncate text-sm font-medium text-gray-900" role="none">
              <?php echo esc_html(get_userdata(get_current_user_id())->data->user_email); ?></p>
          </div>
          <?php
                $menu_items = Wpstorm_Menus::get_menu_items_by_location('user-profile-actions-menu');

                echo '<div class="py-1" role="none">';
                if ($menu_items) {
                    foreach ($menu_items as $menu_item) {
                        $classes = 'text-gray-900 block px-4 py-2 text-sm hover:bg-gray-100';

                        // Compare the current menu item's URL with the current page URL
                        if (strcasecmp($menu_item->url, get_permalink()) === 0) {
                            $classes .= ' bg-gray-100';
                        }

                        // Generate the HTML for the menu item
                        echo '<a href="' . esc_url($menu_item->url) . '" class="' . $classes . '" role="menuitem" tabindex="-1" id="menu-item-' . esc_attr($menu_item->ID) . '">' . esc_html($menu_item->title) . '</a>';
                    }
                }
                echo '</div>';
                ?>
          <div class="pt-1" role="none">
            <a href="<?php echo esc_url(wp_logout_url()); ?>"
              class="text-gray-700 block w-full px-4 py-2 rounded-b-lg text-left text-sm hover:bg-red-300"
              role="menuitem" tabindex="-1" id="menu-item-3">Sign out
            </a>
          </div>
        </div>
      </div>
      <?php } else { ?>
      <!-- Desktop header actions for logged out users -->
      <a href="<?php echo esc_url(wp_login_url()) ?>"
        class="text-sm font-semibold leading-6 text-gray-900"><?php echo __('Login', 'wpstorm-theme') ?></a>
      <?php if (get_option('users_can_register')) { ?>
      <a href="<?php echo esc_url(wp_registration_url()) ?>"
        class="text-sm font-semibold leading-6 text-gray-900"><?php echo __('Sign up', 'wpstorm-theme') ?></a>

      <?php } } ?>

    </div>
  </nav>
  <!-- Mobile menu, show/hide based on menu open state. -->
  <div x-show="mobile_menu" x-transition x-cloak role="dialog" aria-modal="true">
    <!-- Background backdrop, show/hide based on slide-over state. -->
    <div class="fixed inset-0 z-10"></div>
    <div
      class="fixed inset-y-0 right-0 z-10 flex w-full flex-col justify-between overflow-y-auto bg-white sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
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
          <button @click="mobile_menu = false" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
            <span class="sr-only"><?php __('Close menu', 'wpstorm-theme') ?></span>
            <?php echo Wpstorm_Helpers::get_svg_icon('close', 'h-8 w-8') ?>
          </button>
        </div>
        <div class="mt-6 flow-root">
          <div class="-my-6 divide-y divide-gray-500/10">
            <div class="space-y-2 py-6">
              <?php
                        $menu_items = Wpstorm_Menus::get_menu_items_by_location('primary-mobile-menu');
                        if ($menu_items) {
                            foreach ($menu_items as $menu_item) {
                                if (Wpstorm_Menus::has_submenu_items($menu_items, $menu_item->ID)) {

                                    echo '<a href="' . esc_url($menu_item->url) . '" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">';
                                    echo esc_html($menu_item->title);
                                    echo '</a>';

                                    $submenu_items = Wpstorm_Menus::get_submenu_items($menu_items, $menu_item->ID);
                                    if ($submenu_items) {
                                        foreach ($submenu_items as $submenu_item) {
                                            $classes = '-mx-5 block rounded-lg px-6 py-2 text-sm font-light leading-7 text-gray-700 hover:bg-gray-100';
                                            // Compare the current menu item's URL with the current page URL
                                            if (strcasecmp($submenu_item->url, get_permalink()) === 0) {
                                                $classes .= ' text-gray-900 bg-gray-100';
                                            }
                                            echo '<a href="' . esc_url($submenu_item->url) . '" class="'. $classes .'">';
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
        <?php if (get_option('users_can_register')) { ?>
        <a href="<?php echo esc_url(wp_registration_url()) ?>"
          class="p-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-100"><?php echo __('Sing up', 'wpstorm-theme') ?></a>
        <?php }} ?>
      </div>
    </div>
  </div>

  <!-- Search modal, show/hide based on search modal open state. -->
  <div x-show="search_modal" x-transition x-cloak x-data="{resultes : []}" class="relative z-10" role="dialog"
    aria-modal="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-25 transition-opacity"></div>

    <!-- Close search modal button -->
    <button @click="search_modal = false" type="button"
      class="absolute top-4 left-6 rounded-full p-2 bg-white shadow-xl text-rose-500 z-20 hover:text-rose-700">
      <span class="sr-only"><?php __('Close search', 'wpstorm-theme') ?></span>
      <?php echo Wpstorm_Helpers::get_svg_icon('close', 'h-8 w-8') ?>
    </button>
    <div class="fixed inset-0 z-10 overflow-y-auto p-4 sm:p-6 md:p-20">

      <div
        class="mx-auto max-w-xl transform divide-y divide-gray-100 overflow-hidden rounded-xl bg-white shadow-2xl ring-1 ring-black ring-opacity-5 transition-all">
        <!-- Search input -->
        <div class="relative">
          <?php echo Wpstorm_Helpers::get_svg_icon('search', 'pointer-events-none absolute left-4 top-3.5 h-5 w-5 text-gray-400') ?>
          <label for="search" class="sr-only">Search</label>

          <?php 
          $rest_route = rest_url('wp/v2/search?search=');          
          ?>
          <input type="text" x-model="resultes"
            @input="fetch('<?php echo $rest_route ?>' + $event.target.value).then(res => res.json()).then(data => console.log(data))"
            class="h-12 w-full border-0 bg-transparent pl-11 pr-4 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm"
            placeholder="Search..." role="combobox" aria-expanded="false" aria-controls="options">
        </div>

        <!-- Results area -->
        <ul x-show="resultes.length" class="max-h-96 scroll-py-3 overflow-y-auto p-3" id="options" role="listbox">
          <!-- Loop the results and show a li for each item -->
          <template x-for="(result, index) in resultes" :key="index">
            <li x-text="result.title" class="group flex cursor-pointer select-none rounded-xl p-3" role="option"
              tabindex="-1" @click="search_modal = false">
              <img x-bind:src="result.thumbnail" alt="" class="h-10 w-10 flex-none rounded-lg object-cover"
                x-show="result.thumbnail" />
              <div class="ml-4 flex-auto">
                <p x-text="result.title" class="text-sm font-medium text-gray-700"></p>
                <p x-text="result.excerpt" class="text-sm text-gray-500"></p>
              </div>
            </li>
          </template>
        </ul>

        <!-- Empty state, show/hide based on command palette state -->
        <div class="px-6 py-14 text-center text-sm sm:px-14" x-show="!resultes.length">
          <svg class="mx-auto h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
          </svg>
          <p class="mt-4 font-semibold text-gray-900">No results found</p>
          <p class="mt-2 text-gray-500">No components found for this search term. Please try again.</p>
        </div>
      </div>
    </div>
  </div>


</header>