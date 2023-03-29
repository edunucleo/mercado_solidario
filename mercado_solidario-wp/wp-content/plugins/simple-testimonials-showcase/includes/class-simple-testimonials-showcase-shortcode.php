<?php if (!defined('ABSPATH')) { exit; } // Exit if accessed directly
/**
 * Simple_Testimonials_Showcase_Shortcode Class
 *
 * This file contains shortcode of 'simple_testimonials' post type. 
 * 
 * @link        http://presstigers.com
 * @since       1.0.0
 *
 * @package    Simple_Testimonials_Showcase
 * @subpackage Simple_Testimonials_Showcase/includes
 * @author     PressTigers <support@presstigers.com>
 */
class Simple_Testimonials_Showcase_Shortcode
{
    /**
     * Initialize the class and set it's properties.
     *
     * @since    1.0.0
     */
    public function __construct()
    {
        // Hook-> 'simple_testimonials_shortcode' Shortcode
        add_shortcode('simple_testimonials', array($this, 'callback_simple_testimonials'));
        
        // Hook -> 'the_content' Shortcode
        add_filter( 'the_content', array($this, 'simple_testimonials_shortcode_empty_paragraph_fix'));
    }

    /**
     * Simple Testimonials Shortcode
     *
     * @since   1.0.0
     * @since   1.1.0   Revised all the core parameters, html structure & slick carousel init parameters
     * 
     * @param   string  $attr Simple Testimonials Parameters 
     * @return  void 
     */
    public function callback_simple_testimonials($atts, $content)
    {
        static $testimonials_counter = 1;
        
        // Shortcode Default Array
        $shortcode_args = array(
            'adaptiveheight' => 'true',
            'autoplayspeed' => '3000',
            'autoplay' => 'true',
            'arrows' => 'false',
            'dots' => 'true',
            'fade' => 'true',
            'infinite' => 'true',
            'slidestoshow' => '1',
            'total_post' => '6',
            'layout' => 'quote',
            'category' => '',
            'speed' => '300',
        );
        
        // Extract User Defined Shortcode Attributes
        $shortcode_args = shortcode_atts($shortcode_args, $atts);
        
        ob_start();

        $args = array(
            'posts_per_page' => intval( $shortcode_args['total_post'] ),
            'post_type' => 'simple_testimonials',
            'simple_testimonials_category' => esc_attr( $shortcode_args['category'] )
        );
        
        $the_query = new WP_Query( $args );
        if ( $the_query->have_posts() ) {
        ?>
        <div class="sts-wrap">
            <?php if( $shortcode_args['layout'] == "quote" ) { ?>
            <div class="icon-quote"><i class="fa fa-quote-left"></i></div>
            <div id="regular-<?php echo intval( $testimonials_counter ); ?>" class="quote-layout-wrapper">
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="quote-layout">
                    <p class="testimonial-content"><?php echo esc_textarea( get_the_content() ); ?></p>
                    <p class="testimonial-author"><?php the_title(); ?></p>
                </div>
                <?php endwhile; ?>
            </div>
            <?php } elseif(esc_attr($shortcode_args['layout']) == "grid") { ?>
            <div id="regular-<?php echo intval( $testimonials_counter ); ?>" class="grid-layout-wrapper">
                <?php
                while ( $the_query->have_posts() ) : $the_query->the_post();
                $author_img = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_id()), 'thumbnail');
                $author_role = ( !empty( get_post_meta( get_the_id(), '_sts_author_role', TRUE ) ) ) ? get_post_meta( get_the_id(), '_sts_author_role', TRUE ) : '';
                $author_organization = ( !empty( get_post_meta( get_the_id(), '_sts_author_organization', TRUE ) ) ) ? get_post_meta( get_the_id(), '_sts_author_organization', TRUE ) : '';
                if( !empty( $author_role ) && !empty( $author_organization ) ) {
                    $author_organization .= ' - ';
                }
                ?>
                <div class="grid-layout">
                    <?php if ( !empty( $author_img[0] ) ) { ?>
                    <img src="<?php echo esc_url( $author_img[0] ); ?>" class="img-circle">
                    <?php }?>
                    <h5 class="testimonial-author"><?php echo esc_attr( get_the_title() ); ?></h5>
                    <h6 class="testimonial-author-role"><?php echo esc_attr( $author_organization ); ?><?php echo esc_attr( $author_role ); ?></h6>
                    <p class="testimonial-content"><?php echo esc_attr( get_the_content() ); ?></p>
                </div>
                <?php endwhile; ?>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
        
        <!-- Script Adding Settings/Attributes of Shortcode -->
        <script type="text/javascript">
            (function ($) {
                'use strict';
                $(document).ready(function ($) {
                    $('#regular-<?php echo esc_attr($testimonials_counter); ?>').slick({
                        adaptiveHeight: <?php echo esc_attr($shortcode_args['adaptiveheight']); ?>,
                        autoplaySpeed: <?php echo intval($shortcode_args['autoplayspeed']); ?>,
                        autoplay: <?php echo esc_attr($shortcode_args['autoplay']); ?>,
                        arrows:  <?php echo esc_attr($shortcode_args['arrows']); ?>,
                        dots: <?php echo esc_attr($shortcode_args['dots']); ?>,
                        <?php if( esc_attr($shortcode_args['layout'] == "quote")) { ?>
                        fade: <?php echo esc_attr($shortcode_args['fade']); ?>,
                        <?php }?>
                        infinite: <?php echo esc_attr($shortcode_args['infinite']); ?>,
                        slidesToShow: <?php echo esc_attr($shortcode_args['slidestoshow']); ?>,
                        slidesToScroll: 1,
                        speed: <?php echo intval($shortcode_args['speed']); ?>,
                        
                        <?php if( "grid" == $shortcode_args['layout'] ) { ?>
                        responsive: [
                            {
                                breakpoint: 767,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 2
                                }
                            },
                            {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 319,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            }
                        ]
                        <?php }?>
                    });
                });
            })(jQuery);
        </script>
        
        <?php
        $testimonials_counter++;
        $content = ob_get_contents();
        ob_end_clean();
        wp_reset_postdata();
        return $content;
    }

    /**
     * Filters the content to remove any extra paragraph or break tags
     * caused by shortcodes.
     *
     * @since   1.0.0
     *
     * @param   string $content  String of HTML content.
     * @return  string $content Amended string of HTML content.
     */
    function simple_testimonials_shortcode_empty_paragraph_fix($content) {
        $array = array(
            '<p>[' => '[',
            ']</p>' => ']',
            ']<br />' => ']'
        );
        return strtr($content, $array);
    }

}
new Simple_Testimonials_Showcase_Shortcode();