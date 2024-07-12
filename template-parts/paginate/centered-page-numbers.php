<nav x-data class="flex items-center justify-between border-t border-gray-200 px-4 sm:px-0">
  <?php
        echo paginate_links(array(
          'total' => $posts->max_num_pages,
          'prev_text' => '<div class="-mt-px flex w-0 flex-1">
    <div class="inline-flex items-center border-t-2 border-transparent pr-1 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
      ' . Wpstorm_Helpers::get_svg_icon('prev', 'ml-3 h-5 w-5 text-gray-400') . ' Previous </div> </div>',
          'next_text' => '<div class="-mt-px flex w-0 flex-1 justify-end">
    <div class="inline-flex items-center border-t-2 border-transparent pl-1 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
      Next' . Wpstorm_Helpers::get_svg_icon('next', 'mr-3 h-5 w-5 text-gray-400') . ' </div></div>',
          'before_page_number' => '<span x-bind:class="{\'text-rose-500 cursor-not-allowed\': $el.parentElement.classList.contains(\'current\')}" class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">',
          'after_page_number' => '</span>',
        ));
  ?>
</nav>