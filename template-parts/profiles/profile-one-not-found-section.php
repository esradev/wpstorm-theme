<?php ?>
<!-- Not Found Section -->
<div x-cloak
  x-show="section !== 'general' && section !== 'security' && section !== 'create-post' && section !== 'posts' && !section.startsWith('edit-post?id=')"
  class="mx-auto max-w-2xl space-y-16 sm:space-y-20 lg:mx-0 lg:max-w-none">
  <div>
    <h2 class="text-base font-semibold leading-7 text-gray-900">
      <?php echo __('Not Found', 'wpstorm-theme'); ?> </h2>
    <p class="mt-1 text-sm leading-6 text-gray-700">
      <?php echo __('The section you are looking for does not exist.', 'wpstorm-theme'); ?>
    </p>
  </div>
</div>