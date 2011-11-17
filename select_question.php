<?php
    session_start();
    Header('Cache-Control: no-cache');
    Header('Pragma: no-cache');
?>
<html>
	<head>
		<script type="text/javascript">
			function timer(timeleft)
			{
				var v = document.getElementById('timer_display');
				if(timeleft == 0)
				{
					window.location = "select_question.php";
				}
				v.innerHTML = timeleft;
				var nexttime = timeleft - 1;
				setTimeout("timer("+nexttime+")",1000);
			}
		</script>
                <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
                <link rel="stylesheet" type="text/css" href="buttons.css">
                <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
                <script type="text/javascript" src="question_sender.js"></script>
	</head>
	<body>
	<?php 
		require "./shared_methods_and_data.php";	
		
                $current_question = get_current_question();
		
		if($current_question[0]=="WAIT")
		{
			//In this case, the time of availability of the next question will be the second element(index 1)
			//in the current question array
			$time_left = $current_question[1] - time()-1 ;
			echo 'Score : '.get_user_result($_SESSION['user_name'])."<br />";
                        echo $_SESSION['last_answer'];
			echo "<br />";
			echo " <p>Please wait <div id=\"timer_display\"></div> seconds until the next question becomes available!</p>";
			echo "<script>setTimeout(\"timer(".$time_left.")\",1000); </script> ";
		}
		elseif ($current_question[0] == "ENDED")
		{
			echo "<script type=\"text/javascript\"> window.location.href=\"display_results.php\";</script>"; 
		}
		else
		{            
            echo "<table width=\"100%\" height=\"100%\">";
            echo "<tr height=\"10%\"><td>";
            echo "<p align=\"center\"> ";
            echo 'Score : '.get_user_result($_SESSION['user_name'])."<br />";
            echo $_SESSION['last_answer'];
			echo "<br />";
			$_SESSION['current_question'] = $current_question[0];
            echo "</p>";
            echo "</td></tr>";
            echo "<tr height=\"40%\"><td>";
            echo "<p align=\"center\"> ".$current_question[0]."</p>";
            echo "</td></tr>";
            echo "<tr height=\"16%\" width=\"100%\"><td>";
            echo "<a href=\"javascript:send_answer('".$current_question[1]."')\" class=\"button orange\">".$current_question[1]."</a>";
            echo "</td></tr>";
            echo "<tr height=\"16%\"><td>";
            echo "<a href=\"javascript:send_answer('".$current_question[2]."')\" class=\"button orange\"> ".$current_question[2]."</a>";
            echo "</td></tr>";
            echo "<tr height=\"18%\"><td>";
            echo "<a href=\"javascript:send_answer('".$current_question[3]."')\" class=\"button orange\"> ".$current_question[3]."</a>";
            echo "</td></tr>";
            echo "</table>";
                        
		}
	
	?>
	</body>
</html>