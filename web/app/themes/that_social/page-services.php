<?php
/**
 * Template Name: Services Landing
 */
?>

<?php get_header(); ?>

	<section id="main" class="container">

				<?php

					$current_type = ""; //control display of type header
					$first = true;
				?>

				<?php if( have_rows( 'service') ) : ?>

					<?php while ( have_rows( 'service' ) ) : the_row(); ?>

						<?php

							$name = get_sub_field( 'name' );
							$type = get_sub_field( 'type' );
							$image = get_sub_field( 'image' );
							$description = get_sub_field( 'description');
							$collection = get_sub_field( 'collection' );

							$cost_type = get_sub_field( 'cost_type' );
							$cost_amount = get_sub_field( 'cost_amount' );
							$cost_explanation = get_sub_field( 'cost_explanation' );

						?>

						<?php if( $type != $current_type ) : ?>
							<?php

								if ( $first == true ): ?>

									<h2 class="heading__section"><?= $type; ?></h2>
									<div class="service__list">

								<?php

									$first = false;

								else: ?>
									</div>
									<h2 class="heading__section"><?= $type; ?></h2>
									<div class="service__list">
						<?php
								endif;

								$current_type = $type;
							endif;
						?>

						<div class="service__item">

							<div class="service__item-image background-cover" style="background-image: url('<?= $image['sizes']['misc-thumb']; ?>');">
							</div>

							<div class="service__item-details">

								<h3 class="service__item-name"><?= $name; ?> </h3>
								<p><?= $description; ?></p>

							<?php if ( !$cost_amount ): ?>
								<span class="service__item-cost">Ask for Quote</span>
								<span class="service__item-explanation"><?= $cost_explanation; ?> </span>
							<?php else: ?>
								<span class="service__item-cost">$<?= $cost_amount; ?> </span>
								<span class="service__item-explanation"><?= $cost_explanation; ?> </span>
							<?php endif; ?>

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
