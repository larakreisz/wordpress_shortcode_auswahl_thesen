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


function luther_thesen_auswahl_func($atts) {
	$Content = "<style>\r\n";
	$Content .= "h3.demoClass {\r\n";
	$Content .= "color: #26b158;\r\n";
	$Content .= "}\r\n";
	$Content .= "</style>\r\n";
	$Content .= '<h3 class="demoClass">Check it out!</h3>';
	 

//-----------------
// Sub query #1:
//-----------------
$args1 = [
   'post_type'      => 'cars',
   'posts_per_page' => 10,
   //'orderby'        => 'title',
   //'order'          => 'asc',
   'meta_query'     => [
        [
            'key'      => 'doors',
            'value'    => 0,
            'compare'  => '>=',
            'type'     => 'UNSIGNED'
        ],
    ],
];

//-----------------
// Sub query #2:
//-----------------
$args2 = [
   'post_type'      => 'post',
   'posts_per_page' => 10,
   //'orderby'        => 'date',
   //'order'          => 'desc',
   'meta_query'     => [
        [
            'key'      => 'doors',
            'value'    => 0,
            'compare'  => '>=',
            'type'     => 'UNSIGNED'
        ],
    ],  
];


//------------------------------
// Order by a common meta value
//------------------------------

// Modify sub fields:
add_filter( 'cq_sub_fields', $callback = function( $fields ) {
    return $fields . ', meta_value';
});

//---------------------------
// Combined queries #1 + #2:
//---------------------------
$args = [
    'combined_query' => [        
	'args'           => [ $args1, $args2 ],
	'posts_per_page' => 5,
	'orderby'        => 'meta_value_num',
	'order'          => 'DESC',
    ]
];

//---------
// Output:
//---------
// See example 1

remove_filter( 'cq_sub_fields', $callback );

$q = new WP_Query( $args );
if( $q->have_posts() ):
	?><ul><?php
	while( $q->have_posts() ): $q->the_post();
		?><li><a href="<?php the_permalink();?>"><?php the_title();?></a></li><?php
	endwhile;
	?></ul><?php
	wp_reset_postdata();
else:
	_e( 'Sorry no posts found!' );
endif;  



// ---------------------------------	
return $Content;
}

add_shortcode('luther-thesen-auswahl', 'luther_thesen_auswahl_func');
