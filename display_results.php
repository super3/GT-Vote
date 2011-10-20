<?php
	session_start();
        require './shared_methods_and_data.php';
	echo "<html><head>";
        echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no\">";
        echo "</head>";
        echo "<body>";
	
	$my_result = get_user_result($_SESSION["user_name"]);
	
	if( $my_result == $winner_score)
	{
		echo "<img src = \"http://dl.dropbox.com/u/12312508/New%20Bitmap%20Image.bmp\" />";
                echo "You WON! Take the above QR code to get your Prize :)";
	}
	else 
	{
		echo "You lost this competition. Try your luck next game!";
	}
        echo "</body>";
        echo "</html>";
?>