<?php

/**
 * Plugin Name:  Custom News
 * Plugin URI: http://nilesh.test/
 * Description:  Custom post type for creating custom news and display in fronend
 * 
 * Version: 1.0.0
 * Author: Nilesh
 * Author URI: http://nilesh.test/
 * Text Domain: news * 
 * @package Custom News
 * @category Core
 */

// Exit if accessed directly
if (!defined('ABSPATH')) exit;


/**
 * Activation Hook
 * 
 * Initial setup of the plugin setting default options 
 * and database tables creations.
 * 
 * @package Custom News
 * @since 1.0.0
 */
function news_install()
{
    custom_post_type_news();
}
register_activation_hook(__FILE__, 'news_install');

/**
 * Deactivation Hook
 * 
 * Does the drop tables in the database and
 * delete  plugin options.
 *
 * @package Custom News
 * @since 1.0.0
 */
function news_uninstall()
{
}
register_deactivation_hook(__FILE__, 'news_uninstall');


// Register Custom Post Type
if (!function_exists('custom_post_type_news')) {

    // Register Custom Post Type For News
    function custom_post_type_news()
    {

        $labels = array(
            'name'                  => _x('News', 'Post Type General Name', 'news'),
            'singular_name'         => _x('News', 'Post Type Singular Name', 'news'),
            'menu_name'             => __('News', 'news'),
            'name_admin_bar'        => __('News', 'news'),
            'archives'              => __('News Item Archives', 'news'),
            'attributes'            => __('News Item Attributes', 'news'),
            'parent_item_colon'     => __('News Parent Item:', 'news'),
            'all_items'             => __('All News Items', 'news'),
            'add_new_item'          => __('Add New News', 'news'),
            'add_new'               => __('Add new news', 'news'),
            'new_item'              => __('New news', 'news'),
            'edit_item'             => __('Edit news', 'news'),
            'update_item'           => __('Update news', 'news'),
            'view_item'             => __('View news', 'news'),
            'view_items'            => __('View Items', 'news'),
            'search_items'          => __('Search news', 'news'),
            'not_found'             => __('Not found', 'news'),
            'not_found_in_trash'    => __('Not found in Trash', 'news'),
            'featured_image'        => __('Featured Image', 'news'),
            'set_featured_image'    => __('Set featured image', 'news'),
            'remove_featured_image' => __('Remove featured image', 'news'),
            'use_featured_image'    => __('Use as featured image', 'news'),
            'insert_into_item'      => __('Insert into item', 'news'),
            'uploaded_to_this_item' => __('Uploaded to this item', 'news'),
            'items_list'            => __('Items list', 'news'),
            'items_list_navigation' => __('Items list navigation', 'news'),
            'filter_items_list'     => __('Filter items list', 'news'),
        );
        $args = array(
            'label'                 => __('news', 'news'),
            'labels'                => $labels,
            'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'comments', 'revisions', 'author'),
            'taxonomies'            => array('news_category', 'post_tag'),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        );
        register_post_type('news', $args);
    }
    add_action('init', 'custom_post_type_news', 0);

    // Register Custom Taxonomy
    function custom_taxonomy()
    {
        $labels = array(
            'name'                       => _x('News categories', 'Taxonomy General Name', 'text_domain'),
            'singular_name'              => _x('news category', 'Taxonomy Singular Name', 'text_domain'),
            'menu_name'                  => __('News Category', 'text_domain'),
            'all_items'                  => __('All Items', 'text_domain'),
            'parent_item'                => __('Parent Item', 'text_domain'),
            'parent_item_colon'          => __('Parent Item:', 'text_domain'),
            'new_item_name'              => __('New Item Name', 'text_domain'),
            'add_new_item'               => __('Add New Item', 'text_domain'),
            'edit_item'                  => __('Edit Item', 'text_domain'),
            'update_item'                => __('Update Item', 'text_domain'),
            'view_item'                  => __('View Item', 'text_domain'),
            'separate_items_with_commas' => __('Separate items with commas', 'text_domain'),
            'add_or_remove_items'        => __('Add or remove items', 'text_domain'),
            'choose_from_most_used'      => __('Choose from the most used', 'text_domain'),
            'popular_items'              => __('Popular Items', 'text_domain'),
            'search_items'               => __('Search Items', 'text_domain'),
            'not_found'                  => __('Not Found', 'text_domain'),
            'no_terms'                   => __('No items', 'text_domain'),
            'items_list'                 => __('Items list', 'text_domain'),
            'items_list_navigation'      => __('Items list navigation', 'text_domain'),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
        );
        register_taxonomy('news_category', array('news'), $args);
    }
    add_action('init', 'custom_taxonomy', 0);
}

function show_custom_news()
{
    get_header();
    ob_start(); // Start output buffering
?>
    <form class="search" action="<?php echo esc_url(home_url('/')); ?>" method="get">
        <input type="search" name="s" placeholder="Search News&hellip;">
        <input type="submit" value="Search">
        <input type="hidden" name="post_type" value="news">
    </form> <br><br>
    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'post_type' => 'news',
        'posts_per_page' => 5,
        'paged' => $paged,
    );

    // Check if search query is present
    if (isset($_GET['s'])) {
        // Perform search query
        $args['s'] = $_GET['s']; // Search query
    } elseif (isset($_GET['news_category'])) {
        // If a specific news category is selected
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'news_category',
                'field' => 'slug',
                'terms' => 'Category' . $_GET['news_category'],
            ),
        );
    }

    $news_loop = new WP_Query($args);
    while ($news_loop->have_posts()) : $news_loop->the_post();
    ?>
        <div class="news-item">
            <div class="news-thumbnail">
                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
                <?php endif; ?>
            </div>
            <div class="news-content">
                <span><?php the_author(); ?></span>
                <span><?php the_date(); ?></span>
                <span><?php the_terms(get_the_ID(), 'news_category'); ?></span>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="entry-content">
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>">Continue reading</a>
                </div>
            </div>

        </div>
    <?php
    endwhile;

    // Pagination
    echo '<div class="pagination">';
    echo paginate_links(array(
        'total' => $news_loop->max_num_pages,
        'current' => max(1, $paged),
        'prev_text' => __('&laquo; Previous'),
        'next_text' => __('Next &raquo;'),
        'type' => 'list',
    ));
    echo '</div>';

    wp_reset_postdata(); // Reset post data to avoid conflicts

    get_footer();

    return ob_get_clean(); // Return the buffered content
}
add_shortcode('show_all_news', 'show_custom_news');




// Modify main query to include only 'news' post type
add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query)
{
    if (is_category() || is_tag() || is_search()) {
        $post_type = get_query_var('post_type');
        if ($post_type)
            $post_type = $post_type;
        else
            $post_type = array('news');
        $query->set('post_type', $post_type);
    }
    return $query;
}
