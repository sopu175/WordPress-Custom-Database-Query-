# WordPress Custom Database Query 

WordPress makes queries to the database depending on the current URL. When you have to create a custom database query, do not query the database directly. WordPress offers a robust abstraction layer, the WP_Query class.


The Famous WordPress Loop will also work with WP_Query with minor changes to syntax. For example, to get the titles of the 5 recent posts in the category ‘wordpress‘:

```php
//declare the post arguments
$args = array('posts_per_page' => -1, 'post_type' => 'post',
    'order' => 'ASC');


/*** posts_per_page -1 means this loop is infinite ***/
```

The Famous WordPress Loop will also work with WP_Query with minor changes to syntax.

```php
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
```

Sorting
```php
$args = [
    'posts_per_page' => 5,
    'orderby'        => 'title',
    'order'          => 'ASC',
];
```

The versatile ‘meta_query’
```php
$args = [
    'post_type'  => 'post',
    'meta_query' => [
        'relation' => 'OR',
        [
            'key'     => 'color',
            'value'   => 'orange',
            'compare' => '=',
        ],
        [
            'relation' => 'AND',
            [
                'key'     => 'color',
                'value'   => 'red',
                'compare' => '=',
            ],
            [
                'key'     => 'size',
                'value'   => 'small',
                'compare' => '=',
            ],
        ],
    ],
];
```