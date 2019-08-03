<?php

/**

* Only Admin users can view the pages

*/

if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {

	header('location: ./?pid=1&unauth=0');

	exit;

}



if($action=='list_enquiry'){ ?>

<?php /*?><script type="text/javascript">

function newWindowOpen(href)

{

    window.open(href,null, 'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');

}

	function fun()

	{ 

		 if(document.build_report.pre_class.value==""){

			alert("Select Class");		

			return false;

		}

		else

		{

		return true;

		}	   

		function callsubmit(value)

{

window.location=" ?pid=3&action=cast_list&pre_year="+value;

}

</script><?php */?>	

<table width="100%" border="0" cellspacing="0" cellpadding="0">

     <tr>

         <td height="3" colspan="3"></td>

	 </tr>

     <tr>

         <td height="25" colspan="3" class="bgcolor_02"><span class="admin">&nbsp;Admitted Students</span></td>

     </tr>

     <tr>

         <td width="1" class="bgcolor_02"></td>

         <td align="left" valign="top">

		     <table width="100%" border="0" cellspacing="4" cellpadding="0">

			    <tr>

				    <td height="25" colspan="5" align="right" ></td>

               </tr> 

                  <tr>

                    <td align="left" valign="top">

					   <table width="100%" border="0" cellspacing="3" cellpadding="0">

                         <form action="" method="post" name="build_report" id="build_report" >

                          <tr>

                             <td width="13%" align="center" class="narmal">Select :</td>

                             <td width="28%" class="narmal"><select name="pre_class" >

                              <option value="" >-Select Class-</option>

                              <?php 

						       $classlist = getallClasses();

						       foreach($classlist as $indclass) {

						       ?>

                              <option <?php if($assignment_det[0]->as_class == $indclass['es_classesid']) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_classesid'];?>" <?php echo ($indclass['es_classesid']==$pre_class)?"selected":""?>><?php echo $indclass['es_classname'];?></option>

                              <?php } ?>

                            </select>

                           </td>

                             <td width="59%" class="narmal"><input type="submit" name="submit" value="Search" class="bgcolor_02"  style="cursor:pointer;"/></td>

                          </tr>

                          <tr>

                            <td align="center" class="narmal">&nbsp;</td>

                            <td class="narmal">&nbsp;</td>

                            <td class="narmal">&nbsp;</td>

                          </tr>

                         </form>

                       </table>

					</td>

                  </tr>

                  <tr>

                    <td height="25" align="left" valign="middle">

					   <table width="100%" height="47" border="0">

						<?php if (count($es_enquiryList)>0) { ?>

					      <tr class="bgcolor_02">

                             <td width="16%" height="18" align="center" valign="middle"><strong>Reg # </strong></td>

							  <td width="17%" height="18" align="center" valign="middle"><strong>Enq # </strong></td>

                             <td width="36%" align="left" valign="middle"><strong>&nbsp;Student Name</strong></td>

                             <td width="31%" align="center" valign="middle"><strong>&nbsp;Class</strong></td>

                          </tr>

							<?php						

								$rw   = 1;

							    $slno = $start+1;

								foreach ($es_enquiryList as $eachrecord)

								  {

								    if($rw%2==0)

									$rowclass = "even";

									else

									$rowclass = "odd";								

							?>  

						  <tr class="<?php echo $rowclass;?>">                        

                             <td align="center" valign="middle" class="narmal"><?php echo $eachrecord['es_preadmissionid']; ?></td>

							   <td align="center" valign="middle" class="narmal"><?php 

							 	$online_sql="select * from es_enquiry  where es_preadmissionid =".$eachrecord['es_preadmissionid'];

	                                    $online_row=$db->getRow($online_sql);

										 $online_row['es_enquiryid'];

										if($online_row['es_preadmissionid']!=$eachrecord['es_preadmissionid'])

										{

										echo"---";

										}

										else{

							    echo ($online_row['es_enquiryid']);}

							   ?></td>

						     <td align="left" valign="middle" class="narmal"><?php echo ($eachrecord['pre_name']); ?></td>

						     <td align="center" valign="middle" class="narmal"><?php echo ($eachrecord['es_classname']);?></td>			

					      </tr>

                            <?php                  

					         $rw++;

                             $slno++;

				              }

                              ?>

                                <tr>

		<td colspan="4" align="center"><?php  //paginateexte($start, $q_limit, $no_rows, "action=list_enquiry&column_name=es_preadmissionid");  ?>	</td>

	</tr>

			          </table>

            <table width="100%" height="33" border="0">					 

				<tr>

                     <td align="right" valign="middle">

					 <input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=3&action=printlist<?php  echo $adminlisturl;?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  />

					 

					 

					</td>

                </tr>

				<?php 

				}

                elseif($cnt_rec_atnd == 0  && $submit == 'Search') {

						echo "<tr class='bgcolor_02'>

								<td height='20' align='center' colspan='7' class='bgcolor_02'>

								<b>No Data Found for this Search</b></td>

							</tr>

							<tr>

								<td height='20' ></td>

							</tr>";

				    }

               ?>

			</table>

		</td>

     </tr>

   </table></td>

	     <td width="1" class="bgcolor_02"></td>

     </tr>

     <tr>

          <td height="1" colspan="3" class="bgcolor_02"></td>

  </tr>

</table>

<?PHP }?>



<?php 

if($action=='printlist')

{ ?>



<table width="100%" border="0" cellspacing="1" cellpadding="1">

    <tr class="bgcolor_02">

        <td width="15%" height="25" class="admin" align="center">Reg # </td>

		  <td width="15%" height="25" class="admin" align="center">Enq # </td>

		  <td width="27%" height="25" align="left" valign="middle" class="admin">Student Name</td>

		<td width="28%" height="25" align="center" valign="middle" class="admin">Class</td>	

   </tr>

<?php	

    $rownum =1;	 

	if($no_rows>0){

	foreach ($es_enquiryList as $eachrecord){

	$zibracolor = ($rownum%2==0)?"even":"odd";	

?>	

    <tr class="<?php echo $zibracolor;?>">	 

		<td class="narmal" align="center"><?php echo $eachrecord['es_preadmissionid']; ?></td>

		 <td align="center" class="narmal"><?php 

							 	$online_sql="select * from es_enquiry  where es_preadmissionid =".$eachrecord['es_preadmissionid'];

	                                    $online_row=$db->getRow($online_sql);

										 $online_row['es_enquiryid'];

										if($online_row['es_preadmissionid']!=$eachrecord['es_preadmissionid'])

										{

										echo"---";

										}

										else{

							    echo ($online_row['es_enquiryid']);}

							   ?></td>

		<td align="left" valign="middle" class="narmal"><?php echo ($eachrecord['pre_name']); ?></td>

		<td align="center" valign="middle" class="narmal"><?php echo ($eachrecord['es_classname']);?></td>

	</tr>

<?php

$rownum++;

 }

 }

?>



    <tr>

 </tr>									

</table>					  

<?php } ?>

<?php if($action=='enquiry_students'){ ?>

<?php /*?><script type="text/javascript">

function newWindowOpen(href)

{

    window.open(href,null, 'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');

}



	function fun()

	{ 

		 if(document.build_report.pre_class.value==""){

			alert("Select Class");		

			return false;

		}

		else

		{

		return true;

		}	   

	}

</script>	<?php */?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">

     <tr>

         <td height="3" colspan="3"></td>

	 </tr>

     <tr>

         <td height="25" colspan="3" class="bgcolor_02"><span class="admin">&nbsp;<strong>Admitted Students List [Enquiry] </strong></span></td>

     </tr>

     <tr>

         <td width="1" class="bgcolor_02"></td>

         <td align="left" valign="top">

		     <table width="100%" border="0" cellspacing="4" cellpadding="0">

			    <tr>

				    <td height="25" colspan="5" align="right" >

					<font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">

					Note : * denotes mandatory</font></td>

               </tr> 

                  <tr>

                    <td align="left" valign="top">

					   <table width="100%" border="0" cellspacing="3" cellpadding="0">

                         <form action="" method="post" name="build_report" id="build_report" >

                          <tr>

                             <td width="13%" align="center" class="narmal">Select :</td>

                             <td width="28%" class="narmal"><select name="pre_class" >

                              <option value="" >Class </option>

                              <?php 

						       $classlist = getallClasses();

						       foreach($classlist as $indclass) {

						       ?>

                              <option <?php if($assignment_det[0]->as_class == $indclass['es_classesid']) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_classesid'];?>" <?php echo ($indclass['es_classesid']==$pre_class)?"selected":""?>><?php echo $indclass['es_classname'];?></option>

                              <?php } ?>

                            </select>

                            <font color="#FF0000">*</font></td>

                             <td width="59%" class="narmal"><input type="submit" name="submit" value="Search" class="bgcolor_02" OnClick="return fun();" style="cursor:pointer;"/></td>

                          </tr>

                          <tr>

                            <td align="center" class="narmal">&nbsp;</td>

                            <td class="narmal">&nbsp;</td>

                            <td class="narmal">&nbsp;</td>

                          </tr>

                         </form>

                       </table>

					</td>

                  </tr>

                  <tr>

                    <td height="25" align="left" valign="middle">

					   <table width="100%" height="47" border="0">

						<?php if (count($es_enquiryList)>0) { ?>

					      <tr class="bgcolor_02">

                             <td width="18%" height="18" align="center"><strong>Registration No</strong></td>

                             <td width="23%" align="center"><strong>Student Name</strong></td>

                             <td width="30%" align="center"><strong>Class</strong></td>

                          </tr>

							<?php						

								$rw   = 1;

							    $slno = $start+1;

								foreach ($es_enquiryList as $eachrecord)

								  {

								    if($rw%2==0)

									$rowclass = "even";

									else

									$rowclass = "odd";								

							?>  

						  <tr class="<?php echo $rowclass;?>">                        

                             <td align="center" class="narmal">SM<?php echo $eachrecord['es_preadmissionid']; ?></td>

						     <td align="center" class="narmal"><?php echo ($eachrecord['pre_name']); ?></td>

						     <td align="center" class="narmal"><?php echo ($eachrecord['es_classname']);?></td>			

					      </tr>

                            <?php                  

					         $rw++;

                             $slno++;

				              }

                              ?>

			          </table>

            <table width="100%" height="33" border="0">					 

				<tr>

                     <td align="right" valign="middle"><input name="Submit" type="button" onclick="newWindowOpen ('?pid=3&action=printlist_enquiry<?php  echo $adminlisturl;?>');" class="bgcolor_02" value="Print" style="cursor:pointer;"/></td>

                </tr>

				<?php 

				}

                elseif($cnt_rec_atnd == 0  && $submit == 'Search') {

						echo "<tr class='bgcolor_02'>

								<td height='20' align='center' colspan='7' class='bgcolor_02'>

								<b>No Data Found for this Search</b></td>

							</tr>

							<tr>

								<td height='20' ></td>

							</tr>";

				    }

               ?>

			</table>

		</td>

     </tr>

   </table></td>

	     <td width="1" class="bgcolor_02"></td>

     </tr>

     <tr>

          <td height="1" colspan="3" class="bgcolor_02"></td>

  </tr>

</table>

<?PHP }?>



<?php 

if($action=='printlist_enquiry')

{ ?>



<table width="100%" border="0" cellspacing="1" cellpadding="1">

    <tr class="bgcolor_02">

        <td width="15%" height="25" class="admin" align="center">Registration&nbsp;No</td>

		<td width="27%" height="25" class="admin" align="center">Student Name</td>

		<td width="28%" height="25" class="admin" align="center">Class</td>	

   </tr>

<?php	

    $rownum =1;	 

	if($no_rows>0){

	foreach ($es_enquiryList as $eachrecord){

	$zibracolor = ($rownum%2==0)?"even":"odd";	

?>	

    <tr class="<?php echo $zibracolor;?>">	 

		<td class="narmal" align="center">SM<?php echo $eachrecord['es_preadmissionid']; ?></td>

		<td class="narmal" align="center"><?php echo ($eachrecord['pre_name']); ?></td>

		<td class="narmal" align="center"><?php echo ($eachrecord['es_classname']);?></td>

	</tr>

<?php

$rownum++;

 }

 }

?>



    <tr>

 </tr>									

</table>					  

<?php } ?>



<?php if($action=='cast_list'){?>

<script>		

function callsubmit(value)

{

window.location=" ?pid=3&action=cast_list&pre_year="+value;

}

</script>

<table width="100%" border="0" cellspacing="0" cellpadding="0">

	  <tr>

         <td height="3" colspan="3"></td>

	 </tr>

	  <tr>

		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">CATEGORY WISE DATA </span></td>

	  </tr>

	   <tr height="25">

			    <td class="bgcolor_02" ></td>

                  				<td  valign="middle" class="narmal" align="center"><form action='' mathod='post'>

Academic Year:&nbsp;<select name="pre_year" onchange='callsubmit(this.value);'>

<option value="">select</option>

						<?php  foreach($school_details_res as $each_record) { ?>

						<option value="<?php echo $each_record['es_finance_masterid']; ?>" <?php if ($each_record['es_finance_masterid']==$pre_year) { echo "selected"; }?>><?php echo displaydate($each_record['fi_startdate'])." To ".displaydate($each_record['fi_enddate']); ?>						                        </option>

						<?php } ?>

						</select>

						</form></td>

								 <td class="bgcolor_02"></td>

	  </tr>

	  <tr>

		<td width="1" class="bgcolor_02"></td>

		<td align="left" valign="top">

		<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td><?php

//cast list

if($action=='cast_list')

{?>

<table width='100%' ><tr class='bgcolor_02'>

 <td align="center" valign="middle">Class</td>

  <?php 

if(is_array($class_array))

{

	foreach($class_array as $each_class)

	{

	

	?>

	<td align="center" valign="middle"><?php echo ucfirst($each_class['es_classname']);?>

	  <table width='100%'>

	<tr><td align="center">B</td>

	<td align="center">G</td>

	</tr>

	</table>

	</td>

	<?php 

	}

}?>

<td align="center">Total</td>

</tr>

<?php

if(is_array($caste_array))

{

$y=0;

$i=1;

foreach($caste_array as $each_caste)

{



$x=0;

$class=($i%2==0)?'even':'odd';

?>

<tr class='<?php echo $class; ?>'>

<td align="center"><?php echo ucfirst($each_caste['caste']);?></td>

<?php

foreach($class_array as $each_class)

{



?>

<td align="center" valign="middle">

<table width='100%'>

<tr><td align="center">

<?php



echo $counr_student=$db->getOne("SELECT COUNT(*) FROM es_preadmission WHERE caste_id=".$each_caste['caste_id']." AND pre_class=".$each_class['es_classesid']." AND pre_fromdate='".$from_acad."' AND pre_gender='".male."' AND status !='inactive' ");



$x+=$counr_student;



?>

</td>

<td align="center"><?php



echo $counr_student=$db->getOne("SELECT COUNT(*) FROM es_preadmission WHERE caste_id=".$each_caste['caste_id']." AND pre_class=".$each_class['es_classesid']." AND pre_fromdate='".$from_acad."' AND pre_gender='".female."' AND status !='inactive' ");

$x+=$counr_student;

?></td>

</tr>

</table>



</td>

<?php 

}

?>

<td align="center" valign="middle" style="padding-right:20px;"><?php echo $x; 

$y+=$x;

?></td>

</tr>

<?php

$i++;

}?>

<tr>

    <td align="right" height="25" class='bgcolor_02' colspan='<?php echo count($class_array)+1; ?>'>GRAND TOTAL:</td><td align="center" valign="middle" class='bgcolor_02' style="padding-right:20px;" > <?php echo $y; ?></td>

  </tr>

  <tr>

    <td align="right"  colspan='<?php echo count($class_array)+1; ?>'>&nbsp;</td><td align="right" style="padding-right:10px;"> 

	<input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=3&action=print_cast_list<?php echo $pageUrl; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  />	

	</td>

  </tr>



<?php

 }?>

</table>

</td>

  </tr>

  

</table>



			



		</td>

		<td width="1" class="bgcolor_02"></td>

	  </tr>	  

	  <tr>

		<td height="1" colspan="3" class="bgcolor_02"></td>

	  </tr>

</table>

	<?php } }?>

<?php

if($action=='print_cast_list')

{?>

<table width="100%">

<tr><td align="left" style="padding-left:20px;">Academic Session:&nbsp;<?php echo func_date_conversion('Y-m-d','d-m-Y',$from_acad);?>&nbsp;TO&nbsp;<?php echo func_date_conversion('Y-m-d','d-m-Y',$to_acad);?></td>

<td align="right" style="padding-right:20px;">Date:&nbsp;<?php echo date('d-m-Y');?></td>

</tr>

</table>



<table width='100%' >



<tr class='bgcolor_02'>

 <td align="center" valign="middle">Class</td>

  <?php 

if(is_array($class_array))

{

	foreach($class_array as $each_class)

	{

	

	?>

	<td align="center" valign="middle"><?php echo ucfirst($each_class['es_classname']);?>

	  <table width='100%'>

	<tr><td align="center">B</td>

	<td align="center">G</td>

	</tr>

	</table>

	</td>

	<?php 

	}

}?>

<td align="center">Total</td>

</tr>

<?php

if(is_array($caste_array))

{

$y=0;

$i=1;

foreach($caste_array as $each_caste)

{



$x=0;

$class=($i%2==0)?'even':'odd';

?>

<tr class='<?php echo $class; ?>'>

<td align="center"><?php echo ucfirst($each_caste['caste']);?></td>

<?php

foreach($class_array as $each_class)

{



?>

<td align="center" valign="middle">

<table width='100%'>

<tr><td align="center">

<?php



echo $counr_student=$db->getOne("SELECT COUNT(*) FROM es_preadmission WHERE caste_id=".$each_caste['caste_id']." AND pre_class=".$each_class['es_classesid']." AND pre_fromdate='".$from_acad."' AND pre_gender='".male."'");



$x+=$counr_student;



?>

</td>

<td align="center"><?php



echo $counr_student=$db->getOne("SELECT COUNT(*) FROM es_preadmission WHERE caste_id=".$each_caste['caste_id']." AND pre_class=".$each_class['es_classesid']." AND pre_fromdate='".$from_acad."' AND pre_gender='".female."'");

$x+=$counr_student;

?></td>

</tr>

</table>



</td>

<?php 

}

?>

<td align="center" valign="middle" style="padding-right:20px;"><?php echo $x; 

$y+=$x;

?></td>

</tr>

<?php

$i++;

}?>

<tr>

    <td align="right" height="25" class='bgcolor_02' colspan='<?php echo count($class_array)+1; ?>'>GRAND TOTAL:</td><td align="center" valign="middle" class='bgcolor_02' style="padding-right:20px;" > <?php echo $y; ?></td>

  </tr>



<?php

 }?>

</table>

<?php } ?>



<?php

if($action=='age_wise')

{

?>

<script>		

function callsubmit(value)

{

window.location=" ?pid=3&action=age_wise&pre_year="+value;

}

</script>

<table width="100%" border="0" cellspacing="0" cellpadding="0">

	  <tr>

         <td height="3" colspan="3" class="bgcolor_02"></td>

	 </tr>

	  <tr>

		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Age Wise Data</span></td>

	  </tr>

	   <tr height="25">

			    <td class="bgcolor_02" ></td>

                  				<td  valign="middle" class="narmal" align="center"><form action='' mathod='post'>

Academic Year:&nbsp;<select name="pre_year" onchange='callsubmit(this.value);'>

<option value=''>Select</option>

						<?php  foreach($school_details_res as $each_record) { ?>

						<option value="<?php echo $each_record['es_finance_masterid']; ?>" <?php if ($each_record['es_finance_masterid']==$pre_year) { echo "selected"; }?>><?php echo displaydate($each_record['fi_startdate'])." To ".displaydate($each_record['fi_enddate']); ?>						                        </option>

						<?php } ?>

						</select>

						</form></td>

								 <td class="bgcolor_02"></td>

	  </tr>

	   <tr>

			    <td class="bgcolor_02" width='1px'></td>

				<td align="center">

				<table width='100%'>

				

				<tr class='bgcolor_02'>

 <td align="center" valign="middle">Age/Class</td>

  <?php 

if(is_array($class_array))

{

	foreach($class_array as $each_class)

	{

	

	?>

	<td align="center" valign="middle"><?php echo ucfirst($each_class['es_classname']);?>

	  <table width='100%'>

	<tr><td align="center">B</td>

	<td align="center">G</td>

	<td align="center">T</td>

	</tr>

	</table>

	</td>

	<?php 

	}

}?>

<td align="center">Total</td>

</tr>



<?php 

  $max_date=$db->getRow("SELECT * FROM es_preadmission ORDER BY pre_dateofbirth ASC LIMIT 0,1");
  


if($selectedyearid != $_SESSION['eschools']['es_finance_masterid'])
{
	//$lastyear = func_date_conversion('Y-m-d','d/m/Y',$to_acad);
	$lastyear = date('d/m/Y',$to_acad);
}
else
{
	$lastyear="";
}

 // $max_age=getage(func_date_conversion('Y-m-d','d/m/Y',$max_date['pre_dateofbirth']),$lastyear);
  $max_age=getage(date('d/m/Y',$max_date['pre_dateofbirth']),$lastyear);

 

  



$y=0;

for($i=3;$i<=$max_age['years']+1;$i++)

{

$x=0;

$class=($i%2==0)?'even':'odd';

?>

<tr class='<?php echo $class; ?>'>

<td><?php echo $i; ?></td>

<?php

foreach($class_array as $each_class)

	{

	

	?>

	<td align="center" valign="middle">

	  <table width='100%'>

	<tr><td align="center">

	<?php

	$dobs=(date('Y')-$i).'-'.(01).'-'.(01);

	$dobe=(date('Y')-$i).'-'.(12).'-'.(31);

	//echo "SELECT COUNT(*) FROM es_preadmission pre, es_preadmission_details det  WHERE det.es_preadmissionid = pre.es_preadmissionid AND det.pre_class='".$each_class['es_classesid']."' AND pre.pre_gender ='male' AND pre.pre_dateofbirth BETWEEN '".$dobs."' AND '".$dobe."' AND det.pre_fromdate='". $from_acad."'";

	

	echo $count_boys=$db->getOne("SELECT COUNT(*) FROM es_preadmission pre, es_preadmission_details det  WHERE det.es_preadmissionid = pre.es_preadmissionid AND det.pre_class='".$each_class['es_classesid']."' AND pre.pre_gender ='male' AND pre.status!='inactive' AND pre.pre_dateofbirth BETWEEN '".$dobs."' AND '".$dobe."' AND det.pre_fromdate='". $from_acad."'");

	?>

	</td>

	<td align="center">

	<?php

	echo $count_girls=$db->getOne("SELECT COUNT(*) FROM es_preadmission pre, es_preadmission_details det  WHERE det.es_preadmissionid = pre.es_preadmissionid AND det.pre_class='".$each_class['es_classesid']."' AND pre.pre_gender ='female' AND pre.status!='inactive' AND pre.pre_dateofbirth BETWEEN '".$dobs."' AND '".$dobe."' AND det.pre_fromdate='". $from_acad."'");

	?>

	</td>

	<td align="center"><?php 

	$x+=$count_girls+$count_boys; 

	echo $count_girls+$count_boys; ?></td>

	</tr>

	</table>

	</td>

	<?php 

	}?>

	<td align="center"> <?php echo $x;?></td>

	</tr>

	

	<?php 

	$y+=$x;

	} ?>





</table>





</td>

<td class="bgcolor_02" width='1px'></td></tr>

<tr><td class="bgcolor_02" width='1px'></td>

         <td height="1" align='right'>

		 <table width="100%">

		 <tr>

    <td align="right" height="25" class='bgcolor_02' colspan='2'>GRAND TOTAL:</td><td width="7%" align="right" class='bgcolor_02' style="padding-right:20px;" > <?php echo $y; ?></td>

  </tr>

  <tr>

    <td align="right" height="30"  colspan='2'>&nbsp;</td><td align="right" style="padding-right:10px;"> 

	<input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=3&action=print_age_wise<?php echo $pageUrl; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  />	

	</td>

  </tr>

		 </table>

		 </td>

		 <td class="bgcolor_02" width='1px'></td>

  </tr>

<tr>

         <td height="1" colspan="3" class="bgcolor_02"></td>

  </tr>

</table>

				



<?php } ?>

<?php

if($action=='print_age_wise')

{

?>

<table width="100%">

<tr><td align="left" style="padding-left:20px;">Academic Session:&nbsp;<?php echo func_date_conversion('Y-m-d','d-m-Y',$from_acad);?>&nbsp;TO&nbsp;<?php echo func_date_conversion('Y-m-d','d-m-Y',$to_acad);?></td>

<td align="right" style="padding-right:20px;">Date:&nbsp;<?php

if($selectedyearid != $_SESSION['eschools']['es_finance_masterid']){$ason = func_date_conversion("Y-m-d","d-m-Y",$to_acad);}else{$ason=date('d-m-Y');}

 echo $ason;?></td>

</tr>

</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">

	  

	  <tr>

		<td height="1" colspan="3" class="bgcolor_02"></td>

	  </tr>

	   <tr>

			    <td class="bgcolor_02" width='1'></td>

				<td align="center">

				<table width='100%'>

				

				<tr class='bgcolor_02'>

 <td align="center" valign="middle">Age/Class</td>

  <?php 

if(is_array($class_array))

{

	foreach($class_array as $each_class)

	{

	

	?>

	<td align="center" valign="middle"><?php echo ucfirst($each_class['es_classname']);?>

	  <table width='100%'>

	<tr><td align="center">B</td>

	<td align="center">G</td>

	<td align="center">T</td>

	</tr>

	</table>

	</td>

	<?php 

	}

}?>

<td align="center">Total</td>

</tr>



<?php 

$max_date=$db->getRow("SELECT * FROM es_preadmission ORDER BY pre_dateofbirth ASC LIMIT 0,1");

//echo func_date_conversion('Y-m-d','d/m/Y',$max_date['pre_dateofbirth']);

if($selectedyearid != $_SESSION['eschools']['es_finance_masterid']){$lastyear = func_date_conversion('Y-m-d','d/m/Y',$to_acad);}else{$lastyear="";}



 $max_age=getage(date('d/m/Y',$max_date['pre_dateofbirth']),$lastyear);

$y=0;

for($i=3;$i<=$max_age['years']+1;$i++)

{

$x=0;

$class=($i%2==0)?'even':'odd';

?>

<tr class='<?php echo $class; ?>'>

<td><?php echo $i; ?></td>

<?php

foreach($class_array as $each_class)

	{

	

	?>

	<td align="center" valign="middle">

	  <table width='100%'>

	<tr><td align="center">

	<?php

	$dobs=(date('Y')-$i).'-'.(01).'-'.(01);

	$dobe=(date('Y')-$i).'-'.(12).'-'.(31);

	//echo "SELECT COUNT(*) FROM es_preadmission WHERE pre_class='".$each_class['es_classesid']."' AND pre_gender ='male' AND pre_dateofbirth BETWEEN '".$dobs."' AND '".$dobe."'";

	echo $count_boys=$db->getOne("SELECT COUNT(*) FROM es_preadmission WHERE pre_class='".$each_class['es_classesid']."' AND status!='inactive'  AND pre_gender ='male' AND pre_dateofbirth BETWEEN '".$dobs."' AND '".$dobe."'");

	?>

	</td>

	<td align="center">

	<?php

	echo $count_girls=$db->getOne("SELECT COUNT(*) FROM es_preadmission WHERE pre_class='".$each_class['es_classesid']."' AND status!='inactive' AND pre_gender ='female' AND pre_dateofbirth BETWEEN '".$dobs."' AND '".$dobe."'");

	?>

	</td>

	<td align="center"><?php 

	$x+=$count_girls+$count_boys; 

	echo $count_girls+$count_boys; ?></td>

	</tr>

	</table>

	</td>

	<?php 

	}?>

	<td align="center"> <?php echo $x;?></td>

	</tr>

	

	<?php 

	$y+=$x;

	} ?>





</table>





</td>

<td class="bgcolor_02" width='1px'></td></tr>

<tr>

<td class="bgcolor_02" width='1px'>&nbsp;</td>

         <td   align='right'>

		 <table width="100%">

		 <tr>

    <td align="right" height="25"class='bgcolor_02' colspan='2'>GRAND TOTAL:</td><td width="7%" align="right" class='bgcolor_02' style="padding-right:20px;" > <?php echo $y; ?></td>

  </tr></table>

		 </td>

		 <td class="bgcolor_02" width='1px'>&nbsp;</td>

  </tr>

<tr>

         <td height="1" colspan="3" class="bgcolor_02"></td>

  </tr>

</table>

<?php }?>