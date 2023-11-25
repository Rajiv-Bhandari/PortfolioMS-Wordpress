<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ngoPortfolio
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    while (have_posts()) :
        the_post();

        // Fetching custom field values
        $custom_title = get_field('title');
        $custom_image = get_field('image');
        $custom_description = get_field('description');
    ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if ($custom_title) : ?>
				<h2 class="custom-post-title"><?php echo esc_html($custom_title); ?></h2>
			<?php endif; ?>

            <div class="entry-content">
                <div class="custom-post-content">
                    <?php if ($custom_image) : ?>
                        <div class="custom-post-image">
                            <img src="<?php echo esc_url($custom_image['url']); ?>" alt="<?php echo esc_attr($custom_image['alt']); ?>">
                        </div>
                    <?php endif; ?>

                    <?php if ($custom_description) : ?>
                        <div class="custom-post-description"><?php echo wp_kses_post($custom_description); ?></div>
                    <?php endif; ?>
                </div>

                <?php the_content(); ?>
            </div><!-- .entry-content -->

            <?php
            the_post_navigation(
                array(
                    'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'ngoportfolio') . '</span> <span class="nav-title">%title</span>',
                    'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'ngoportfolio') . '</span> <span class="nav-title">%title</span>',
                )
            );

            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>

        </article><!-- #post-<?php the_ID(); ?> -->

    <?php
    endwhile; // End of the loop.
    ?>

</main><!-- #main -->

<?php

get_footer();
