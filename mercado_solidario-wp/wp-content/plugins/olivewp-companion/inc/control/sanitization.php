<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


// Callback function for spice social share color
function olivewp_companion_trending_post_color_callback($control) {
    if (false == $control->manager->get_setting('enable_trending_post_clr')->value()) {
        return false;
    } else {
        return true;
    }
}

// Callback function for spice social share typo
function olivewp_companion_trending_post_typo_callback($control) {
    if (false == $control->manager->get_setting('trending_post_typo')->value()) {
        return false;
    } else {
        return true;
    }
}

/**
 * Checkbox sanitization callback
*/
function olivewp_companion_sanitize_checkbox($checked) {

    // Boolean check.
    return ( ( isset($checked) && true == $checked ) ? true : false );

}


/**
 * Select choices sanitization callback
*/
function olivewp_companion_sanitize_select($input, $setting) {
    //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
    $input = sanitize_key($input);
    //get the list of possible radio box options 
    $choices = $setting->manager->get_control($setting->id)->choices;
    //return input if valid or return default option
    return ( array_key_exists($input, $choices) ? $input : $setting->default );
}

function olivewp_companion_sanitize_text($input) {

    return wp_kses_post(force_balance_tags($input));

}

/**
 * Select  Dropdown  sanitization callback
*/

if (!function_exists('olivewp_companion_select2_text_sanitization')) {

        function olivewp_companion_select2_text_sanitization($input) {
            if (strpos($input, ',') !== false) {
                $input = explode(',', $input);
            }
            if (is_array($input)) {
                foreach ($input as $key => $value) {
                    $input[$key] = sanitize_text_field($value);
                }
                $input = implode(',', $input);
            } else {
                $input = sanitize_text_field($input);
            }
            return $input;
        }

    }