<?php

get_header();

?>

<?php
// Generate random gradient colors
$colors = array('#FF5733', '#33FF57', '#3357FF', '#FF33A1', '#A133FF', '#33FFF5');
do {
  $from_color = $colors[array_rand($colors)];
  $to_color = $colors[array_rand($colors)];
} while ($from_color === $to_color);
?>

<div class="w-full h-full py-16" style="background: linear-gradient(to right, <?php echo esc_html($from_color); ?>, <?php echo esc_html($to_color); ?>);">
  <div class="mx-auto max-w-2xl lg:max-w-4xl text-center text-white">
  <h1 class="text-5xl font-extrabold mb-4"><?php single_cat_title(); ?></h1>
  <p class="text-lg"><?php echo get_the_archive_description(); ?></p>
  </div>
</div>
<div class="mx-auto max-w-7xl px-6 lg:px-8">
  <div class="mx-auto max-w-2xl lg:max-w-4xl">
  <div class="mt-16 space-y-20 lg:mt-20 lg:space-y-20">
    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    // Query the latest posts
    $args = array(
      'posts_per_page' => get_option('posts_per_page'),
      'paged' => $paged,
    );
    $posts = new WP_Query($args);

    if ($posts->have_posts()) :
      // Loop through the latest posts
      while ($posts->have_posts()) : $posts->the_post();
        get_template_part(Wpstorm_Templates::get_post_list_template());
      endwhile;

      // Add pagination links
      get_template_part(Wpstorm_Templates::get_paginate_template());
    else :
      echo '<p>No posts found.</p>';
    endif;

    wp_reset_postdata();
    ?>
  </div>
  </div>
</div>

<?php

get_footer();