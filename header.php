<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title><?php bloginfo('name');
        wp_title(); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <title><?php echo esc_html(wp_title()); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class('wpstorm-theme-tw-class'); ?>>

<?php get_template_part(Wpstorm_Templates::get_header_template()); ?>

