<?php
/**
 * @package Write
 */
		
$post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ) , 'write-post-thumbnail-medium' );
$post_thumb_url = $post_thumb[0];
?>

<div class="post-grid post-grid-list">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( has_post_thumbnail($post_id) && ! get_theme_mod( 'write_hide_featured_image_on_grid' ) ): ?>
		<div class="post-thumbnail">
			<a href="<?php echo get_permalink($post_id); ?>">
				<?php echo '<img src="' . $post_thumb_url . '" alt="' . get_the_title($post_id) . '">'; ?>
			</a>
		</div><!-- .post-thumbnail -->
		<?php endif; ?>
		<div class="post-content">
			<header class="entry-header">
				<h2 class="entry-title"><a href="<?php echo get_permalink($post_id); ?>" rel="bookmark"><?php echo get_the_title($post_id); ?></a></h2>
			</header><!-- .entry-header -->
			<div class="entry-meta">
				<p class="post-date"><?php echo get_the_date('Y.m.d', $post_id); ?></p>
			</div><!-- .entry-summary -->
		</div>
	</article><!-- #post-## -->
</div><!-- .post-grid -->