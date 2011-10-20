<?php
	$sql_user_name='betsegaw_betse';
	$sql_password='servant1';
	$db_name = 'betsegaw_trivia';
	$results_table = 'results_table';
	$questions_table = 'questions_table';
	$init_result = 0;
	$question_validity_time = 30; //Make sure that the questions in the table are atleast <-- far apart in time
	$winner_score = 100000;
	$points_per_question = 2;
        $questions_bank = "question_bank";
	// Creats the user name using the provided Ip Address
	function generate_user_name($ip)
	{
		return md5($ip);
	}
	
	//Retrieves the current users IP Address 
	function get_current_user_ip()
	{
		$ip = session_id();
		
		return $ip;
	}
	
	//Takes the data stored in the session variable and creates a user with
	//results
	function create_user($user_name)
	{
		//Import variables
		global $sql_user_name;
		global $sql_password;
		global $db_name;
		global $results_table;
		global $questions_table;
		global $init_result;
		global $question_validity_time;
		//Connect to the MYSQL Server
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
		mysql_query("CREATE TABLE ".$results_table."(user_id int NOT NULL AUTO_INCREMENT,PRIMARY KEY(user_id),user_name varchar(255),user_result varchar(255))",$sql_connection);
		
		//Inserts the information into the given Table
		mysql_query("INSERT INTO ".$results_table." VALUES (NULL,\"".$user_name."\",\"".$init_result."\")",$sql_connection);
		
		mysql_close($sql_connection);
		
		
	}

	//returns the currently active question
	//TODO: Consider changing the way the questions change
	function get_current_question()
	{
		//Import variables
		global $sql_user_name;
		global $sql_password;
		global $db_name;
		global $results_table;
		global $questions_table;
		global $init_result;
		global $question_validity_time;
		global $_SESSION;
		
		//Connect to the MYSQL Server
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
		
		$all_the_questions = mysql_query("SELECT * FROM ".$questions_table,$sql_connection);
		$current_time = time();
		$current_question = array("WAIT",(time()+15),"","");
		
                while($row = mysql_fetch_array($all_the_questions))
		{
			
			if($row['question'] == "ENDED")
                        {
                            $current_question = array("ENDED","","","");
                            break;
                        }
                        if( $current_time > $row['start_time'] && ($current_time - $row['start_time']) <= $question_validity_time)
			{
                                //The first condition is to make sure that the first available question is the one picked
                                //check to make sure that the question is not the old one picked before
                                //(since the user might go to the next question before the time ends.
				if($current_question[0] == "WAIT" && $row[1]!=$_SESSION['current_question'])
                                {
                                    $current_question = array($row['question'],$row['choice_1'],$row['choice_2'],$row['choice_3']);
                                }  
			}
			if(isset($min_waiting_time))
                        {
                            if($row['start_time'] < $min_waiting_time  && $row['start_time'] > $current_time)
                            {
                                    $min_waiting_time = $row['start_time'];
                            }
                        }
                        elseif ($row['start_time'] > $current_time)
                        {
                            $min_waiting_time = $row['start_time'];
                        }
		}
		$row = NULL;
			
		mysql_close($sql_connection);
                
                if(isset($min_waiting_time))
                {
                    $min_waiting_time = $min_waiting_time + 3; // To stop it from asking for a question too fast
                    if($current_question[0] == "WAIT")
                    {
			$current_question[1] = $min_waiting_time;
                        return $current_question;
                    }
                    
                }
                
                return $current_question;
		
        }
	
	//Searchs a given SQL table
	function search_sql_table( $table_name, $column, $search_term)
	{
		//Import variables
		global $sql_user_name;
		global $sql_password;
		global $db_name;
		global $results_table;
		global $questions_table;
		global $init_result;
		global $question_validity_time;
	
		//Connect to the MYSQL Server
		$sql_connection = mysql_connect("localhost",$sql_user_name,$sql_password);
	
		if(!$sql_connection)
		{
			die("MySQL error :".mysql_error());
		}
	
		//Select the database that we will be working with
		mysql_select_db($db_name,$sql_connection);
	
		//Get the user information
		$result = mysql_query("SELECT * FROM ".$table_name." WHERE ".$column." LIKE '%".$search_term."%'");
	
		mysql_close($sql_connection);
	
		return $result;
	}
	
	function get_entire_table($table_name)
	{
		//Import variables
		global $sql_user_name;
		global $sql_password;
		global $db_name;
		global $results_table;
		global $questions_table;
		global $init_result;
		global $question_validity_time;
		
		//Connect to the MYSQL Server
		$sql_connection = mysql_connect("localhost",$sql_user_name,$sql_password);
		
		if(!$sql_connection)
		{
			die("MySQL error :".mysql_error());
		}
		
		//Select the database that we will be working with
		mysql_select_db($db_name,$sql_connection);
		
		//Get the user information
		$result = mysql_query("SELECT * FROM ".$table_name);
		
		mysql_close($sql_connection);
		
		return $result;
	}
	
	//Boolean return
	function is_answer_correct_and_in_time($question,$attempt)
	{
		//Import variables
		global $sql_user_name;
		global $sql_password;
		global $db_name;
		global $results_table;
		global $questions_table;
		global $init_result;
		global $question_validity_time;
		
		$answer_row = search_sql_table($questions_table,"question",$_SESSION['current_question']);
		$answer = mysql_fetch_array($answer_row);
		
		
		if ( $answer['correct_choice'] == $attempt )
		{
			$time_left = time() - $answer['start_time'] ;
			
			if($time_left > 0 && $time_left < $question_validity_time)
			{
				return true;
			}
			
		}
		return false;
	}
	
	//Returns the user score
	function get_user_result($user)
	{
		//Import variables
		global $sql_user_name;
		global $sql_password;
		global $db_name;
		global $results_table;
		global $questions_table;
		global $init_result;
		global $question_validity_time;
		
		$row = mysql_fetch_array(search_sql_table($results_table, "user_name", $user));
		return  $row['user_result'];
		
	}
	
	//updates the SQL table
	function update_sql_table($table_name, $search_column, $search_term, $update_column , $update_term)
	{
		//Import variables
		global $sql_user_name;
		global $sql_password;
		global $db_name;
		global $results_table;
		global $questions_table;
		global $init_result;
		global $question_validity_time;
		
		//Connect to the MYSQL Server
		$sql_connection = mysql_connect("localhost",$sql_user_name,$sql_password);
		
		if(!$sql_connection)
		{
			die("MySQL error :".mysql_error());
		}
		
		//Select the database that we will be working with
		mysql_select_db($db_name,$sql_connection);
		
		//Get the user information
		$result = mysql_query("UPDATE ".$table_name." SET ".$update_column."=\"".$update_term."\""." WHERE ".$search_column."=\"".$search_term."\"");
		mysql_close($sql_connection);
		
		return $result;
	}
	
	//Adds the predefined amounts of points
	function add_points_for_user($user_name)
	{
		//Import variables
		global $sql_user_name;
		global $sql_password;
		global $db_name;
		global $results_table;
		global $questions_table;
		global $init_result;
		global $question_validity_time;
		global $points_per_question;
		
		
		
		update_sql_table($results_table, "user_name",$user_name,"user_result",(get_user_result($user_name)+$points_per_question));
	}
        
        function copy_question_like( $term )
        {
            //Import variables
            global $sql_user_name;
            global $sql_password;
            global $db_name;
            global $results_table;
            global $questions_table;
            global $init_result;
            global $question_validity_time;
            global $points_per_question;
            global $questions_bank;
            
            $result = search_sql_table($questions_bank,'question',$term);
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
            mysql_query("CREATE TABLE ".$questions_table."(question_id int NOT NULL AUTO_INCREMENT,PRIMARY KEY(question_id),question varchar(255),choice_1 varchar(255),choice_2 varchar(255),choice_3 varchar(255),correct_choice varchar(255),start_time varchar(255))",$sql_connection);
            //END DEBUG CODE
            
            
            if(!$result) 
            {
                echo "No questions Available From that Catagory";
                return;
            }
            $row = mysql_fetch_array($result);
            if($row['question']=='')
            {
                echo "No questions Available From that Catagory";
                return;
            }
            mysql_query("INSERT INTO ".$questions_table." VALUES (NULL,\"".$row['question']." \",\"".$row['choice_1']."\",\"".$row['choice_2']."\",\"".$row['choice_3']."\",\"".$row['correct_choice']."\",\"".(time()+10)."\")",$sql_connection);
            //DEBUG CODE
            echo "Question '".$row['question']."' with the correct answer '".$row['correct_choice']."' inserted";
            update_sql_table($questions_bank,'question',$row['question'],'question','');
            return;
        }
?>