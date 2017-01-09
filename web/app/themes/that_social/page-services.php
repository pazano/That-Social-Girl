<?php
/**
 * Template Name: Services Landing
 */
?>

<?php get_header(); ?>

	<section id="main" class="container">

				<?php

					$current_type = ""; //control display of type header

				?>

				<?php if( have_rows( 'service') ) : ?>

					<?php while ( have_rows( 'service' ) ) : the_row(); ?>

						<?php

							$name = get_sub_field( 'name' );
							$type = get_sub_field( 'type' );
							$image = get_sub_field( 'image' );
							$description = get_sub_field( 'description');
							$collection = get_sub_field( 'collection' );

						?>

						<?php if( $type != $current_type ) : ?>

							<h2 class="section-heading"><?= $type; ?></h2>

						<?php
								$current_type = $type;
							endif;
						?>

						<div class="service__item">

							<div class="service__item-image background-cover" style="background-image: url('<?= $image['sizes']['misc-thumb']; ?>');">
								<h3 class="service__item-name"><?= $name; ?></h3>
							</div>

							<div class="service__item-details">

								<p><?= $description; ?></p>
								<div class="service__item-links">
									<?php if($collection): ?>
										<a href="<?= $collection; ?>" class="button">Sample Work</a>
									<?php endif; ?>
								</div>
							</div>

						</div>

					<?php endwhile; ?>

				<?php endif; ?>


		</section>


<?php get_footer(); ?>
