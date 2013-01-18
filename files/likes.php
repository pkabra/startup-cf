<?php

$companies = array();

if(($file = fopen("logos/companies.csv","rw")) !== false){
	while($data = fgetcsv($file)){
		$companies[$data[0]] = $data[1];
	}
}
else die('could not open companies');

fclose($file);

$data = array($_POST['name'], $_POST['email'].'@umich.edu', $_POST['major'], $_POST['level'], $companies[$_POST['idnum']], date("d-m-y"));

if(($file = fopen("likes.csv","a")) !== false){
	if(!fputcsv($file, $data)) die('could not put array');
}
else die('could not open likes');

fclose($file);