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
			//$strkeyword1=$_REQUEST['txtlname'];
			$strkeyword2=$_REQUEST['txtmonth'];
			
if($strmode="search")
{
		if($strkeyword<>'' && $strkeyword1=='' && $strkeyword2=='' )
		{
			$strselect= "SELECT * FROM  es_preadmission where pre_name ". $fld . " like '$strkeyword%'";
		}
		
		elseif($strkeyword=='' && $strkeyword2<>'')
		{
			$strselect= "SELECT * FROM temp_preadmission where pre_month ='".$strkeyword2."'";
		}
		
		
		elseif($strkeyword=='' && $strkeyword2=='')
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
.style10 {
	font-size: 12px;
	font-weight: bold;
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
 <form id="frm_search" name="frm_search"  action="birthdate.php" method="post">

    <!--DWLayoutTable-->
    
    
    
    <tr>
      <td width="67" height="38"></td>
                  <td colspan="2" align="left" valign="top"><i><b>Student Birthday </b></i>
                    <hr></td>
                  <td width="68">&nbsp;</td>
                  <td width="194">&nbsp;</td>
                  <td width="111">&nbsp;</td>
                  <td width="114">&nbsp;</td>
                  <td width="26"></td>
              </tr>
    
    <tr>
      <td rowspan="17" valign="top"><?php include "leftmenu.php";?></td>
             
	
                <td width="165" height="14"></td>
                <td width="165"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              <tr>
                <?php /*?><td height="28" valign="top">First Name</td><?php */?>
                
                <td valign="top">Months</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td></td>
              <tr>
               <?php /*?> <td height="26" valign="top"><input name="txtfname" id="txtfname" type="text" size="30" /></td><?php */?>
                
                <td valign="top"><select name="txtmonth" id="txtmonth" tabindex="9">
                  <option value="">Select Months...</option>
                  <?php
								   $qcl="select fld_mid,fld_months from tbl_months order by fld_id";
								   $rescl=mysql_query($qcl);
								   while($retcl=mysql_fetch_row($rescl))
								   {
									    if($_POST['txtmonth']==$retcl[0])
											echo "<option value='".$retcl[0]."' selected>".$retcl[1]."</option>";   
										else
											echo "<option value='".$retcl[0]."'>".$retcl[1]."</option>";   
								   }
				  ?>
                </select></td>
                <td valign="top"><input type="image" src="../images/search.gif" alt="Search" border="0"  name="Submit" value="Search" onClick="document.frm_search.action='birthdate.php?mode=search';this.form.action.submit();" tabindex="11"/></td>
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
				  	              
                      <td width="77" height="21" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                        <td width="284" valign="top" class="releted"><b>Student Name</b></td>
                        <td width="179" valign="top" class="releted"><b>Date of Birth</b></td>
                      <td width="160" valign="top" class="releted"><b>Class</b></td> 	                    					              
                       <td width="121" valign="top" class="releted"><b>Print</b></td>
                       </tr>
			    
		        
				<?php
  //include "../includes/config.php";
  
  $query="delete FROM temp_preadmission";
  $res=mysql_query($query) or die (mysql_error());
	
  $strqry="select * from es_preadmission";
  $strres=mysql_query($strqry);
			  
		  
  //$cqry="SELECT COUNT(fld_empid) FROM tbl_emp_reg ";
  //$res=mysql_query($cqry);
  //$numrows1=mysql_num_rows($res);
  //$sid=mysql_result($res,'fld_empid');
			//echo $sid;
			  
			  while($strshow=@mysql_fetch_array($strres))
				{
				      
                            $Num_pic = explode("-", $strshow['pre_dateofbirth']);
				
							 $bmonth=$Num_pic[1];
							  $bdate=$Num_pic[2];
							  
			               	
					$insertquery="INSERT INTO temp_preadmission (`pre_serialno`,`pre_student_username`,`pre_student_password`,`pre_dateofbirth`,`pre_fathername`,`pre_mothername`,`pre_fathersoccupation`,`pre_motheroccupation`,`pre_contactname1`,`pre_contactno1`,`pre_contactno2`,`pre_contactname2`,`pre_address1`,`pre_city1`,`pre_state1`,`pre_country1`,`pre_phno1`,`pre_mobile1`,`pre_prev_acadamicname`,`pre_prev_class`,`pre_prev_university`,`pre_prev_percentage`,`pre_prev_tcno`,`pre_current_acadamicname`,`pre_current_class1`,`pre_current_percentage1`,`pre_current_result1`,`pre_current_class2`,`pre_current_percentage2`,`pre_current_result2`,`pre_current_class3`,`pre_current_percentage3`,`pre_current_result3`,`pre_physical_details`,`pre_height`,`pre_weight`,`pre_alerge`,`pre_physical_status`,`pre_special_care`,`pre_class`,`pre_sec`,`pre_name`,`pre_age`,`pre_address`,`pre_city`,`pre_state`,`pre_country`,`pre_phno`,`pre_mobile`,`pre_resno`,`pre_resno1`,`pre_image`,`test1`,`test2`,`test3`,`pre_pincode1`,`pre_pincode`,`pre_emailid`,`pre_fromdate`,`pre_todate`,`status`,`pre_status`,`es_user_theme`,`pre_hobbies`,`pre_blood_group`,`pre_gender`,`admission_status`,`pre_date`,`pre_month`) values ('".$strshow['pre_serialno']."','".$strshow['pre_student_username']."','".$strshow['pre_student_password']."','".$strshow['pre_dateofbirth']."','".$strshow['pre_fathername']."','".$strshow['pre_mothername']."','".$strshow['pre_fathersoccupation']."','".$strshow['pre_motheroccupation']."','".$strshow['pre_contactname1']."','".$strshow['pre_contactno1']."','".$strshow['pre_contactno2']."','".$strshow['pre_contactname2']."','".$strshow['pre_address1']."','".$strshow['pre_city1']."','".$strshow['pre_state1']."','".$strshow['pre_country1']."','".$strshow['pre_phno1']."','".$strshow['pre_mobile1']."','".$strshow['pre_prev_acadamicname']."','".$strshow['pre_prev_class']."','".$strshow['pre_prev_university']."','".$strshow['pre_prev_percentage']."','".$strshow['pre_prev_tcno']."','".$strshow['pre_current_acadamicname']."','".$strshow['pre_current_class1']."','".$strshow['pre_current_percentage1']."','".$strshow['pre_current_result1']."','".$strshow['pre_current_class2']."','".$strshow['pre_current_percentage2']."','".$strshow['	pre_current_result2']."','".$strshow['pre_current_class3']."','".$strshow['pre_current_percentage3']."','".$strshow['pre_current_result3']."','".$strshow['pre_physical_details']."','".$strshow['pre_height']."','".$strshow['pre_weight']."','".$strshow['pre_alerge']."','".$strshow['pre_physical_status']."','".$strshow['pre_special_care']."','".$strshow['pre_class']."','".$strshow['pre_sec']."','".$strshow['pre_name']."','".$strshow['pre_age']."','".$strshow['pre_address']."','".$strshow['pre_city']."','".$strshow['pre_state']."','".$strshow['pre_country']."','".$strshow['pre_phno']."','".$strshow['pre_mobile']."','".$strshow['pre_resno']."','".$strshow['pre_resno1']."','".$strshow['pre_image']."','".$strshow['test1']."','".$strshow['test2']."','".$strshow['test3']."','".$strshow['pre_pincode1']."','".$strshow['pre_pincode']."','".$strshow['pre_emailid']."','".$strshow['pre_fromdate']."','".$strshow['pre_todate']."','".$strshow['status']."','".$strshow['pre_status']."','".$strshow['es_user_theme']."','".$strshow['pre_hobbies']."','".$strshow['pre_blood_group']."','".$strshow['pre_gender']."','".$strshow['admission_status']."','".$bdate."','".$bmonth."')";
$insertresult=mysql_query($insertquery) or die (mysql_error());
             
				  }
  
		 
			  ?>
			
				
				
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
					   <td height="21" valign="top" class="left-1">&nbsp;</td> 
                     <td valign="top">&nbsp;<?=ucwords(strtolower($show['pre_name']))?></td> 
					    <td  valign="top">&nbsp;<?=$show['pre_dateofbirth']?></td>
                     <td  valign="top">&nbsp;<?=$showclass['es_classname']?></td> 
					
		  
	                 
					  <td><a href="birthday_wish.php?name=<?=$show['pre_name'];?>&dob=<?=$show['pre_dateofbirth'];?>" onClick="window.location.href='birthday_wish.php?name<?=$show['pre_name'];?>'" class="style10">Send Card</a></td>
	                 </tr>
					 
			      <?php
											
						}
						 ?>
						 
					
						  
                     <tr>
                      <td height="21" colspan="5" align="right" valign="top"><?php
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