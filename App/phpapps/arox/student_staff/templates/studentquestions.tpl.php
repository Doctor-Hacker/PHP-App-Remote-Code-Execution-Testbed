<?php 
	/**
* Only Admin users can view the pages
*/
include("includes/js/fckeditor/fckeditor.php") ;


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
		function getsubjects(countryid,selval)
		{   
			url="?pid=38&action=classwisesubjects_units&cid="+countryid+"&selval="+selval;
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
		function getunits(countryid,selval)
		{   
			url="?pid=38&action=classwiseunitsone&es_subjectid="+countryid+"&selval="+selval;
			url=url+"&sid="+Math.random();
			xmlHttp1=GetXmlHttpObject(countryChangedunits);
			xmlHttp1.open("GET", url, true);
			xmlHttp1.send(null);
		}
		function countryChangedunits()
		{
			if (xmlHttp1.readyState==4 || xmlHttp1.readyState=="complete")
			{
				document.getElementById("unitselectbox").innerHTML=xmlHttp1.responseText
			}
		}
		
		
		
		function getchapters(unit_id,selval)
		{   
			url="?pid=38&action=unitwisechapters&unit_id="+unit_id+"&selval="+selval;
			url=url+"&sid="+Math.random();
			xmlHttp5=GetXmlHttpObject(countryChangedchapters);
			xmlHttp5.open("GET", url, true);
			xmlHttp5.send(null);
		}
		function countryChangedchapters()
		{
			if (xmlHttp5.readyState==4 || xmlHttp5.readyState=="complete")
			{
				document.getElementById("chapterselectbox").innerHTML=xmlHttp5.responseText
			}
		}
		
		
		
	<!--Addin chapter actions compleated-->
		
	
	<!-- Search chapters -->
	
	function getallsubjects(countryid,getselected)
		{   
			
			url="?pid=38&action=classwisesubjectstwo&cid="+countryid+"&selval="+getselected;
			url=url+"&sid="+Math.random();
			xmlHttp3=GetXmlHttpObject(countryChangedtwo);
			xmlHttp3.open("GET", url, true);
			xmlHttp3.send(null);
		}
		
		function countryChangedtwo()
		{
			if (xmlHttp3.readyState==4 || xmlHttp3.readyState=="complete")
			{
				document.getElementById("subject2selectbox").innerHTML=xmlHttp3.responseText
			}
		}
	
		function getunits2(subjectid,selval)
		{   
			url="?pid=38&action=classwiseunits2&subjectid="+subjectid+"&selval="+selval;
			url=url+"&sid="+Math.random();
			xmlHttp4=GetXmlHttpObject(countryChangedunits2);
			xmlHttp4.open("GET", url, true);
			xmlHttp4.send(null);
		}
		function countryChangedunits2()
		{
			if (xmlHttp4.readyState==4 || xmlHttp4.readyState=="complete")
			{
				document.getElementById("unitselectbox2").innerHTML=xmlHttp4.responseText
			}
		}
		
		function getchapterstwo(unit_id,selval)
		{   
			url="?pid=38&action=chpaters2&unit_id="+unit_id+"&selval="+selval;
			url=url+"&sid="+Math.random();
			xmlHttp7=GetXmlHttpObject(countryChangedunits3);
			xmlHttp7.open("GET", url, true);
			xmlHttp7.send(null);
		}
		function countryChangedunits3()
		{
			if (xmlHttp7.readyState==4 || xmlHttp7.readyState=="complete")
			{
				document.getElementById("chapterselectbox2").innerHTML=xmlHttp7.responseText
			}
		}
		
</script>
<?php if($action == 'list') { ?>


<table width="100%" border="0" cellspacing="0" cellpadding="0">

				<tr>
         <td height="3" colspan="3"></td>
	 </tr>	
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;<span class="admin">Take Exam</span></td>
              </tr>
               <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="25" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>
             <!--  <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td align="right" height="25"><form action=""  method="post"><input type="submit" class="bgcolor_02" name="addtutorial" value="Add Question" />&nbsp;</form></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>	         		  
             -->
			  	
			   		  
              
			   
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="center" valign="top">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
              <td><form method="post" name="addun" action="">
				<table width="90%" border="0" cellpadding="2" cellspacing="0">
                            <tr height="25" >
                              <td width="7%" align="left" class="narmal">&nbsp;</td>
                              <td width="15%" align="left" class="narmal">Class</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="77%" align="left" class="narmal"><select name="classesid" onChange="getallsubjects(this.value,'')">
                              <option value="">- Select -</option>
							  <?php 
							  if (is_array($classlistarr) && count($classlistarr) > 0) { 
							  foreach ($classlistarr as $eachrecord){ ?>
                            <option <?php if($eachrecord['es_classesid']==$classesid){ ?> selected="selected" <?php } ?> value="<?php echo $eachrecord['es_classesid']; ?>"><?php echo $eachrecord['es_classname']; ?></option>                            
							<?php } }?>							
                          </select><font color="#FF0000">&nbsp;*</font></td>
                  </tr>
                             <tr height="25" >
                               <td width="7%" align="left" class="narmal">&nbsp;</td>
                               <td width="15%" align="left" class="narmal">Subject</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="77%" align="left" class="narmal" id="subject2selectbox"><select name="subjectid"  ><option value="">- Select -</option></select><font color="#FF0000">&nbsp;*</font> </td>
                  </tr>
				  <?php if($classesid!=""){ ?>
                              <script type="text/javascript">
							  getallsubjects('<?php echo $classesid; ?>','<?php echo $subjectid; ?>')
							  </script>
                              
                              
                              <?php } ?>
				 		 <tr height="25" >
                               <td width="7%" align="left" class="narmal">&nbsp;</td>
                               <td width="15%" align="left" class="narmal">Unit Name</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="77%" align="left" class="narmal" id="unitselectbox2"><select name="unit_id"><option value="">- Select -</option></select><font color="#FF0000">&nbsp;*</font>
							  <?php if($subjectid!=""){ ?>
                              <script type="text/javascript">
							  getunits2('<?php echo $subjectid; ?>','<?php echo $unit_id; ?>')
							  </script>
							  <?php }?>
							  </td>
							 
                  </tr>
				  
				   <tr height="25" >
                               <td width="7%" align="left" class="narmal">&nbsp;</td>
                               <td width="15%" align="left" class="narmal">Chapter&nbsp;Name</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="77%" align="left" class="narmal" id="chapterselectbox2"><select name="chapter_id" ><option value="">- Select -</option></select><font color="#FF0000">&nbsp;*</font> 
							  
							   <?php if($unit_id!=""){ ?>
                              <script type="text/javascript">
							  getchapterstwo('<?php echo $unit_id; ?>','<?php echo $chapter_id; ?>')
							  </script>
                              
                              
                              <?php } ?></td>
							  
                              
                              
                             
                  </tr>
                             
							
							<tr height="25">
							  <td align="left" width="7%" class="narmal"></td>
							  <td align="left" width="15%" class="narmal"></td>
                             
							 
							
							  <td align="left" width="1%" class="narmal"></td>
							  <td align="left" width="77%" class="narmal"><input type="submit" class="bgcolor_02" name="searchunit" value="Start Test" /></td>
			      </tr>			
                  </table>						
                  </form>
              </td>
              </tr>
                </table>         

				
				</td>
                <td width="1" class="bgcolor_02">
				</td>
              </tr>
			   <tr>
                <td height="1" colspan="3" class="bgcolor_02"  ></td>
              </tr>	
			  
   
</table>

<?php } ?>

<?php if($action == 'chapterexam') { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

				<tr>
         <td height="3" colspan="3"></td>
	 </tr>	
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;<span class="admin">Take Exam</span></td>
              </tr>
               <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="25" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>
  	           <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="25" align="left"><table  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td >&nbsp;&nbsp;<?php echo $unitsarr['es_classname']; ?></td>
    <td>&nbsp; &raquo;&nbsp;</td>
    <td> <?php echo $unitsarr['es_subjectname']; ?></td>
    <td height="30">&nbsp;&raquo;&nbsp;</td>
    <td><?php echo $unitsarr['unit_name']; ?></td>
    <td>&nbsp; &raquo;&nbsp;</td>
    <td> <?php echo $unitsarr['chapter_name']; ?></td>
    <td>  &nbsp;&nbsp; (Total Questions : <?php echo $tot_questions; ?>)</td>
  </tr>
</table></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>  	   		  
               
               <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;<span class="admin">Question <?php echo $start+1; ?></span></td>
              </tr>
			   
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="center" valign="top">             
                

                    <form  action=""name="" method="post">
                                
                    <table width="100%" border="0">
                    <?php if($no_records>0){ ?>  
                      <tr>
                        <td colspan="2"><table width="100%" border="0">
                      <tr>
                        <td align="center" class="normal" width="15%"><?php $rownum=$start+1; echo $rownum?>)</td><td align="left" class="normal" width="85%"><?php echo $unitsarr['question'];?></td>
                      </tr>
                    </table>
                    </td>
                        
                      </tr>
                      <tr>
                        <td width="15%">&nbsp;</td>
                        <td><table width="100%" border="0">
                      <tr>
                        <td width="3%" align="left"><?php echo $html_obj->draw_radiobutton('answer','A'); ?></td>
                        <td width="3%" align="left">A)</td>
                        <td width="94%" align="left"><?php echo $unitsarr['choice_1'];?></td>
                      </tr>
                      <tr>
                        <td align="left"><?php echo $html_obj->draw_radiobutton('answer','B'); ?></td>
                        <td align="left">B)</td>
                        <td align="left"><?php echo $unitsarr['choice_2'];?></td>
                      </tr>
                      <tr>
                        <td align="left"><?php echo $html_obj->draw_radiobutton('answer','C'); ?></td>
                        <td align="left">C)</td>
                        <td align="left"><?php echo $unitsarr['choice_3'];?></td>
                      </tr>
                      <tr>
                        <td align="left"><?php echo $html_obj->draw_radiobutton('answer','D'); ?></td>
                        <td align="left">D)</td>
                        <td align="left"><?php echo $unitsarr['choice_4'];?></td>
                      </tr> 
                    </table>
                    </td>
                        
                      </tr>
                     <tr><td colspan="2" align="center">                   
                    <input type="submit" value="Next" name="submit_question" class="bgcolor_02" /></td></tr> 
                     <?php }?> 
                    </table>
                    </form>

				
				</td>
                <td width="1" class="bgcolor_02">
				</td>
              </tr>
			   <tr>
                <td height="1" colspan="3" class="bgcolor_02"  ></td>
              </tr>	
			  
   
</table>

<?php } ?>
<script type="text/javascript">

function newWindowOpen(href){
    window.open(href,null, 'width=900,height=900,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
}

function feedWindowOpen(href){
    window.open(href,null, 'width=600,height=400,scrollbars=no,toolbar=no,directories=no,status=no,menubar=yes,left=240,top=100');
}
</script>

<?php if($action == 'showresult' || $action=='printresult' || $action=='printresult1') { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	 <?php if( $action=='printresult') {
	 
	 $std_arr = get_studentdetails( $_SESSION['eschools']['user_id'] );
	 
	  ?>
	 <tr>
         <td height="3" colspan="3">
		 <table width="100%" border="0">
  <tr>
    <td width="9%" align="left" class="narmal">Student&nbsp;Name:</td>
    <td width="91%" align="left" class="narmal"><b><?php echo  ucwords($std_arr['pre_name']);?></b></td>
  </tr>
  <tr>
    <td align="left" class="narmal">Class: </td>
    <td align="left" class="narmal"><b><?php echo  ucwords(classname($std_arr['pre_class']));?></b></td>
  </tr>
</table>
 </td>
	 </tr>	
	 
	 <?php }?>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Test  Result </span></td>
              </tr>
               
  	           <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="25" align="left"><table  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td >&nbsp;&nbsp;<?php echo $unitsarr['es_classname']; ?></td>
    <td>&nbsp; &raquo;&nbsp;</td>
    <td> <?php echo $unitsarr['es_subjectname']; ?></td>
    <td height="30">&nbsp;&raquo;&nbsp;</td>
    <td><?php echo $unitsarr['unit_name']; ?></td>
    <td>&nbsp; &raquo;&nbsp;</td>
    <td> <?php echo $unitsarr['chapter_name']; ?></td>
    <td>  &nbsp;&nbsp; (Total Questions : <?php echo $tot_questions; ?>)</td>
  </tr>
</table>
 </td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>  	   		  
               
              
			   
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="center" valign="top">
                	<table width="90%" border="0" cellspacing="4" cellpadding="0">
					<?php if( $action!='printresult') { ?>
                            <tr>
                            <td height="60" align="center" style="font-size: 16px; color:#990000; font-weight:bold;" >Congratulations !!! You have successfully attempted the exam.<br /> 
                              Below are your results</td>
                            </tr>
                            <tr>
                            <td height="5" align="center"  ><hr /></td>
                            </tr>
                            <tr>
                            <td align="center">
                            <table width="299" border="0" cellspacing="3" cellpadding="0">
                              <tr>
                                <td align="left" width="80%">Total Questions</td>
                                <td align="left" width="5%">:</td>
                                <td align="left" width="15%"><?php echo $tot_questions; ?></td>
                              </tr>
                              <tr>
                                <td align="left">Attempted Questions</td>
                                <td align="left">:</td>
                                <td align="left"><?php echo count($_SESSION['eschools']['exam']['question']); ?></td>
                              </tr>
                              <tr>
                                <td align="left">Correct Answers</td>
                                <td align="left">:</td>
                                <td align="left"><?php echo $correct_answers; ?></td>
                              </tr>
                              <tr>
                                <td align="left">Marks Obtained</td>
                                <td align="left">:</td>
                                <td align="left"><?php 
                            $total_que = count($_SESSION['eschools']['exam']['question']);
                            $result = ((float)$correct_answers/(float)$tot_questions)*100;
                            echo round($result,2);
                             ?> %</td>
                              </tr>
                              <tr>
                                <td align="left">&nbsp;</td>
                                <td align="left">&nbsp;</td>
                                <td align="left">&nbsp;</td>
                              </tr>
                              <tr>
                                <td colspan="3" align="center"><script type="text/javascript" src="includes/js/progressbar/prototype/prototype.js"></script>
                            
                            <script type="text/javascript" src="includes/js/progressbar/bramus/jsProgressBarHandler.js"></script>
                            
                            
                            <style type = "text/css">
                            
                                /* General Links */
                            
                                #demo {
                                    margin : 0 auto;
                                    width:100%;
                                }
                            
                                #demo .extra {
                                    padding-left:30px;
                                }
                            
                                #demo .options {
                                    padding-left:10px;
                                }
                            
                                #demo .getOption {
                                    padding-left:10px;
                                    padding-right:20px;
                                }
                                .percentText{
                                padding-left:4px;
                                }
                            
                            </style>
                            
                            
                            
                                    
                                
                            
                                    
                                    <span id="element6">[ Loading Progress Bar ]</span>
                                    
                            
                                    <script type="text/javascript">
                                        document.observe('dom:loaded', function() {
                            
                                                                
                            
                                            // second manual example : multicolor (and take all other default paramters)
                                            manualPB2 = new JS_BRAMUS.jsProgressBar(
                                                        $('element6'),
                                                        <?php echo round($result,0); ?>,
                                                        {
                            
                                                            barImage	: Array(
                                                                'images/bramus/percentImage_back4.png',
                                                                'images/bramus/percentImage_back3.png',
                                                                'images/bramus/percentImage_back2.png',
                                                                'images/bramus/percentImage_back1.png'
                                                            ),
                            
                                                            onTick : function(pbObj) {
                            
                                                                switch(pbObj.getPercentage()) {
                            
                                                                    case 98:
                                                                        //alert('Hey, we\'re at 98!');
                                                                    break;
                            
                                                                    case 100:
                                                                        //alert('Progressbar full at 100% ... maybe do a redirect or sth like that here?');
                                                                    break;
                            
                                                                }
                            
                                                                return true;
                                                            }
                                                        }
                                                    );
                                        }, false);
                                    </script>
                            
                                
                            
                            <!-- STATS -->
                            
                            
                            <script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
                            <script type="text/javascript">
                                // <![CDATA[
                                _uacct = "UA-107008-4";
                                urchinTracker();
                                // ]]>
                            </script></td>
                                </tr>
                            </table></td>
                            </tr>
    				<?php } ?>
					<?php if( $action=='showresult') {?>
					<?php 
                                    if(count($tot_fed_questions)>=1){ ?>
                            <tr>
                                <td height="40" align="right"><input name="Submit" type="button" style="cursor:pointer" onclick="newWindowOpen ('?pid=40&action=printresult1');" class="bgcolor_02" value="Print" /></td>
                            </tr>
					<?php } }?>
  					<?php if( $action!='printresult1') { ?>
					 <?php 
                                    if(count($tot_fed_questions)>=1){ ?>
                            <tr class="bgcolor_02">
                            <td height="25" align="left" class="admin">&nbsp;Answer Key</td>
                            </tr>
							<?php } ?>
                            <tr>
                                <td align="left" class="narmal">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            
                                    <?php 
                                    if(count($tot_fed_questions)>=1){ 
                                        $feedi = 1;
                                        foreach($tot_fed_questions as $eachfeedrecord){
                                    ?>
                                        <tr>
                                            <td><table width="100%" border="0">
                                                
                                                  <tr>
                                                    <td colspan="2"><table width="100%" border="0">
                                                  <tr>
                                                    <td align="center" class="normal" width="15%"><?php echo $feedi; $feedi++;?>)</td><td align="left" class="normal" width="85%"><?php echo $eachfeedrecord['question'];?></td>
                                                  </tr>
                                                </table>
                                                </td>
                                                    
                                                  </tr>
                                                  <tr>
                                                    <td width="15%">&nbsp;</td>
                                                    <td><table width="100%" border="0">
                                                  <tr>
                                                    <td width="3%" align="left"><?php if($eachfeedrecord['answer'] == "A"){ ?><img src="images/correct_24.png" border="0" /><?php } ?></td>
                                                    <td width="3%" align="left">A)</td>
                                                    <td width="94%" align="left"><?php echo $eachfeedrecord['choice_1'];?></td>
                                                  </tr>
                                                  <tr>
                                                    <td align="left"><?php if($eachfeedrecord['answer']=='B'){ ?><img src="images/correct_24.png" border="0" /><?php } ?></td>
                                                    <td align="left">B)</td>
                                                    <td align="left"><?php echo $eachfeedrecord['choice_2'];?></td>
                                                  </tr>
                                                  <tr>
                                                    <td align="left"><?php if($eachfeedrecord['answer']=='C'){ ?><img src="images/correct_24.png" border="0" /><?php } ?></td>
                                                    <td align="left">C)</td>
                                                    <td align="left"><?php echo $eachfeedrecord['choice_3'];?></td>
                                                  </tr>
                                                  <tr>
                                                    <td align="left"><?php if($eachfeedrecord['answer']=='D'){ ?><img src="images/correct_24.png" border="0" /><?php } ?></td>
                                                    <td align="left">D)</td>
                                                    <td align="left"><?php echo $eachfeedrecord['choice_4'];?></td>
                                                  </tr> 
                                                   <tr>
                                                    <td colspan="3" align="left" valign="top">
                                                    <table width="100%">
                                                    <tr><td width="23%" align="left" valign="middle">Your answer is </td>
                                                    <td width="3%" align="left" valign="middle"> <?php
                                                    $quest_id_feed = $eachfeedrecord['q_id']; 
                                                     if($_SESSION['eschools']['exam']['question'][$quest_id_feed]!=""){
                                                     echo '"'. $_SESSION['eschools']['exam']['question'][$quest_id_feed].'"</td>'; } 
                                                     if($_SESSION['eschools']['exam']['question'][$quest_id_feed]==$eachfeedrecord['answer']){ 
                                                     echo '<td align="left" valign="bottom"><img src="images/correct_24.png" border="0"  />'; } else { echo '<td align="left" valign="bottom"><img src="images/wrong_24.png" border="0" />'; } ?> </td>
                                                    </tr>
                                                    </table> 
                                                    
                                                   </td>
                                                  </tr> 
                                                    <tr>
                                                    <td colspan="3" align="left"><?php if($action!="printresult"){ ?><a href="javascript: void(0)" onclick="feedWindowOpen('?pid=40&action=viewfeedback&qid=<?php echo $eachfeedrecord['q_id'] ?>&qans=<?php echo $_SESSION['eschools']['exam']['question'][$quest_id_feed]; ?>')" class="video_link" >View Feedback</a><?php }else{ 

$question_arr = $db->getrow("SELECT * FROM es_questionbank WHERE q_id=".$eachfeedrecord['q_id']);
	if($qans==$question_arr['answer']){
	$feedback = $question_arr['correct_ans'];
	}else{
	$feedback = $question_arr['wrong_ans'];
	
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">
    	<table width="90%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="30" align="left">&nbsp;Feedback </td>
                <td align="left">:</td>
                <td align="left"><?php echo $feedback;?></td>
              </tr>
      </table>

    </td>    
	</tr>
</table>

<?php } ?>
													<?php }?></td>
                                                  </tr> 
                                                </table>
                                                </td>                       
                                                  </tr>
                                                 
                                                
                                            </table></td>
                                        </tr>
                                        <tr class="bgcolor_02">
                                            <td height="1"></td>
                                        </tr>
                            <?php 		}
                                    } 
                                ?>
                                    </table>
                                </td>
                            </tr>
                            <tr>
        <td height="10" align="right"><hr /></td>
      </tr>
                    <?php }?>
					<?php if( $action=='showresult') {?>
                         <?php 
                                    if(count($tot_fed_questions)>=1){ ?>   <tr>
                                <td height="40" align="right"><input name="Submit" type="button" style="cursor:pointer" onclick="newWindowOpen ('?pid=40&action=printresult');" class="bgcolor_02" value="Print" /></td>
                            </tr>
					<?php }}?>
                    </table>                
                </td>
                <td width="1" class="bgcolor_02">
				</td>
              </tr>
			   <tr>
                <td height="1" colspan="3" class="bgcolor_02"  ></td>
              </tr>	
			  
   
</table>

<?php } ?>

<?php 
if($action == 'viewfeedback') { 
$question_arr = $db->getrow("SELECT * FROM es_questionbank WHERE q_id=".$qid);
	if($qans==$question_arr['answer']){
	$feedback = $question_arr['correct_ans'];
	}else{
	$feedback = $question_arr['wrong_ans'];
	}
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
    	<td height="20"></td>
    </tr>
  <tr>
    <td align="center">
    	<table width="90%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="30"  colspan="3" align="left" class="bgcolor_02">&nbsp;Feedback</td>    
              </tr>
              <tr>
                <td width="22%" height="30" align="left">&nbsp;Question</td>
                <td width="1%" align="left">:</td>
                <td width="77%" align="left"><?php echo $question_arr['question'];?></td>
              </tr>              
              <tr>
                <td height="30" align="left">&nbsp;Feedback </td>
                <td align="left">:</td>
                <td align="left"><?php echo $feedback;?></td>
              </tr>
      </table>

    </td>    
	</tr>
</table>

<?php } ?>

<?php if($action == 'add') { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

				 
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>	<tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Question Bank Management</span></td>
              </tr>	
               <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>		  
               <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Add Question</span></td>
              </tr>	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
                <form method="post" name="addun" action="" enctype="multipart/form-data">
				<table width="90%" border="0" cellpadding="2" cellspacing="0">
                            <tr height="25" >
                              <td width="13%" align="left" class="narmal">Class</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal">
							  <select name="es_classesid" onChange="getsubjects(this.value,'')">
                              <option value="">- Select -</option>
							  <?php 
							  if (is_array($classlistarr) && count($classlistarr) > 0) { 
							  foreach ($classlistarr as $eachrecord){ ?>
                            <option <?php if($eachrecord['es_classesid']==$es_classesid){ ?> selected="selected" <?php } ?> value="<?php echo $eachrecord['es_classesid']; ?>"><?php echo $eachrecord['es_classname']; ?></option>                            
							<?php } }?>							
                          </select><font color="#FF0000">&nbsp;*</font></td>
                  </tr>
                             <tr height="25" >
                               <td width="13%" align="left" class="narmal">Subject</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal" id="subjectselectbox">
							  
							  <select name="es_subjectid"><option value="">- Select -</option></select><font color="#FF0000">&nbsp;*</font>						  </td>
                  </tr>
                             <tr height="25" >
                               <td width="13%" align="left" class="narmal"> <?php if($es_classesid!=""){ ?>
							<script type="text/javascript">
							getsubjects('<?php echo $es_classesid; ?>','<?php echo $es_subjectid; ?>');
							</script>
							<?php } ?>Unit Name</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal" id="unitselectbox"><select name="unit_id" ><option value="">- Select -</option></select><font color="#FF0000">&nbsp;*</font>
							  <?php if($es_subjectid!=""){ ?>
							<script type="text/javascript">
							getunits('<?php echo $es_subjectid; ?>','<?php echo $unit_id; ?>');
							</script>
							<?php } ?>							  </td>
                  </tr>
				   
				  <tr height="25" >
                               <td width="13%" align="left" class="narmal">Chapter&nbsp;Name</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal" id="chapterselectbox"><select name="chapter_id" ><option value="">- Select -</option></select><font color="#FF0000">&nbsp;*</font></td>
                  </tr>
				  <?php if($unit_id!=""){ ?>
							<script type="text/javascript">
							getchapters('<?php echo $unit_id; ?>','<?php echo $chapter_id; ?>');
							</script>
							<?php } ?>
							
							
							 <tr height="25" >
                               <td width="13%" align="left" class="narmal">Question</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal" ><?php echo $html_obj->draw_textarea('question',$rs_editphoto['question'],'class=""',''); ?><font color="#FF0000">&nbsp;*</font></td>
                  </tr>
				  
				  <tr height="25" >
                               <td width="13%" align="left" class="narmal">A)</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal" ><?php echo $html_obj->draw_textarea('choice_1',$rs_editphoto['choice_1']); ?><font color="#FF0000">&nbsp;*</font></td>
                  </tr>
				  <tr height="25" >
                               <td width="13%" align="left" class="narmal">B)</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal" ><?php echo $html_obj->draw_textarea('choice_2',$rs_editphoto['choice_2']); ?><font color="#FF0000">&nbsp;*</font></td>
                  </tr>
				  <tr height="25" >
                               <td width="13%" align="left" class="narmal">C)</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal" ><?php echo $html_obj->draw_textarea('choice_3',$rs_editphoto['choice_3']); ?><font color="#FF0000">&nbsp;*</font></td>
                  </tr>
				  <tr height="25" >
                               <td width="13%" align="left" class="narmal">D)</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal" ><?php echo $html_obj->draw_textarea('choice_4',$rs_editphoto['choice_4']); ?><font color="#FF0000">&nbsp;*</font></td>
                  </tr>
				  <tr height="25" >
                               <td width="13%" align="left" class="narmal">Answer</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal" >
							  <table width="100%" border="0">
							  <?php 
							   if(!isset($answer) && $answer=="" || $answer=='D'){$d = "checked='checked'";}
							   if(isset($answer) && $answer=='A'){$a = "checked='checked'";}
							   if(isset($answer) && $answer=='B'){$b = "checked='checked'";}
							   if(isset($answer) && $answer=='C'){$c = "checked='checked'";}
							  ?>
  <tr>
    <td>A&nbsp;<?php echo $html_obj->draw_radiobutton('answer','A','',$a); ?></td>
    <td>B&nbsp;<?php echo $html_obj->draw_radiobutton('answer','B','',$b); ?></td>
    <td>C&nbsp;<?php echo $html_obj->draw_radiobutton('answer','C','',$c); ?></td>
    <td>D&nbsp;<?php echo $html_obj->draw_radiobutton('answer','D','',$d); ?>&nbsp;<font color="#FF0000">&nbsp;*</font></td>
  </tr>
</table>

							  
							 </td>
                  </tr>
				  
				  
                  
				   
							<tr height="25">
							  <td align="left" width="13%" class="narmal"></td>
                             
							 
							
							  <td align="left" width="1%" class="narmal"></td>
							  <td align="left" width="86%" class="narmal"><input type="submit" class="bgcolor_02" name="addchapter" value="Add" /></td>
			      </tr>			
                  </table>						
                  </form>
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
               <tr>
                <td height="5" colspan="3"  ></td>
              </tr>	             
              
              
             
   
</table>

<?php } ?>

<?php  if($action=="viewtutorial"){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

				 
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>	<tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Question Bank Management</span></td>
              </tr>	
               <tr>
                <td height="5" colspan="3"  ></td>
              </tr>			  
               <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">View Question</span></td>
              </tr>	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><table width="95%"  border="0" cellpadding="2" cellspacing="0">
				
				  
                            <tr height="25" >
                              <td width="13%" height="27" align="left" class="narmal">Unit&nbsp;Name </td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['unit_name']; ?></td>
                  </tr>
				  
                             <tr height="25" >
                               <td width="13%" align="left" class="narmal">Chapter&nbsp;Name </td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['chapter_name']; ?></td>
                  </tr>
                             <tr height="25" >
                               <td width="13%" align="left" class="narmal"> Question </td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['question']; ?></td>
                  </tr>
				  <tr height="25" >
                               <td width="13%" align="left" class="narmal">A)</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                               <td width="86%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['choice_1']; ?></td>
				  </tr>
				   <tr height="25" >
                               <td width="13%" align="left" class="narmal">B)</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                               <td width="86%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['choice_2']; ?></td>
				  </tr>
				   <tr height="25" >
                               <td width="13%" align="left" class="narmal">C)</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                               <td width="86%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['choice_3']; ?></td>
				  </tr>
				   <tr height="25" >
                               <td width="13%" align="left" class="narmal">D)</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                               <td width="86%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['choice_4']; ?></td>
				  </tr>
				    <tr height="25" >
                               <td width="13%" align="left" class="narmal">Answer</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                               <td width="86%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['answer']; ?></td>
				  </tr>
				  <tr height="25" >
                              <td width="13%" height="27" align="left" class="narmal">Added By</td>
                  <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" valign="middle" class="narmal"><?php echo $username; ?> (<?php echo $viewtutorial['user_type']; ?>)</td>
                  </tr>
					<tr height="25" >
                               <td width="13%" align="left" class="narmal">&nbsp;</td>
                               <td width="1%" align="left" class="narmal">&nbsp;</td>							   
                               <td width="86%" align="left" class="narmal"><input name="" type="button" value="Back"  onclick="javascript:history.go(-1);" style="cursor:pointer;" class="bgcolor_02"/></td>
				  </tr>				
                  </table>
                
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
             
               
              
              
  		     <tr><td colspan="3" class="bgcolor_02" height="1"></td></tr>
			  
			  
   
</table>

<?php } ?>
			

			
						
			
