<?php




class Simple_Optimizer_Tools{

	
	public $opt;
	
	

	public function init(){


		if( isset($_POST['action']) && ('run_simple_optimizer' == $_POST['action']) ) {
			
			set_time_limit(0);
			
			echo "<div class='updated' style='overflow-y:auto; max-height:250px; padding-left:10px;'>";
			
			
				$db_options = $this->opt['db_optimizer_settings'];
				$wp_options = $this->opt['wordpress_optimizer_settings'];
				
				$action = false;
				
				if( isset($wp_options)  ){
	
					$action = $this->performWordPressOptimization();
	
				}
				
				if($db_options['check_database'] === "true"){
	
					$this->performDatabaseCheck();
					$action = true;
					
	
				}
				
				if($db_options['repair_database'] === "true"){
	
					$this->performDatabaseRepair();
					$action = true;
					
				}
				
				if($db_options['optimize_database'] === "true"){
	
					$this->performDatabaseOptimization();
					$action = true;
					
				}
			

				if($action == false){
					echo "<p><strong>Nothing To Do! <br>Please Enable some of the Optimization Functions.</strong></p>";
				}
				
				
			echo "</div>";
				
		}
			

	}





	
	public function performWordPressOptimization(){
	
		global $wpdb;
		$action = false;
		
		$optimization_queries = array(
			
			'delete_revisions' 				=> "DELETE FROM $wpdb->posts WHERE post_type = 'revision'",
			'delete_auto_drafts' 			=> "DELETE FROM $wpdb->posts WHERE post_status = 'auto-draft'",
			
			'delete_pingbacks' 				=> "DELETE FROM $wpdb->comments WHERE comment_type = 'pingback'",
			'delete_spam_comments' 			=> "DELETE FROM $wpdb->comments WHERE comment_approved = 'spam'",
			'delete_unapproved_comments' 	=> "DELETE FROM $wpdb->comments WHERE comment_approved = '0'",
			
			'delete_transient_options' 		=> "DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_%' OR option_name LIKE '_site_transient_%'",
			'delete_unused_postmeta' 		=> "DELETE pm FROM  $wpdb->postmeta  pm LEFT JOIN  $wpdb->posts  wp ON wp.ID = pm.post_id WHERE wp.ID IS NULL",
			'delete_unused_tags' 			=> "DELETE t,tt FROM  $wpdb->terms t INNER JOIN $wpdb->term_taxonomy tt ON t.term_id=tt.term_id WHERE tt.taxonomy='post_tag' AND tt.count=0"
			
		);
		
		$plugin_options = $this->opt; 
		$wp_optimization_methods = $plugin_options['wordpress_optimizer_settings'];
	
		$queries = $optimization_queries;
	
		foreach($queries as $method => $query){
			if($wp_optimization_methods[$method] === "true"){
				$action = true;
				
				echo "<p>Performing Optimization: " . $method."<br>";
				$result = $wpdb->query($query);
				echo "$result items deleted.</p>";
						
			}
		}
		return $action;
	}
	
	
	public function performDatabaseCheck(){
	
		//$debug_enabled = $this->get_option('debug_enabled');
		$debug_enabled = 'true';
		echo "<p>";
		echo "Checking Database...<br>";
		
		$local_query = 'SHOW TABLE STATUS FROM `'. DB_NAME.'`';
		$result = mysql_query($local_query);
		if (mysql_num_rows($result)){
			
			while ($row = mysql_fetch_array($result)){
			
				$check_query = "CHECK TABLE ".$row['Name'];
				$check_result = mysql_query($check_query);
				if (mysql_num_rows($check_result)){
					while($rrow = mysql_fetch_assoc($check_result)){
						if( $debug_enabled == "true"){
							echo "Table: " . $row['Name'] ." ". $rrow['Msg_text'];
							echo "<br>";
						}
					}
				}
	
			}
			
			echo "Done!<br>";
			
		}
	
		echo "</p>";
	
	}



	public function performDatabaseRepair(){
	
		//$debug_enabled = $this->get_option('debug_enabled');
		$debug_enabled = 'true';
		echo "<p>";
		echo "Repairing Database...<br>";
		
		$local_query = 'SHOW TABLE STATUS FROM `'. DB_NAME.'`';
		$result = mysql_query($local_query);
		if (mysql_num_rows($result)){
			
			while ($row = mysql_fetch_array($result)){
			
				$check_query = "REPAIR TABLE ".$row['Name'];
				$check_result = mysql_query($check_query);
				if (mysql_num_rows($check_result)){
					while($rrow = mysql_fetch_assoc($check_result)){
						if( $debug_enabled == "true"){
							echo "Table: " . $row['Name'] ." ". $rrow['Msg_text'];
							echo "<br>";
						}
					}
				}
				
			}
			
			echo "Done!<br>";
			
		}
	
		echo "</p>";
	
	}
	
	
	public function performDatabaseOptimization(){
		
		$initial_table_size = 0;
		$final_table_size = 0;
		
		//$debug_enabled = $this->get_option('debug_enabled');
		$debug_enabled = 'true';
		
		echo "<p>";
		echo "Optimizing Database...<br>";
		
		$local_query = 'SHOW TABLE STATUS FROM `'. DB_NAME.'`';
		$result = mysql_query($local_query);
		if (mysql_num_rows($result)){
			
			while ($row = mysql_fetch_array($result)){
				//var_dump($row);
				
				$table_size = ($row[ "Data_length" ] + $row[ "Index_length" ]) / 1024;
				
				$optimize_query = "OPTIMIZE TABLE ".$row['Name'];
				if(mysql_query($optimize_query)){
				
					if( $debug_enabled == "true"){
						echo "Table: " . $row['Name'] . " optimized!";
						echo "<br>";
					}
				}
				
				$initial_table_size += $table_size; 
				
			}
			
			echo "Done!<br>";
			
		}
		
		
		
		
		$local_query = 'SHOW TABLE STATUS FROM `'. DB_NAME.'`';
		$result = mysql_query($local_query);
		if (mysql_num_rows($result)){
			while ($row = mysql_fetch_array($result)){
				$table_size = ($row[ "Data_length" ] + $row[ "Index_length" ]) / 1024;
				$final_table_size += $table_size;
			}
		}
		
		
		
		echo "<br>";
		echo "Initial DB Size: " . number_format($initial_table_size, 2) . " KB<br>";
		echo "Final DB Size: " . number_format($final_table_size, 2) . " KB<br>";
		
		$space_saved = $initial_table_size - $final_table_size;
		$opt_pctg = 100 * ($space_saved / $initial_table_size);
		echo "Space Saved: " . number_format($space_saved,2) . " KB  (" .  number_format($opt_pctg, 2) . "%)<br>";
		echo "</p>";
	
	}
	



	
	
}

?>