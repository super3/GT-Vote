/* 
 * Requires jQuery to work
 */

function send_answer(choice)
{
    $.get("check_answer.php", { answer: choice } );
    window.location.href="dummy_redirect.html";
}
