<?php

function twitterFeed($settings,$tags){

	global $blacklist;


	//twitter API Calls
	require_once(DIR_ROOT."/feed/twitteroauth/twitteroauth/twitteroauth.php"); //Path to twitteroauth library

	function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
	  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
	  return $connection;
	}

	$connection = getConnectionWithAccessToken($settings['consumerkey'], $settings['consumersecret'], $settings['accesstoken'], $settings['accesstokensecret']);

	$searches = array();
	$tags = array('#maketechherstory');

	foreach ($tags as $tag) {
		$searches[] = 'https://api.twitter.com/1.1/search/tweets.json?q='.urlencode($tag).'+-filter:retweets&filter_level=medium&count='.$settings['count'].'&include_entities='.$settings['include_entities'].'&result_type='.$settings['result_type'];
	}
	$tweets = array();
	foreach ($searches as $search) {
		$posts = $connection->get($search);
		//var_dump($posts);
		foreach ($posts->statuses as $post) {
			//var_dump($posts);
			if(in_array($post->id_str, $blacklist)){continue;}
			$tweet = array();
			if(isset($post->entities->media[0]->media_url)) $tweet['image'] = $post->entities->media[0]->media_url;
			if(isset($post->user->screen_name)) $tweet['user'] = $post->user->screen_name;
			if(isset($post->text)) $tweet['caption'] = $post->text;
			if(isset($post->created_at)) {
				$date = strtotime($post->created_at);
				$stamp = date('U', $date);
			}
			$tweet['source'] = 'Twitter';
			$tweet['id'] = $post->id_str;
			$tweet['url'] = 'https://twitter.com/'.$tweet['user'].'/status/'.$tweet['id'];

			$urllist = $post->entities->urls;

			foreach ($urllist as $key => $url) {
				$pos = strpos($url->expanded_url, 'http://maketechherstory.comptia.org/avatar/');
				if($pos === false) continue;
				$avatar = explode('/', $url->expanded_url);
				$folder = explode('-', end($avatar));
				$tweet['image'] = DOMAIN.'avatar/cache/'.$folder[0].'/'.end($avatar).'.jpg';
			}

			$tweets[$stamp]=$tweet;
		}
	}

	return $tweets;
}