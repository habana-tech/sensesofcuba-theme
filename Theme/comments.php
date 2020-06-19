<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Theme
 
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
 
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="container ">
 
	<div class="col-md-8 mx-auto">
        <?php if ( have_comments() ) : ?>
            <h2 class="comments-title">
                <?php
                $comments_number = get_comments_number();
                if ( '1' === $comments_number &&  comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) {
                    /* translators: %s: post title */
                    echo '<h2 class="container pt-5">Comments</h2>';
                } else {
                    if ( comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) {
                        printf(
                        /* translators: 1: number of comments, 2: post title */
                            _nx(
                                '<h2 class="container pt-5">%1$s thought on &ldquo;%2$s&rdquo;</h2>',
                                '<h2 class="container pt-5">%1$s thought on &ldquo;%2$s&rdquo;</h2>',
                                $comments_number,
                                'comments title',
                                'twentyfifteen'
                            ),
                            number_format_i18n( $comments_number ),
                            "Comments"
                        /*get_the_title()*/
                        );
                    }
                }
                ?>
            </h2>

            <?php
            // If comments are closed and there are comments, let's leave a little note, shall we?
            if ( comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
                ?>


                <div class="container">
                    <ul class="comment-list">
                        <?php
                        wp_list_comments( array(
                            'style'       => 'ul',
                            'short_ping'  => false,
                            'avatar_size' => 56,
                        ) );
                        ?>
                    </ul><!-- .comment-list -->
                </div>


            <?php endif; ?>


        <?php endif; // have_comments() ?>



        <div class="container pt-5">

            <?php
            $commenter = wp_get_current_commenter();
            $req = get_option( 'require_name_email' );
            $aria_req = ( $req ? " aria-required='true'" : '' );
            $fields =  array(

                'author' =>'<p class="comment-form-author"><label for="author">' . __( 'Name', 'domainreference' ) .
                    ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
                    '<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                    '" size="30"' . $aria_req . ' /></p>',

                'email' =>
                    '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) .
                    ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
                    '<input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                    '" size="30"' . $aria_req . ' /></p>',

                'url' =>
                    '<p class="comment-form-url"><label for="url">' . __( 'Website', 'domainreference' ) . '</label>' .
                    '<input id="url" class="form-control" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
                    '" size="30" /></p>'
            );
            $comments_args = array(
                'id_form'           => 'commentform',
                'class_form'      => 'comment-form',
                'id_submit'         => 'submit',
                'class_submit'      => 'btn btn-warning',
                'name_submit'       => 'submit',
                'title_reply'       => __( 'Leave a Reply' ),
                'title_reply_to'    => __( 'Leave a Reply to %s' ),
                'cancel_reply_link' => __( 'Cancel Reply' ),
                'label_submit'      => __( 'Post Comment' ),
                'format'            => 'xhtml',

                'comment_notes_before' => '<p class="alert alert-info">' .
                    __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) .
                    '</p>',

                // change the title of send button
                'label_submit'=>'SEND',
                // change the title of the reply section
                'title_reply'=>'Write a Reply or Comment',
                // remove "Text or HTML to be displayed after the set of comment fields"
                'comment_notes_after' => '',
                // redefine your own textarea (the comment body)
                'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><br /><textarea class="form-control" id="comment" name="comment" aria-required="true"></textarea></p>',
                'fields' => apply_filters( 'comment_form_default_fields', $fields )

            );


            ?>
            <?php comment_form($comments_args); ?>
        </div>
    </div>
</div><!-- .comments-area -->
