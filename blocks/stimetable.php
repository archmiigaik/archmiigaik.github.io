<div id=timetable>
<?php	include("func_timetable.php"); 
		$timetable=new timetable();
		$timetable->timetable_init(); 
		$view_table=$timetable->get_hole_table();?>
<form name="timetables" >
<br>
<button type="button" value="Верхняя" onClick="<?php $view_table='<p>Верхняя</p>'; $view_table.=$timetable->get_verhnya(); ?>">Верхняя</button>
<button type="button" value="Нижняя" onClick="<?php $view_table='<p>Нижняя</p>'; $view_table.=$timetable->get_nizhnya(); ?>">Нижняя</button>
<button type="button" value="Общее" onClick="<?php $view_table='<p>Общее</p>'; $view_table.=$timetable->get_hole_table(); ?>">Общее</button>
</form>
<?php echo $view_table?>
</div>