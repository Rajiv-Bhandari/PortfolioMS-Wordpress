<?php
/*
 * Template Name: Contact Template
 * Template Post Type: post, page
 */
get_header();
?>

<div class="contact-header">
    <h1>Contact Us</h1>
</div>

<div class="contact-content">
    <?php
    $contact_query = new WP_Query(array(
        'post_type' => 'page',
        'pagename' => 'contact', // Replace 'contact-us' with your actual page slug
    ));

    if ($contact_query->have_posts()) {
        while ($contact_query->have_posts()) {
            $contact_query->the_post();
            the_content();
        }
        wp_reset_postdata();
    } else {
        echo 'Contact page content not found.';
    }
    ?>
</div>

<?php get_footer(); ?>
