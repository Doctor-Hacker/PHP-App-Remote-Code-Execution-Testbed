<?php
header("Content-type: text/css");
include('../../../db/colors.php');
$csss = <<<CSS

#stripe li {
  cursor: pointer;
  background: $textcolor;
  color: $bgcolor;
  /*width: 90%;*/
  /*font-size: 10px;*/
  font-family: Arial;
  /*text-align: center;*/
  padding: 5px;
  margin: 5px auto;
}

div#nojavascript {
  background-color: #fffeb8;
  border-bottom: 1px solid;
  height: 2.5em;
  line-height: 2.5em;
  position: absolute;
  top:0;
  width: 100%;
}

div#nojavascript p{
  color: $specialcolor;
  background: transparent url(../images/warning.png) no-repeat 0 46%;
  margin: 0;
  margin-left: 20px;
  display: inline;
  padding: 6px 0px 6px 26px;
}

div#warningInfo {
  background-color: #fffeb8;
  border-bottom: 1px solid;
  height: 2.5em;
  line-height: 2.5em;
  position: relative;
  top:0;
  width: 100%;
}

div#warningInfo p{
  color: $specialcolor;
  background: transparent url(../images/warning.png) no-repeat 0 46%;
  margin: 0;
  margin-left: 20px;
  display: inline;
  padding: 6px 0px 6px 26px;
}

#menustripe {
  margin: 0px;
  padding: 0px;
  color: red;
}


#stripe {
  cursor: pointer;
  font-family: Arial;
  list-style: none;
  background: $textcolor;
  text-align: right;
  padding: 0 1ex;
  margin: 0;
  font-size: 70%;
}

#stripe li {
  display: inline;
  color: $bgcolor;
  background: $textcolor;
  padding-top: 0px;
  padding-bottom: 0px;
  margin-left: 0px;
  margin-top: 0px;
  border: 0;
}

#stripe li a {
  border: 0;
  font-weight: bold;
  color: #FFFFFF;
  background: $textcolor;
  color: $bgcolor;
  margin: 0 2ex;
  text-decoration: none;
  line-height: 25px;
}

#stripe li a:hover {
  text-decoration: underline;
}

#stripe .menu {
  float: left;
  background: $textcolor;
  padding-top: 0;
  padding-bottom: 0;
}

#stripe .menu a {
  float: left;
  background: $textcolor;
  margin-left: 0;
  padding-left: 2ex;
}


#window{
  position: absolute;
  left: -300px;
  top: -300px;
  width: 250px;
  background-color: $bgcolor;
  border: 1px solid $textcolor;
  z-index: 50;
}

#window_handle{
  cursor: pointer; /* fix it to + */ 
  background-color: $textcolor;
  color: green;
  padding:2px;
  text-align:center;
  font-weight:bold;
  color: $bgcolor;
  vertical-align:middle;
}

#window_handle a{
  cursor: pointer;
  background-color: $textcolor;
}

#window_content td{
  color: $textcolor;
  font-family: System, Verdana, Arial, Helvetica, sans-serif;
  font-size: 1em;
  //text-align: center;
  margin: auto;
}

#window_content, #window_content a{
  padding: 5px;
  color: $specialcolor;
  text-decoration: none;
}

#window_content p{
  padding: 2px;
}

#window_content a:hover{
  padding:5px;
  color: $textcolor;
  text-decoration: none;
}

#close{
  float:right;
  text-decoration:none;
  color: $bgcolor;
}

#content{
  text-align:center;
}

#content a{
  border: 1px solid $textcolor;
  text-decoration: none;
  margin: 1px;
  padding: 2px;
}

.scecial{
  color: $specialcolor;
}

#exposeMask {
  /* use a custom background color and image on the mask */
  background: red; //$textcolor;
}

/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  Foot
  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

#foot{
  background-color: $bgcolor;
  clear: both;
  text-align: center;
  padding-top: 5px;
  padding-bottom: 5px;
  font-size: 1em;
  color: $textcolor;
}

#foot p{
  background-color: $bgcolor;
  color: $textcolor;
}

#foot a{
  text-decoration: none;
  color: $textcolor;
  background-color: inherit;
}

#foot a:hover{
  text-decoration: none;
  color: $specialcolor;
}

#foot img{
  border: 0px dotted lime;
}
	

CSS;
echo $csss;

?>
