<div class="credit">
	<ul class="cast">
		<li><?php the_field('cast_name1'); ?><small><?php the_field('cast_title1'); ?></small></li>
		
	<?php if( get_field('number_of_people') == 'p2' ): ?>
		<li><?php the_field('cast_name2'); ?><small><?php the_field('cast_title2'); ?></small></li>
	<?php endif; ?>	
							
	<?php if( get_field('number_of_people') == 'p3'): ?>
		<li><?php the_field('cast_name2'); ?><small><?php the_field('cast_title2'); ?></small></li>
		<li><?php the_field('cast_name3'); ?><small><?php the_field('cast_title3'); ?></small></li>
	<?php endif; ?>
	
	<?php if( get_field('number_of_people') == 'p4'): ?>
		<li><?php the_field('cast_name2'); ?><small><?php the_field('cast_title2'); ?></small></li>
		<li><?php the_field('cast_name3'); ?><small><?php the_field('cast_title3'); ?></small></li>
		<li><?php the_field('cast_name4'); ?><small><?php the_field('cast_title4'); ?></small></li>
	<?php endif; ?>
	
	<?php if( get_field('number_of_people') == 'p5'): ?>
		<li><?php the_field('cast_name2'); ?><small><?php the_field('cast_title2'); ?></small></li>
		<li><?php the_field('cast_name3'); ?><small><?php the_field('cast_title3'); ?></small></li>
		<li><?php the_field('cast_name4'); ?><small><?php the_field('cast_title4'); ?></small></li>
		<li><?php the_field('cast_name5'); ?><small><?php the_field('cast_title5'); ?></small></li>
	<?php endif; ?>
	
	<?php if( get_field('number_of_people') == 'p6'): ?>
		<li><?php the_field('cast_name2'); ?><small><?php the_field('cast_title2'); ?></small></li>
		<li><?php the_field('cast_name3'); ?><small><?php the_field('cast_title3'); ?></small></li>
		<li><?php the_field('cast_name4'); ?><small><?php the_field('cast_title4'); ?></small></li>
		<li><?php the_field('cast_name5'); ?><small><?php the_field('cast_title5'); ?></small></li>
		<li><?php the_field('cast_name6'); ?><small><?php the_field('cast_title6'); ?></small></li>
	<?php endif; ?>
	</ul>

	<div class="staff">
		<p><?php the_field('staff'); ?></p>
	</div>
</div>