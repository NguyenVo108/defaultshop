<?php
  global $post;

$post_author_id   = get_post_field( 'post_author', get_queried_object_id() );
$grocery_shopping_get_post_column_layout = get_theme_mod( 'grocery_shopping_post_column_count', 2 );
$grocery_shopping_post_column_layout = 'col-sm-12 col-md-6 col-lg-4';
if ( $grocery_shopping_get_post_column_layout == 2 ) {
  $grocery_shopping_post_column_layout = 'col-lg-6 col-md-12';
} elseif ( $grocery_shopping_get_post_column_layout == 3 ) {
  $grocery_shopping_post_column_layout = 'col-sm-12 col-md-6 col-lg-4';
} elseif ( $grocery_shopping_get_post_column_layout == 4 ) {
  $grocery_shopping_post_column_layout = 'col-sm-12 col-md-6 col-lg-3';
}else{
  $grocery_shopping_post_column_layout = 'col-sm-12 grid-layout';
}
?>

<div class="<?php echo esc_attr( $grocery_shopping_post_column_layout ); ?> blog-grid-layout">
  <div id="post-<?php the_ID(); ?>" <?php post_class('post-box mb-4 p-3'); ?>>
    <?php if ( has_post_thumbnail() ) { ?>
      <div class="post-thumbnail">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
          <?php the_post_thumbnail(); ?>
        </a>
      </div>
    <?php }?>
    <?php if ( get_theme_mod('grocery_shopping_blog_admin_enable',true) || get_theme_mod('grocery_shopping_blog_comment_enable',true) ) : ?>
      <div class="post-meta my-3">
        <?php if ( get_theme_mod('grocery_shopping_blog_admin_enable',true) ) : ?>
          <i class="far fa-user mr-2"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a>
        <?php endif; ?>
        <?php if ( get_theme_mod('grocery_shopping_blog_comment_enable',true) ) : ?>
          <span class="ml-3"><i class="far fa-comments mr-2"></i> <?php comments_number( esc_attr('0', 'grocery-shopping'), esc_attr('0', 'grocery-shopping'), esc_attr('%', 'grocery-shopping') ); ?> <?php esc_html_e('comments','grocery-shopping'); ?></span>
        <?php endif; ?>
      </div>
    <?php endif; ?>
    <h3 class="post-title mb-3 mt-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <div class="post-content">
      <?php echo wp_trim_words( get_the_content(), get_theme_mod('grocery_shopping_post_excerpt_number',15) ); ?>
    </div>
  </div>
</div>
