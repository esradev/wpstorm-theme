<?php

get_header();

?>
    <div class="py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:max-w-4xl">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">From the blog</h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">Learn how to grow your business with our expert advice.</p>
                <div class="mt-16 space-y-20 lg:mt-20 lg:space-y-20">
                        <?php
                        // Query the latest posts
                        $args = array(
                            'posts_per_page' => 12, // Adjust the number of posts to display
                        );
                        $latest_posts = new WP_Query($args);

                        // Loop through the latest posts
                        while ($latest_posts->have_posts()) : $latest_posts->the_post();
                            get_template_part(Wpstorm_Theme_Core::get_post_list_template());
                        endwhile;
                        wp_reset_postdata();
                        ?>
                </div>
            </div>
        </div>
    </div>


<?php get_footer();

?>