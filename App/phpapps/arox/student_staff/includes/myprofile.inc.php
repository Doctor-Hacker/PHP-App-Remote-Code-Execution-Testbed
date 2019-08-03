<?php
sm_registerglobal('pid', 'action','emsg');
/**
* Only Student or schoool staff  can be allowed to access this page
*/ 
checkuserinlogin();      
/**End of the permissions   **/


	if($action=='viewprofile')
	{			
		
		$studentdetails =  $db->getRow('SELECT * FROM `es_preadmission` WHERE `es_preadmissionid` = "'.$_SESSION['eschools']['user_id'].'"; '); 
		
		foreach($studentdetails as $k=>$v){
		 if($v==""){$v=" --- ";}
		 $studentdetails[$k] = stripslashes($v); 
		}
		
	}
	
	
	?>