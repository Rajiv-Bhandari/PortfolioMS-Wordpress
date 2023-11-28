<?php
/*
 * Template Name: Our-Partner Template
 * Template Post Type: post, page
 */
get_header();
?>

<div class="heading">
    <h1>Our Partners</h1>
</div>
<div class="partner-list">
    <?php
    $partner_query = new WP_Query(array(
        'post_type' => 'our-partner', 
        'posts_per_page' => -1, 
    ));

    if ($partner_query->have_posts()) :
        while ($partner_query->have_posts()) :
            $partner_query->the_post();
    ?>
            <div class="partner-item">
                <?php
                $image = get_field('image'); 
                $title = get_field('title'); 

                if ($image) :
                ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                <?php endif; ?>

                <?php if ($title) : ?>
                    <h2><?php echo esc_html($title); ?></h2>
                <?php endif; ?>
            </div>
    <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo 'No partners found.';
    endif;
    ?>
</div>

<?php get_footer(); ?>
