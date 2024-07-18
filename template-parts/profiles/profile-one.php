<?php 
$user = wp_get_current_user();
?>

<div x-data="{ section: 'general' }" class="mx-auto max-w-7xl lg:flex lg:gap-x-16 lg:px-8">
  <aside
    class="flex overflow-x-auto border-b border-gray-900/5 py-4 lg:block lg:w-64 lg:flex-none lg:border-0 lg:py-20">
    <nav class="flex-none px-4 sm:px-6 lg:px-0">
      <ul role="list" class="flex gap-x-3 gap-y-1 whitespace-nowrap lg:flex-col">
        <li>
          <a @click.prevent="section = 'general'"
            :class="{'bg-gray-50 text-indigo-600': section === 'general', 'text-gray-700 hover:text-indigo-600 hover:bg-gray-50': section !== 'general'}"
            class="group flex gap-x-3 rounded-md py-2 pl-2 pr-3 text-sm leading-6 font-semibold">
            <?php
            echo Wpstorm_Helpers::get_svg_icon('user-circle', 'h-6 w-6 shrink-0', '', 'section === \'general\' ? \'text-indigo-600\' : \'text-gray-400\'');
            echo __('General', 'wpstorm-theme') ?>
          </a>
        </li>
        <li>
          <a @click.prevent="section = 'security'"
            :class="{'bg-gray-50 text-indigo-600': section === 'security', 'text-gray-700 hover:text-indigo-600 hover:bg-gray-50': section !== 'security'}"
            class="group flex gap-x-3 rounded-md py-2 pl-2 pr-3 text-sm leading-6 font-semibold">
            <?php
            echo Wpstorm_Helpers::get_svg_icon('shield-check', 'h-6 w-6 shrink-0', '', 'section === \'security\' ? \'text-indigo-600\' : \'text-gray-400\'');
            echo __('Security', 'wpstorm-theme') ?>
          </a>
        </li>
      </ul>
    </nav>
  </aside>

  <main class="px-4 py-16 sm:px-6 lg:flex-auto lg:px-0 lg:py-20">
    <div x-show="section === 'general'" class="mx-auto max-w-2xl space-y-16 sm:space-y-20 lg:mx-0 lg:max-w-none">
      <div>
        <h2 class="text-base font-semibold leading-7 text-gray-900">
          <?php echo __('Profile Information', 'wpstorm-theme'); ?> </h2>
        <p class="mt-1 text-sm leading-6 text-gray-500">
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
                  <button type="button" class="font-semibold text-indigo-600 hover:text-indigo-500"
                    @click="editing.first_name = true">
                    <?php echo __('Update', 'wpstorm-theme'); ?>
                  </button>
                </div>
              </template>
              <template x-if="editing.first_name">
                <div class="flex justify-between gap-x-6 w-full">
                  <input type="text" class="text-gray-900 border border-gray-300 rounded p-2"
                    x-model="fields.first_name" x-trap="editing.first_name" />
                  <div class="flex justify-end gap-x-4 ">
                    <button type="button" class="font-semibold text-green-600 hover:text-green-500"
                      @click="saveChanges('first_name')">
                      <?php echo __('Save', 'wpstorm-theme'); ?>
                    </button>
                    <button type="button" class="font-semibold text-rose-600 hover:text-rose-500"
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
                  <button type="button" class="font-semibold text-indigo-600 hover:text-indigo-500"
                    @click="editing.last_name = true">
                    <?php echo __('Update', 'wpstorm-theme'); ?>
                  </button>
                </div>
              </template>
              <template x-if="editing.last_name">
                <div class="flex justify-between gap-x-6 w-full">
                  <input type="text" class="text-gray-900 border border-gray-300 rounded p-2" x-model="fields.last_name"
                    x-trap="editing.last_name" />
                  <div class="flex justify-end gap-x-4 ">
                    <button type="button" class="font-semibold text-green-600 hover:text-green-500"
                      @click="saveChanges('last_name')">
                      <?php echo __('Save', 'wpstorm-theme'); ?>
                    </button>
                    <button type="button" class="font-semibold text-rose-600 hover:text-rose-500"
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
                  <button type="button" class="font-semibold text-indigo-600 hover:text-indigo-500"
                    @click="editing.name = true">
                    <?php echo __('Update', 'wpstorm-theme'); ?>
                  </button>
                </div>
              </template>
              <template x-if="editing.name">
                <div class="flex justify-between gap-x-6 w-full">
                  <input type="text" class="text-gray-900 border border-gray-300 rounded p-2" x-model="fields.name"
                    x-trap="editing.name" />
                  <div class="flex justify-end gap-x-4 ">
                    <button type="button" class="font-semibold text-green-600 hover:text-green-500"
                      @click="saveChanges('name')">
                      <?php echo __('Save', 'wpstorm-theme'); ?>
                    </button>
                    <button type="button" class="font-semibold text-rose-600 hover:text-rose-500"
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
                  <button type="button" class="font-semibold text-indigo-600 hover:text-indigo-500"
                    @click="editing.email = true">
                    <?php echo __('Update', 'wpstorm-theme'); ?>
                  </button>
                </div>
              </template>
              <template x-if="editing.email">
                <div class="flex justify-between gap-x-6 w-full">
                  <input type="email" class="text-gray-900 border border-gray-300 rounded p-2" x-model="fields.email"
                    x-trap="editing.email" />
                  <div class="flex justify-end gap-x-4 ">
                    <button type="button" class="font-semibold text-green-600 hover:text-green-500"
                      @click="saveChanges('email')">
                      <?php echo __('Save', 'wpstorm-theme'); ?>
                    </button>
                    <button type="button" class="font-semibold text-rose-600 hover:text-rose-500"
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
                  <button type="button" class="font-semibold text-indigo-600 hover:text-indigo-500"
                    @click="editing.description = true">
                    <?php echo __('Update', 'wpstorm-theme'); ?>
                  </button>
                </div>
              </template>
              <template x-if="editing.description">
                <div class="flex justify-between gap-x-6 w-full">
                  <textarea class="text-gray-900 border border-gray-300 rounded p-2 w-full h-24"
                    x-model="fields.description" x-trap="editing.description"></textarea>
                  <div class="flex justify-end gap-x-4 ">
                    <button type="button" class="font-semibold text-green-600 hover:text-green-500"
                      @click="saveChanges('description')">
                      <?php echo __('Save', 'wpstorm-theme'); ?>
                    </button>
                    <button type="button" class="font-semibold text-rose-600 hover:text-rose-500"
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

    <div x-show="section === 'security'" class="mx-auto max-w-2xl space-y-16 sm:space-y-20 lg:mx-0 lg:max-w-none">
      <div>
        <h2 class="text-base font-semibold leading-7 text-gray-900">
          <?php echo __('Security Settings', 'wpstorm-theme'); ?> </h2>
        <p class="mt-1 text-sm leading-6 text-gray-500">
          <?php echo __('Update your account\'s security settings.', 'wpstorm-theme'); ?>
        </p>
        <!-- Security Information Fields -->
        <!-- Add your fields here -->
      </div>
    </div>
  </main>
</div>