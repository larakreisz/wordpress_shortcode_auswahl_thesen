<?php

/*
 * The plugin luther_auswahl_thesen
 * 
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link                https://github.com/larakreisz/wordpress_shortcode_auswahl_thesen
 * @since               February 8, 2023
 * @package             Luther Auswahl Thesen
 * 
 * @wordpress-plugin
 * Plugin Name:         Luther Auswahl Thesen
 * Plugin URI:          https://github.com/larakreisz/wordpress_shortcode_auswahl_thesen
 * Description:         The plugin generates a shortcode, that provides for each user the relevant luther thesis
 * Version:             1.0
 * Author:              Lara Kreisz
 * Author URI:          https://github.com/larakreisz/wordpress_shortcode_auswahl_thesen
 */
if (!defined('WPINC'))
    die;



// ------------------------------------------- SHORTCODE ------------------------------------------

add_shortcode('luther-thesen-auswahl', 'luther_thesen_auswahl_func');


function luther_thesen_auswahl_func( $atts ) {
	
// extract shortcode attributes
extract( shortcode_atts( array(
    'loesungszahl' => [1,2],
	'entwicklungszahl' => [1,2],
	'beziehungszahl' => [1,2],
	'schluesselzahl' => [1,2],
	'geistigezahl' => [1,2],
	'psychezahl' => [1,2],
	'koerperzahl' => [1,2],
	'materiezahl' => [1,2],
	'zusatzzahl' => [1,2],
    ), $atts ) );
	 

//-----------------
// Sub query #1: Lösungszahl
//-----------------
$args1 = [
   'post_type'      => 'these',
   'posts_per_page' => 1000,
   //'orderby'        => 'date',
   //'order'          => 'asc',
   'meta_query'     => [
	'relation' => 'AND',
    [
            'key'      => 'wpcf-thesen-zahl',
            'value'    => $loesungszahl,
            'compare'  => 'IN',
            //'type'     => 'NUMERIC'
        ],
	[
            'key'      => 'wpcf-thesen-position',
            'value'    => 6,
            'compare'  => '=',
            'type'     => 'NUMERIC'
        ],
    ],
];

//-----------------
// Sub query #2:
//-----------------
$args2 = [
   'post_type'      => 'these',
   'posts_per_page' => 1000,
   //'orderby'        => 'date',
   //'order'          => 'desc',
   'meta_query'     => [
       'relation' => 'AND',
       [
            'key'      => 'wpcf-thesen-zahl',
            'value'    => $entwicklungszahl,
            'compare'  => 'IN',
            //'type'     => 'NUMERIC'
        ],
	[
            'key'      => 'wpcf-thesen-position',
            'value'    => 5,
            'compare'  => '=',
            'type'     => 'NUMERIC'
        ],
    ],
];
	

//-----------------
// Sub query #3: Beziehungszahl
//-----------------
$args3 = [
   'post_type'      => 'these',
   'posts_per_page' => 1000,
   //'orderby'        => 'date',
   //'order'          => 'asc',
   'meta_query'     => [
	'relation' => 'AND',
    [
            'key'      => 'wpcf-thesen-zahl',
            'value'    => $beziehungszahl,
            'compare'  => 'IN',
            //'type'     => 'NUMERIC'
        ],
	[
            'key'      => 'wpcf-thesen-position',
            'value'    => 7,
            'compare'  => '=',
            'type'     => 'NUMERIC'
        ],
    ],
];
	
//-----------------
// Sub query #4: Schlüsselzahl
//-----------------
$args4 = [
   'post_type'      => 'these',
   'posts_per_page' => 1000,
   //'orderby'        => 'date',
   //'order'          => 'asc',
   'meta_query'     => [
	'relation' => 'AND',
    [
            'key'      => 'wpcf-thesen-zahl',
            'value'    => $schluesselzahl,
            'compare'  => 'IN',
            //'type'     => 'NUMERIC'
        ],
	[
            'key'      => 'wpcf-thesen-position',
            'value'    => 8,
            'compare'  => '=',
            'type'     => 'NUMERIC'
        ],
    ],
];	
	
//-----------------
// Sub query #5: Geistige Zahl
//-----------------
$args5 = [
   'post_type'      => 'these',
   'posts_per_page' => 1000,
   //'orderby'        => 'date',
   //'order'          => 'asc',
   'meta_query'     => [
	'relation' => 'AND',
    [
            'key'      => 'wpcf-thesen-zahl',
            'value'    => $geistigezahl,
            'compare'  => 'IN',
            //'type'     => 'NUMERIC'
        ],
	[
            'key'      => 'wpcf-thesen-position',
            'value'    => 1,
            'compare'  => '=',
            'type'     => 'NUMERIC'
        ],
    ],
];		

//-----------------
// Sub query #6: Psychezahl 
//-----------------
$args6 = [
   'post_type'      => 'these',
   'posts_per_page' => 1000,
   //'orderby'        => 'date',
   //'order'          => 'asc',
   'meta_query'     => [
	'relation' => 'AND',
    [
            'key'      => 'wpcf-thesen-zahl',
            'value'    => $psychezahl,
            'compare'  => 'IN',
            //'type'     => 'NUMERIC'
        ],
	[
            'key'      => 'wpcf-thesen-position',
            'value'    => 2,
            'compare'  => '=',
            'type'     => 'NUMERIC'
        ],
    ],
];	

//-----------------
// Sub query #7: Körperzahl
//-----------------
$args7 = [
   'post_type'      => 'these',
   'posts_per_page' => 1000,
   //'orderby'        => 'date',
   //'order'          => 'asc',
   'meta_query'     => [
	'relation' => 'AND',
    [
            'key'      => 'wpcf-thesen-zahl',
            'value'    => $koerperzahl,
            'compare'  => 'IN',
            //'type'     => 'NUMERIC'
        ],
	[
            'key'      => 'wpcf-thesen-position',
            'value'    => 3,
            'compare'  => '=',
            'type'     => 'NUMERIC'
        ],
    ],
];		
	
//-----------------
// Sub query #8: Materiezahl
//-----------------
$args8 = [
   'post_type'      => 'these',
   'posts_per_page' => 1000,
   //'orderby'        => 'date',
   //'order'          => 'asc',
   'meta_query'     => [
	'relation' => 'AND',
    [
            'key'      => 'wpcf-thesen-zahl',
            'value'    => $materiezahl,
            'compare'  => 'IN',
            //'type'     => 'NUMERIC'
        ],
	[
            'key'      => 'wpcf-thesen-position',
            'value'    => 4,
            'compare'  => '=',
            'type'     => 'NUMERIC'
        ],
    ],
];		
	
	
//-----------------
// Sub query #9: Materiezahl
//-----------------
$args9 = [
   'post_type'      => 'these',
   'posts_per_page' => 1000,
   //'orderby'        => 'date',
   //'order'          => 'asc',
   'meta_query'     => [
	'relation' => 'AND',
    [
            'key'      => 'wpcf-thesen-zahl',
            'value'    => $zusatzzahl,
            'compare'  => 'IN',
            //'type'     => 'NUMERIC'
        ],
	[
            'key'      => 'wpcf-thesen-position',
            'value'    => 9,
            'compare'  => '=',
            'type'     => 'NUMERIC'
        ],
    ],
];			
	
	
	
//-----------------------------------------------------------
// Combined queries #1 + #2 + #3 +#4 +#5 + #6 + #7 +#8 +#9:
//-----------------------------------------------------------
$args = [
    'combined_query' => [        
	'args'           => [ $args1, $args2, $args3, $args4, $args5, $args6, $args7, $args8, $args9 ],
	'union'          => 'UNION',
	'posts_per_page' => 1000,
	'orderby'        => 'title',
	'order'          => 'desc',
    ]
];

//---------
// Output:
//---------
	
// new WP_query
$thesen_auswahl = new WP_Query( $args );

// loop number
$loop_nr = 1;
	
// loop
if( $thesen_auswahl->have_posts() ):
	
	$output = '<div>';
	while( $thesen_auswahl->have_posts() ): $thesen_auswahl->the_post();
		$output .= '<div class="row" style="margin-top:20px;"><div class="col-md-1">'.$loop_nr.'</div><div class="col-md-8">'.do_shortcode("[types field='thesen-text'][/types]").'</div><div class="col-md-3">'.do_shortcode("[cred_form form='probant-these-relationship-anlegen']").'</div></div>';
	
	
	$loop_nr += 1;
    	
	endwhile;
	wp_reset_postdata();
	$output .= '</div>';
else:
	$output = '<div>Sorry no posts found!!</div>';
endif;  
	
	
	
return $output;
}






// ---------- HOOK 1---- PHP, THAT PERFORMS SOME CUSTOM ACTION AFTER THE FORM INSIDE THE SHORTCODE IS SUBMITTED ------------------------------------------

add_action('cred_save_data', 'lk_create_these_probant_intermediary',10,2);
function lk_create_these_probant_intermediary ($post_id, $form_data) {
  
$forms = array( 212 );
if ( in_array( $form_data['id'], $forms )) {

// id of probandt and these
$id_probant = $_POST['probandt-id'];
$id_these = get_the_ID();

  
// search if a connection between this probant and the thesis already exist
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










// ---------- HOOK 2---- PHP, THAT PERFORMS SOME CUSTOM ACTION AFTER THE FORM ON THE BOTTOM OF THE PAGE IS SUBMITTED ------------------------------------------

add_action('cred_save_data', 'lk_calculate_statistic_probant',10,2);
function lk_calculate_statistic_probant ($post_id, $form_data) {
  
$forms = array( 228 );
if ( in_array( $form_data['id'], $forms )) {

// id of probandt and these
$id_probant = get_the_ID();

  
// Evaluation: Lösungszahl 1 -------------------------------------------------------
$query_l1 = new WP_Query( 
    array(
        'post_type' => 'probant-these',
        'posts_per_page' => -1,
        'toolset_relationships' => array(
            array(
                'role' => 'intermediary',
                'related_to' => $id_probant,
                'role_to_query_by' => 'parent',
                'relationship' => 'probant-these'
         )),
	 'meta_query'     => [
	    'relation' => 'AND',
	    	[
		    'key'      => 'wpcf-thesen-zahl',
		    'value'    => $_POST['wpcf-probant-loesungszahl-01'],
		    'compare'  => 'IN',
		    //'type'     => 'NUMERIC'
		],
		[
		    'key'      => 'wpcf-thesen-position',
		    'value'    => 6,
		    'compare'  => '=',
		    'type'     => 'NUMERIC'
		],
	],
        //'meta_key' => 'wpcf-genre',
        //'orderby' => 'meta_value',
        //'order' => 'ASC',
    )
);
	
	
$intermediary_l1 = $query_l1->posts;
$l1_sum = 0; // --> Lösungzahl Summe, probant field 'wpcf-probant-loesungszahl-01-sum' 

//if it returns some posts
if($intermediary_l1){
  
            //now get the single posts fields values 
            foreach($intermediary_l1 as $intermediary ){ 
   
                //get each Posts post data
                $intermediary_post_data = get_post($intermediary);
                //get each ID
                $intermediary_post_id = $intermediary_post_data->ID;
                                //get each posts field value
		//get probant-n-p field
		$wpcf_probant_n_p = get_post_meta( $intermediary_post_id, 'wpcf-probant-n-p', true );
		//get these-n-p field
		$wpcf_these_n_p = get_post_meta( $intermediary_post_id, 'wpcf-these-n-p', true );
                 
                 if ($wpcf_probant_n_p == $wpcf_these_n_p) {
                 
                 //------------------------------------------------------ $l1_sum = $l1_sum + 1
               
                 $l1_sum += 1
           
           	}}
	
		update_post_meta( $id_probant, 'wpcf-probant-loesungszahl-01-sum', $l1_sum );

	    }
	
	
// Evaluation: Lösungszahl 2 ----------------------------------------------------------------------------------------
	
	
	
	
	
	
       }
    }
