<?php
/**
 * EK Twitter Widget Class
 */
class EK_Widget_Twitter extends WP_Widget {

	function EK_Widget_Twitter() {
	
		$widget_ops = array(
			'classname' => 'twitter',
			'description' => __('List the latest tweets by displaying content, date, and follow link', 'ek')
		);

		$control_ops = array();

		$this->WP_Widget('EK_Widget_Twitter', __('EK Twitter Feed', 'ek'), $widget_ops, $control_ops);
	}

	function form($instance) {
	
		$instance = wp_parse_args((array) $instance, array(
			'twitter_title' => '',
			'twitter_username' => '',
			'twitter_no_tweets' => '1',
			'twitter_show_avatar' => false,
			'twitter_cache_duration' => 0,
		));
		
		$show_avatar_checked = ' checked="checked"';
		if ( $instance['twitter_show_avatar'] == false )
			$show_avatar_checked = '';
			

		// Title
		$jzoutput .= '
			<p style="border-bottom: 1px solid #DFDFDF;">
				<label for="' . $this->get_field_id('twitter_title') . '"><strong>' . __('Title', 'ek') . '</strong></label>
			</p>
			<p>
				<input id="' . $this->get_field_id('twitter_title') . '" name="' . $this->get_field_name('twitter_title') . '" type="text" value="' . $instance['twitter_title'] . '" />
			</p>
		';

		// Settings
		$jzoutput .= '
			<p style="border-bottom: 1px solid #DFDFDF;"><strong>' . __('Preferences', 'ek') . '</strong></p>
	
			<p>
				<label>' . __('Username', 'ek') . '<br />
				<span style="color:#999;">@</span><input id="' . $this->get_field_id('twitter_username') . '" name="' . $this->get_field_name('twitter_username') . '" type="text" value="' . $instance['twitter_username'] . '" /> <abbr title="' . __('No @, just your username', 'ek') . '">(?)</abbr></label>
			</p>
			<p>
				<label>' . __('Number of tweets to show', 'ek') . '<br />
				<input style="margin-left: 1em;" id="' . $this->get_field_id('twitter_no_tweets') . '" name="' . $this->get_field_name('twitter_no_tweets') . '" type="text" value="' . $instance['twitter_no_tweets'] . '" /> <abbr title="' . __('Just a number, between 1 and 5 for example', 'ek') . '">(?)</abbr></label>
			</p>
			<p>
				<label>' . __('Duration of cache', 'ek') . '<br />
				<input style="margin-left: 1em; text-align:right;" id="' . $this->get_field_id('twitter_cache_duration') . '" name="' . $this->get_field_name('twitter_cache_duration') . '" type="text" size="10" value="' . $instance['twitter_cache_duration'] . '" /> '.__('Seconds', 'ek').' <abbr title="' . __('A big number save your page speed. Try to use the delay between each tweet you make. (e.g. 1800 s = 30 min)', 'ek') . '">(?)</abbr></label>
			</p>
			<p>
				<label>' . __('Show your avatar?', 'ek') . ' 
				<input type="checkbox" name="' . $this->get_field_name('twitter_show_avatar') . '" id="' . $this->get_field_id('twitter_show_avatar') . '"'.$show_avatar_checked.' /> <abbr title="' . __("If it's possible, display your avatar at the top of twitter list", 'ek') . '">(?)</abbr></label>
			</p>
		';
		
		echo $jzoutput;
	}

	function update($new_instance, $old_instance) {
		
		$instance = $old_instance;

		$new_instance = wp_parse_args((array) $new_instance, array(
			'twitter_title' => '',
			'twitter_username' => '',
			'twitter_no_tweets' => '1',
			'twitter_show_avatar' => false,
			'twitter_cache_duration' => 0,
		));

		$instance['plugin-version'] = strip_tags($new_instance['twitter-version']);
		$instance['twitter_title'] = strip_tags($new_instance['twitter_title']);
		$instance['twitter_username'] = strip_tags($new_instance['twitter_username']);
		$instance['twitter_no_tweets'] = strip_tags($new_instance['twitter_no_tweets']);
		$instance['twitter_show_avatar'] = strip_tags($new_instance['twitter_show_avatar']);
		$instance['twitter_cache_duration'] = $new_instance['my_cache_duration'];

		return $instance;
	}

	function widget($args, $instance) {
		extract($args);

		echo $before_widget;

		$title = (empty($instance['twitter_title'])) ? '' : apply_filters('widget_title', $instance['twitter_title']);

		if(!empty($title)) {
			echo $before_title . $title . $after_title;
		}

		echo $this->twitter_output($instance, 'widget');
		echo $after_widget;
	}

	function twitter_output($args = array(), $position) {
		
		$the_username = $args['twitter_username'];
		$the_username = preg_replace('#^@(.+)#', '$1', $the_username);
		$the_nb_tweet = $args['twitter_no_tweets'];
		$need_cache = ($args['twitter_cache_duration']!='0') ? true : false;
		$show_avatar = ($args['twitter_show_avatar']) ? true : false;

		if ( !function_exists ('tw_wp_filter_handler') ) {
			function tw_wp_filter_handler ( $seconds ) {
				// change the default feed cache recreation period to 2 hours
				return intval($args['twitter_cache_duration']); //seconds
			}
		}
		add_filter( 'wp_feed_cache_transient_lifetime' , 'tw_wp_filter_handler' ); 
		 
		
			function jltw_format_since($date){
				
				$timestamp = strtotime($date);
				
				$the_date = '';
				$now = time();
				$diff = $now - $timestamp;
				
				if($diff < 60 ) {
					$the_date .= $diff.' ';
					$the_date .= ($diff > 1) ?  __('Seconds', 'ek') :  __('Second', 'ek');
				}
				elseif($diff < 3600 ) {
					$the_date .= round($diff/60).' ';
					$the_date .= (round($diff/60) > 1) ?  __('Minutes', 'ek') :  __('Minute', 'ek');
				}
				elseif($diff < 86400 ) {
					$the_date .=  round($diff/3600).' ';
					$the_date .= (round($diff/3600) > 1) ?  __('Hours', 'ek') :  __('Hour', 'ek');
				}
				else {
					$the_date .=  round($diff/86400).' ';
					$the_date .= (round($diff/86400) > 1) ?  __('Days', 'ek') :  __('Day', 'ek');
				}
			
				return $the_date;
			}
			
			function jltw_format_tweettext($raw_tweet, $username) {

				$i_text = htmlspecialchars_decode($raw_tweet);
				/* $i_text = preg_replace('#(([a-zA-Z0-9_-]{1,130})\.([a-z]{2,4})(/[a-zA-Z0-9_-]+)?((\#)([a-zA-Z0-9_-]+))?)#','<a href="//$1">$1</a>',$i_text); */
				$i_text = preg_replace('#(((https?|ftp)://(w{3}\.)?)(?<!www)(\w+-?)*\.([a-z]{2,4})(/[a-zA-Z0-9_-]+)?)#',' <a href="$1" rel="nofollow" class="twitter_url">$5.$6$7</a>',$i_text);
				$i_text = preg_replace('#@([a-zA-z0-9_]+)#i','<a href="http://twitter.com/$1" class="twitter_tweetos" rel="nofollow">@$1</a>',$i_text);
				$i_text = preg_replace('#[^&]\#([a-zA-z0-9_]+)#i',' <a href="http://twitter.com/#!/search/%23$1" class="twitter_hastag" rel="nofollow">#$1</a>',$i_text);
				$i_text = preg_replace( '#^'.$username.': #i', '', $i_text );
				
				return $i_text;
			
			}
			
			function jltw_format_tweetsource($raw_source) {
			
				$i_source = htmlspecialchars_decode($raw_source);
				$i_source = preg_replace('#^web$#','<a href="http://twitter.com">Twitter</a>', $i_source);
				
				return $i_source;
			
			}
			
			
			function jltw_get_the_user_timeline($username, $nb_tweets, $show_avatar) {
				
				$username = (empty($username)) ? 'wordpress' : $username;
				$nb_tweets = (empty($nb_tweets) OR $nb_tweets == 0) ? 1 : $nb_tweets;
				$xml_result = $the_best_feed = '';
				
				// include of WP's feed functions
				include_once(ABSPATH . WPINC . '/feed.php');
				
				// some RSS feed with timeline user
				$search_feed1 = "http://api.twitter.com/1/statuses/user_timeline.rss?screen_name=".$username."&count=".intval($nb_tweets);
				$search_feed2 = "http://search.twitter.com/search.rss?q=from%3A".$username."&rpp=".intval($nb_tweets);

				
				// get the better feed
				// try with the first one
				
				$sf_rss = fetch_feed ( $search_feed1 );
				if ( is_wp_error($sf_rss) ) {
					// if first one is not ok, try with the second one
					$sf_rss = fetch_feed ( $search_feed2 );
					
					if ( is_wp_error($sf_rss) ) $the_best_feed = false;
					else $the_best_feed = '2';
				}
				else $the_best_feed = '1';
				
				// if one of the rss is readable
				if ( $the_best_feed ) {
					$max_i = $sf_rss -> get_item_quantity($nb_tweets);
					$rss_i = $sf_rss -> get_items(0, $max_i);
					$i = 0;
					foreach ( $rss_i as $tweet ) {
						$i++;
						$i_title = jltw_format_tweettext($tweet -> get_title() , $username);
						$i_creat = jltw_format_since( $tweet -> get_date() );
						
						$i_guid = $tweet->get_link();
						
						$author_tag = $tweet->get_item_tags('','author');
						$author_a = $author_tag[0]['data'];
						$author = substr($author_a, 0, stripos($author_a, "@") );
						
						$source_tag = $tweet->get_item_tags('https://api.twitter.com','source');
						$i_source = $source_tag[0]['data'];
						$i_source = jltw_format_tweetsource($i_source);
						$i_source = ($i_source) ? '<span class="my_source">via ' . $i_source : '</span>';
						
						if ( $the_best_feed == '1' && $show_avatar) {
							$avatar = "https://api.twitter.com/1/users/profile_image/". $username .".xml?size=normal"; // or bigger
						}
						elseif ($the_best_feed == '2' && $show_avatar) {
							$avatar_tag = $tweet->get_item_tags('https://base.google.com/ns/1.0','image_link');
							$avatar = $avatar_tag[0]['data'];
						}
						
						$html_avatar = ($i==1 && $show_avatar && $avatar) ? '<h5><span class="user_avatar"><a href="http://twitter.com/' . $username . '" title="' . __('Follow', 'ek') . ' @'.$author.' ' . __('on twitter.', 'ek') . '"><img src="'.$avatar.'" alt="'.$author.'" /></a></span> @'.$username.'</h5><hr>' : '';
						//echo $i_title.'<br />'.$i_creat.'<br />'.$link_tag.'<br />'.$author.'('.$avatar.')<br /><br />';
						$xml_result .= '
							<li>
								'.$html_avatar.'
								<span class="my_lt_content">' . $i_title . '</span>
								<em class="twitter_inner"><a href="'.$i_guid .'" target="_blank">'.$i_creat.'</a>'.$i_source.' '.__('ago', 'ek').'</em> 
							<hr>
							</li>
						';
					}
				}
				// if any feed is readable
				else 
					$xml_result = '<li><em>'.__('The RSS feed for this twitter account is not loadable for the moment.', 'ek').'</em></li>';

				return $xml_result;
			}
			
			// display the widget front content (but not immediatly because of cache system)
			echo '
				<div class="twitter_inside">
					<ul id="twitter_tweetlist" class="unstyled">
						'. jltw_get_the_user_timeline($the_username, $the_nb_tweet, $show_avatar) .'
						
				
				</div>					
					</ul>
				<p class="twitter_follow_us" style="margin: 10px 0;"> 
						<span class="tw_wp_follow">' . __('Follow', 'ek') . '</span>
						<a class="tw_wp_username" href="http://twitter.com/' . $the_username . '">@' . $the_username . '</a>
						<span class="tw_wp_ontwitter">' . __('on twitter.', 'ek') . '</span>
					</p>
			';
	}
}
add_action('widgets_init', create_function('', 'return register_widget("EK_Widget_Twitter");'));