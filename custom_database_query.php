<?php

//declare the post arguments
$args = array('posts_per_page' => -1, 'post_type' => 'post',
    'order' => 'ASC');


/*** posts_per_page -1 means this loop is infinite ***/


//get post data with get_posts function
$custom_query = new WP_Query($args);


if ($custom_query->have_posts()) {
    echo '<ul>';
    while ($custom_query->have_posts()) {
        $custom_query->the_post();
        echo '<li>' . get_the_title() . '</li>';
    }
    echo '</ul>';
} else {
    echo 'No posts found';
}

/* Restore original Post Data */
wp_reset_postdata();