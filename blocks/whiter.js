<script>
		var a = document.querySelectorAll('#header li a');
		for (var i=a.length; i--;) {
			if (a[i].href == window.location.pathname || a[i].href == window.location.href) a[i].className += " active";
		}	
</script>