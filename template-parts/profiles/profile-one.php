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
  
  <!-- Sidebar -->
   <?php
    require_once 'profile-one-sidebar.php';
   ?>

  <main class="px-4 py-16 sm:px-6 lg:flex-auto lg:px-0 lg:py-20">

    <!-- Sections -->
    <?php 
      require_once 'profile-one-general-section.php';
      require_once 'profile-one-security-section.php';
      require_once 'profile-one-posts-section.php';
      require_once 'profile-one-not-found-section.php';
    ?>

  </main>
</div>