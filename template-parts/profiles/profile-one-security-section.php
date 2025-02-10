<?php
?>

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
          <form @submit.prevent="showConfirmationDialog = true">
            <div class="flex flex-col gap-y-2 mt-2">
              <label for="password"
                class="block text-gray-700"><?php echo __('Enter your password to confirm', 'wpstorm-theme'); ?></label>
              <input type="text" id="password" x-model="password" required
                class="text-gray-900 border border-gray-300 rounded p-2">
            </div>
            <div class="flex flex-row gap-x-4 mt-4 justify-end">
                <button type="submit" :disabled="!password"
                class="font-semibold text-rose-600 hover:text-rose-700 bg-rose-50 px-4 py-2 hover:shadow-md rounded-lg"
                :class="{'opacity-50 cursor-not-allowed': !password}">
                  <?php echo __('Delete Account', 'wpstorm-theme'); ?>
                </button>
            </div>
          </form>
        </dd>

        <!-- Delete Account confirmation dialog -->
        <template x-if="showConfirmationDialog">
          <div class="fixed inset-0 z-10 overflow-y-auto bg-gray-900/50" x-show="showConfirmationDialog">
            <div class="flex items-center justify-center min-h-screen px-4 text-center sm:block sm:p-0">
              <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
              </div>
              <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
              <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                  <div class="sm:flex sm:items-start">
                    <div
                      class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-rose-100 sm:mx-0 sm:h-10 sm:w-10">
                      <?php echo Wpstorm_Helpers::get_svg_icon('exclamation', 'h-6 w-6 text-rose-600',); ?>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                      <h3 class="text-lg font-semibold leading-6 text-gray-900" id="modal-headline">
                        <?php echo __('Delete Account', 'wpstorm-theme'); ?>
                      </h3>
                      <div class="mt-2">
                        <p class="text-sm text-gray-500">
                          <?php echo __('Are you sure you want to delete your account? All of your data will be permanently removed. This action cannot be undone.', 'wpstorm-theme'); ?>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="bg-gray-50 gap-x-4 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                  <button type="button" @click="deleteAccount"
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-rose-600 text-base font-medium text-white hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 sm:ml-3 sm:w-auto sm:text-sm">
                    <?php echo __('Delete', 'wpstorm-theme'); ?>
                  </button>
                    <button type="button" @click="showConfirmationDialog = false; password = ''; message = ''; messageStatus = '';"
                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                    <?php echo __('Cancel', 'wpstorm-theme'); ?>
                    </button>
                </div>
                <!-- Show sucess or error message -->
                <div x-show="message" x-text="message"
                class="border-l-4 p-4 mt-4" x-transition
                :class="{'bg-green-50 border-green-400': messageStatus === 'success' , 'bg-rose-50 border-rose-400': messageStatus === 'error'}">
                >
                </div>
              </div>
            </div>
          </div>
        </template>
      </div>

    </dl>
  </div>
</div>