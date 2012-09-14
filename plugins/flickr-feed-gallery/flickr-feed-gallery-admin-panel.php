<script>
    var FFG_F_ARRAY = new Array;
    var FFG_API_KEY = "27ad98b0c2d695d28ad7045e28e9ed4a";
    FFG_F_ARRAY['PUBLIC'] = ['ui','ts','tm'];
    FFG_F_ARRAY['FRIEND'] = ['ui','ipc','dm'];
    FFG_F_ARRAY['USERFAVS'] = ['ui'];
    FFG_F_ARRAY['GROUPPOOL'] = ['gi'];
    FFG_F_ARRAY['ALL'] = ['ui','gi','ipc','dm','ts','tm'];
    function ffg_hide_row(id) {
        document.getElementById(id).style.display = 'none';
    }

    function ffg_show_row(id) {
        document.getElementById(id).style.display = '';
    }
    function ffg_get_selected_option(id) {
        var sel = document.getElementById(id)
        return sel.options[sel.selectedIndex].value;
    }
    function ffg_on_type_change() {
        for(var i=0;i<FFG_F_ARRAY['ALL'].length;i++) {
            var sel_Type = ffg_get_selected_option('ffg_feed_type');
            var field_Arr = FFG_F_ARRAY[sel_Type];
            var found = false;
            for(var j = 0;j<field_Arr.length;j++) {
                if(FFG_F_ARRAY['ALL'][i]==field_Arr[j]) {
                    ffg_show_row('ffg_'+field_Arr[j]);
                    found = true;break;
                }
            }
            if(!found) ffg_hide_row('ffg_'+FFG_F_ARRAY['ALL'][i]);
        }
    }

    jQuery(document).ready(function() {
        ffg_on_type_change();
        jQuery('#ffg_get_user_id').click(ffg_process_id);
        jQuery('#ffg_get_group_id').click(ffg_process_id);
    });


    function ffg_process_id(event) {
        var method = 'flickr.urls.lookupUser' ;
        var message = 'Enter the URL of your profile or photo pool:' ;
        var message_default='http://flickr.com/photos/your_username/';
        if(event.target.id == 'ffg_get_group_id') {
            method ='flickr.urls.lookupGroup' ;
            message = 'Enter the URL of group pool:' ;
            message_default='http://flickr.com/groups/your_group/';
        }
        var url = prompt(message,message_default);
        if (!url) {return false;}
        url = 'http://api.flickr.com/services/rest/?'+
            'method='+method+
            '&api_key='+FFG_API_KEY+'&'+
            'format=json&'+
            'jsoncallback=?&'+
            'url='+url;
        jQuery.getJSON(url,
        function(result) {
            if (result.stat != "ok") {
                alert("Unable to retrieve id (connection problem with Flickr?). Please try again later.");
                return false;
            }
            if(event.target.id == 'ffg_get_group_id') {
                jQuery('#ffg_group_id').val(result.group.id);
            }else {
                if(jQuery('#ffg_user_id').val()!='') {
                    jQuery('#ffg_user_id').val(jQuery('#ffg_user_id').val()+','+result.user.id);
                }else {
                    jQuery('#ffg_user_id').val(result.user.id);
                }

            }
        }
    );
        event.preventDefault();
    }

</script>

<div class="wrap">
    <h2>Flickr Feed Gallery</h2>

    <form method="post" action="options.php">
        <?php wp_nonce_field('update-options'); ?>
        <p>If you don't know the Flickr user id or group id, you can find it by entering the photostream URL below.
            For example, my photostream URL is <code>http://www.flickr.com/photos/jaysonjc/</code>> and the corresponding user id is <code>12994760@N00</code>.
        Flickr feeds cannot directly work with a URL.</p>

        


        <table class="form-table">



            <tr valign="top">
                <?php
                $ffg_feed_type = get_option('ffg_feed_type');
                ?>
                <th scope="row" id="ffg_ft">Feed Type</th>
                <td>
                    <select name="ffg_feed_type" id="ffg_feed_type" onchange="javscript:ffg_on_type_change();" >
                        <option <?php if($ffg_feed_type == 'PUBLIC') { echo 'selected'; } ?> value="PUBLIC">Public Photos</option>
                        <option <?php if($ffg_feed_type == 'FRIEND') { echo 'selected'; } ?> value="FRIEND">Friend's Photos</option>
                        <option <?php if($ffg_feed_type == 'USERFAVS') { echo 'selected'; } ?> value="USERFAVS">User Favorites</option>
                        <option <?php if($ffg_feed_type == 'GROUPPOOL') { echo 'selected'; } ?> value="GROUPPOOL">Group Pool</option>
                    </select>
                </td>
            </tr>
            <tr valign="top">
                <?php
                $ffg_image_size = get_option('ffg_image_size');
                ?>
                <th scope="row" id="ffg_is">Image Size</th>
                <td>
                    <select name="ffg_image_size" id="ffg_image_size"  >
                        <option <?php if($ffg_image_size == '_m') { echo 'selected'; } ?> value="_m">Small</option>
                        <option <?php if($ffg_image_size == '_s') { echo 'selected'; } ?> value="_s">Square</option>
                        <option <?php if($ffg_image_size == '_t') { echo 'selected'; } ?> value="_t">Thumbnail</option>
                        <option <?php if($ffg_image_size == '') { echo 'selected'; } ?> value="">Medium</option>
                        <option <?php if($ffg_image_size == '_b') { echo 'selected'; } ?> value="_b">Large</option>
                    </select>
                </td>
            </tr>

            <tr valign="top" id="ffg_il">
                <th scope="row">Number of Images</th>
                <td><input type="text" name="ffg_image_limit" value="<?php echo get_option('ffg_image_limit'); ?>" /></td>
            </tr>

            <tr valign="top" id="ffg_ui">
                <th scope="row">User Id(s)(comma separated)</th>
                <td><input type="text" name="ffg_user_id" id="ffg_user_id" value="<?php echo get_option('ffg_user_id'); ?>" />
                    <a href="#" id="ffg_get_user_id">Get User Id from Photostream URL</a>
                </td>
            </tr>
            <tr valign="top" id="ffg_gi">
                <th scope="row">Group Id</th>
                <td><input type="text" name="ffg_group_id" id="ffg_group_id" value="<?php echo get_option('ffg_group_id'); ?>" />
                    <a href="#" id="ffg_get_group_id">Get Group Id from Photostream URL</a>
                </td>
            </tr>
            <?php
            $ffg_images_per_contact = get_option('ffg_images_per_contact');
            ?>
            <tr valign="top" id="ffg_ipc">
                <th scope="row">Images Per Contact</th>
                <td>
                    <select name="ffg_images_per_contact">
                        <option <?php if($ffg_images_per_contact == '0') { echo 'selected'; } ?> value="0">Single</option>
                        <option <?php if($ffg_images_per_contact == '1') { echo 'selected'; } ?> value="1">Multiple</option>
                    </select>
                </td>
            </tr>
            <?php
            $ffg_display_mode = get_option('ffg_display_mode');
            ?>
            <tr valign="top" id="ffg_dm">
                <th scope="row">Display Mode</th>
                <td>
                    <select name="ffg_display_mode">
                        <option <?php if($ffg_display_mode == '0') { echo 'selected'; } ?> value="0">All</option>
                        <option <?php if($ffg_display_mode == '1') { echo 'selected'; } ?> value="1">Friends and Family</option>
                    </select>
                </td>
            </tr>


            <tr valign="top" id="ffg_ts">
                <th scope="row">Tags (comma separated)</th>
                <td><input type="text" name="ffg_tags" value="<?php echo get_option('ffg_tags'); ?>" />
                </td>
            </tr>

            <?php
            $ffg_tag_mode = get_option('ffg_tag_mode');
            ?>

            <tr valign="top" id="ffg_tm">
                <th scope="row">Tag Mode</th>
                <td>
                    <select name="ffg_tag_mode">
                        <option <?php if($ffg_tag_mode == 'any') { echo 'selected'; } ?> value="any">Any</option>
                        <option <?php if($ffg_tag_mode == 'all') { echo 'selected'; } ?> value="all">All</option>
                    </select>
                </td>
            </tr>

        </table>

        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="ffg_feed_type,ffg_image_limit,ffg_user_id,ffg_group_id,ffg_images_per_contact,ffg_display_mode,ffg_tags,ffg_tag_mode,ffg_image_size" />

        <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
        </p>

    </form>
</div>
