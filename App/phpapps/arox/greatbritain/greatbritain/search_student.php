<?
include "../includes/config.php";

require_once('classes/tc_calendar.php');
//session_start();
//include "../session_check.php";

$mid=$_SESSION['memid'];
$school=$_SESSION['school'];

//$gquery="select t1.pre_group,t2.es_groupname as group from es_preadmission as t1 join es_groups as t2 on t1.pre_group=t2.es_groupsid and es_preadmissionid=".$mid;
	//echo $gquery;	
//$gres1=mysql_query($gquery);
//$gret1=mysql_fetch_array($gres1);
//echo $ret;
//echo $school;
//echo erid;
//$query1="select * from es_preadmission where es_preadmissionid=".$mid;
//echo $query1;
//$res1=mysql_query($query1);


			$strkeyword=strtolower($_REQUEST['txtfname']);
			$strkeyword1=$_REQUEST['txtlname'];
			$strkeyword2=$_REQUEST['txtclass'];
			
if($strmode="search")
{
		if($strkeyword<>'' && $strkeyword1=='' && $strkeyword2=='' )
		{
			$strselect= "SELECT * FROM  es_preadmission where pre_name ". $fld . " like '$strkeyword%'";
		}
		
		
		elseif($strkeyword=='' && $strkeyword1<>'' && $strkeyword2=='')
		{
			$strselect= "SELECT * FROM es_preadmission where fld_lname like '%".$strkeyword1."%'";
		}
		elseif($strkeyword=='' && $strkeyword1=='' && $strkeyword2<>'')
		{
			$strselect= "SELECT * FROM es_preadmission where pre_class ='".$strkeyword2."'";
		}
		
		
		
		
		elseif($strkeyword<>'' && $strkeyword1=='' && $strkeyword2<>'')
		{
			$strselect= "SELECT * FROM es_preadmission where pre_name like '%".$strkeyword."%' and pre_class ='".$strkeyword2."'";
		}
		
		
		
		elseif($strkeyword=='' && $strkeyword1=='' && $strkeyword2=='')
		{
			 $strselect= "SELECT * FROM es_preadmission ";
		}
 
	
	}

	
else
{
	$strselect="select * from  es_preadmission";
}

//echo $strselect;
$reg1=@mysql_query($strselect);
//echo $query;
 
               /* $pagesize=10;
                $pageid=$_GET['pageid'];
                $totalrecord=mysql_num_rows($reg1);
                $totalpage=(int)($totalrecord/$pagesize);
                if(($totalrecord%$pagesize)!=0){
                $totalpage+=1;
                }
                if(isset($pageid)){
                $start=$pagesize*($pageid-1);
                }
                else{
                $pageid=1;
                $start=0;
                }*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>School</title>

<script language="javascript" src="calendar.js"></script>
<style type="text/css">

<!--
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
	color: #D58309;
}
a:active {
	text-decoration: none;
}
.text{
vertical-align:top;
}
-->
</style>

<link rel="stylesheet" type="text/css" href="sdmenu/sdmenu.css" />
	<script type="text/javascript" src="sdmenu/sdmenu.js">
		/***********************************************
		* Slashdot Menu script- By DimX
		* Submitted to Dynamic Drive DHTML code library: http://www.dynamicdrive.com
		* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
		***********************************************/
	</script>
	<script type="text/javascript">
	// <![CDATA[
	var myMenu;
	window.onload = function() {
		myMenu = new SDMenu("my_menu");
		myMenu.init();
	};
	// ]]>
	</script>
	<style type="text/css">
<!--
.style2 {color: #666666; }
-->
    </style>
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0"  marginheight="0" marginwidth="0">

<table bgcolor="#000000" width="100%"  border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="1%" height="557">&nbsp;</td>
    <td width="775" valign="top"><table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" align="center">
      <!--DWLayoutTable-->
      <tr>
        <td height="20" colspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
          <!--DWLayoutTable-->
            <tr>
           <td><?php include "../header.php";?></td>
              <td></td>
          </tr>
          <tr>
            <td height="2"><img src="file:///D|/spacer.gif" alt="" width="1" height="1" /></td>
                <td></td>
                <td><img src="file:///D|/spacer.gif" alt="" width="3" height="1" /></td>
              </tr>
          </table></td>
        </tr>
      
      <tr>
        <td width="100%" height="391" valign="top"><table style="border:thick 1px solid #8FA819;" width="100%" align="center">
  <form id="frm_search" name="frm_search"  action="search_student.php" method="post">
    <!--DWLayoutTable-->
    
    
    
    <tr>
      <td width="87" height="38"></td>
                  <td colspan="2" align="left" valign="top"><i><b>Student Search </b></i>
                  <hr></td>
                  <td width="91">&nbsp;</td>
                  <td width="255">&nbsp;</td>
                  <td width="147">&nbsp;</td>
                  <td width="151">&nbsp;</td>
                  <td width="32"></td>
              </tr>
    
    <tr>
      <td rowspan="17" valign="top"><?php include "leftmenu.php";?></td>
             
	
                <td width="213" height="14"></td>
                <td width="169"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              <tr>
                <td height="28" valign="top">First Name</td>
                
                <td valign="top">Class</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td></td>
              <tr>
                <td height="26" valign="top"><input name="txtfname" id="txtfname" type="text" size="30" /></td>
                
                <td valign="top"><select name="txtclass" id="txtclass" tabindex="9">
                                    <option value="">Select Class...</option>
                                   <?php
								   $qcl="select es_classesid,es_classname from es_classes order by es_classesid";
								   $rescl=mysql_query($qcl);
								   while($retcl=mysql_fetch_row($rescl))
								   {
									    if($_POST['txtclass']==$retcl[0])
											echo "<option value='".$retcl[0]."' selected>".$retcl[1]."</option>";   
										else
											echo "<option value='".$retcl[0]."'>".$retcl[1]."</option>";   
								   }
								   ?>
                  </select></td>
                <td valign="top"><input type="submit" name="Submit" value="Search" onClick="document.frm_search.action='search_student.php?mode=search';this.form.action.submit();" tabindex="11"/></td>
              <td>&nbsp;</td>
                <td></td>
              <tr>
                <td height="4"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td height="270" colspan="6" valign="top"> <table align="center" cellpadding="0" cellspacing="0" rules="rows" frame="box" width="100%" border="1" bordercolor="#669900" style="border:2.5px solid #EBEBEB">
                  <!--DWLayoutTable-->
                 <tbody><tr>
	      				<?php
	$numrows=mysql_num_rows($reg1);
	//echo $numrows;
	$j=1;
    if($numrows>0)
	 
	{    	
                 if($_REQUEST['mode']=='search')
				  {	 
				   				 
				  
				 
				  ?>
				  	              
                      <td height="21" colspan="2" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                        <td width="283" valign="top" class="releted"><b>Student Name</b></td>
                        <td width="168" valign="top" class="releted"><b>Class</b></td>
                      <td width="253" valign="top" class="releted"><b>Address</b></td> 	                    					              
                       <td width="42">&nbsp;</td>
                       </tr>
			    
		        
				 <?php 
					     
						while($show=@mysql_fetch_array($reg1))
							{
							$name=$show['pre_name'];
							$qu="select * from es_preadmission where pre_name='$name'";
							$resa=@mysql_query($qu);
							$nbwbid=0;
							$nbid=0;
							$i=0;
						    $adid=mysql_result($resa,$i,'es_preadmissionid'); 
							$class=mysql_result($resa,$i,'pre_class');
							$query1="select * from es_classes where es_classesid='".$class."'";
							$res1=mysql_query($query1);
							$showclass=mysql_fetch_array($res1);
							 //$classes=$res1['es_groupname'];
				?>
				
				
	        <tr>
	     
					             
                      <?php /*?><td class="releted_1">&nbsp;<?=//ucwords(strtolower($show['fld_fname'].$show['fld_lname']))?></td><?php */?>
					   <td width="19" height="21" valign="top" class="left-1">&nbsp;</td> 
                     <td width="59" valign="top" class="left-1">&nbsp;<a href="delete_stud.php?sid=<?php echo $adid;?>"><img src="../images/delete.gif" border="0" alt="Delete..." title="Delete ..." /></a></td> 
                       <td valign="top">&nbsp;<?=ucwords(strtolower($show['pre_name']))?></td> 
					    <td  valign="top">&nbsp;<?=$showclass['es_classname']?></td>
                     <td  valign="top">&nbsp;<?=$show['pre_address1']?></td> 
					 
					
					
		  
	                 <td>&nbsp;</td>
	                 </tr>
                    
			      <?php
											
						}
						 ?>
						 
					
						  
                     <tr>
                      <td height="20" colspan="6" align="right" valign="top"><?php
for ($k=1; $k<=$totalpage; $k++){
if ($k==$pageid){
echo "<b>".$k."</b> | ";
}
else{
echo '<a href='.$PHP_SELF.'?pageid='.$k.'&mode=search&st=Client&txtfname='.$_REQUEST['txtfname'].'&txtlname='.$_REQUEST['txtfname'].'&txtadd='.$_REQUEST['txtadd'].'><b>' .$k.'</b></a> | ';
}
}
?>			</TD>
	                  </tr>
			  </tbody>
                
				  <?php
				  
				 }
				 }
			  else
				  {
				  ?>
				 <p><label><?php echo "No Record Found";?></label>&nbsp;</p>
				 <?php
				  }
				 
				 
				  ?>
	
                </table>                </td>
                <td></td>
              </tr>
  </form>
        </table></td>
        <td width="15">&nbsp;</td>
      </tr>
      <tr>
        <td height="78">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
     
      <tr>
        <td height="53" colspan="2" valign="bottom" bgcolor="#B6E9FA"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#00B6DE">
          <!--DWLayoutTable-->
          
          <tr>
            <td width="745" height="35" valign="middle" bgcolor="#279AEB"><div align="center" class="style17">Design &amp; Developed by Hubcity Softwares Pvt. Ltd. </div></td>
              </tr>
          
          </table></td>
        </tr>
     
    </table></td>
    <td width="1%">&nbsp;</td>
  </tr>
</table>
</body>
</html>