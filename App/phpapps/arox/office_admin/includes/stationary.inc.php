<?php
sm_registerglobal('pid','action','submit','ids','class_id','student_id','invioce_no','emsg');

/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
$catergory_count_sql="SELECT COUNT(*) FROM es_in_category WHERE status ='active'";
$category_count=$db->getOne($catergory_count_sql);

$catergory_sql="SELECT es_in_categoryid, in_category_name FROM es_in_category WHERE status ='active'";
$category_list=$db->getRows($catergory_sql);

//Classes
$class_sql="SELECT es_classesid, es_classname FROM es_classes";
$class_res=$db->getRows($class_sql);
if(isset($submit) && $submit!= '')
{
if(!isset($class_id) || $class_id=='')
{
$errormessage[0]="Select Class";
}
if(!isset($student_id) || $student_id=='')
{
$errormessage[1]="Select Student";
}
if(!isset($invioce_no) || $invioce_no=='')
{
$errormessage[2]="Enter Invoice Number";
}
$m=0;
	for($k=0;$k<$category_count;$k++)
	{
	if(count($_POST['cat'.$k.'_select'])==0)
	{
	$m++;
	}
	
			if(is_array($_POST['cat'.$k.'_select']) && count($_POST['cat'.$k.'_select'])>0)
			{
				foreach($_POST['cat'.$k.'_select'] as $in=>$v)
				{
					if($_POST['cat'.$k.'_pcs'][$v]=='')
					{
					$errormessage[$_POST['cat'.$k.'_pcs'][$v]]='Enter Quantity';
					
					}
					
			    }
		   }
	}
	if($m==$category_count)
	{
	$errormessage[3]='Atleast One Item Under Stationary';
	}

 if(count($errormessage)==0)
 {
 for($k=0;$k<$category_count;$k++)
	{
	
			if(is_array($_POST['cat'.$k.'_select']) && count($_POST['cat'.$k.'_select'])>0)
			{
				foreach($_POST['cat'.$k.'_select'] as $in=>$v)
				{
					if($_POST['cat'.$k.'_pcs'][$v]!='')
					{
					$total[$v]=$_POST['cat'.$k.'_pcs'][$v]*$_POST['cat'.$k.'_cost'][$v];
					$each_cost[$v]=$_POST['cat'.$k.'_cost'][$v];
					$quantity[$v]=$_POST['cat'.$k.'_pcs'][$v];
					}
					
			    }
		   }
	
}
$_SESSION['total']=$total;
$_SESSION['quantity']=$quantity;
$_SESSION['each_cost']=$each_cost;
$_SESSION['class']=$class_id;
$_SESSION['student']=$student_id;
$_SESSION['invoice_no']=$invioce_no;
//array_print($_SESSION['total']);
//array_print($_SESSION['quantity']);
$grand_totla=array_sum($total);
header('location: ?pid=101');
exit;
}
}
?>