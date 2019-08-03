<?php
header("Content-type: text/css");
include('../../../db/colors.php');
$csss = <<<CSS

*{
    background-color: $bgcolor;
    color: $textcolor;
    margin: auto;
}


ul{
  list-style: none;
  border: 1px solid $textcolor;
  background-color: $bgcolor;
  padding: 1em;
}

li {
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


#main td{
  /*text-align: center;*/
  color: $textcolor;
  background-color: $bgcolor;
  /*font-size: 10px;*/
  font-family: Arial;
  border: 1px solid $textcolor;
  padding: 1em;
}


#main .center{
  text-align: center;
}

#main .left{
  text-align: left;
}

CSS;
echo $csss;
?>