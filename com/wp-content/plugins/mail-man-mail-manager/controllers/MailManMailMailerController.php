<?php
/**
 * Mail Handler Controller
 *
 */
class MailManMailMailerController extends MailManController
{
    public static $Errors = [];
    /**
     * Creates a Post entry
     * This is used to copy the email sent by user
     * to the admin backend.
     * @return [type] [description]
     */
    public static function create($options) {
        // Setup the author, slug, and title for the post
        $author_ID = 1; // Admin
        $title     = $options->subject;
        $slug      = parent::$cpt_name_singular.'-'.date('Y-dd-i-s');
        $content   = $options->message;

        // Create post object
        $new_entry = array(
            'post_title'    => wp_strip_all_tags($title),
            'post_name'     => $slug,
            'post_content'  => $content,
            'post_status'   => 'unread',
            'post_author'   => $author_ID,
            'post_type'     => parent::$cpt_name_singular,
        );
        // Insert the post into the database
        // Set the post ID so that we know the post was created successfully
        $post_id = wp_insert_post( $new_entry );

        $mailman_options = [];
        $mailman_options['sender'] = $options->name;
        $mailman_options['sender_email'] = $options->email;
        update_post_meta($post_id, 'mailman_options', $mailman_options);

        $mailman_desc = [];
        $mailman_desc = $content;
        update_post_meta($post_id, 'mailmandescriptioneditor', $mailman_desc);

    }


    public function prompt($type='', $message='', $title='', $php_only=true)
    {
        ob_start(); ?>
        <div class="alert message-prompt-fixed-container">
            <?php include_once(MAIL_MAN_DIR_VIEWS . 'partials/alert.php'); ?>
        </div> <?php
        return ob_get_clean();
    }

}

?>