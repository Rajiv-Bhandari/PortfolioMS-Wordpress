<?php

get_header();
?>

<div class="single-gallery">
    <?php
    while (have_posts()) :
        the_post();
    ?>
        <div class="gallery-content">
            <h2><?php the_title(); ?></h2>
            <div class="gallery-description">
                <?php the_content(); ?>
            </div>
        </div>
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>
