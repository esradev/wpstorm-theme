<?php if (current_user_can('edit_posts')) : ?>
<!-- Create New Post -->
<div x-cloak x-show="section === 'create-post'" x-data="createPost()">
  <div>
    <h2 class="text-base font-semibold leading-7 text-gray-900">
      <?php echo __('Create New Post', 'wpstorm-theme'); ?> </h2>
    <p class="mt-1 text-sm leading-6 text-gray-700">
      <?php echo __('Create a new post.', 'wpstorm-theme'); ?>
    </p>
    <!-- Create New Post Form -->
    <dl class="mt-6 space-y-6 divide-y divide-gray-100 border-t border-gray-200 text-sm leading-6">
      <div class="pt-6 sm:flex">
        <dt class="font-medium text-gray-900 sm:w-64 sm:flex-none sm:pr-6">
          <?php echo __('Post Title', 'wpstorm-theme'); ?>
        </dt>
        <dd class="mt-1 flex justify-between gap-x-6 sm:mt-0 sm:flex-auto">
          <input type="text" id="post_title" class="text-gray-900 border border-gray-300 rounded p-2 w-full"
            x-model="postTitle" required>
        </dd>
      </div>
      <div class="pt-6 sm:flex">
        <dt class="font-medium text-gray-900 sm:w-64 sm:flex-none sm:pr-6">
          <?php echo __('Post Content', 'wpstorm-theme'); ?>
        </dt>
        <dd class="mt-1 flex justify-between gap-x-6 sm:mt-0 sm:flex-auto">
          <textarea id="text-content" x-model="postContent" class="text-gray-900 border border-gray-300 rounded p-2 w-full"
            rows="20"></textarea>
        </dd>
      </div>
      <!-- TODO: let user select category -->

      <!-- TODO: let user select tags -->

      <!-- TODO: let user select featured image -->

      <!-- TODO: let user select post status -->

    </dl>
    <!-- Create New Post Button -->
    <div class="flex flex-row gap-x-4 mt-4 justify-end">
      <button type="button" @click="createPost"
        class="font-semibold text-green-600 hover:text-green-700 bg-green-50 px-4 py-2 hover:shadow-md rounded-lg"><?php echo __('Create Post', 'wpstorm-theme'); ?></button>
      <button type="button" @click="resetForm"
        class="font-semibold text-gray-600 hover:text-gray-700 bg-gray-50  px-4 py-2 hover:shadow-md rounded-lg"><?php echo __('Cancel', 'wpstorm-theme'); ?></button>
    </div>
  </div>
</div>

<!-- View All Posts -->

<div x-cloak x-show="section === 'posts'" class="mx-auto max-w-2xl space-y-16 sm:space-y-20 lg:mx-0 lg:max-w-none">
  <div
    x-data="{ posts: <?php echo htmlspecialchars(wp_json_encode(Wpstorm_Helpers::get_posts_by_author($user->ID)), ENT_QUOTES, 'UTF-8'); ?> }">
    <h2 class="text-base font-semibold leading-7 text-gray-900">
      <?php echo __('All Posts', 'wpstorm-theme'); ?> </h2>
    <p class="mt-1 text-sm leading-6 text-gray-700">
      <?php echo __('View all posts.', 'wpstorm-theme'); ?>
    </p>
    <!-- All Posts Table -->
    <table class="mt-6 w-full border-t border-gray-200 text-sm leading-6" x-show="posts.length > 0">
      <thead>
        <tr>
          <th class="text-right font-medium text-gray-900 py-2 pl-6">Title</th>
          <th class="text-right font-medium text-gray-900 py-2 pl-6">Status</th>
          <th class="text-left font-medium text-gray-900 py-2 pl-6">Actions</th>
        </tr>
      </thead>
      <!-- TODO: Now user just see published posts, let user filter by post status -->
      <!-- TODO: Let user can search posts by title -->
      <!-- TODO: Let user filter posts by category & other options -->
      <tbody>
        <template x-for="post in posts" :key="post.id">
          <tr>
            <td class="py-2 pl-6" x-text="post.title"></td>
            <td class="py-2 pl-6">
              <div x-text="post.status" class="inline-block px-2 py-1 text-xs font-semibold rounded-lg" :class="{
                'bg-green-100 text-green-600': post.status === 'publish',
                'bg-yellow-100 text-yellow-600': post.status === 'pending',
                'bg-gray-100 text-gray-600': post.status === 'draft',
                'bg-red-100 text-red-600': post.status === 'trash',
                'bg-blue-100 text-blue-600': post.status === 'future',
                'bg-indigo-100 text-indigo-600': post.status === 'private',
                'bg-purple-100 text-purple-600': post.status === 'inherit',
                'bg-pink-100 text-pink-600': post.status === 'auto-draft',
                }"></div>
            </td>
            <td class="py-2 pl-6 flex justify-end gap-x-2" x-data="deletePost(post)">
              <!-- View Button -->
              <a type="button"
                class="inline-flex items-center font-semibold text-green-600 hover:text-green-700 bg-green-50 p-2 hover:shadow-md rounded-lg"
                :href="post.link" target="_blank">
                <?php echo Wpstorm_Helpers::get_svg_icon('eye', 'h-5 w-5',); ?>
                <span class="sr-only"><?php echo __('View', 'wpstorm-theme'); ?></span>
              </a>
              <!-- Edit Button -->
              <button type="button"
                class="inline-flex items-center font-semibold text-indigo-600 hover:text-indigo-700 bg-indigo-50 p-2 hover:shadow-md rounded-lg"
                @click="() => { 
                            const postId = post.id;
                            section = `edit-post?id=${postId}`;
                            updateUrl(section); 
                            postToEdit = post;
                        }">
                <?php echo Wpstorm_Helpers::get_svg_icon('pencil-square', 'h-5 w-5',); ?>
                <span class="sr-only"><?php echo __('Edit', 'wpstorm-theme'); ?></span>
              </button>
              <!-- TODO: Confirm before delete -->
              <button type="button" x-show="post.status !== 'trash'"
                class="inline-flex items-center font-semibold text-rose-600 hover:text-rose-700 bg-rose-50 p-2 hover:shadow-md rounded-lg"
                @click="deletePost(post)">
                <?php echo Wpstorm_Helpers::get_svg_icon('trash', 'h-5 w-5',); ?>
                <span class="sr-only"><?php echo __('Delete', 'wpstorm-theme'); ?></span>
              </button>

              <button type="button" x-show="post.status === 'trash'"
                class="inline-flex items-center font-semibold text-yellow-600 hover:text-yellow-700 bg-yellow-50 p-2 hover:shadow-md rounded-lg"
                @click="restorePost(post)">
                <?php echo Wpstorm_Helpers::get_svg_icon('arrow-path', 'h-5 w-5',);?>
                <span class="sr-only"><?php echo __('Restore', 'wpstorm-theme'); ?></span>
              </button>

              <button type="button" x-show="post.status === 'trash'"
                class="inline-flex items-center font-semibold text-rose-600 hover:text-rose-700 bg-rose-50 px-4 py-2 hover:shadow-md rounded-lg"
                @click="deletePost(post)">
                <?php
                echo Wpstorm_Helpers::get_svg_icon('trash', 'h-5 w-5 ml-1 -mr-0.5',);
                echo __('Delete Permanently', 'wpstorm-theme'); ?>
              </button>

            </td>
          </tr>
        </template>
      </tbody>
    </table>
    <!-- Empty posts message -->
    <template x-if="posts.length === 0">
      <div class="py-2 pl-6" colspan="3">
        <div class="text-center">
          <?php echo Wpstorm_Helpers::get_svg_icon('document-plus', 'mx-auto h-12 w-12 text-gray-400',); ?>
          <h3 class="mt-2 text-sm font-semibold text-gray-900">No post</h3>
          <p class="mt-1 text-sm text-gray-500">Get started by creating a new post.</p>
          <div class="mt-6">
            <button type="button" @click="section = 'create-post'; updateUrl('create-post')"
              class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
              <?php echo Wpstorm_Helpers::get_svg_icon('plus', '-mr-0.5 ml-1.5 h-5 w-5',); ?>
              New post
            </button>
          </div>
        </div>
      </div>
    </template>
  </div>
</div>


<!-- Edit Post -->
<div x-cloak x-show="section.startsWith('edit-post?id=')">
  <div x-data="editPost">
    <h2 class="text-base font-semibold leading-7 text-gray-900">
      <?php echo __('Edit Post', 'wpstorm-theme'); ?>
    </h2>
    <p class="mt-1 text-sm leading-6 text-gray-700">
      <?php echo __('Edit your post.', 'wpstorm-theme'); ?>
    </p>
    <!-- Edit Post Form -->
    <dl class="mt-6 space-y-6 divide-y divide-gray-100 border-t border-gray-200 text-sm leading-6">
      <div class="pt-6 sm:flex">
        <dt class="font-medium text-gray-900 sm:w-64 sm:flex-none sm:pr-6">
          <?php echo __('Post Title', 'wpstorm-theme'); ?>
        </dt>
        <dd class="mt-1 flex justify-between gap-x-6 sm:mt-0 sm:flex-auto">
          <input type="text" id="post_title" class="text-gray-900 border border-gray-300 rounded p-2 w-full"
            x-model="title" required>
        </dd>
      </div>
      <div class="pt-6 sm:flex">
        <dt class="font-medium text-gray-900 sm:w-64 sm:flex-none sm:pr-6">
          <?php echo __('Post Content', 'wpstorm-theme'); ?>
        </dt>
        <dd class="mt-1 flex justify-between gap-x-6 sm:mt-0 sm:flex-auto">
          <textarea id="post_content" class="text-gray-900 border border-gray-300 rounded p-2 w-full" rows="20"
            x-model="content" required></textarea>
        </dd>
      </div>
    </dl>
    <!-- Edit Post Button -->
    <div class="flex flex-row gap-x-4 mt-4 justify-end">
      <button type="button" @click="updatePost"
        class="font-semibold text-green-600 hover:text-green-700 bg-green-50 px-4 py-2 hover:shadow-md rounded-lg">
        <?php echo __('Update Post', 'wpstorm-theme'); ?>
      </button>
      <button type="button" @click="resetForm"
        class="font-semibold text-gray-600 hover:text-gray-700 bg-gray-50  px-4 py-2 hover:shadow-md rounded-lg">
        <?php echo __('Cancel', 'wpstorm-theme'); ?>
      </button>
    </div>
  </div>
</div>


<?php endif; ?>