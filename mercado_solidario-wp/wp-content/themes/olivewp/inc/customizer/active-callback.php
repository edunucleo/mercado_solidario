<?php
/**
 * Active Callback for customizer settings
 *
 * @package OliveWP Theme
*/

// callback function for the footer copyright 
function olivewp_footer_copyright_callback($control) {
    if (true == $control->manager->get_setting('footer_copyright_enable')->value()) {
        return true;
    } else {
        return false;
    }
}

// callback function for the footer widgets 
function olivewp_footer_widgets_callback($control) {
    if (true == $control->manager->get_setting('footer_widget_enable')->value()) {
        return true;
    } else {
        return false;
    }
}

// callback function for the custom color
function olivewp_custom_color_callback($control) {
    if (true == $control->manager->get_setting('custom_color_enable')->value()) {
        return true;
    } else {
        return false;
    }
}

// callback function for the header typogyaphy
function olivewp_header_typography_callback($control) {
    if (false == $control->manager->get_setting('enable_header_typography')->value()) {
        return false;
    } else {
        return true;
    }
}

// callback function for the header typogyaphy
function olivewp_content_typography_callback($control) {
    if (false == $control->manager->get_setting('enable_content_typography')->value()) {
        return false;
    } else {
        return true;
    }
}

// callback function for the post typogyaphy
function olivewp_post_typography_callback($control) {
    if (false == $control->manager->get_setting('enable_post_typography')->value()) {
        return false;
    } else {
        return true;
    }
}

// callback function for the shop page typogyaphy
function olivewp_shop_typography_callback($control) {
    if (false == $control->manager->get_setting('enable_shop_typography')->value()) {
        return false;
    } else {
        return true;
    }
}

// callback function for the sidebar widget typogyaphy
function olivewp_sidebar_widget_typography_callback($control) {
    if (false == $control->manager->get_setting('enable_sidebar_typography')->value()) {
        return false;
    } else {
        return true;
    }
}

// callback function for the footer widget typogyaphy
function olivewp_footer_widget_typography_callback($control) {
    if (false == $control->manager->get_setting('enable_footer_typography')->value()) {
        return false;
    } else {
        return true;
    }
}

// callback function for the header color
function olivewp_header_color_callback($control) {
    if (false == $control->manager->get_setting('enable_header_color')->value()) {
        return false;
    } else {
        return true;
    }
}

// callback function for the menu color
function olivewp_menu_color_callback($control) {
    if (false == $control->manager->get_setting('enable_menu_color')->value()) {
        return false;
    } else {
        return true;
    }
}

// callback function for the content color
function olivewp_content_color_callback($control) {
    if (false == $control->manager->get_setting('enable_content_color')->value()) {
        return false;
    } else {
        return true;
    }
}

// callback function for the sidebar color
function olivewp_sidebar_color_callback($control) {
    if (false == $control->manager->get_setting('enable_sidebar_color')->value()) {
        return false;
    } else {
        return true;
    }
}

// callback function for the footer color
function olivewp_footer_color_callback($control) {
    if (false == $control->manager->get_setting('enable_footer_color')->value()) {
        return false;
    } else {
        return true;
    }
}
// callback function for the page title
function olivewp_page_title_callback($control) {
    if (false == $control->manager->get_setting('enable_page_title')->value()) {
        return false;
    } else {
        return true;
    }
}

//callback function for the breadcrumbs section
function olivewp_breadcrumb_section_callback($control) {
    if (false == $control->manager->get_setting('breadcrumb_banner_enable')->value()) {
        return false;
    } else {
        return true;
    }
}

//ReadMore Callback function
function olivewp_blog_readmore_callback ( $control ) 
{
    if( true == $control->manager->get_setting ('olivewp_plus_enable_post_read_more')->value()){
        return true;
    }
    else {
        return false;
    }       
}