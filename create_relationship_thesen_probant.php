<?php


if (!defined('WPINC'))
    die;

add_action('cred_save_data', 'lk_create_these_probant',10,2);
function lk_create_these_probant ($post_id, $form_data) {
  
$forms = array( 212 );
if ( in_array( $form_data['id'], $forms )) {

// id of the current horse
$id_these = get_the_ID();
$id_probant = '37';
  
// search all probantenten, that are already connected to this these
$probanten_that_are_already_connected_to_this_these = toolset_get_related_posts($id_these, 'probant-these','child',1000000,0,array(),'post_id','parent');
  
  
//if it returns some posts
if($probanten_that_are_already_connected_to_this_these){
  
            //now get the single posts fields values 
            foreach($probanten_that_are_already_connected_to_this_these as $probant ){ 
   
                //get each Posts post data
                $probant_post_data = get_post($probant);
                //get each ID
                $probant_post_id = $probant_post_data->ID;
                                //get each posts field value
              
               if ($probant_post_id == $id_probant) {
                 
                 //------------------------------------------------------ noch bearbeiten ANFANG
               
                 // update already existing post
                 // Update intermediary -- insert new values
                  $intermediary_pferd_benutzer = array(
                  'ID' => $intermediary_post_id,             

                  'meta_input'  => array ( 
                  'wpcf-name-der-person-pferd' => $_POST['vorname'] . ' ' . $_POST['nachname'],  
                  'wpcf-telefonnummer-der-person-pferd' => $_POST['telefonnummer'],  
                  'wpcf-funktion-der-person' => $_POST['funktion-der-person'],  
                  'wpcf-covid-19-position-der-kontaktperson-in-der-kontaktliste' => $_POST['position-in-kontaktliste'],  
                  'wpcf-id-der-person' => $single_benutzer_post_id,  

                  'wpcf-pferderechte' => array(                    
                  "wpcf-fields-checkboxes-option-c21759eac7d2ce4422c3e524d7d14a55-1" => $_POST['bewegen'],
                  "wpcf-fields-checkboxes-option-6701823c09e78919eeea9453f1082081-1" => $_POST['weide'],     
                  "wpcf-fields-checkboxes-option-540d77c14903af7221cc765a2c081c6a-1" => $_POST['futter'],
                  "wpcf-fields-checkboxes-option-5b4ec38b2042a18074c98c7445bc7e86-1" => $_POST['medikamente'],  
                  "wpcf-fields-checkboxes-option-9cfc997aed28f00e0873a0371a86e35d-1" => $_POST['betreuungsplan'],
                  "wpcf-fields-checkboxes-option-c2e386f0f644ea23d766b322d904be62-1" => $_POST['trainingstagebuch'],
                  "wpcf-fields-checkboxes-option-40386dd323ead0e3b79c3840b0aadc7c-1" => 'Kontaktperson',
                  "wpcf-fields-checkboxes-option-0c6e61ecf3b02b1e8bb867e1ca7d5a15-1" => $_POST['administrator'],
                  ),   
                  ),   
                  );


                  // Update intermediary -- execute update
                  wp_update_post ( $intermediary_pferd_benutzer );
                 
                 
                 
                 
                 
               
               } else {
                 
                 
                 //make new connextion and new intermediary
                 //connect Pferd und Benutzerpost 
                  $relationship_response = toolset_connect_posts(
                    $relationship = 'pferd-selbstportrat',
                    $id_horse,
                    $single_benutzer_post_id
                  );  


                  $intermediary_post_id = $relationship_response['intermediary_post'];


                  // Update intermediary -- insert new values
                  $intermediary_pferd_benutzer = array(
                  'ID' => $intermediary_post_id,             

                  'meta_input'  => array ( 
                  'wpcf-name-der-person-pferd' => $_POST['vorname'] . ' ' . $_POST['nachname'],  
                  'wpcf-telefonnummer-der-person-pferd' => $_POST['telefonnummer'],  
                  'wpcf-funktion-der-person' => $_POST['funktion-der-person'],  
                  'wpcf-covid-19-position-der-kontaktperson-in-der-kontaktliste' => $_POST['position-in-kontaktliste'],  
                  'wpcf-id-der-person' => $single_benutzer_post_id,  

                  'wpcf-pferderechte' => array(                    
                  "wpcf-fields-checkboxes-option-c21759eac7d2ce4422c3e524d7d14a55-1" => $_POST['bewegen'],
                  "wpcf-fields-checkboxes-option-6701823c09e78919eeea9453f1082081-1" => $_POST['weide'],     
                  "wpcf-fields-checkboxes-option-540d77c14903af7221cc765a2c081c6a-1" => $_POST['futter'],
                  "wpcf-fields-checkboxes-option-5b4ec38b2042a18074c98c7445bc7e86-1" => $_POST['medikamente'],  
                  "wpcf-fields-checkboxes-option-9cfc997aed28f00e0873a0371a86e35d-1" => $_POST['betreuungsplan'],
                  "wpcf-fields-checkboxes-option-c2e386f0f644ea23d766b322d904be62-1" => $_POST['trainingstagebuch'],
                  "wpcf-fields-checkboxes-option-40386dd323ead0e3b79c3840b0aadc7c-1" => 'Kontaktperson',
                  "wpcf-fields-checkboxes-option-0c6e61ecf3b02b1e8bb867e1ca7d5a15-1" => $_POST['administrator'],
                  ),   
                  ),   
                  );


                  // Update intermediary -- execute update
                  wp_update_post ( $intermediary_pferd_benutzer );
                 
                 
                  //------------------------------------------------------ noch bearbeiten ENDE
               
               
               }
              
            }
}
  
  
// Klammern am Ende überprüfen
