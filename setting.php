<?php
//setting.php

require_once('tool.php');

$_tool = new Tool();
date_default_timezone_set("Asia/Phnom_Penh");
$date = $_tool->getKhDate(date('Y/m/d'));

$setting = [];

$setting['date'] = $date;
$setting['siteTitle'] = 'ពហុ​ព័ត៌មាន';
$setting['description'] = 'ព័ត៌មាន ចំណេះដឹង វប្បធម៌ កំសាន្ត';
$setting['message'] = '';
$setting['adminPostLimit'] = 10;
$setting['indexPostLimit'] = 10;