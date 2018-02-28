<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'onramp_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/CMB2/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if (file_exists( dirname( __FILE__ ) . '/cmb2/init.php' )) {
    require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif (file_exists( dirname( __FILE__ ) . '/CMB2/init.php' )) {
    require_once dirname( __FILE__ ) . '/CMB2/init.php';
}
/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' cmb2_box parameter
 *
 * @param  CMB2 object $cmb CMB2 object.
 *
 * @return bool             True if metabox should show
 */
function onramp_show_if_front_page($cmb)
{
    // Don't show this metabox if it's not the front page template.
    if (get_option( 'page_on_front' ) !== $cmb->object_id) {
        return false;
    }
    return true;
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field object $field Field object.
 *
 * @return bool                     True if metabox should show
 */
function onramp_hide_if_no_cats($field)
{
    // Don't show this field if not in the cats category.
    if (! has_tag( 'cats', $field->object_id )) {
        return false;
    }
    return true;
}

/**
 * Manually render a field.
 *
 * @param  array      $field_args Array of field arguments.
 * @param  CMB2_Field $field      The field object.
 */
function onramp_render_row_cb($field_args, $field)
{
    $classes     = $field->row_classes();
    $id          = $field->args( 'id' );
    $label       = $field->args( 'name' );
    $name        = $field->args( '_name' );
    $value       = $field->escaped_value();
    $description = $field->args( 'description' );
    ?>
    <div class="custom-field-row <?php echo esc_attr( $classes ); ?>">
        <p><label for="<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $label ); ?></label></p>
        <p><input id="<?php echo esc_attr( $id ); ?>" type="text" name="<?php echo esc_attr( $name ); ?>" value="<?php echo $value; ?>"/></p>
        <p class="description"><?php echo esc_html( $description ); ?></p>
    </div>
    <?php
}

/**
 * Manually render a field column display.
 *
 * @param  array      $field_args Array of field arguments.
 * @param  CMB2_Field $field      The field object.
 */
function onramp_display_text_small_column($field_args, $field)
{
    ?>
    <div class="custom-column-display <?php echo esc_attr( $field->row_classes() ); ?>">
        <p><?php echo $field->escaped_value(); ?></p>
        <p class="description"><?php echo esc_html( $field->args( 'description' ) ); ?></p>
    </div>
    <?php
}

/**
 * Conditionally displays a message if the $post_id is 2
 *
 * @param  array             $field_args Array of field parameters.
 * @param  CMB2_Field object $field      Field object.
 */
function onramp_before_row_if_2($field_args, $field)
{
    if (2 == $field->object_id) {
        echo '<p>Testing <b>"before_row"</b> parameter (on $post_id 2)</p>';
    } else {
        echo '<p>Testing <b>"before_row"</b> parameter (<b>NOT</b> on $post_id 2)</p>';
    }
}

/**
 * Only show this box in the CMB2 REST API if the user is logged in.
 *
 * @param  bool                 $is_allowed     Whether this box and its fields are allowed to be viewed.
 * @param  CMB2_REST_Controller $cmb_controller The controller object.
 *                                              CMB2 object available via `$cmb_controller->rest_box->cmb`.
 *
 * @return bool                 Whether this box and its fields are allowed to be viewed.
 */
function onramp_limit_rest_view_to_logged_in_users($is_allowed, $cmb_controller)
{
    if (! is_user_logged_in()) {
        $is_allowed = false;
    }

    return $is_allowed;
}


// Custom Post Type Meta Boxes


// For Quiz

//add_action( 'cmb2_admin_init', 'onramp_register_repeatable_group_field_metabox' );
add_action( 'cmb2_init', 'onramp_register_quiz_repeatable_group_field_metabox' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function onramp_register_quiz_repeatable_group_field_metabox()
{
    $prefix = 'onramp_rest_quiz_';

    /**
     * Repeatable Field Groups
     */
    $cmb_group = new_cmb2_box( array(
        'id'           => $prefix . 'metabox',
        'title'        => esc_html__( 'Quiz Questions', 'cmb2' ),
        'object_types' => array( 'onrampquiz' ),
        'show_in_rest' => WP_REST_Server::ALLMETHODS,
    ) );

    // $group_field_id is the field id string, so in this case: $prefix . 'demo'
    $group_field_id = $cmb_group->add_field( array(
        'id'          => $prefix . 'demo',
        'type'        => 'group',
        // 'description' => esc_html__( 'Generates reusable form entries', 'cmb2' ),
        'options'     => array(
            'group_title'   => esc_html__( 'Question {#}', 'cmb2' ), // {#} gets replaced by row number
            'add_button'    => esc_html__( 'Add Another Question', 'cmb2' ),
            'remove_button' => esc_html__( 'Remove Question', 'cmb2' ),
            'sortable'      => true, // beta
            // 'closed'     => true, // true to have the groups closed by default
        ),
		
        ) );

    /**
     * Group fields works the same, except ids only need
     * to be unique to the group. Prefix is not needed.
     *
     * The parent field's id needs to be passed as the first argument.
     */
    $cmb_group->add_group_field( $group_field_id, array(
        'name'       => esc_html__( 'Question', 'cmb2' ),
        'id'         => 'title',
        'type'       => 'text',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );


    $cmb_group->add_group_field( $group_field_id, array(
        'name'       => esc_html__( 'Answers', 'cmb2' ),
        'id'         => 'answers',
        'type'       => 'text',
        'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );

    $cmb_group->add_group_field( $group_field_id, array(
        'name'       => esc_html__( 'Correct Answer ID', 'cmb2' ),
        'id'         => 'c',
        'type'       => 'text',
        'before_field' => ' '
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );


  
}



// For Project

add_action( 'cmb2_init', 'onramp_register_project_quiz_selection_metabox' );
function onramp_register_project_quiz_selection_metabox()
{
    $prefix = 'onramp_rest_project_';

    $cmb_project_group = new_cmb2_box( array(
        'id'           => $prefix . 'metabox',
        'title'        => esc_html__( 'Project Exta Information', 'cmb2' ),
        'object_types' => array( 'onrampproject' ),
        'show_in_rest' => WP_REST_Server::ALLMETHODS,
    ) );


    $cmb_project_group->add_field( array(
        'name' => esc_html__( 'Short Description', 'cmb2' ),
        'desc' => esc_html__( '200 Character Limit', 'cmb2' ),
        'id'   => 'description',
        'type' => 'textarea',
        'attributes'=>array("maxlength" =>200)
    ) );


    $cmb_project_group->add_field( array(
        'name'             => esc_html__( 'Select Quiz', 'cmb2' ),
        'desc'             => esc_html__( 'field description (optional)', 'cmb2' ),
        'id'               => 'assigned_quiz',
        'type'             => 'select',
        'show_option_none' => true,
        'options_cb' => 'cmb2_get_quiz_for_project_options',
    ) );

    $cmb_project_group->add_field( array(
        'name'    => 'Content after Quiz',
        'desc'    => 'field description (optional)',
        'id'      => 'afterquiz_content',
        'type'    => 'wysiwyg',
        'options' => array(),
    ) );

    $cmb_project_group->add_field( array(
        'name'             => 'Has Submissions',
        'desc'             => 'Select an option',
        'id'               => 'has_submission',
        'type'             => 'select',        
        'default'          => 'no',
        'options'          => array(
            'yes' => __( 'Yes', 'cmb2' ),
            'no'   => __( 'No', 'cmb2' )
        ),
    ) );

    $cmb_project_group->add_field( array(
        'name'             => 'Has Feedback',
        'desc'             => 'Select an option',
        'id'               => 'has_feedback',
        'type'             => 'select',        
        'default'          => 'yes',
        'options'          => array(
            'yes' => __( 'Yes', 'cmb2' ),
            'no'   => __( 'No', 'cmb2' )
        ),
    ) );



  
}




// Extra Calls

function cmb2_get_quiz_for_project_options() {
    
        $args = wp_parse_args( $query_args, array(
            'post_type'   => 'onrampquiz',
        ) );
    
        $posts = get_posts( $args );
    
        $post_options = array();
        if ( $posts ) {
            foreach ( $posts as $post ) {
              $post_options[ $post->ID ] = $post->post_title;
            }
        }
    
        return $post_options;
    }

    // function cmb2_get_quiz_for_project_options() {
    //     return cmb2_get_quiz_for_project_options();
    // }




    // For Enrollments

add_action( 'cmb2_init', 'onramp_register_user_project_enrollment' );
function onramp_register_user_project_enrollment()
{
    $prefix = 'onramp_rest_enrollment_';

    $cmb_project_group = new_cmb2_box( array(
        'id'           => $prefix . 'metabox',
        'title'        => esc_html__( 'Enrollment Information', 'cmb2' ),
        'object_types' => array( 'onrampenrollment' ),
        'show_in_rest' => WP_REST_Server::ALLMETHODS,
    ) );


    $cmb_project_group->add_field( array(
        'name' => esc_html__( 'Enrolled Project', 'cmb2' ),
        'desc' => esc_html__( 'field description (optional)', 'cmb2' ),
        'id'   => 'enrolled_project',
        'type' => 'text',
        'save_field'  => true, // Otherwise CMB2 will end up removing the value.
        'attributes'  => array(
            'readonly' => 'readonly',
            // 'disabled' => 'disabled',
        ),
    ) );

    $cmb_project_group->add_field( array(
        'name'             => 'Completed',
        'desc'             => 'Select an option',
        'id'               => 'completion_status',
        'type'             => 'select',        
        'default'          => 'no',
        'options'          => array(
            'yes' => __( 'Yes', 'cmb2' ),
            'no'   => __( 'No', 'cmb2' )
        ),
    ) );


   


  
}