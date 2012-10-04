<?php

class Mock_Rss_Item {
    
    var $title, $description, $permalink;
    
    function Mock_Rss_Item($title, $description, $permalink) {
        $this->title = $title;
        $this->description = $description;
        $this->permalink = $permalink;
    }

    function get_title() {
        return $this->title;
    }
    
    function get_description() {
        return $this->description;
    }
    
    function get_permalink() {
        return $this->permarlink;
    }
}

class Mock_Feed {
    
    function get_item_quantity($count) {
        
    }
    
    function get_items() {
        global $RSS_ITEMS;
        return $RSS_ITEMS;
    }
    
}

function fetch_feed($url) {
    return new Mock_Feed();
}

?>