
<?php get_header(); ?>

	<section id="main" class="container">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php get_template_part('content', 'page'); ?>

				<?php endwhile; ?>

				<?php endif; ?>

	</section>

<?php get_footer(); ?>
