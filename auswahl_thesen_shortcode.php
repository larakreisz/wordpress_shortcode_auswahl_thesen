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
		$output .= '<div class="row" style="margin-top:20px;"><div class="col-md-1">$loop_nr</div><div class="col-md-8">'.do_shortcode("[types field='thesen-text'][/types]").'</div><div class="col-md-3">'.do_shortcode("[cred_form form='post-probant-thesen-anlegen']").'</div></div>';
	
	
	$loop_nr += 1;
    	
	endwhile;
	wp_reset_postdata();
	$output .= '</div>';
else:
	$output = '<div>Sorry no posts found!!</div>';
endif;  
	
	

return $output;
}


