<?php
function featured_events(){
  
    $args = array(
                    'post_type'      => 'mep_events',
                    'posts_per_page' => '3',
                    'publish_status' => 'published',
                 );
  
    $query = new WP_Query($args);
  
    if($query->have_posts()) :
  
        while($query->have_posts()) :
  
        $query->the_post() ;

        $start_date = get_post_meta(get_the_ID(), 'event_start_datetime')[0];
        $eventslug = get_post_meta(get_the_ID(), 'post_name')[0];
        $result .= '<div class="event-item">';
		$result .= '<b class="start-date">'.date("M d", strtotime($start_date)).'</b>'.' - '. '<a href="'.get_permalink().'">'.get_the_title().'</a>';
		// $result .= '<a href="'.the_permalink().'"</a>';
        $result .= '</div>';
        
 
        endwhile;
  		// print_r($query);
        wp_reset_postdata();
  
    endif;    
  
    return $result;            
}
  
add_shortcode( 'featured_events', 'featured_events' );  
?>
