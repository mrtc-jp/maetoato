<section class="entry-meta">
	<?php the_category(); ?>
	<?php the_tags( '<ul class="post-tags"><li>', '</li><li>', '</li></ul>' ); ?>
	<?php the_date('Y.m.d', '<p class="post-date">', '</p>'); ?>
	
	<div class="excerpt">
		<?php the_excerpt(); ?>
	</div>
</section>