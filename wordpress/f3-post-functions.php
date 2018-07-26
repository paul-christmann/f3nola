<?php
function f3_post_title() {
  if ( is_single() ) { ?>
    <h1 class="entry-title"><?php the_title(); ?></h1>
  <?php } else { ?>
    <h2 class="entry-title">
      <a href="<?php the_permalink(); ?>"
         title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'iconic-one' ), the_title_attribute( 'echo=0' ) ) ); ?>"
         rel="bookmark"><?php the_title(); ?></a>
    </h2>
<?php
  };
}

function f3_table_row($title, $value) {
  return "<tr><td class='label' width=100><strong>" . $title . ":</strong></td><td class='value'>" . $value . "</td></tr>";
}

function f3_post_author_info() {
  if ( is_single() ||
       ( get_theme_mod( 'iconic_one_date_home' ) == '1' ) ) { //for date on single page ?>
    <div class="below-title-meta">
      <div class="adt">
		<?php _e('By','iconic-one'); ?>
        <span class="vcard author">
          <span class="fn">
            <?php echo the_author_posts_link(); ?>
          </span>
        </span>
        <span class="meta-sep">|</span>
        <span class="date updated"><?php echo get_the_date(); ?></span>
      </div>
      <div class="adt-comment">
        <a class="link-comments" href="<?php  comments_link(); ?>">
          <?php comments_number(__('0 Comment','iconic-one'),__('1 Comment','iconic-one'),__('% Comments','iconic-one')); ?>
        </a>
      </div>
    </div><!-- below title meta end -->
<?php
  }; // display meta-date on single page()
}

function f3_post_category_info() {
?>
  <div class="header-tags">
    <div class="f3nola_meta">
      <table>
        <tr><td class='label' width=100><strong>Categories:</strong></td><td class='value'><?php the_category(' '); ?></td></tr>
        <tr><td class='label' width=100><strong>Tags:</strong></td><td class='value'><?php the_tags(' '); ?></td></tr>
      </table>
    </div>
  </div>
<?php
}

function f3_meta_listitem ($post, $meta_key, $title) {
  $f3_mb_key="_f3nola_post_" . $meta_key;
  $f3_mb_value = get_post_meta($post->ID, $f3_mb_key, true);
  if ( !empty( $f3_mb_value) ) {
    return f3_table_row($title, $f3_mb_value);
  }
}

function f3_post_meta_tags($post) {
  $workout_date = f3_meta_listitem($post, "workout_date", "Date");
  $workout_qic = f3_meta_listitem($post, "qic", "QIC");
  $workout_pax = f3_meta_listitem($post, "pax", "PAX");
  if ( !empty($workout_date) || !empty($workout_qic) || !empty($workout_pax) ) {
?>
    <div class="f3nola_meta">
      <table>
        <?php echo $workout_date?>
        <?php echo $workout_qic?>
        <?php echo $workout_pax?>
      </table>
    </div>
<?php
  }
}
?>
