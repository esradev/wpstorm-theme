<?php 
$user = wp_get_current_user();

?>

<div x-data="profilePage" class="mx-auto max-w-7xl lg:flex lg:gap-x-16 lg:px-8">
  
  <!-- Sidebar -->
   <?php
    require_once 'profile-one-sidebar.php';
   ?>

  <main class="px-4 py-16 sm:px-6 lg:flex-auto lg:px-0 lg:py-20">
    <div x-show="section === 'general'" x-cloak>
        <?php require_once 'profile-one-general-section.php'; ?>
    </div>

    <div x-show="section === 'security'" x-cloak>
        <?php require_once 'profile-one-security-section.php'; ?>
    </div>

    <div x-show="section === 'posts' || section === 'create-post' || section === 'edit-post'" x-cloak>
        <?php require_once 'profile-one-posts-section.php'; ?>
    </div>

    <div x-show="!['general', 'security', 'posts', 'create-post', 'edit-post'].includes(section)" x-cloak>
        <?php require_once 'profile-one-not-found-section.php'; ?>
    </div>
</main>

</div>