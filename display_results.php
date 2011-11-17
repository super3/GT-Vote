<?php
	session_start();
    require './shared_methods_and_data.php';
	echo "<html>";
    echo "<head><meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no\"></head>";
    echo "<body>";
	
	$my_result = get_user_result($_SESSION["user_name"]);
	if( $my_result == $winner_score)
	{
		echo "<div style='text-align:center;'>";
		echo "<img src='http://qrcode.kaywa.com/img.php?s=8&d=User%20has%20won%20a%20free%20meal.%20Promo%20code%204F3S9.' alt='qrcode'  />";
        echo "You WON! Take the above QR code to get your Prize :)";
        echo "</div>";
	}
	else 
	{
		echo "You lost this game. Try your luck next game!";
	}
	
    echo "</body>";
    echo "</html>";
?>