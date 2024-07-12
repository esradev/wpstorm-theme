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
        ?>
  </div>
  <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
    <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:gap-x-5">
      <div class="flex">
        <!-- Image of the post author -->
        <img class="h-20 w-20 rounded-full ring-4 ring-white"
          src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>" alt="">
      </div>
      <div class="mt-12 sm:flex sm:min-w-0 sm:flex-1 sm:items-center sm:justify-end sm:gap-x-6 sm:pb-1">
        <div class="mt-6 min-w-0 flex-1 sm:hidden md:block">
          <h1 class="truncate text-2xl font-bold text-gray-900"><?php the_author(); ?></h1>
          <time datetime="<?php echo get_the_date('Y-m-d'); ?>"
            class="mt-2 text-sm font-medium text-gray-500"><?php echo get_the_date('M d, Y'); ?></time>
        </div>
        <div class="mt-6 flex flex-col justify-stretch gap-3 sm:flex-row sm:gap-4">
          <button type="button"
            class="inline-flex justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
            <?php echo Wpstorm_Helpers::get_svg_icon('message', '-mr-0.5 ml-1.5 h-5 w-5 text-gray-400') ?>
            <span>Message</span>
          </button>
          <button type="button"
            class="inline-flex justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
            <?php echo Wpstorm_Helpers::get_svg_icon('phone', '-mr-0.5 ml-1.5 h-5 w-5 text-gray-400') ?>
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

<div class="bg-white py-32">
  <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8 text-base leading-7 text-gray-700">
    <div class="flex items-center gap-x-4 text-sm text-gray-500">

      <?php
        // Loop through post categories and display each category name
        $categories = get_the_category();
        foreach ($categories as $category) {
            echo '<a class="text-base font-semibold leading-7 text-indigo-600" href="' . esc_url(get_category_link($category->term_id)) .  '">' . esc_html($category->name) . '</a>';
        }
        ?>
    </div>
    <h1 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"><?php the_title(); ?></h1>
    <div class="mt-6 text-lg leading-8"><?php the_excerpt(); ?></div>
    <div class="mt-10 max-w-2xl prose">
      <?php the_content(); ?>
    </div>
  </div>
</div>

<!-- Display the comments form -->
<div class="mx-auto max-w-5xl my-8 px-4 sm:px-6 lg:px-8">
  <?php comments_template(); ?>
</div>

<?php
endwhile;
get_footer();
?>