<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * Simple_Testimonials_Showcase_Meta_Box Class.
 *
 * This class is used to create custom meta box for Simple Testominials Showcase.
 * 
 * @link        http://presstigers.com
 * @since       1.0.0
 *
 * @package     Simple_Testimonials_Showcase
 * @subpackage  Simple_Testimonials_Showcase/includes
 * @author      PressTigers <support@presstigers.com>
 */

class Simple_Testimonials_Showcase_Meta_Box
{
    /**
     * Initialize the class and set its properties.
     *
     * @since   1.0.0
     */
    public function __construct() {
        
        // Action -> Post Type -> simple_testimonials -> Create Meta Box.
        add_action('add_meta_boxes', array($this, 'create_meta_box'));
        
        // Action -> Post Type -> simple_testimonials -> Save Meta Box.
        add_action('save_post', array($this, 'save_meta_box'));
    }

    /**
     * create_meta_box function.
     *
     * @since   1.0.0
     * 
     * @return  void
     */
    public function create_meta_box() {
        $this->add_meta_box('testimonial_options', __('Testimonial Info', 'simple-testimonials-showcase'), 'simple_testimonials');
    }

    /**
     * add_meta_box function.
     *
     * @since   1.0.0
     *
     * @return  void
     */
    public function add_meta_box($id, $label, $post_type) {
        add_meta_box('_' . $id, $label, array($this, $id), $post_type);
    }
    
    /**
     * testimonial_options function.
     *
     * @since   1.0.0
     * 
     * @return  void
     */
    public function testimonial_options() {
        echo '<div class="sts-metabox">';
        $this->text('sts_author_role', __('Role', 'simple-testimonials-showcase'), '');
        $this->text('sts_author_organization', __('Organization', 'simple-testimonials-showcase'), '');
        echo '</div>';
    }

    /**
     * text  function.
     *
     * @since   1.0.0
     * 
     * @param   global array  $post
     * @return  hmtl
     */
    public function text($id, $label, $desc = '') {
        global $post;
        $html = '<div class="sts-metabox-field">';
            $html .= '<label for="'. esc_attr( $id ) .'">' . esc_attr( $label ) . '</label>';
            $html .= '<div class="field">';
            $html .= '<input type="text" id="'. esc_attr( $id ) .'" name="'. esc_attr( $id ) .'" value="' . get_post_meta($post->ID, '_' . sanitize_text_field( $id ), TRUE) . '">';
            if ($desc) {
                $html .= '<p>' . esc_attr( $desc ) . '</p>';
            }
            $html .= '</div>';
        $html .= '</div>';
        echo $html;
    }

    /**
     * save_meta_box function.
     *
     * @since   1.0.0
     * 
     * @return  void
     */
    public function save_meta_box($post_id) {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }
        foreach ($_POST as $key => $value) {
            if (strstr($key, 'sts_')) {
                update_post_meta($post_id, sanitize_key( "_".$key ), sanitize_text_field( $value ));
            }
        }
    }
}
new Simple_Testimonials_Showcase_Meta_Box;