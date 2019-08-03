<?include "config.php";?>
<?
function generatedynamiccombo($tblname,$valuefield,$showfield,$criteria,$comboname,$comparevalue){
$strqry="Select * from ".$tblname. $criteria;
$result=mysql_query($strqry);?>
<Select name="<?=$comboname?>">
	<?while($show=mysql_fetch_array($result)){?>
		<?if($show[$valuefield]==$comparevalue){?>
			<option value="<?=$show[$valuefield]?>" selected><?=$show[$showfield]?></option>
		<?}
		else{?>
			<option value="<?=$show[$valuefield]?>"><?=$show[$showfield]?></option>
	<?}?>
<?}?>
</select>
<?}?>




<?

	function generatedynamiccombo1($tblname,$showfield,$valuefield,$comparevalue,$comboname,$criteria,$checkmode){
	$strquery="Select * from " . $tblname . $criteria;
	$result=mysql_query("$strquery");
	?>
	<Select name=<?=$comboname?> style="width:80%" <?=$onclick?> id=<?=$strid?>>
		<option value='0'>Select Any</option>
		<?while($show=mysql_fetch_array($result)){
			if($show[$valuefield]==$comparevalue){?>
				<option value='<?=$show[$valuefield]?>'Selected>
					<?=$show[$showfield]?>
				</option>		
			<?}else{?>
				<option value='<?=$show[$valuefield]?>'>
					<?=$show[$showfield]?>
				</option>		
			<?}
		}?>
	</select>
<?}?>
<?function generatedynamiccombo2($tblname,$showfield,$valuefield,$comparevalue,$comboname,$criteria,$checkmultiple,$event,$funcname){
	$strquery="Select * from " . $tblname . $criteria;
	$result=mysql_query("$strquery");
	?>
	<Select name=<?=$comboname?> style="width:80%"<?=$checkmultiple?> <?=$event?>="Javascript:<?=$funcname?>">
		<option value='0'>Select Any</option>
		<?while($show=mysql_fetch_array($result)){
			if($show[$valuefield]==$comparevalue){?>
				<option value='<?=$show[$valuefield]?>'Selected>
					<?=$show[$showfield]?>
				</option>		
			<?}else{?>
				<option value='<?=$show[$valuefield]?>'>
					<?=$show[$showfield]?>
				</option>		
			<?}
		}?>
	</select>
<?}?>
<?
function generatedynamiccombo5($tblname,$valuefield,$showfield,$showfield2,$criteria,$comboname,$comparevalue){
$strqry="Select * from ".$tblname. $criteria;
$result=mysql_query($strqry);?>
<Select name="<?=$comboname?>">
	<?while($show=mysql_fetch_array($result)){?>
		<?if($show[$valuefield]==$comparevalue){?>
			<option value="<?=$show[$valuefield]?>" selected><?=$show[$showfield]." - ".$show[$showfield2]?></option>
		<?}
		else{?>
			<option value="<?=$show[$valuefield]?>"><?=$show[$showfield]." - ".$show[$showfield2]?></option>
	<?}?>
<?}?>
</select>
<?}?>
