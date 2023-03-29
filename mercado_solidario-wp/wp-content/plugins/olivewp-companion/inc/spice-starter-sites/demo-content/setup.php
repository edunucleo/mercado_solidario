<?php
/**
 * @package Spice Starter Sites
 * @since 1.0
 */


/**
 * Set import files
 */
if ( !function_exists( 'olivewp_companion_spice_starter_sites_import_files' ) ) {

    function olivewp_companion_spice_starter_sites_import_files() {

        // Demos url
        $demo_url = 'https://olivewp.org/owp/startersites/';

         return array(
            array(
                'import_file_name'              =>  esc_html__('Construction', 'olivewp-companion'),
                'categories'                    =>  [ 'Free Demos' ],
                'import_file_url'               =>  $demo_url . 'construction/sample-data.xml',
                'import_widget_file_url'        =>  $demo_url . 'construction/widgets.wie',
                'import_customizer_file_url'    =>  $demo_url . 'construction/customize-export.dat',
                'preview_url'                   =>  'https://owp-construction.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/construction/thumb.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Architect', 'olivewp-companion'),
                'categories'                    =>  [ 'Free Demos' ],
                'import_file_url'               =>  $demo_url . 'architect/sample-data.xml',
                'import_widget_file_url'        =>  $demo_url . 'architect/widgets.wie',
                'import_customizer_file_url'    =>  $demo_url . 'architect/customize-export.dat',
                'preview_url'                   =>  'https://owp-architect.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/architect/thumb.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Charity', 'olivewp-companion'),
                'categories'                    =>  [ 'Free Demos' ],
                'import_file_url'               =>  $demo_url . 'charity/sample-data.xml',
                'import_widget_file_url'        =>  $demo_url . 'charity/widgets.wie',
                'import_customizer_file_url'    =>  $demo_url . 'charity/customize-export.dat',
                'preview_url'                   =>  'https://owp-charity.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/charity/thumb.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Professional Services', 'olivewp-companion'),
                'categories'                    =>  [ 'Free Demos' ],
                'import_file_url'               =>  $demo_url . 'professional-services/sample-data.xml',
                'import_widget_file_url'        =>  $demo_url . 'professional-services/widgets.wie',
                'import_customizer_file_url'    =>  $demo_url . 'professional-services/customize-export.dat',
                'preview_url'                   =>  'https://owp-professional-services.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/professional-services/thumb.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Dental Care', 'olivewp-companion'),
                'categories'                    =>  [ 'Free Demos' ],
                'import_file_url'               =>  $demo_url . 'dental-care/sample-data.xml',
                'import_widget_file_url'        =>  $demo_url . 'dental-care/widgets.wie',
                'import_customizer_file_url'    =>  $demo_url . 'dental-care/customize-export.dat',
                'preview_url'                   =>  'https://owp-dental-care.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/dental-care/thumb.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Digital Marketing', 'olivewp-companion'),
                'categories'                    =>  [ 'Free Demos' ],
                'import_file_url'               =>  $demo_url . 'digital-marketing/sample-data.xml',
                'import_widget_file_url'        =>  $demo_url . 'digital-marketing/widgets.wie',
                'import_customizer_file_url'    =>  $demo_url . 'digital-marketing/customize-export.dat',
                'preview_url'                   =>  'https://owp-digital-marketing.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/digital-marketing/thumb.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Modern Agency', 'olivewp-companion'),
                'categories'                    =>  [ 'Free Demos' ],
                'import_file_url'               =>  $demo_url . 'modern-agency/sample-data.xml',
                'import_widget_file_url'        =>  $demo_url . 'modern-agency/widgets.wie',
                'import_customizer_file_url'    =>  $demo_url . 'modern-agency/customize-export.dat',
                'preview_url'                   =>  'https://owp-modern-agency.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/modern-agency/thumb.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Office', 'olivewp-companion'),
                'categories'                    =>  [ 'Free Demos' ],
                'import_file_url'               =>  $demo_url . 'office/sample-data.xml',
                'import_widget_file_url'        =>  $demo_url . 'office/widgets.wie',
                'import_customizer_file_url'    =>  $demo_url . 'office/customize-export.dat',
                'preview_url'                   =>  'https://owp-office.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/office/thumb.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Business', 'olivewp-companion'),
                'categories'                    =>  [ 'Premium Demos' ],
                'preview_url'                   =>  'https://owp-business.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/business/thumb-pro.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Travel', 'olivewp-companion'),
                'categories'                    =>  [ 'Premium Demos' ],
                'preview_url'                   =>  'https://owp-travel.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/travel/thumb-pro.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Spacare', 'olivewp-companion'),
                'categories'                    =>  [ 'Premium Demos' ],
                'preview_url'                   =>  'https://owp-spacare.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/spacare/thumb-pro.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Interior', 'olivewp-companion'),
                'categories'                    =>  [ 'Premium Demos' ],
                'preview_url'                   =>  'https://owp-interior.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/interior/thumb-pro.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Real Estate', 'olivewp-companion'),
                'categories'                    =>  [ 'Premium Demos' ],
                'preview_url'                   =>  'https://owp-realestate.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/realestate/thumb-pro.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Skin Spa', 'olivewp-companion'),
                'categories'                    =>  [ 'Premium Demos' ],
                'preview_url'                   =>  'https://owp-skinspa.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/skinspa/thumb-pro.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Healthcare', 'olivewp-companion'),
                'categories'                    =>  [ 'Premium Demos' ],
                'preview_url'                   =>  'https://owp-healthcare.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/healthcare/thumb-pro.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Gymer', 'olivewp-companion'),
                'categories'                    =>  [ 'Premium Demos' ],
                'preview_url'                   =>  'https://owp-gymer.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/gymer/thumb-pro.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Yoga', 'olivewp-companion'),
                'categories'                    =>  [ 'Premium Demos' ],
                'preview_url'                   =>  'https://owp-yoga.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/yoga/thumb-pro.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Massage', 'olivewp-companion'),
                'categories'                    =>  [ 'Premium Demos' ],
                'preview_url'                   =>  'https://owp-massage.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/massagecenter/thumb-pro.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Finance', 'olivewp-companion'),
                'categories'                    =>  [ 'Premium Demos' ],
                'preview_url'                   =>  'https://owp-finance.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/finance/thumb-pro.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Industry', 'olivewp-companion'),
                'categories'                    =>  [ 'Premium Demos' ],
                'preview_url'                   =>  'https://owp-industry.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/industry/thumb-pro.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Coffee Shop', 'olivewp-companion'),
                'categories'                    =>  [ 'Premium Demos' ],
                'preview_url'                   =>  'https://owp-coffee-shop.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/coffee-shop/thumb-pro.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Insurance', 'olivewp-companion'),
                'categories'                    =>  [ 'Premium Demos' ],
                'preview_url'                   =>  'https://owp-insurance.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/insurance/thumb-pro.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Creative Agency', 'olivewp-companion'),
                'categories'                    =>  [ 'Premium Demos' ],
                'preview_url'                   =>  'https://owp-creative-agency.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/creative-agency/thumb-pro.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Adventure', 'olivewp-companion'),
                'categories'                    =>  [ 'Premium Demos' ],
                'preview_url'                   =>  'https://owp-adventure.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/adventure/thumb-pro.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Carpenter', 'olivewp-companion'),
                'categories'                    =>  [ 'Premium Demos' ],
                'preview_url'                   =>  'https://owp-carpenter.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/carpenter/thumb-pro.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Startup Agency', 'olivewp-companion'),
                'categories'                    =>  [ 'Premium Demos' ],
                'preview_url'                   =>  'https://owp-startup-agency.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/startup-agency/thumb-pro.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Jewel', 'olivewp-companion'),
                'categories'                    =>  [ 'Premium Demos' ],
                'preview_url'                   =>  'https://owp-jewel.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/jewel/thumb-pro.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Wedding', 'olivewp-companion'),
                'categories'                    =>  [ 'Premium Demos' ],
                'preview_url'                   =>  'https://owp-wedding.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/wedding/thumb-pro.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Pet Care', 'olivewp-companion'),
                'categories'                    =>  [ 'Premium Demos' ],
                'preview_url'                   =>  'https://owp-pet-care.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/pet-care/thumb-pro.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Sports', 'olivewp-companion'),
                'categories'                    =>  [ 'Premium Demos' ],
                'preview_url'                   =>  'https://owp-sports.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/sport/thumb-pro.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Music', 'olivewp-companion'),
                'categories'                    =>  [ 'Premium Demos' ],
                'preview_url'                   =>  'https://owp-music.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/music/thumb-pro.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Lawyer', 'olivewp-companion'),
                'categories'                    =>  [ 'Premium Demos' ],
                'preview_url'                   =>  'https://owp-lawyer.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/lawyer/thumb-pro.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Automobile', 'olivewp-companion'),
                'categories'                    =>  [ 'Premium Demos' ],
                'preview_url'                   =>  'https://owp-automobile.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/automobile/thumb-pro.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Event Management', 'olivewp-companion'),
                'categories'                    =>  [ 'Premium Demos' ],
                'preview_url'                   =>  'https://owp-event-management.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/event-management/thumb-pro.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Barber Shop', 'olivewp-companion'),
                'categories'                    =>  [ 'Premium Demos' ],
                'preview_url'                   =>  'https://owp-barber-shop.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/barber-shop/thumb-pro.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Hotel and Restaurant', 'olivewp-companion'),
                'categories'                    =>  [ 'Premium Demos' ],
                'preview_url'                   =>  'https://owp-hotel-restro.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/hotel-restro/thumb-pro.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Education', 'olivewp-companion'),
                'categories'                    =>  [ 'Premium Demos' ],
                'preview_url'                   =>  'https://owp-education.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/education/thumb-pro.png',
            ),
            array(
                'import_file_name'              =>  esc_html__('Restaurant', 'olivewp-companion'),
                'categories'                    =>  [ 'Premium Demos' ],
                'preview_url'                   =>  'https://owp-restaurant.olivewp.org/',
                'import_preview_image_url'      =>  $demo_url . 'thumbnail/restaurant/thumb-pro.png',
            )
        );
    }

}
add_filter( 'pt-ocdi/import_files', 'olivewp_companion_spice_starter_sites_import_files' );

/**
 * Define actions that happen after import
 */
if ( !function_exists( 'olivewp_companion_spice_starter_sites_after_import_mods' ) ) {

    function olivewp_companion_spice_starter_sites_after_import_mods() {

        //Assign the menu
        $main_menu = get_term_by( 'name', 'Primary Menu', 'nav_menu' );
        set_theme_mod( 'nav_menu_locations', array(
                'primary' => $main_menu->term_id,
            )
        );

        //Asign the static front page and the blog page
        $front_page = get_page_by_title( 'Home' );
        $blog_page  = get_page_by_title( 'Blog' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page -> ID );
        update_option( 'page_for_posts', $blog_page -> ID );

    }

}
add_action( 'pt-ocdi/after_import', 'olivewp_companion_spice_starter_sites_after_import_mods' );

// Custom CSS for OCDI plugin
function olivewp_companion_spice_starter_sites_ocdi_css() { 
    if(!class_exists('Spice_Starter_Sites_Plus')) { ?>
        <style >
            .ocdi__gl-item:nth-child(n+9) .ocdi__gl-item-buttons .button-primary, .ocdi .ocdi__theme-about, .ocdi__intro-text {
              display: none;
            }
        </style>
    <?php }
}
add_action('admin_enqueue_scripts', 'olivewp_companion_spice_starter_sites_ocdi_css');

// Change the "One Click Demo Import" name from "Starter Sites" in Appearance menu
function olivewp_companion_spice_starter_sites_ocdi_plugin_page_setup( $default_settings ) {
    $default_settings['parent_slug'] = 'admin.php';
    $default_settings['page_title']  = esc_html__( 'One Click Demo Import' , 'olivewp-companion' );
    $default_settings['menu_title']  = esc_html__( 'Starter Sites' , 'olivewp-companion' );
    $default_settings['capability']  = 'import';
    $default_settings['menu_slug']   = 'one-click-demo-import';
    return $default_settings;

}
add_filter( 'ocdi/plugin_page_setup', 'olivewp_companion_spice_starter_sites_ocdi_plugin_page_setup' );

// Register required plugins for the demo's
function olivewp_companion_spice_starter_sites_register_plugins( $plugins ) {

    // List of plugins used by all theme demos.
    $theme_plugins = [
        [   
            'name'     =>   'Elementor', 
            'slug'     =>   'elementor',
            'required' =>   true,
        ],
        [ 
            'name'     =>   'Spice Post Slider',
            'slug'     =>   'spice-post-slider',
            'required' =>   true,
        ],
        [ 
            'name'     =>   'Contact Form 7',
            'slug'     =>   'contact-form-7',
            'required' =>   true,
        ],
        [ 
            'name'     =>   'Yoast SEO',
            'slug'     =>   'wordpress-seo',
            'required' =>   true,
        ],
        [ 
            'name'     =>   'Unique Headers',
            'slug'     =>   'unique-headers',
            'required' =>   true,
        ]
    ];

    // Check if user is on the theme recommeneded plugins step and a demo was selected.
    if (isset( $_GET['step'] ) && $_GET['step'] === 'import' &&  isset( $_GET['import'] )) {
        if ( $_GET['import'] === '3' || $_GET['import'] === '5' || $_GET['import'] === '6' || $_GET['import'] === '7' ) {
            $theme_plugins[] = [
                'name'     => 'Spice Social Share',
                'slug'     => 'spice-social-share',
                'required' => true,
            ]; 
        }
    }

    return array_merge( $plugins, $theme_plugins );

}
add_filter( 'ocdi/register_plugins', 'olivewp_companion_spice_starter_sites_register_plugins' );

/**
* Remove branding
*/
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );