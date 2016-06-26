<?php
if(!isset($_GET['page'])){
    $page = 'main';
}
else{
    $page = addslashes(strip_tags(trim($_GET['page'])));
}
?>
<!DOCTYPE html>
<? require("func.php"); ?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>АРХИТЕКТУРА</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<style>

</style>
</head>
<body>
<div id="page">	
	<?php  headerAndMenu()  ?> 
	<?php  text()   ?> 
	<?php  footer()  ?>

	
    <div class="clear"></div>

</div>
</body>
</html>