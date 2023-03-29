<?php
/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @link       http://presstigers.com
 * @since      1.0.0
 * 
 * @package    Simple_Testimonials_Showcase
 * @subpackage Simple_Testimonials_Showcase/public
 * @author     PressTigers <support@presstigers.com>
 */
class Simple_Testimonials_Showcase_Public
{
    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct( $plugin_name, $version )
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
        
        /**
         * The class is responsible for defining the post type 'simple_testimonials'.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-simple-testimonials-showcase-post-type.php';
        
        /**
         * The class is responsible for defining the shortcode 'simple_testimonials'.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-simple-testimonials-showcase-shortcode.php';
        
        /**
         * The class is responsible for defining the color options in 'simple_testimonials'.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-simple-testimonials-showcase-color-option.php';
        
        add_filter('body_class', array($this, 'body_class_simple_testimonials_showcase'));
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {
        wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0', 'all' );
        wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/simple-testimonials-showcase-public.css', array(), $this->version, 'all' );
    }
    

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Simple_Testimonials_Showcase_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Simple_Testimonials_Showcase_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/simple-testimonials-showcase-public.js', array( 'jquery' ), $this->version, true );
    }
    
    /**
     * Add custom body classes
     * 
     * @since   1.1.0
     * 
     * @param   array   $classes
     * @return  array
     */
    public function body_class_simple_testimonials_showcase($classes)
    {
        $classes = (array) $classes;
        $classes[] = sanitize_title( wp_get_theme() );

        $classes[] = 'simple-testimonials-showcase';
        $classes[] = 'simple-testimonials-showcase-page';
       return array_unique( $classes );
    }
}
