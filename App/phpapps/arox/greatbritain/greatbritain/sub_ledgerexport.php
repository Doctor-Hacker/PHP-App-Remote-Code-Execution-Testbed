<?php
include "../includes/config.php";
	$bid=$_POST["cmbobranch"];
	//$resb=mysql_query("select fld_name from tbl_branch_details where fld_bid=$bid");
//	$retb=mysql_fetch_array($resb);
//	$brname=ereg_replace(" ","_",$retb[0]);
//	include "conn.php";
	$csv_output = "Vouchertype \t Receiptno  \t Receiptdate \t Paymentmode \t Bankacc \t Particulars \t Amount \t Narration \t Vouchermode \t Checkno \t Teller_number \t Bank_pin \t Bank_name \t Fromfinance \t Tofinance"; 
   	$csv_output .= "\n"; 
   $result = mysql_query("select * from es_voucherentry"); 

   	while($row = mysql_fetch_array($result)) 
	{ 
       $csv_output .= $row[1]."\t".$row[2]."\t".$row[3]."\t".$row[4]."\t".$row[5]. "\t".$row[6]."\t".$row[7]."\t".$row[8]."\t".$row[9]. "\t".$row[10]."\t".$row[11]."\t".$row[12]."\t".$row[13]."\t".$row[14]."\t".$row[15]."\n";
    } 
	
	$resultq = "cgledger";
	header("Content-type: application/vnd.ms-excel");
	//header("Content-disposition: csv" . "export1.csv");
	header( "Content-disposition: filename=".$resultq.".xls");
	//header("Content-type: application/vnd.ms-excel");
	//header("Content-disposition: csv" . $target_file_name);
	print $csv_output;
?>