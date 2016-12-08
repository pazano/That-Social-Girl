<div class="hero-card">
	

	<?php if(has_post_thumbnail()) : ?>

	<div class="hero-img">
		<a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail('square-hero'); ?></a>
	</div>

	<?php endif; ?>


	<div class="hero-content">
		
		<h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
		
		<span class="cat"><?php sp_category(' '); ?></span>
		<span class="date"><?php the_time( get_option('date_format') ); ?></span>
	
		<p><?php echo sp_string_limit_words(get_the_excerpt(), 80); ?>&hellip;</p>
		
		<p><a href="<?php echo get_permalink() ?>" class="more-link"><span class="more-button"><?php _e( 'Continue Reading', 'solopine' ); ?></span></a>
		
		
		<?php wp_link_pages(); ?>
						
	</div>
	
	
</div>