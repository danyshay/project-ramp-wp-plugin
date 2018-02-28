<?php

// Create a new User role for OnRamp Students

function create_student_role()
{
  
    add_role('onramp-student', 'OnRamp Student');
}


// Remove the new created role

function remove_student_role()
{
    remove_role('onramp-student', 'OnRamp Student');
}


// Assign  Role for Quiz

function cpt_add_capabilities()
{

    
    $roles =  array('administrator','onramp-student','editor');

    foreach ($roles as $the_role) {
        $role = get_role( $the_role );
        // For Quiz
        $role->add_cap( 'read' );
        $role->add_cap( 'edit_onrampquizes' );
        $role->add_cap( 'publish_onrampquizes' );
        $role->add_cap( 'edit_published_onrampquizes' );

        // For Projects
        $role->add_cap( 'read' );
        $role->add_cap( 'edit_onrampprojects' );
        $role->add_cap( 'publish_onrampprojects' );
        $role->add_cap( 'edit_published_onrampprojects' );

        // Submissions
        $role->add_cap( 'read' );
        $role->add_cap( 'edit_onrampsubmissions' );
        $role->add_cap( 'publish_onrampsubmissions' );
        $role->add_cap( 'edit_published_onrampsubmissions' );

        // Enrollment
        $role->add_cap( 'read' );
        $role->add_cap( 'edit_onrampenrollments' );
        $role->add_cap( 'publish_onrampenrollments' );
        $role->add_cap( 'edit_published_onrampenrollments' );

        // Feedback
        $role->add_cap( 'read' );
        $role->add_cap( 'edit_onrampfeedbacks' );
        $role->add_cap( 'publish_onrampfeedbacks' );
        $role->add_cap( 'edit_published_onrampfeedbacks' );

    }
    
    $manager_roles = array( 'administrator', 'editor' );
    
    foreach ($manager_roles as $the_role) {
        $role = get_role( $the_role );
        // For Quiz
        $role->add_cap( 'read_private_onrampquizes' );
        $role->add_cap( 'edit_others_onrampquizes' );
        $role->add_cap( 'edit_private_onrampquizes' );
        $role->add_cap( 'delete_onrampquizes' );
        $role->add_cap( 'delete_published_onrampquizes' );
        $role->add_cap( 'delete_private_onrampquizes' );
        $role->add_cap( 'delete_others_onrampquizes' );


        // For Projects
        $role->add_cap( 'read_private_onrampprojects' );
        $role->add_cap( 'edit_others_onrampprojects' );
        $role->add_cap( 'edit_private_onrampprojects' );
        $role->add_cap( 'delete_onrampprojects' );
        $role->add_cap( 'delete_published_onrampprojects' );
        $role->add_cap( 'delete_private_onrampprojects' );
        $role->add_cap( 'delete_others_onrampprojects' );

        // For Submissions
        $role->add_cap( 'read_private_onrampsubmissions' );
        $role->add_cap( 'edit_others_onrampsubmissions' );
        $role->add_cap( 'edit_private_onrampsubmissions' );
        $role->add_cap( 'delete_onrampsubmissions' );
        $role->add_cap( 'delete_published_onrampsubmissions' );
        $role->add_cap( 'delete_private_onrampsubmissions' );
        $role->add_cap( 'delete_others_onrampsubmissions');

        // For Enrollment
        $role->add_cap( 'read_private_onrampenrollments' );
        $role->add_cap( 'edit_others_onrampenrollments' );
        $role->add_cap( 'edit_private_onrampenrollments' );
        $role->add_cap( 'delete_onrampenrollments' );
        $role->add_cap( 'delete_published_onrampenrollments' );
        $role->add_cap( 'delete_private_onrampenrollments' );
        $role->add_cap( 'delete_others_onrampenrollments');

        // For feedback
        $role->add_cap( 'read_private_onrampfeedbacks' );
        $role->add_cap( 'edit_others_onrampfeedbacks' );
        $role->add_cap( 'edit_private_onrampfeedbacks' );
        $role->add_cap( 'delete_onrampfeedbacks' );
        $role->add_cap( 'delete_published_onrampfeedbacks' );
        $role->add_cap( 'delete_private_onrampfeedbacks' );
        $role->add_cap( 'delete_others_onrampfeedbacks');
     

    }
}

function cpt_remove_capabilities()
{
    
        
        $manager_roles = array( 'administrator', 'editor' );
    
    foreach ($manager_roles as $the_role) {
        $role = get_role( $the_role );
        
        // For Quiz
        $role->remove_cap( 'read' );
        $role->remove_cap( 'edit_onrampquizes' );
        $role->remove_cap( 'publish_onrampquizes' );
        $role->remove_cap( 'edit_published_onrampquizes' );
        $role->remove_cap( 'read_private_onrampquizes' );
        $role->remove_cap( 'edit_others_onrampquizes' );
        $role->remove_cap( 'edit_private_onrampquizes' );
        $role->remove_cap( 'delete_onrampquizes' );
        $role->remove_cap( 'delete_published_onrampquizes' );
        $role->remove_cap( 'delete_private_onrampquizes' );
        $role->remove_cap( 'delete_others_onrampquizes' );

        // For Projects
        $role->remove_cap( 'read' );
        $role->remove_cap( 'edit_onrampprojects' );
        $role->remove_cap( 'publish_onrampprojects' );
        $role->remove_cap( 'edit_published_onrampprojects' );
        $role->remove_cap( 'read_private_onrampprojects' );
        $role->remove_cap( 'edit_others_onrampprojects' );
        $role->remove_cap( 'edit_private_onrampprojects' );
        $role->remove_cap( 'delete_onrampprojects' );
        $role->remove_cap( 'delete_published_onrampprojects' );
        $role->remove_cap( 'delete_private_onrampprojects' );
        $role->remove_cap( 'delete_others_onrampprojects' );


        // For Submissions
        $role->remove_cap( 'read' );
        $role->remove_cap( 'edit_onrampsubmissions' );
        $role->remove_cap( 'publish_onrampsubmissions' );
        $role->remove_cap( 'edit_published_onrampsubmissions' );
        $role->remove_cap( 'read_private_onrampsubmissions' );
        $role->remove_cap( 'edit_others_onrampsubmissions' );
        $role->remove_cap( 'edit_private_onrampsubmissions' );
        $role->remove_cap( 'delete_onrampsubmissions' );
        $role->remove_cap( 'delete_published_onrampsubmissions' );
        $role->remove_cap( 'delete_private_onrampsubmissions' );
        $role->remove_cap( 'delete_others_onrampsubmissions' );

        // For Enrollment
        $role->remove_cap( 'read' );
        $role->remove_cap( 'edit_onrampenrollments' );
        $role->remove_cap( 'publish_onrampenrollments' );
        $role->remove_cap( 'edit_published_onrampenrollments' );
        $role->remove_cap( 'read_private_onrampenrollments' );
        $role->remove_cap( 'edit_others_onrampenrollments' );
        $role->remove_cap( 'edit_private_onrampenrollments' );
        $role->remove_cap( 'delete_onrampenrollments' );
        $role->remove_cap( 'delete_published_onrampenrollments' );
        $role->remove_cap( 'delete_private_onrampenrollments' );
        $role->remove_cap( 'delete_others_onrampenrollments' );


        // For FeedBack
        $role->remove_cap( 'read' );
        $role->remove_cap( 'edit_onrampfeedbacks' );
        $role->remove_cap( 'publish_onrampfeedbacks' );
        $role->remove_cap( 'edit_published_onrampfeedbacks' );
        $role->remove_cap( 'read_private_onrampfeedbacks' );
        $role->remove_cap( 'edit_others_onrampfeedbacks' );
        $role->remove_cap( 'edit_private_onrampfeedbacks' );
        $role->remove_cap( 'delete_onrampfeedbacks' );
        $role->remove_cap( 'delete_published_onrampfeedbacks' );
        $role->remove_cap( 'delete_private_onrampfeedbacks' );
        $role->remove_cap( 'delete_others_onrampfeedbacks' );

        
    }
}
