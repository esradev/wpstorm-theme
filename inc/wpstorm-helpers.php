<?php

/**
 * Wpstorm_Theme_Helpers
 *
 * @since 1.0.0
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

class Wpstorm_Helpers
{
    /**
     * Instance
     *
     * @access private
     * @var object Class object.
     * @since 1.0.0
     */
    private static $instance;

    /**
     * Initiator
     *
     * @return object Initialized object of class.
     * @since 1.0.0
     */
    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        
    }

    public static function get_svg_icon($icon_name, $class = '') {
      $icon_path = get_template_directory() . '/assets/icons/' . $icon_name . '.svg';
      
      if (file_exists($icon_path)) {
          $version = filemtime($icon_path);
          $icon_content = file_get_contents($icon_path);
          $icon_content .= '<!-- SVG Icon version: ' . $version . ' -->';

          // Add class to the SVG tag
          $icon_content = preg_replace('/<svg /', '<svg class="' . esc_attr($class) . '" ', $icon_content, 1);
          return $icon_content;
      } else {
          return '<!-- SVG Icon not found: ' . esc_html($icon_name) . ' -->';
      }
    }

    public static function list_comments($comment, $args, $depth) {
        $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

        // Check if the comment is approved
        $is_approved = $comment->comment_approved == '1';

        // Check if the comment has replies
        $has_replies = !empty(get_comments(array(
            'parent' => $comment->comment_ID,
            'count' => true
        )));        

        // Define styles for different depths
        $comment_classes = 'comment-item relative flex gap-x-4 px-4';
        $comment_with_replies_classes = 'reply-item relative flex gap-x-4 px-4';
        $unapproved_comment_classes = 'comment-item relative flex gap-x-4 px-4';
        $unapproved_reply_classes = [
            1 => 'reply-item relative flex gap-x-4 mr-6 mb-6 border-r-4 border-yellow-600 px-4',
            2 => 'reply-item relative flex gap-x-4 mr-8 mb-6 border-r-4 border-yellow-600 px-4',
            3 => 'reply-item relative flex gap-x-4 mr-12 mb-6 border-r-4 border-yellow-600 px-4',
            4 => 'reply-item relative flex gap-x-4 mr-16 mb-6 border-r-4 border-yellow-600 px-4',
        ];

        $reply_classes = [
            1 => 'reply-item relative flex gap-x-4 mr-6 mb-6 px-4 border-r-2 border-green-600',
            2 => 'reply-item relative flex gap-x-4 mr-8 mb-6 px-4 border-r-2 border-green-600',
            3 => 'reply-item relative flex gap-x-4 mr-12 mb-6 px-4 border-r-2 border-green-600',
            4 => 'reply-item relative flex gap-x-4 mr-16 mb-6 px-4 border-r-2 border-green-600',
        ];

          // Determine the classes to use
         // Determine the classes to use
        if (!$is_approved) {
            $classes = $depth > 1 ? (isset($unapproved_reply_classes[$depth]) ? $unapproved_reply_classes[$depth] : $unapproved_reply_classes[2])  : $unapproved_reply_classes[2] ;
        } else {
            $classes = $depth > 1 ? (isset($reply_classes[$depth]) ? $reply_classes[$depth] : $reply_classes[2]) : ($has_replies ? $comment_with_replies_classes : $comment_classes);
        }
        ?>
<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $classes ); ?>>
  <?php if (0 != $args['avatar_size']) echo get_avatar($comment, $args['avatar_size'], '', '', array('class' => 'relative mt-3 h-8 w-8 flex-none rounded-full bg-gray-50')); ?>
  <div class="comment-content flex-auto rounded-md p-3 ring-1 ring-inset ring-gray-200">
    <div class="comment-author flex justify-between gap-x-4">
      <span class="py-0.5 text-xs leading-5 text-gray-500"><?php echo get_comment_author_link(); ?></span>
      <time class="flex-none py-0.5 text-xs leading-5 text-gray-500"><?php echo get_comment_date(); ?> at
        <?php echo get_comment_time(); ?></time>
    </div>
    <p class="comment-text text-sm leading-6 text-gray-500">
      <?php comment_text(); ?>
    </p>
  </div>
  <div class="flex items-end mr-auto">
    <div class="rounded bg-indigo-50 px-2 py-1 text-sm font-medium text-indigo-600 shadow-sm hover:bg-indigo-100">
      <?php
                    comment_reply_link(array_merge($args, array(
                        'add_below' => 'comment',
                        'depth' => $depth,
                        'max_depth' => $args['max_depth'],
                        'reply_text' => __('Reply', 'text-domain'),
                    )));
                    ?>
    </div>
  </div>
</<?php echo $tag; ?>>
<?php
    }

    // return all post by author id as json
    public static function get_posts_by_author($author_id) {
      // Get the current user
      $current_user = wp_get_current_user();

      // Define the query parameters based on current user
      $args = array(
          'post_type' => 'post', // Change this if you want to query a different post type
          'author'    => $current_user->ID,
          'posts_per_page' => -1, // Get all posts
      );

      // Create a new query
      $user_posts_query = new WP_Query($args);

      // Check if there are posts
      if ($user_posts_query->have_posts()) {
          $posts_data = [];
          while ($user_posts_query->have_posts()) : $user_posts_query->the_post();
              $posts_data[] = [
                  'id'      => get_the_ID(),
                  'title'   => get_the_title(),
                  'excerpt' => get_the_excerpt(),
              ];
          endwhile;

          // Restore original post data
          wp_reset_postdata();

          return $posts_data;
      } else {
          return [];
      }
    }

}

Wpstorm_Helpers::get_instance();