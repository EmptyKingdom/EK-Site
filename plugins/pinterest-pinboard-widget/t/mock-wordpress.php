<?php

/**
 * Mock WordPress classes / handlers.
 */
 
class WP_Widget {

    var $id, $name, $options;

    function WP_Widget($id, $name, $options) {
        $this->id = $id;
        $this->name = $name;
        $this->options = $options;
    }

}

function add_action() {

}

function add_filter() {

}

function apply_filters($filter, $data) {

}

function is_wp_error() {
    global $WP_ERROR;
    return $WP_ERROR;
}

function get_file_data() {
    return array('Version' => '1.0.0');
}

// Point to mock feed.php
define(ABSPATH, dirname(__FILE__));
define(WPINC, '');

?>