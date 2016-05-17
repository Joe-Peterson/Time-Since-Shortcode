<?php
/*
   Plugin Name: Time Since Shortcode
   Plugin URI: http://wordpress.org/extend/plugins/time-since-shortcode/
   Version: 0.1
   Author: Joe Peterson
   Description: A very simple, lightweight plugin. time_since generates a string formatted as "XX years". XX representing a current count of years since the given variable. e.g. [time_since from='01-01-1975' after=' ago']
   Text Domain: time-since-shortcode
   License: GPLv3
  */
// SHORTCODE: time_since
// DESCRIPTION: time_since generates a string formatted as "XX years". XX representing a current count of years since the given variable, 'from'.
// ATTRIBUTES:
// FROM -- Attribute 'from' is required. Should be formatted as 'mm-dd-yyyy'.
// AFTER -- Attribute 'after' is optional. Will be placed directly after the string 'XX years'.
// *Note that a space will not be created between the two by default. You must add a space in the shortcode if you use 'after'.
// EXAMPLE:
// Minimum shortcode - [time_since from='01-01-1975'] Result: '41 years' (as of 3/16/2016)
// Utilizing 'after' attribute - [time_since from='01-01-1975' after=' ago'] Result: '41 years ago'
function TSS_shortcode_creator( $atts ) {
    $atts = shortcode_atts(
    array(
        'from' => 'no From date',
        'after' => ''
    ), $atts, 'time_since' );
    $fromstamp = strtotime($atts['from']);
    return _(human_time_diff( $fromstamp, current_time('timestamp') ));
}
add_shortcode('time_since', 'TSS_shortcode_creator');
