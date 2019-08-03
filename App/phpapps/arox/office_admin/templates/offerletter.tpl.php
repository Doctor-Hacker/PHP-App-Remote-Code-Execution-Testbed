<?php
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
			if ($_SESSION['eschools']['schoollogo']!="") { 
			
				$image = displayimage("images/school_logo/".$_SESSION['eschools']['schoollogo'], "120");
			}
			 
				$sel_schools = "SELECT fi_address, fi_email, fi_phoneno, fi_website  FROM `es_finance_master`  ORDER BY `es_finance_masterid` DESC LIMIT 0 , 1"; 
				$school_det  = getarrayassoc($sel_schools);
				$sch_address     = $school_det['fi_address'];
				$sch_phone       = $school_det['fi_phoneno'];
				$sch_email       = $school_det['fi_email'];
				$sch_web         = $school_det['fi_website'];
				$sch_name        = stripslashes($_SESSION['eschools']['schoolname']); 
				
if($_POST['printtctostaff']!='' && isset($_POST['printtctostaff'])){

$count=count($_POST['checkbox']);
$checkbox=$_POST['checkbox'];

for($i=0;$i<$count;$i++)
{	

	$value=$checkbox[$i];
	
	if($value!="")
	{
$emailview =$es_tcmaster ->GetList(array(array("es_tcmasterid", ">", 0)) );
foreach ($emailview as $emailview1){
$randomstring=$emailview1->tcm_description;

$db->update('es_staff',
"tcstatus='issued'", 'es_staffid ='. $value);


}

}
?>
<html>
<head>
<script type="text/javascript">
function PreloadImages() 
{

//alert("hi");
//alert(document.getElementById("count").value);
//alert(document.getElementById("count1").value);
var s1=document.getElementById("count1").value;
var s2=document.getElementById("count").value;
var s3=s2-s1;
var s4=document.getElementById("url").value;
//alert(s3);
if(s3==s2)
{  
	//alert("hi");
	window.print();	
	window.location.href= s4;
	}
	
}

</script>
</head>
<body onLoad="PreloadImages()" style="height:1120px;font:verdana;font-size:8px;letter-spacing:1px">

<table width="100%" border="0" style="height:1120px;letter-spacing:1px">
			<tr>
    					<td width="635" height="100"><table width="100%" border="0">
     			 <tr>
        				<td width="22%" rowspan="2" align="left" valign="top"><?php echo $image; ?></td>
        				<td width="52%" align="left" valign="top"></td>
        				<td width="26%" rowspan="2" align="left" valign="top"><table width="100%" border="0" class="style3">
          		<tr>
            			<td height="80" align="left" valign="top">
						 <address><?php echo $sch_address; ?><br> 
						 <b>Phone</b> :<?php echo $sch_phone; ?> <br>
						 <b>Email</b>: <?php echo $sch_email; ?><br>
						 <b>Web </b>: <?php echo $sch_web; ?><br>
						 </address></td>
          		</tr>
        				</table></td>
      			</tr>
				<tr>
        			<td height="93" align="right" valign="top"><table width="100%" border="0">
          		<tr>
            		<td align="left" valign="top"><span class="style1"><?php echo $sch_name; ?></span></td>
          		</tr>
         		<tr>
            		<td align="right" valign="middle"><span class="style5">&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
          		</tr>
        		</table>          <h4 class="style2">&nbsp;</h4></td>
      </tr>

<tr>
<td colspan="3" height="690" ><?php echo $randomstring ; ?><input type="hidden" name="count" id="count" value="<?php echo $count;  ?>"><input type="hidden" name="count1"  id="count1" value="<?php echo $i; ?>" >
	<input type="hidden" name="url"  id="url" value="?pid=23&action=issuetcstaff" > </td>

</tr>
</table></td></tr></table>

</body>
</html>


<?php
}

}

if($_POST['printtcstudent']!='' && isset($_POST['printtcstudent']))
{

$count=$_POST['count'];
$checkbox=$_POST['checkbox'];

for($i=0;$i<$count;$i++)
{	

	$value=$checkbox[$i];
	
	if($value!="")
	{
$emailview =$es_tcstudent ->GetList(array(array("es_tcstudentid", ">", 0)) );
foreach ($emailview as $emailview1){
$randomstring=$emailview1->tcm_description;

$db->update('es_preadmission',
"pre_status='active'", 'es_preadmissionid ='. $value);


}

}
?>
<html>
<head>
<script type="text/javascript">
function PreloadImages() 
{

//alert("hi");
//alert(document.getElementById("count").value);
//alert(document.getElementById("count1").value);
var s1=document.getElementById("count1").value;
var s2=document.getElementById("count").value;
var s3=s2-s1;
var s4=document.getElementById("url").value;
//alert(s3);
if(s3==s2)
{  
	//alert("hi");
	window.print();	
	window.location.href= s4;
	}
	
}

</script>
</head>
<body onLoad="PreloadImages()" style="height:1120px;font:verdana;font-size:8px;letter-spacing:1px">

	<table width="100%" border="0" style="height:1120px;letter-spacing:1px">
			<tr>
    					<td width="635" height="100"><table width="100%" border="0">
     			 <tr>
        				<td width="22%" rowspan="2" align="left" valign="top"><?php echo $image; ?></td>
        				<td width="52%" align="left" valign="top"></td>
        				<td width="26%" rowspan="2" align="left" valign="top"><table width="100%" border="0" class="style3">
          		<tr>
            			<td height="80" align="left" valign="top">
						 <address><?php echo $sch_address; ?><br> 
						 <b>Phone</b> :<?php echo $sch_phone; ?> <br>
						 <b>Email</b>: <?php echo $sch_email; ?><br>
						 <b>Web </b>: <?php echo $sch_web; ?><br>
						 </address></td>
          		</tr>
        				</table></td>
      			</tr>
				<tr>
        			<td height="93" align="right" valign="top"><table width="100%" border="0">
          		<tr>
            		<td align="left" valign="top"><span class="style1"><?php echo $sch_name; ?></span></td>
          		</tr>
         		<tr>
            		<td align="right" valign="middle"><span class="style5">&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
          		</tr>
        		</table>          <h4 class="style2">&nbsp;</h4></td>
      </tr>


<tr>
<td colspan="3" height="690" ><?php echo $randomstring ; ?>
<input type="hidden" name="count" id="count" value="<?php echo $count;  ?>">
<input type="hidden" name="count1"  id="count1" value="<?php echo $i; ?>" >
<input type="hidden" name="url"  id="url" value="?pid=23&action=issuetcforstudent" >  </td>
</tr>
</table>

</body>
</html>


<?php
}

}


?>