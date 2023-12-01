<?php
get_header();

while (have_posts()) : the_post();
    $image = get_field('image');
    $name = get_field('name');
    $position = get_field('position');
    $description = get_field('description');
?>
    <div class="single-team-member">
        <?php if ($image) : ?>
            <div class="team-member-image">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
            </div>
        <?php endif; ?>

        <div class="team-member-details">
            <?php if ($name) : ?>
                <h1><?php echo esc_html($name); ?></h1>
            <?php endif; ?>

            <?php if ($position) : ?>
                <h3 style="color: green;"><?php echo esc_html($position); ?></h3>
            <?php endif; ?>

            <?php the_content(); ?>

            <?php if ($description) : ?>
                <div class="description">
                    <?php echo wp_kses_post($description); ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
<?php endwhile;

get_footer();
