<?php 
$wc_orders = wc_get_orders([
  'customer' => get_current_user_id(),
  'limit' => 5,
  'orderby' => 'date',
  'order' => 'DESC',
]);
//TODO: Fix the orders data to be used in the template
?> 

<!-- Orders -->
<div x-cloak x-show="section === 'orders'" class="mx-auto max-w-2xl space-y-16 sm:space-y-20 lg:mx-0 lg:max-w-none">
  <div x-data="{ orders: <?php echo htmlspecialchars(wp_json_encode($wc_orders), ENT_QUOTES, 'UTF-8'); ?> }">
    <h2 class="text-base font-semibold leading-7 text-gray-900">
      <?php echo __('Orders', 'wpstorm-theme'); ?>
    </h2>
    <p class="mt-1 text-sm leading-6 text-gray-700">
      <?php echo __('View your recent orders.', 'wpstorm-theme'); ?>
    </p>
    <!-- Orders Table -->
    <table class="mt-6 w-full border-t border-gray-200 text-sm leading-6" x-show="orders.length > 0">
      <thead>
        <tr>
          <th class="text-right font-medium text-gray-900 py-2 pl-6">Order</th>
          <th class="text-right font-medium text-gray-900 py-2 pl-6">Date</th>
          <th class="text-left font-medium text-gray-900 py-2 pl-6">Actions</th>
        </tr>
      </thead>
      <tbody>
        <template x-for="order in orders" :key="order.id">
          <tr>
            <td class="py-2 pl-6" x-text="'#' + (order.get_order_number ? order.get_order_number() : order.id)"></td>
            <td class="py-2 pl-6" x-text="order.get_date_created ? order.get_date_created().format('F j, Y') : 'N/A'"></td>
            <td class="py-2 pl-6 flex justify-end gap-x-2">
              <!-- View Button -->
              <a type="button"
                class="inline-flex items-center font-semibold text-green-600 hover:text-green-700 bg-green-50 p-2 hover:shadow-md rounded-lg"
                :href="order.get_view_order_url ? order.get_view_order_url() : '#'" target="_blank">
                <?php echo Wpstorm_Helpers::get_svg_icon('eye', 'h-5 w-5',); ?>
                <span class="sr-only"><?php echo __('View', 'wpstorm-theme'); ?></span>
              </a>
            </td>
          </tr>
        </template>
      </tbody>
    </table>
    <!-- Empty orders message -->
    <template x-if="orders.length === 0">
      <div class="py-2 pl-6" colspan="3">
        <div class="text-center">
          <?php echo Wpstorm_Helpers::get_svg_icon('document-plus', 'mx-auto h-12 w-12 text-gray-400',); ?>
          <h3 class="mt-2 text-sm font-semibold text-gray-900">No orders</h3>
          <p class="mt-1 text-sm text-gray-500">You have no recent orders.</p>
        </div>
      </div>
    </template>
  </div>
</div>
<?php
