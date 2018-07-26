<?php
/*
 * Content display template, used for both single and index/category/search pages.
 * Iconic One uses custom excerpts on search, home, category and tag pages.
 * File Last updated: Iconic One 1.7.2
 */
?>

<?php if ( is_sticky() && (true || is_home()) && ! is_paged() ) { // for top sticky post with blue border ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class('sticky'); ?>>
    <div class="featured-post">
      <?php _e( 'Featured Article', 'iconic-one' ); ?>
    </div>
<?php } else { ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php } ?>
  <header class="entry-header">
    <?php f3_post_title() ?>
    <?php f3_post_author_info() ?>
    <?php if( !is_home() ): ?>
      <?php f3_post_category_info() ?>
      <?php f3_post_meta_tags($post) ?>
    <?php endif; ?>
  </header><!-- .entry-header -->

  <?php if ( !is_single() && !is_sticky() ) { ?>
    <?php iconic_one_excerpts() ?>
  <?php } else { ?>
  <div class="entry-content">
    <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'iconic-one' ) ); ?>
    <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'iconic-one' ), 'after' => '</div>' ) ); ?>
  </div><!-- .entry-content -->
  <?php } ?>

  <footer class="entry-meta">
    <?php if ( is_home() && ( get_theme_mod( 'iconic_one_catg_home' , '1' ) == '1' ) ) { ?>
      <span><?php _e('Category:','iconic-one'); ?> <?php the_category(' '); ?></span>
    <?php } ?>
  <?php if ( is_home() && ( get_theme_mod( 'iconic_one_tag_home' , '1' ) == '1' ) ) { ?>
    <span><?php the_tags(); ?></span>
  <?php } ?>
    <?php edit_post_link( __( 'Edit', 'iconic-one' ), '<span class="edit-link">', '</span>' ); ?>
    <?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) {
      // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
      <div class="author-info">
        <div class="author-avatar">
          <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'themonic_author_bio_avatar_size', 68 ) ); ?>
        </div><!-- .author-avatar -->
        <div class="author-description">
          <h2><?php printf( __( 'About %s', 'iconic-one' ), get_the_author() ); ?></h2>
          <p><?php the_author_meta( 'description' ); ?></p>
          <div class="author-link">
            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
              <?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'iconic-one' ), get_the_author() ); ?>
            </a>
          </div><!-- .author-link  -->
        </div><!-- .author-description -->
      </div><!-- .author-info -->
    <?php } ?>
  </footer><!-- .entry-meta -->
</article><!-- #post -->
