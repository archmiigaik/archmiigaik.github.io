﻿<?php
class timetable {
	public $a='';
	public $verhnya='';
	public $nizhnya='';
	public function timetable_init() {
		$ch = curl_init();
		$url = "http://studydep.miigaik.ru/index.php";
		curl_setopt($ch, CURLOPT_URL,$url);
		//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   // возвращает веб-страницу
		curl_setopt($ch, CURLOPT_HEADER, 0);           // не возвращает заголовки
		//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   // переходит по редиректам
		//curl_setopt($ch, CURLOPT_ENCODING, "");        // обрабатывает все кодировки
		//curl_setopt($ch, CURLOPT_MAXREDIRS, 10);       // останавливаться после 10-ого редиректа
		curl_setopt($ch, CURLOPT_POST,1);
		$name1='fak=';
		$name1.=iconv("UTF-8","windows-1251",'ГУФ');
		$name1.='&kurs=3&grup=';
		$name1.=iconv("UTF-8","windows-1251",'АРХ%20III-1б');
		$name1=strval($name1);

		curl_setopt($ch, CURLOPT_POSTFIELDS, $name1);
		//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   // переходит по редиректам
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   // возвращает веб-страницу
		//curl_setopt($ch, CURLOPT_ENCODING, "");        // обрабатывает все кодировки
		//curl_setopt($ch, CURLOPT_MAXREDIRS, 20);       // останавливаться после 10-ого редиректа
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   // переходит по редиректам
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   // возвращает веб-страницу

		$content = curl_exec( $ch ); 

		curl_close($ch);
		$content=iconv("windows-1251","UTF-8",$content);
		//echo $content;
		require_once 'simple_html_dom.php';
		$html = str_get_html($content);
		//echo $html;
		$this->a=$html->find('.t');
		//$a=$a[0]-> innertext;
		$this->a=$this->a[0];
		if ($this->a->innertext!='' and count($this->a->find('td[bgcolor]'))) {
			foreach ($this->a->find('td[bgcolor]') as $tda) {
	//			echo $tda->innertext;
				$new_el = '<tr><td id=special_line colspan=6></td></tr>';
				$new_el .='<td colspan=9 align=left >';
				$new_el .= $tda->innertext;
				$new_el .= '</td>';
				$tda->outertext=$new_el;
	//			echo $tda;
			};
		}
		$tha=$this->a->find('th');
		//echo $tha;
		foreach ($tha as $ttha) {
			$ttha->outertext='';
		}
		if ($this->a->innertext!='' and count($this->a->find('tr[bgcolor]'))) {
			foreach ($this->a->find('tr[bgcolor]') as $tra) {
		//		echo $tra->innertext;
				$new_el='<tr>';
				$new_el .= $tra->innertext;
				$new_el .= '</tr>';
				$tra->outertext=$new_el;
		//		echo $tda;
			};
		}
		
		if ($this->a->innertext!='' and count($this->a->find('tr'))) {
			foreach ($this->a->find('tr') as $tra) {
				$tda=$tra->find('td');
				if (isset($tda[0]->colspan)==0){
					$tda[0]->outertext='';
					$pair_number=$tda[1]->innertext;
					$pair_number=floatval($pair_number);
					$pair_number.='&nbsp;';
					$tda[1]->innertext=$pair_number;
					if ($tda[3]->innertext != '&nbsp; ') {
						$pgtext=$tda[4]->innertext;
						$pgtext.='<br> ';
						$pgtext.=$tda[3]->innertext;
						$pgtext.=' подгруппа';
						$tda[4]->innertext=$pgtext;				
					}
					if ($tda[count($tda)-1]->innertext != '&nbsp;') {
						$pgtext=$tda[4]->innertext;
						$pgtext.='<br> *';
						$pgtext.=$tda[count($tda)-1]->innertext;
						$tda[4]->innertext=$pgtext;				
					}
					$tda[3]->outertext='';
					$tda[count($tda)-1]->outertext='';
					if ($tda[2]->innertext =='верхняя') {
						$memo=$tda[2]->outertext;
						$tda[2]->outertext ='';
						$this->verhnya .= $tra->outertext;
						$tda[2]->outertext = $memo;
					} else {
						$memo=$tda[2]->outertext;
						$tda[2]->outertext ='';
						$this->nizhnya .= $tra->outertext;
						$tda[2]->outertext = $memo;
					}
				}  else {
					$this->verhnya .= $tra->outertext;
					$this->nizhnya .= $tra->outertext;
				}		
			};
		}
	}

	function get_verhnya() {
		$to_view="<table class=tabletime align=center>";
		$to_view .=$this->verhnya;
		$to_view .= "</table>";
		return $to_view;
	}

	function get_nizhnya() {
		$to_view="<table class=tabletime align=center>";
		$to_view .=$this->nizhnya;
		$to_view .= "</table>";
		return $to_view;
	}

	function get_hole_table() {
		$this->a=$this->a-> innertext;
		$to_view="<table class=tabletime align=center>";
		$to_view .=  $this->a;
		$to_view .= "</table>";
		return $to_view;
	}
}
//$html->clear(); // подчищаем за собой
 //unset($html);
//if($html->innertext!='' and count($html->find('.t'))){
//  foreach($html->find('.t') as $a){
//     echo $a;
//  }
//}
//echo $content;
?>
