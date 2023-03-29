<?php
/**
 * Use Custom color setting in the theme package
 *
 * @package OliveWP Theme
*/
function olivewp_custom_color_css() {

    $link_color = get_theme_mod('link_color','#ff6f61');
    list($r, $g, $b) = sscanf($link_color, "#%02x%02x%02x");
    $r = $r - 255;
    $g = $g - 111;
    $b = $b - 96;

    if ($link_color != '#ff0000') { ?>

        <style type="text/css">
            a:hover, a:focus, .entry-meta a:hover span,.entry-meta a:focus span, .entry-meta a:hover, .entry-meta a:focus, dl dd a, dl dd a:hover, dl dd a:focus, ul li a:focus, .btn-default-light:hover, .btn-default-light:focus, .spice-custom .spice-nav > .active > a, .spice-custom .spice-nav > .active > a:hover, .spice-custom .spice-nav > .active > a:focus, .cart-header:hover > a, .contact-icon i, .woocommerce-loop-product__title:hover, .woocommerce-message::before, .woocommerce-info::before, .woocommerce div.product .stock, .woocommerce p.stars a, .product-price > .woocommerce-loop-product__title a:hover, .product-price > .woocommerce-loop-product__title a:focus, .head-contact-info li a:hover, .head-contact-info li a:focus, .site-footer .site-info .footer-nav li a:hover, .site-footer .site-info .footer-nav li a:focus, .entry-meta i, .page-breadcrumb > li a:hover, .pagination a:hover,.pagination a:focus, .pagination a.next:focus,.pagination a.next:hover, .pagination a.previous:focus,.pagination a.previous:hover, .site-info p.copyright-section a:hover, .site-info p.copyright-section a:focus, .error-page .title, .sidebar ul li a:hover,.sidebar ul li a:focus, .blog .sticky.post .entry-meta span:hover, .blog .sticky.post .entry-meta a:hover, .sidebar ol li a:hover, .footer-sidebar a:hover, .footer-sidebar a:focus, .site-info a:hover, .site-info a:focus, .entry-content p a:hover, .entry-content p a:focus, .nav-item.html.menu-item.lite-html a:hover, .custom-logo-link-url .site-title a:hover,.elementor-page .elementor a:hover { 
                color: <?php echo esc_attr($link_color) ?> ;
            }
            button, input[type="button"], input[type="submit"], .btn-default, .btn-light:hover, .btn-light:focus, .btn-default-light, .btn-default-light:hover, .btn-default-light:focus, .blog .sticky.post .entry-content .more-link:hover {
                border: 1px solid <?php echo esc_attr($link_color) ?>;
            }
            button:hover, button:focus, input[type="button"]:hover, input[type="button"]:focus, input[type="submit"]:hover, input[type="submit"]:focus, .btn-default, .btn-light:hover, .btn-light:focus, .btn-default-dark, .btn-default-light, .cart-header > a .cart-total, .woocommerce ul.products li.product .onsale, .woocommerce span.onsale, .woocommerce ul.products li.product .button, .owl-item .item .cart .add_to_cart_button, .woocommerce div.product form.cart .button, .woocommerce a.button, .woocommerce a.button:hover, .woocommerce a.button, .woocommerce .woocommerce-Button, .woocommerce .cart input.button, .woocommerce input.button.alt, .woocommerce button.button, .woocommerce #respond input#submit, .woocommerce .cart input.button:hover, .woocommerce .cart input.button:focus, .woocommerce input.button.alt:hover, .woocommerce input.button.alt:focus, .woocommerce input.button:hover, .woocommerce input.button:focus, .woocommerce button.button:hover, .woocommerce button.button:focus, .woocommerce #respond input#submit:hover, .woocommerce #respond input#submit:focus, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .added_to_cart.wc-forward, .olivewp-preloader-cube .olivewp-cube:before {
                background: <?php echo esc_attr($link_color) ?> ;
            }
            .form-control:focus {
                border: thin dotted <?php echo esc_attr($link_color) ?>;
            }
            .btn-border, .btn-border:hover, .btn-border:focus { border: 2px solid <?php echo esc_attr($link_color) ?>; }
            .btn-light:not(:disabled):not(.disabled):active {
                background-color: <?php echo esc_attr($link_color) ?>;
                border-color: <?php echo esc_attr($link_color) ?>;
            }
            .spice-custom .spice-nav > li > a:focus, .spice-custom .spice-nav > li > a:hover, .spice-custom .spice-nav .open > a, .spice-custom .spice-nav .open > a:focus, .spice-custom .spice-nav .open > a:hover, .spice-custom .spice-nav .open .dropdown-menu > .active > a, .spice-custom .spice-nav .open .dropdown-menu > .active > a:hover, .spice-custom .spice-nav .open .dropdown-menu > .active > a:focus, .spice-classic .spice-nav > li > a:hover, .spice-classic .spice-nav > li > a:focus, .spice-classic .spice-nav > .open > a, .spice-classic .spice-nav > .open > a:hover, .spice-classic .spice-nav > .open > a:focus {
                color: <?php echo esc_attr($link_color) ?>;
                background-color: transparent;
            }
            .spice-custom .dropdown-menu {
                border-top: 2px solid <?php echo esc_attr($link_color) ?>;
                border-bottom: 2px solid <?php echo esc_attr($link_color) ?>;
            }
            .spice-classic .spice-nav > .active > a, .spice-classic .spice-nav > .active > a:hover, .spice-classic .spice-nav > .active > a:focus {
                background-color: transparent;
                color: <?php echo esc_attr($link_color) ?>;
                border-top: 2px solid <?php echo esc_attr($link_color) ?>;
            }
            .custom-social-icons li > a:hover, .custom-social-icons li > a:focus, .owl-carousel .owl-prev:hover, .owl-carousel .owl-prev:focus, .owl-carousel .owl-next:hover, .owl-carousel .owl-next:focus, #loadMore:hover {
                background-color: <?php echo esc_attr($link_color) ?>;
                color: #ffffff;
            }
            .layout-2 .custom-social-icons li > a:hover, .layout-2 .custom-social-icons li > a:focus {
                background-color: #ffffff;
                color: <?php echo esc_attr($link_color) ?>;
            }
            form.search-form input.search-submit, input[type="submit"], .woocommerce-product-search input[type="submit"], button[type="submit"], .footer-sidebar .wp-block-search .wp-block-search__button, .sidebar .wp-block-search .wp-block-search__button, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .head-contact-info i, .scroll-up a, .sidebar .widget .wp-block-tag-cloud a:hover, .sidebar .widget .wp-block-tag-cloud a:focus, .footer-sidebar .widget .wp-block-tag-cloud a:hover, .footer-sidebar .widget .wp-block-tag-cloud a:focus, .layout-2, .widget .tagcloud a:hover, .widget .tagcloud a:focus, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle {
                background-color: <?php echo esc_attr($link_color) ?>;
            }
            .woocommerce-message, .woocommerce-info {
                border-top-color: <?php echo esc_attr($link_color) ?>;
            }
            .spice.spice-custom .header-button a { 
                background-color: <?php echo esc_attr($link_color) ?>; 
                border: 2px solid <?php echo esc_attr($link_color) ?>;
            } 
            .spice.spice-custom .header-button a:hover,.spice.spice-custom .header-button a:focus {
                color: #fff;
                background-color: <?php echo esc_attr($link_color) ?>;
                border: 2px solid <?php echo esc_attr($link_color) ?>;
            }
            .post .entry-content .more-link:hover { 
                border: 1px solid <?php echo esc_attr($link_color) ?>;
                background-color: <?php echo esc_attr($link_color) ?>;
                color: #ffffff;
            }
            .pagination a.active, .pagination span.current {
                position: relative;
                color: <?php echo esc_attr($link_color) ?>;
            }
            .site-info, .blog .sticky.post .entry-content .more-link:hover {
                border-top: 1px solid <?php echo esc_attr($link_color) ?>;
            }
            .error_404 svg path {
                fill: <?php echo esc_attr($link_color) ?>; 
            }
            blockquote { 
                border-left: 5px solid <?php echo esc_attr($link_color) ?>;
            }
            .blog .sticky.post { background-color: #8b8180; }
            .blog .sticky.post .entry-meta span:hover, .blog .sticky.post .entry-meta a:hover, .blog .sticky.post h3.entry-title a:hover { color: #ffffff; }
        </style>

    <?php }

}