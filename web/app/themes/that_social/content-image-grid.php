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
	<div>
		<ul class="gallery__grid tiles-wrap animated">

			<?php $add_margin = true; ?>

			<?php foreach( $images as $image ): ?>
				<li>
					<a class="gallery__grid-item" href="<?php echo $image['url']; ?>">
               <img src="<?php echo $image['sizes']['gallery-thumb']; ?>" width="<?= $image['sizes']['gallery-thumb-width'] ?>" alt="<?php echo $image['alt']; ?>" />
          </a>
				</li>
      <?php endforeach; ?>

		</ul>
	</div>
	<?php endif; ?>


	<?php comments_template( '', true );  ?>

</article>
