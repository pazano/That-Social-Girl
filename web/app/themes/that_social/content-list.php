<article id="post-<?php the_ID(); ?>" <?php post_class('post__list-item'); ?>>

	<?php if(has_post_thumbnail()) : ?>
		<a href="<?= get_permalink(); ?>"><img class="post__image" src="<?php the_post_thumbnail_url('misc-thumb'); ?>" /></a>
	<?php endif; ?>

		<div class="post__content">
				<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
				<span class="post__excerpt"><?php echo sp_string_limit_words(get_the_excerpt(), 24); ?>&hellip;</p></span>
				<span class="post__category"><?php sp_category(' &#8226; '); ?></span>
				<span class="post__date"><?php the_time( get_option('date_format') ); ?></span>
		</div>

</article>
