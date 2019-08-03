<!DOCTYPE HTML>
<html>
<head>
<title><?php if($notFound=='0') { echo $title; } else { echo $siteName . ': Page not found'; }?></title>
<meta name="description" content="<?php if($notFound=='0') { echo $metaDescription; } else { echo ''; } ?>">
<meta name="keywords" content="<?php if($notFound=='0') { echo $metaKeywords; } else { echo ''; } ?>">
<meta name="author" content="Jim Valentine (Lunar CMS)" >
<link rel="stylesheet" type="text/css" href="templates/grey_site/menu.css">
<style type="text/css">
body {
    background-color: #333333;
    padding: 0px;
    margin: 0px;
  font-family: Helvetica, sans-serif;
}
#head {
    width: 854px;
    padding: 15px;
    margin: auto;
}
#sitename {
    font-family: "Arial Black", Gadget, sans-serif;
    font-size: 35px;
    color: #FFFFFF;
    float: left;
}
#content {
    background-color: #ffffff;
    width: 850px;
    margin: auto;
    padding: 25px;
    color: #333333;
    margin-bottom: 60px;
}
#cssmenu {
    float: right;
}
#foot {
    height:50px;
    width: 100%;
    position: fixed;
    bottom: 0px;
    left: 0px;
    line-height: 50px;
    text-align: center;
    border-top: 10px solid #333333;
    background: -webkit-linear-gradient(#FFF, #CCC); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(#FFF, #CCC); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(#FFF, #CCC); /* For Firefox 3.6 to 15 */
    background: linear-gradient(#FFF, #CCC); /* Standard syntax (must be last) */
}
.form {
    width:400px;
}
.error{
    color: red;
}
</style>
</head>
<body>
<div id="head">
    <div id="sitename"><?php echo $siteName; ?></div>
    <div id="cssmenu">
        <!-- Load the menu file -->
        <?php include('includes/menu.php'); ?>    
    </div>
    <br clear="all">
</div>
<div id="content">
