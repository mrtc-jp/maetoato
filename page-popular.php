<?php
/**
 * Template Name: Popular
 * Description: 人気記事
 *
 * @package Write
 */
 
get_header(); ?>

<?php if ( has_post_thumbnail( $post->ID ) ): ?>
<div class="post-thumbnail-large"><?php echo get_the_post_thumbnail( $post->ID, 'write-post-thumbnail-large' ); ?></div>
<?php endif; ?>

<div class="full-width">
<div id="primary" class="content-area">
	<main id="main" class="site-main">

	<?php if ( have_posts() ) : ?>

		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header><!-- .entry-header -->
		
		<div id="pop-posts" class="pop-tabs">
			<ul class="tabs">
				<li class="tab"><a href="#week">週間</a></li>
				<li class="tab"><a href="#month">月間</a></li>
				<li class="tab"><a href="#year">年間</a></li>
			</ul>

			<?php
				$popular_posts_ranking = get_option('popular_posts_ranking');
				$popular_posts_number = get_option('popular_posts_number');
			?>
			
			<div id="week">
			<h2>Week</h2>
			<?php	
			    $args = array(
			        'display_count' => $popular_posts_number,
			        'period' => 7,
			        'post_type' => 'post'
				);
				$ranking_data = sga_ranking_get_date($args);
				if ( !empty( $ranking_data ) ){
		        	if ( $popular_posts_ranking == true) {
		        		echo '<div class="news-list ranking">';
		        	} else {
			        	echo '<div class="news-list">';
		        	}
					foreach ( $ranking_data as $post_id ) {
			        	include( locate_template( 'content-popular.php' ));
		        	}
					echo '</div>';
				}
			?>
			</div>
			
			<div id="month">
			<h2>Month</h2>
			<?php	
			    $args = array(
			        'display_count' => $popular_posts_number,
			        'period' => 30,
			        'post_type' => 'post'
				);
				$ranking_data = sga_ranking_get_date($args);
				if ( !empty( $ranking_data ) ){
		        	if ( $popular_posts_ranking == true) {
		        		echo '<div class="news-list ranking">';
		        	} else {
			        	echo '<div class="news-list">';
		        	}
					foreach ( $ranking_data as $post_id ) {
			        	include( locate_template( 'content-popular.php' ));
		        	}
					echo '</div>';
				}
			?>
			</div>
			
			<div id="year">
			<h2>Year</h2>
			<?php	
			    $args = array(
			        'display_count' => $popular_posts_number,
			        'period' => 365,
			        'post_type' => 'post'
				);
				$ranking_data = sga_ranking_get_date($args);
				if ( !empty( $ranking_data ) ){
		        	if ( $popular_posts_ranking == true) {
		        		echo '<div class="news-list ranking">';
		        	} else {
			        	echo '<div class="news-list">';
		        	}
					foreach ( $ranking_data as $post_id ) {
			        	include( locate_template( 'content-popular.php' ));
		        	}
					echo '</div>';
				}
			?>
			</div>
		</div>

	<?php else : ?>

		<?php get_template_part( 'content', 'none' ); ?>

	<?php endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->
</div>

<?php get_footer(); ?>

<script type="text/javascript">
(function($) {
	$('#pop-posts').tabs({
		show: 300,
		hide: 300
	});
})(jQuery);
</script>

