<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ngoPortfolio
 */

get_header();
?>
<div class="image-with-text">
	<img src="<?php echo get_template_directory_uri(); ?>/images/backgroundimg2.jpeg" alt="Image">
	<div class="overlay-text">
		<div class="top-text">100+ PROJECTS ACROSS THE NEPAL</div>
		<h1>Youngters In Action</h1>
		<p>We create a poverty-free existence and prioritize children's health as our commitment.</p>
	</div>
</div>
	<main id="primary" class="site-main">
		
	</main>

<?php
// get_sidebar();
get_footer();
?>
