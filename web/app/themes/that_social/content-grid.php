<article id="post-<?php the_ID(); ?>" <?php post_class('post__list-item'); ?>>



		<?php if(has_post_thumbnail()) : ?>

			<div class="post__image background-cover" style="background-image: url('<?php the_post_thumbnail_url('misc-thumb'); ?>');">
				<a class="featured__callout" href="<?php echo get_permalink(); ?>">
					<h4><?php the_title(); ?></h3>
				</a>
			</div>

		<?php endif; ?>

	</a>

</article>
