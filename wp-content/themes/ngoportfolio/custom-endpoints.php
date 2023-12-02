<?php
// Custom REST API endpoint to fetch 'About Us' page custom fields

function custom_about_us_endpoint() {
    register_rest_route('custom/v1', '/about-us-data', array(
        'methods' => 'GET',
        'callback' => 'get_about_us_data',
    ));
}
add_action('rest_api_init', 'custom_about_us_endpoint');

// Callback function to retrieve 'About Us' page data
function get_about_us_data($request) {
    $about_us = get_page_by_path('about-us', OBJECT, 'page'); // Get 'About Us' page by slug
    
    if (!$about_us) {
        return new WP_Error('no_data', 'No data found', array('status' => 404));
    }
    
    $title_aboutus = get_field('title_aboutus', $about_us->ID); // Fetch 'title_aboutus' custom field
    $body_aboutus = get_field('body_aboutus', $about_us->ID); // Fetch 'body_aboutus' custom field
    
    $data = array(
        'title_aboutus' => $title_aboutus,
        'body_aboutus' => $body_aboutus,
    );

    return new WP_REST_Response($data, 200);
}

// Custom REST API endpoint to fetch 'Our Team' custom post type data
function custom_our_team_endpoint() {
    register_rest_route('custom/v1', '/our-team-data', array(
        'methods' => 'GET',
        'callback' => 'get_our_team_data',
    ));
}
add_action('rest_api_init', 'custom_our_team_endpoint');

// Callback function to retrieve 'Our Team' custom post type data
function get_our_team_data($request) {
    $args = array(
        'post_type' => 'our-team', // Custom post type slug
        'posts_per_page' => -1, // Retrieve all posts, you can set a limit if needed
    );

    $team_query = new WP_Query($args);
    $team_data = array();

    if ($team_query->have_posts()) {
        while ($team_query->have_posts()) {
            $team_query->the_post();

            // Retrieve custom field values
            $title = get_field('title', get_the_ID());
            $image = get_field('image', get_the_ID());
            $description = get_field('description', get_the_ID());
            $thumbnail = get_field('thumbnail', get_the_ID());

            // Create an array with retrieved data
            $team_member = array(
                'title' => $title,
                'image' => $image,
                'description' => $description,
                'thumbnail' => $thumbnail,
            );

            $team_data[] = $team_member;
        }
        wp_reset_postdata(); // Restore original post data
    }

    return new WP_REST_Response($team_data, 200);
}

?>