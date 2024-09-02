<?php

/*-----------------------------------------------------------------------------------

	Add Portfolio Post Type

-----------------------------------------------------------------------------------*/


function tz_create_post_type_portfolios() 
{
	$labels = array(
		'name' => __( 'Portfolio', 'framework'),
		'singular_name' => __( 'Portfolio' , 'framework'),
		'add_new' => _x('Add New', 'slide', 'framework'),
		'add_new_item' => __('Add New Portfolio', 'framework'),
		'edit_item' => __('Edit Portfolio', 'framework'),
		'new_item' => __('New Portfolio', 'framework'),
		'view_item' => __('View Portfolio', 'framework'),
		'search_items' => __('Search Portfolio', 'framework'),
		'not_found' =>  __('No portfolios found', 'framework'),
		'not_found_in_trash' => __('No portfolios found in Trash', 'framework'), 
		'parent_item_colon' => ''
	  );
	  
	  $args = array(
		'labels' => $labels,
		'public' => true,
		'exclude_from_search' => true,
		'publicly_queryable' => true,
		'rewrite' => array('slug' => 'portfolio'),
		'show_ui' => true, 
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail','custom-fields', 'excerpt')
	  ); 
	  
	  register_post_type( 'portfolio', $args );
}




function tz_build_taxonomies(){
	register_taxonomy( "skill-type", array( "portfolio" ), array("hierarchical" => true, "label" => __( "Skill Types", 'framework' ), "singular_label" => __( "Skill Type", 'framework' ), "rewrite" => array('slug' => 'skill-type', 'hierarchical' => true))); 
}


function tz_portfolio_edit_columns($columns){  

        $columns = array(  
            "cb" => "<input type=\"checkbox\" />",  
            "title" => __( 'Portfolio Item Title', 'framework' ),
            "type" => 'type'
        );  
  
        return $columns;  
}  
  
function tz_portfolio_custom_columns($column){  
        global $post;  
        switch ($column)  
        {    
            case 'type':  
                echo get_the_term_list($post->ID, 'skill-type', '', ', ','');  
                break;
        }  
}  

add_action( 'init', 'tz_create_post_type_portfolios' );
add_action( 'init', 'tz_build_taxonomies', 0 );
add_filter("manage_edit-portfolio_columns", "tz_portfolio_edit_columns");  
add_action("manage_posts_custom_column",  "tz_portfolio_custom_columns");  

?>