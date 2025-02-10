<?php
/**
 * The sidebar for the profile one template
 *
 * @package Wpstorm
 * @subpackage Wpstorm_Theme
 * @since 1.0.0
 */

?>
<aside
    class="flex overflow-x-auto border-b border-gray-900/5 py-4 lg:block lg:w-64 lg:flex-none lg:border-0 lg:py-20">
    <nav class="flex-none px-4 sm:px-6 lg:px-0">
      <ul role="list" class="flex gap-x-3 gap-y-1 whitespace-nowrap lg:flex-col">
        <!-- General link -->
        <li>
          <a @click.prevent="updateUrl('general')"
            :class="{'bg-indigo-50 text-indigo-600': section === 'general', 'text-gray-700 hover:text-indigo-600 hover:bg-indigo-50': section !== 'general'}"
            class="group flex gap-x-3 rounded-md py-2 pl-2 pr-3 text-sm leading-6 font-semibold cursor-pointer">
            <?php
            echo Wpstorm_Helpers::get_svg_icon('user-circle', 'h-6 w-6 shrink-0', '', 'section === \'general\' ? \'text-indigo-600\' : \'text-gray-400\'');
            echo __('General', 'wpstorm-theme') ?>
          </a>
        </li>

        <!-- Security link -->
        <li>
          <a @click.prevent="updateUrl('security')"
            :class="{'bg-indigo-50 text-indigo-600': section === 'security', 'text-gray-700 hover:text-indigo-600 hover:bg-indigo-50': section !== 'security'}"
            class="group flex gap-x-3 rounded-md py-2 pl-2 pr-3 text-sm leading-6 font-semibold cursor-pointer">
            <?php
            echo Wpstorm_Helpers::get_svg_icon('shield-check', 'h-6 w-6 shrink-0', '', 'section === \'security\' ? \'text-indigo-600\' : \'text-gray-400\'');
            echo __('Security', 'wpstorm-theme') ?>
          </a>
        </li>

        <!-- Authors links -->
        <?php if (current_user_can('edit_posts')) : ?>
        <!-- Create new post link -->
        <li>
          <a @click.prevent="updateUrl('create-post')"
            :class="{'bg-indigo-50 text-indigo-600': section === 'create-post', 'text-gray-700 hover:text-indigo-600 hover:bg-indigo-50': section !== 'create-post'}"
            class="group flex gap-x-3 rounded-md py-2 pl-2 pr-3 text-sm leading-6 font-semibold cursor-pointer">
            <?php
            echo Wpstorm_Helpers::get_svg_icon('plus-circle', 'h-6 w-6 shrink-0', '', 'text-gray-400');
            echo __('Create New Post', 'wpstorm-theme') ?>
          </a>
        </li>

        <li>
          <a @click.prevent="updateUrl('posts')"
            :class="{'bg-indigo-50 text-indigo-600': section === 'posts', 'text-gray-700 hover:text-indigo-600 hover:bg-indigo-50': section !== 'posts'}"
            class="group flex gap-x-3 rounded-md py-2 pl-2 pr-3 text-sm leading-6 font-semibold cursor-pointer">
            <?php
            echo Wpstorm_Helpers::get_svg_icon('square-3-stack-3d', 'h-6 w-6 shrink-0', '', 'text-gray-400');
            echo __('View All Posts', 'wpstorm-theme') ?>
          </a>
        </li>
        <?php endif; ?>

        <!-- Logout link -->
        <li>
          <a href="<?php echo wp_logout_url(home_url()); ?>"
            class="group flex gap-x-3 rounded-md py-2 pl-2 pr-3 text-sm leading-6 font-semibold cursor-pointer bg-rose-50 text-rose-600 hover:text-rose-700 hover:bg-rose-100">
            <?php
            echo Wpstorm_Helpers::get_svg_icon('logout', 'h-6 w-6 shrink-0', '', 'text-gray-400');
            echo __('Logout', 'wpstorm-theme') ?>
          </a>
        </li>

      </ul>
    </nav>
  </aside>