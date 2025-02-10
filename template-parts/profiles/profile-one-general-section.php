<?php 
?>
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