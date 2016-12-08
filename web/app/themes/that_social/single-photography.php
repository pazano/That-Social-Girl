<?php get_header(); ?>

	<section id="main" class="container">
		<div id="content">

			<div id="main" <?php if(get_theme_mod('sp_sidebar_post') == true) : ?>class="fullwidth"<?php endif; ?>>

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php if ( get_field( 'type' ) == 'Session' ) :

									get_template_part('content', 'image-scroll');

								else:

									get_template_part('content', 'image-grid');

								endif;?>

				<?php endwhile; ?>

				<?php endif; ?>

	</section>

<?php get_footer(); ?>
