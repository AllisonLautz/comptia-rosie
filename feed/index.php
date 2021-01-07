<?php

	/*
		Social Aggregate
		====
			version 1.2.001
			social integrations & feed aggregate functions

 	*/

	// social options

	// $settings = array(
	// );

	if(isset($global['output'])) $settings['output'] = $global['output'];

	// functions

		function getBlacklist(){
			global $settings;
			if(!file_exists($settings['blacklist'])){return false;}
			$blacklist = file_get_contents($settings['blacklist']);
			$blacklist = json_decode($blacklist);

			return $blacklist;
		}
		$blacklist = getBlacklist();

		function getData(){
			global $settings;
			$nojs = true;
			$twitter = array();
			$instagram = array();

			if($settings['twitter']['status']){
				include DIR_ROOT.'feed/twitter.php';
				$twitter = twitterFeed($settings['twitter'],$settings['tags']);
				// var_dump($twitter);
			}
			$data = array_merge($twitter,$instagram);
			return $data;
		}
		function getCache($file){
			$data = file_get_contents($file);
			$data = json_decode($data,true);
			// print_r($data);
			return $data;
		}

		function checkCache($file){
			if(file_exists($file)){return true;}
			return false;
		}

		function writeCache($file,$status,$data){
			if($data == false) $data = getData();
			$cache = array('status'=>$status,'date'=>date('U'),'data'=>$data);

			$data = json_encode($cache);
			$log = fopen($file, "w+");
			fwrite($log, $data);
			fclose($log);

			return $cache;
		}

		function testDate($date){
			if((time()-(60*15)) > $date){return false;}
			return true;
		}

	// defualt vars
		$cache = false;
		$result = false;

	//if cache does not exist creat it and pass data
		if(!file_exists($settings['cache'])){
			$result['msg'][] = 'cache does not exist';
			$result['status'] = 'Created';
			$result = writeCache($settings['cache'],$result['status'],false);
		}

	// else if cache exists pass it on
		if($result == false){
			$result['status'] = 'Cached';
			$result['msg'][] = 'cache exists';
			$data = getCache($settings['cache']);
			$result['date'] = $data['date'];
			$result['data'] = $data['data'];
		}

	// if cache is expired update it
		// var_dump($result['date']);
		$test = testDate($result['date']);
		// var_dump($test);
		if($test == false){
			$result['msg'][] = 'cache expired';
			$result['status'] = 'Expired';
			$results = writeCache($settings['cache'],$result['status'],false);
		}elseif(isset($_GET['cache'])){
			$result['msg'][] = 'cache overwritten';
			$result['status'] = 'Refreshed';
			$result = writeCache($settings['cache'],$result['status'],false);
		}

	// return json data

		if($settings['output'] == 'json'){
			header('Content-Type: application/json');
			echo json_encode($result);
		}