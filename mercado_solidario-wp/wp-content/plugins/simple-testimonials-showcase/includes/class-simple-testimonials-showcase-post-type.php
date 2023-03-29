<?php if (!defined('ABSPATH')) { exit; } // Exit if accessed directly
/**
 * Simple_Testimonials_Showcase_Post_Type Class
 * 
 * This class is used to create custom post type for Simple Testominials Showcase.
 *
 * @link        http://presstigers.com
 * @since       1.0.0
 *
 * @package     Simple_Testimonials_Showcase
 * @subpackage  Simple_Testimonials_Showcase/includes
 * @author      PressTigers <support@presstigers.com>
 */
class Simple_Testimonials_Showcase_Post_Type
{
    /**
     * Initialize the class and set it's properties.
     *
     * @since   1.0.0
     */
    public function __construct() {

        // Add Hook into the 'init()' Action
        add_action('init', array($this, 'simple_testimonials_showcase_init'));

        // Add Hook into the 'init()' action
        add_action('admin_init', array($this, 'simple_testimonials_showcase_admin_init'));
    }

    /**
     * WordPress core launches at 'init' points
     *          
     * @since   1.0.0
     */
    public function simple_testimonials_showcase_init()
    {
        $this->create_post_type();

        // Flush Rewrite Rules 
        flush_rewrite_rules();
    }

    /**
     * Create_post_type function.
     *
     * @since   1.0.0
     */
    public function create_post_type()
    {
        if (post_type_exists("simple_testimonials"))
            return;

        /**
         * Post Type -> simple_testimonials
         */
        $singular = esc_html__('Testimonial', 'simple-testimonials-showcase');
        $plural = esc_html__('Testimonials', 'simple-testimonials-showcase');

        $rewrite = array(
            'slug' => esc_attr_x('simple-testimonials', 'Simple Testimonials Showcase permalink - resave permalinks after changing this', 'simple-testimonials-showcase'),
            'with_front' => FALSE,
            'feeds' => FALSE,
            'pages' => FALSE,
            'hierarchical' => FALSE,
        );

        // Post Type -> Testimonial Showcase -> Labels
        $testimonials_labels = array(
            'name' => $plural,
            'singular_name' => $singular,
            'menu_name' => sprintf(esc_html__('%s Showcase', 'simple-testimonials-showcase'), $plural),
            'all_items' => sprintf(esc_html__('All %s', 'simple-testimonials-showcase'), $plural),
            'add_new' => esc_html__( 'Add New', 'simple-testimonials-showcase' ),
            'add_new_item' => sprintf( esc_html__('Add %s', 'simple-testimonials-showcase'), $singular ),
            'edit' => esc_html__( 'Edit', 'simple-testimonials-showcase' ),
            'edit_item' => sprintf( esc_html__( 'Edit %s', 'simple-testimonials-showcase' ), $singular ),
            'new_item' => sprintf( esc_html__( 'New %s', 'simple-testimonials-showcase' ), $singular ),
            'view' => sprintf( esc_html__( 'View %s', 'simple-testimonials-showcase' ), $singular ),
            'view_item' => sprintf( esc_html__( 'View %s', 'simple-testimonials-showcase' ), $singular ),
            'search_items' => sprintf( esc_html__( 'Search %s', 'simple-testimonials-showcase' ), $plural ),
            'not_found' => sprintf( esc_html__( 'No %s found', 'simple-testimonials-showcase' ), $singular ),
            'not_found_in_trash' => sprintf( esc_html__( 'No %s found in trash', 'simple-testimonials-showcase' ), $plural ),
            'parent' => sprintf( esc_html__( 'Parent %s', 'simple-testimonials-showcase' ), $singular )
        );

        // Post Type -> Testimonial Showcase -> Arguments
        $testimonials_args = array(
            'labels' => $testimonials_labels,
            'description' => sprintf( esc_html__('This is where you can create and manage %s.', 'simple-testimonials-showcase' ), $plural ),
            'public' => TRUE,
            'show_ui' => TRUE,
            'capability_type' => 'post',
            'map_meta_cap' => TRUE,
            'publicly_queryable' => TRUE,
            'exclude_from_search' => TRUE,
            'hierarchical' => FALSE,
            'rewrite' => $rewrite,
            'query_var' => TRUE,
            'can_export' => TRUE,
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'has_archive' => TRUE,
            'show_in_nav_menus' => TRUE,
        );

        // Register Testimonial Showcase Post Type
        register_post_type( "simple_testimonials", apply_filters( "register_post_type_simple_testimonials", $testimonials_args ) );
        
        // Custom Taxonomy for Custom Post Type Testimonial Showcase 
        $singular = esc_html__('Category', 'simple-testimonials-showcase');
        $plural = esc_html__('Categories', 'simple-testimonials-showcase');

        $rewrite = array(
            'slug'         => esc_attr_x('simple-testimonials-category', 'Testimonial category slug - resave permalinks after changing this', 'simple-testimonials-showcase'),
            'with_front'   => FALSE,
            'hierarchical' => FALSE,
        );

        $public = TRUE;

        // Post Type -> Testimonial Showcase -> Taxonomy -> Testimonial Category -> Labels
        $labels_category = array(
            'name'              => $plural,
            'singular_name'     => $singular,
            'menu_name'         => ucwords( $plural ),
            'search_items'      => sprintf( esc_html__('Search %s', 'simple-testimonials-showcase' ), $plural ),
            'all_items'         => sprintf( esc_html__('All %s', 'simple-testimonials-showcase' ), $plural ),
            'parent_item'       => sprintf( esc_html__('Parent %s', 'simple-testimonials-showcase' ), $singular ),
            'parent_item_colon' => sprintf( esc_html__('Parent %s:', 'simple-testimonials-showcase' ), $singular ),
            'edit_item'         => sprintf( esc_html__('Edit %s', 'simple-testimonials-showcase' ), $singular ),
            'update_item'       => sprintf( esc_html__('Update %s', 'simple-testimonials-showcase' ), $singular ),
            'add_new_item'      => sprintf( esc_html__('Add New %s', 'simple-testimonials-showcase' ), $singular ),
            'new_item_name'     => sprintf( esc_html__('New %s Name', 'simple-testimonials-showcase' ), $singular )
        );

        // Post Type -> Testimonial Showcase -> Taxonomy -> Testimonial Category -> Arguments
        $args_category = array(
            'hierarchical'          => TRUE,
            'label'                 => $plural,
            'labels'                => $labels_category,
            'show_ui'               => TRUE,
            'public'                => $public,
            'rewrite'               => FALSE,
        ); 

        // Register Event Categry Taxonomy
        register_taxonomy(
            "simple_testimonials_category",
            apply_filters( 'register_taxonomy_simple_testimonials_category_object_type', array('simple_testimonials')),
            apply_filters( 'register_taxonomy_simple_testimonials_category_args', $args_category )
        );
    }

    /**
     * A function hook that the WP core launches at 'admin_init' points
     * 
     * @since   1.0.0
     */
    public function simple_testimonials_showcase_admin_init()
    {
        // Hook -> Shortcode -> Add New Column
        add_filter( 'manage_edit-simple_testimonials_columns', array( $this, 'simple_testimonials_list_columns' ) );
        
        // Hook -> Shortcode -> Add Value to New Column
        add_filter( 'manage_simple_testimonials_posts_custom_column', array( $this, 'simple_testimonials_columns_value' ), 10, 2 );
        
        // Action -> admin_head -> Fetch Custom Post
        add_action( 'admin_head', array( $this, 'get_sts_taxonomy' ) );
    }

    /**
     * Add custom column for 'Simple Testimonial Showcase' shortcode 
     *
     * @since   1.0.0
     * @param   $columns   Custom Column 
     *  
     * @return  $columns   Custom Column
     */
    public function simple_testimonials_list_columns($columns)
    {
        $columns = array(
            'cb'        => '<input type="checkbox" />',
            'sts_thumb'  => esc_html__( 'Featured Image', 'simple-testimonials-showcase' ),
            'title'     => esc_html__( 'Testimonials By', 'simple-testimonials-showcase' ),
            'date' => esc_html__( 'Date', 'simple-testimonials-showcase' ),
        );
        return $columns;
    }

    /**
     * Add custom column's value
     *
     * @since   1.0.0
     * 
     * @param   $name   custom column's name
     
     * @return  void
     */
    public function simple_testimonials_columns_value($name)
    {
        global $post;
        switch($name) {
            case 'sts_thumb':
                if( function_exists( 'the_post_thumbnail' ) ) {
                    echo the_post_thumbnail( 'thumbnail' );
                }
            break;
        }
    }
    
    /**
     * Fetch Custom Post 'Simple Testimonials' Taxonomy List
     *
     * @since   1.1.0
     * 
     * @return  void
     */
    public function get_sts_taxonomy()
    {
        global $current_screen;
        $type = $current_screen->post_type;
        
        if (is_admin() && $type == 'post' || $type == 'page') {
            $term_array[] = array('text' => 'All', 'value' => '');
            
            $terms = get_terms(
                array(
                    'taxonomy' => 'simple_testimonials_category',
                    'hide_empty' => false,
                )
            );
            if ( !empty( $terms ) && !is_wp_error( $terms ) ){
                foreach ( $terms as $term ) {
                    $term_array[] = array(
                        'text' => esc_attr( $term->name ),
                        'value' => esc_attr( $term->slug )
                    );
                }
            }
            ?>
            <script type="text/javascript">
                var catrgory_array = <?php echo json_encode( $term_array ); ?>;
            </script>
            <?php
        }
    }
}
new Simple_Testimonials_Showcase_Post_Type();