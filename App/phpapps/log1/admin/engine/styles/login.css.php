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

body{
  padding: 10px;
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

#myhead{
  margin-left: auto;
  margin-right: auto;
  width: 30%;
}

#myhead table{
    width: 100%;
    border: 1px solid $textcolor;
}

#myhead th{
    text-align: right;
    width: 50%;
}

#myhead td{
    width: 50%;

}

CSS;

echo $csss;
?>