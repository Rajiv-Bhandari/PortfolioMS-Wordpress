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
        'Title' => $title_aboutus,
        'Description' => $body_aboutus,
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

// Custom REST API endpoint to fetch 'Our Partner' custom post type data
function custom_our_partner_endpoint() {
    register_rest_route('custom/v1', '/our-partner-data', array(
        'methods' => 'GET',
        'callback' => 'get_our_partner_data',
    ));
}
add_action('rest_api_init', 'custom_our_partner_endpoint');

// Callback function to retrieve 'Our Partner' custom post type data
function get_our_partner_data($request) {
    $args = array(
        'post_type' => 'our-partner', // Custom post type slug
        'posts_per_page' => -1, // Retrieve all posts, you can set a limit if needed
    );

    $partner_query = new WP_Query($args);
    $partner_data = array();

    if ($partner_query->have_posts()) {
        while ($partner_query->have_posts()) {
            $partner_query->the_post();

            // Retrieve custom field values
            $title = get_field('title', get_the_ID());
            $image = get_field('image', get_the_ID());

            // Create an array with retrieved data
            $partner = array(
                'title' => $title,
                'image' => $image,
            );

            $partner_data[] = $partner;
        }
        wp_reset_postdata(); // Restore original post data
    }

    return new WP_REST_Response($partner_data, 200);
}

// Custom REST API endpoint to fetch 'Our Works' custom post type data
function custom_our_works_endpoint() {
    register_rest_route('custom/v1', '/our-works-data', array(
        'methods' => 'GET',
        'callback' => 'get_our_works_data',
    ));
}
add_action('rest_api_init', 'custom_our_works_endpoint');

// Callback function to retrieve 'Our Works' custom post type data
function get_our_works_data($request) {
    $args = array(
        'post_type' => 'our-work', // Custom post type slug
        'posts_per_page' => -1, // Retrieve all posts, you can set a limit if needed
    );

    $works_query = new WP_Query($args);
    $works_data = array();

    if ($works_query->have_posts()) {
        while ($works_query->have_posts()) {
            $works_query->the_post();

            // Retrieve custom field values
            $title = get_field('title', get_the_ID());
            $image = get_field('image', get_the_ID());
            $description = get_field('description', get_the_ID());
            $thumbnail = get_field('thumbnail', get_the_ID());

            // Create an array with retrieved data
            $work = array(
                'title' => $title,
                'image' => $image,
                'description' => $description,
                'thumbnail' => $thumbnail,
            );

            $works_data[] = $work;
        }
        wp_reset_postdata(); // Restore original post data
    }

    return new WP_REST_Response($works_data, 200);
}

// Custom REST API endpoint to fetch 'Gallery' custom post type data
function custom_gallery_endpoint() {
    register_rest_route('custom/v1', '/gallery-data', array(
        'methods' => 'GET',
        'callback' => 'get_gallery_data',
    ));
}
add_action('rest_api_init', 'custom_gallery_endpoint');

// Callback function to retrieve 'Gallery' custom post type data
function get_gallery_data($request) {
    $args = array(
        'post_type' => 'gallery', // Custom post type slug
        'posts_per_page' => -1, // Retrieve all posts, you can set a limit if needed
    );

    $gallery_query = new WP_Query($args);
    $gallery_data = array();

    if ($gallery_query->have_posts()) {
        while ($gallery_query->have_posts()) {
            $gallery_query->the_post();

            // Retrieve custom field values
            $image = get_field('image', get_the_ID());
            $image_name = get_field('image_name', get_the_ID());

            // Create an array with retrieved data
            $gallery_item = array(
                'image' => $image,
                'image_name' => $image_name,
            );

            $gallery_data[] = $gallery_item;
        }
        wp_reset_postdata(); // Restore original post data
    }

    return new WP_REST_Response($gallery_data, 200);
}

// Custom REST API endpoint to fetch 'Our Team' post details
function custom_our_team_details_endpoint() {
    register_rest_route('custom/v1', '/our-team/(?P<id>\d+)', array(
        'methods' => 'GET',
        'callback' => 'get_our_team_details',
    ));
}
add_action('rest_api_init', 'custom_our_team_details_endpoint');

// Callback function to retrieve 'Our Team' post details
function get_our_team_details($request) {
    $post_id = $request['id']; // Get the ID from the request parameter

    // Example: Retrieve specific custom fields or content for 'Our Team' post type
    $title_aboutus = get_field('name', $post_id); // Get custom field 'title_aboutus'
    $description_aboutus = get_field('description', $post_id); // Get custom field 'description_aboutus'
    $position = get_field('position',$post_id);

    // Construct the response data
    $team_details = array(
        'ID' => $post_id,
        'Name' => $title_aboutus,
        'Position' => $position,
        'Description' => $description_aboutus
    );

    return new WP_REST_Response($team_details, 200);
}

// Custom REST API endpoint for single Gallery post
function custom_gallery_post_endpoint() {
    register_rest_route('custom/v1', '/gallery/(?P<id>\d+)', array(
        'methods' => 'GET',
        'callback' => 'get_gallery_post_details',
    ));
}
add_action('rest_api_init', 'custom_gallery_post_endpoint');

// Callback function to retrieve single Gallery post details
function get_gallery_post_details($request) {
    $post_id = $request['id']; // Get the ID from the request parameter

    // Get post title and content
    $post = get_post($post_id);
    $title = $post->post_title;
    $content = apply_filters('the_content', $post->post_content);

    // Construct the response data
    $gallery_post_details = array(
        'ID' => $post_id,
        'title' => $title,
        'content' => $content,
        // You can add more fields here if needed
    );

    return new WP_REST_Response($gallery_post_details, 200);
}

// Custom REST API endpoint to update 'About Us' ACF fields individually
function custom_update_about_us_endpoint() {
    register_rest_route('custom/v1', '/about-us/update', array(
        'methods' => 'POST',
        'callback' => 'update_about_us_content',
        'permission_callback' => function () {
            return true; // Temporarily set to true for testing
        },
    ));
}
add_action('rest_api_init', 'custom_update_about_us_endpoint');

// Callback function to handle updating 'About Us' ACF fields individually
function update_about_us_content($request) {
    $about_us_post = get_page_by_path('about-us', OBJECT, 'page'); // Get 'About Us' page by slug

    if (!$about_us_post) {
        return new WP_Error('no_data', 'About Us page not found', array('status' => 404));
    }

    // Extract updated field values from the request body
    $params = $request->get_params();

    // Check if the updated fields exist in the request
    if (isset($params['title_aboutus'])) {
        update_field('title_aboutus', $params['title_aboutus'], $about_us_post->ID);
    }

    if (isset($params['body_aboutus'])) {
        update_field('body_aboutus', $params['body_aboutus'], $about_us_post->ID);
    }

    // Provide a response indicating success
    return new WP_REST_Response('About Us ACF fields updated successfully', 200);
}

?>