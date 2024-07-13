<main class="mx-auto w-full max-w-7xl px-6 pb-16 pt-10 sm:pb-24 lg:px-8">
  <img class="mx-auto h-10 w-auto sm:h-12" src="<?php echo esc_url(get_site_icon_url()) ?>" alt="Your Company">
  <div class="mx-auto mt-20 max-w-2xl text-center sm:mt-24">
    <p class="text-base font-semibold leading-8 text-indigo-600">404</p>
    <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">
      <?php echo get_theme_mod('404_heading', 'This page does not exist'); ?></h1>
    <p class="mt-4 text-base leading-7 text-gray-600 sm:mt-6 sm:text-lg sm:leading-8">
      <?php echo get_theme_mod('404_sub_heading', 'Sorry, we couldn’t find the page you’re looking for.'); ?></p>
  </div>
  <div class="mx-auto mt-16 flow-root max-w-lg sm:mt-20">
    <h2 class="sr-only"><?php echo __('Popular pages', 'wpstorm-theme'); ?></h2>
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
      <li class="relative flex gap-x-6 py-6 items-center">
        <div class="flex h-10 w-10 flex-none items-center justify-center rounded-lg shadow-sm ring-1 ring-gray-900/10">
          <?php echo Wpstorm_Helpers::get_svg_icon('star', 'h-6 w-6 text-indigo-600') ?>
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
          <?php echo Wpstorm_Helpers::get_svg_icon('next', 'h-5 w-5 text-gray-400') ?>
        </div>
      </li>
      <?php
                }
            }
            ?>
    </ul>
    <div class="mt-10 flex justify-center">
      <a href="<?php echo esc_url(get_home_url()) ?>" class="text-sm font-semibold leading-6 text-indigo-600">
        <?php echo get_theme_mod('404_back_to_home', 'Back to home');
              echo Wpstorm_Helpers::get_svg_icon('next', 'h-5 w-5 text-indigo-600 inline-block mr-1')  
        ?>

      </a>
    </div>
  </div>
</main>