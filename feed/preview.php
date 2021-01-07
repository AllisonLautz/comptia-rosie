<?php

	// display cached pages with controls
$global = array(
  'output' => 'php',
  );

include DIR_ROOT.'/feed/index.php';
	// $result = file_get_contents('cached.js');
	// $result = result_decode($result);
$date = date("m-d-Y h:i:s A",$result['date']);

	// var_dump($result);
$tags ='';
foreach ($settings['tags'] as $tag) {
  $tags .= '<a href="#">'.$tag.'</a>, ';
}
$header = '<div class="wrapper"><h1>Rosie Social Feed</h1>';
$header .= '<ul>';
$header .= '<li> Status: '.$result['status'].'</li>';
$header .= '<li> date: '.$date.' - <a href="?cache=1">refresh data</a></li>';
$header .= '<li> Tags: '.$tags.'</li>';
$header .= '</ul>';

$header = '<div class="header">'.$header.'</div></div>';

$html = "";
$i=1;
	// var_dump($result['data']);
foreach ($result['data'] as $key => $post) {

  $img = '';
  $cl = 'post item_'.$i.' '.$post['source'].' id_'.$post['id'];
  if(!isset($post['image'])){$cl .= ' noimage';}
  $html  .= '<div class="'.$cl.'" data-id="'.$post['id'].'">';
  $html .= '<a class="delete" data-id="'.$post['id'].'">x</a>';
  if(isset($post['image'])) $html .= '<div class="image" style="background-image:url('.$post['image'].');"></div>';
  $html .= '<div class="content ">';
  $html .= '<p class="caption">';
  if(isset($post['url'])) $html .= '<a target="_blank" href="'.$post['url'].'">';
  $html .= $post['caption'];
  if(isset($post['url'])) $html .= '</a>';
  $html .= '</p>';
  $html .= '<p class="user">';
  if(isset($post['url'])) $html .= '<a target="_blank" href="'.$post['url'].'">';
  $html .= 'by '.$post['user'];
  if(isset($post['url'])) $html .= '</a>';
  $html .= '</p>';
  $html .= '</div>';
  $html .= '</div>';
  $i++;

}

$cards = '<div class="posts"><div class="wrapper">'.$html.'</div></div>';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Image Preview</title>
	<link href="https://fonts.googleapis.com/css?family=Titillium+Web:200,300,400,600,700,900" rel="stylesheet">
	<style>

   /* line 5, ../../../../usr/local/lib/ruby/gems/2.2.0/gems/compass-core-1.0.3/stylesheets/compass/reset/_utilities.scss */
   html, body, div, span, applet, object, iframe,
   h1, h2, h3, h4, h5, h6, p, blockquote, pre,
   a, abbr, acronym, address, big, cite, code,
   del, dfn, em, img, ins, kbd, q, s, samp,
   small, strike, strong, sub, sup, tt, var,
   b, u, i, center,
   dl, dt, dd, ol, ul, li,
   fieldset, form, label, legend,
   table, caption, tbody, tfoot, thead, tr, th, td,
   article, aside, canvas, details, embed,
   figure, figcaption, footer, header, hgroup,
   menu, nav, output, ruby, section, summary,
   time, mark, audio, video {
    margin: 0;
    padding: 0;
    border: 0;
    font: inherit;
    font-size: 100%;
    vertical-align: baseline;
  }

  /* line 22, ../../../../usr/local/lib/ruby/gems/2.2.0/gems/compass-core-1.0.3/stylesheets/compass/reset/_utilities.scss */
  html {
    line-height: 1;
  }

  /* line 24, ../../../../usr/local/lib/ruby/gems/2.2.0/gems/compass-core-1.0.3/stylesheets/compass/reset/_utilities.scss */
  ol, ul {
    list-style: none;
  }

  /* line 26, ../../../../usr/local/lib/ruby/gems/2.2.0/gems/compass-core-1.0.3/stylesheets/compass/reset/_utilities.scss */
  table {
    border-collapse: collapse;
    border-spacing: 0;
  }

  /* line 28, ../../../../usr/local/lib/ruby/gems/2.2.0/gems/compass-core-1.0.3/stylesheets/compass/reset/_utilities.scss */
  caption, th, td {
    text-align: left;
    font-weight: normal;
    vertical-align: middle;
  }

  /* line 30, ../../../../usr/local/lib/ruby/gems/2.2.0/gems/compass-core-1.0.3/stylesheets/compass/reset/_utilities.scss */
  q, blockquote {
    quotes: none;
  }
  /* line 103, ../../../../usr/local/lib/ruby/gems/2.2.0/gems/compass-core-1.0.3/stylesheets/compass/reset/_utilities.scss */
  q:before, q:after, blockquote:before, blockquote:after {
    content: "";
    content: none;
  }

  /* line 32, ../../../../usr/local/lib/ruby/gems/2.2.0/gems/compass-core-1.0.3/stylesheets/compass/reset/_utilities.scss */
  a img {
    border: none;
  }

  /* line 116, ../../../../usr/local/lib/ruby/gems/2.2.0/gems/compass-core-1.0.3/stylesheets/compass/reset/_utilities.scss */
  article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
    display: block;
  }

  /* line 1, ../sass/_base.scss */
  html {
    overflow-x: hidden;
  }

  /* line 5, ../sass/_base.scss */
  body {
    font: 300 16px/1.5em "Titillium Web", sans-serif;
    color: #5c6670;
    width: 100%;
    overflow-x: hidden;
  }
  /* line 10, ../sass/_base.scss */
  body.adjust {
    margin: 75px 0 0;
  }

  /* line 15, ../sass/_base.scss */
  h1, h2, h3, h4, h5, h6 {
    font-family: "Titillium Web", sans-serif;
    margin: 0 0 30px;
    line-height: 1.25em;
    font-weight: 400;
  }
  /* line 20, ../sass/_base.scss */
  h1::-moz-selection, h2::-moz-selection, h3::-moz-selection, h4::-moz-selection, h5::-moz-selection, h6::-moz-selection {
    background: #008fbe;
    color: #ffffff;
  }
  /* line 21, ../sass/_base.scss */
  h1::selection, h2::selection, h3::selection, h4::selection, h5::selection, h6::selection {
    background: #008fbe;
    color: #ffffff;
  }

  /* line 24, ../sass/_base.scss */
  h1 {
    font-size: 3.375em;
    color: #333e48;
  }

  /* line 25, ../sass/_base.scss */
  h2 {
    font-size: 1.75em;
    color: #333e48;
  }

  /* line 26, ../sass/_base.scss */
  h3 {
    font-size: 1.8em;
  }

  /* line 27, ../sass/_base.scss */
  h4 {
    font-size: 1.5em;
  }

  /* line 28, ../sass/_base.scss */
  h5 {
    font-size: 1.33em;
  }

  /* line 29, ../sass/_base.scss */
  h6 {
    font-size: 1.2em;
  }

  /* line 31, ../sass/_base.scss */
  p, li {
    margin: 0 0 10px;
    font-weight: 200;
  }
  /* line 34, ../sass/_base.scss */
  p::-moz-selection, li::-moz-selection {
    background: #008fbe;
    color: #ffffff;
  }
  /* line 35, ../sass/_base.scss */
  p::selection, li::selection {
    background: #008fbe;
    color: #ffffff;
  }

  /* line 38, ../sass/_base.scss */
  ul {
    list-style: disc;
    margin: 0 0 0 30px;
  }

  /* line 43, ../sass/_base.scss */
  ol {
    list-style: decimal;
    margin: 0 0 0 30px;
  }

  /* line 49, ../sass/_base.scss */
  a {
    color: #df2a2e;
    font-size: 1em;
    text-decoration: none;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
  }
  /* line 54, ../sass/_base.scss */
  a:hover {
    color: #231f20;
  }

  /* line 61, ../sass/_base.scss */
  strong, b {
    font-weight: 600;
  }

  /* line 65, ../sass/_base.scss */
  em, i {
    font-style: italic;
  }


  a{text-decoration: none;}
  .post {
    float: left;
    width: 21%;
    height: 400px;
    /*height:252px;*/
    background: #ececec;
    margin: 10px 1%;
    padding: 10px 1%;
    position: relative;
    overflow:hidden;
  }
  a.delete {
    position: absolute;
    right: 0;
    top: 0;
    height: 20px;
    width: 20px;
    text-align: center;
    background: #000;
    line-height: 18px;
    font-weight: bold;
    color: #fff;
    z-index: 100;
    cursor:pointer;
  }
  a.delete:hover{
   background: #c2531a;
   color:#fff;
 }
 .post .image{
   position: relative;
   z-index: 10;
   float: left;
   width: 100%;
   height: 240px;
   overflow: hidden;
   opacity: 1;
   display: block;
   background-size: cover;
   background-position: center center;
   background-repeat: no-repeat;
 }
 .post .content{
   position: relative;
   z-index: 10;
   float: left;
   width: 100%;
   margin: 10px 0 0;
   /*height: 200px;*/
   overflow: hidden;
 }
 .post.noimage .content{
  float: left;
  width: 100%;
  margin: 0;
  /*height: 600px;*/
  font-size: 1.25em;
  line-height:1.25em;

  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  box-sizing: border-box;
  left: 0;
  padding: 0 5%;
  word-break: break-word;


}

.wrapper{
  width:90%;
  max-width:1200px;
  margin:0 auto;
}


.noimage p.caption{
  margin:0 0 30px;
}




a{
  color:#ff6c0c;
}

a:hover{
  color:#c2531a;
}

</style>
</head>
<body>

	<?=$header?>
	<?=$cards?>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script>

   function removePost(id){
    blacklist = "blacklist.php?id="+id;
    $.getJSON(blacklist, function( data ) {
     console.log(data);
   });
    jQuery('.id_'+id).remove();
  }


  jQuery(document).on('click', '.post .delete', function () {
    id = jQuery(this).attr('data-id');
    removePost(id);
  });

</script>
</body>
</html>