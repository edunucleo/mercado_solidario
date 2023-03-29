<?php
/**
 * Simple_Testimonials_Showcase_Color_Options Class
 * 
 * Load user defined color options on front-end.
 *
 * @link        http://presstigers.com
 * @since       1.1.0
 * 
 * @package     Simple_Testimonials_Showcase
 * @subpackage  Simple_Testimonials_Showcase/includes
 * @author      PressTigers <support@presstigers.com>
 */

class Simple_Testimonials_Showcase_Color_Options {

    /**
     * Initialize the class and set its properties.
     *
     * @since   1.1.0
     */
    public function __construct() {

        // Hook -> Load user Defined Styles        
        add_action( 'wp_head', array( $this, 'simple_testimonials_color_options' ) );
    }

    /**
     * Load user defined styles. 
     * 
     * This function includes the user defined styles ( under Simple Testimonials > Settings )in head section of Testimonials.
     * 
     * @since    1.1.0
     */
    public function simple_testimonials_color_options()
    {
        global $post;
        
        if( has_shortcode( $post->post_content, 'simple_testimonials' ) )
        {
            $sts_color_options = ( get_option( 'sts_color_options' ) ) ? get_option( 'sts_color_options' ) : array();

            // Blockquote Color Options
            $blockquote_icon_background_color = isset($sts_color_options['blockquote_icon_background_color']) ? $sts_color_options['blockquote_icon_background_color'] : 'rgba(255,255,255,0.03)';
            $blockquote_icon_color = isset($sts_color_options['blockquote_icon_color']) ? $sts_color_options['blockquote_icon_color'] : 'rgba(136,136,136,1)';
            $blockquote_text_color = isset($sts_color_options['blockquote_text_color']) ? $sts_color_options['blockquote_text_color'] : 'rgba(213,213,213,1)';
            $blockquote_inactive_dot_color = isset($sts_color_options['blockquote_inactive_dot_color']) ? $sts_color_options['blockquote_inactive_dot_color'] : 'rgba(255,255,255,0.5)';
            $blockquote_active_dot_color = isset($sts_color_options['blockquote_active_dot_color']) ? $sts_color_options['blockquote_active_dot_color'] : 'rgba(51,153,251,1)';
            $blockquote_arrow_color = isset($sts_color_options['blockquote_arrow_color']) ? $sts_color_options['blockquote_arrow_color'] : 'rgba(255,255,255,1)';
            $blockquote_arrow_inactive_background_color = isset($sts_color_options['blockquote_arrow_inactive_background_color']) ? $sts_color_options['blockquote_arrow_inactive_background_color'] : 'rgba(34,34,34,0.5)';
            $blockquote_arrow_active_background_color = isset($sts_color_options['blockquote_arrow_active_background_color']) ? $sts_color_options['blockquote_arrow_active_background_color'] : 'rgba(34,34,34,1)';
            
            // Grid Color Options
            $grid_background_color = isset($sts_color_options['grid_background_color']) ? $sts_color_options['grid_background_color'] : 'rgba(0, 0, 0, 0.1)';
            $author_text_color = isset($sts_color_options['author_text_color']) ? $sts_color_options['author_text_color'] : 'rgba(102,102,102,1)';
            $author_role_organization_color = isset($sts_color_options['author_role_organization_color']) ? $sts_color_options['author_role_organization_color'] : 'rgba(51,153,251,1)';
            $grid_text_color = isset($sts_color_options['grid_text_color']) ? $sts_color_options['grid_text_color'] : 'rgba(0,0,0,1)';
            $grid_inactive_dot_color = isset($sts_color_options['grid_inactive_dot_color']) ? $sts_color_options['grid_inactive_dot_color'] : 'rgba(255,255,255,0.5)';
            $grid_active_dot_color = isset($sts_color_options['grid_active_dot_color']) ? $sts_color_options['grid_active_dot_color'] : 'rgba(51,153,251,1)';
            $grid_arrow_color = isset($sts_color_options['grid_arrow_color']) ? $sts_color_options['grid_arrow_color'] : 'rgba(255,255,255,1)';
            $grid_arrow_inactive_background_color = isset($sts_color_options['grid_arrow_inactive_background_color']) ? $sts_color_options['grid_arrow_inactive_background_color'] : 'rgba(34,34,34,0.5)';
            $grid_arrow_active_background_color = isset($sts_color_options['grid_arrow_active_background_color']) ? $sts_color_options['grid_arrow_active_background_color'] : 'rgba(34,34,34,1)';
    ?>
            <style type="text/css">
                
                /* Blockquote Icon Background & Text Colors */
                .simple-testimonials-showcase .sts-wrap .icon-quote {
                    background-color: <?php echo esc_attr( $blockquote_icon_background_color ); ?>;
                    color: <?php echo esc_attr( $blockquote_icon_color ); ?>;
                }
                .simple-testimonials-showcase .sts-wrap .quote-layout .testimonial-content,
                .simple-testimonials-showcase .sts-wrap .quote-layout .testimonial-author {
                    color: <?php echo esc_attr( $blockquote_text_color ); ?>;
                }
                
                /* Quote Dots Background & Text Colors */
                .quote-layout-wrapper .slick-dots li button::before {
                    color: <?php echo esc_attr( $blockquote_inactive_dot_color ); ?>;
                }
                .quote-layout-wrapper .slick-dots li.slick-active button::before {
                    color: <?php echo esc_attr( $blockquote_active_dot_color ); ?>;
                }
                
                /* Quote Arrow Background & Text Colors */
                .quote-layout-wrapper .slick-prev,
                .quote-layout-wrapper .slick-next {
                    background-color: <?php echo esc_attr( $blockquote_arrow_inactive_background_color ); ?>;
                }
                .quote-layout-wrapper .slick-prev:hover,
                .quote-layout-wrapper .slick-next:hover,
                .quote-layout-wrapper .slick-prev:focus,
                .quote-layout-wrapper .slick-next:focus {
                    background-color: <?php echo esc_attr( $blockquote_arrow_active_background_color ); ?>;
                }
                .quote-layout-wrapper .slick-prev:before,
                .quote-layout-wrapper .slick-next:before {
                    color: <?php echo esc_attr( $blockquote_arrow_color ); ?>;
                }
                
                /* Grid Arrow & Dot Icon Background & Text Colors */
                .simple-testimonials-showcase .sts-wrap .grid-layout:hover {
                    background-color: <?php echo esc_attr( $grid_background_color ); ?>;
                }
                .simple-testimonials-showcase .sts-wrap .grid-layout .testimonial-author {
                    color: <?php echo esc_attr( $author_text_color ); ?>;
                }
                .simple-testimonials-showcase .sts-wrap .grid-layout .testimonial-author-role {
                    color: <?php echo esc_attr( $author_role_organization_color ); ?>;
                }
                .simple-testimonials-showcase .sts-wrap .grid-layout .testimonial-content {
                    color: <?php echo esc_attr( $grid_text_color ); ?>;
                }
                
                /* Grid Dots Background & Text Colors */
                .grid-layout-wrapper .slick-dots li button::before {
                    color: <?php echo esc_attr( $grid_inactive_dot_color ); ?>;
                }
                .grid-layout-wrapper .slick-dots li.slick-active button::before {
                    color: <?php echo esc_attr( $grid_active_dot_color ); ?>;
                }
                
                /* Grid Arrow Background & Text Colors */
                .grid-layout-wrapper .slick-prev,
                .grid-layout-wrapper .slick-next {
                    background-color: <?php echo esc_attr( $grid_arrow_inactive_background_color ); ?>;
                }
                .grid-layout-wrapper .slick-prev:hover,
                .grid-layout-wrapper .slick-next:hover,
                .grid-layout-wrapper .slick-prev:focus,
                .grid-layout-wrapper .slick-next:focus {
                    background-color: <?php echo esc_attr( $grid_arrow_active_background_color ); ?>;
                }
                .grid-layout-wrapper .slick-prev:before,
                .grid-layout-wrapper .slick-next:before {
                    color: <?php echo esc_attr( $grid_arrow_color ); ?>;
                }
            </style>
            <?php
        }
    }
}
new Simple_Testimonials_Showcase_Color_Options();