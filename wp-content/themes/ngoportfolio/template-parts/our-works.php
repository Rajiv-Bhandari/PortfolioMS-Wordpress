<?php
/*
 * Template Name: Our Works Template
 * Template Post Type: our_works
 */
get_header();
?>

<div class="our-works-container">
    <h1>Our Works</h1>
    
    <div class="work-boxes">
        <?php
        $our_works_query = new WP_Query(array(
            'post_type' => 'our-work',
            'posts_per_page' => -1,
        ));

        if ($our_works_query->have_posts()) :
            while ($our_works_query->have_posts()) :
                $our_works_query->the_post();
        ?>
            
                <div class="work-box">
                    <a href="<?php the_permalink(); ?>" class="work-box-link">
                    <?php $image = get_field('thumbnail'); ?>
                    <?php if ($image) : ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                    <?php endif; ?>
                    <div class="work-title">
                        <p><?php the_field('title'); ?></p>
                    </div>
                    </a>
                </div>
           
        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo 'No works found.';
        endif;
        ?>
    </div>
</div>

<?php get_footer(); ?>
