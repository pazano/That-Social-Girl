<?php

	/* Template Name: Front Page */

?>

<?php get_header(); ?>

	<section id="main" class="container">


<!-- Featured Content -->

		<?php if( have_posts() ) : while ( have_posts() ) :  the_post(); ?>

			<?php
					$hero_image = get_field( 'hero_image' );
					$hero_title = get_field( 'hero_title' );
					$hero_description = get_field( 'hero_description' );
			 ?>

				<div class="featured">

					<div class="featured__hero background-cover" style="background-image:url(<?= $hero_image['sizes']['large'] ?>);">

						<a class="featured__callout">
							<h2><?= $hero_title; ?></h3>
							<span><?= $hero_description; ?></span>
						</a>

					</div>

					<!-- Smaller Features -->

					<?php if ( have_rows( 'features') ): ?>

						<div class="featured__list">

								<?php while( have_rows( 'features' ) ) : the_row();
									$image = get_sub_field( 'feature_image' );
									$label = get_sub_field( 'feature_label' );
									$description = get_sub_field( 'feature_description' );
							    $link = ( get_sub_field( 'feature_link_type' ) == 'Local Content') ? get_sub_field( 'content_link') : get_sub_field( 'url' );
								?>

								<div class="featured__list-item background-cover" style="background-image: url('<?= $image['sizes']['misc-thumb']; ?>');">

										<a class="featured__callout" href="<?= $link ?>">
											<h3><?= $label; ?></h3>
											<span><?= $description; ?></span>
										</a>

								</div>

								<?php endwhile; ?>

						</div>

					<?php endif; ?>

				</div>

				<div class="content">

					<div class="welcome" >

							<h2 class="section-heading">Hi!  I'm Danielle</h2>
							<div class="copy-frame">
								<?= get_field( 'welcome_message' ); ?>
							</div>

					</div>

		<?php endwhile;  endif; ?>

					<div class="recent-posts" >

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

							<h2 class="section-heading">Recent Sessions</h2>

						<?php while ( $query->have_posts() ) : $query->the_post(); ?>

							<?php get_template_part( 'content', 'list' ) ?>

						<?php endwhile; endif; ?>

					</div>

				</div>





	</section>

<?php get_footer(); ?>
