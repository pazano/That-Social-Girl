<?php get_header(); ?>

	<div class="container">

		<?php if(!is_paged()) : ?>
			<?php get_template_part('inc/featured/featured'); ?>
		<?php endif; ?>

		<div id="content">

			<div id="main" >


				<?php

					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$list_query = new WP_Query(
						array(
							'meta_query' => array(
								array(
									'key' => 'is_featured',
									'value' => '0',
									'compare' => '=='
								)
							),
							'showposts' => 9,
							'paged' => $paged,
						)
					); ?>

					<h2 class="section-heading">Recent Work</h2>
				<?php if ($list_query->have_posts()) : while ($list_query->have_posts()) : $list_query->the_post(); ?>

							<?php get_template_part('content', 'list'); ?>


					<?php endwhile; ?>

					<?php solopine_pagination(); ?>

				<?php endif; ?>

			</div>


<?php get_footer(); ?>
