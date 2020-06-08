<?php
/**
 * @package Write
 */

?><div class="post-grid post-grid-list">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( has_post_thumbnail() && ! get_theme_mod( 'write_hide_featured_image_on_grid' ) ): ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'maetoato-post-thumbnail-medium' ); ?></a>
		</div><!-- .post-thumbnail -->
		<?php endif; ?>
		<div class="post-content">
			<header class="entry-header">
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			</header><!-- .entry-header -->
			<div class="entry-meta">
				<?php the_category(); ?>
				<?php the_tags( '<ul class="post-tags"><li>', '</li><li>', '</li></ul>' ); ?>
				<?php the_date('Y.m.d', '<p class="post-date">', '</p>'); ?>
			</div><!-- .entry-summary -->
		</div>
	</article><!-- #post-## -->
</div><!-- .post-grid -->