<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ngoPortfolio
 */

?>

<footer id="colophon" class="site-footer">
    <div class="site-info">
        <div class="footer-menu">
            <h3>Explore</h3>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'footer-menu',
                'menu_id'        => 'footer-menu',
                'container'      => false,
                'depth'          => 1,
            ));
            ?>
        </div>

        <div class="footer-info">
            <h3>More Information</h3>
            <ul>
                <li><a href="<?php echo esc_url(home_url('/about')); ?>">About Us</a></li>
                <li><a href="<?php echo esc_url(home_url('/services')); ?>">Our Services</a></li>
                <li><a href="<?php echo esc_url(home_url('/portfolio')); ?>">Portfolio</a></li>
                <li><a href="<?php echo esc_url(home_url('/contact')); ?>">Contact Us</a></li>
            </ul>
        </div>

    </div><!-- .site-info -->
</footer><!-- #colophon -->


<?php wp_footer(); ?>

</body>
</html>
