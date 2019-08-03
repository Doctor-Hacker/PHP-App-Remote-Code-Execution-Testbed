<?
session_start();
include"common_functions.php";
function admin_header($path=null,$title,$head){
if($_SESSION['adminid']=="")
{?>
	<script language="Javascript">window.location=<?=$path?>"index.php"</Script>
<?}	
?>
<html>
<head>
<title>Gayatri School - Admin Panel - <?=$title?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="<?=$path?>includes/admin_style.css" type="text/css" media="screen" />
</head>
<body bgcolor="#cccccc" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- ImageReady Slices (slice3.psd) -->
<table width='728'border='0'align='center'>
	<tr>
		<td valign='top'width='728'>
			<table id="Table_01" width="100%" border="0" cellpadding="0" cellspacing="0" align='center'>
				<tr>
					<td class='left_dashboard'></td>
					<td class='dashboard'>Dashboard <span style="padding-left:550px;"><a href='<?=$path?>admin/logout.php'style="text-decoration:none;color:#ffff00;">Log Out</a></span></td>
					<td class='right_dashboard'></td>
				</tr>
				<tr class='main_tr_color'>
					<td colspan='3'>
						<table width='90%'align='center'border='0'>
							
							<tr>
							<?if($_SESSION['type']=="super"){?>
							
								<td align='center'class='box'><a href='<?=$path?>admin/edit_profile/'class='icon_caption'><img src='<?=$path?>images/home.jpg'border='0'><br><span class="icon_caption">Admin Home</span></a></td>
								<td align='center'class='box'><a href='<?=$path?>admin/user/'class='icon_caption'><img src='<?=$path?>images/human.jpg'border='0'><br><span class="icon_caption">User Management</span></a></td>
								<?}?>
								<td align='center'class='box'><a href='<?=$path?>admin/school/'class='icon_caption'><img src='<?=$path?>images/cat.png'border='0'><br><span class="icon_caption">School Management</a></span></td>
								<td align='center'class='box'><a href='<?=$path?>admin/students/'class='icon_caption'><img src='<?=$path?>images/human.jpg'border='0'><br><span class="icon_caption">Student Management</span></a></td>
								<td align='center'class='box'><a href='<?=$path?>admin/students/'class='icon_caption'><img src='<?=$path?>images/human.jpg'border='0'><br><span class="icon_caption">Staff Management</span></a></td>
								<td align='center'class='box'><a href='<?=$path?>admin/students/'class='icon_caption'><img src='<?=$path?>images/human.jpg'border='0'><br><span class="icon_caption">Accounts Management</span></a></td>
							</tr>
							
						</table>
					</td>
				</tr>
				<tr>
					<td class="downleft_dashboard"></td>
					<td class="dashboard_down"></td>
					<td class="downright_dashboard"></td>
				</tr>
				<tr><td height='30'></td></tr>
				<tr>
					<td class='left_dashboard'></td>
					<td class='dashboard'><?=$title?></td>
					<td class='right_dashboard'></td>
				</tr>
				<tr class="main_tr_color">
					<td colspan='3'height='37'>
					<?}?>
					<?function admin_footer($path=null){?>
					</td>
				</tr>
				<tr>
					<td class="downleft_dashboard"></td>
					<td class="dashboard_down"></td>
					<td class="downright_dashboard"></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<!-- End ImageReady Slices -->
</body>
</html>
<?}?>