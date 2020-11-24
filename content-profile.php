<div class="profile">
	<h2 class="title">Profile</h2>
	<div class="cast-list">
		<div class="cast">
			<p class="name"><?php the_field('cast_name1'); ?></p>
			<p class="intro"><?php the_field('cast_intro1'); ?></p>
		</div>
		
		<?php if( get_field('number_of_people') == 'p2' ): ?>
		<div class="cast">
			<p class="name"><?php the_field('cast_name2'); ?></p>
			<p class="intro"><?php the_field('cast_intro2'); ?></p>
		</div>
		<?php endif; ?>	
								
		<?php if( get_field('number_of_people') == 'p3'): ?>
		<div class="cast">
			<p class="name"><?php the_field('cast_name2'); ?></p>
			<p class="intro"><?php the_field('cast_intro2'); ?></p>
		</div>
		<div class="cast">
			<p class="name"><?php the_field('cast_name3'); ?></p>
			<p class="intro"><?php the_field('cast_intro3'); ?></p>
		</div>
		<?php endif; ?>
		
		<?php if( get_field('number_of_people') == 'p4'): ?>
		<div class="cast">
			<p class="name"><?php the_field('cast_name2'); ?></p>
			<p class="intro"><?php the_field('cast_intro2'); ?></p>
		</div>
		<div class="cast">
			<p class="name"><?php the_field('cast_name3'); ?></p>
			<p class="intro"><?php the_field('cast_intro3'); ?></p>
		</div>
		<div class="cast">
			<p class="name"><?php the_field('cast_name4'); ?></p>
			<p class="intro"><?php the_field('cast_intro4'); ?></p>
		</div>
		<?php endif; ?>
		
		<?php if( get_field('number_of_people') == 'p5'): ?>
		<div class="cast">
			<p class="name"><?php the_field('cast_name2'); ?></p>
			<p class="intro"><?php the_field('cast_intro2'); ?></p>
		</div>
		<div class="cast">
			<p class="name"><?php the_field('cast_name3'); ?></p>
			<p class="intro"><?php the_field('cast_intro3'); ?></p>
		</div>
		<div class="cast">
			<p class="name"><?php the_field('cast_name4'); ?></p>
			<p class="intro"><?php the_field('cast_intro4'); ?></p>
		</div>
		<div class="cast">
			<p class="name"><?php the_field('cast_name5'); ?></p>
			<p class="intro"><?php the_field('cast_intro5'); ?></p>
		</div>
		<?php endif; ?>
		
		<?php if( get_field('number_of_people') == 'p6'): ?>
		<div class="cast">
			<p class="name"><?php the_field('cast_name2'); ?></p>
			<p class="intro"><?php the_field('cast_intro2'); ?></p>
		</div>
		<div class="cast">
			<p class="name"><?php the_field('cast_name3'); ?></p>
			<p class="intro"><?php the_field('cast_intro3'); ?></p>
		</div>
		<div class="cast">
			<p class="name"><?php the_field('cast_name4'); ?></p>
			<p class="intro"><?php the_field('cast_intro4'); ?></p>
		</div>
		<div class="cast">
			<p class="name"><?php the_field('cast_name5'); ?></p>
			<p class="intro"><?php the_field('cast_intro5'); ?></p>
		</div>
		<div class="cast">
			<p class="name"><?php the_field('cast_name6'); ?></p>
			<p class="intro"><?php the_field('cast_intro6'); ?></p>
		</div>
		<?php endif; ?>
	</div>
</div>