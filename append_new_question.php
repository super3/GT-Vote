<?php
    session_start();
    
    require "./shared_methods_and_data.php";
    
    copy_question_like($_GET['question_type']);
    
?>