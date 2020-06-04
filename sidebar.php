<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Write
 */
if (   ! is_active_sidebar( 'sidebar' )
	&& ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
}
?>

<div id="secondary" class="sidebar-area" role="complementary">
	<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
	<div class="normal-sidebar widget-area">
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</div><!-- .normal-sidebar -->
	<?php endif; ?>
	<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
	<div id="sticky-sidebar" class="sticky-sidebar widget-area">
		<?php if ( is_single() ) : ?>
			<div class="post-info">
				<header class="entry-header">
					<h2 class="entry-title"><?php the_title(); page_number(); ?></h2>
					<?php get_template_part( 'content', 'cast' ); ?>
				</header><!-- .entry-header -->
				<footer class="entry-footer">
					<?php get_template_part( 'content', 'share' ); ?>
				</footer>
			</div>
		<?php endif; ?>
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</div><!-- #sticky-sidebar -->
	<?php endif; ?>
</div><!-- #secondary -->
