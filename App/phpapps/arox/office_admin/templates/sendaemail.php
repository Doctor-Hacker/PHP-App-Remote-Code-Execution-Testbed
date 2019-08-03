<style>
.subhead{

font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:14px;
font-weight:bold;
text-transform:uppercase;
}
.narmal{
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:12px;
}
.error{
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:11px;
color:#FF0000;
}
.bgcolor_02{
	background-color:#D3D3D3;
	border:0 none;
	color:#000000;
	font-family:Tahoma;
	font-size:12px;
	font-weight:bold;
	text-transform:uppercase;
}

</style>
<?php

include("../../includes/constants.inc.php");
//include("includes/functions.inc.php");
$connect = mysql_connect(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD);
mysql_select_db(DB_DATABASE, $connect);


// Replace you@example.com with your own e-mail address.  
   define('YOUR_EMAIL', 'suresh@fininfocom.com');  
    
  // If the user does not fill in a subject, this will be used.  
  define('DEFAULT_SUBJ', 'A message from your contact form');  
    
  // This is the maximum length of a subject, in characters.  
  define('MAX_SUBJ_LEN', 1000);  

     
  if (isset($_POST['sendemail'])) {  
       $errors = array();  
        
       // Sanitize the subject;  
      if (preg_match('/(%0A|%0D|\\n+|\\r+)/i', $_POST['txt_subject'])) {  
          $errors[] = 'Your subject contains illegal characters.';  
      } else {  
           if (!strlen($_POST['txt_subject']) || is_null($_POST['txt_subject'])) {  
              $subj = DEFAULT_SUBJ;  
           } else {  
               $subj = substr($_POST['txt_subject'], 0, MAX_SUBJ_LEN);  
          }  
      }  
       
       // Validate their e-mail address.  
       if (!preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i', $_POST['txt_to'])) {  
           $errors[] = 'Invalid e-mail address.';  
       }  
            
         
       // Validate the body.  
       if (preg_match('/(%0A|%0D|\\n+|\\r+)(content-type:|to:|cc:|bcc:)/i', $_POST['txt_content'])) {  
           $errors[] = 'Your message body contains invalid characters.';  
       }  
      if (!strlen($_POST['txt_content'])) {  
           $c[] = 'The body of your message was blank.';  
      }  
    
     if (count($errors)) {  
           for ($i = 0; $i < count($errors); $i++) {  
              printf('<div class="error">%s</div>', $errors[$i]);  
           }  
      } else {  
           $headers = sprintf("From: %s\r\n", $_POST['txt_to']);  
          if (mail($_POST['txt_to'], $subj, $_POST['txt_content'], $headers)) {  
               print '<p>Your message was sent.</p>';  
           } else {  
              print '<p>An error occurred while we were attempting to'  
                   .' send your message. Please try again later.</p>';  
         }  
       }  
  }  
  
?>
				
				
<span class="subhead"></span>            
<table width="80%" height="177" border="0" cellpadding="0" cellspacing="0" >
<tr style="background-color:#D3D3D3;"><td class="subhead" colspan="3">&nbsp;Compose Mail</td></tr>
<tr ><td  height="10px"colspan="3"></td></tr>
<?php
$query="SELECT *FROM `es_classifieds` where es_classifiedsid='".$_GET['sid']."'";
				$desc = mysql_query($query);
				
				while($descrption=mysql_fetch_array($desc))
				{			
?>
<form action="" method="post" >
  <tr>
    <td width="28%" align="left" valign="top" class="narmal">To(Email Id)</td>
    <td width="3%" align="center" valign="top">:</td>
    <td width="69%" align="left" valign="top"><input type="text" name="txt_to"  />
	<div><font color="#FF0000"><?php if(isset($error_email)&&$error_email!="") echo $error_email;?></font></div>
	</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="narmal">Subject</td>
    <td width="3%" align="center" valign="top">:</td>
    <td align="left" valign="top" ><input type="text" name="txt_subject" />
	<div><font color="#FF0000"><?php if(isset($error_subject)&&$error_subject!="")echo $error_subject;?></font></div>
	</td>
  </tr>
  <tr>
    <td align="left"  valign="top" class="narmal">Description</td>
    <td width="3%" align="center" valign="top">:</td>
    <td align="left" valign="top" >
	<textarea  name="txt_content" id="txt_content"cols="45" rows="15"> <?php echo $totaldescription=$descrption['cfs_details'];?></textarea></td>
  </tr>
  <tr>
  <td>&nbsp;</td><td>&nbsp;</td>
    <td align="center" ><p>&nbsp;
      </p>
      <p>
	    <input type="submit" name="sendemail" id="sendemail" value="Send" class="bgcolor_02" style="cursor:pointer;"/>
        <input name="Close"  onclick="javascript:window.close();" type="button" value="Close" class="bgcolor_02" style="cursor:pointer;" />
      </p></td>
  </tr>
  </form>
</table>
<?php
}
?>

