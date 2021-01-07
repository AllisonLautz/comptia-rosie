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
	<meta name="description" content="Why is there a lack of women in tech? IT Trade association CompTIA is inspiring girls in tech with the #MakeTechHerStory campaign. Get involved today.
	" />
	<link rel="canonical" href="<?=DOMAIN?>" />

	<!-- linkedin data -->

	<meta itemprop="name" content="#MakeTechHerStory">
	<meta itemprop="description" content="Women’s representation in the IT industry has stagnated. As a symbol of female empowerment, build your own Rosie the Riveter avatar!">
	<meta itemprop="image" content="<?=DOMAIN?>imgs/social-share_linkedin.png">

	<!-- twitter data -->

	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@CompTIA">
	<meta name="twitter:title" content="#MakeTechHerStory">
	<meta name="twitter:description" content="Women’s representation in the IT industry has stagnated. As a symbol of female empowerment, build your own Rosie the Riveter avatar!">
	<meta name="twitter:image:src" content="<?=DOMAIN?>imgs/social-share_twitter.png">


	<!-- fb data -->
	<meta property="og:url" content="<?=DOMAIN?>"/>
	<meta property="og:type" content="article" />
	<meta property="og:title" content="#MakeTechHerStory"/>
	<meta property="og:description" content="Women’s representation in the IT industry has stagnated. As a symbol of female empowerment, build your own Rosie the Riveter avatar!"/>
	<meta property="og:image" content="<?=DOMAIN?>imgs/social-share_facebook.png"/>


	<link rel="shortcut icon" href="/imgs/favicon_rosie.png">

	<!-- magicwall stylesheets -->

	<link rel="stylesheet" type="text/css" href="styles/comptia-rosie_screen.css">
	<link href="https://fonts.googleapis.com/css?family=Titillium+Web:200,300,400,600,700,900" rel="stylesheet">



	<?php if($settings['googleanayltics']){ ?>

		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', '<?=$settings['googleanayltics']?>', 'auto');

			ga('send', 'pageview');
		</script>

	<?php }else{ ?>
		<script>function ga(a,b,c,d,e){ console.log(a+','+b+','+c+','+d+','+e);}</script>
	<?php } ?>

</head>
<body>

	<script>
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>

	<script>!function(d,s,id){
		var js,fjs=d.getElementsByTagName(s) [0];
		if(!d.getElementById(id)){
			js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";
			fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
		</script>





		<div class="header">
			<div class="logo half left">
				<div class="wrapper">
					<a href="#"><img src="imgs/comptia-logo-red.png"></a>
					<p>#MakeTech<span>Her</span>Story</p>
				</div>
			</div>
			<div class="nav half right">
				<ul>
					<li class="create"><a class="anchor" href="#create">Create</a></li>
					<li class="watch"><a class="anchor" href="#watch">Watch</a></li>
					<li class="download"><a class="anchor" href="#download">Download</a></li>
				</ul>
			</div>
		</div>
		<div class="maincontent">
			<div class="section full section1 vh100" id="section1">
				<div class="section half left relative vh100">
					<div class="block logo vh100">
						<div class="wrapper">
							<a href="#"><img src="imgs/comptia-logo-red.png"></a>
						</div>
					</div>
					<div class="block mainintro vh60">
						<div class="wrapper intro">
							<div class="valign">
								<h1>Make Tech Her Story</h1>
								<p>Despite playing a key role in the growth of IT, women’s representation in the industry has stagnated. Some argue women simply are not as interested in IT careers as men – but we know it’s not that simple. To understand the deeper reasons behind the IT industry’s gender gap, CompTIA commissioned research that brought the conversation directly to girls and boys in middle and high school. While having these conversations, we kept an iconic image in mind, Rosie the Riveter.
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="section half right red">
					<a class="anchor vh60" href="#download">
						<div class="block download transition vh60">
							<h2>Download</h2>
						</div>
					</a>
					<a class="anchor vh40 half left" href="#create">
						<div class="square block blue create bg transition">
							<h2>Create</h2>
						</div>
					</a>
					<a class="anchor vh40 half right " href="#watch">
						<div class="watch square transition">
							<div class="overlay green block">
								<h2>Watch</h2>
							</div>
						</div>
					</a>
				</div>
			</div>

			<!-- section 2 -->
			<div class="section full section2 vh100 " id="create">

				<div class="block half left grayltr rosie relative">
					<div class="intro small white">
						<div class="wrapper">
							<h2>Reimagining Rosie</h2>
							<p>In the 1940s, Rosie the Riveter served as an icon of female empowerment. Today, her iconic spirit can galvanize us to create a more inclusive IT industry – but she’s due for a modern reimagining. How do you envision Rosie?
							</p>
						</div>
					</div>
					<div class="valign">
						<div class="avatar relative">
							<div class="shadow"></div>
							<div class="options default">
								<img class="bandana selected" src="imgs/avatar_hair_default.png">
								<img class="bg selected" src="imgs/avatar_BG_default.png">
							</div>


							<?php



							$imgs = array(
								'skin' => 6,
								'hair' => 24,
								'eyes' => 18,
								'lips' => 18,
								'shirt' => 18,
								'background' => 12
							);


							foreach($imgs as $key => $val): ?>

								<div class="options absolute <?=$key;?>">


									<?php for($i = 1; $i <= $val; $i++): ?>


										<img src="/<?=basename(__DIR__);?>/avatar/images/<?=$key;?>/<?=($i < 10 ? '0' : '');?><?=$i;?>.png" class="<?=($i == 1 ? 'selected gray' : '');?>">

									<?php endfor;?>
								</div>

							<?php endforeach;


							?>


							<ul class="social share">
								<li class="twitter">
									<a href="#" target="_blank"></a>
								</li>
								<li class="facebook">
									<a href="#"></a>
								</li>
								<li class="save">
									<a href="#"></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- half right -->
				<div class="block half right white relative">
					<div class="vcenter">
						<div class="intro big">
							<div class="wrapper">
								<h2>Reimagining Rosie</h2>
								<p>In the 1940s, Rosie the Riveter served as an icon of female empowerment. Today, her iconic spirit can galvanize us to create a more inclusive IT industry—but she’s due for a modern reimagining. How do you envision Rosie?</p>
							</div>
						</div>
						<!-- CREATE ROSIE SECTION -->
						<div class="build" id="build">
							<div class="wrapper">


								<?php

								foreach($imgs as $key => $val): ?>

									<div class="dropdown <?=$key;?><?=($key == 'skin' ? ' active' : '');?>">
										<p><?=ucfirst($key);?><?=($key == 'skin' ? ' color' : '');?></p>

										<div class="hidden" <?=($key == 'skin' ? 'style="display:block;"' : '');?>>

											<?php for($i = 1; $i <= $val; $i++): ?>

												<div >
													<img src="/<?=basename(__DIR__);?>/avatar/thumb/<?=$key;?>/<?=($i < 10 ? '0' : '');?><?=$i;?>.png">
												</div>
											<?php endfor;?>
										</div>

									</div>


								<?php endforeach;


								?>



							</div>
						</div>
						<!-- END BUILD -->
					</div>
				</div>
			</div>


			<!-- section 3 -->
			<div class="section full section3 waypoint" id="section3">
				<div class="magicwall">

					<ul class="magicwall-items">
					</ul>
				</div>
			</div>

			<!-- section 4 -->
			<div class="section full white centered section4 vh100" id="watch">
				<div class="valign">
					<div class="wrapper intro">
						<h2>Bringing girls into the conversation</h2>
						<p>We talked to girls between the ages of 10 and 17 about technology, careers, and what an IT professional looks like. Here’s what they said. </p>
						<div class="vid">
							<div class="iframewrap">
								<iframe width="100%" height="425" src="<?=$settings['video']?>" frameborder="0" allowfullscreen></iframe>
							</div>
						</div>
					</div>

				</div>
			</div>
			<!-- section 5 -->
			<div class="section full purple section5 vh125" id="section5">
				<div class="section full height">
					<div class="section half left vh100 fix">
						<div class="wrapper intro">
							<div class="vcenter">
								<h2>Learn more and get involved</h2>
								<p>As a parent or guardian, you don’t need to work in IT to encourage your daughter’s interest in a tech-focused career. Turn to CompTIA’s <em>Get into IT</em> report for IT career motivation you can share with your kids. </p>
								<p>For teachers and other educational professionals, volunteering to teach a TechGirlz workshop is a great way to educate and inspire the next generation of women in tech. </p>
								<p>And if you work in IT, CompTIA’s Dream IT program provides a platform to embolden girls to become leaders in tech.</p>
							</div>
						</div>
					</div>
					<div class="section half right vh125">
						<div class="item item1 vh20" style="background-image:url(imgs/Resources_01_CompTIA-Infographic.jpg);">
							<a class="overlay" href="https://www.comptia.org/communities/advancing-women-in-it/crc-home" target="_blank">
								<h3><span>CompTIA Career Resources:</span><br>Plan Your Future in a Digital World</h3>
								<img src="imgs/arrow.png" class="arrow">
							</a>
						</div>
						<div class="item item2 vh20" style="background-image:url(imgs/Resources_02_TechShopz-workshop.jpg);">
							<a class="overlay" href="http://www.techgirlz.org" target="_blank">
								<h3>Volunteer to Teach a TechShopz in a Box Workshop with TechGirlz</h3>
								<img src="imgs/arrow.png" class="arrow">
							</a>
						</div>
						<div class="item item3 vh20" style="background-image:url(imgs/Resources_03_Dream-IT-Speaker.jpg);">
							<a class="overlay" href="https://www.comptia.org/communities/advancing-women-in-it/dream-it" target="_blank">
								<h3>Volunteer to be a CompTIA Dream IT Speaker</h3>
								<img src="imgs/arrow.png" class="arrow">
							</a>
						</div>
						<div class="item item4 vh20" style="background-image:url(imgs/Resources_04_CSTA.jpg);">
							<a class="overlay" href="https://www.csteachers.org/" target="_blank">
								<h3>Check out CSTA for Additional Resources</h3>
								<img src="imgs/arrow.png" class="arrow">
							</a>
						</div>
						<div class="item item4 vh20" style="background-image:url(imgs/Resources_05_CompTIA-Rosie-poster.jpeg);">
							<a class="overlay" href="#" target="_blank">
								<h3>Classroom Inspiration: <span><br>Download your Rosie the Riveter Poster</span></h3>
								<img src="imgs/arrow.png" class="arrow">
							</a>
						</div>
					</div>
				</div>
			</div>
			<!-- section 6 -->
			<div class="section full section6 vh100" id="download">
				<div class="section half left form relative white vh100">

					<div class="valign">
						<div class="wrapper intro">
							<div class="text">
								<h2>Download the E-Book</h2>
								<p>Why have only 23 percent of girls considered an IT career? And how can parents, educators and IT professionals encourage girls in tech? Download CompTIA’s full e-book to learn more about how we can all <strong>make tech her story</strong>.</p>
								<p class="hidden">If your download does not begin automatically, please <a href="" target="_blank">click here</a> to download the pdf.</p>
							</div>

							<form class="download">
								<div class="message"></div>
								<div class="fieldwrap">
									<label>First Name</label><input name="first-name" id="first-name" type="text" value="">
								</div>
								<div class="fieldwrap">
									<label>Last Name</label><input name="last-name" id="last-name" type="text" value="">
								</div>
								<div class="fieldwrap">
									<label>Email</label><input name="email" id="email" type="text" value="">
								</div>
								<div class="fieldwrap">
									<label>Organization Name</label><input name="organization" id="organization" type="text" value="">
								</div>
								<div class="fieldwrap">
									<label class="select">Profession</label>
									<select name="profession" id="profession">
										<option>Profession</option>
										<option>I work for a tech company, but I am not an IT professional</option>
										<option>I am an IT professional</option>
										<option>I am a teacher or work in education in some other capacity</option>
										<option>I am a student</option>
										<option>Other</option>
									</select>
								</div>
								<input class="opt age" name="age" type="text" value="">
								<textarea class="opt comments" name="comments"></textarea>
								<input type="submit" value="Download">
							</form>

						</div>
					</div>

				</div>
				<div class="ebook">
					<h3>Want to help #MakeTechHerStory?<br> Share this page with a friend, colleague or family member.</h3>
					<ul class="social share">
						<li class="twitter"><a href=""></a></li>
						<li class="facebook"><a href=""></a></li>
						<li class="linkedin"><a href=""></a></li>
					</ul>
				</div>
				<div class="section half right ipad red relative vh100"></div>
			</div>
			<!-- section 7 -->
			<div class="section full image centered section7 vh100" id="section7">
				<div class="overlay">
					<div class="wrapper intro">
						<div class="vcenter">
							<h2>About the campaign</h2>
							<p>CompTIA’s study, conducted in conjunction with the Blackstone Group between June and July 2016, involved qualitative and quantitative research into girls’ and boys’ personal technology habits and perceptions of IT careers. Qualitative research was conducted through a series of focus groups with middle school and high school girls, while quantitative findings are based on a nationwide survey of boys and girls between the ages of 10 and 17.   </p>
							<a class="button" href="http://comptia.org">Get to Know CompTIA</a>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="footer">
			<div class="wrapper">
				<div class="logo left">
					<a href="#"><img src="imgs/comptia-logo-red.png"></a>
					<span>The IT Industry<br />Trade Association</span>
				</div>
				<div class="menu right">
					<ul>
						<li><a href="http://www.comptia.org/terms-conditions">Terms &amp; Conditions </a></li>
						<li><a href="http://www.comptia.org/privacy-statement">Privacy Statement</a></li>
						<li><a href="http://www.comptia.org/trademarks">Trademarks</a></li>
						<li><a href="http://www.comptia.org/contact-us">Contact Us</a></li>
						<li>&copy; CompTIA, Inc. All rights reserved.</li>
					</ul>
				</div>
			</div>
		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

		<script type="text/javascript" src="libs/jquery.magicwall.min.js"></script>
		<script type="text/javascript" src="libs/jquery.waypoints.min.js"></script>
		<script src="libs/infinite.min.js"></script>
		<script src="libs/waypoints.scripts.js"></script>



		<?php include (DIR_ROOT.'libs/comptia-rosie_scripts.php'); ?>
	</body>
	</html>