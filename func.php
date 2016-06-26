<?php
	// Вставка блока основного текста соответственно параметру $page
	function text() 
	{
	 if($_GET['page'] == 'about'){ include("blocks\about.php");  }
	 elseif ($_GET['page'] == 'calculator'){ include("blocks\calculator.php");  }
	 elseif ($_GET['page'] == 'timetable'){ include("blocks\stimetable.php");  }
	   else{ include("blocks\main.php");}
	}                 

    function headerAndMenu() 	
	{
	 include("blocks\header.php");
	}
	
	function footer() 	
	{
	 include("blocks\myfooter.php");
	}
?>