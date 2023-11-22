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
		<div class="container" style="margin-top:60px;">
			<div class="row align-items-center">
				<div class="col-md-4">
					<img src="<?php echo get_template_directory_uri(); ?>/images/child-labor.jpg" alt="Child Labour" class="img-fluid">
				</div>
				<div class="col-md-8">
					<h1>Empower Nepal: Building Hope, Changing Lives</h1>
					<p>Empower Nepal is committed to uplifting Himalayan communities, addressing the challenges faced by suffering children, and combating child labor. Our initiatives in education, healthcare, and community development aim to eradicate the root causes of poverty, provide a haven for at-risk youth, and pave the path toward a brighter future. With a focus on ending child labor and ensuring access to quality education, we strive to create a world where every child in Nepal can thrive and reach their full potential.</p>
					<a href="<?php echo esc_url(get_permalink(get_page_by_path('read-more'))); ?>" class="btn btn-primary">Read More</a>
				</div>
			</div>
		</div>
	</main>


<?php
// get_sidebar();
get_footer();
?>
