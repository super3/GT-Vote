<?php
	require("./shared_methods_and_data.php");
	
	$all_results = get_entire_table($results_table);
	
	$user_name = '';
	$top_result = 0;
	
	while($row = mysql_fetch_array($all_results))
	{
		if( $row['user_result'] > $top_result )
		{
			$user_name = $row['user_name'];
			$top_result = $row['user_result'];
		}
	}
	
	update_sql_table($results_table,'user_name',$user_name,'user_result',$winner_score);
?>

<html><head>
<meta http-equiv="refresh" content="1;url=control_panel.html">
</head><body></body></html>
