<?php 
$bookcatlistarray=$db->getRows("select * from es_categorylibrary where status='active'");



?>
<script type="text/javascript">   
/************ Checking Browsers ***********/
		function GetXmlHttpObject(handler)
		{
			var objXmlHttp=null
		
			if (navigator.userAgent.indexOf("Opera")>=0)
			{
				alert("This Site doesn't work in Opera")
				return
			}
			if (navigator.userAgent.indexOf("MSIE")>=0)
			{
				var strName="Msxml2.XMLHTTP"
				if (navigator.appVersion.indexOf("MSIE 5.5")>=0)
				{
					strName="Microsoft.XMLHTTP"
				}
				try
				{
					objXmlHttp=new ActiveXObject(strName)
					objXmlHttp.onreadystatechange=handler
					return objXmlHttp
				}
				catch(e)
				{
					alert("Error. Scripting for ActiveX might be disabled")
					return
				}
			}
			if (navigator.userAgent.indexOf("Mozilla")>=0)
			{
				objXmlHttp=new XMLHttpRequest()
				objXmlHttp.onload=handler
				objXmlHttp.onerror=handler
				return objXmlHttp
			}
		}

/** Completed checking Browser.. **/
/************ Get List of Districts ***********/
/* Adding chapters actions */
		function getbooksubcats(countryid,selval)
		{   
	
			url="?pid=38&action=subbookacts&cid="+countryid+"&selval="+selval;
			url=url+"&sid="+Math.random();
			xmlHttp=GetXmlHttpObject(countryChanged);
			xmlHttp.open("GET", url, true);
			xmlHttp.send(null);
		}
		function countryChanged()
		{
			if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
			{
				document.getElementById("subjectselectbox").innerHTML=xmlHttp.responseText
			}
		}
		</script>
<form action="" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tbl_grid">
	<tr><td colspan="2" >&nbsp;</td></tr>
	<tr>
		<td width="83%" height="25" class="bgcolor_02"><strong>&nbsp;Online Public Access Catalog (OPAC) </strong></td>
		<td width="17%" class="bgcolor_02"><strong>Date: <?php echo displaydate(date("y-m-d")); ?></strong></td>
	</tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr>
		<td colspan="2">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td width="9%" class="narmal">Cattegory&nbsp;Name </td>
				<td width="10%" class="narmal"><select name="catid" onchange="getbooksubcats(this.value,'');">
                              <option value="">- Select -</option>
							  <?php 
							  if (is_array($bookcatlistarray) && count($bookcatlistarray) > 0) { 
							  foreach ($bookcatlistarray as $eachrecord){ ?>
                            <option <?php if($eachrecord['es_categorylibraryid']==$catid){ ?> selected="selected" <?php } ?> value="<?php echo $eachrecord['es_categorylibraryid']; ?>"><?php echo $eachrecord['lb_categoryname']; ?></option>                            
							<?php } }?>							
                          </select></td>
				<td width="9%" class="narmal">Subject&nbsp;Category</td>
				<td width="12%" class="narmal"id="subjectselectbox"><select name="subbookcatid"><option value="">- Select -</option></select></td>
				<td width="7%" class="narmal">Title</td>
				<td width="11%" class="narmal"><input name="bkname" type="text" size="15"  value="<?php if(isset($bkname))echo $bkname;  ?>"/></td>
				<td width="9%" class="narmal">Author </td>
				<td width="13%" class="narmal"><input name="bkauthor" type="text" size="15" value="<?php if(isset($bkauthor))echo $bkauthor;  ?>" /></td>
				<td width="11%" class="narmal"><input name="bkserch" type="submit" class="bgcolor_02" value="Search" /></td>
				<td width="9%" class="narmal">&nbsp;</td>
			</tr>
				 
				 <?php if($catid){?>
				<script type="text/javascript">
				getbooksubcats(<?php echo $catid?>,<?php echo $subbookcatid;?>);
				
				</script>
				
				<?php }?>
	  </table>
		</td>
	</tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr>
		<td colspan="2">
			<table width="100%" border="1" cellspacing="0" cellpadding="4" class="tbl_grid">
		  <?php  if (isset($bkserch)||$action=='serchbooks') {
					 if ($no_rowsbooks!=0){
		  ?>
				<tr class="bgcolor_02" >
					<td width="7%" height="25"   align="center"><strong>S No </strong></td>
					<td width="11%" align="center"><strong>Accession # </strong></td>
					<td width="22%"   align="center"><strong>Book Name </strong></td>
					<td width="23%" class="bgcolor_02"><strong>&nbsp;&nbsp;Category/Subcategory</strong></td>
					<td width="24%"  align="center"><strong>Author</strong></td>
		
					<td width="18%"  align="center"><strong>Status</strong></td>
				</tr>
<?php

				$rownum = $start+1;
						foreach ($es_bookdet as $es_bookdet1){
						$sql="select * from es_book_reservation where book_id=". $es_bookdet1['lbook_aceesnofrom'] ." and expired_on >='".date("Y-m-d")."' AND status='active'";
						$num=sqlnumber($sql);

?>
				<tr>
					<td align="center"><?php echo $rownum; ?></td>
					<td align="center"><?php echo $es_bookdet1['lbook_aceesnofrom']; ?></td>
					<td align="center"><?php echo $es_bookdet1['lbook_title']; ?></td>
					<td width="23%" ><?php 
					$online_sql="select * from es_categorylibrary where es_categorylibraryid=".$es_bookdet1['lbook_category'];
 $online_row=$db->getRow($online_sql);
			$online_sql1="select * from es_subcategory where es_subcategoryid=".$es_bookdet1['lbook_booksubcategory'];
 $online_row1=$db->getRow($online_sql1);
 
 		
					echo $online_row['lb_categoryname']; ?>(<?php echo $online_row1['subcat_scatname']; ?>)</td>
					
					<td align="center"><?php echo $es_bookdet1['lbook_author']; ?></td>
			
					<td align="left" valign="middle"><?php echo "<span style='color:#52CF62; font-size:12px; font-weight:bold;'>".ucfirst($es_bookdet1['issuestatus'])."</span>"; ?>
					<?php if($es_bookdet1['issuestatus']=='notissued' && $num==0){?><a href="?pid=15&action=reservebook&userid=<?php echo $_SESSION['eschools']['user_id']; ?>&utype=<?php echo $_SESSION['eschools']['login_type']; ?>&rbook_id=<?php echo $es_bookdet1['lbook_aceesnofrom'];?>&start=<?php echo $start;?>" style="color:#00331A; font-size:12px; font-weight:bold; text-decoration:none; text-decoration:none;" onclick="return confirm('Are you sure want to reserve this book')">&nbsp;&nbsp;Available</a>
					<?php } if($es_bookdet1['issuestatus']=='notissued' && $num>0) { echo "&nbsp;&nbsp;<span style='color:#FF0000; font-size:12px; font-weight:bold;'>Reserved</span>"; }
					
					 ?></td>
					
				</tr>
<?php
			  $rownum++;
						}
						?>
						<tr>
			  <td colspan="6" align="center"><?php paginateexte($start, $q_limit, $no_rowsbooks, "action=serchbooks".$pageurl) ?></td>
			  </tr>
						<?php
					 }
					}
			  ?>
			  <?php if (isset($no_rowsbooks) && $no_rowsbooks==0){?>
	<tr><td align="center" class="error_messages" colspan="6" ><?php echo $nill1;?></td></tr>
	<?php } ?>
			</table>
		</td>
	</tr>
	<tr height="100" valign="middle">
		<td align="center" colspan="2" ><input type="button" name="close" value="Close" onclick="window.close();" class="bgcolor_02" /></td>
  </tr>
</table>
</form>