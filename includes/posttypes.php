<?php

/*
This create all the custom post types needed for OnRamp

The following are the create Custom Post Types
1. OnRamp Projects
2. OnRamp Quizes
3. OnRamp Submission/FeedBacks
4. OnRamp User Enrollment
*/



// Registering OnRamp Quiz
function register_onRamp_Quiz_cpt()
{
    $labels = array(
        'name'               => _x( 'onRamp Quizes', 'post type general name', 'onramp' ),
        'singular_name'      => _x( 'onRamp Quiz', 'post type singular name', 'onramp' ),
        'menu_name'          => _x( 'onRamp Quizes', 'admin menu', 'onramp' ),
        'name_admin_bar'     => _x( 'onRamp Quiz', 'add new on admin bar', 'onramp' ),
        'add_new'            => _x( 'Add New', 'onRamp Quiz', 'onramp' ),
        'add_new_item'       => __( 'Add New onRamp Quiz', 'onramp' ),
        'new_item'           => __( 'New onRamp Quiz', 'onramp' ),
        'edit_item'          => __( 'Edit onRamp Quiz', 'onramp' ),
        'view_item'          => __( 'View onRamp Quiz', 'onramp' ),
        'all_items'          => __( 'All onRamp Quizes', 'onramp' ),
        'search_items'       => __( 'Search onRamp Quizes', 'onramp' ),
        'parent_item_colon'  => __( 'Parent onRamp Quizes:', 'onramp' ),
        'not_found'          => __( 'No onRamp Quizes found.', 'onramp' ),
        'not_found_in_trash' => __( 'No onRamp Quizes found in Trash.', 'onramp' )
    );

    $args = array(
        'labels'             => $labels,
                'description'        => __( 'Description.', 'onramp' ),
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'onramp_quizes' ),
        'capability_type'    => 'onrampquiz',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'author', 'thumbnail' ),
        'show_in_rest'       => true,
        'rest_base'          => 'onramp_quiz',
        'map_meta_cap'       => true
    );

    register_post_type( 'onrampquiz', $args );
}

add_action( 'init', 'register_onRamp_Quiz_cpt' );




// Registering onRamp Project
function register_onRamp_Project_cpt()
{
    $labels = array(
        'name'               => _x( 'onRamp Projects', 'post type general name', 'onramp' ),
        'singular_name'      => _x( 'onRamp Project', 'post type singular name', 'onramp' ),
        'menu_name'          => _x( 'onRamp Projects', 'admin menu', 'onramp' ),
        'name_admin_bar'     => _x( 'onRamp Project', 'add new on admin bar', 'onramp' ),
        'add_new'            => _x( 'Add New', 'onRamp Project', 'onramp' ),
        'add_new_item'       => __( 'Add New onRamp Project', 'onramp' ),
        'new_item'           => __( 'New onRamp Project', 'onramp' ),
        'edit_item'          => __( 'Edit onRamp Project', 'onramp' ),
        'view_item'          => __( 'View onRamp Project', 'onramp' ),
        'all_items'          => __( 'All onRamp Projects', 'onramp' ),
        'search_items'       => __( 'Search onRamp Projects', 'onramp' ),
        'parent_item_colon'  => __( 'Parent onRamp Projects:', 'onramp' ),
        'not_found'          => __( 'No onRamp Projects found.', 'onramp' ),
        'not_found_in_trash' => __( 'No onRamp Projects found in Trash.', 'onramp' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'onramp' ),
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'onramp_projects' ),
        'capability_type'    => 'onrampproject',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
        'show_in_rest'       => true,
        'rest_base'          => 'onramp_project',
        'map_meta_cap'       => true
    );

    register_post_type( 'onrampproject', $args );
}

add_action( 'init', 'register_onRamp_Project_cpt' );

// Registering onRamp Submission
function register_onRamp_Submission_cpt()
{
    $labels = array(
        'name'               => _x( 'onRamp Submissions', 'post type general name', 'onramp' ),
        'singular_name'      => _x( 'onRamp Submission', 'post type singular name', 'onramp' ),
        'menu_name'          => _x( 'onRamp Submissions', 'admin menu', 'onramp' ),
        'name_admin_bar'     => _x( 'onRamp Submission', 'add new on admin bar', 'onramp' ),
        'add_new'            => _x( 'Add New', 'onRamp Submission', 'onramp' ),
        'add_new_item'       => __( 'Add New onRamp Submission', 'onramp' ),
        'new_item'           => __( 'New onRamp Submission', 'onramp' ),
        'edit_item'          => __( 'Edit onRamp Submission', 'onramp' ),
        'view_item'          => __( 'View onRamp Submission', 'onramp' ),
        'all_items'          => __( 'All onRamp Submissions', 'onramp' ),
        'search_items'       => __( 'Search onRamp Submissions', 'onramp' ),
        'parent_item_colon'  => __( 'Parent onRamp Submissions:', 'onramp' ),
        'not_found'          => __( 'No onRamp Submissions found.', 'onramp' ),
        'not_found_in_trash' => __( 'No onRamp Submissions found in Trash.', 'onramp' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'onramp' ),
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'onramp_submissions' ),
        'capability_type'    => 'onrampsubmission',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
        'show_in_rest'       => true,
        'rest_base'          => 'onramp_submission',
        'map_meta_cap'       => true
    );

    register_post_type( 'onrampsubmission', $args );
}

add_action( 'init', 'register_onRamp_Submission_cpt' );


// Registering onRamp feedback
function register_onRamp_feedback_cpt()
{
    $labels = array(
        'name'               => _x( 'onRamp Feedbacks', 'post type general name', 'onramp' ),
        'singular_name'      => _x( 'onRamp Feedback', 'post type singular name', 'onramp' ),
        'menu_name'          => _x( 'onRamp Feedbacks', 'admin menu', 'onramp' ),
        'name_admin_bar'     => _x( 'onRamp Feedback', 'add new on admin bar', 'onramp' ),
        'add_new'            => _x( 'Add New', 'onRamp Feedback', 'onramp' ),
        'add_new_item'       => __( 'Add New onRamp Feedback', 'onramp' ),
        'new_item'           => __( 'New onRamp Feedback', 'onramp' ),
        'edit_item'          => __( 'Edit onRamp Feedback', 'onramp' ),
        'view_item'          => __( 'View onRamp Feedback', 'onramp' ),
        'all_items'          => __( 'All onRamp Feedbacks', 'onramp' ),
        'search_items'       => __( 'Search onRamp Feedbacks', 'onramp' ),
        'parent_item_colon'  => __( 'Parent onRamp Feedbacks:', 'onramp' ),
        'not_found'          => __( 'No onRamp Feedbacks found.', 'onramp' ),
        'not_found_in_trash' => __( 'No onRamp Feedbacks found in Trash.', 'onramp' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'onramp' ),
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'onramp_feedback' ),
        'capability_type'    => 'onrampfeedback',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
        'show_in_rest'       => true,
        'rest_base'          => 'onramp_feedback',
        'map_meta_cap'       => true
    );

    register_post_type( 'onrampfeedback', $args );
}

add_action( 'init', 'register_onRamp_feedback_cpt' );



// Registering onRamp Enrollment
function register_onRamp_Enrollment_cpt()
{
    $labels = array(
        'name'               => _x( 'onRamp Enrollments', 'post type general name', 'onramp' ),
        'singular_name'      => _x( 'onRamp Enrollment', 'post type singular name', 'onramp' ),
        'menu_name'          => _x( 'onRamp Enrollments', 'admin menu', 'onramp' ),
        'name_admin_bar'     => _x( 'onRamp Enrollment', 'add new on admin bar', 'onramp' ),
        'add_new'            => _x( 'Add New', 'onRamp Enrollment', 'onramp' ),
        'add_new_item'       => __( 'Add New onRamp Enrollment', 'onramp' ),
        'new_item'           => __( 'New onRamp Enrollment', 'onramp' ),
        'edit_item'          => __( 'Edit onRamp Enrollment', 'onramp' ),
        'view_item'          => __( 'View onRamp Enrollment', 'onramp' ),
        'all_items'          => __( 'All onRamp Enrollments', 'onramp' ),
        'search_items'       => __( 'Search onRamp Enrollments', 'onramp' ),
        'parent_item_colon'  => __( 'Parent onRamp Enrollments:', 'onramp' ),
        'not_found'          => __( 'No onRamp Enrollments found.', 'onramp' ),
        'not_found_in_trash' => __( 'No onRamp Enrollments found in Trash.', 'onramp' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'onramp' ),
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'onramp_enrollment' ),
        'capability_type'    => 'onrampenrollment',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title','author'),
        'show_in_rest'       => true,
        'rest_base'          => 'onramp_enrollment',
        'map_meta_cap'       => true
    );

    register_post_type( 'onrampenrollment', $args );
}

add_action( 'init', 'register_onRamp_Enrollment_cpt' );


/**
 * Flush rewrite rules on activation.
 */
function onramp_rewrite_flush()
{
    register_onRamp_feedback_cpt();
    register_onRamp_Quiz_cpt();
    register_onRamp_Project_cpt();
    register_onRamp_Submission_cpt();
    register_onRamp_Enrollment_cpt();
    flush_rewrite_rules();
}
