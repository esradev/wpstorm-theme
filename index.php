<?php

get_header();

?>

<div class="mx-auto max-w-7xl px-6 lg:px-8">
  <div class="mx-auto max-w-2xl lg:max-w-4xl">
    <div class="mt-16 space-y-20 lg:mt-20 lg:space-y-20">
      <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    // Query the latest posts
                    $args = array(
                        'posts_per_page' => 3, // Adjust the number of posts to display //TODO: let user chose this number and also set it on the customizer and reading settings page of admin dashboard
                        'paged' => $paged, // Add pagination support
                    );
                    $posts = new WP_Query($args);

                    // Loop through the latest posts
                    while ($posts->have_posts()) : $posts->the_post();
                        get_template_part(Wpstorm_Templates::get_post_list_template());
                    endwhile;

                    // Add pagination links
                    get_template_part(Wpstorm_Templates::get_paginate_template());
       
                    wp_reset_postdata();
                    // Reset the main query to its original state
                    wp_reset_query();
                    ?>
    </div>
  </div>
</div>

<?php

get_footer();