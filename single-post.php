<?php
get_header();

// Get the current post object
while (have_posts()) : the_post();
?>
<div>
    <div>
        <!-- Display featured post image -->
        <?php
        $post_thumbnail_url = get_the_post_thumbnail_url($post->ID);

        // Check if the post has a featured image
        if ($post_thumbnail_url) {
            // If a featured image exists, display it
            echo '<img class="h-32 w-full object-cover lg:h-48" src="' . $post_thumbnail_url . '" alt="">';
        } else {
            // If no featured image, display the default image
            echo '<img class="h-32 w-full object-cover lg:h-48" src="' . get_template_directory_uri() . '/assets/images/single-post.jpg" alt="Default Image">';
        }
        ?>    </div>
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">
            <div class="flex">
                <!-- Image of the post author -->
                <img class="h-20 w-20 rounded-full ring-4 ring-white" src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>"
                     alt="">
            </div>
            <div class="mt-12 sm:flex sm:min-w-0 sm:flex-1 sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
                <div class="mt-6 min-w-0 flex-1 sm:hidden md:block">
                    <h1 class="truncate text-2xl font-bold text-gray-900"><?php the_author(); ?></h1>
                </div>
                <div class="mt-6 flex flex-col justify-stretch space-y-3 sm:flex-row sm:space-x-4 sm:space-y-0">
                    <button type="button" class="inline-flex justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                        <svg class="-ml-0.5 mr-1.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z" />
                            <path d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z" />
                        </svg>
                        <span>Message</span>
                    </button>
                    <button type="button" class="inline-flex justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                        <svg class="-ml-0.5 mr-1.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M2 3.5A1.5 1.5 0 013.5 2h1.148a1.5 1.5 0 011.465 1.175l.716 3.223a1.5 1.5 0 01-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 006.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 011.767-1.052l3.223.716A1.5 1.5 0 0118 15.352V16.5a1.5 1.5 0 01-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 012.43 8.326 13.019 13.019 0 012 5V3.5z" clip-rule="evenodd" />
                        </svg>
                        <span>Call</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="mt-6 hidden min-w-0 flex-1 sm:block md:hidden">
            <h1 class="truncate text-2xl font-bold text-gray-900"><?php the_author(); ?></h1>
        </div>
    </div>
</div>

<div class="bg-white px-6 py-32 lg:px-8">
    <div class="mx-auto max-w-3xl text-base leading-7 text-gray-700">
        <?php
        // Loop through post categories and display each category name
        $categories = get_the_category();
        foreach ($categories as $category) {
            echo '<p class="text-base font-semibold leading-7 text-indigo-600">' . esc_html($category->name) . '</p>';
        }
        ?>
        <h1 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"><?php the_title(); ?></h1>
        <div class="mt-6 text-lg leading-8"><?php the_excerpt(); ?></div>
        <div class="mt-10 max-w-2xl prose">
            <?php the_content(); ?>
        </div>
    </div>
</div>

<?php
endwhile;
get_footer();
?>
