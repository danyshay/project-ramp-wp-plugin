<?php
/*
   Plugin Name: Ramp Creator
   Plugin URI: ""
   Description: a plugin to create awesome function of Ramp Frontend
   Version: 0.1
   Author: Rashmi Ratnayake
   Author URI: 
   Text Domain: onramp
   License: GPL2
*/


// Include Custom Post Types Files 
require_once plugin_dir_path( __FILE__ ) . 'includes/posttypes.php';

// Creating OnRamp Customization Options
require_once plugin_dir_path( __FILE__ ) . 'includes/theme_options.php';

// Create Custom Post Types on Activation
register_activation_hook( __FILE__, 'onramp_rewrite_flush' );

// Include the Rules File
require_once plugin_dir_path(__FILE__).'includes/rules.php';
// Create User Role on Activation
register_activation_hook(__FILE__, 'create_student_role');
// Delete User Role on Deactivation
register_deactivation_hook(__FILE__, 'remove_student_role');


// Activate CRUD Capability for CPT
register_activation_hook(__FILE__, 'cpt_add_capabilities');
// Deactivate CRUD Capability for CPT
register_deactivation_hook(__FILE__, 'cpt_remove_capabilities');

// Include CMB2 For Custom Meta Boxes
require_once plugin_dir_path( __FILE__ ) . 'includes/CMB_Declaration.php';

// Custom Routes for onRamp
require_once plugin_dir_path( __FILE__ ) . 'includes/customroutes.php';


// Grant Permission to view Private Submissions for Students

add_action('pre_get_posts', 'onramp_submission_grant_private_view_in_rest');

function onramp_submission_grant_private_view_in_rest($query)
{
    if (isset($query->query_vars['post_type'])) {
        if ($query->query_vars['post_type'] == "onrampsubmission" || $query->query_vars['post_type'] == "onrampenrollment" ) {
            if (defined('REST_REQUEST') && REST_REQUEST) {
                if (current_user_can('editor') || current_user_can('administrator')) {
                    $query->set('post_status', 'private');
                } elseif (current_user_can('onramp-student')) {
                    $query->set('post_status', 'private');
                    $query->set('author', get_current_user_id());
                }
            }
        }
    }
}
