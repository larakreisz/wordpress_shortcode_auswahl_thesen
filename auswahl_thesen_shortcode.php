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



// ------------------------------------------- SHORTCODE 1 ------------------------------------------

add_shortcode('luther-thesen-auswahl', 'luther_thesen_auswahl_func');


function luther_thesen_auswahl_func( $atts ) {
	
// extract shortcode attributes
extract( shortcode_atts( array(
	'id_probant' => '124',
    'loesungszahl' => [1,2],
	'entwicklungszahl' => [1,2],
	'beziehungszahl' => [1,2],
	'schluesselzahl' => [1,2],
	'geistigezahl' => [1,2],
	'psychezahl' => [1,2],
	'koerperzahl' => [1,2],
	'materiezahl' => [1,2],
	'zusatzzahl' => [1,2],
	'print' => 'no'
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
	
	// step 1: start building the shortcode content
	$output = '<div>';
	
	while( $thesen_auswahl->have_posts() ): $thesen_auswahl->the_post();
	
	// shortcode content ----> NO PRINT ------------------------------------------------------
	if ($print == 'no') {
	
	// step 2: load the form
	$form = do_shortcode("[cred_form form='probant-these-relationship-anlegen']");
	
	// step 3: continue building the shortcode content
	$output .= '<div class="row" style="margin-top:20px;">
		<div class="col-md-1">'.$loop_nr.'</div>
		<div class="col-md-8">'.do_shortcode("[types field='thesen-text'][/types]").'</div>
		<div class="col-md-3">';
	
	// step 4: to check, if we already said "disagree/agree", we need to query if an itermetiary post (probant-these) already exists. We get the $id_probant as a shortcode_parameter (fallback value is '124'). For example: [luther-thesen-auswahl id_probant="[wpv-search-term param="probant-id"]"]. The id of the current thesis in the loop can be fetched in the following way: $id_these =  get_the_ID(); 
	
	$id_these =  get_the_ID(); // test: $id_these ='856';

  
	// search if a connection between this probant and the thesis already exist
	$query_intermediary_probant_these = new WP_Query( 
    	array(
			'post_type' => 'probant-these',
			'posts_per_page' => 1,
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
		)
	);
	
	
	// loop
	if( $query_intermediary_probant_these -> have_posts() ) {
		while( $query_intermediary_probant_these -> have_posts() ) { 
			$query_intermediary_probant_these -> the_post();
			
		// step 5: continue building the shortcode content
		$probant_n_p = do_shortcode("[types field='probant-n-p'][/types]");
		$color = '#000000';
		if ($probant_n_p == 'n') {$color = '#ff0000';}
        if ($probant_n_p == 'p') {$color = '#008000';}

		$output .= '<div><span style="color:' . $color . '; font-weight:bold;">✓ Abgestimmt: '. $probant_n_p . '</span></div>';
			
		}
	}
	
	// step 6: continue building the shortcode content
	$output .= '<div>'. $form. '</div></div></div>';
		
	} else {

	
	// shortcode content ----> PRINT ------------------------------------------------------
		$output .= '<div class="row" style="margin-top:20px;"><div class="col-md-1">'.$loop_nr.'</div><div class="col-md-8">'.do_shortcode("[types field='thesen-text'][/types]").'</div><div class="col-md-3"><div><input type="checkbox" disabled> Ich stimme zu</div><div><input type="checkbox" disabled> Ich stimme nicht zu</div></div></div>';

	}
	
	$loop_nr += 1;
	
    	
	endwhile;
	wp_reset_postdata();
	// step 7: continue building the shortcode content
	$output .= '</div>';
else:
	$output = '<div>Sorry no posts found!!</div>';
endif;  
	
	
	
return $output;
}







// ---------- HOOK 1---- PHP, THAT PERFORMS SOME CUSTOM ACTION AFTER THE FORM INSIDE THE SHORTCODE IS SUBMITTED ------------------------------------------



add_action('cred_save_data', 'lk_create_these_probant_intermediary',99,2);
function lk_create_these_probant_intermediary ($post_id, $form_data) {
  
$forms = array( 212 );
if ( in_array( $form_data['id'], $forms )) {

// id of probandt and these
$id_probant = $_POST['probandt-id'];
$id_these = get_the_ID();


$found_agree = array_search("Ich_stimme_zu",$_POST);
$found_disagree = array_search("Ich_stimme_nicht_zu",$_POST);


if(!empty($found_agree)) { // form_submit_disagree => Disagree-Button
	 $probant_n_p = 'p';
}else if(!empty($found_disagree)){ // form_submit_agree => Agree-Button
	$probant_n_p = 'n';
}


  
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
                  'wpcf-probant-n-p' => $probant_n_p,  
		  'wpcf-these-zahl' => $_POST['these-zahl'], 
		  'wpcf-these-position' => $_POST['these-position'], 		
		  'wpcf-these-zufall' => $_POST['these-zufall'],			  
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
                  'wpcf-probant-n-p' => $probant_n_p,  
		  'wpcf-these-zahl' => $_POST['these-zahl'], 
		  'wpcf-these-position' => $_POST['these-position'],
		  'wpcf-these-zufall' => $_POST['these-zufall'],			  
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
		    'key'      => 'wpcf-these-zahl',
		    'value'    => $_POST['wpcf-probant-loesungszahl-01'],
		    'compare'  => '=',
		    'type'     => 'NUMERIC'
		],
		[
		    'key'      => 'wpcf-these-position',
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
               
                 $l1_sum += 1;
           
           	}}
	
		$l1_sum = $l1_sum * 20;
		update_post_meta( $id_probant, 'wpcf-probant-loesungszahl-01-sum', $l1_sum );

	    }
	
	
// Evaluation: Lösungszahl 2 ----------------------------------------------------------------------------------------
	
$query_l2 = new WP_Query( 
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
		    'key'      => 'wpcf-these-zahl',
		    'value'    => $_POST['wpcf-probant-loesungszahl-02'],
		    'compare'  => '=',
		    'type'     => 'NUMERIC'
		],
		[
		    'key'      => 'wpcf-these-position',
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
	
	
$intermediary_l2 = $query_l2->posts;
$l2_sum = 0; // --> Lösungzahl Summe, probant field 'wpcf-probant-loesungszahl-02-sum' 

//if it returns some posts
if($intermediary_l2){
  
            //now get the single posts fields values 
            foreach($intermediary_l2 as $intermediary ){ 
   
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
                 
                 //------------------------------------------------------ $l2_sum = $l2_sum + 1
               
                 $l2_sum += 1;
           
           	}}
	
	    $l2_sum = $l2_sum * 20;
        update_post_meta( $id_probant, 'wpcf-probant-loesungszahl-02-sum', $l2_sum );

	    }
	
	
// Evaluation: Lösungszahl 3 ----------------------------------------------------------------------------------------
	
$query_l3 = new WP_Query( 
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
		    'key'      => 'wpcf-these-zahl',
		    'value'    => $_POST['wpcf-probant-loesungszahl-03'],
		    'compare'  => '=',
		    'type'     => 'NUMERIC'
		],
		[
		    'key'      => 'wpcf-these-position',
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
	
	
$intermediary_l3 = $query_l3->posts;
$l3_sum = 0; // --> Lösungzahl Summe, probant field 'wpcf-probant-loesungszahl-03-sum' 

//if it returns some posts
if($intermediary_l3){
  
            //now get the single posts fields values 
            foreach($intermediary_l3 as $intermediary ){ 
   
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
                 
                 //------------------------------------------------------ $l3_sum = $l3_sum + 1
               
                 $l3_sum += 1;
           
           	}}
	
	    $l3_sum = $l3_sum * 20;
		update_post_meta( $id_probant, 'wpcf-probant-loesungszahl-03-sum', $l3_sum );

	    }
	
	
// Evaluation: Lösungszahl 4 ----------------------------------------------------------------------------------------	
	
$query_l4 = new WP_Query( 
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
		    'key'      => 'wpcf-these-zahl',
		    'value'    => $_POST['wpcf-probant-loesungszahl-04'],
		    'compare'  => '=',
		    'type'     => 'NUMERIC'
		],
		[
		    'key'      => 'wpcf-these-position',
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
	
	
$intermediary_l4 = $query_l4->posts;
$l4_sum = 0; // --> Lösungzahl Summe, probant field 'wpcf-probant-loesungszahl-04-sum' 

//if it returns some posts
if($intermediary_l4){
  
            //now get the single posts fields values 
            foreach($intermediary_l4 as $intermediary ){ 
   
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
                 
                 //------------------------------------------------------ $l4_sum = $l4_sum + 1
               
                 $l4_sum += 1;
           
           	}}
	
	    $l4_sum = $l4_sum * 20;
		update_post_meta( $id_probant, 'wpcf-probant-loesungszahl-04-sum', $l4_sum );

	    }
	
	
// Evaluation: Lösungszahl 5 ----------------------------------------------------------------------------------------	
	
$query_l5 = new WP_Query( 
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
		    'key'      => 'wpcf-these-zahl',
		    'value'    => $_POST['wpcf-probant-loesungszahl-05'],
		    'compare'  => '=',
		    'type'     => 'NUMERIC'
		],
		[
		    'key'      => 'wpcf-these-position',
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
	
	
$intermediary_l5 = $query_l5->posts;
$l5_sum = 0; // --> Entwicklungszahl Summe, probant field 'wpcf-probant-loesungszahl-05-sum' 

//if it returns some posts
if($intermediary_l5){
  
            //now get the single posts fields values 
            foreach($intermediary_l5 as $intermediary ){ 
   
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
                 
                 //------------------------------------------------------ $l5_sum = $l5_sum + 1
               
                 $l5_sum += 1;
           
           	}}
	
	    $l5_sum = $l5_sum * 20;
		update_post_meta( $id_probant, 'wpcf-probant-loesungszahl-05-sum', $l5_sum );

	    }
	
	
// Evaluation: Entwicklungszahl 1 ----------------------------------------------------------------------------------------	
	
$query_e1 = new WP_Query( 
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
		    'key'      => 'wpcf-these-zahl',
		    'value'    => $_POST['wpcf-probant-entwicklungszahl-01'],
		    'compare'  => '=',
		    'type'     => 'NUMERIC'
		],
		[
		    'key'      => 'wpcf-these-position',
		    'value'    => 5,
		    'compare'  => '=',
		    'type'     => 'NUMERIC'
		],
	],
        //'meta_key' => 'wpcf-genre',
        //'orderby' => 'meta_value',
        //'order' => 'ASC',
    )
);
	
	
$intermediary_e1 = $query_e1->posts;
$e1_sum = 0; // --> Entwicklungszahl Summe, probant field 'wpcf-probant-entwicklungszahl-01-sum' 

//if it returns some posts
if($intermediary_e1){
  
            //now get the single posts fields values 
            foreach($intermediary_e1 as $intermediary ){ 
   
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
                 
                 //------------------------------------------------------ $e1_sum = $e1_sum + 1
               
                 $e1_sum += 1;
           
           	}}
	    $e1_sum = $e1_sum * 20;
		update_post_meta( $id_probant, 'wpcf-probant-entwicklungszahl-01-sum', $e1_sum );

	    }
		
// Evaluation: Entwicklungszahl 2 ----------------------------------------------------------------------------------------		
	
$query_e2 = new WP_Query( 
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
		    'key'      => 'wpcf-these-zahl',
		    'value'    => $_POST['wpcf-probant-entwicklungszahl-02'],
		    'compare'  => '=',
		    'type'     => 'NUMERIC'
		],
		[
		    'key'      => 'wpcf-these-position',
		    'value'    => 5,
		    'compare'  => '=',
		    'type'     => 'NUMERIC'
		],
	],
        //'meta_key' => 'wpcf-genre',
        //'orderby' => 'meta_value',
        //'order' => 'ASC',
    )
);
	
	
$intermediary_e2 = $query_e2->posts;
$e2_sum = 0; // --> Entwicklungszahl Summe, probant field 'wpcf-probant-entwicklungszahl-02-sum' 

//if it returns some posts
if($intermediary_e2){
  
            //now get the single posts fields values 
            foreach($intermediary_e2 as $intermediary ){ 
   
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
                 
                 //------------------------------------------------------ $e2_sum = $e2_sum + 1
               
                 $e2_sum += 1;
           
           	}}
	
	    $e2_sum = $e2_sum * 20;	
		update_post_meta( $id_probant, 'wpcf-probant-entwicklungszahl-02-sum', $e2_sum );

	    }
	
// Evaluation: Entwicklungszahl 3 ----------------------------------------------------------------------------------------			

$query_e3 = new WP_Query( 
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
		    'key'      => 'wpcf-these-zahl',
		    'value'    => $_POST['wpcf-probant-entwicklungszahl-03'],
		    'compare'  => '=',
		    'type'     => 'NUMERIC'
		],
		[
		    'key'      => 'wpcf-these-position',
		    'value'    => 5,
		    'compare'  => '=',
		    'type'     => 'NUMERIC'
		],
	],
        //'meta_key' => 'wpcf-genre',
        //'orderby' => 'meta_value',
        //'order' => 'ASC',
    )
);
	
	
$intermediary_e3 = $query_e3->posts;
$e3_sum = 0; // --> Entwicklungszahl Summe, probant field 'wpcf-probant-entwicklungszahl-03-sum' 

//if it returns some posts
if($intermediary_e3){
  
            //now get the single posts fields values 
            foreach($intermediary_e3 as $intermediary ){ 
   
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
                 
                 //------------------------------------------------------ $e3_sum = $e3_sum + 1
               
                 $e3_sum += 1;
           
           	}}
	
	    $e3_sum = $e3_sum * 20;	
		update_post_meta( $id_probant, 'wpcf-probant-entwicklungszahl-03-sum', $e3_sum );

	    }
	

// Evaluation: Entwicklungszahl 4 ----------------------------------------------------------------------------------------		
	
	
$query_e4 = new WP_Query( 
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
		    'key'      => 'wpcf-these-zahl',
		    'value'    => $_POST['wpcf-probant-entwicklungszahl-04'],
		    'compare'  => '=',
		    'type'     => 'NUMERIC'
		],
		[
		    'key'      => 'wpcf-these-position',
		    'value'    => 5,
		    'compare'  => '=',
		    'type'     => 'NUMERIC'
		],
	],
        //'meta_key' => 'wpcf-genre',
        //'orderby' => 'meta_value',
        //'order' => 'ASC',
    )
);
	
	
$intermediary_e4 = $query_e4->posts;
$e4_sum = 0; // --> Entwicklungszahl Summe, probant field 'wpcf-probant-entwicklungszahl-03-sum' 

//if it returns some posts
if($intermediary_e4){
  
            //now get the single posts fields values 
            foreach($intermediary_e4 as $intermediary ){ 
   
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
                 
                 //------------------------------------------------------ $e4_sum = $e4_sum + 1
               
                 $e4_sum += 1;
           
           	}}
	
	    $e4_sum = $e4_sum * 20;	
		update_post_meta( $id_probant, 'wpcf-probant-entwicklungszahl-04-sum', $e4_sum );

	    }
	

// Evaluation: Entwicklungszahl 5 ----------------------------------------------------------------------------------------			
	
$query_e5 = new WP_Query( 
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
		    'key'      => 'wpcf-these-zahl',
		    'value'    => $_POST['wpcf-probant-entwicklungszahl-05'],
		    'compare'  => '=',
		    'type'     => 'NUMERIC'
		],
		[
		    'key'      => 'wpcf-these-position',
		    'value'    => 5,
		    'compare'  => '=',
		    'type'     => 'NUMERIC'
		],
	],
        //'meta_key' => 'wpcf-genre',
        //'orderby' => 'meta_value',
        //'order' => 'ASC',
    )
);
	
	
$intermediary_e5 = $query_e5->posts;
$e5_sum = 0; // --> Entwicklungszahl Summe, probant field 'wpcf-probant-entwicklungszahl-05-sum' 

//if it returns some posts
if($intermediary_e5){
  
            //now get the single posts fields values 
            foreach($intermediary_e5 as $intermediary ){ 
   
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
                 
                 //------------------------------------------------------ $e5_sum = $e5_sum + 1
               
                 $e5_sum += 1;
           
           	}}
	
	    $e5_sum = $e5_sum * 20;	
		update_post_meta( $id_probant, 'wpcf-probant-entwicklungszahl-05-sum', $e5_sum );

	    }
	

// Evaluation: Beziehungszahl ----------------------------------------------------------------------------------------			
	
$query_bez = new WP_Query( 
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
		    'key'      => 'wpcf-these-zahl',
		    'value'    => $_POST['wpcf-probant-beziehungszahl'],
		    'compare'  => '=',
		    'type'     => 'NUMERIC'
		],
		[
		    'key'      => 'wpcf-these-position',
		    'value'    => 7,
		    'compare'  => '=',
		    'type'     => 'NUMERIC'
		],
	],
        //'meta_key' => 'wpcf-genre',
        //'orderby' => 'meta_value',
        //'order' => 'ASC',
    )
);
	
	
$intermediary_bez = $query_bez->posts;
$bez_sum = 0; // --> Beziehungszahl Summe, probant field 'wpcf-probant-beziehungszahl-sum' 

//if it returns some posts
if($intermediary_bez){
  
            //now get the single posts fields values 
            foreach($intermediary_bez as $intermediary ){ 
   
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
                 
                 //------------------------------------------------------ $bez_sum = $bez_sum + 1
               
                 $bez_sum += 1;
           
           	}}
	
	    $bez_sum = $bez_sum * 20;	
		update_post_meta( $id_probant, 'wpcf-probant-beziehungszahl-sum', $bez_sum );

	    }
	

// Evaluation: Schlüsselzahl ----------------------------------------------------------------------------------------	
		
$query_schl = new WP_Query( 
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
		    'key'      => 'wpcf-these-zahl',
		    'value'    => $_POST['wpcf-probant-schluesselzahl'],
		    'compare'  => '=',
		    'type'     => 'NUMERIC'
		],
		[
		    'key'      => 'wpcf-these-position',
		    'value'    => 8,
		    'compare'  => '=',
		    'type'     => 'NUMERIC'
		],
	],
        //'meta_key' => 'wpcf-genre',
        //'orderby' => 'meta_value',
        //'order' => 'ASC',
    )
);
	
	
$intermediary_schl = $query_schl->posts;
$schl_sum = 0; // --> Schlüsselzahl Summe, probant field 'wpcf-probant-schluesselzahl-sum' 

//if it returns some posts
if($intermediary_schl){
  
            //now get the single posts fields values 
            foreach($intermediary_schl as $intermediary ){ 
   
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
                 
                 //------------------------------------------------------ $schl_sum = $schl_sum + 1
               
                 $schl_sum += 1;
           
           	}}
	
	    $schl_sum = $schl_sum * 20;	
		update_post_meta( $id_probant, 'wpcf-probant-schluesselzahl-sum', $schl_sum );

	    }
	

// Evaluation: Geistigezahl ----------------------------------------------------------------------------------------		
	
$query_gei = new WP_Query( 
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
		    'key'      => 'wpcf-these-zahl',
		    'value'    => $_POST['wpcf-probant-geistigezahl'],
		    'compare'  => '=',
		    'type'     => 'NUMERIC'
		],
		[
		    'key'      => 'wpcf-these-position',
		    'value'    => 1,
		    'compare'  => '=',
		    'type'     => 'NUMERIC'
		],
	],
        //'meta_key' => 'wpcf-genre',
        //'orderby' => 'meta_value',
        //'order' => 'ASC',
    )
);
	
	
$intermediary_gei = $query_gei->posts;
$gei_sum = 0; // --> Beziehungszahl Summe, probant field 'wpcf-probant-geistigezahl-sum' 

//if it returns some posts
if($intermediary_gei){
  
            //now get the single posts fields values 
            foreach($intermediary_gei as $intermediary ){ 
   
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
                 
                 //------------------------------------------------------ $gei_sum = $gei_sum + 1
               
                 $gei_sum += 1;
           
           	}}
	
	    $gei_sum = $gei_sum * 20;	
		update_post_meta( $id_probant, 'wpcf-probant-geistigezahl-sum', $gei_sum );

	    }
	

// Evaluation: Psychezahl ----------------------------------------------------------------------------------------		
	
$query_psyc = new WP_Query( 
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
		    'key'      => 'wpcf-these-zahl',
		    'value'    => $_POST['wpcf-probant-psychezahl'],
		    'compare'  => '=',
		    'type'     => 'NUMERIC'
		],
		[
		    'key'      => 'wpcf-these-position',
		    'value'    => 2,
		    'compare'  => '=',
		    'type'     => 'NUMERIC'
		],
	],
        //'meta_key' => 'wpcf-genre',
        //'orderby' => 'meta_value',
        //'order' => 'ASC',
    )
);
	
	
$intermediary_psyc = $query_psyc->posts;
$psyc_sum = 0; // --> Psychezahl Summe, probant field 'probant-psychezahl-sum' 

//if it returns some posts
if($intermediary_psyc){
  
            //now get the single posts fields values 
            foreach($intermediary_psyc as $intermediary ){ 
   
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
                 
                 //------------------------------------------------------ $psyc_sum = $psyc_sum + 1
               
                 $psyc_sum += 1;
           
           	}}
	
	    $psyc_sum = $psyc_sum * 20;	
		update_post_meta( $id_probant, 'wpcf-probant-psychezahl-sum', $psyc_sum );

	    }

// Evaluation: Körperzahl ----------------------------------------------------------------------------------------	
	
$query_koer = new WP_Query( 
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
		    'key'      => 'wpcf-these-zahl',
		    'value'    => $_POST['wpcf-probant-koerperzahl'],
		    'compare'  => '=',
		    'type'     => 'NUMERIC'
		],
		[
		    'key'      => 'wpcf-these-position',
		    'value'    => 3,
		    'compare'  => '=',
		    'type'     => 'NUMERIC'
		],
	],
        //'meta_key' => 'wpcf-genre',
        //'orderby' => 'meta_value',
        //'order' => 'ASC',
    )
);
	
	
$intermediary_koer = $query_koer->posts;
$koer_sum = 0; // --> Körperzahl Summe, probant field 'wpcf-probant-koerperzahl-sum' 

//if it returns some posts
if($intermediary_koer){
  
            //now get the single posts fields values 
            foreach($intermediary_koer as $intermediary ){ 
   
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
                 
                 //------------------------------------------------------ $koer_sum = $koer_sum + 1
               
                 $koer_sum += 1;
           
           	}}
	
	    $koer_sum = $koer_sum * 20;	
		update_post_meta( $id_probant, 'wpcf-probant-koerperzahl-sum', $koer_sum );

	    }	
	

// Evaluation: Materiezahl ----------------------------------------------------------------------------------------	
	
$query_mat = new WP_Query( 
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
		    'key'      => 'wpcf-these-zahl',
		    'value'    => $_POST['wpcf-probant-materiezahl'],
		    'compare'  => '=',
		    'type'     => 'NUMERIC'
		],
		[
		    'key'      => 'wpcf-these-position',
		    'value'    => 4,
		    'compare'  => '=',
		    'type'     => 'NUMERIC'
		],
	],
        //'meta_key' => 'wpcf-genre',
        //'orderby' => 'meta_value',
        //'order' => 'ASC',
    )
);
	
	
$intermediary_mat = $query_mat->posts;
$mat_sum = 0; // --> Materiezahl Summe, probant field 'wpcf-probant-materiezahl-sum' 

//if it returns some posts
if($intermediary_mat){
  
            //now get the single posts fields values 
            foreach($intermediary_mat as $intermediary ){ 
   
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
                 
                 //------------------------------------------------------ $mat_sum = $mat_sum + 1
               
                 $mat_sum += 1;
           
           	}}
	
	    $mat_sum = $mat_sum * 20;	
		update_post_meta( $id_probant, 'wpcf-probant-materiezahl-sum', $mat_sum );

	    }	
		
// Evaluation: Zusatzzahl ----------------------------------------------------------------------------------------	
	
$query_zusa = new WP_Query( 
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
		    'key'      => 'wpcf-these-zahl',
		    'value'    => $_POST['wpcf-probant-zusatzzahl'],
		    'compare'  => '=',
		    'type'     => 'NUMERIC'
		],
		[
		    'key'      => 'wpcf-these-position',
		    'value'    => 9,
		    'compare'  => '=',
		    'type'     => 'NUMERIC'
		],
	],
        //'meta_key' => 'wpcf-genre',
        //'orderby' => 'meta_value',
        //'order' => 'ASC',
    )
);
	
	
$intermediary_zusa = $query_zusa->posts;
$zusa_sum = 0; // --> Zusatzzahl Summe, probant field 'wpcf-probant-zusatzzahl-sum' 

//if it returns some posts
if($intermediary_zusa){
  
            //now get the single posts fields values 
            foreach($intermediary_zusa as $intermediary ){ 
   
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
                 
                 //------------------------------------------------------ $zusa_sum = $zusa_sum + 1
               
                 $zusa_sum += 1;
           
           	}}
	
	    $zusa_sum = $zusa_sum * 20;	
		update_post_meta( $id_probant, 'wpcf-probant-zusatzzahl-sum', $zusa_sum );

	    }	
		
	
	
       }
    }
