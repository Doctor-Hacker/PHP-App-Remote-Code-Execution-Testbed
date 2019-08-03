<?php
ob_start();
include "../includes/config.php";
//$adid=$_POST['txtadmin'];
if($_FILES['txtdocname']['name']=="")
{
	//header("location:import_stud.php");
	echo "<script>window.location='import_stud.php'</script>";
}


function func_date_conversion($date_format_source, $date_format_destiny, $date_str){
/*
    To Convert Any Date Format to any other Date Format
    Use Like:
        $df_des = 'Y-m-d H:i';
        $df_src = 'd/m/Y H:i A';
        echo func_date_conversion( $df_src, $df_des, '10/11/2008 03:34 PM');
*/
    $base_format     = preg_split('/[:\/.\ \-]/', $date_format_source);
    $date_str_parts = preg_split('/[:\/.\ \-]/', $date_str );
    $date_elements = array();
    /*echo "<pre>";
        print_r($base_format);
    echo "</pre>";*/

    $p_keys = array_keys( $base_format );
    foreach ( $p_keys as $p_key )
    {
        if ( !empty( $date_str_parts[$p_key] ))
        {
            $date_elements[$base_format[$p_key]] = $date_str_parts[$p_key];
        }
        else
            return false;
    }

    if (array_key_exists('M', $date_elements)) {
        $Mtom=array(
            "Jan"=>"01",
            "Feb"=>"02",
            "Mar"=>"03",
            "Apr"=>"04",
            "May"=>"05",
            "Jun"=>"06",
            "Jul"=>"07",
            "Aug"=>"08",
            "Sep"=>"09",
            "Oct"=>"10",
            "Nov"=>"11",
            "Dec"=>"12",
        );
        $date_elements['m']=$Mtom[$date_elements['M']];
    }

    $dummy_ts = mktime($date_elements['H'], $date_elements['i'], $date_elements['s'], $date_elements['m'], $date_elements['d'], $date_elements['Y'] );

    return date( $date_format_destiny, $dummy_ts );
}



//echo $_POST['btnsubmit'];
//session_start();
//include "session_check.php";
//$adminid=$_SESSION['adminid'];
//$link=mysql_connect("localhost","root","") or die("Problem with Connection");
//mysql_select_db("online_exam") or die("problem with database selection");
error_reporting(0);

//coding of uploading excel file
if($_POST['btnsubmit']!="")
{

	/*foreach($_FILES['txtdocname'] as $txtdocname)
	{
	 $txtdocname;
	}*/
	//echo $txtdocname;
	$txtdocname=$_FILES['txtdocname']['name'];

///////////////////////////Xcel File Opening////////////
	if(!empty($txtdocname))
	{

		if($txtdocname!= "")
		{

			$file1= $_FILES['txtdocname']['name'];
			$tmpfile1  = $_FILES['txtdocname']['tmp_name'];
			$fileSize = $_FILES['txtdocname']['size'];
			list($pic1,$pic2)= explode(".",$file1);
			$filepath1 = "upload_data/".$file1;
			$tmpfile1=move_uploaded_file($_FILES['txtdocname']['tmp_name'],$filepath1);
			//$date1=date('Y-m-d h:i:s');
			//$sql="insert into excel_files(fld_excel_name,fld_excel_date) Values ('$file1','$date1')";
			//$result=mysql_query($sql);

		}

	}


			$photodestfile='upload_data/'.$file1;
			 if(!$handle = fopen($photodestfile, 'r+')){echo "error";}
			 else
			 {
			 	/*echo"<script language='javascript'>alert('Successfully Uploaded');</script>";*/
			 	echo"<center><font color='#ff0000'>Successfully Uploaded</font></center>";
				echo"<center><font color='#0E64C8'><a href='import_stud.php'> Back</a></font></center>";

			 }

		//$data = fgetcsv($handle, filesize($photodestfile), ","));
			 $i=0;
			 while (($data = fgetcsv($handle, filesize($photodestfile), ",")) != FALSE)
				{
						if($i!=0)
						{
						 $a=addslashes($data[0]);

						 $b=addslashes($data[1]);
                         $c=addslashes($data[2]);
                          $d=addslashes($data[3]);
						 $e=addslashes($data[4]);
						 $f=addslashes($data[5]);
						 $g=addslashes($data[6]);
						 $h=addslashes($data[7]);
						 $i=addslashes($data[8]);
						 $j=addslashes($data[9]);
						 $k=addslashes($data[10]);
						 $l=addslashes($data[11]);
						 $m=addslashes($data[12]);
						 $n=addslashes($data[13]);
						 $o=addslashes($data[14]);
						 $p=addslashes($data[15]);



				  echo $query="insert into es_preadmission
					(pre_serialno,
					aadharno,
                    pre_fromdate,
                    pre_todate,
                    pre_fathername,
                    pre_mobile1,
                    pre_class,
                    pre_resno1,
                    caste_id,
                    pre_name,
                    pre_lastname,
                    pre_student_username,
                    pre_student_password
				   )
					values('".$a."',
					'".$b."',
                    '".$c."',
                    '".$d."',
                    '".$e."',
                    '".$f."',
                    '".$g."',
                    '".$h."',
                    '".$i."',
                    '".$j."',
                    '".$k."',
                    '".$l."',
                    '".$m."'

				   )";

                   $query1="insert into es_preadmission_details (es_preadmissionid,pre_class ,pre_fromdate,pre_todate) values('srno','$g','$c','$d')";
				$result1=mysql_query($query1) or die(mysql_error());


           if(mysql_query($query,$connection))
		echo "Success<br>";
	else
		echo "Fail<br>".mysql_error();


				//$query1="insert into es_preadmission_details (es_preadmissionid,pre_class ,pre_fromdate,pre_todate) values('srno','$class','$acyears','$acyeare')";
//				$result1=mysql_query($query1) or die(mysql_error());
//
						}
					$i++;


					}//*************************While Close************************************

					fclose($handle);


	}//closing of if loop

		//exit;
//}//closing of if loop


//header('location:upload.php');

//*******************if Close******************************
?>


