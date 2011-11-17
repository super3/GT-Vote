<?php
	session_start();
	require './shared_methods_and_data.php';
	
	$_SESSION['user_name'] = generate_user_name(get_current_user_ip());
	$_SESSION['current_question'] = "";
	
	$result = mysql_fetch_array(search_sql_table($results_table, "user_name", $_SESSION['user_name']));
	if($result['0'] == NULL)
	{
		create_user($_SESSION['user_name']);
	}
	$_SESSION['last_answer'] = "You haven't answered any questions yet...";
?>

<html>
	<head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	</head>
	<body>
		<h1 style="text-align: center;">Welcome to GT-Vote, a live voting system that challenges you during the game. Are you ready?</h1>
		<div style="padding-top: 10px;">
			<a href="select_question.php"  class="button blue">Start the Game!</a>
		<div> 
	</body>
</html>
