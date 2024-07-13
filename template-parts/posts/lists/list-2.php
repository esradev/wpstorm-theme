<article class="relative isolate flex flex-col gap-8 lg:flex-row">
  <div class="relative aspect-[16/9] sm:aspect-[2/1] lg:aspect-square lg:w-64 lg:shrink-0">
    <?php if (has_post_thumbnail()) : ?>
    <?php the_post_thumbnail('full', array('class' => 'absolute inset-0 h-full w-full rounded-2xl bg-gray-50 object-cover')); ?>
    <?php else : ?>
    <?php
            $default_image_url = get_template_directory_uri() . '/assets/images/single-post.jpg';
            echo '<img src="' . esc_url($default_image_url) . '" alt="Default Image" class="absolute inset-0 h-full w-full rounded-2xl bg-gray-50 object-cover">';
            ?>
    <?php endif; ?>
    <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
  </div>
  <div>
    <div class="flex items-center gap-x-4 text-xs">
      <time datetime="<?php echo get_the_date('Y-m-d'); ?>"
        class="text-gray-500"><?php echo get_the_date('M d, Y'); ?></time>
      <a href="<?php echo get_category_link(get_the_category()[0]->term_id); ?>"
        class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100"><?php echo get_the_category()[0]->name; ?></a>
    </div>
    <div class="group relative max-w-xl">
      <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
        <a href="<?php the_permalink(); ?>">
          <span class="absolute inset-0"></span>
          <?php the_title(); ?>
        </a>
      </h3>
      <p class="mt-5 text-sm leading-6 text-gray-600"><?php echo get_the_excerpt(); ?></p>
    </div>
    <div class="mt-6 flex border-t border-gray-900/5 pt-6">
      <div class="relative flex items-center gap-x-4">
        <?php echo get_avatar(get_the_author_meta('ID'), 48, '', '', array('class' => 'h-10 w-10 rounded-full bg-gray-50')); ?>
        <div class="text-sm leading-6">
          <p class="font-semibold text-gray-900">
            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
              <span class="absolute inset-0"></span>
              <?php the_author(); ?>
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
</article>