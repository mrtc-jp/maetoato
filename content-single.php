<?php
/**
 * The template used for displaying single post.
 *
 * @package Write
 */
?>
<style type="text/css">
#pagetop {
	bottom: 56px;
}
@media screen and (min-width: 960px) {
	#pagetop {
		bottom: 0;
	}
}
</style>
<div class="post-full post-full-summary">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<div class="entry-float">
				<?php if ( is_sticky() && is_home() && ! is_paged() ): ?>
				<div class="featured"><?php esc_html_e( 'Featured', 'write-pro' ); ?></div>
				<?php endif; ?>
			</div><!-- .entry-float -->
			<h1 class="entry-title"><?php the_title(); page_number(); ?></h1>
			<?php if ( is_post_page_start() ) :
				get_template_part( 'content', 'cast' );
			endif; ?>
		</header><!-- .entry-header -->
	
		<?php if ( is_post_page_start() ) :
			get_template_part( 'content', 'entrymeta' );
		endif; ?>
		
		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array(	'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'write-pro' ), 'after'  => '</div>', 'pagelink' => '<span class="page-numbers">%</span>',  ) ); ?>
		</div><!-- .entry-content -->
		
		<footer class="entry-footer">
			<?php if ( is_post_page_end() ) : get_template_part( 'content', 'profile' ); endif; ?>
			<?php get_template_part( 'content', 'share' ); ?>
		</footer>

	</article><!-- #post-## -->
</div><!-- .post-full -->

<?php if ( ! get_theme_mod( 'write_hide_post_nav' ) ) : ?>
	<?php write_post_nav(); ?>
<?php endif; ?>

<?php if ( class_exists( 'Jetpack_RelatedPosts' ) ) : ?>
	<?php echo do_shortcode( '[jetpack-related-posts]' ); ?>
<?php endif; ?>