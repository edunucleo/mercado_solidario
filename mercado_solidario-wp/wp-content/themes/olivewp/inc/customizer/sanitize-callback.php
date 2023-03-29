<?php
/**
 * Sanitization Callbacks
 * 
 * @package OliveWP theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Text sanitization callback
*/
function olivewp_sanitize_text($input) {

    return wp_kses_post(force_balance_tags($input));

}

function olivewp_sanitize_array($value) {

    if (is_array($value)) {
        foreach ($value as $key => $subvalue) {
            $value[$key] = esc_attr($subvalue);
        }
        return $value;
    }
    return esc_attr($value);

}

/**
 * Select choices sanitization callback
*/
function olivewp_sanitize_select($input, $setting) {

    //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
    $input = sanitize_key($input);

    //get the list of possible radio box options 
    $choices = $setting->manager->get_control($setting->id)->choices;

    //return input if valid or return default option
    return ( array_key_exists($input, $choices) ? $input : $setting->default );
}

/**
 * Checkbox sanitization callback
*/
function olivewp_sanitize_checkbox($checked) {

    // Boolean check.
    return ( ( isset($checked) && true == $checked ) ? true : false );

}

/**
 * Range number sanitization callback
*/
function olivewp_sanitize_number_range($input, $setting) {

    // Ensure input is an absolute integer.
    $input = absint($input);

    // Get the input attributes associated with the setting.
    $atts = $setting->manager->get_control($setting->id)->input_attrs;

    // Get min.
    $min = ( isset($atts['min']) ? $atts['min'] : $input );

    // Get max.
    $max = ( isset($atts['max']) ? $atts['max'] : $input );

    // Get Step.
    $step = ( isset($atts['step']) ? $atts['step'] : 1 );

    // If the input is within the valid range, return it; otherwise, return the default.
    return ( $min <= $input && $input <= $max && is_int($input / $step) ? $input : $setting->default );
    
}