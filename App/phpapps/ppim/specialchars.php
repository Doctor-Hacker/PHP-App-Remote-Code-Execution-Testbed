<?php
function specialchars($input)
{
 $temp = stripslashes($input);
 $temp = ereg_replace('"', '\"',$temp);
 return $temp;
}
?>