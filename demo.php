<?php
	session_start();
        require "./shared_methods_and_data.php";
	
	$wait_length = 20;
        $demo_start = time();
        
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
		mysql_query("CREATE TABLE ".$questions_bank."(question_id int NOT NULL AUTO_INCREMENT,PRIMARY KEY(question_id),question varchar(255),choice_1 varchar(255),choice_2 varchar(255),choice_3 varchar(255),correct_choice varchar(255),start_time varchar(255))",$sql_connection);
	
	//Inserts the information into the given Table
	mysql_query("TRUNCATE TABLE  `".$questions_table."`",$sql_connection);
    mysql_query("TRUNCATE TABLE  `".$questions_bank."`",$sql_connection);
	mysql_query("TRUNCATE TABLE  `".$results_table."`",$sql_connection);
	
        
mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"In what quarter does Georgia Tech have possession of the ball most throughout the game?\",\"1st\",\"4th\",\"3rd\",\"3rd\",\"".($demo_start+$wait_length)."\")",$sql_connection);
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"Georgia Tech’s opponent score the least amount of points in what quarter?\",\"1st\",\"2nd\",\"3rd\",\"3rd\",\"".($demo_start+2*$wait_length)."\")",$sql_connection);
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"Stephen Hill’s longest reception touchdown this season was how long? \",\"95\",\"82\",\"76\",\"82\",\"".($demo_start+ 3*$wait_length)."\")",$sql_connection);
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"In what quarter does Georgia Techs defense give up most of their points?  \",\"4th\",\"2nd\",\"3rd\",\"2nd\",\"".($demo_start+4*$wait_length)."\")",$sql_connection);
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"Georgia Tech forced 19 fumbles, how many of those fumbles did Georgia Tech recover? \",\"9\",\"8\",\"7\",\"7\",\"".($demo_start+5*$wait_length)."\")",$sql_connection);
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"Who leads the team in most reception yards? \",\" Synjyn Day\",\"Stephen Hill\",\"Orwin Smith\",\"Stephen Hill\",\"".($demo_start+6*$wait_length)."\")",$sql_connection);	
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"When Georgia Tech goes for the two point conversion, how many times do they succeed this season?  \",\"1-1\",\"0-0\",\"0-1\",\"0-0\",\"".($demo_start+7*$wait_length)."\")",$sql_connection);
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"What was the most tackles Julian Burnett had in one game? \",\"8\",\"5\",\"9\",\"9\",\"".($demo_start+8*$wait_length)."\")",$sql_connection);	
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"Justin Moore’s longest field goal made this season was how long? \",\"47\",\"40\",\"39\",\"40\",\"".($demo_start+9*$wait_length)."\")",$sql_connection);
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"If the next game Tevin Washington passes for exactly 250 yards, how many yards will he have for the season? \",\"1,188\",\"1,231\",\"1,045\",\"1,188\",\"".($demo_start+10*$wait_length)."\")",$sql_connection);
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"Against what team did Georgia Tech only throw the ball seven times? \",\"Kansas\",\"Middle Tennessee\",\"Western Carolina\",\"Kansas\",\"".($demo_start+11*$wait_length)."\")",$sql_connection);	
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"Against what team did Georgia Tech throw the ball most? \",\"NC State\",\"Middle Tennessee\",\"Western Carolina\",\"Western Carolina\",\"".($demo_start+12*$wait_length)."\")",$sql_connection);	
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"Orwin Smith’s longest rushing touchdown this season was how long? \",\"95\",\"82\",\"87\",\"95\",\"".($demo_start+13*$wait_length)."\")",$sql_connection);
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"Against what team did Georgia Tech run the ball most? \",\"NC State\",\"Middle Tennessee\",\"Kansas\",\"Middle Tennessee\",\"".($demo_start+14*$wait_length)."\")",$sql_connection);
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"Against what team did Georgia Tech rush for over 600 yards? \",\"NC State\",\"Middle Tennessee\",\"Kansas\",\"Kansas\",\"".($demo_start+15*$wait_length)."\")",$sql_connection);
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"How many times Georgia Tech has taken one play on a new possession to score a touchdown? \",\"1\",\"2\",\"8\",\"8\",\"".($demo_start+16*$wait_length)."\")",$sql_connection);	
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"What was the shortest possession it took for Georgia Tech to score a touchdown? \",\"6 seconds\",\"20 seconds\",\"32 seconds\",\"6 seconds\",\"".($demo_start+17*$wait_length)."\")",$sql_connection);	
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"In what quarter does Georgia Tech score most of their points?  \",\"1st\",\"2nd\",\"3rd\",\"1st\",\"".($demo_start+18*$wait_length)."\")",$sql_connection);
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"Who leads the team in most touchdowns this season? \",\"Orwin Smith\",\"Stephen Hill\",\"Synjyn Days\",\"Orwin Smith\",\"".($demo_start+19*$wait_length)."\")",$sql_connection);
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"Georgia Tech’s largest win margin was? \",\"42\",\"21\",\"35\",\"42\",\"".($demo_start+20*$wait_length)."\")",$sql_connection);
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"Who leads the team in most tackles? \",\"Jeremiah Attaochu\",\"Julian Burnett\",\"Isaiah Johnson\",\"Julian Burnett\",\"".($demo_start+21*$wait_length)."\")",$sql_connection);	
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"How many times has Tevin Washington connected with one of his receivers for more than 50 yards this season? \",\"6\",\"5\",\"4\",\"6\",\"".($demo_start+22*$wait_length)."\")",$sql_connection);
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"What was the most tackles for loss Jeremiah Attaochu had in one game? \",\"4\",\"2\",\"1\",\"4\",\"".($demo_start+23*$wait_length)."\")",$sql_connection);
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"What was the most tackles Julian Burnett had in one game? \",\"8\",\"5\",\"9\",\"9\",\"".($demo_start+24*$wait_length)."\")",$sql_connection);	
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"Georgia Tech’s opponents longest rushing touchdown was how long? \",\"55\",\"77\",\"65\",\"77\",\"".($demo_start+25*$wait_length)."\")",$sql_connection);
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"Georgia Tech’s opponents longest pass was how long? \",\"42\",\"78\",\"63\",\"63\",\"".($demo_start+26*$wait_length)."\")",$sql_connection);	
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"How times has Georgia Tech had a scoring drive of 80 yards or more? \",\"12\",\"13\",\"11\",\"13\",\"".($demo_start+27*$wait_length)."\")",$sql_connection);	
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"Georgia Tech has won how many coin tossses this season? \",\"5\",\"3\",\"4\",\"5\",\"".($demo_start+28*$wait_length)."\")",$sql_connection);
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"Who leads Georgia Tech in sacks this season? \",\"Jeremiah Attaochu\",\"Julian Burnett\",\"Isaiah Johnson\",\"Jeremiah Attaochu\",\"".($demo_start+29*$wait_length)."\")",$sql_connection);
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"How many kickoff returns for touchdowns does Orwin Smith have this season?  \",\"1\",\"2\",\"0\",\"0\",\"".($demo_start+30*$wait_length)."\")",$sql_connection);
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"Orwin Smith's longest kickoff return this season was?  \",\"61\",\"42\",\"29\",\"29\",\"".($demo_start+31*$wait_length)."\")",$sql_connection);
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"Who has the longest kickoff return for Georgia Tech?  \",\"Orwin Smith\",\"Charles Perkins\",\"Tony Zenon\",\"Tony Zenon\",\"".($demo_start+32*$wait_length)."\")",$sql_connection);
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"Tony Zenon's longest kickoff return was how long?  \",\"80\",\"72\",\"68\",\"72\",\"".($demo_start+33*$wait_length)."\")",$sql_connection);	
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"Georgia Tech's shortest kickoff return was how long?  \",\"6\",\"1\",\"3\",\"6\",\"".($demo_start+34*$wait_length)."\")",$sql_connection);
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"How many times has Justin Moore had his field goal attempt blocked?  \",\"0\",\"2\",\"4\",\"2\",\"".($demo_start+35*$wait_length)."\")",$sql_connection);
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"Out of 11 field gaol attempts, how many has Justin Moore made?  \",\"7\",\"10\",\"9\",\"7\",\"".($demo_start+36*$wait_length)."\")",$sql_connection);
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"When Justin Moore is within 30 yards, what is his percentage?  \",\"90%\",\"100%\",\"96%\",\"100%\",\"".($demo_start+37*$wait_length)."\")",$sql_connection);
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"Justin Moore last 45 yard field goal attempt was blocked, made, or missed?  \",\"Made\",\"Missed\",\"Blocked\",\"Blocked\",\"".($demo_start+38*$wait_length)."\")",$sql_connection);
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"Who has the longest interception return for a touchdown?  \",\"Isaiah Johnson\",\"Rod Sweeting\",\"Jemea Thomas\",\"Isaiah Johnson\",\"".($demo_start+39*$wait_length)."\")",$sql_connection);
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"Georgia Tech's longest interception return for a touchdown?  \",\"45\",\"56\",\"34\",\"34\",\"".($demo_start+40*$wait_length)."\")",$sql_connection);	
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"How many interception returns for touchdowns does Georgia Tech have for the season?  \",\"2\",\"6\",\"3\",\"2\",\"".($demo_start+41*$wait_length)."\")",$sql_connection);		
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"Georgia Techs shortest interception gain was how many yards?  \",\"0\",\"6\",\"1\",\"0\",\"".($demo_start+42*$wait_length)."\")",$sql_connection);	
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"Most interceptions Georgia Tech had in one game this season?  \",\"4\",\"2\",\"1\",\"2\",\"".($demo_start+43*$wait_length)."\")",$sql_connection);
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"How many penalties does Georgia Tech have for the season?  \",\"44\",\"56\",\"42\",\"42\",\"".($demo_start+44*$wait_length)."\")",$sql_connection);
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"How many penalty yeards does Georgia Tech have for the season?  \",\"345\",\"356\",\"355\",\"355\",\"".($demo_start+45*$wait_length)."\")",$sql_connection);			
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"What is the least amount of penalites Georgia Tech had in one game?  \",\"4\",\"6\",\"2\",\"2\",\"".($demo_start+46*$wait_length)."\")",$sql_connection);	
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"What is the most amount of penalites Georgia Tech had in one game?  \",\"5\",\"6\",\"8\",\"8\",\"".($demo_start+47*$wait_length)."\")",$sql_connection);	
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"What is the most penalty yards in one game?  \",\"45\",\"56\",\"63\",\"63\",\"".($demo_start+48*$wait_length)."\")",$sql_connection);	
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"Who leads the team in most tackles for loss? \",\"Jeremiah Attaochu\",\"Julian Burnett\",\"Isaiah Johnson\",\"Jeremiah Attaochu\",\"".($demo_start+49*$wait_length)."\")",$sql_connection);	
	mysql_query("INSERT INTO ".$questions_bank." VALUES (NULL,\"What was the most tackles Julian Burnett had in one game? \",\"8\",\"5\",\"9\",\"9\",\"".($demo_start+50*$wait_length)."\")",$sql_connection);
	mysql_close($sql_connection);
?>

<html>
<head>
<meta http-equiv="refresh" content="1;url=control_panel.html">
</head>
<body></body>
</html>