<?php
header("Content-type: text/css");
include('../../../db/colors.php');
$csss = <<<CSS

img{
  border: 0px;
}

#uploadForm{
  margin: 5px;
  padding: 5px;
  border: 1px dotted $textcolor;
}

#upload td p{
  font-family: Geneva, Arial, helvetica, sans-serif;
}

#upload{
  margin: 0px;
}
#upload table{
  width:80%;
  border: 1px solid $textcolor;
}

#upload th{
}

#upload td{
  /*width: 20%;*/
  padding: 2px;
}

CSS;
echo $csss;

?>
