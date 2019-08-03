<?php

if (isset($_POST["submitemail"]))
{
   $to = $_POST["to"];
   $from = $_POST["from"];
   $subject = stripslashes($_POST["subject"]);
   $message = stripslashes($_POST["message"]);
   $from = "From:".$from;
   mail($to,$subject,$message,$from);
   print '<script>
   		 alert ("Message Sent");
		 window.location="email.php";
		 </script>';
}
?>