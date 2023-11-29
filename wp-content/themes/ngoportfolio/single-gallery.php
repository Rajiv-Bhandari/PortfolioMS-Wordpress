<?php

get_header();
?>

<div class="single-gallery">
    <?php
    while (have_posts()) :
        the_post();
    ?>
        <div class="gallery-content">
            <div class="heading">
                <h2><?php the_title(); ?></h2>
            </div>
            <div class="gallery">
                <?php the_content(); ?>
            </div>
        </div>
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>
