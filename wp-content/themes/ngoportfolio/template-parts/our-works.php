<?php
/*
 * Template Name: Our Works Template
 * Template Post Type: our_works
 */
get_header();
?>

<div class="our-works-container">
    <h1>Our Works</h1>

    <div class="works-grid">
        <?php
        $our_works_query = new WP_Query(array(
            'post_type' => 'our_works',
            'posts_per_page' => -1,
        ));

        if ($our_works_query->have_posts()) :
            while ($our_works_query->have_posts()) :
                $our_works_query->the_post();
        ?>
                <div class="single-our-work">
                    <div class="thumbnail">
                        <?php $image = get_field('thumbnail'); ?>
                        <?php if ($image) : ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="work-details">
                        <h2><?php the_title(); ?></h2>
                        <!-- Add more fields as needed -->
                        <!-- <div class="description">
                            <?php the_field('description'); ?>
                        </div> -->
                    </div>
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
