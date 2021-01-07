<?php

	// Comptia Form Handler
	// ====



	// Global Settings
	// ----


	$settings['data_file'].= getMonday().'.csv';
	$settings['cols'] = array("Date (Y-m-d H:i:s)","First Name","Last Name","Organization","Profession","Email","Remote Address","User Agent");
	$settings['fields'] = array("date","first-name","last-name","organization","profession","email","remote-address","user-agent");
	$settings['post'] = array("first-name","last-name","organization","profession","email","comments","age");
	// $settings['download'] => 'http://rosie.stagingcms.com/avatar/20-01-14-04-02-12';

	// Data Handlers
	// ----

		// check for data
function getPost(){
	global $settings;

	$error = array();
	$data = array();

	foreach ($settings['post'] as $post) {
		if(isset($_POST[$post])){$data[$post] = $_POST[$post];}
		else{$data[$post] = false;}
	}
	return $data;
}


		// validate data
function isValidEmail($email) {return preg_match('/@.+\./', $email);}

function validateData($data){
	$errors = array('cnt'=>0);

	foreach ($data as $key => $value) {
		if($key == 'email' && !isValidEmail($value)){
			$errors['cnt']++;
			$errors[$key] = 'requires valid email';
		}elseif($key == 'age'){
			if($value != "1987"){
				$errors['cnt']++;
				$errors[$key] = "an error occored";
			}
		}elseif($key == 'comments'){
			if(strlen($value) != 0) {
				$errors['cnt']++;
				$errors[$key] = "an error occored";
			}
		}elseif(strlen($value) < 1){
			$errors['cnt']++;
			$errors[$key] = "required field";
		}
	}
	return $errors;
}



	// Save to File
	// ----

		// get file date
function getMonday(){
	$t = strtotime("last Monday");
	$monday = date("_Y-m-d", strtotime("last Monday"));
	return $monday;
}

		// check for file
function testFile(){
	global $settings;
	if(!is_file($settings['data_file'])) createFile();
	return is_file($settings['data_file']);
}
		// create file
function createFile(){
	global $settings;

	$heading = "";
	foreach ($settings['cols'] as $col) {
		$heading .= $col."\t";
	}

	$log = fopen($settings['data_file'], "a+");
	fwrite($log, $heading);
	fclose($log);

}

		// converts data to write format

function convertData($data){
	global $settings;

	$data['date'] = date("Y-m-d H:i:s");
	$data['remote-address'] = $_SERVER['REMOTE_ADDR'];
	$data['user-agent'] = $_SERVER['HTTP_USER_AGENT'];

	unset($data['age']);
	unset($data['comments']);

	$csv = "\n";
	foreach ($settings['fields'] as $field) {
		if(isset($data[$field])){
			if($field === false) $field = 'false';
			if($field === true) $field = 'true';
			$csv .= $data[$field]."\t";
		}
	}

	return $csv;
}

		// write to file
function writeFile($data){
	global $settings;

	if(!testFile()) return 'problem creating file';

	$data = convertData($data);
	$log = fopen($settings['data_file'], "a+");
	$result = fwrite($log, $data);
	fclose($log);
	if(!$result == strlen($data)){return false;}
	else{return true;}

}

		// send email

$data = getPost();
$errors = validateData($data);

			// var_dump($data);

if($errors['cnt'] == 0){

	$results = array('status'=>writeFile($data),'href'=>$settings['download']);
}else{
	$results = array('status'=>false,'errors'=>$errors);
}

			// $results['data']=$data;
			// $results['post']=$_POST;


header('Content-Type: application/json');
echo json_encode($results);
