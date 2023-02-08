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
	




//---------------------------
// Combined queries #1 + #2:
//---------------------------
$args = [
    'combined_query' => [        
	'args'           => [ $args1, $args2 ],
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
	
// loop
if( $thesen_auswahl->have_posts() ):
	
	$output = '<div>';
	while( $thesen_auswahl->have_posts() ): $thesen_auswahl->the_post();
		$output .= '<h2 style="margin-bottom:5px">'.
                   get_the_title().
                   '</h2><!--  ends here -->';
	endwhile;
	wp_reset_postdata();
	$output .= '</div>';
else:
	$output = '<div>Sorry no posts found!!</div>';
endif;  
	

return $output;
	
}
