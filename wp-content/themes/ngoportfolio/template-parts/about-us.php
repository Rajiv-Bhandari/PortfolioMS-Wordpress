<?php
/*
 * Template Name: About-Us Template
 * Template Post Type: post, page
 */
get_header();
?>

<div class="about-us-container">
    <?php
    // Get ACF field values
    $title_aboutus = get_field('title_aboutus');
    $body_aboutus = get_field('body_aboutus');

    // Check if the fields have values and display them
    if ($title_aboutus && $body_aboutus) :
    ?>
        <h1><?php echo esc_html($title_aboutus); ?></h1>
        <?php echo wp_kses_post($body_aboutus); ?>
    <?php endif; ?>
</div>



<?php get_footer(); ?>

