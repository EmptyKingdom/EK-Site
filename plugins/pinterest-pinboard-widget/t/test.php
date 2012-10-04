<?php

require_once(dirname(__FILE__) .'/simpletest/autorun.php');
require_once(dirname(__FILE__) .'/mock-wordpress.php');
require_once(dirname(__FILE__) .'/../pinterest-pinboard-widget.php');

/**
 * Unit tests for class: Pinterest_Pinboard_Widget
 */
 
class Pinterest_Pinboard_Widget_Tests extends UnitTestCase {
    
    function test_is_secure() {
        $widget = new Pinterest_Pinboard_Widget();
        $this->assertFalse($widget->is_secure());
        $_SERVER['HTTPS'] = 'on';
        $this->assertTrue($widget->is_secure());
        $_SERVER['HTTPS'] = 'off';
        $_SERVER['SERVER_PORT'] = 443;
        $this->assertTrue($widget->is_secure());
    }
    
    function test_get_version() {
        $widget = new Pinterest_Pinboard_Widget();
        $this->assertEqual($widget->get_version(), '1.0.0');
    }
    
    function test_get_footer() {
        $widget = new Pinterest_Pinboard_Widget();
        $this->assertPattern(
            '<!-- Plugin ID: Pinterest-Pinboard-Widget // Version: 1.0.0 // Execution Time: .* \(ms\) -->',
            $footer = $widget->get_footer()
        );
    }
    
    function test_get_pins_failure() {
        global $WP_ERROR;
        $WP_ERROR = true;
        $widget = new Pinterest_Pinboard_Widget();
        $this->assertNull($widget->get_pins('pinterest', 10), 'Expecting null');
    }
    
    function test_get_pins_success() {
        global $WP_ERROR;
        $WP_ERROR = false;        
        global $RSS_ITEMS;
        $RSS_ITEMS = array(
            new Mock_Rss_Item(
                'A title',
                'A description',
                'http://www.codefish.nl/'
            )
        );
    }
    
    /**
     * Test against a bug in version 1.0.1 that caused the parsing to go wrong
     * when there was a quote (") character in the RSS description.
     */
    function test_pins_with_quotes() {
        global $WP_ERROR;
        $WP_ERROR = false;
        global $RSS_ITEMS;
        $RSS_ITEMS = array(
            new Mock_Rss_Item(
                '"Books are a hard-bo',
                html_entity_decode('&lt;p&gt;&lt;a href="/pin/137500594843095531/"&gt;&lt;img src="http://media-cdn.pinterest.com/upload/238690848970130635_0YplKTcQ_b.jpg"&gt;&lt;/a&gt;&lt;/p&gt;&lt;p&gt;"Books are a hard-bound drug with no danger of an overdose. I am the happy victim of books" - Karl Lagerfeld&lt;/p&gt;'),
                'http://pinterest.com/pin/137500594843095531/'
            )
        );
        $widget = new Pinterest_Pinboard_Widget();
        $pins = $widget->get_pins('pinterest', 5);
        $this->assertNotNull($pins);
        $this->assertEqual(sizeof($pins), 1);
        $this->assertEqual($pins[0]['image'], 'http://media-cdn.pinterest.com/upload/238690848970130635_0YplKTcQ_t.jpg');
    }

    function test_widget() {
        $args = array();
        $instance = array(
            username => 'pinterest'
        );
        $widget = new Pinterest_Pinboard_Widget();
        ob_start();
        $widget->widget($args, $instance);
        $contents = ob_get_contents();
        ob_end_clean();
        $this->assertNotNull($contents);
    }
    
}

?>
