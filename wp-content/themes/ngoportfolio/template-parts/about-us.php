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
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.10480800338!2d85.30825747507984!3d27.68315537619643!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1849a8cc2b4b%3A0xb10e318f012e9036!2sDevOps%20Technology%20Pvt.%20Ltd.!5e0!3m2!1sen!2snp!4v1701241080607!5m2!1sen!2snp" width="900" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe><br><br>
</div>



<?php get_footer(); ?>

