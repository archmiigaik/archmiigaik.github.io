<div id="header">
		<h1><br><small style= "font-size: 0.2pt;">&nbsp;</small><small 
		style="letter-spacing: 47px; font-size: 33px;">НАПРАВЛЕНИЕ</small>
		<br><b style="border-bottom:2px solid white; padding-bottom:0px;border-top:2px solid white; padding-bottom:0px;">АРХИТЕКТУРА</b><br>
		<small "style= font-size: 0.4pt;"> &nbsp; </small><small style= "letter-spacing: 90px; font-size: 33px;">
		МИИГАиК</small><br><br></h1>
		<ul>
			<li><a href="/index.php">ГЛАВНАЯ</a></li>
			<li><a href="/index.php?page=about">О НАС</a></li>
			<li><a href="/index.php?page=calculator">КАЛЬКУЛЯТОР</a></li>
			<li><a href="/index.php?page=timetable">РАСПИСАНИЕ</a></li>
			<li><a href="/index.php?page=contact">КОНТАКТЫ</a></li>
		</ul>
		
		<script>
		function foo() {
        var matches = document.querySelectorAll('a');
		var limatches = document.querySelectorAll('li');
        for(var i = 0; i < matches.length; i++) {
		   if (matches[i].getAttribute('href')== (window.location.pathname+window.location.search)){			  
			   matches[i].style.backgroundColor = "white";
			   matches[i].style.color = "darkblue";
			   matches[i].style.borderTopLeftRadius="5px"
			   matches[i].style.borderTopRightRadius="5px"
		   }           
        }
        }
	    foo()
        </script>

</div>