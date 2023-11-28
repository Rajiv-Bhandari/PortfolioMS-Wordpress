<?php
/*
 * Template Name: Our-Team Template
 * Template Post Type: post, page
 */
get_header();
?>
<div class="heading">
    <h1>Our Team</h1>
</div>

<div class="team-members">
    <?php
    $team_query = new WP_Query(array(
        'post_type' => 'our-team', 
        'posts_per_page' => -1,
        'order' => 'ASC', // or 'DESC' for descending order
        'orderby' => 'date', // Order by date (you can change this to another field)
    ));

    if ($team_query->have_posts()) :
        while ($team_query->have_posts()) :
            $team_query->the_post();
    ?>
    <div class="team-member">
        <?php
        $image = get_field('image'); 
        $name = get_field('name');    

        if ($image) :
        ?>
            <div class="team-image">
                <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"></a>
            </div>
        <?php endif; ?>

        <div class="team-details">
            <?php if ($name) : ?>
                <h2><a href="<?php the_permalink(); ?>"><?php echo esc_html($name); ?></a></h2>
            <?php endif; ?>
        </div>
    </div>

    <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo 'No team members found.';
    endif;
    ?>
</div>



<?php get_footer(); ?>

