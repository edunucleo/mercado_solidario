<?php
/**
 * Use typography settings in the theme package
 *
 * @package OliveWP Theme
*/
function olivewp_typography_custom_css() {
    // Get values from the customizer settings
    $olivewp_enable_header_typo    =   get_theme_mod('enable_header_typography', false);
    $olivewp_enable_content_typo   =   get_theme_mod('enable_content_typography', false);
    $olivewp_enable_post_typo      =   get_theme_mod('enable_post_typography', false);
    $olivewp_enable_shop_typo      =   get_theme_mod('enable_shop_typography', false);
    $olivewp_enable_sidebar_typo   =   get_theme_mod('enable_sidebar_typography', false);
    $olivewp_enable_footer_typo    =   get_theme_mod('enable_footer_typography', false);

    /* ====================
        * Header section (Site title, Tagline, Menu, Submenu) 
    ==================== */
    if($olivewp_enable_header_typo == true) { ?>
        <style>
            body .site-title {
                font-family: '<?php echo esc_attr( get_theme_mod('site_title_fontfamily','Poppins') );?>';
                font-size: <?php echo intval( get_theme_mod('site_title_fontsize', '30') ) . 'px'; ?> ;
                line-height: <?php echo intval( get_theme_mod('site_title_line_height','39') ).'px'; ?> ;
            }
            body .site-description {
                font-family: '<?php echo esc_attr( get_theme_mod('tagline_fontfamily','Poppins') );?>';
                font-size: <?php echo intval( get_theme_mod('tagline_fontsize', '18') ) . 'px'; ?> ;
                line-height: <?php echo intval( get_theme_mod('tagline_line_height','29') ).'px'; ?> ;
            }
            body .spice-nav > li.parent-menu a {
                font-family: '<?php echo esc_attr( get_theme_mod('menu_fontfamily','Poppins') );?>';
                font-size: <?php echo intval( get_theme_mod('menu_fontsize', '14') ) . 'px'; ?> ;
                line-height: <?php echo intval( get_theme_mod('menu_line_height','22') ).'px'; ?> ;
            }
            body .spice-nav .dropdown-menu > li a {
                font-family: '<?php echo esc_attr( get_theme_mod('submenu_fontfamily','Poppins') );?>';
                font-size: <?php echo intval( get_theme_mod('submenu_fontsize', '14') ) . 'px'; ?> ;
                line-height: <?php echo intval( get_theme_mod('submenu_line_height','20') ).'px'; ?> ;
            }
        </style>
    <?php }

    /* ====================
        * Content(H1----H6, Paragraph, Button) 
    ==================== */
    if($olivewp_enable_content_typo == true) { ?>
        <style>
            body .entry-content h1, body .page-section-full h1 {
                font-family: '<?php echo esc_attr( get_theme_mod('content_h1_fontfamily','Poppins') );?>';
                font-size: <?php echo intval( get_theme_mod('content_h1_fontsize', '42') ) . 'px'; ?> ;
                line-height: <?php echo intval( get_theme_mod('content_h1_line_height','63') ).'px'; ?> ;
            }
            body .entry-content h2:not(.woocommerce-page h2), body .page-section-full h2 {
                font-family: '<?php echo esc_attr( get_theme_mod('content_h2_fontfamily','Poppins') );?>';
                font-size: <?php echo intval( get_theme_mod('content_h2_fontsize', '30') ) . 'px'; ?> ;
                line-height: <?php echo intval( get_theme_mod('content_h2_line_height','45') ).'px'; ?> ;
            }
            body .entry-content h3:not(.woocommerce-page h3), body .page-section-full h3 {
                font-family: '<?php echo esc_attr( get_theme_mod('content_h3_fontfamily','Poppins') );?>';
                font-size: <?php echo intval( get_theme_mod('content_h3_fontsize', '24') ) . 'px'; ?> ;
                line-height: <?php echo intval( get_theme_mod('content_h3_line_height','36') ).'px'; ?> ;
            }
            body .entry-content h4, body .page-section-full h4 {
                font-family: '<?php echo esc_attr( get_theme_mod('content_h4_fontfamily','Poppins') );?>';
                font-size: <?php echo intval( get_theme_mod('content_h4_fontsize', '20') ) . 'px'; ?> ;
                line-height: <?php echo intval( get_theme_mod('content_h4_line_height','30') ).'px'; ?> ;
            }
            body .entry-content h5, body .page-section-full h5 {
                font-family: '<?php echo esc_attr( get_theme_mod('content_h5_fontfamily','Poppins') );?>';
                font-size: <?php echo intval( get_theme_mod('content_h5_fontsize', '18') ) . 'px'; ?> ;
                line-height: <?php echo intval( get_theme_mod('content_h5_line_height','27') ).'px'; ?> ;
            }
            body .entry-content h6, body .page-section-full h6 {
                font-family: '<?php echo esc_attr( get_theme_mod('content_h6_fontfamily','Poppins') );?>';
                font-size: <?php echo intval( get_theme_mod('content_h6_fontsize', '16') ) . 'px'; ?> ;
                line-height: <?php echo intval( get_theme_mod('content_h6_line_height','24') ).'px'; ?> ;
            }
            body .entry-content p, body .blog-author p, body .comment-section p, body .comment-form p, body .woocommerce-product-details__short-description p, body .page-section-full p, body input, body textarea, body select, body.woocommerce-page p:not(body.woocommerce-page .site-footer p) {
                font-family: '<?php echo esc_attr( get_theme_mod('content_p_fontfamily','Poppins') );?>';
                font-size: <?php echo intval( get_theme_mod('content_p_fontsize', '18') ) . 'px'; ?> ;
                line-height: <?php echo intval( get_theme_mod('content_p_line_height','29') ).'px'; ?> ;
            }
            body .spice.spice-custom .header-button a .txt, body form.search-form input.search-submit, body input[type="submit"], button[type="submit"], .wp-block-button__link, body.woocommerce div.product form.cart .button, body.woocommerce ul.products li.product .button, body.woocommerce .cart .button, body .cart_totals  .wc-proceed-to-checkout a.checkout-button, body.woocommerce #payment #place_order, body .post .entry-content .more-link, body .page-section-full .wp-block-button__link, body.woocommerce-page ul.products li.product .button {
                font-family: '<?php echo esc_attr( get_theme_mod('content_button_fontfamily','Poppins') );?>';
                font-size: <?php echo intval( get_theme_mod('content_button_fontsize', '14') ) . 'px'; ?> ;
                line-height: <?php echo intval( get_theme_mod('content_button_line_height','14') ).'px'; ?> ;
            }
        </style>
    <?php }

    /* ====================
        * Blog/Archive/Single Post
    ==================== */
    if($olivewp_enable_post_typo == true) { ?>
        <style> 
            body .post-content .entry-header h3.entry-title, body article .entry-header h3.entry-title{
                font-family: '<?php echo esc_attr( get_theme_mod('post_fontfamily','Poppins') );?>';
                font-size: <?php echo intval( get_theme_mod('post_fontsize', '24') ) . 'px'; ?> ;
                line-height: <?php echo intval( get_theme_mod('post_line_height','36') ).'px'; ?> ;
            }
        </style>
    <?php }

    /* ====================
        * Shop Page
    ==================== */
    if($olivewp_enable_shop_typo == true) { ?>
        <style>
            body.woocommerce h1.product_title {
                font-family: '<?php echo esc_attr( get_theme_mod('shop_h1_fontfamily','Poppins') );?>';
                font-size: <?php echo intval( get_theme_mod('shop_h1_fontsize', '42') ) . 'px'; ?> ;
                line-height: <?php echo intval( get_theme_mod('shop_h1_line_height','63') ).'px'; ?> ;
            }
            body.woocommerce ul.products li.product .woocommerce-loop-product__title, body.woocommerce h2:not(.sidebar h2, .footer-sidebar h2, .woocommerce-page h2.site-title), body.woocommerce-page .cart_totals h2, body.woocommerce-page h2.woocommerce-loop-product__title, body.woocommerce-page .cross-sells h2, body .woocommerce ul.products li.product .woocommerce-loop-product__title {
                font-family: '<?php echo esc_attr( get_theme_mod('shop_h2_fontfamily','Poppins') );?>';
                font-size: <?php echo intval( get_theme_mod('shop_h2_fontsize', '18') ) . 'px'; ?> ;
                line-height: <?php echo intval( get_theme_mod('shop_h2_line_height','27') ).'px'; ?> ;
            }
            body.woocommerce-page h3:not(.sidebar h3, .footer-sidebar h3) {
                font-family: '<?php echo esc_attr( get_theme_mod('shop_h3_fontfamily','Poppins') );?>' ;
                font-size: <?php echo intval( get_theme_mod('shop_h3_fontsize', '24') ) . 'px'; ?> ;
                line-height: <?php echo intval( get_theme_mod('shop_h3_line_height','36') ).'px'; ?> ;
            }
        </style>
    <?php }

    /* ====================
        * Sidebar
    ==================== */
    if($olivewp_enable_sidebar_typo == true) { ?>
        <style>
            body .sidebar .wp-block-search .wp-block-search__label, body .sidebar .widget.widget_block h1, body .sidebar .widget.widget_block h2, body .sidebar .widget.widget_block h3, body .sidebar .widget.widget_block h4, body .sidebar .widget.widget_block h5, body .sidebar .widget.widget_block h6, body .sidebar .widget .widget-title, body .sidebar .wc-block-product-search__label {
                font-family: '<?php echo esc_attr( get_theme_mod('sidebar_widget_title_fontfamily','Poppins') );?>' ;
                font-size: <?php echo intval( get_theme_mod('sidebar_widget_title_fontsize', '30') ) . 'px'; ?> ;
                line-height: <?php echo intval( get_theme_mod('sidebar_widget_title_line_height','45') ).'px'; ?> ;
            }
            body .sidebar ul li a:not(.sidebar .wp-block-social-links .wp-social-link a), body.sidebar ol li a, body .sidebar .wp-block-latest-comments, body .sidebar .wp-block-latest-posts__post-excerpt, .sidebar p:not(.sidebar .widget p.wp-block-tag-cloud)  {
                font-family: '<?php echo esc_attr( get_theme_mod('sidebar_widget_content_fontfamily','Poppins') );?>' ;
                font-size: <?php echo intval( get_theme_mod('sidebar_widget_content_fontsize', '18') ) . 'px'; ?> ;
                line-height: <?php echo intval( get_theme_mod('sidebar_widget_content_line_height','29') ).'px'; ?> ;
            }
            body .sidebar .widget .wp-block-tag-cloud a {
                font-family: '<?php echo esc_attr( get_theme_mod('sidebar_widget_content_fontfamily','Poppins') );?>';
                font-size: <?php echo intval( get_theme_mod('sidebar_widget_content_fontsize', '18') ) . 'px'; ?> !important;
                line-height: <?php echo intval( get_theme_mod('sidebar_widget_content_line_height','29') ).'px'; ?> ;
            }
        </style>
    <?php }

    /* ====================
        * Footer
    ==================== */
    if($olivewp_enable_footer_typo == true) { ?>
        <style>
            body .footer-sidebar .wp-block-search .wp-block-search__label, body .footer-sidebar .widget.widget_block h1, body .footer-sidebar .widget.widget_block h2, body .footer-sidebar .widget.widget_block h3, body .footer-sidebar .widget.widget_block h4, body .footer-sidebar .widget.widget_block h5, body .footer-sidebar .widget.widget_block h6, body .footer-sidebar .widget .widget-title {
                font-family: '<?php echo esc_attr( get_theme_mod('footer_widget_title_fontfamily','Poppins') );?>';
                font-size: <?php echo intval( get_theme_mod('footer_widget_title_fontsize', '30') ) . 'px'; ?> ;
                line-height: <?php echo intval( get_theme_mod('footer_widget_title_line_height','30') ).'px'; ?> ;
            }
            body .footer-sidebar a:not(.footer-sidebar .wp-block-social-links .wp-social-link a), body .footer-sidebar p:not(.footer-sidebar .widget p.wp-block-tag-cloud), body .footer-sidebar .wp-block-latest-posts__post-excerpt {
                font-family: '<?php echo esc_attr( get_theme_mod('footer_widget_content_fontfamily','Poppins') );?>' ;
                font-size: <?php echo intval( get_theme_mod('footer_widget_content_fontsize', '18') ) . 'px'; ?> ;
                line-height: <?php echo intval( get_theme_mod('footer_widget_content_line_height','29') ).'px'; ?> ;
            }
            body .footer-sidebar .widget .wp-block-tag-cloud a {
                font-family: '<?php echo esc_attr( get_theme_mod('footer_widget_content_fontfamily','Poppins') );?>' ;
                font-size: <?php echo intval( get_theme_mod('footer_widget_content_fontsize', '18') ) . 'px'; ?> !important;
                line-height: <?php echo intval( get_theme_mod('footer_widget_content_line_height','29') ).'px'; ?> ;
            }
        </style>
    <?php }
}
add_action('wp_head', 'olivewp_typography_custom_css');