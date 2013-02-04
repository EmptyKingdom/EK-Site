<?php
if (!function_exists('prr')){ function prr($str) { echo "<pre>"; print_r($str); echo "</pre>\r\n"; }}        
if (!function_exists('nsx_stripSlashes')){ function nsx_stripSlashes(&$value){$value = stripslashes($value);}}
if (!function_exists('nsx_fixSlashes')){ function nsx_fixSlashes(&$value){ while (strpos($value, '\\\\')!==false) $value = str_replace('\\\\','\\',$value);
   if (strpos($value, "\\'")!==false) $value = str_replace("\\'","'",$value); if (strpos($value, '\\"')!==false) $value = str_replace('\\"','"',$value);
}}
if (!function_exists('CutFromTo')){ function CutFromTo($string, $from, $to){$fstart = stripos($string, $from); $tmp = substr($string,$fstart+strlen($from)); $flen = stripos($tmp, $to);  return substr($tmp,0, $flen);}}
if (!function_exists('nsx_doEncode')){ function nsx_doEncode($string,$key='NSX') { $key = sha1($key); $strLen = strlen($string);$keyLen = strlen($key); $j = 0; $hash = '';
  for ($i = 0; $i < $strLen; $i++) { $ordStr = ord(substr($string,$i,1)); if ($j == $keyLen) $j = 0; $ordKey = ord(substr($key,$j,1)); $j++; $hash .= strrev(base_convert(dechex($ordStr + $ordKey),16,36));} return $hash;
}}
if (!function_exists('nsx_doDecode')){ function nsx_doDecode($string,$key='NSX') { $key = sha1($key); $strLen = strlen($string); $keyLen = strlen($key); $j = 0; $hash = '';
  for ($i = 0; $i < $strLen; $i+=2) { $ordStr = hexdec(base_convert(strrev(substr($string,$i,2)),36,16)); if ($j == $keyLen) $j = 0; $ordKey = ord(substr($key,$j,1)); $j++; $hash .= chr($ordStr - $ordKey);} return $hash;
}}
if (!function_exists('nxs_decodeEntitiesFull')){ function nxs_decodeEntitiesFull($string, $quotes = ENT_COMPAT, $charset = 'utf-8') {
  return html_entity_decode(preg_replace_callback('/&([a-zA-Z][a-zA-Z0-9]+);/', 'nxs_convertEntity', $string), $quotes, $charset); 
}}
if (!function_exists('nxs_convertEntity')){ function nxs_convertEntity($matches, $destroy = true) {
  static $table = array('quot' => '&#34;','amp' => '&#38;','lt' => '&#60;','gt' => '&#62;','OElig' => '&#338;','oelig' => '&#339;','Scaron' => '&#352;','scaron' => '&#353;','Yuml' => '&#376;','circ' => '&#710;','tilde' => '&#732;','ensp' => '&#8194;','emsp' => '&#8195;','thinsp' => '&#8201;','zwnj' => '&#8204;','zwj' => '&#8205;','lrm' => '&#8206;','rlm' => '&#8207;','ndash' => '&#8211;','mdash' => '&#8212;','lsquo' => '&#8216;','rsquo' => '&#8217;','sbquo' => '&#8218;','ldquo' => '&#8220;','rdquo' => '&#8221;','bdquo' => '&#8222;','dagger' => '&#8224;','Dagger' => '&#8225;','permil' => '&#8240;','lsaquo' => '&#8249;','rsaquo' => '&#8250;','euro' => '&#8364;','fnof' => '&#402;','Alpha' => '&#913;','Beta' => '&#914;','Gamma' => '&#915;','Delta' => '&#916;','Epsilon' => '&#917;','Zeta' => '&#918;','Eta' => '&#919;','Theta' => '&#920;','Iota' => '&#921;','Kappa' => '&#922;','Lambda' => '&#923;','Mu' => '&#924;','Nu' => '&#925;','Xi' => '&#926;','Omicron' => '&#927;','Pi' => '&#928;','Rho' => '&#929;','Sigma' => '&#931;','Tau' => '&#932;','Upsilon' => '&#933;','Phi' => '&#934;','Chi' => '&#935;','Psi' => '&#936;','Omega' => '&#937;','alpha' => '&#945;','beta' => '&#946;','gamma' => '&#947;','delta' => '&#948;','epsilon' => '&#949;','zeta' => '&#950;','eta' => '&#951;','theta' => '&#952;','iota' => '&#953;','kappa' => '&#954;','lambda' => '&#955;','mu' => '&#956;','nu' => '&#957;','xi' => '&#958;','omicron' => '&#959;','pi' => '&#960;','rho' => '&#961;','sigmaf' => '&#962;','sigma' => '&#963;','tau' => '&#964;','upsilon' => '&#965;','phi' => '&#966;','chi' => '&#967;','psi' => '&#968;','omega' => '&#969;','thetasym' => '&#977;','upsih' => '&#978;','piv' => '&#982;','bull' => '&#8226;','hellip' => '&#8230;','prime' => '&#8242;','Prime' => '&#8243;','oline' => '&#8254;','frasl' => '&#8260;','weierp' => '&#8472;','image' => '&#8465;','real' => '&#8476;','trade' => '&#8482;','alefsym' => '&#8501;','larr' => '&#8592;','uarr' => '&#8593;','rarr' => '&#8594;','darr' => '&#8595;','harr' => '&#8596;','crarr' => '&#8629;','lArr' => '&#8656;','uArr' => '&#8657;','rArr' => '&#8658;','dArr' => '&#8659;','hArr' => '&#8660;','forall' => '&#8704;','part' => '&#8706;','exist' => '&#8707;','empty' => '&#8709;','nabla' => '&#8711;','isin' => '&#8712;','notin' => '&#8713;','ni' => '&#8715;','prod' => '&#8719;','sum' => '&#8721;','minus' => '&#8722;','lowast' => '&#8727;','radic' => '&#8730;','prop' => '&#8733;','infin' => '&#8734;','ang' => '&#8736;','and' => '&#8743;','or' => '&#8744;','cap' => '&#8745;','cup' => '&#8746;','int' => '&#8747;','there4' => '&#8756;','sim' => '&#8764;','cong' => '&#8773;','asymp' => '&#8776;','ne' => '&#8800;','equiv' => '&#8801;','le' => '&#8804;','ge' => '&#8805;','sub' => '&#8834;','sup' => '&#8835;','nsub' => '&#8836;','sube' => '&#8838;','supe' => '&#8839;','oplus' => '&#8853;','otimes' => '&#8855;','perp' => '&#8869;','sdot' => '&#8901;','lceil' => '&#8968;','rceil' => '&#8969;','lfloor' => '&#8970;','rfloor' => '&#8971;','lang' => '&#9001;','rang' => '&#9002;','loz' => '&#9674;','spades' => '&#9824;','clubs' => '&#9827;','hearts' => '&#9829;','diams' => '&#9830;','nbsp' => '&#160;','iexcl' => '&#161;','cent' => '&#162;','pound' => '&#163;','curren' => '&#164;','yen' => '&#165;','brvbar' => '&#166;','sect' => '&#167;','uml' => '&#168;','copy' => '&#169;','ordf' => '&#170;','laquo' => '&#171;','not' => '&#172;','shy' => '&#173;','reg' => '&#174;','macr' => '&#175;','deg' => '&#176;','plusmn' => '&#177;','sup2' => '&#178;','sup3' => '&#179;','acute' => '&#180;','micro' => '&#181;','para' => '&#182;','middot' => '&#183;','cedil' => '&#184;','sup1' => '&#185;','ordm' => '&#186;','raquo' => '&#187;','frac14' => '&#188;','frac12' => '&#189;','frac34' => '&#190;','iquest' => '&#191;','Agrave' => '&#192;','Aacute' => '&#193;','Acirc' => '&#194;','Atilde' => '&#195;','Auml' => '&#196;','Aring' => '&#197;','AElig' => '&#198;','Ccedil' => '&#199;','Egrave' => '&#200;','Eacute' => '&#201;','Ecirc' => '&#202;','Euml' => '&#203;','Igrave' => '&#204;','Iacute' => '&#205;','Icirc' => '&#206;','Iuml' => '&#207;','ETH' => '&#208;','Ntilde' => '&#209;','Ograve' => '&#210;','Oacute' => '&#211;','Ocirc' => '&#212;','Otilde' => '&#213;','Ouml' => '&#214;','times' => '&#215;','Oslash' => '&#216;','Ugrave' => '&#217;','Uacute' => '&#218;','Ucirc' => '&#219;','Uuml' => '&#220;','Yacute' => '&#221;','THORN' => '&#222;','szlig' => '&#223;','agrave' => '&#224;','aacute' => '&#225;','acirc' => '&#226;','atilde' => '&#227;','auml' => '&#228;','aring' => '&#229;','aelig' => '&#230;','ccedil' => '&#231;','egrave' => '&#232;','eacute' => '&#233;','ecirc' => '&#234;','euml' => '&#235;','igrave' => '&#236;','iacute' => '&#237;','icirc' => '&#238;','iuml' => '&#239;','eth' => '&#240;','ntilde' => '&#241;','ograve' => '&#242;','oacute' => '&#243;','ocirc' => '&#244;','otilde' => '&#245;','ouml' => '&#246;','divide' => '&#247;','oslash' => '&#248;','ugrave' => '&#249;','uacute' => '&#250;','ucirc' => '&#251;','uuml' => '&#252;','yacute' => '&#253;','thorn' => '&#254;','yuml' => '&#255;');
  if (isset($table[$matches[1]])) return $table[$matches[1]];
  // else 
  return $destroy ? '' : $matches[0];
}}
if (!function_exists('nsFindImgsInPost')){function nsFindImgsInPost($post, $advImgFnd=false) { global $ShownAds; if (isset($ShownAds)) $ShownAdsL = $ShownAds;  
  if ($advImgFnd) $postCnt = apply_filters('the_content', $post->post_content); else $postCnt = $post->post_content;   $postImgs = array();
  //$output = preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $postCnt, $matches ); if ($output === false){return false;} 
  //$postCnt = str_replace("'",'"',$postCnt); $output = preg_match_all( '/src="([^"]*)"/', $postCnt, $matches ); if ($output === false){return false;}
  $postCnt = str_replace("'",'"',$postCnt); $output = preg_match_all( '/< *img[^>]*src *= *["\']?([^"\']*)/i', $postCnt, $matches ); // prr($matches);  
  if ($output === false || $output == 0){ $vids = nsFindVidsInPost($post); if (count($vids)>0)  $postImgs[] = 'http://img.youtube.com/vi/'.$vids[0].'/0.jpg';  else return false;} 
    else { foreach ($matches[1] as $match) { if (!preg_match('/^https?:\/\//', $match ) ) $match = site_url( '/' ) . ltrim( $match, '/' ); $postImgs[] = $match;} if (isset($ShownAds)) $ShownAds = $ShownAdsL; }  
  return $postImgs;
}}


if (!function_exists('nsFindAudioInPost')){function nsFindAudioInPost($post, $raw=true) {  //## Breaks ob_start() [ref.outcontrol]: Cannot use output buffering in output buffering display handlers - Investigate
  global $ShownAds; if (isset($ShownAds)) $ShownAdsL = $ShownAds; $postVids = array();
  if (is_object($post)) { if ($raw) $postCnt = $post->post_content; else $postCnt = apply_filters('the_content', $post->post_content); } else $postCnt = $post;
  $regex_pattern = "((https?|ftp|gopher|telnet|file|notes|ms-help):((//)|(\\\\))+[\w\d:#@%/;$()~_?\+-=\\\.&]*\.(mp3|aac|m4a))";
  $output = preg_match_all( $regex_pattern, $postCnt, $matches );  if ($output === false){return false;}    
  foreach ($matches[0] as $match) { $postAu[] = $match; 
     
  } $postAu = array_unique($postAu); if (isset($ShownAds)) $ShownAds = $ShownAdsL; return $postAu;
}}
if (!function_exists('nsFindVidsInPost')){function nsFindVidsInPost($post, $raw=true) {  //## Breaks ob_start() [ref.outcontrol]: Cannot use output buffering in output buffering display handlers - Investigate
  global $ShownAds; if (isset($ShownAds)) $ShownAdsL = $ShownAds; $postVids = array();
  if (is_object($post)) { if ($raw) $postCnt = $post->post_content; else $postCnt = apply_filters('the_content', $post->post_content); } else $postCnt = $post;
  $output = preg_match_all( '@((https?://)?([-\w]+\.[-\w\.]+)+\w(:\d+)?(/([-\w/_\.]*(\?\S+)?)?(#[a-z_.-][a-z0-9+\$_.-]*)?)*)@', $postCnt, $matches );  if ($output === false){return false;} 
  foreach ($matches[0] as $match) {  
     $output2 = preg_match_all( '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"<>&?/ ]{11})%i', $match, $matches2 );  if ($output2 === false){return false;} 
     foreach ($matches2[1] as $match2) {  $match2 = trim($match2); if (strlen($match2)==11) $postVids[] = $match2;} 
     $output3 = preg_match_all( '/^http:\/\/(www\.)?vimeo\.com\/(clip\:)?(\d+).*$/', $match, $matches3 );  if ($output3 === false){return false;} 
     foreach ($matches3[3] as $match3) {  $match3 = trim($match3); if (strlen($match3)==8) $postVids[] = $match3;} 
  } $postVids = array_unique($postVids); if (isset($ShownAds)) $ShownAds = $ShownAdsL; return $postVids;
}}
if (!function_exists('nsTrnc')){ function nsTrnc($string, $limit, $break=" ", $pad=" ...") { if(strlen($string) <= $limit) return $string; $string = substr($string, 0, $limit-strlen($pad)); 
  $brLoc = strripos($string, $break);  if ($brLoc===false) return $string.$pad; else return substr($string, 0, $brLoc).$pad; 
}}
if (!function_exists('nsSubStrEl')){ function nsSubStrEl($string, $length, $end='...'){ if (strlen($string) > $length){ $length -= strlen($end); $string  = substr($string, 0, $length); $string .= $end; } return $string;}}

if (!function_exists('nxs_snapCleanHTML')){ function nxs_snapCleanHTML($html) { 
    $html = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $html); $html = preg_replace('/<!--(.*)-->/Uis', "", $html); return $html;
}}
if (!function_exists("nxs_getNXSHeaders")) {  function nxs_getNXSHeaders($ref='', $post=false){ $hdrsArr = array(); 
 $hdrsArr['Connection']='keep-alive'; $hdrsArr['Referer']=$ref;
 $hdrsArr['User-Agent']='Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.22 Safari/537.11';
 if($post) $hdrsArr['Content-Type']='application/x-www-form-urlencoded'; 
 $hdrsArr['Accept']='application/json, text/javascript, */*; q=0.01';  
 $hdrsArr['Accept-Encoding']='gzip,deflate,sdch'; $hdrsArr['Accept-Language']='en-US,en;q=0.8'; $hdrsArr['Accept-Charset']='ISO-8859-1,utf-8;q=0.7,*;q=0.3'; return $hdrsArr;
}}
if (!function_exists('nxs_chckRmImage')){function nxs_chckRmImage($url, $chType='head'){ if( ini_get('allow_url_fopen')=='1' && @getimagesize($url)!==false) return true;
  $hdrsArr = nxs_getNXSHeaders(); $nxsWPRemWhat = 'wp_remote_'.$chType; $rsp  = $nxsWPRemWhat($url, array('headers' => $hdrsArr));  
  if(is_wp_error($rsp)) { nxs_addToLog('IMAGE', 'E', '-=ERROR=- '.print_r($rsp, true), ''); return false; }
  if (is_array($rsp) && ($rsp['response']['code']=='200' || ( $rsp['response']['code']=='403' &&  $rsp['headers']['server']=='cloudflare-nginx') )) return true; 
    else { if ($chType=='head') { return  nxs_chckRmImage($url, 'get'); } else { nxs_addToLog('IMAGE', 'E', '-=ERROR=- '.print_r($rsp, true), $url); return false; }
    } 
}}
if (!function_exists('nxs_getPostImage')){ function nxs_getPostImage($postID, $size='large', $def='') { $imgURL = '';  global $plgn_NS_SNAutoPoster;  if (!isset($plgn_NS_SNAutoPoster)) return; $options = $plgn_NS_SNAutoPoster->nxs_options;
  $imgURL = "https://www.google.com/images/srpr/logo3w.png"; $res = nxs_chckRmImage($imgURL); $imgURL = ''; if (!$res) $options['imgNoCheck'] = '1';
  if (isset($options['featImgLoc']) && $options['featImgLoc']!=='') { $imgURL = trim(get_post_meta($postID, $options['featImgLocPrefix'], true)).trim(get_post_meta($postID, $options['featImgLoc'], true)); 
    if ($imgURL!='' && stripos($imgURL, 'http')===false) $imgURL =  home_url().$imgURL;
  } 
  if ($imgURL!='' && $options['imgNoCheck']!='1' && nxs_chckRmImage($imgURL)==false) $imgURL = '';  if ($imgURL!='') return $imgURL;
  if ($imgURL=='') { if (function_exists("get_post_thumbnail_id") ){ $imgURL = wp_get_attachment_image_src(get_post_thumbnail_id($postID), $size); $imgURL = $imgURL[0]; } } 
  if ($imgURL!='' && $options['imgNoCheck']!='1' && nxs_chckRmImage($imgURL)==false) $imgURL = ''; if ($imgURL!='') return $imgURL;  
  if ($imgURL=='') { $attachments = get_posts(array('post_type' => 'attachment', 'posts_per_page' => -1, 'post_parent' => $postID)); 
      if (is_array($attachments) && is_object($attachments[0])) $imgURL = wp_get_attachment_image_src($attachments[0]->ID, $size); $imgURL = $imgURL[0];      
  }
  if ($imgURL!='' && $options['imgNoCheck']!='1' && nxs_chckRmImage($imgURL)==false) $imgURL = ''; if ($imgURL!='') return $imgURL;  
  if ($imgURL=='') {$post = get_post($postID); $imgsFromPost = nsFindImgsInPost($post); if (is_array($imgsFromPost) && count($imgsFromPost)>0) $imgURL = $imgsFromPost[0]; } //echo "##".count($imgsFromPost); prr($imgsFromPost);
  if ($imgURL!='' && $options['imgNoCheck']!='1' && nxs_chckRmImage($imgURL)==false) $imgURL = ''; if ($imgURL!='') return $imgURL;
  if ($imgURL=='' && $def=='') $imgURL = $options['ogImgDef']; 
  if ($imgURL=='' && $def!='') $imgURL = $def; 
  
  return $imgURL;
}}
if (!function_exists('nxs_makeURLParams')){ function nxs_makeURLParams($params) {  global $plgn_NS_SNAutoPoster;  if (!isset($plgn_NS_SNAutoPoster)) return; $options = $plgn_NS_SNAutoPoster->nxs_options;
    if (!isset($options['addURLParams']) || $options['addURLParams']=='') return false; else $templ = $options['addURLParams'];
    if (preg_match('%NTNAME%', $templ)) $templ = str_ireplace("%NTNAME%", urlencode($params['NTNAME']), $templ);
    if (preg_match('%NTCODE%', $templ)) $templ = str_ireplace("%NTCODE%", urlencode($params['NTCODE']), $templ);
    if (preg_match('%ACCNAME%', $templ)) $templ = str_ireplace("%ACCNAME%", urlencode($params['ACCNAME']), $templ);
    if (preg_match('%POSTID%', $templ)) $templ = str_ireplace("%POSTID%", urlencode($params['POSTID']), $templ);
    if (preg_match('%POSTTITLE%', $templ)) { $post = $params['POSTID']; if (is_object($post)) {$postName = $post->post_title; $templ = str_ireplace("%POSTTITLE%", urlencode($postName), $templ);}}
    if (preg_match('%SITENAME%', $templ)) { $siteTitle = urlencode(htmlspecialchars_decode(get_bloginfo('name'), ENT_QUOTES)); $templ = str_ireplace("%SITENAME%", $siteTitle, $templ); }
    return $templ;
}}

//## CSS && JS
if (!function_exists("jsPostToSNAP")) { function jsPostToSNAP() {  global $nxs_snapAvNts, $nxs_plurl; ?>
    <script type="text/javascript" >
    jQuery(document).ready(function($) {          
    <?php       
      foreach ($nxs_snapAvNts as $avNt) {?>
        $('input#rePostTo<?php echo $avNt['code']; ?>_button').click(function() { var data = { action: 'rePostTo<?php echo $avNt['code']; ?>', id: $('input#post_ID').val(), nid:$(this).attr('alt'), _wpnonce: $('input#rePostTo<?php echo $avNt['code']; ?>_wpnonce').val()}; callAjSNAP(data, '<?php echo $avNt['name']; ?>'); });
    <?php } 
     foreach ($nxs_snapAvNts as $avNt) {?>
        $('input#riTo<?php echo $avNt['code']; ?>_button').click(function() { var data = { action: 'rePostTo<?php echo $avNt['code']; ?>', id: $('input#post_ID').val(), ri:1, nid:$(this).attr('alt'), _wpnonce: $('input#rePostTo<?php echo $avNt['code']; ?>_wpnonce').val()}; callAjSNAP(data, '<?php echo $avNt['name']; ?>'); });
    <?php } ?>
       function callAjSNAP(data, label) { 
            var style = "position: fixed; display: none; z-index: 1000; top: 50%; left: 50%; background-color: #E8E8E8; border: 1px solid #555; padding: 15px; width: 350px; min-height: 80px; margin-left: -175px; margin-top: -40px; text-align: center; vertical-align: middle;";
            $('body').append("<div id='test_results' style='" + style + "'></div>");
            $('#test_results').html("<p>Sending update to "+label+"</p>" + "<p><img src='<?php echo $nxs_plurl; ?>img/ajax-loader-med.gif' /></p>");
            $('#test_results').show();            
            jQuery.post(ajaxurl, data, function(response) { if (response=='') response = 'Message Posted';
                $('#test_results').html('<p> ' + response + '</p>' +'<input type="button" class="button" name="results_ok_button" id="results_ok_button" value="OK" />');
                $('#results_ok_button').click(remove_results);
            });            
        }        
        function remove_results() { jQuery("#results_ok_button").unbind("click");jQuery("#test_results").remove();
            if (typeof document.body.style.maxHeight == "undefined") { jQuery("body","html").css({height: "auto", width: "auto"}); jQuery("html").css("overflow","");}
            document.onkeydown = "";document.onkeyup = "";  return false;
        }
    });
    </script>    
    <?php
  }
}
if (!function_exists("nxs_jsPostToSNAP2")){ function nxs_jsPostToSNAP2() {  global $nxs_snapAvNts, $nxs_snapThisPageUrl, $plgn_NS_SNAutoPoster; 
   if (!isset($plgn_NS_SNAutoPoster)) return; $options = $plgn_NS_SNAutoPoster->nxs_options; 
?>
            
<script type="text/javascript">   

  jQuery(function(){
    jQuery("form input:checkbox[name='post_category[]']").click ( function(){  var nxs_isLocked = jQuery('#nxsLockIt').val(); if (nxs_isLocked=='1') return;
       var thVal = jQuery(this).val();           
       jQuery(".nxs_SC").each(function(index) { var cats = jQuery(this).val();  var catsA = cats.split(','); uqID = jQuery(this).attr('id'); uqID = uqID.replace("nxs_SC_", "do", "gi");
         if (jQuery.inArray(thVal, catsA)>-1)  jQuery('#'+uqID).attr('checked','checked')
         //alert( uqID + "|" + catsA +  "|" + thVal);  
       });         
       var arr = [<?php $xarr = maybe_unserialize($options['exclCats']); if (is_array($xarr)) echo "'".implode("','", $xarr)."'"; ?>];
       if ( jQuery.inArray(thVal, arr)>-1) jQuery('.nxsGrpDoChb').removeAttr('checked'); else jQuery(".nxsGrpDoChb[title='def']").attr('checked','checked');
    });
  });
   
  function seFBA(pgID,fbAppID,fbAppSec){ var data = { pgID: pgID, action: 'nsAuthFBSv', _wpnonce: jQuery('input#nsFB_wpnonce').val()}; 
    jQuery.post(ajaxurl, data, function(response) {  
      window.location = "https://www.facebook.com/dialog/oauth?client_id="+fbAppID+"&client_secret="+fbAppSec+"&scope=publish_stream,offline_access,read_stream,manage_pages&redirect_uri=<?php echo $nxs_snapThisPageUrl;?>";
    });                       
  }
  function doLic(){ var lk = jQuery('#eLic').val();  jQuery.post(ajaxurl,{lk:lk, action: 'nxsDoLic', id: 0, _wpnonce: jQuery('input#doLic_wpnonce').val(), ajax: 'true'}, function(j){ 
      if (jQuery.trim(j)=='OK') window.location = "<?php echo $nxs_snapThisPageUrl; ?>"; else alert('<?php _e('Wrong key, please contact support', 'nxs_snap'); ?>');
    }, "html")
  }
  function testPost(nt, nid){ jQuery(".blnkg").hide(); <?php foreach ($nxs_snapAvNts as $avNt) {?>
    if (nt=='<?php echo $avNt['code']; ?>') { 
       var data = { action: 'rePostTo<?php echo $avNt['code']; ?>', id: 0, nid: nid, _wpnonce: jQuery('input#rePostTo<?php echo $avNt['code']; ?>_wpnonce').val()}; callAjSNAP(data, '<?php echo $avNt['name']; ?>'); 
    }<?php } ?>
  }
  
  jQuery(document).ready(function() {
    jQuery('#nxsAPIUpd').dblclick(function() { doLic(); });
    //When page loads...
    jQuery(".nsx_tab_content").hide(); //Hide all content
    jQuery("ul.nsx_tabs li:first").addClass("active").show(); //Activate first tab
    jQuery(".nsx_tab_content:first").show(); //Show first tab content

    //On Click Event
    jQuery("ul.nsx_tabs li").click(function() {
      jQuery("ul.nsx_tabs li").removeClass("active"); //Remove any "active" class
      jQuery(this).addClass("active"); //Add "active" class to selected tab
      jQuery(".nsx_tab_content").hide(); //Hide all tab content
    
      var activeTab = jQuery(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
      jQuery(activeTab).fadeIn(); //Fade in the active ID content
      return false;
    });
  });
</script>

  <link href='http://fonts.googleapis.com/css?family=News+Cycle' rel='stylesheet' type='text/css'>            
<style type="text/css">
.NXSButton { background-color:#89c403;
    background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #89c403), color-stop(1, #77a809) );
    background:-moz-linear-gradient( center top, #89c403 5%, #77a809 100% );
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#89c403', endColorstr='#77a809');    
    -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px; border:1px solid #74b807; display:inline-block; color:#ffffff;
    font-family:Trebuchet MS; font-size:12px; font-weight:bold; padding:4px 5px;  text-decoration:none;  text-shadow:1px 1px 0px #528009;
}.NXSButton:hover {color:#ffffff; background-color:#77a809;
    background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #77a809), color-stop(1, #89c403) );
    background:-moz-linear-gradient( center top, #77a809 5%, #89c403 100% );
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#77a809', endColorstr='#89c403');    
}.NXSButton:active {color:#ffffff; position:relative; top:1px;}.NXSButton:focus {color:#ffffff; position:relative; top:1px;} .nsBigText{font-size: 14px; color: #585858; font-weight: bold; display: inline;}
.nxspButton:hover { background-color: #1E1E1E;}
.nxspButton { background-color: #2B91AF; color: #FFFFFF; cursor: pointer; display: inline-block; text-align: center; text-decoration: none; border-radius: 6px 6px 6px 6px; box-shadow: none; font: bold 131% sans-serif; padding: 0 6px 2px; position: absolute; right: -7px; top: -7px;}
#nxs_spPopup, #showLicForm{ min-height: 250px; background-color: #FFFFFF; border-radius: 5px 5px 5px 5px;  box-shadow: 0 0 3px 2px #999999; color: #111111; display: none;  min-width: 850px; padding: 25px;}
#nxs_ntType {width: 150px;}
#nsx_addNT {width: 600px;}
.nxsInfoMsg{  margin: 1px auto; padding: 3px 10px 3px 5px; border: 1px solid #ffea90;  background-color: #fdfae4; display: inline; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; }
.blnkg{text-decoration:blink; font-size: 17px; color: #0CB107; font-weight: bold; display: inline;}

div.popShAtt { display: none; position: absolute; width: 600px; padding: 10px; background: #eeeeee; color: #000000; border: 1px solid #1a1a1a; font-size: 90%; }
.underdash {border-bottom: 1px #21759B dashed; text-decoration:none;}
.underdash a:hover {border-bottom: 1px #21759B dashed}

ul.nsx_tabs {margin: 0;padding: 0;float: left;list-style: none;height: 32px;border-bottom: 1px solid #999;border-left: 1px solid #999;width: 100%;}
ul.nsx_tabs li {float: left;margin: 0;padding: 0;height: 31px;line-height: 31px;border: 1px solid #999;border-left: none;margin-bottom: -1px;overflow: hidden;position: relative;background: #e0e0e0;}
ul.nsx_tabs li a {text-decoration: none;color: #000; display: block; font-size: 1.2em; padding: 0 20px; border: 1px solid #fff; outline: none;}
ul.nsx_tabs li a:hover { background: #ccc;}
html ul.nsx_tabs li.active, html ul.nsx_tabs li.active a:hover  { background: #fff; border-bottom: 1px solid #fff; }
.nsx_tab_container {border: 1px solid #999; border-top: none; overflow: hidden; clear: both; float: left; width: 100%; background: #fff;}
.nsx_tab_content {padding: 10px;}

.nsx_iconedTitle {font-size: 17px; font-weight: bold; margin-bottom: 15px; padding-left: 20px; background-repeat: no-repeat; }
.subDiv{margin-left: 15px;}
.nxs_hili {color:#008000;}
.clNewNTSets{width: 800px;}

.nxs_icon16 { font-size: 14px; line-height: 18px;
    background-position: 3px 50% !important;
    background-repeat: no-repeat !important;
    display: inline-block;
    padding: 1px 0 1px 23px !important;
}

.nxs_box{border-color: #DFDFDF; border-radius: 3px 3px 3px 3px; box-shadow: 0 1px 0 #FFFFFF inset; border-style: solid; border-width: 1px; line-height: 1; margin-bottom: 10px; padding: 0; max-width: 1080px;}
.nxs_box_header{border-bottom-color: #DFDFDF; box-shadow: 0 1px 0 #FFFFFF; text-shadow: 0 1px 0 #FFFFFF;font-size: 15px;font-weight: normal;line-height: 1;margin: 0;padding: 6px;
background:#f1f1f1;background-image:-webkit-gradient(linear,left bottom,left top,from(#ececec),to(#f9f9f9));background-image:-webkit-linear-gradient(bottom,#ececec,#f9f9f9);background-image:-moz-linear-gradient(bottom,#ececec,#f9f9f9);background-image:-o-linear-gradient(bottom,#ececec,#f9f9f9);background-image:linear-gradient(to top,#ececec,#f9f9f9)
-moz-user-select: none;border-bottom-style: solid;border-bottom-width: 1px;}
.nxs_box_inside{line-height: 1.4em; padding: 10px;}
.nxs_box_inside input{ padding: 5px; border: 1px solid #ACACAC;}
.nxs_box_inside .insOneDiv, #nsx_addNT .insOneDiv{max-width: 1020px; background-color: #f8f9f9; background-repeat: no-repeat; margin: 10px; border: 1px solid #808080; padding: 10px; display:none;}


</style>
<?php }}

if (!function_exists('nxs_doShowHint')){ function nxs_doShowHint($t){ ?>
<div id="<?php echo $t; ?>Hint" class="nxs_FRMTHint" style="font-size: 11px; margin: 2px; margin-top: 0px; padding:7px; border: 1px solid #C0C0C0; width: 49%; background: #fff; display: none;"><span class="nxs_hili">%SITENAME%</span> - <?php _e('Inserts the Your Blog/Site Name', 'nxs_snap'); ?>, <span class="nxs_hili">%TITLE%</span> - <?php _e('Inserts the Title of your post', 'nxs_snap'); ?>, <span class="nxs_hili">%URL%</span> - <?php _e('Inserts the URL of your post', 'nxs_snap'); ?>, <span class="nxs_hili">%SURL%</span> - <?php _e('Inserts the <b>Shortened URL</b> of your post', 'nxs_snap'); ?>, <span class="nxs_hili">%IMG%</span> - <?php _e('Inserts the featured image', 'nxs_snap'); ?>, <span class="nxs_hili">%TEXT%</span> - <?php _e('Inserts the excerpt of your post', 'nxs_snap'); ?>, <span class="nxs_hili">%RAWTEXT%</span> - <?php _e('Inserts the body(text) as typed', 'nxs_snap'); ?>, <span class="nxs_hili">%FULLTEXT%</span> - <?php _e('Inserts the processed body(text) of your post', 'nxs_snap'); ?>, <span class="nxs_hili">%AUTHORNAME%</span> - <?php _e('Inserts the author\'s name', 'nxs_snap'); ?>.</div>
<?php }}

if (!function_exists('nxs_doSMAS')){ function nxs_doSMAS($nType, $typeii) { ?><div id="do<?php echo $typeii; ?>Div" class="clNewNTSets" style="margin-left: 10px; display:none; "><div style="font-size: 15px; text-align: center;"><br/><br/>
<?php printf( __( 'You already have %s configured.  This plugin supports only one %s account. <br/><br/> Please consider getting <a target="_blank" href="http://www.nextscripts.com/social-networks-auto-poster-for-wp-multiple-accounts">Multiple Accounts Edition</a> if you would like to add another %s account for auto-posting.', 'nxs_snap' ), $nType, $nType, $nType );  ?>
</div></div><?php 
}}

if (!function_exists('nxs_snapCleanup')){ function nxs_snapCleanup($options){   global $nxs_snapAvNts; 
    foreach ($nxs_snapAvNts as $avNt) { if (!isset($options[$avNt['lcode']]) || count($options[$avNt['lcode']])>1) { $copt = ''; $t = '';
      if (isset($options[$avNt['lcode']]) && is_array($options[$avNt['lcode']])) $copt = array_values( $options[$avNt['lcode']] );  
      $t = (isset($copt[0]) && is_array($copt[0]) && count($copt[0]>2))?$copt[0]:''; $options[$avNt['lcode']] = array(); if ($t!='') $options[$avNt['lcode']][] = $t;
    }}
    return $options;
}}

if (!function_exists('nxs_html_to_utf8')){ function nxs_html_to_utf8 ($data){return preg_replace("/\\&\\#([0-9]{3,10})\\;/e", 'nxs__html_to_utf8("\\1")', $data); }}
if (!function_exists('nxs__html_to_utf8')){ function nxs__html_to_utf8 ($data){ if ($data > 127){ $i = 5; while (($i--) > 0){
  if ($data != ($a = $data % ($p = pow(64, $i)))){ 
    $ret = chr(base_convert(str_pad(str_repeat(1, $i + 1), 8, "0"), 2, 10) + (($data - $a) / $p)); for ($i; $i > 0; $i--) $ret .= chr(128 + ((($data % pow(64, $i)) - ($data % ($p = pow(64, $i - 1)))) / $p)); break; }
  }} else $ret = "&#$data;";
  return $ret;
}}
if (!function_exists("nxs_chArrVar")) { function nxs_chArrVar($arr, $varN, $varV){ return (isset($arr) && is_array($arr) && isset($arr[$varN]) && $arr[$varN]==$varV); }}
    
    
if (!function_exists("nxs_metaMarkAsPosted")) { function nxs_metaMarkAsPosted($postID, $nt, $did, $args=''){ $mpo =  get_post_meta($postID, 'snap'.$nt, true); $mpo =  maybe_unserialize($mpo); 
  if (!is_array($mpo)) $mpo = array(); if (!is_array($mpo[$did])) $mpo[$did] = array();
  if ($args=='' || $args['isPosted']==1) $mpo[$did]['isPosted'] = '1';  
  if (is_array($args) && isset($args['isPrePosted']) && $args['isPrePosted']==1) $mpo[$did]['isPrePosted'] = '1';  
  if (is_array($args) && isset($args['pgID'])) $mpo[$did]['pgID'] = $args['pgID'];  
  if (is_array($args) && isset($args['pDate'])) $mpo[$did]['pDate'] = $args['pDate'];  
  /*$mpo = mysql_real_escape_string(serialize($mpo)); */ delete_post_meta($postID, 'snap'.$nt); add_post_meta($postID, 'snap'.$nt, $mpo);
}}
if (!function_exists('nxs_addToLog')){ function nxs_addToLog ($nt, $type, $msg, $extInfo=''){ global $nxs_tpWMPU; if($nxs_tpWMPU=='S') switch_to_blog(1);  $nxsDBLog = get_option('NS_SNAutoPosterLog'); $nxsDBLog = maybe_unserialize($nxsDBLog); 
  $logItem = array('date'=>date('Y-m-d H:i:s'), 'msg'=>$msg, 'extInfo'=>$extInfo, 'type'=>$type, 'nt'=>$nt); if(!is_array($nxsDBLog)) $nxsDBLog = array();
  $nxsDBLog[] = $logItem; $nxsDBLog = array_slice($nxsDBLog, -150);  update_option('NS_SNAutoPosterLog', serialize($nxsDBLog)); if($nxs_tpWMPU=='S') restore_current_blog();
}}

if (!function_exists('nxsMergeArraysOV')){function nxsMergeArraysOV($Arr1, $Arr2){
  foreach($Arr2 as $key => $value) { if(array_key_exists($key, $Arr1) && is_array($value)) $Arr1[$key] = nxsMergeArraysOV($Arr1[$key], $Arr2[$key]); else $Arr1[$key] = $value;} return $Arr1;
}}

if (!function_exists('nxs_MergeCookieArr')){function nxs_MergeCookieArr($ArrO, $ArrN){ $namesArr = array(); foreach($ArrO as $key => $value) { if (is_object($value)) $namesArr[$key] = $value->name; }             
  foreach($ArrN as $key => $value) { if (is_object($value) && $value->value!='deleted') { $isEx = array_search($value->name, $namesArr); if ($isEx===false) $ArrO[] = $value; else $ArrO[$isEx] = $value;}} return $ArrO;
}}

if (!function_exists('nxs_addPostingDelaySel')){function nxs_addPostingDelaySel($nt, $ii, $hrs=0, $min=0){  
  if (function_exists('nxs_doSMAS4')) return nxs_doSMAS4($nt, $ii, $hrs, $min); else return '<br/>';
}}

if (!function_exists("nxs_doQTrans")) { function nxs_doQTrans($txt, $lng=''){
    if (!function_exists(qtrans_split) || strpos($txt, '<!--:')===false ) return $txt; else {
        $tta = qtrans_split($txt); if ($lng!='') return $tta[$lng]; else return reset($tta);
    }
}}

if (!function_exists('nxs_addQTranslSel')){function nxs_addQTranslSel($nt, $ii, $selLng){  
  if (function_exists('nxs_doSMAS5')) return nxs_doSMAS5($nt, $ii, $selLng); else return '<br/>';  
}}

if (!function_exists("nxs_hideTip_ajax")) { function nxs_hideTip_ajax() {  check_ajax_referer('nxsSsPageWPN');   
   global $plgn_NS_SNAutoPoster, $nxs_plurl;  if (!isset($plgn_NS_SNAutoPoster)) return; $options = $plgn_NS_SNAutoPoster->nxs_options; 
   $options['hideTopTip'] = '1';    update_option($plgn_NS_SNAutoPoster->dbOptionsName, $options);
}}

if (!function_exists("nxs_mkShortURL")) { function nxs_mkShortURL($url, $postID=''){ $rurl = '';  global $plgn_NS_SNAutoPoster;  if (!isset($plgn_NS_SNAutoPoster)) return; $options = $plgn_NS_SNAutoPoster->nxs_options;
    if ($options['nxsURLShrtnr']=='B' && trim($options['bitlyUname']!='') && trim($options['bitlyAPIKey']!='')) {      
      $response  = wp_remote_get('http://api-ssl.bitly.com/v3/shorten?login='.$options['bitlyUname'].'&apiKey='.$options['bitlyAPIKey'].'&longUrl='.urlencode($url)); 
      if (is_wp_error($response)) {  nxs_addToLog('bit.ly', 'E', '-=ERROR=- '.print_r($response, true), ''); return false; }
      $rtr = json_decode($response['body'],true);
      if ($rtr['status_code']=='200') $rurl = $rtr['data']['url'];
    } //echo "###".$rurl;
    if ($options['nxsURLShrtnr']=='W' && function_exists('wp_get_shortlink')) { global $post; $post = get_post($postID);  $rurl = wp_get_shortlink($postID, 'post'); }
    if ($rurl=='') { $response  = wp_remote_get('http://gd.is/gtq/'.$url); if ((is_array($response) && ($response['response']['code']=='200'))) $rurl = $response['body']; }
    if ($rurl!='') $url = $rurl;    return $url;
}}
//## Comments
if (!function_exists("nxs_postNewComment")) { function nxs_postNewComment($cmnt, $aa = false) { $cmnt['comment_post_ID'] = (int) $cmnt['comment_post_ID']; 
  $cmnt['comment_parent'] = isset($cmnt['comment_parent']) ? absint($cmnt['comment_parent']) : 0;
  $parent_status = ( 0 < $cmnt['comment_parent'] ) ? wp_get_comment_status($cmnt['comment_parent']) : '';
  $cmnt['comment_parent'] = ( 'approved' == $parent_status || 'unapproved' == $parent_status ) ? $cmnt['comment_parent'] : 0;
  $cmnt['comment_author_IP'] = ''; $cmnt['comment_agent'] = 'SNAP'; $cmnt['comment_date'] =  get_date_from_gmt( $cmnt['comment_date_gmt'] );
  $cmnt = wp_filter_comment($cmnt); if ($aa) $cmnt['comment_approved'] = 1; else $cmnt['comment_approved'] = wp_allow_comment($cmnt); $cmntID = wp_insert_comment($cmnt);
  if ( 'spam' !== $cmnt['comment_approved'] ) { if ( '0' == $cmnt['comment_approved'] ) wp_notify_moderator($cmntID); $post = &get_post($cmnt['comment_post_ID']);
    if ( get_option('comments_notify') && $cmnt['comment_approved'] && ( ! isset( $cmnt['user_id'] ) || $post->post_author != $cmnt['user_id'] ) ) wp_notify_postauthor($cmntID, isset( $cmnt['comment_type'] ) ? $cmnt['comment_type'] : '' );
  } return $cmntID;
}}


if (!function_exists("nxs_psCron")) { function nxs_psCron() { $sh =_get_cron_array();
   foreach ($sh as $evTime => $evData){  $evFunc = key($evData); if (strpos($evFunc, 'ns_doPublishTo')!==false)  {
       // echo key($evData)." | ".$evTime." = ".time()." - ".date("Y-m-d H:i:s", $evTime)." - ".date("Y-m-d H:i:s")."<br/>"; 
       if ($evTime>'1359495839' && $evTime<time()-5) { //## Missed? Let's post it. We will post just one, so no hold ups.       
         $args = array_values($evData[$evFunc]); $args = $args[0]['args']; do_action($evFunc, $args[0], $args[1]); wp_unschedule_event( $evTime, $evFunc ); return true;         
     }
   }}   
}}

if (!function_exists("nxs_addToRI")) { function nxs_addToRI($postID) { global $plgn_NS_SNAutoPoster;  if (!isset($plgn_NS_SNAutoPoster)) return; $options = $plgn_NS_SNAutoPoster->nxs_options;
  $riPosts = get_option('NS_SNriPosts'); if (!is_array($riPosts)) $riPosts = array();  $options['riHowManyPostsToTrack'] =  (int) $options['riHowManyPostsToTrack'];  if ($options['riHowManyPostsToTrack']==0) return;
  array_unshift($riPosts, $postID);  $riPosts = array_unique($riPosts); $riPosts = array_slice($riPosts, 0, $options['riHowManyPostsToTrack']); update_option('NS_SNriPosts', $riPosts);
}}

function nxs_activation(){ if (!wp_next_scheduled('nxs_hourly_event')){wp_schedule_event(time(), 'hourly', 'nxs_hourly_event');} }
function nxs_do_this_hourly() { $options = get_option('NS_SNAutoPoster'); $riPosts = get_option('NS_SNriPosts'); if (!is_array($riPosts)) $riPosts = array(); //## Check for Incoming Comments if nessesary.

  //## Facebook
  foreach ($options['fb'] as $ii=>$fbo) if ($fbo['riComments']=='1') {  $fbo['ii'] = $ii; $fbo['pType'] = 'aj';
    foreach ($riPosts as $postID) {  
      $fbpo =  get_post_meta($postID, 'snapFB', true); $fbpo =  maybe_unserialize($fbpo); 
      if (is_array($fbpo) && isset($fbpo[$ii]) && is_array($fbpo[$ii]) ){ $ntClInst = new nxs_snapClassFB(); $fbo = $ntClInst->adjMetaOpt($fbo, $fbpo[$ii]); }          
      nxs_getBackFBComments($postID, $fbo, $fbpo[$ii]);
    }      
  } 
}

class NXS_HtmlFixer { public $dirtyhtml; public $fixedhtml; public $allowed_styles; private $matrix; public $debug; private $fixedhtmlDisplayCode;
    public function __construct() { $this->dirtyhtml = ""; $this->fixedhtml = ""; $this->debug = false; $this->fixedhtmlDisplayCode = ""; $this->allowed_styles = array();}
    public function getFixedHtml($dirtyhtml) { $c = 0; $this->dirtyhtml = $dirtyhtml; $this->fixedhtml = ""; $this->fixedhtmlDisplayCode = ""; if (is_array($this->matrix)) unset($this->matrix); $errorsFound=0;
      while ($c<10) { if ($c>0) $this->dirtyhtml = $this->fixedxhtml; $errorsFound = $this->charByCharJob(); if (!$errorsFound) $c=10;  $this->fixedxhtml=str_replace('<root>','',$this->fixedxhtml); 
        $this->fixedxhtml=str_replace('</root>','',$this->fixedxhtml); $this->fixedxhtml = $this->removeSpacesAndBadTags($this->fixedxhtml); $c++;
      } return $this->fixedxhtml;
    }
    private function fixStrToLower($m){ $right = strstr($m, '='); $left = str_replace($right,'',$m); return strtolower($left).$right;}
    private function fixQuotes($s){ $q = "\""; if (!stristr($s,"=")) return $s; $out = $s; preg_match_all("|=(.*)|",$s,$o,PREG_PATTERN_ORDER);
      for ($i = 0; $i< count ($o[1]); $i++) { $t = trim ( $o[1][$i] ) ; $lc=""; if ($t!="") { if ($t[strlen($t)-1]==">") { $lc= ($t[strlen($t)-2].$t[strlen($t)-1])=="/>"  ?  "/>"  :  ">" ; $t=substr($t,0,-1);}
        if (($t[0]!="\"")&&($t[0]!="'")) $out = str_replace( $t, "\"".$t,$out); else $q=$t[0]; if (($t[strlen($t)-1]!="\"")&&($t[strlen($t)-1]!="'")) $out = str_replace( $t.$lc, $t.$q.$lc,$out);
      }} return $out;
    }
    private function fixTag($t){  $t = preg_replace ( array( '/borderColor=([^ >])*/i', '/border=([^ >])*/i' ),  array('',''), $t);
        preg_match_all('/(?:"[^"]*"|\'[^\']*\'|[^"\'\s]+)+/', $t, $ar);  $ar = $ar[0];// prr($ar);
        $nt = ""; for ($i=0;$i<count($ar);$i++) { if (strpos($ar[$i], 'href=\\\\\\"')!==false) {$ar[$i] = str_replace('\\\\\\"','"',$ar[$i]);}
          if (strpos($ar[$i], 'href=\\"')!==false) {$ar[$i] = str_replace('\\"','"',$ar[$i]);} if (strpos($ar[$i], 'href=\"')!==false) {$ar[$i] = str_replace('\"','"',$ar[$i]);}
          $ar[$i]=$this->fixStrToLower($ar[$i]); if (stristr($ar[$i],"=")) $ar[$i] = $this->fixQuotes($ar[$i]); $nt.=$ar[$i]." ";   
        } $nt=preg_replace("/<( )*/i","<",$nt); $nt=preg_replace("/( )*>/i",">",$nt); return trim($nt);
    }
    private function extractChars($tag1,$tag2,$tutto) {  if (!stristr($tutto, $tag1)) return ''; $s=stristr($tutto,$tag1); $s=substr( $s,strlen($tag1)); if (!stristr($s,$tag2)) return '';
        $s1=stristr($s,$tag2); return substr($s,0,strlen($s)-strlen($s1));
    }
    private function mergeStyleAttributes($s) { $x = ""; $temp = ""; $c = 0;
        while(stristr($s,"style=\"")) {$temp = $this->extractChars("style=\"","\"",$s); if ($temp=="") { return preg_replace("/(\/)?>/i","\"\\1>",$s);}
            if ($c==0) $s = str_replace("style=\"".$temp."\"","##PUTITHERE##",$s); $s = str_replace("style=\"".$temp."\"","",$s); if (!preg_match("/;$/i",$temp)) $temp.=";"; $x.=$temp; $c++;
        }
        if (count($this->allowed_styles)>0) { $check=explode(';', $x); $x=""; foreach($check as $chk){ foreach($this->allowed_styles as $as) if(stripos($chk, $as) !== False) { $x.=$chk.';'; break; } }}
        if ($c>0) $s = str_replace("##PUTITHERE##","style=\"".$x."\"",$s);return $s;
    }
    private function fixAutoclosingTags($tag,$tipo=""){ if (in_array( $tipo, array ("img","input","br","hr")) ) { if (!stristr($tag,'/>')) $tag = str_replace('>','/>',$tag ); } return $tag; }
    private function getTypeOfTag($tag) { $tag = trim(preg_replace("/[\>\<\/]/i","",$tag)); $a = explode(" ",$tag); return $a[0];}
    private function checkTree() { $errorsCounter = 0; for ($i=1;$i<count($this->matrix);$i++) { $flag=false;
      if ($this->matrix[$i]["tagType"]=="div") { $parentType = $this->matrix[$this->matrix[$i]["parentTag"]]["tagType"]; if (in_array($parentType, array("p","b","i","font","u","small","strong","em"))) $flag=true; }
      if (in_array( $this->matrix[$i]["tagType"], array( "b", "strong" )) ) {  $parentType = $this->matrix[$this->matrix[$i]["parentTag"]]["tagType"]; if (in_array($parentType, array("b","strong"))) $flag=true; }
      if (in_array( $this->matrix[$i]["tagType"], array ( "i", "em") )) {  $parentType = $this->matrix[$this->matrix[$i]["parentTag"]]["tagType"]; if (in_array($parentType, array("i","em"))) $flag=true; }
      if ($this->matrix[$i]["tagType"]=="p") { $parentType = $this->matrix[$this->matrix[$i]["parentTag"]]["tagType"]; if (in_array($parentType, array("p","b","i","font","u","small","strong","em"))) $flag=true; }
      if ($this->matrix[$i]["tagType"]=="table") { $parentType = $this->matrix[$this->matrix[$i]["parentTag"]]["tagType"]; if (in_array($parentType, array("p","b","i","font","u","small","strong","em","tr","table"))) $flag=true; }
      if ($flag) { $errorsCounter++; if ($this->debug) echo "<div style='color:#ff0000'>Found a <b>".$this->matrix[$i]["tagType"]."</b> tag inside a <b>".htmlspecialchars($parentType)."</b> tag at node $i: MOVED</div>";                
        $swap = $this->matrix[$this->matrix[$i]["parentTag"]]["parentTag"]; if ($this->debug) echo "<div style='color:#ff0000'>Every node that has parent ".$this->matrix[$i]["parentTag"]." will have parent ".$swap."</div>";
        $this->matrix[$this->matrix[$i]["parentTag"]]["tag"]="<!-- T A G \"".$this->matrix[$this->matrix[$i]["parentTag"]]["tagType"]."\" R E M O V E D -->"; $this->matrix[$this->matrix[$i]["parentTag"]]["tagType"]="";
        $hoSpostato=0;for ($j=count($this->matrix)-1;$j>=$i;$j--) { if ($this->matrix[$j]["parentTag"]==$this->matrix[$i]["parentTag"]) { $this->matrix[$j]["parentTag"] = $swap; $hoSpostato=1; }}
      }}return $errorsCounter;
    }
    private function findSonsOf($parentTag) { $out= "";
      for ($i=1;$i<count($this->matrix);$i++) { if ($this->matrix[$i]["parentTag"]==$parentTag) {
          if ($this->matrix[$i]["tag"]!="") { $out.=$this->matrix[$i]["pre"]; $out.=$this->matrix[$i]["tag"]; $out.=$this->matrix[$i]["post"]; } else { $out.=$this->matrix[$i]["pre"]; $out.=$this->matrix[$i]["post"];}
          if ($this->matrix[$i]["tag"]!="") { $out.=$this->findSonsOf($i); if ($this->matrix[$i]["tagType"]!="") { if (!in_array($this->matrix[$i]["tagType"], array ( "br","img","hr","input"))) $out.="</". $this->matrix[$i]["tagType"].">";}}
      }}return $out;
    }
    private function findSonsOfDisplayCode($parentTag) { $out= "";
        for ($i=1;$i<count($this->matrix);$i++) {
            if ($this->matrix[$i]["parentTag"]==$parentTag) { $out.= "<div style=\"padding-left:15\"><span style='float:left;background-color:#FFFF99;color:#000;'>{$i}:</span>";
                if ($this->matrix[$i]["tag"]!="") { if ($this->matrix[$i]["pre"]!="") $out.=htmlspecialchars($this->matrix[$i]["pre"])."<br>";
                    $out.="".htmlspecialchars($this->matrix[$i]["tag"])."<span style='background-color:red; color:white'>{$i} <em>".$this->matrix[$i]["tagType"]."</em></span>";
                    $out.=htmlspecialchars($this->matrix[$i]["post"]);
                } else { if ($this->matrix[$i]["pre"]!="") $out.=htmlspecialchars($this->matrix[$i]["pre"])."<br>"; $out.=htmlspecialchars($this->matrix[$i]["post"]);}
                if ($this->matrix[$i]["tag"]!="") { $out.="<div>".$this->findSonsOfDisplayCode($i)."</div>\n";
                    if ($this->matrix[$i]["tagType"]!="") {
                        if (($this->matrix[$i]["tagType"]!="br") && ($this->matrix[$i]["tagType"]!="img") && ($this->matrix[$i]["tagType"]!="hr")&& ($this->matrix[$i]["tagType"]!="input"))
                            $out.="<div style='color:red'>".htmlspecialchars("</". $this->matrix[$i]["tagType"].">")."{$i} <em>".$this->matrix[$i]["tagType"]."</em></div>";
                    }
                } $out.="</div>\n";
            }
        }return $out;
    }
    private function removeSpacesAndBadTags($s) { $i=0;
      while ($i<10) { $i++; $s = preg_replace (
        array( '/[\r\n]/i', '/  /i', '/<p([^>])*>(&nbsp;)*\s*<\/p>/i', '/<span([^>])*>(&nbsp;)*\s*<\/span>/i', '/<strong([^>])*>(&nbsp;)*\s*<\/strong>/i', '/<em([^>])*>(&nbsp;)*\s*<\/em>/i',
          '/<font([^>])*>(&nbsp;)*\s*<\/font>/i', '/<small([^>])*>(&nbsp;)*\s*<\/small>/i', '/<\?xml:namespace([^>])*><\/\?xml:namespace>/i', '/<\?xml:namespace([^>])*\/>/i', '/class=\"MsoNormal\"/i',
          '/<o:p><\/o:p>/i', '/<!DOCTYPE([^>])*>/i', '/<!--(.|\s)*?-->/', '/<\?(.|\s)*?\?>/'), 
        array(' ', ' ', '', '', '', '', '', '', '', '', '', ' ', '', '' ) , trim($s));
      }return $s;
    }
    private function charByCharJob() { $s = $this->removeSpacesAndBadTags($this->dirtyhtml); if ($s=="") return; //echo "\r\n=!= ".$s." =!=\r\n<br/>\r\n";
        $s = "<root>".$s."</root>"; $contenuto = ""; $ns = ""; $i=0; $j=0; $ss=''; $indexparentTag=0; $padri=array(); array_push($padri,"0"); $this->matrix[$j]["tagType"]="";
        $this->matrix[$j]["tag"]=""; $this->matrix[$j]["parentTag"]="0"; $this->matrix[$j]["pre"]=""; $this->matrix[$j]["post"]=""; $tags=array();
        // echo "\r\n=#= ".$s." =#=\r\n<br/>\r\n";
        while($i<strlen($s)) {
            if ( $s[$i] =="<") { $contenuto = $ns; $ns = ""; $tag=""; while( $i<strlen($s) && $s[$i]!=">" ){ $tag.=$s[$i]; $i++;} $tag.=$s[$i]; if (stristr($tag,'<param') && stristr($tag,'/>')) $tag = str_replace('/>','></param>',$tag);
            $ss .= $tag;                 
        } else $ss .= $s[$i]; $i++; }
        $i=0; $s = $ss; //echo "\r\n== ".$s." ==\r\n<br/>\r\n";
        while($i<strlen($s)) {
            if ( $s[$i] =="<") { $contenuto = $ns; $ns = ""; $tag=""; while( $i<strlen($s) && $s[$i]!=">" ){ $tag.=$s[$i]; $i++;} $tag.=$s[$i];                
                if($s[$i]==">") { $tag = $this->fixTag($tag); $tagType = $this->getTypeOfTag($tag); $tag = $this->fixAutoclosingTags($tag,$tagType);
                    $tag = $this->mergeStyleAttributes($tag); if (!isset($tags[$tagType])) $tags[$tagType]=0; $tagok=true;
                    if (($tags[$tagType]==0)&&(stristr($tag,'/'.$tagType.'>'))&&(stristr($tag,'<'.$tagType)!==false)) { $tagok=false; if ($this->debug) echo "<div style='color:#ff0000'>Found a closing tag <b>".htmlspecialchars($tag)."</b> at char $i without open tag: REMOVED</div>";} else $tagok=true;
                }
                if ($tagok) { $j++; $this->matrix[$j]["pre"]=""; $this->matrix[$j]["post"]=""; $this->matrix[$j]["parentTag"]=""; $this->matrix[$j]["tag"]=""; $this->matrix[$j]["tagType"]="";
                    if (stristr($tag,'/'.$tagType.'>')) { $ind = array_pop($padri); $this->matrix[$j]["post"]=$contenuto; $this->matrix[$j]["parentTag"]=$ind; $tags[$tagType]--;
                    } else { if (@preg_match("/".$tagType."\/>$/i",$tag)||preg_match("/\/>/i",$tag)) { $this->matrix[$j]["tagType"]=$tagType; $this->matrix[$j]["tag"]=$tag;
                      $indexparentTag = array_pop($padri); array_push($padri,$indexparentTag); $this->matrix[$j]["parentTag"]=$indexparentTag; $this->matrix[$j]["pre"]=$contenuto; $this->matrix[$j]["post"]="";
                    } else { $tags[$tagType]++; $this->matrix[$j]["tagType"]=$tagType; $this->matrix[$j]["tag"]=$tag; $indexparentTag = array_pop($padri); array_push($padri,$indexparentTag);
                      array_push($padri,$j); $this->matrix[$j]["parentTag"]=$indexparentTag; $this->matrix[$j]["pre"]=$contenuto; $this->matrix[$j]["post"]=""; }
                    }
                }
            } else { $ns.=$s[$i]; } $i++;
        } for ($eli=$j+1;$eli<count($this->matrix);$eli++) { $this->matrix[$eli]["pre"]=""; $this->matrix[$eli]["post"]=""; $this->matrix[$eli]["parentTag"]=""; $this->matrix[$eli]["tag"]=""; $this->matrix[$eli]["tagType"]="";}
        $errorsCounter = $this->checkTree();  $this->fixedxhtml=$this->findSonsOf(0);return $errorsCounter;
    }
}
?>