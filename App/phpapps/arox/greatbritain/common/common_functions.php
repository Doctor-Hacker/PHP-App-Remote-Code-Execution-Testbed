<? include "../includes/config.php";?>
<? function generatedynamiccombo($tblname,$showfield,$valuefield,$comparevalue,$comboname,$criteria,$checkmode,$order,$showfield,$showfield2){
	$strquery="Select * from " . $tblname .$criteria.$order;
	//echo $strquery;
	$result=mysql_query("$strquery");
	?>
	<Select name=<?=$comboname?> style="width:50%" <?=$onclick?> id=<?=$strid?>>
		<option value=''>Select Any</option>
		<? while($show=mysql_fetch_array($result)){
			if($show[$valuefield]==$comparevalue){?>
				<option value='<?=$show[$valuefield]?>'Selected>
					<?=$show[$showfield]?>
				</option>		
			<? }else{?>
				<option value='<?=$show[$valuefield]?>'>
					<?=$show[$showfield]?>
				</option>		
			<? }
		}?>
	</select>
<? }?>
	<? function generatedynamiccombo2($tblname,$showfield,$valuefield,$comparevalue,$comboname,$criteria,$checkmultiple,$event,$funcname,$order){
	$strquery="Select * from " . $tblname ." order by ".$order. $criteria;
	$result=mysql_query("$strquery");
	?>
	<Select name=<?=$comboname?> style="width:50%"<?=$checkmultiple?> <?=$event?>="Javascript:<?=$funcname?>">
		<option value='0'>Select Any</option>
		<? while($show=mysql_fetch_array($result)){
			if($show[$valuefield]==$comparevalue){?>
				<option value='<?=$show[$valuefield]?>'Selected>
					<?=$show[$showfield]?>
				</option>		
			<? }else{?>
				<option value='<?=$show[$valuefield]?>'>
					<?=$show[$showfield]?>
				</option>		
			<? }
		}?>
	</select>
<? }?>
















































































































