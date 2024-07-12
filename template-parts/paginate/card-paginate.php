<div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
  <div class="flex flex-1 justify-between sm:hidden">
    <a href="#"
      class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
    <a href="#"
      class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
  </div>
  <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
    <div>
      <p class="text-sm text-gray-700">
        Showing
        <span class="font-medium"><?php
        // get total number of posts showen on the page
        $current_posts = $posts->post_count;
        echo $current_posts;
        ?></span>
        of
        <span class="font-medium"><?php 
        // count the total number of posts
        $total_posts = wp_count_posts();
        echo $total_posts->publish;
        ?></span>
        results
      </p>
    </div>
    <div>
      <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination" x-data>
        <?php
          echo paginate_links(array(
            'total' => $posts->max_num_pages,
            'prev_text' => '<div class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"> <span class="sr-only">Previous</span>' . Wpstorm_Helpers::get_svg_icon('prev', 'h-5 w-5') .'</div>',
            'next_text' => '<div class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"> <span class="sr-only">Next</span>' . Wpstorm_Helpers::get_svg_icon('next', 'h-5 w-5') . '</div>',
            'before_page_number' => '<span x-bind:class="{\'bg-rose-100 cursor-not-allowed hover:bg-rose-100\': $el.parentElement.classList.contains(\'current\')}" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">',
            'after_page_number' => '</span>',
          ));
        ?>
      </nav>
    </div>
  </div>
</div>