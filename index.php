<?php

get_header();
?>

<main id="main" class="container">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<article <?php post_class(); ?>>
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</article>
		<?php endwhile; ?>
	<?php else : ?>
		<p><?php esc_html_e( 'Материалы не найдены.', 'migrapro-static' ); ?></p>
	<?php endif; ?>
</main>

<?php
get_footer();
