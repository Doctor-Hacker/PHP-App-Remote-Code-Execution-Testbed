<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);


mysqli_select_db($conn,"icampus");



// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

  

  $sqlyear = "SELECT * FROM es_finance_master";
  $sqlclass="select * from es_classes";

$result = mysqli_query($conn, $sqlyear);
$result1 = mysqli_query($conn, $sqlclass);
/*if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Startdate: " . $row["fi_startdate"]. " - Enddate: " . $row["fi_enddate"]. "<br>";
    }
} else {
    echo "0 results";
}
*/

/*$sql_attendance="select * from es_attend_student where  at_attendance='P'";
   
   $result_attendance = mysqli_query($conn, $sql_attendance);*/


if (isset($_POST['present_search']))
 {
  
  $class1 = $_POST['class'];
  $academic_year = $_POST['academic_year'];
  $date1 = $_POST['date1']."%";



  $sql_attendance="select * from es_attend_student where  at_attendance='P' and at_std_class='".$class1."' and at_attendance_date like '".$date1."'";

  //'2015-07-24 00:00:00'
   
   $result_attendance = mysqli_query($conn, $sql_attendance);

 }

 if (isset($_POST['absent_search'])) 
 {
    
    $class1 = $_POST['class'];
  $academic_year = $_POST['academic_year'];
  $date1 = $_POST['date1']."%";



  $sql_attendance="select * from es_attend_student where  at_attendance='A' and at_std_class='".$class1."' and at_attendance_date like '".$date1."'";

  //'2015-07-24 00:00:00'
   
   $result_attendance = mysqli_query($conn, $sql_attendance);


 }

?>


<html>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form method="post" name="present-absent" action="" ><!-- <?=$_SERVER['PHP_SELF'];?> -->
         <tr>
          <td height="25" colspan="4" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Class Report Prsent and Absent Student</span></td>
          </tr>
   <tr >
   <td width="21%" class="narmal">
   Select Class:
   </td>

    <td width="40%" class="narmal">
       <select name="class" id="class">       <?php 

        if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row1 = mysqli_fetch_assoc($result1)) {
        
        //echo "Startdate: " . $row["fi_startdate"]. " to " . $row["fi_enddate"]. "<br>";
    
    ?>

      <option value=<?php echo $row1["es_classesid"]; ?>> 

        <?php echo $row1["es_classname"]; ?>

     </option>

    <?php
    }
    }  ?>
        
 
      </select>
</td>

<td width="21%" class="narmal">
Select Year:
</td>
<td width="40%" class="narmal">
     <select name="academic_year" id="year">
       <?php 

        if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        
        //echo "Startdate: " . $row["fi_startdate"]. " to " . $row["fi_enddate"]. "<br>";
    
    ?>

      <option value=<?php echo $row["fi_startdate"]. " to " . $row["fi_enddate"]; ?>> 

        <?php echo $row["fi_startdate"]. " to " . $row["fi_enddate"]; ?>

     </option>

    <?php
    }
    }  ?>
        


     </select>
</td>
</tr>

<tr>

<td class="narmal">Select Date</td>
<td class="narmal"><input type="date" name="date1" id="date"></td>
<td class="narmal">&nbsp;&nbsp;&nbsp;</td>
<td class="narmal">&nbsp;&nbsp;&nbsp;</td>
</tr>

<!-- <input type="submit" value="present_search"> -->

<tr>

  <td class="narmal">&nbsp;&nbsp;&nbsp;</td>
  <td class="narmal"><input class="bgcolor_02" style="cursor:pointer;" type="submit" name="present_search" value="present_search" onclick="return vaildate();"></td>
  <td class="narmal"><input class="bgcolor_02" style="cursor:pointer;" type="submit" name="absent_search" value="absent_search" onclick="return vaildate();"></td>
  <td class="narmal">&nbsp;&nbsp;&nbsp;</td>

</tr>
</form>
</table>
<br><br>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr class="bgcolor_02">
<th class="narmal">Reg_No#</th>
<th class="narmal">Mobile</th>

<th class="narmal">Student Name</th>
<th class="narmal">at_attendance_date</th>
<th class="narmal">Attendance</th>
</tr>
<?php 
   
$flag=0;

   if (mysqli_num_rows($result_attendance) > 0) {

$flag=1;
    // output data of each row
    while ($row3 = mysqli_fetch_assoc($result_attendance)) {
        

        
?>
<tr>
<td class="narmal"><?php echo $row3['at_reg_no'];?></td>

<td class="narmal"><?php 
$mobile1="select pre_mobile1 from es_preadmission where es_preadmissionid='".$row3['at_reg_no']."'";
$mobile= mysqli_query($conn, $mobile1);

$smsmobile="";
if ($row4 = mysqli_fetch_assoc($mobile)) {  
   echo $row4['pre_mobile1'];
   $smsmobile=$smsmobile.",".$row4['pre_mobile1'];

   $_SESSION['mobile']=$smsmobile;
}

?>
</td>


<td class="narmal"><?php echo $row3['at_stud_name']; ?></td>
<td class="narmal"><?php echo $row3['at_attendance_date']; ?></td>
<td class="narmal"><?php echo $row3['at_attendance']; ?></td>


</tr>
<?php }


} ?>

</table>


<!-- SMS API  -->

<?php

if (isset($_POST['SMS_TO_All'])) {




      $user = "abhish";
    $password = "aab322wrlgkmdbj5i";
    $api_id = "INFORM";
    $baseurl ="http://bulk-sms.in/pushsms.php";
 
    $text = urlencode("Today Your Student is present ");
    $to = $_SESSION['mobile'];

    //echo "Hey....".$to;
 /*
    // auth call
    $url ="http://bulk-sms.in/pushsms.php?username=abhish&api_password=aab322wrlgkmdbj5i&sender=INFORM&to=".$to."&message=".$text."&priority=11"; 

    //"$baseurl/http/auth?user=$user&password=$password&api_id=$api_id";
 
    // do auth call
    $ret = file($url);
 
    // explode our response. return string is on first line of the data returned
    $sess = explode(":",$ret[0]);
    if ($sess[0] == "OK") {
 
        $sess_id = trim($sess[1]); // remove any whitespace
        $url = "http://bulk-sms.in/pushsms.php?username=abhish&api_password=aab322wrlgkmdbj5i&sender=INFORM&to=".$to."&message=".$text."&priority=11";

        //"$baseurl/http/sendmsg?session_id=$sess_id&to=$to&text=$text";
 
        // do sendmsg call
        $ret = file($url);
        $send = explode(":",$ret[0]);
 
        if ($send[0] == "ID") {
            echo "successnmessage ID: ". $send[1];
        } else {
            echo "send message failed";
        }
    } else {
        echo "Authentication failure: ". $ret[0];
    }
*/


// to replace the space in message with  ‘%20’
$url="http://bulk-sms.in/pushsms.php?username=abhish&api_password=aab322wrlgkmdbj5i&sender=INFORM&to=".$to."&message=".$text."&priority=11";
// create a new cURL resource
$ch = curl_init();
// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL,$url);
// grab URL and pass it to the browser
curl_exec($ch);
// close cURL resource, and free up system resources
curl_close($ch);


}
?>
<!-- SMS API End -->

<?php 
//echo $smsmobile

if ($flag==1) {
  
  ?>
<form action="" method="post"> 

<input class="bgcolor_02" style="cursor:pointer;" type="submit" name="SMS_TO_All" value="SMS_TO_All" onclick="return confirm('Are You sure??')">
</form>
  

  <?php
}

?>



</body>
<script type="text/javascript">
function vaildate () {


   var class1=document.getElementById("class");
   var year=document.getElementById("year");
   var date1=document.getElementById("date").value;

 if (date1=="") {

  alert("Select Date ...!!");
  return false;
 };
 return true;
}
</script>
</html>
