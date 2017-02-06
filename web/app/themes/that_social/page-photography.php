<?php
/**
 * Template Name: Galleries Landing
 */
?>

<?php get_header(); ?>

	<section id="main" class="container">

				<?php

				  $args = [
				    'post_type' => 'photography',
						'meta_query' => array(
							array(
								'key' => 'type',
								'value' => 'Collection',
								'compare' => '=='
							)
						),
				    'order_by' => 'menu_order',
				  ];

				  $query = new WP_Query( $args );
				?>

				<?php if( $query->have_posts() ) : ?>

					<h2 class="heading__section">Collections</h2>
					<div class="grid-list">

					<?php while ( $query->have_posts() ) : $query->the_post(); ?>

						<?php get_template_part('content', 'grid'); ?>

					<?php endwhile; ?>

					</div>

				<?php endif; wp_reset_postdata(); ?>

				<?php

				  $args = [
				    'post_type' => 'photography',
						'meta_query' => array(
							array(
								'key' => 'type',
								'value' => 'Session',
								'compare' => '=='
							)
						),
				  ];

				  $query = new WP_Query( $args );
				?>

				<?php if( $query->have_posts() ) : ?>

					<h2 class="section-heading">Sessions</h2>
					<div class="grid-list">

					<?php while ( $query->have_posts() ) : $query->the_post(); ?>

						<?php get_template_part('content', 'grid'); ?>

					<?php endwhile; ?>

					</div>

				<?php endif; wp_reset_postdata(); ?>

		</section>


<?php get_footer(); ?>
