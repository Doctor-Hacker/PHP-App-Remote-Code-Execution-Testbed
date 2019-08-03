<?php
$newline = "\r\n";	

if (isset($_POST["submitnotes"]))
{  
   if (isset($_POST["notes"]))
   {
   	  $notes = stripslashes($_POST["notes"]);
	  $notes = ereg_replace('"', '\"',$notes);
	  $notes = '"'. $notes . '";';
   }
   else
   {
   	  $notes = '"";';
   }
   $title = stripslashes($_POST['title']);
   $title = ereg_replace('"', '\"',$title);
   $title = '"'. $title . '";';
   $line1 = '<?php'.$newline;
   $line2 = '$title='.$title.$newline;
   $line3 = '$notes='.$notes.$newline;
   $line4 = '?>';
   $out2file = $line1.$line2.$line3.$line4;
   $oldfile = $_POST['oldfile'];
   if ($oldfile != "new")
   {
   	  $temp = "notes/".$oldfile;
	  unlink($temp);
   }
   $temp = "notes/". time() . ".note";
   $gp = fopen($temp,'w');
   fwrite($gp, $out2file);
   fclose($gp);
}
if (isset($_GET['del']))
{
   $notefile = $_GET['id'];
   $temp = "notes/" . $notefile;
   unlink($temp);
   print '<script>';
   print 'location.replace("notes.php")';
   print '</script>';

}
?>
<?php require("templates/header.html"); ?>
<script>
function delcheck()
{
 	if (confirm("Do you want to delete this note?"))
	{
	   return true;
	}
	else
	{
	   return false;
	}
}
function checkvalues() 
{
		 var f= document.notes.title;
		 var text = f.value;
		 if (text == null || text.lenght==0 || text == "")
		 {
		 	alert ("You must provide a title!");
			return false;
		 }
}
</script>

</head>
<body>
<?php require("templates/menu.html"); ?>
<div id="frame_middle">
	 <div id="frame_top_line">
	 </div>
	 <div id="frame_left">
<!-- ***************** Left Side  ***************** -->  
	 	<div id="groups">
			 <h2>Notes</h2>
			 <br />
			 <?php

			 $pattern = "notes/" . "*.note";
			 foreach(glob($pattern) as $contact_files)
 			 {
			  	$contacts[] = basename($contact_files);
 			 }
 			 if (!empty($contacts))
 			 {
  			  	for ($i=0; $i<count($contacts); $i++)
  			 	{
   			 	 	$name = ereg_replace(".notes", "",$contacts[$i]);
   			 		$req = "notes/". "$contacts[$i]";
   			 		require($req);
   			 		print '<a href="notes.php?id='."$contacts[$i]" .'">'."$title".'</a><br />';
  			   }
 			 }
			 ?>
			 <br /><a href="notes.php?id=new&mode=edit">New Note</a>
		</div>
	 </div>

<!-- ***************** Right Side  ***************** -->  
	 <div id="frame_right">
<?php
	 if (isset($_GET["mode"]))
	 {
	  	if ($_GET["mode"]=="edit")
		{
		 if (isset($_GET['id']))
		 {
		  	$notefile = $_GET['id'];
			if ($notefile == "new")
			{
			 $title = "";
			 $notes = "";
			}
			else
			{
			 $temp = "notes/" . $notefile;
			 require($temp);
			}
		 	print '<form name="notes" action="notes.php" onsubmit="return checkvalues()" method="post">';
		 	print 'Title: <input type="text" name="title" size="74" value="'."$title".'"/>';
			print '<textarea name="notes" rows="19" cols="60">';
		 	print "$notes";
		 	print '</textarea>';
			print '<input type="hidden" name="oldfile" value="'."$notefile".'" />';
		 	print '<input type="submit" name="submitnotes" value="Save"/>';
		 	print ' <input type="reset" name="reset" value="Reset"/>';
		 	print ' <input type="button" name="cancel" value="Cancel" onclick="history.back()"/>';
		 	print '</form>';
		 }
		}
	 }
	 else
	 {
	  	 if(isset($_GET['id']))
		 {
		  	$notefile = $_GET['id'];
			$name = ereg_replace(".notes", "",$notefile);
			$temp = "notes/" . $notefile;
			require($temp);
	 	 	print "<h2>$title</h2>";
			print nl2br($notes);
			print "<br /><br />";
			print "<p>Last Modified on:";
			print date('m-d-Y g:ia',$name)." Server Time</p>";
			print "<a href=\"notes.php?mode=edit&id=$notefile\">Edit</a> &nbsp;&nbsp;&nbsp;";
			print "<a href=\"notes.php?del=1&id=$notefile\" onclick=\"return delcheck()\">Delete</a>";
		}
	 }
?>				  
	 </div>  
</div>
</div>
<div id="frame_bottom">
</div>
<?php require('templates/footer.html');?>