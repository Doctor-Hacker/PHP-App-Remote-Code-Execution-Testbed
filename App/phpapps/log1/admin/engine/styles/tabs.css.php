<?php
header("Content-type: text/css");
include('../../../db/colors.php');
$csss = <<<CSS

/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
~~             TABS               ~~
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

*{
    background-color: $bgcolor;
    color: $textcolor;
    margin: auto;
}


.tabs {
  background: $bgcolor;
  color:#111;
  padding:1em 2em;
  width:80%;
  height:550px;
  border:1px solid $textcolor;
  margin:0.1em auto;
}
.tabs li { list-style:none; float:left; }
.tabs ul a {
  display:block;
  padding:6px 10px;
  text-decoration:none;
  margin:1px;
  margin-left:0;
  font:1em Arial;
  color: $bgcolor;
  background: $textcolor;
  border: 2px dashed $textcolor;
}
.tabs ul a:hover {
  color: $bgcolor;
  background: $textcolor;
  }
.tabs ul a.selected {
  margin-bottom:0;
  color: $textcolor;
  background: $bgcolor;
  
  cursor:default;
  }
.tabs div {
  padding:1em 1em 1em 1em;
  /*padding-top:3px;
  margin-top:-15px;*/
  clear:left;
  background: $bgcolor;
  color: $textcolor;
  font:1em Arial;
  border:1px solid $textcolor;
}
.tabs div a {
    color: $bgcolor;
    font-weight:bold;
}

input{
  		padding: 2px;
        color: $bgcolor;
		background-color: $textcolor;
		border: 1px solid $textcolor;
		/*font-size:12px;*/
		/*font-weight:normal;*/
		border: 1px solid $bgcolor;
}

input:focus{
	border: 1px solid $textcolor;
	background-color: $bgcolor;
	color: #000;
}

input:hover{
	border: 1px solid $textcolor;
	background-color: $bgcolor;
	color: #000;
}

.button{
    color: $bgcolor;
    background-color: $textcolor;
    border: 1px solid $textcolor;
}

CSS;
echo $csss;
?>


