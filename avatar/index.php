<?php

	function avatarURI($url){
		$prams = explode('/', $url);
		$layers = explode('-',$prams[2]);
		$path = 'cache/'.$layers[0].'/';
		$name = $prams[2].'.jpg';
		return array($layers,$path,$name);
	}

	function imageLayers($layers){
		global $settings;
		$basepath = array("hair/","eyes/","lips/","shirt/","skin/","background/");

		foreach ($layers as $key => $value) {
			$path = $settings['avatar'].'images/'.$basepath[$key].$value.'.png';
			if(!is_file($path)) $value = '01';
			$layers[$key] = $settings['avatar'].'images/'.$basepath[$key].$value.'.png';
		}

		return $layers;
	}

	function buildImage($list,$path){
		$list = array_reverse($list);
		$im = new Imagick($list[0]);
		$ilist = array();
		# loop the others
		for($i = 0; $i < count($list); $i++){
			$ilist[$i] = new Imagick($list[$i]);
			$im->addImage($ilist[$i]);
		}
		$im->resetIterator();
		$combined = $im->flattenImages();
		$combined->setImageFormat("jpg");

		$combined->writeImage($path);

		return $combined;

	}

	function writeImg($path,$name,$layers){
		if(!is_dir($path)) mkdir($path);

		$layers = imageLayers($layers);
		$img = buildImage($layers,$path.$name);
	}


	$msg = array();
	$url = "$_SERVER[REQUEST_URI]";
	$uri = avatarURI($url);

	// var_dump($uri);
	$imgSrc = DOMAIN.'avatar/'.$uri[1].$uri[2];
	$imgPath = $settings['avatar'].$uri[1].$uri[2];

	if(!is_dir($settings['avatar'].'cache/')) mkdir($settings['avatar'].'cache/');

	if(!is_file($imgPath)){
		$msg[] = 'file does not exist';

		$layers = imageLayers($uri[0]);
		$write = writeImg($settings['avatar'].$uri[1],$uri[2],$uri[0]);

		if(is_file($imgPath)) $msg[] = 'image created';

	}else{
		$msg[] = 'file exists';
	}

	$msg[] = $imgSrc;

	// clean url
	$url = ltrim($url, '/');
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
		<meta http-equiv="Content-Language" content="en" >

		<link rel="shortcut icon" href="favicon.ico">

		<title>Make Tech Her Story-Encourage Girls in Tech  | CompTIA</title>

		<meta name="description" content="Why is there a lack of women in tech? IT Trade association CompTIA is inspiring girls in tech with the #MakeTechHerStory campaign. Get involved today." />
		<meta itemprop="name" content="#MakeTechHerStory">
		<meta itemprop="description" content="I created my own Rosie the Riveter thanks to CompTIA to help #MakeTechHerStory and empower young girls to pursue technology careers! Make your own at <?=DOMAIN?>">
		<meta itemprop="image" content="<?=$imgSrc?>">

		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:site" content="@CompTIA">
		<meta name="twitter:title" content="#MakeTechHerStory">
		<meta name="twitter:description" content="Help @CompTIA change the way girls see careers in IT. Create your own Rosie the Riveter avatar! <?=DOMAIN?><?=$url?>">
		<meta name="twitter:image:src" content="<?=$imgSrc?>">

		<meta property="og:url" content="<?=DOMAIN?><?=$url?>"/>
		<meta property="og:type" content="article" />
		<meta property="og:title" content="#MakeTechHerStory"/>
		<meta property="og:description" content="Women’s representation in the IT industry has stagnated. As a symbol of female empowerment, build your own Rosie the Riveter avatar!"/>
		<meta property="og:image" content="<?=$imgSrc?>"/>

	<link rel="stylesheet" type="text/css" href="/styles/comptia-rosie_screen.css">
	<link href="https://fonts.googleapis.com/css?family=Titillium+Web:200,300,400,600,700,900" rel="stylesheet">


	<?php if($settings['googleanayltics']){ ?>
		<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');ga('create', '<?=$settings['googleanayltics']?>', 'auto');ga('send', 'pageview');</script>
	<?php }else{ ?>
		<script>function ga(a,b,c,d,e){ console.log(a+','+b+','+c+','+d+','+e);}</script>
	<?php } ?>

	</head>
	<body style="background-color: #ededed; text-align:center;">
		<div class="callout" style="display: inline-block; width: 90%; margin: 40px 0 20px;">
			<p>Right click to save or <a href="<?=DOMAIN?>">create a new Rosie avtar</a>.</p>
		</div>
		<img style="max-width:90%; max-height:80vh;" src="<?=$imgSrc?>">

	</body>
</html>
