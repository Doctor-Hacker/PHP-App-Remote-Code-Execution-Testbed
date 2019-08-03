<?php
if($action=="preparetransportbill"){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Prepare Transport Fee</strong></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td align="left" height="4" ></td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top">		
				<form action="" method="post" name="preparetransportbill_form" >
				<table width="100%" border="0" cellspacing="3" cellpadding="0">	
					                
                    
				  <tr>
				<td width="18%" align="left" class="narmal">Route</td>
					<td width="48%" align="left"  class="narmal">
                    <select name="id">
					  <option value="">Select Route</option>
					  <option value="all" <?php if($id=='all'){echo "selected='selected'";}?>>All</option>
                      <?php
					  
					  $class_sql="SELECT * FROM es_trans_route WHERE status!='Delete'";
					  $class_exe=mysql_query($class_sql);
					  while($class_row=mysql_fetch_array($class_exe)){
					  ?>
					  <option <?php if($id==$class_row['id']) { echo "selected='selected'"; } ?> value="<?php echo $class_row['id']; ?>"><?php echo $class_row['route_title']; ?></option>
					  <?php }?>
					  </select>			  <font color="#FF0000">*</font></td>
					<td width="7%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
					<tr>
				<td width="18%" align="left" class="narmal">Select Year </td>
					<td width="48%" align="left"  class="narmal">
					  <select name="selyear">
                      <option value="">-Year-</option>
					  <option <?php if($selyear==2006) { echo "selected='selected'"; } ?> value="2006">2006</option>
					  <option <?php if($selyear==2007) { echo "selected='selected'"; } ?> value="2007">2007</option>
					  <option <?php if($selyear==2008) { echo "selected='selected'"; } ?> value="2008">2008</option>
					  <option <?php if($selyear==2009) { echo "selected='selected'"; } ?> value="2009">2009</option>
					  <option <?php if($selyear==2010) { echo "selected='selected'"; } ?> value="2010">2010</option>
					  <option <?php if($selyear==2011) { echo "selected='selected'"; } ?> value="2011">2011</option>
					  <option <?php if($selyear==2012) { echo "selected='selected'"; } ?> value="2012">2012</option>
					  <option <?php if($selyear==2013) { echo "selected='selected'"; } ?> value="2013">2013</option>
					  <option <?php if($selyear==2014) { echo "selected='selected'"; } ?> value="2014">2014</option>
					  <option <?php if($selyear==2015) { echo "selected='selected'"; } ?> value="2015">2015</option>
					  <option <?php if($selyear==2016) { echo "selected='selected'"; } ?> value="2016">2016</option>
					  <option <?php if($selyear==2017) { echo "selected='selected'"; } ?> value="2017">2017</option>
					  <option <?php if($selyear==2018) { echo "selected='selected'"; } ?> value="2018">2018</option>
                      <option <?php if($selyear==2019) { echo "selected='selected'"; } ?> value="2019">2019</option>
                      <option <?php if($selyear==2020) { echo "selected='selected'"; } ?> value="2020">2020</option>
                      <option <?php if($selyear==2021) { echo "selected='selected'"; } ?> value="2021">2021</option>
                      <option <?php if($selyear==2022) { echo "selected='selected'"; } ?> value="2022">2022</option>
                      <option <?php if($selyear==2023) { echo "selected='selected'"; } ?> value="2023">2023</option>
                      <option <?php if($selyear==2024) { echo "selected='selected'"; } ?> value="2024">2024</option>
                      <option <?php if($selyear==2025) { echo "selected='selected'"; } ?> value="2025">2025</option>
                      <option <?php if($selyear==2026) { echo "selected='selected'"; } ?> value="2018">2018</option>
                      <option <?php if($selyear==2027) { echo "selected='selected'"; } ?> value="2027">2027</option>
                      <option <?php if($selyear==2028) { echo "selected='selected'"; } ?> value="2028">2028</option>
                      <option <?php if($selyear==2029) { echo "selected='selected'"; } ?> value="2029">2029</option>
                      <option <?php if($selyear==2030) { echo "selected='selected'"; } ?> value="2030">2030</option>
                      <option <?php if($selyear==2031) { echo "selected='selected'"; } ?> value="2031">2031</option>
                      <option <?php if($selyear==2032) { echo "selected='selected'"; } ?> value="2032">2032</option>
                      <option <?php if($selyear==2033) { echo "selected='selected'"; } ?> value="2033">2033</option>
                      <option <?php if($selyear==2034) { echo "selected='selected'"; } ?> value="2034">2034</option>
                      <option <?php if($selyear==2035) { echo "selected='selected'"; } ?> value="2035">2035</option>
                      <option <?php if($selyear==2036) { echo "selected='selected'"; } ?> value="2036">2036</option>
                      <option <?php if($selyear==2037) { echo "selected='selected'"; } ?> value="2037">2037</option>                      
                      <option <?php if($selyear==2038) { echo "selected='selected'"; } ?> value="2038">2038</option>
                      <option <?php if($selyear==2039) { echo "selected='selected'"; } ?> value="2039">2039</option>
                      <option <?php if($selyear==2040) { echo "selected='selected'"; } ?> value="2040">2040</option>
                      <option <?php if($selyear==2041) { echo "selected='selected'"; } ?> value="2041">2041</option>
                      <option <?php if($selyear==2042) { echo "selected='selected'"; } ?> value="2042">2042</option>
                      <option <?php if($selyear==2043) { echo "selected='selected'"; } ?> value="2043">2043</option>
                      <option <?php if($selyear==2044) { echo "selected='selected'"; } ?> value="2044">2044</option>
                      <option <?php if($selyear==2045) { echo "selected='selected'"; } ?> value="2045">2045</option>
                      <option <?php if($selyear==2046) { echo "selected='selected'"; } ?> value="2046">2046</option>
                      <option <?php if($selyear==2047) { echo "selected='selected'"; } ?> value="2047">2047</option>
                      <option <?php if($selyear==2048) { echo "selected='selected'"; } ?> value="2048">2048</option>
                      <option <?php if($selyear==2049) { echo "selected='selected'"; } ?> value="2049">2049</option>
                      <option <?php if($selyear==2050) { echo "selected='selected'"; } ?> value="2050">2050</option>
                      
					  </select>					  <font color="#FF0000">*</font></td>
					<td width="7%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
				  <tr>
					<td align="left" class="narmal">Select Month</td>
					<td align="left"><span class="narmal">
					  <select name="selmonth" >
					    <option <?php if($selmonth=='01') { echo "selected='selected'"; } ?> value="01">January</option>
					    <option <?php if($selmonth=='02') { echo "selected='selected'"; } ?> value="02">Febuary</option>
					    <option <?php if($selmonth=='03') { echo "selected='selected'"; } ?> value="03">March</option>
					    <option <?php if($selmonth=='04') { echo "selected='selected'"; } ?> value="04">April</option>
					    <option <?php if($selmonth=='05') { echo "selected='selected'"; } ?> value="05">May</option>
					    <option <?php if($selmonth=='06') { echo "selected='selected'"; } ?> value="06">June</option>
					    <option <?php if($selmonth=='07') { echo "selected='selected'"; } ?> value="07">July</option>
					    <option <?php if($selmonth=='08') { echo "selected='selecteelected'"; } ?> value="07">July</option>
					    <option <?php if($selmonth=='08') { echo "selected='selected'"; } ?> value="08">August</option>
					    <option <?php if($selmonth=='09') { echo "selected='selected'"; } ?> value="09">September</option>
					    <option <?php if($selmonth=='10') { echo "selected='selected'"; } ?> value="10">October</option>
					    <option <?php if($selmonth=='11') { echo "selected='selected'"; } ?> value="11">November</option>
					    <option <?php if($selmonth=='12') { echo "selected='selected'"; } ?> value="12">December</option>
				    </select>
				    <font color="#FF0000">*</font></span></td>
					<td align="left"><span class="narmal"> </span></td>
					<td colspan="2" align="left">      </td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td align="left" class="narmal">&nbsp;</td>
					<td align="left" class="narmal">					
					  <input name="prepare" type="submit" class="bgcolor_02" value="Prepare" />					
					</td>
					<td align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>		 
				  </table>
				</form>
</td>
<td width="1" class="bgcolor_02"></td>
</tr>
<tr>
<td height="1" colspan="3" class="bgcolor_02"></td>
</tr>
</table>
<?php }?>

