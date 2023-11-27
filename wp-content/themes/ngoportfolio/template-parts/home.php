<?php
/*
 * Template Name: Home page Template
 * Template Post Type: post, page
 */
get_header();
?>

<div class="image-with-text">
	<img src="<?php echo get_template_directory_uri(); ?>/images/backgroundimg2.jpeg" alt="Image">
	<div class="overlay-text">
		<div class="top-text">100+ PROJECTS ACROSS NEPAL</div>
		<h1>Youngters In Action</h1>
		<p>We create a poverty-free existence and prioritize children's health as our commitment.</p>
	</div>
</div>
	<main id="primary" class="site-main">
		<div class="container" style="margin-top:60px;">
			<div class="row align-items-center">
				<div class="col-md-4">
					<img src="<?php echo get_template_directory_uri(); ?>/images/child-labor.jpg" alt="Child Labour" class="img-fluid">
				</div>
				<div class="col-md-8">
					<h1>Empower Nepal: Building Hope, Changing Lives</h1>
					<p> Empower Nepal is committed to uplifting Himalayan communities, addressing the challenges faced by suffering children, and combating child labor. Our initiatives in education, healthcare, and community development aim to eradicate the root causes of poverty, provide a haven for at-risk youth, and pave the path toward a brighter future. With a focus on ending child labor and ensuring access to quality education, we strive to create a world where every child in Nepal can thrive and reach their full potential.</p>
					<a href="<?php echo esc_url(get_permalink(get_page_by_path('read-more'))); ?>" class="btn btn-primary">Read More</a>
				</div>
			</div>
		</div>
        <div class="our-works-container">
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('our-works'))); ?>">
                <h1>Our Works</h1>
            </a>
            
            <div class="work-boxes">
                <?php
                $our_works_query = new WP_Query(array(
                    'post_type' => 'our-work',
                    'posts_per_page' => 4,
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

        <div class="full-screen-image" id="backgroundImage">
            <div class="full-screen-image">
                <div class="background-image">
                    <!-- This is your background image -->
                </div>
                <div class="overlay-text">
                    <div class="top-text">WANT TO MAKE A DIFFERENCE?</div>
                    <h1>Help us raise money for our humanitarian causes</h1>
                    <a href="https://www.paypal.com/donate/?hosted_button_id=CDMXBEVUA7FE2" target="_blank" class="btn btn-primary">Donate</a>
                </div>
            </div>
        </div>
        <div class="our-partner-h1">
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('our-partner'))); ?>">
                <h1>Our Partners</h1>
            </a>
        </div>

        
        <div class="partner-list">
            <?php
            $partner_query = new WP_Query(array(
                'post_type' => 'our-partner', 
                'posts_per_page' => 5, 
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

	</main>

<?php

// get_sidebar();
get_footer();
?>