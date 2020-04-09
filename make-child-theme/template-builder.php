<?php
/**
 * Template Name: Builder Template
 *
 * @package Make
 */

get_header();
?>

<main id="site-main" class="site-main" role="main">
<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'partials/content', 'page-builder' ); ?>
				<div class="blog-footer-text" style="text-align: center;">
					<strong>Start expanding your impact now</strong> with a complimentary copy of Dr. Chilkov’s <strong>OutSmart Cancer™ Care Planner:</strong><br /><br />
				</div>
				<div class="blog-footer-image">
				<a href="https://doctornalini.lpages.co/aiiore-blog-2020-care-planner/"><img src="http://staging.aiiore.com/wp-content/uploads/2020/04/blod-footer.jpg"></a>
				</div>	
		<?php get_template_part( 'partials/content', 'comments' ); ?>
	<?php endwhile; ?>

<?php endif; ?>
</main>

<?php get_footer(); ?>
