<?php


add_action( 'rest_api_init', array('Generate_User_Registration','registerRoute'));



class Generate_User_Registration extends WP_REST_Controller
{


    function registerRoute()
    {
        
        register_rest_route( 'onramp/v1', '/register', array(
        
                'methods' =>'POST',
                'callback' => array('Generate_User_Registration','handleRegister')
                
            ) );

            register_rest_route( 'onramp/v1', '/project_verify', array(
                
                        'methods' =>'GET',
                        'callback' => array('Generate_User_Registration','hasPost')
                        
                    ) );

                    register_rest_route( 'onramp/v1', '/submission_listing', array(
                        
                                'methods' =>'GET',
                                'callback' => array('Generate_User_Registration','getSubmissionList')
                                
                            ) );
    }


    function hasPost($request)
    {

        $params =  $request->get_params();

        //return $params;

        $allowedParams =  array('post_id','post_type');

        foreach ($params as $key => $value) {
            if (!in_array($key, $allowedParams)) {
                $response = array('success'=>false , 'code'=>"invalid_parameters" , 'message'=>"Insecure Data Entered");
                return $response;
            }
        }

        $returnResponse = array("success"=>false,"message"=>"Post Doesn't Exist");

        // return is_null($params['post_id']);

        if (!is_null($params['post_id'])) {
            // return get_post_type( $params['post_id'] ) ;
            if (get_post_type( $params['post_id'] ) == $params['post_type']) {
                $returnResponse['success'] = true;
                $returnResponse['message'] = "Project Exists";
            }
        }

        return $returnResponse;
    }

    function getSubmissionList(){
        // if(!is_user_logged_in()){
        //     return array("success"=>false,"msg"=>"Access Denied");
        // }
        $the_query = new WP_Query( array( 'post_type' => 'post'));
        
        // The Loop
        $array = array();
        if ( $the_query->have_posts() ) {
            // /echo '<ul>';
            while ( $the_query->have_posts() ) {
                // $the_query->the_post();
                $array[] = get_the_title();
                // echo '<li>' . get_the_title() . '</li>';
            }
            // echo '</ul>';
            /* Restore original Post Data */
            wp_reset_postdata();
        } else {
            // no posts found
            $array[] = "No contetnt";
        }
        return $array;
    }

    function handleRegister($request)
    {
        $params = $request->get_params();

        $allowedParams = array('user_login','user_email','user_pass');

        // onramp-student

        foreach ($params as $key => $value) {
            if (!in_array($key, $allowedParams)) {
                $response = array('success'=>false , 'code'=>"invalid_parameters" , 'message'=>"Insecure Data Entered");
                return $response;
            }
        }

        // Adding the role of the registered user
        $params['role'] = "onramp-student";

        // $id = wp_insert_user($params);
        // return wp_new_user_notification($id);
        
        $data = wp_insert_user($params);

        //Since the above function wp_insert_user return error json when failure and user id when success, the below will add   'success' key to the returning response json
        
        if (is_object($data)) {
            $newData = array('success'=>false , 'error'=>$data->errors);
            
            return $newData;
            return json_decode(json_encode($data), true);
        } else {
            wp_new_user_notification($data);
            $successResponse = array('success'=>true,'id'=>$data);
            return $successResponse;
        }
        
        //return wp_insert_user($params);
    }
}
