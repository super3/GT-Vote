<?php
	session_start();
        Header('Cache-Control: no-cache');
        Header('Pragma: no-cache');
        
        require "./shared_methods_and_data.php";
	
        
	if (is_answer_correct_and_in_time($_SESSION['current_question'],$_GET['answer']))
	{
		add_points_for_user($_SESSION['user_name']);
		$_SESSION['last_answer']="You got the last question";
	}
	else 
	{
		$_SESSION['last_answer']="Opps! No points for that last one :(";
	}
	echo "<html><head>";
        echo "<meta http-equiv=\"refresh\" content=\"1;url=select_question.php\">";
        echo "</head><body></body></html>";
	
?>