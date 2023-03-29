<?php

//Enqueue Style & Script for admin

add_action('admin_enqueue_scripts','olivewp_companion_style_script');

if(!function_exists('olivewp_companion_style_script')){

    function olivewp_companion_style_script(){
    	wp_enqueue_style( 'olivewp-companion-css', OWC_PLUGIN_URL . 'assets/css/olivewp_companion.css' );
    	wp_enqueue_script('olivewp-companion-js', OWC_PLUGIN_URL . 'assets/js/olivewp_companion.js');
        if(!function_exists('olivewp_plus_activate')){
            wp_enqueue_script('plugin-install');
            wp_enqueue_script('updates');                
            wp_enqueue_script('olivewp-companion-install', OLIVEWP_TEMPLATE_DIR_URI . '/admin/assets/js/plugin-install.js', array('jquery'));
            wp_enqueue_script('olivewp-ajax', OLIVEWP_TEMPLATE_DIR_URI . '/admin/assets/js/ajax.js', array('jquery'));
            wp_localize_script('olivewp-companion-install', 'olivewp_companion_install',
                    array(
                        'installing' => esc_html__('Installing', 'olivewp-companion' ),
                        'activating' => esc_html__('Activating', 'olivewp-companion' ),
                        'error'      => esc_html__('Error', 'olivewp-companion' ),
                        'ajax_url'   => esc_url(admin_url('admin-ajax.php')),
                    ));
        }
    }
}

//Enqueue Style & Script 
add_action('wp_enqueue_scripts','olivewp_companion_load_script');

if(!function_exists('olivewp_companion_load_script')){

    function olivewp_companion_load_script(){
        wp_enqueue_style('olivewp-companion-style', OWC_PLUGIN_URL.'assets/css/style.css');
        wp_enqueue_style('olivewp-companion-owl-css', OWC_PLUGIN_URL.'assets/css/owl.carousel.css');
        wp_enqueue_script('olivewp-companion-owl-js', OWC_PLUGIN_URL . 'assets/js/owl.carousel.min.js', array('jquery'));
    }
}

//Enqueue Script for customizer preview
add_action('customize_preview_init','olivewp_companion_customizer_preview');

if(!function_exists('olivewp_companion_customizer_preview')){

    function olivewp_companion_customizer_preview() {
        wp_enqueue_script( 'olivewp-companion-customizer-preview-js', OWC_PLUGIN_URL .'inc/control/customizer-slider/js/customizer-preview.js', array( 'customize-preview', 'jquery' ) );
    }
}

//Add style in Wp Head
add_action('wp_head','olivewp_companion_wp_head_style');

if(!function_exists('olivewp_companion_wp_head_style')){

    function olivewp_companion_wp_head_style(){
         $olivewp_companion_device=get_theme_mod('customizer_trending_post_visibility','desktop,ipad');
         $olivewp_companion_device_arr=array($olivewp_companion_device);
         ?>
        <style type="text/css">
            <?php if(in_array('ipad,mobile',$olivewp_companion_device_arr)){?>
                    @media (min-width:1100px){.page-section-space.trending-post{display: none;}}
            <?php }elseif(in_array('desktop,mobile',$olivewp_companion_device_arr)){?>
                    @media (min-width:692px) and (max-width:1100px){.page-section-space.trending-post{display: none;}}
             <?php }elseif(in_array('desktop,ipad',$olivewp_companion_device_arr)){?>
                    @media (max-width:691px){.page-section-space.trending-post{display: none;}}
            <?php }elseif($olivewp_companion_device=='desktop'){?>
                        @media (min-width:692px) and (max-width:1100px){.page-section-space.trending-post{display: none;}}
                        @media (max-width:691px){.page-section-space.trending-post{display: none;}}
            <?php }elseif($olivewp_companion_device=='ipad'){?>                
                        @media (min-width:1100px){.page-section-space.trending-post{display: none;}}
                        @media (max-width:691px){.page-section-space.trending-post{display: none;}}             
             <?php }elseif($olivewp_companion_device=='mobile'){?>
                        @media (min-width:1100px){.page-section-space.trending-post{display: none;}}
                        @media (min-width:692px) and (max-width:1100px){.page-section-space.trending-post{display: none;}}
            <?php }elseif(in_array('',$olivewp_companion_device_arr)){?>
                         .page-section-space.trending-post{display: none;}}
            <?php }?>
        </style>
        <?php if(get_theme_mod('trending_post_typo',false)==true){?>
         <style type="text/css">
            /* Section Title Typo */
            body .page-section-space.blog.trending-post .trending-posts .heading-title :is(h1,h2,h3,h4,h5,h6)
            {
            font-family: '<?php echo esc_attr(get_theme_mod('trending_post_fontfamily','Poppins'));?>';
            font-size: <?php echo intval(get_theme_mod('trending_post_fontsize',20));?>px;
            line-height: <?php echo intval(get_theme_mod('trending_post_lheight',30));?>px;
            font-weight: <?php echo intval(get_theme_mod('trending_post_fontweight',700));?>;
            font-style: <?php echo esc_attr(get_theme_mod('trending_post_fontstyle','normal'));?>;
            text-transform: <?php echo esc_attr(get_theme_mod('trending_post_transform','default'));?>;
            }
            /* Post Title Typo */
            body .page-section-space.blog.trending-post .post .post-content .entry-title a
            {
            font-family: '<?php echo esc_attr(get_theme_mod('trending_post_title_fontfamily','Poppins'));?>';
            font-size: <?php echo intval(get_theme_mod('trending_post_title_fontsize',14));?>px;
            line-height: <?php echo intval(get_theme_mod('trending_post_title_lheight',22));?>px;
            font-weight: <?php echo intval(get_theme_mod('trending_post_title_fontweight',500));?>;
            font-style: <?php echo esc_attr(get_theme_mod('trending_post_title_fontstyle','normal'));?>;
            text-transform: <?php echo esc_attr(get_theme_mod('trending_post_title_transform','default'));?>;
            }
        </style>
        <?php }
        if(get_theme_mod('enable_trending_post_clr',false)==true){?>
            <style type="text/css">     
                body .page-section-space.blog.trending-post .trending-posts .heading-title :is(h1,h2,h3,h4,h5,h6)
                {
                color: <?php echo esc_attr(get_theme_mod('trending_post_heading_color','#000000'));?>;
                }
                body .page-section-space.blog.trending-post .post .post-content span.entry-title a
                {
                color: <?php echo esc_attr(get_theme_mod('trending_post_title_color','#000000'));?>;
                }
                body .page-section-space.blog.trending-post .post .post-content span.entry-title a:hover
                {
                color: <?php echo esc_attr(get_theme_mod('trending_post_heading_hover_color','#000000'));?>;
                }
                body .page-section-space.blog.trending-post
                {
                background-color: <?php echo esc_attr(get_theme_mod('trending_post_bg_color','#f0f4f7'));?>;
                }
            </style>
        <?php } ?>
        <style type="text/css">
             body .page-section-space.blog.trending-post{
                    padding: <?php echo intval(get_theme_mod('trending_post_container_spacing',35.2));?>px 0;
                }
        </style>
        <?php
    } 
}