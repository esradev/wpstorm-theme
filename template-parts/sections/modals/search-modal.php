<!-- Search modal, show/hide based on search modal open state. -->
<div x-show="$store.search.search_modal" x-transition x-cloak x-data="searchComponent" class="relative z-10"
  role="dialog" aria-modal="true">
  <div class="fixed inset-0 bg-gray-500 bg-opacity-25 transition-opacity"></div>

  <!-- Close search modal button -->
  <button @click="closeSearchModal" type="button"
    class="fixed top-4 left-6 rounded-full p-2 bg-white shadow-xl text-rose-500 z-20 hover:text-rose-700">
    <span class="sr-only"><?php __('Close search', 'wpstorm-theme') ?></span>
    <?php echo Wpstorm_Helpers::get_svg_icon('close', 'h-8 w-8') ?>
  </button>
  <div class="fixed inset-0 z-10 overflow-y-hidden p-4 sm:p-6 md:p-20">
    <div
      class="mx-auto max-w-xl transform divide-y divide-gray-100 overflow-hidden rounded-xl bg-white shadow-2xl ring-1 ring-black ring-opacity-5 transition-all">
      <!-- Search input -->
      <div class="relative">
        <?php echo Wpstorm_Helpers::get_svg_icon('search', 'pointer-events-none absolute left-4 top-3.5 h-5 w-5 text-gray-400') ?>
        <label for="search" class="sr-only">Search</label>

        <input type="text" x-trap="$store.search.search_modal" x-model="searchTerm" @input="handleInput"
          class="h-12 w-full border-0 bg-transparent pl-11 pr-4 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-base"
          placeholder="Search... or press Escap to exit" role="combobox" aria-expanded="false" aria-controls="options">
      </div>

      <!-- Init area -->
      <div x-show="!searchTerm && !loading" class="px-6 py-14 text-center text-base sm:px-14" x-cloak>
        <?php echo Wpstorm_Helpers::get_svg_icon('search', 'mx-auto h-6 w-6 text-gray-400') ?>
        <p class="mt-4 font-semibold text-gray-900">Start typing to search</p>
        <p class="mt-2 text-gray-500">Search for components by name or description.</p>
      </div>

      <!-- Loading Icon -->
      <div x-show="loading" x-cloak class="flex items-center justify-center">
        <div class="animate-spin h-10 w-10 text-blue-400 my-20">
          <?php echo Wpstorm_Helpers::get_svg_icon('arrow-path', 'h-10 w-10 text-blue-400') ?>
        </div>
      </div>

      <!-- Results area -->
      <div x-show="resultes.length && !loading && searchTerm">
        <div class="px-6 py-4 text-center text-base sm:px-14">
          <p class="text-gray-500">Showing <span x-text="resultes.length" class="text-rose-600"></span> results for
            <span x-text="searchTerm" class="text-rose-600"></span>
          </p>
        </div>
        <ul class="max-h-96 scroll-py-3 overflow-y-auto p-3" id="options" role="listbox">
          <template x-for="post in resultes" :key="post.id">
            <li class="group flex cursor-pointer select-none rounded-xl p-3 hover:bg-gray-100" role="option">
              <a :href="post.link" class="flex w-full gap-x-2">
                <img x-bind:src="post.featured_image_src ? post.featured_image_src : 'https://via.placeholder.com/150'"
                  alt="" class="h-16 w-16 flex-none rounded-lg object-cover" />
                <div class="ml-4 flex-auto">
                  <p x-text="post.title.rendered" class="text-base font-medium text-gray-700 group-hover:text-blue-600">
                  </p>
                  <p x-html="truncateExcerpt(post.excerpt.rendered, 15)"
                    class="mt-1 text-base text-gray-500 group-hover:text-blue-400"></p>
                </div>
              </a>
            </li>
          </template>
        </ul>
      </div>

      <!-- Empty state, show/hide based on command palette state -->
      <div class="px-6 py-14 text-center text-base sm:px-14" x-show="!resultes.length && !loading && searchTerm">
        <?php echo Wpstorm_Helpers::get_svg_icon('exclamation-triangle', 'mx-auto h-6 w-6 text-rose-600') ?>
        <p class="mt-4 font-semibold text-gray-700">No results found</p>
        <p class="mt-2 text-gray-500">No components found for this search term. Please try again.</p>
      </div>
    </div>
  </div>
</div>