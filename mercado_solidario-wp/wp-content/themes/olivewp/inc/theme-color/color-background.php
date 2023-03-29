<?php
/**
 * Use Color Background settings in the theme package
 *
 * @package OliveWP Theme
*/
function olivewp_color_back_custom_css() {
    // Get values from the customizer settings
    $olivewp_enable_header_color       =   get_theme_mod('enable_header_color', false);
    $olivewp_enable_menu_color         =   get_theme_mod('enable_menu_color', false); 
    $olivewp_enable_content_color      =   get_theme_mod('enable_content_color', false); 
    $olivewp_enable_sidebar_color      =   get_theme_mod('enable_sidebar_color', false);
    $olivewp_enable_footer_color       =   get_theme_mod('enable_footer_color', false);

    /* ====================
        * Header section (Site title, Tagline) 
    ==================== */
    if($olivewp_enable_header_color == true) { ?>
        <style>
            body .custom-logo-link-url .site-title a {
                color: <?php echo esc_attr( get_theme_mod('site_title_link_color', '#fff') ); ?>;
            }
            body .custom-logo-link-url .site-title a:hover {
                color: <?php echo esc_attr( get_theme_mod('site_title_link_hover_color', '#fff') ); ?>;
            }
            body .custom-logo-link-url .site-description {
                color: <?php echo esc_attr( get_theme_mod('tagline_text_color', '#c5c5c5') ); ?>;
            }
        </style>
    <?php }


    /* ====================
        * Menus and Submenus 
    ==================== */
    if($olivewp_enable_menu_color == true) { ?>
        <style>
            body .spice-nav > li.parent-menu a, body .spice-custom .spice-nav .dropdown.open > a, body .cart-header > a.cart-icon, body .spice-custom .spice-nav li > a, body .cart-header > a.total span.cart-total span {
                color: <?php echo esc_attr( get_theme_mod('menu_link_color', '#ffffff') ); ?>;
            }
            body .spice-nav > li.parent-menu a:hover, body .spice-custom .spice-nav .open > a:hover, body .spice-custom .spice-nav > .active > a:hover, body .spice-custom .spice-nav .open.active > a:hover, body .cart-header > a.cart-icon:hover {
                color: <?php echo esc_attr( get_theme_mod('menu_link_hover_color', '#ff6f61') ); ?>;
            }
            body .spice-custom .spice-nav > .active > a, body .spice-custom .spice-nav .open .dropdown-menu > .active > a, .spice-custom .spice-nav .open .dropdown-menu > .active > a:hover, .spice-custom .spice-nav .open .dropdown-menu > .active > a:focus, .spice-custom .spice-nav > .active > a, .spice-custom .spice-nav > .active > a:hover, body .spice-custom .spice-nav > .active.open > a  {
                color: <?php echo esc_attr( get_theme_mod('menu_active_link_color', '#ff6f61') ); ?>;
            }
            body .spice-custom .dropdown-menu, body .spice-custom .open .dropdown-menu {
                background-color: <?php echo esc_attr( get_theme_mod('submenu_bg_color', '#21202e') ); ?>;
            }
            body .spice-custom .dropdown-menu > li > a, body .spice-custom .spice-nav .open > a, body .spice-custom .spice-nav .dropdown-menu .open > a {
                color: <?php echo esc_attr( get_theme_mod('submenu_link_color', '#d5d5d5') ); ?>;
            }
            body .spice-custom .spice-nav .dropdown-menu > li > a:hover, body .spice-custom .spice-nav .open .dropdown-menu > .active > a:hover {
                color: <?php echo esc_attr( get_theme_mod('submenu_link_hover_color', '#ffffff') ); ?>;
            }
        </style>
    <?php }


    /* ====================
        * Content (H1---H6, paragraph) 
    ==================== */
    if($olivewp_enable_content_color == true) { ?>
        <style>
            body .entry-content h1, body.woocommerce .product .product_title {
                color: <?php echo esc_attr( get_theme_mod('h1_color', '#000000') ); ?>;
            }
            body .entry-content h2, body h2.woocommerce-loop-product__title {
                color: <?php echo esc_attr( get_theme_mod('h2_color', '#000000') ); ?>;
            }
            body .entry-content h3, body .comment-form h3, body .comment-title h3 {
                color: <?php echo esc_attr( get_theme_mod('h3_color', '#000000') ); ?>;
            }
            body .entry-content h4, body .blog-author-info h4 {
                color: <?php echo esc_attr( get_theme_mod('h4_color', '#000000') ); ?>;
            }
            body .entry-content h5, body .blog-author h5, body .comment-body h5 {
                color: <?php echo esc_attr( get_theme_mod('h5_color', '#000000') ); ?>;
            }
            body .entry-content h6 {
                color: <?php echo esc_attr( get_theme_mod('h6_color', '#000000') ); ?>;
            }
            body .entry-content p, body .woocommerce-page .product p, body .woocommerce-product-details__short-description p, body .blog-author-info p, body .blog .sticky.post .entry-content p, body .page-section-full p, body .entry-content table, body .entry-content table a, body .entry-content dl, body .entry-content ul, body .entry-content ol, body .entry-content address, body .entry-content cite, body .entry-content pre, body .page-section-full table, body .page-section-full table a, body .page-section-full dl, body .page-section-full ul, body .page-section-full ol, body .page-section-full address, body .page-section-full cite, body .page-section-full pre {
                color: <?php echo esc_attr( get_theme_mod('p_color', '#858585') ); ?>;
            }
            body form.search-form input.search-submit, body input[type="submit"], body .sidebar .wp-block-search .wp-block-search__button, body .post .entry-content .more-link, body .woocommerce button.button, body .woocommerce .return-to-shop a.button, body .woocommerce a.button.alt, body .woocommerce button.button.alt, body .woocommerce a.button, body.woocommerce-page ul.products li.product .button, body.woocommerce div.product form.cart .button, body.woocommerce #respond input#submit, body.woocommerce a.added_to_cart, body .wp-block-button__link, body .blog .sticky.post .entry-content .more-link  {
                color: <?php echo esc_attr( get_theme_mod('button_color', '#ffffff') ); ?>;
            }
            body form.search-form input.search-submit, body input[type="submit"], body .sidebar .wp-block-search .wp-block-search__button, body .post .entry-content .more-link, body .woocommerce button.button, body .woocommerce .return-to-shop a.button, body .woocommerce a.button.alt, body .woocommerce button.button.alt, body .woocommerce a.button, body.woocommerce-page ul.products li.product .button, body.woocommerce div.product form.cart .button, body.woocommerce #respond input#submit, body.woocommerce a.added_to_cart, body .wp-block-button__link, body .blog .sticky.post .entry-content .more-link {
                background-color: <?php echo esc_attr( get_theme_mod('button_back_color', '#ff6f61') ); ?>;
                border-color: <?php echo esc_attr( get_theme_mod('button_back_color', '#ff6f61') ); ?>;
            }
            body form.search-form input.search-submit:hover, body input[type="submit"]:hover, body .sidebar .wp-block-search .wp-block-search__button:hover, body .post .entry-content .more-link:hover, body .woocommerce button.button:hover, body .woocommerce .return-to-shop a.button:hover, body .woocommerce button.button:disabled[disabled]:hover, body .woocommerce a.button.alt:hover, body .woocommerce button.button.alt:hover, body .woocommerce a.button:hover, body.woocommerce-page ul.products li.product .button:hover, body.woocommerce div.product form.cart .button:hover, body.woocommerce #respond input#submit:hover, body.woocommerce a.added_to_cart:hover, body .wp-block-button__link:hover, body .blog .sticky.post .entry-content .more-link:hover {
                color: <?php echo esc_attr( get_theme_mod('button_hover_color', '#ffffff') ); ?>;
            }
            body form.search-form input.search-submit:hover, body input[type="submit"]:hover, body .sidebar .wp-block-search .wp-block-search__button:hover, body .post .entry-content .more-link:hover, body .woocommerce button.button:hover, body .woocommerce .return-to-shop a.button:hover, body .woocommerce button.button:disabled[disabled]:hover, body .woocommerce a.button.alt:hover, body .woocommerce button.button.alt:hover, body .woocommerce a.button:hover, body.woocommerce-page ul.products li.product .button:hover, body.woocommerce div.product form.cart .button:hover, body.woocommerce #respond input#submit:hover, body.woocommerce a.added_to_cart:hover, body .wp-block-button__link:hover, body .blog .sticky.post .entry-content .more-link:hover {
                background-color: <?php echo esc_attr( get_theme_mod('button_back_hover_color', '#ff6f61') ); ?>;
                border-color: <?php echo esc_attr( get_theme_mod('button_back_hover_color', '#ff6f61') ); ?>;
            }
        </style>
    <?php }


    /* ====================
        * Sidebar 
    ==================== */
    if($olivewp_enable_sidebar_color == true) { ?>
        <style>
            body .sidebar .wp-block-search .wp-block-search__label, body .sidebar .widget.widget_block h1, body .sidebar .widget.widget_block h2, body .sidebar .widget.widget_block h3, body .sidebar .widget.widget_block h4, body .sidebar .widget.widget_block h5, body .sidebar .widget.widget_block h6, body .widget .widget-title, body .wc-block-product-search__label {
                color: <?php echo esc_attr( get_theme_mod('sidebar_title_color', '#000000') ); ?>;
            }
            body .sidebar p, body .sidebar .wp-block-calendar table tbody {
                color: <?php echo esc_attr( get_theme_mod('sidebar_text_color', '#858585') ); ?>;
            }
            body .sidebar ul li a, body .sidebar ol li a, body .sidebar .widget p a, body .woocommerce ul.cart_list li a, body .woocommerce ul.product_list_widget li a, body .widget .tagcloud a, body .sidebar .widget .wp-block-tag-cloud a {
                color: <?php echo esc_attr( get_theme_mod('sidebar_link_color', '#858585') ); ?>;
            }
            body .sidebar ul li a:hover, body .sidebar ol li a:hover, body .sidebar .widget p a:hover {
                color: <?php echo esc_attr( get_theme_mod('sidebar_link_hover_color', '#ff6f61') ); ?>;
            }
        </style>
    <?php }


    /* ====================
        * Footer 
    ==================== */
    if($olivewp_enable_footer_color == true) { ?>
        <style>
            body .site-footer {
                background-color: <?php echo esc_attr( get_theme_mod('footer_bg_color', '#000000') ); ?>;
            }
            body .footer-sidebar .wp-block-search .wp-block-search__label, body .footer-sidebar .widget.widget_block h1, body .footer-sidebar .widget.widget_block h2, body .footer-sidebar .widget.widget_block h3, body .footer-sidebar .widget.widget_block h4, body .footer-sidebar .widget.widget_block h5, body .footer-sidebar .widget.widget_block h6, body .footer-sidebar .widget .widget-title {
                color: <?php echo esc_attr( get_theme_mod('footer_title_color', '#ffffff') ); ?>;
            }
            body .footer-sidebar p, body .footer-sidebar .wp-block-calendar table tbody, body .footer-sidebar .widget, body .footer-sidebar address {
                color: <?php echo esc_attr( get_theme_mod('footer_text_color', '#858585') ); ?>;
            }
            body .footer-sidebar a, body .footer-sidebar .widget .wp-block-tag-cloud a {
                color: <?php echo esc_attr( get_theme_mod('footer_link_color', '#ffffff') ); ?>;
            }
            body .footer-sidebar a:hover, body .footer-sidebar .widget .wp-block-tag-cloud a:hover {
                color: <?php echo esc_attr( get_theme_mod('footer_link_hover_color', '#ff6f61') ); ?>;
            }
        </style>
    <?php }
}
add_action('wp_head', 'olivewp_color_back_custom_css');