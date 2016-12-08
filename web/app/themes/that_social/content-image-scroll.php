<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php

	$images = get_field( 'images' );

?>

	<div class="post__heading">

		<h1 class="section-heading"><?php the_title(); ?></h1>
	
	</div>

	<div class="copy-frame">
		<?= get_field( 'description' ); ?>
	</div>

	<?php if ( $images ) : ?>

		<div class="gallery-scroll">

			<?php $add_margin = true; ?>

			<?php foreach( $images as $image ): ?>

				<?php if ( $image['sizes']['full-thumb-width'] > $image['sizes']['full-thumb-height'] ) : ?>
					<div style="flex: 2 100%;" >
	          <img src="<?php echo $image['sizes']['full-thumb']; ?>" alt="<?php echo $image['alt']; ?>"  />
					</div>

				<?php else: ?>

					<?php $margin = ( $add_margin == true ) ? 'margin-right: 8px;' : '';  ?>
					<?php $add_margin = ( $add_margin == true ) ? false : true; ?>

					<div style="flex: 1 45%; <?= $margin; ?>">
						<img src="<?php echo $image['sizes']['full-thumb']; ?>" alt="<?php echo $image['alt']; ?>"  />
					</div>

				<?php endif; ?>

      <?php endforeach; ?>

		</div>

	<?php endif; ?>


	<?php comments_template( '', true );  ?>

</article>
