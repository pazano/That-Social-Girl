<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="post-header">
						
		<h1><?php the_title(); ?></h1>
						
	</div>
	
	<div class="post-img">
						
		<a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail('full-thumb'); ?></a>
						
	</div>
	
	<div class="post-entry">
						
		<?php the_content(__('<span class="more-button">Continue Reading</span>', 'solopine')); ?>
		
		<?php wp_link_pages(); ?>
		
	</div>

	
	<?php comments_template( '', true );  ?>
	
</article>