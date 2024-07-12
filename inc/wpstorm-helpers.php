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

        // Define styles for different depths TODO: Update css classes for more good design.
        $comment_classes = 'comment-item flex gap-x-4 py-4 border-gray-300';
        $comment_with_replies_classes = 'reply-item flex gap-x-4 p-4 bg-gray-100';
        $unapproved_comment_classes = 'comment-item flex space-x-4 py-4 border-b border-gray-300 bg-yellow-50 text-yellow-700';
        $unapproved_reply_classes = 'reply-item flex bg-gray-50 mr-4 p-4 border-r-4 border-rose-300';

        $reply_classes = [
            1 => 'reply-item flex bg-gray-50 mr-4 p-4 border-r-4 border-gray-300',
            2 => 'reply-item flex bg-gray-50 mr-8 p-4 border-r-4 border-gray-300',
            3 => 'reply-item flex bg-gray-50 mr-12 p-4 border-r-4 border-gray-300'
        ];

          // Determine the classes to use
         // Determine the classes to use
        if (!$is_approved) {
            $classes = $depth > 1 ? $unapproved_reply_classes : $unapproved_comment_classes;
        } else {
            $classes = $depth > 1 ? (isset($reply_classes[$depth]) ? $reply_classes[$depth] : $reply_classes[2]) : ($has_replies ? $comment_with_replies_classes : $comment_classes);
        }
        ?>
<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $classes ); ?>>
  <?php if (0 != $args['avatar_size']) echo get_avatar($comment, $args['avatar_size'], '', '', array('class' => 'h-12 w-12 rounded-full ring-4 ring-white')); ?>
  <div class="comment-content flex ">
    <div class="comment-author mb-2 flex flex-col ">
      <span class="font-bold"><?php echo get_comment_author_link(); ?></span>
      <span class="text-gray-500 text-sm ml-2"><?php echo get_comment_date(); ?> at
        <?php echo get_comment_time(); ?></span>
      <div class="comment-text mb-2">
        <?php comment_text(); ?>
      </div>
    </div>
  </div>
  <div class="flex items-end mr-auto">
    <div class="rounded bg-indigo-50 px-2 py-1 text-sm font-semibold text-indigo-600 shadow-sm hover:bg-indigo-100">
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


}

Wpstorm_Helpers::get_instance();