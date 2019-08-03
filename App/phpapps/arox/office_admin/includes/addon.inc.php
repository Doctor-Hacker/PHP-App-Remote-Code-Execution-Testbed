<?php

sm_registerglobal('pid','emsg','title','link','v_admin','v_staff','v_n_staff','v_student','submit_addon','action','start','addon_id','hidden_id','hidden_image','image');
//$vlc = new FormValidation();	
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
		header('location: ./?pid=1&unauth=0');
		exit;
	}

if($action=='delete_image')
{
$del_img=$db->getRow("SELECT * FROM es_addon_modules WHERE addon_id='".$addon_id."' ORDER BY addon_id DESC");
unlink('images/link_images/'.$del_img['image']);
$db->update('es_addon_modules',"image=''",'addon_id='.$addon_id);
header('location: ?pid=93&action=edit&addon_id='.$addon_id.'&start='.$start);
exit;
}


if($action=='delete')
{
$del_img=$db->getRow("SELECT * FROM es_addon_modules WHERE addon_id='".$addon_id."' ORDER BY addon_id DESC");
unlink('images/link_images/'.$del_img['image']);
$db->delete('es_addon_modules','addon_id='.$addon_id);
header('location: ?pid=93&action=list&emsg=3&start='.$start);
	exit;
}





if(isset($submit_addon) && $submit_addon!="")

{

if($title=='')
{
$errormessage[0]='Enter Title';
}
if($link=='')
{
$errormessage[1]='Enter Link';
}
if($_FILES['image']['tmp_name']!=""){
	$file_ext = fileextension($_FILES['image']['name']);
	$allowed_format = array("jpg","jpeg","png","gif","JPG","JPEG");
	if(!in_array($file_ext,$allowed_format)){
		$errormessage[2]='Enter valid Image';
	}

}
     if(count($errormessage)==0)
	{
	
	     if(!isset($v_admin) || $v_admin!='Y')
			{
			$v_admin='N';
			}
			if(!isset($v_staff) || $v_staff!='Y')
			{
			$v_staff='N';
			}
			if(!isset($v_n_staff) || $v_n_staff!='Y')
			{
			$v_n_staff='N';
			}
			if(!isset($v_student) || $v_student!='Y')
			{
			$v_student='N';
			}
			
			if($_FILES['image']['name']!=""){
			//$image = uploadanyfile("image","images/link_images");
				
			$ext=explode(".",$_FILES['image']['name']);
			$str=date("YmdHis").rand(5, 15);
			$new_thumbname =$ext[0]."_".$str.".".$extention;
			$updir = "images/link_images/";
			$uppath = $updir.$new_thumbname;
			move_uploaded_file($_FILES['image']['tmp_name'],$uppath);
			$image=$new_thumbname;
			}elseif($hidden_image!=""){
			$image  = $hidden_image;
			}else{
			$image = "";
			}
			if(isset($hidden_id) && $hidden_id>=1){
				$db->update("es_addon_modules",
								"title='".$title."',
								 link='".$link."',
								 v_student='".$v_student."',
								 v_n_staff='".$v_n_staff."',
								 v_staff='".$v_staff."',
								 v_admin='".$v_admin."',
								 image='".$image."'","addon_id=".$addon_id);
			
			header('location:?pid=93&action=list&emsg=2');
			exit;
			
			}else{
			
				$links_array=array('title'=>$title,'link'=>$link,'image'=>$image,'v_student'=>$v_student,'v_n_staff'=>$v_n_staff,'v_staff'=>$v_staff,'v_admin'=>$v_admin,'created_by'=>$_SESSION['eschools']['admin_id'],'created_on'=>date('Y-m-d'));
				$links_array = stripslashes_deep($links_array);
				
				$db->insert("es_addon_modules",$links_array);
				header('location: ?pid=93&action=list&emsg=1');
				exit;
			
			
			}
	     
	}



}



if($action=='edit')
{
$qurey="SELECT * FROM es_addon_modules WHERE addon_id='".$addon_id."' ORDER BY addon_id DESC";
$list_edit=$db->getRow($qurey);
//array_print($list_edit);
$title=$list_edit['title'];
$link=$list_edit['link'];
$v_admin=$list_edit['v_admin'];
$v_staff=$list_edit['v_staff'];
$v_n_staff=$list_edit['v_n_staff'];
$v_student=$list_edit['v_student'];
$image1=$list_edit['image'];
}




if($action=='list')
{


$qurey="SELECT * FROM es_addon_modules ORDER BY addon_id DESC";
$num_rows=sqlnumber($qurey);
if(!isset($start) || $start==""  || $num_rows<$start){$start=0;}
$q_limit=10;
$qurey.=" LIMIT ".$start.",".$q_limit;
$list_addon=$db->getRows($qurey);
//array_print($list_addon);

}



?>