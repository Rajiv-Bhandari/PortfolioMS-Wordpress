<?php
/*
 * Template Name: Our-Works Template
 * Template Post Type: post, page
 */
get_header();
?>

<div class="our-works-container">
    <h1>Our Work</h1>
    <div class="work-boxes">
        <div class="work-box">
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('health'))); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/images/health.jpeg" alt="Health">
                <p>Health</p>
            </a>
            
        </div>
        <div class="work-box">
            <img src="<?php echo get_template_directory_uri(); ?>/images/food.jpeg" alt="Food">
            <p>Food</p>
        </div>
        <div class="work-box">
            <img src="<?php echo get_template_directory_uri(); ?>/images/education.jpg" alt="Education">
            <p>Education</p>
        </div>
        <div class="work-box">
            <img src="<?php echo get_template_directory_uri(); ?>/images/childlabour.jpeg" alt="Child Labour">
            <p>Child Labour</p>
        </div>
        
        
    </div>
</div>

<?php get_footer(); ?>
