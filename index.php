<?php

get_header();

?>
    <div class="py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:max-w-4xl">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"><?php echo the_title(); ?></h2>
                <p class="mt-2 text-lg leading-8 text-gray-600"><?php the_excerpt(); ?></p>
                <div class="mt-16 space-y-20 lg:mt-20 lg:space-y-20">
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    // Query the latest posts
                    $args = array(
                        'posts_per_page' => 1, // Adjust the number of posts to display
                        'paged' => $paged, // Add pagination support
                    );
                    $latest_posts = new WP_Query($args);

                    // Loop through the latest posts
                    while ($latest_posts->have_posts()) : $latest_posts->the_post();
                        get_template_part(Wpstorm_Templates::get_post_list_template());
                    endwhile;

                    // Add pagination links
                    previous_posts_link('Previous Page', $latest_posts->max_num_pages);
                    next_posts_link('Next Page', $latest_posts->max_num_pages);

                    wp_reset_postdata();
                    // Reset the main query to its original state
                    wp_reset_query();
                    ?>
                </div>
            </div>
        </div>
    </div>


<?php

get_footer();

?>