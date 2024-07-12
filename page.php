<?php

get_header();

?>
<div class="py-24 sm:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto max-w-2xl lg:max-w-4xl">
      <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"><?php echo the_title(); ?></h2>
      <p class="mt-2 text-lg leading-8 text-gray-600"><?php the_excerpt(); ?></p>
      <div class="mt-16 space-y-20 lg:mt-20 lg:space-y-20">
        <div class="prose max-w-none">
          <?php
          // Loop through the latest posts
          while (have_posts()) : the_post();
            the_content();
          endwhile;
          ?>
        </div>
      </div>
    </div>
  </div>
</div>


<?php

get_footer();