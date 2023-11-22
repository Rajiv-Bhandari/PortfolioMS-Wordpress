<?php
/*
 * Template Name: Gallery Template
 * Template Post Type: post, page
 */
get_header();
?>

<div class="gallery-container">
    <h1>Gallery</h1>

    <div class="gallery-images">
        <?php
        // Get the current page ID
        $current_page_id = get_queried_object_id();

        // Get the attachments using WP_Query
        $args = array(
            'post_type'      => 'attachment',
            'post_mime_type' => 'image',
            'post_parent'    => $current_page_id,
            'posts_per_page' => -1,
        );

        $attachments = new WP_Query($args);

        if ($attachments->have_posts()) {
            while ($attachments->have_posts()) {
                $attachments->the_post();
                $image_url = wp_get_attachment_image_src(get_the_ID(), 'full');
                $image_alt = get_post_meta(get_the_ID(), '_wp_attachment_image_alt', true);

                if ($image_url) {
        ?>
                    <img src="<?php echo esc_url($image_url[0]); ?>" alt="<?php echo esc_attr($image_alt); ?>">
        <?php
                }
            }
        }
        wp_reset_postdata();
        ?>
    </div>
</div>

<?php get_footer(); ?>
