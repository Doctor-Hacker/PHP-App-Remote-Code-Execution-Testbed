<?php
include("../../includes/constants.inc.php");
//include("includes/functions.inc.php");
$connect = mysql_connect(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD);
mysql_select_db(DB_DATABASE, $connect);

$subcategory    = "select es_subcategoryid,subcat_scatname from es_subcategory where subcat_catname='" . $_GET['city_id'] . "' and subcat_status!='inactive'";
$subcategoryres = mysql_query($subcategory);
	while($subcategoryresrow = mysql_fetch_row($subcategoryres)){
?><option value="<?php echo $subcategoryresrow[0];?>"><? echo $subcategoryresrow[1];?></option>
<?php 
}
?> 
          
          
