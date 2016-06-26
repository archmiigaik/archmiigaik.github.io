<?php
  $ch = curl_init();
  // GET запрос указывается в строке URL
  curl_setopt($ch, CURLOPT_URL, 'http://miigaik-schedule.ru/schedule/?faculty=ГУФ&year=3&group=АРХ%20III-1б');

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $data = curl_exec($ch);
  curl_close($ch);
  echo $data;
?> 
