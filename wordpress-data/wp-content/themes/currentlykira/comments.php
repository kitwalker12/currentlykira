<!-- comments -->
<?php if ( 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) return; ?>
<section id="comments">
  <div class="row comments entry-social">
    <div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-layout="button" data-size="small" data-mobile-iframe="true"></div>
    <a class="twitter-share-button" href="https://twitter.com/intent/tweet">Tweet</a>
  </div>
  <div class="row comments">
    <div class="column comments-count">
      <?php if (condition): ?>
        COMMENTS(<?php comments_number('0', '1', '%') ?>)
      <?php endif ?>
    </div>
  </div>
  <div class="row comments">
    <div class="column">
      <?php if (comments_open()): ?>
        <?php
          $fields =  array(
            'author' =>
              '<div class="row"><div class="column column-50"><p class="comment-form-author"><label for="author">' . __( 'Name', 'domainreference' ) .
                ( $req ? '&#42;' : '' ) . '</label> ' .
              '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
              '" size="30"' . $aria_req . ' /></p></div>',

            'email' =>
              '<div class="column column-50"><p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) .
                ( $req ? '&#42;' : '' ) . '</label> ' .
              '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
              '" size="30"' . $aria_req . ' /></p></div></div>',

            'url' => '',
          );
          $custom_args = array(
            'title_reply'       => __( '' ),
            'title_reply_to'    => __( '' ),
            'cancel_reply_link' => __( 'CANCEL REPLY' ),
            'label_submit'      => __( 'POST COMMENT...' ),

            'comment_field' =>  '<p class="comment-form-comment">' .
              '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
              '</textarea></p>',

            'must_log_in' => '',
            'logged_in_as' => '',
            'comment_notes_before' => '',
            'comment_notes_after' => '',
            'fields' => $fields
          );
        ?>
        <?php comment_form($custom_args); ?>

      <?php endif ?>
    </div>
  </div>
  <?php
  if ( have_comments() ) :
    global $comments_by_type;
    $comments_by_type = &separate_comments( $comments );
    if ( ! empty( $comments_by_type['comment'] ) ) :
      ?>
      <section id="comments-list">
        <div class="row comments">
          <div class="column">
            <?php if ( get_comment_pages_count() > 1 ) : ?>
              <nav id="comments-nav-above" class="comments-navigation" role="navigation">
                <div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
              </nav>
            <?php endif; ?>
          </div>
        </div>
        <div class="row comments">
          <div class="column">
            <ul>
              <?php
                $custom_args = array(
                  'type'              => 'comment',
                  'reply_text'        => 'Reply',
                  'avatar_size'       => 32,
                  'reverse_top_level' => true
                )
              ?>
              <?php wp_list_comments( $custom_args ); ?>
            </ul>
          </div>
        </div>
        <div class="row comments">
          <div class="column">
            <?php if ( get_comment_pages_count() > 1 ) : ?>
              <nav id="comments-nav-below" class="comments-navigation" role="navigation">
                <div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
              </nav>
            <?php endif; ?>
          </div>
        </div>
      </section>
      <?php
    endif;
  endif;
  ?>
</section>
<!-- END comments -->
