<?php
	session_start();
        require "./shared_methods_and_data.php";
	
	$wait_length = 20;
        
	$sql_connection = mysql_connect("localhost",$sql_user_name,$sql_password);
	
	if(!$sql_connection)
	{
		die("MySQL error :".mysql_error());
	}
	
	//DEBUGGING CODE : Attempt to create Database and table and ignore all errors
	mysql_query("CREATE DATABASE ".$db_name,$sql_connection);
	
	//Select the database that we will be working with
	mysql_select_db($db_name,$sql_connection);
	
	//DEBUGGING CODE : Attempt to create the Table and ignore all errors
	mysql_query("CREATE TABLE ".$questions_table."(question_id int NOT NULL AUTO_INCREMENT,PRIMARY KEY(question_id),question varchar(255),choice_1 varchar(255),choice_2 varchar(255),choice_3 varchar(255),correct_choice varchar(255),start_time varchar(255))",$sql_connection);
	
	
	mysql_query("INSERT INTO ".$questions_table." VALUES (NULL,\"ENDED\",\"1\",\"2\",\"3\",\"2\",\"".(time()+$wait_length)."\")",$sql_connection);
	
	mysql_close($sql_connection);
?>

<html>
<head>
<meta http-equiv="refresh" content="1;url=control_panel.html">
</head>
<body></body>
</html>