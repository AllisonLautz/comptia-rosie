<?php
		$settings = array(
			'blacklist' => 'blacklist.js',
			'cache' => 'cached.js'
		);

		function getBlacklist(){
			global $settings;
			if(!file_exists($settings['blacklist'])){return false;}
			$blacklist = file_get_contents($settings['blacklist']);
			return json_decode($blacklist, true);
		}

		function getCached(){
			global $settings;
			if(!file_exists($settings['cache'])){return false;}
			$cache = file_get_contents($settings['cache']);
			return json_decode($cache, true);
		}

		function removeItem(){
			global $settings;
			$data = getCached();
			$bl = getBlacklist();
			foreach ($data['data'] as $key => $value) {
				if(in_array($value['id'], $bl)){
					unset($data['data'][$key]);
				}
			}
			$data['status'] = 'Files Removed';
			// var_dump($data);
			writeFile($settings['cache'],$data);
		}

		function writeFile($file,$data){

			$data = json_encode($data);
			$log = fopen($file, "w+");
			fwrite($log, $data);
			fclose($log);

			$test = getBlacklist();

			return $test;
		}

		function writeData($id){
			global $settings;
			$bl = getBlacklist();
			if($bl == false) $bl = array();
			if(in_array($id, $bl)) return 'already in blacklist';
			$bl[] = $id;

			writeFile($settings['blacklist'],$bl);
			removeItem();

			$test = getBlacklist();
			$t = in_array($id, $test);

			return $t;
		}

		if(isset($_GET['id'])) {$result = writeData($_GET['id']);}
		else{$result = false;}

		header('Content-Type: application/json');
		echo json_encode($result);


