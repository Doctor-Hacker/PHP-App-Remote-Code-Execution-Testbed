<?php
header("Content-type: text/css");
include('../../../db/colors.php');
$csss = <<<CSS

/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  For All
  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
*{
    padding: 0;
    margin: 0px;
    background-color: $bgcolor;
    color: $textcolor;
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
	color: $textcolor;
}

input:hover{
	border: 1px solid $textcolor;
	background-color: $bgcolor;
	color: $textcolor;
}

.button{
    color: $bgcolor;
    background-color: $textcolor;
    border: 1px solid $textcolor;
}

#myhead{
    margin-left: auto;
    margin-right: auto;
    width: 80%;
    padding: 0.1em;
}

#myhead table{
    width:100%;
    border: 1px solid $textcolor;
}

#myhead th{
    width: 20%;
}

#myhead td{
    width: 80%;
	
}

#changeFont {
	position:absolute;
	top:10px;
	right:10px;
	background-color: $bgcolor;
	padding:5px;
}
.increaseFont, .decreaseFont, .resetFont {
	color: $textcolor;
	font-size:14px;
	float:left;
	margin:10px;
}

CSS;

echo $csss;
?>