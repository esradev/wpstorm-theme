<div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start min-h-[100dvh] bg-background px-4 py-12 sm:px-6 lg:px-8">
  <div class="flex flex-col items-center justify-center space-y-6">
    <span class="relative flex shrink-0 overflow-hidden rounded-full w-24 h-24 border-2 border-primary">
      <?php echo get_avatar(get_the_author_meta('ID'), 96); ?>
    </span>
    <div class="text-center">
      <h1 class="text-2xl font-bold"><?php the_author_meta('display_name'); ?></h1>
      <div class="prose text-center"><?php the_author_meta('description'); ?></div>
    </div>
    <div class="flex justify-center gap-4">
      <a class="text-muted-foreground hover:text-rose-600" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path
            d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z">
          </path>
        </svg>
        <span class="sr-only">Twitter</span>
      </a>
      <a class="text-muted-foreground hover:text-rose-600" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
          <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
          <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
        </svg>
        <span class="sr-only">Instagram</span>
      </a>
      <a class="text-muted-foreground hover:text-rose-600" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
          <rect width="4" height="12" x="2" y="9"></rect>
          <circle cx="4" cy="4" r="2"></circle>
        </svg>
        <span class="sr-only">LinkedIn</span>
      </a>
      <a class="text-muted-foreground hover:text-rose-600" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="12" cy="12" r="10"></circle>
          <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
          <path d="M2 12h20"></path>
        </svg>
        <span class="sr-only">Website</span>
      </a>
    </div>
  </div>
  <div class="grid gap-4">
    <?php
        $args = array(
            'author' => get_the_author_meta('ID'),
            'posts_per_page' => 5,
        );
        $author_posts = new WP_Query($args);

        if ($author_posts->have_posts()) :
            while ($author_posts->have_posts()) : $author_posts->the_post();
                ?>
    <a href="<?php the_permalink(); ?>" class=" flex items-start gap-4 border rounded-lg p-4 hover:bg-muted/50
      transition-colors">
      <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Post Thumbnail" width="80" height="80"
        class="rounded-lg object-cover" style="aspect-ratio:80/80;object-fit:cover" />

      <div class=" flex flex-col gap-1">
        <h3" class="font-bold"><?php the_title(); ?></h3>
          <p class="text-sm text-gray-600 font-normal line-clamp-2">
            <?php echo get_the_excerpt(); ?>
          </p>
          <time class="text-xs text-gray-600 font-normal"> - <?php the_time('F j, Y'); ?></time>
      </div>
    </a>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
    <?php else : ?>
    <div><?php _e('No posts found.', 'textdomain'); ?></div>
    <?php endif; ?>
  </div>
</div>