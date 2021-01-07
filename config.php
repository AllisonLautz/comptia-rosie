<?php

	// gloabl settings for rosie

	define('DIR_ROOT',dirname(__FILE__).'/');
	define('DOMAIN',"http://$_SERVER[HTTP_HOST]".'/');

	$settings = array(
		'video'=> 'https://www.youtube.com/embed/dNGQ5bhVgZE',
		'download' => '/downloads/CompTIA-Make-Tech-Her-Story-Ebook.pdf',
		'googleanayltics' => false, // replace with ga code to enable ga functions
		'tags' => array('#maketechherstory','#womenintech','#womeninIT','#diversityintech','#girlscode','#teachcs'), // adjust to set the social intergrations

		'data_file' => DIR_ROOT.'forms/data/responses_',
		'blacklist' => DIR_ROOT.'feed/blacklist.js',
		'cache' => DIR_ROOT.'feed/cached.js',
		'avatar' => DIR_ROOT.'avatar/',
		'output' => 'json',
		'twitter' => array(
			'status' => true, // set to true to enable | false to disable
			'twitteruser' => "CompTIA",
			'consumerkey' => "ttmsISeRIXRaUk7CIZxvEWSgA",
			'consumersecret' => "xWwsLipiuLHSKuSMbl1ReMxg2aygPMGRx54yiVeM6v8GQRbbjO",
			'accesstoken' => "15355390-AbzlOASuWICqj4LfRpi1R3xsAEvJE6ZCPw7NcFc05",
			'accesstokensecret' => "hK8CRtxQmJG4vkdkhbABYdWRRa47zBvfvhZ2UfZtuAba9",
			'count' => 1000,
			'include_entities' => 'true',
			'result_type' => 'recent',
		)
	);