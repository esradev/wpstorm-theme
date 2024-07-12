<?php
// Ensure the file is not accessed directly
if (post_password_required()) {
    return;
}

if (have_comments()) : ?>
<div id="comments">
  <h2 class="text-2xl font-bold mb-4">
    <?php
            $comments_number = get_comments_number();
            if ($comments_number === '1') {
                printf(_x('One Comment', 'comments title', 'wpstorm-theme'));
            } else {
                printf(
                    _nx(
                        '%1$s Comment',
                        '%1$s Comments',
                        $comments_number,
                        'comments title',
                        'wpstorm-theme'
                    ),
                    number_format_i18n($comments_number)
                );
            }
            ?>
  </h2>
  <ol class="comment-list space-y-6">
    <?php
            wp_list_comments(array(
                'style' => 'ol',
                'short_ping' => true,
                'avatar_size' => 50,
                'callback' => [Wpstorm_Helpers::class, 'list_comments'],
            ));
            ?>
  </ol>

  <?php the_comments_navigation(); ?>

  <?php if (!comments_open()) : ?>
  <p class="no-comments"><?php esc_html_e('Comments are closed.', 'wpstorm-theme'); ?></p>
  <?php endif; ?>
</div>
<?php endif; ?>

<?php
comment_form(array(
    'class_form' => 'space-y-4 flex flex-col',
    'class_submit' => 'bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700',
    'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title text-xl font-semibold mb-4">',
    'title_reply_after' => '</h3>',
    'comment_field' => '<p class="comment-form-comment"><label for="comment" class="block mb-2">' . _x('Comment', 'noun') . '</label><textarea id="comment" name="comment" placeholder="Enter your comment here" class="w-full border border-gray-300 p-2 rounded" rows="4" aria-required="true"></textarea></p>',
    'fields' => array(
        'author' => '<div class="flex gap-x-4"><p class="comment-form-author w-1/3"><label for="author" class="block mb-2">' . __('Name', 'wpstorm-theme') . '</label><input id="author" name="author" type="text" placeholder="Enter your name" class="w-full border border-gray-300 p-2 rounded" value="" size="30" aria-required="true" /></p>',
        'url' => '<p class="comment-form-url w-1/3"><label for="url" class="block mb-2">' . __('Website', 'wpstorm-theme') . '</label><input id="url" name="url" type="url" placeholder="Enter your website url" class="w-full border border-gray-300 p-2 rounded" value="" size="30" /></p>',
        'email' => '<p class="comment-form-email w-1/3"><label for="email" class="block mb-2">' . __('Email', 'wpstorm-theme') . '</label><input id="email" name="email" type="email" placeholder="Enter your email" class="w-full border border-gray-300 p-2 rounded" value="" size="30" aria-required="true"/></p></div>',
    ),
));
?>