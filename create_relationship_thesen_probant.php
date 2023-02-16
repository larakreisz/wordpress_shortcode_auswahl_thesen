<?php


if (!defined('WPINC'))
    die;

add_action('cred_save_data', 'lk_create_these_probant',10,2);
function lk_create_these_probant ($post_id, $form_data) {
  
$forms = array( 212 );
if ( in_array( $form_data['id'], $forms )) {

// id of probandt and these
$id_probant = $_POST['probandt-id'];
$id_these = get_the_ID();

  
// search if a connection between this probant and the thesis already exist
//$probanten_that_are_already_connected_to_this_these = toolset_get_related_posts($id_these, 'probant-these','child',1000000,0,array(),'post_id','parent');
$query = new WP_Query( 
    array(
        'post_type' => 'probant-these',
        'posts_per_page' => -1,
        'toolset_relationships' => array(
            array(
                'role' => 'intermediary',
                'related_to' => $id_probant,
                'role_to_query_by' => 'parent',
                'relationship' => 'probant-these'
            ),
            array(
                'role' => 'intermediary',
                'related_to' => $id_these,
                'role_to_query_by' => 'child',
                'relationship' => 'probant-these'
            )
        ),
        //'meta_key' => 'wpcf-genre',
        //'orderby' => 'meta_value',
        //'order' => 'ASC',
    )
);
$intermediary_posts = $query->posts;
$loop_iteration = 1;
  
  
//if it returns some posts
if($intermediary_posts){
  
            //now get the single posts fields values 
            foreach($intermediary_posts as $intermediary ){ 
   
                //get each Posts post data
                $intermediary_post_data = get_post($intermediary);
                //get each ID
                $intermediary_post_id = $intermediary_post_data->ID;
                                //get each posts field value
              
               if ($loop_iteration == 1) {
                 
                 //------------------------------------------------------ first loop interation
               
                 // Update intermediary -- insert new values
                  $intermediary = array(
                  'ID' => $intermediary_post_id,             

                  'meta_input'  => array ( 
                  'wpcf-these-n-p' => $_POST['these-n-p'],  
                  'wpcf-probant-n-p' => $_POST['probant-n-p'],  
                  ),   
                  );


                  // Update intermediary -- execute update
                  wp_update_post ($intermediary);
                   
                   
                   // increase $loop_iteration by 1
                   $loop_iteration += 1;
                 
                 
               
               } else {
                   
                   
                //------------------------------------------------------ if there is more than one intermediary -> delete it
                   
                wp_delete_post( $intermediary_post_id, $force_delete = true);
                   
                // increase $loop_iteration by 1
                   $loop_iteration += 1;
                
                   
           }}} else {
    
               //------------------------------------------------------ if both pots are not related/connected with each other yet
                 
                 
                 //make new connextion and new intermediary
                 //connect Probant and These 
                  $relationship_response = toolset_connect_posts(
                    $relationship = 'probant-these',
                    $id_probant,
                    $id_these
                  );  


                  $intermediary_post_id = $relationship_response['intermediary_post'];


                  // Update intermediary -- insert new values
                  $intermediary = array(
                  'ID' => $intermediary_post_id,             

                  'meta_input'  => array ( 
                  'wpcf-these-n-p' => $_POST['these-n-p'],  
                  'wpcf-probant-n-p' => $_POST['probant-n-p'],  
                  ),   
                  );


                  // Update intermediary -- execute update
                  wp_update_post ( $intermediary );
                              
               
           }     
       }
    }
  
  

