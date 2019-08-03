<?php
sm_registerglobal('pid', 'action','emsg' ,'st_firstname', 'st_lastname', 'st_dob', 'st_primarysubject', 'st_fatherhusname', 'st_noofdughters', 'st_noofsons', 'st_email', 'st_mobilenocomunication', 'st_examp1', 'st_examp2', 'st_examp3', 'st_borduniversity1', 'st_borduniversity2', 'st_borduniversity3', 'st_year1', 'st_year2', 'st_year3', 'st_insititute1', 'st_insititute2', 'st_insititute3', 'st_position1', 'st_position2', 'st_position3', 'st_period1', 'st_period2', 'st_period3', 'st_pradress', 'st_prcity', 'st_prpincode', 'st_prphonecode', 'st_prstate', 'st_prresino', 'st_prcountry', 'st_prmobno', 'st_peadress', 'st_pecity', 'st_pepincode', 'st_pephoneno', 'st_pestate', 'st_peresino', 'st_pecountry', 'st_pemobileno', 'st_refposname1', 'st_refposname2', 'st_refposname3', 'st_refdesignation1', 'st_refdesignation2', 'st_refdesignation3', 'st_refinsititute1', 'st_refinsititute2', 'st_refinsititute3', 'st_refemail1', 'st_refemail2', 'st_refemail3', 'st_writentest', 'st_technicalinterview', 'st_finalinterview', 'status', 'st_perviouspackage', 'st_basic', 'st_dateofjoining', 'st_post', 'st_department', 'st_remarks', 'intdate', 'image', 'st_username', 'st_newimage', 'st_primarysubject1', 'st_primarysubject2', 'st_newimage', 'submit','st_subject','st_department');

/**
* Only Student or schoool staff  can be allowed to access this page
*/ 
checkuserinlogin();     
/**End of the permissions   **/


	if($action=='viewprofile')
	{			
		//$obj_leavemaster = new es_staff();
		//$staffdetails = $obj_leavemaster->Get($_SESSION['eschools']['user_id']);
		//array_print($studentdetails);
		$staffdetails =  $db->getRow('SELECT * FROM `es_staff` WHERE `es_staffid` = "'.$_SESSION['eschools']['user_id'].'"; '); 
		
		foreach($staffdetails as $k=>$v){
		 if($v==""){$v=" --- ";}
		 $staffdetails[$k] = stripslashes($v); 
		}
	}
	
	if($action=='editprofile')
	{			
		$obj_leavemaster = new es_staff();
		$staffdetails = $obj_leavemaster->Get($_SESSION['eschools']['user_id']);
		if($submit=='Update')
		{	

      $transferfile = "../office_admin/images/staff/";
	
    $transferfile=$transferfile.basename($_FILES["st_newimage"]["name"]);
    $str=date("mdY_hms");
    $new_thumbname = "staff_".$str;
    $file1		  = basename($_FILES["st_newimage"]["name"]);
   $imaged=$transferfile.$new_thumbname.$file1;
   

    if($imaged!="")
     {
    if ($_FILES["st_newimage"]["error"] > 0)
      {

      }
// The "i" after the pattern delimiter indicates a case-insensitive search
if ((preg_match("/JPEG/i", "$imaged")) || (preg_match("/png/i", "$imaged")) || (preg_match("/jpg/i", "$imaged")))
{
if(move_uploaded_file($_FILES["st_newimage"]["tmp_name"],$imaged))
    {
	
		
    }
	else
	{
	$imaged = $image;
	} 
	}
	 }
			/*if(is_uploaded_file($_FILES['st_newimage']['tmp_name'])) 
			{		
				$transferfile = "../office_admin/images/staff/".$_SESSION['eschools']['user_id']."/";
				$transferfile=$transferfile.basename($_FILES["st_newimage"]["name"]);
					if(move_uploaded_file($_FILES["st_newimage"]["tmp_name"],$transferfile))
						{
						}
				$imaged = $_FILES['st_newimage']['name'];
			}
			else
			{
			  $imaged = $image;
			}*/
		 $st_primarysubject = $st_primarysubject1.",".$st_primarysubject2;
		 $db->update('es_staff', "st_firstname ='" . $st_firstname . "', st_lastname ='" . $st_lastname . "', st_dob ='" . $st_dob . "', st_username ='" . $st_username . "', st_primarysubject ='" . $st_primarysubject . "', st_fatherhusname ='" . $st_fatherhusname . "', st_noofdughters ='" . $st_noofdughters . "', st_noofsons ='" . $st_noofsons . "', st_email ='" . $st_email . "', st_pradress ='" . $st_pradress . "', st_prcity ='" . $st_prcity . "', st_prpincode ='" . $st_prpincode . "', st_prstate ='" . $st_prstate . "', st_prcountry ='" . $st_prcountry . "', st_prphonecode ='" . $st_prphonecode . "', st_prresino ='" . $st_prresino . "', st_prmobno ='" . $st_prmobno . "', st_peadress ='" . $st_peadress . "', st_pecity ='" . $st_pecity . "', st_pepincode ='" . $st_pepincode . "', st_pephoneno ='" . $st_pephoneno . "', st_pestate ='" . $st_pestate . "', st_peresino ='" . $st_peresino . "', st_pecountry ='" . $st_pecountry . "', st_pemobileno ='" . $st_pemobileno . "', st_refposname1 ='" . $st_refposname1 . "', st_refposname2 ='" . $st_refposname2 . "', st_refposname3 ='" . $st_refposname3 . "', st_refdesignation1 ='" . $st_refdesignation1 . "', st_refdesignation2 ='" . $st_refdesignation2 . "', st_refdesignation3 ='" . $st_refdesignation3 . "', st_refinsititute1 ='" . $st_refinsititute1 . "', st_refinsititute2 ='" . $st_refinsititute2 . "', st_refinsititute3 ='" . $st_refinsititute3 . "', st_refemail1 ='" . $st_refemail1 . "', st_refemail2 ='" . $st_refemail2 . "', st_refemail3 ='" . $st_refemail3 . "', image ='" . $imaged . "'",'es_staffid =' . $_SESSION['eschools']['user_id']);
				
		 header("Location:?pid=16&action=viewprofile&emsg=2");  
		 exit(); 
		}
		
	}
	
	
	?>