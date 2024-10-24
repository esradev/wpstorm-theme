<?php 
$user = wp_get_current_user();

?>

<div x-data="{ section: window.location.hash ? window.location.hash.substring(1) : 'general', updateUrl(section) {
        const pathArray = window.location.pathname.split('/');
        // Remove the last segment if it's a section identifier
        if (['general', 'security'].includes(pathArray[pathArray.length - 1])) {
            pathArray.pop();
        }
        const baseUrl = pathArray.join('/');
        history.pushState(null, '', `${baseUrl}#${section}`);
        }}" class="mx-auto max-w-7xl lg:flex lg:gap-x-16 lg:px-8">
  <aside
    class="flex overflow-x-auto border-b border-gray-900/5 py-4 lg:block lg:w-64 lg:flex-none lg:border-0 lg:py-20">
    <nav class="flex-none px-4 sm:px-6 lg:px-0">
      <ul role="list" class="flex gap-x-3 gap-y-1 whitespace-nowrap lg:flex-col">
        <!-- General link -->
        <li>
          <a @click.prevent="section = 'general'; updateUrl('general')"
            :class="{'bg-indigo-50 text-indigo-600': section === 'general', 'text-gray-700 hover:text-indigo-600 hover:bg-indigo-50': section !== 'general'}"
            class="group flex gap-x-3 rounded-md py-2 pl-2 pr-3 text-sm leading-6 font-semibold cursor-pointer">
            <?php
            echo Wpstorm_Helpers::get_svg_icon('user-circle', 'h-6 w-6 shrink-0', '', 'section === \'general\' ? \'text-indigo-600\' : \'text-gray-400\'');
            echo __('General', 'wpstorm-theme') ?>
          </a>
        </li>

        <!-- Security link -->
        <li>
          <a @click.prevent="section = 'security'; updateUrl('security')"
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
          <a @click.prevent="section = 'create-post'; updateUrl('create-post')"
            :class="{'bg-indigo-50 text-indigo-600': section === 'create-post', 'text-gray-700 hover:text-indigo-600 hover:bg-indigo-50': section !== 'create-post'}"
            class="group flex gap-x-3 rounded-md py-2 pl-2 pr-3 text-sm leading-6 font-semibold cursor-pointer">
            <?php
            echo Wpstorm_Helpers::get_svg_icon('plus-circle', 'h-6 w-6 shrink-0', '', 'text-gray-400');
            echo __('Create New Post', 'wpstorm-theme') ?>
          </a>
        </li>

        <li>
          <a @click.prevent="section = 'posts'; updateUrl('posts')"
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

  <main class="px-4 py-16 sm:px-6 lg:flex-auto lg:px-0 lg:py-20">

    <!-- General Settings -->
    <div x-cloak x-show="section === 'general'"
      class="mx-auto max-w-2xl space-y-16 sm:space-y-20 lg:mx-0 lg:max-w-none">
      <div>
        <h2 class="text-base font-semibold leading-7 text-gray-900">
          <?php echo __('Profile Information', 'wpstorm-theme'); ?> </h2>
        <p class="mt-1 text-sm leading-6 text-gray-700">
          <?php echo __('Update your account\'s profile information and email address.', 'wpstorm-theme'); ?>
        </p>

        <dl class="mt-6 space-y-6 divide-y divide-gray-100 border-t border-gray-200 text-sm leading-6" x-data="userEdit({
        first_name: '<?php echo esc_html($user->first_name); ?>',
        last_name: '<?php echo esc_html($user->last_name); ?>',
        name: '<?php echo esc_html($user->display_name); ?>',
        email: '<?php echo esc_html($user->user_email); ?>',
        description: '<?php echo esc_html($user->description); ?>'
    }, <?php echo esc_html($user->ID); ?>)">


          <!-- First Name -->
          <div class="pt-6 sm:flex">
            <dt class="font-medium text-gray-900 sm:w-64 sm:flex-none sm:pr-6">
              <?php echo __('First name', 'wpstorm-theme'); ?>
            </dt>
            <dd class="mt-1 flex justify-between gap-x-6 sm:mt-0 sm:flex-auto">
              <template x-if="!editing.first_name">
                <div class="flex justify-between gap-x-6 w-full">
                  <div class="text-gray-900" x-text="fields.first_name"></div>
                  <button type="button" class="font-semibold text-indigo-600 hover:text-indigo-700"
                    @click="editing.first_name = true">
                    <?php echo __('Update', 'wpstorm-theme'); ?>
                  </button>
                </div>
              </template>
              <template x-if="editing.first_name">
                <div class="flex justify-between gap-x-6 w-full">
                  <input type="text"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    x-model="fields.first_name" x-trap="editing.first_name" />
                  <div class="flex justify-end gap-x-4 ">
                    <button type="button"
                      class="font-semibold text-green-600 hover:text-green-700 bg-green-50 px-4 py-2 hover:shadow-md rounded-lg"
                      @click="saveChanges('first_name')">
                      <?php echo __('Save', 'wpstorm-theme'); ?>
                    </button>
                    <button type="button"
                      class="font-semibold text-gray-600 hover:text-gray-700 bg-gray-50  px-4 py-2 hover:shadow-md rounded-lg"
                      @click="editing.first_name = false">
                      <?php echo __('Cancel', 'wpstorm-theme'); ?>
                    </button>
                  </div>
                </div>
              </template>
            </dd>
          </div>

          <!-- Last Name -->
          <div class="pt-6 sm:flex">
            <dt class="font-medium text-gray-900 sm:w-64 sm:flex-none sm:pr-6">
              <?php echo __('Last name', 'wpstorm-theme'); ?>
            </dt>
            <dd class="mt-1 flex justify-between gap-x-6 sm:mt-0 sm:flex-auto">
              <template x-if="!editing.last_name">
                <div class="flex justify-between gap-x-6 w-full">
                  <div class="text-gray-900" x-text="fields.last_name"></div>
                  <button type="button" class="font-semibold text-indigo-600 hover:text-indigo-700"
                    @click="editing.last_name = true">
                    <?php echo __('Update', 'wpstorm-theme'); ?>
                  </button>
                </div>
              </template>
              <template x-if="editing.last_name">
                <div class="flex justify-between gap-x-6 w-full">
                  <input type="text"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    x-model="fields.last_name" x-trap="editing.last_name" />
                  <div class="flex justify-end gap-x-4 ">
                    <button type="button"
                      class="font-semibold text-green-600 hover:text-green-700 bg-green-50 px-4 py-2 hover:shadow-md rounded-lg"
                      @click="saveChanges('last_name')">
                      <?php echo __('Save', 'wpstorm-theme'); ?>
                    </button>
                    <button type="button"
                      class="font-semibold text-rose-600 hover:text-rose-700 bg-rose-50  px-4 py-2 hover:shadow-md rounded-lg"
                      @click="editing.last_name = false">
                      <?php echo __('Cancel', 'wpstorm-theme'); ?>
                    </button>
                  </div>

                </div>
              </template>
            </dd>
          </div>

          <!-- Display Name -->
          <div class="pt-6 sm:flex">
            <dt class="font-medium text-gray-900 sm:w-64 sm:flex-none sm:pr-6">
              <?php echo __('Display name', 'wpstorm-theme'); ?>
            </dt>
            <dd class="mt-1 flex justify-between gap-x-6 sm:mt-0 sm:flex-auto">
              <template x-if="!editing.name">
                <div class="flex justify-between gap-x-6 w-full">
                  <div class="text-gray-900" x-text="fields.name"></div>
                  <button type="button" class="font-semibold text-indigo-600 hover:text-indigo-700"
                    @click="editing.name = true">
                    <?php echo __('Update', 'wpstorm-theme'); ?>
                  </button>
                </div>
              </template>
              <template x-if="editing.name">
                <div class="flex justify-between gap-x-6 w-full">
                  <input type="text"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    x-model="fields.name" x-trap="editing.name" />
                  <div class="flex justify-end gap-x-4 ">
                    <button type="button"
                      class="font-semibold text-green-600 hover:text-green-700 bg-green-50 px-4 py-2 hover:shadow-md rounded-lg"
                      @click="saveChanges('name')">
                      <?php echo __('Save', 'wpstorm-theme'); ?>
                    </button>
                    <button type="button"
                      class="font-semibold text-rose-600 hover:text-rose-700 bg-rose-50  px-4 py-2 hover:shadow-md rounded-lg"
                      @click="editing.name = false">
                      <?php echo __('Cancel', 'wpstorm-theme'); ?>
                    </button>
                  </div>
                </div>
              </template>
            </dd>
          </div>

          <!-- Email -->
          <div class="pt-6 sm:flex">
            <dt class="font-medium text-gray-900 sm:w-64 sm:flex-none sm:pr-6">
              <?php echo __('Email', 'wpstorm-theme'); ?>
            </dt>
            <dd class="mt-1 flex justify-between gap-x-6 sm:mt-0 sm:flex-auto">
              <template x-if="!editing.email">
                <div class="flex justify-between gap-x-6 w-full">
                  <div class="text-gray-900" x-text="fields.email"></div>
                  <button type="button" class="font-semibold text-indigo-600 hover:text-indigo-700"
                    @click="editing.email = true">
                    <?php echo __('Update', 'wpstorm-theme'); ?>
                  </button>
                </div>
              </template>
              <template x-if="editing.email">
                <div class="flex justify-between gap-x-6 w-full">
                  <input type="email"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    x-model="fields.email" x-trap="editing.email" />
                  <div class="flex justify-end gap-x-4 ">
                    <button type="button"
                      class="font-semibold text-green-600 hover:text-green-700 bg-green-50 px-4 py-2 hover:shadow-md rounded-lg"
                      @click="saveChanges('email')">
                      <?php echo __('Save', 'wpstorm-theme'); ?>
                    </button>
                    <button type="button"
                      class="font-semibold text-gray-600 hover:text-gray-700 bg-gray-50  px-4 py-2 hover:shadow-md rounded-lg"
                      @click="editing.email = false">
                      <?php echo __('Cancel', 'wpstorm-theme'); ?>
                    </button>
                  </div>
                </div>
              </template>
            </dd>
          </div>

          <!-- Description -->
          <div class="pt-6 sm:flex">
            <dt class="font-medium text-gray-900 sm:w-64 sm:flex-none sm:pr-6">
              <?php echo __('Description', 'wpstorm-theme'); ?>
            </dt>
            <dd class="mt-1 flex justify-between gap-x-6 sm:mt-0 sm:flex-auto">
              <template x-if="!editing.description">
                <div class="flex justify-between gap-x-6 w-full">
                  <div class="text-gray-900" x-text="fields.description"></div>
                  <button type="button" class="font-semibold text-indigo-600 hover:text-indigo-700"
                    @click="editing.description = true">
                    <?php echo __('Update', 'wpstorm-theme'); ?>
                  </button>
                </div>
              </template>
              <template x-if="editing.description">
                <div class="flex justify-between gap-x-6 w-full">
                  <textarea
                    class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 w-full h-24"
                    x-model="fields.description" x-trap="editing.description"></textarea>
                  <div class="flex justify-end gap-x-4 ">
                    <button type="button"
                      class="font-semibold text-green-600 hover:text-green-700 bg-green-50 px-4 py-2 hover:shadow-md rounded-lg"
                      @click="saveChanges('description')">
                      <?php echo __('Save', 'wpstorm-theme'); ?>
                    </button>
                    <button type="button"
                      class="font-semibold text-gray-600 hover:text-gray-700 bg-gray-50  px-4 py-2 hover:shadow-md rounded-lg"
                      @click="editing.description = false">
                      <?php echo __('Cancel', 'wpstorm-theme'); ?>
                    </button>
                  </div>
                </div>
              </template>
            </dd>
          </div>

        </dl>
      </div>
    </div>

    <!-- Security Settings -->
    <div x-cloak x-show="section === 'security'"
      class="mx-auto max-w-2xl space-y-16 sm:space-y-20 lg:mx-0 lg:max-w-none">
      <div>
        <h2 class="text-base font-semibold leading-7 text-gray-900">
          <?php echo __('Security Settings', 'wpstorm-theme'); ?> </h2>
        <p class="mt-1 text-sm leading-6 text-gray-700">
          <?php echo __('Update your account\'s security settings.', 'wpstorm-theme'); ?>
        </p>
        <!-- Security Information Fields -->
        <dl class="mt-6 space-y-6 divide-y divide-gray-100 border-t border-gray-200 text-sm leading-6">

          <!-- Change Password -->
          <div class="pt-6 sm:flex">
            <dt class="font-medium text-gray-900 sm:w-64 sm:flex-none sm:pr-6">
              <?php echo __('Change Password', 'wpstorm-theme'); ?>
            </dt>
            <dd class="mt-1 flex flex-col gap-y-4 sm:mt-0 sm:flex-auto"
              x-data="passwordChange('<?php echo $user->ID ?>')">
              <form @submit.prevent="changePassword">
                <div class="flex flex-col gap-y-2">
                  <label for="current_password"
                    class="block text-gray-700"><?php echo __('Current Password', 'wpstorm-theme'); ?></label>
                  <input type="text" id="current_password" x-model="currentPassword"
                    class="text-gray-900 border border-gray-300 rounded p-2" required>
                </div>
                <div class="flex flex-col gap-y-2 mt-2">
                  <label for="new_password"
                    class="block text-gray-700"><?php echo __('New Password', 'wpstorm-theme'); ?></label>
                  <input type="text" id="new_password" x-model="newPassword"
                    class="text-gray-900 border border-gray-300 rounded p-2" required>
                </div>
                <div class="flex flex-col gap-y-2 mt-2">
                  <label for="confirm_password"
                    class="block text-gray-700"><?php echo __('Confirm New Password', 'wpstorm-theme'); ?></label>
                  <input type="text" id="confirm_password" x-model="confirmPassword"
                    class="text-gray-900 border border-gray-300 rounded p-2" required>
                </div>
                <div class="flex flex-row gap-x-4 mt-4 justify-end">
                  <button type="submit"
                    class="font-semibold text-green-600 hover:text-green-700 bg-green-50 px-4 py-2 hover:shadow-md rounded-lg"><?php echo __('Change Password', 'wpstorm-theme'); ?></button>
                  <button type="button" @click="resetForm"
                    class="font-semibold text-gray-600 hover:text-gray-700 bg-gray-50  px-4 py-2 hover:shadow-md rounded-lg"><?php echo __('Cancel', 'wpstorm-theme'); ?></button>
                </div>
              </form>
            </dd>
          </div>

          <!-- Delete Account -->
          <div class="pt-6 sm:flex" x-data="deleteUserAccount('<?php echo $user->ID ?>')">
            <dt class="font-medium text-gray-900 sm:w-64 sm:flex-none sm:pr-6">
              <?php echo __('Delete Account', 'wpstorm-theme'); ?>
            </dt>
            <dd class="mt-1 flex flex-col gap-y-4 sm:mt-0 sm:flex-auto">
              <form @submit.prevent="deleteAccount">
                <div class="flex flex-row gap-x-2">
                  <input type="checkbox" id="delete_account" class="text-gray-900 border border-gray-300 rounded p-2"
                    required>
                  <label for="delete_account"
                    class="block text-gray-700"><?php echo __('Delete Account', 'wpstorm-theme'); ?></label>
                </div>
                <div class="flex flex-col gap-y-2 mt-2">
                  <label for="password"
                    class="block text-gray-700"><?php echo __('Password', 'wpstorm-theme'); ?></label>
                  <input type="text" id="password" x-model="password"
                    class="text-gray-900 border border-gray-300 rounded p-2">
                </div>
                <div class="flex flex-row gap-x-4 mt-4 justify-end">
                  <!-- TODO: Confirm before delete -->
                  <button type="submit"
                    class="font-semibold text-rose-600 hover:text-rose-700 bg-rose-50 px-4 py-2 hover:shadow-md rounded-lg"><?php echo __('Delete Account', 'wpstorm-theme'); ?></button>
                </div>
              </form>
            </dd>
          </div>



        </dl>
      </div>
    </div>

    <!-- Create New Post -->
    <?php if (current_user_can('edit_posts')) : ?>
    <div x-cloak x-show="section === 'create-post'"
      class="mx-auto max-w-2xl space-y-16 sm:space-y-20 lg:mx-0 lg:max-w-none" x-data="createPost()">
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
              <textarea id="text-editor" class="text-gray-900 border border-gray-300 rounded p-2 w-full"
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
    <div x-cloak x-show="section.startsWith('edit-post?id=')"
      class="mx-auto max-w-2xl space-y-16 sm:space-y-20 lg:mx-0 lg:max-w-none">
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


  </main>
</div>