<script>

// //global funtion to get repeated heights and widths for window & header
function wd(v){
	var ww = jQuery(window).width();
	var wh = jQuery(window).height();
	var win = {'w':ww, 'h':wh}
	return win;
}
var owh = wd().h;
var wh = (owh-60);
var s = $(window).scrollTop();

var create = (wh);
var learn = ((owh*4)-50);
var social = ((owh*2));
var watch = ((owh*3));
var download = ((owh*5));
var about = ((owh*6));

// sticky nav
function stickyNav(){
	var s = $(window).scrollTop();
	var hh = $('.header').outerHeight();
	var sm = (wh); // scroll margin
	if(wd().w > 1023){
		if(s > hh && s < sm){ $('.header').addClass('stage').removeClass('stuck'); }
		else if(s > hh && s >= sm){ $('.header').removeClass('stage').addClass('stuck'); }
		else{ $('.header').removeClass('stage') }
	}
}
var waypoint = new Waypoint({
	element: document.getElementById('create'),
	handler: function() {
		$('li.create').addClass('active');
	}
})
var waypoint = new Waypoint({
	element: document.getElementById('section3'),
	handler: function(direction) {
		if(direction == 'down'){
			$('.magicwall-items').addClass('fixed');
			$('.nav li.active').removeClass('active');
		}
		else{
			$('.magicwall-items').removeClass('fixed');
			$('li.create').addClass('active');
		}
	}
})
var waypoint = new Waypoint({
	element: document.getElementById('watch'),
	handler: function(direction) {
		if(direction == 'down'){
			$('.magicwall-items').removeClass('fixed');
			//console.log('4 - magicwall not fixed')
			$('li.watch').addClass('active');
		}
		else{
			$('.magicwall-items').addClass('fixed');
			//console.log('4 - magicwall fixed')
			$('.nav li.active').removeClass('active');
		}
	}
})
var waypoint = new Waypoint({
	element: document.getElementById('section5'),
	handler: function(direction) {
		if(direction == 'down'){
			$('.fix').addClass('fixed');
			$('.nav li.active').removeClass('active');
		}
		else{
			$('.fix').removeClass('fixed');
			$('li.watch').addClass('active');
		}
	}
})
var waypoint = new Waypoint({
	element: document.getElementById('download'),
	handler: function(direction) {
		if(direction == 'down'){
			$('.fix').removeClass('fixed');
			$('.nav li.download').addClass('active');
		}
		else{
			$('.fix').addClass('fixed');
			$('.nav li.active').removeClass('active');
		}
	}
})

var waypoint = new Waypoint({
	element: document.getElementById('section7'),
	handler: function(direction) {
		if(direction == 'down'){
			$('.nav li.active').removeClass('active');
		}
		else{
			$('.nav li.download').addClass('active');
		}
	}
})

// slide anchor links
function anchor(){
	if(wd().w < 1023){
		$('.anchor').on('click', function(){
			console.log($(this).attr('href'))
			$('html, body').animate({
				scrollTop: ($( $(this).attr('href') ).offset().top)
			}, 500);
			return false;
		})
	}
	else{
		$('.anchor').on('click', function(){
			$('html, body').animate({
				scrollTop: ($( $(this).attr('href') ).offset().top)
			}, 500);
			return false;
			var wo = $(window).offset().top;
			console.log(wo)
		})
	}
}

/* BUILD ROSIE SECTION */
function styleTray(){
	$('.dropdown p').click(function(){
		var par = $(this).parents('.dropdown');
		if (par.hasClass('active')){
			par.removeClass('active').find('.hidden').slideUp();
		}
		else{
			$('.dropdown.active').removeClass('active').find('.hidden').slideUp();
			par.addClass('active').find('.hidden').slideDown();
		}
		$('.dropdown.hair .hidden div').click(function(){
			$(this).parents('.section2').find('img.bandana').hide();
		})
		$('.dropdown.background .hidden div').click(function(){
			$(this).parents('.section2').find('img.bg').hide();
		})
	})
}
function optHeight(){
	var option = $('.hidden div');
	var first = $('.active .hidden div:first');
	var ow = first.outerWidth();
	option.height(ow);
}
function Rosie(){
	$('.hidden div').on('click', function(){
		$(this).siblings('div.selected').removeClass('selected');
		$(this).addClass('selected')
				var index = $(this).parents('.hidden').find('div').index(this); // numbers each div in the dropdown
				var category = $(this).parents('.dropdown').map(function(){
				// returns class name, aka category (skin, hair, eyes, etc.)
				return $(this).attr('class').replace(' active', '').replace('dropdown ', '');
			}).get();
				var img = $('.options.'+category+' img');
		$('.options.'+category+' img.selected').removeClass('selected').removeClass('gray'); // remove previous selection from current category
		$(img[index]).addClass('selected'); // find and select image that corresponds with selected div
		var n = $(img[index]).map(function(){
			return $(this).attr('src').replace('../../avatar/images/', '').replace('skin/', '').replace('hair/', '').replace('eyes/', '').replace('lips/', '').replace('shirt/', '').replace('background/', '').replace('.png', '');
		}).get();
	})
}

// Build Download Link from selected items
function getSelected(t){
	sel = jQuery('.avatar .'+t+' .selected').attr('src');
	pos = sel.indexOf(t)+t.length+1;
	sel = sel.substr(pos);
	sel = sel.split('.');
	return sel[0];
}
function buildlink(){
			//console.log('build link');
			var parts = ['hair','eyes','lips','shirt','skin','background'];
			var avatar = '<?=DOMAIN?>avatar/';
			for (i = 0; i < parts.length; i++) {
				part = getSelected(parts[i]);
				if(i != 0) avatar += '-';
				avatar += part;
			}
			return avatar;
		}

		jQuery(document).on('click', '.social li.save a', function(event) {
			event.preventDefault();
			/* Act on the event */
			href = buildlink();
			window.open(href,'_blank',"height=640, width=640, toolbar=no, menubar=no, status=no,");
		});

		jQuery(document).on('click', '.social li.facebook a', function(event) {
			if ( $(this).parents('.section2').length == 1 ) {
				href = 'http://www.facebook.com/sharer.php?u='+encodeURIComponent(buildlink());
			}
			else{
				href = 'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('<?=DOMAIN?>')+'?source=facebook&medium=social&campaign=rosie%20avatar';
			}
			event.preventDefault();
			window.open(href,'_blank',"height=640, width=640, toolbar=no, menubar=no, status=no,");
		});

		jQuery(document).on('click', '.social li.twitter a', function(event) {
			hashtags = "MakeTechHerStory";
			summary = "Help @CompTIA change the way girls see careers in IT. Create your own Rosie the Riveter avatar!";
			link = "<?=DOMAIN?>";
			if ( $(this).parents('.section2').length == 1 ) {
				href = 'https://twitter.com/intent/tweet?text='+summary+'&hashtags='+hashtags+'&url='+encodeURIComponent(buildlink());
			}
			else{
				href = 'https://twitter.com/intent/tweet?text=Help+@CompTIA+change+the+way+girls+see+careers+in+IT.+Create+your+own+Rosie+the+Riveter+avatar!+'+encodeURIComponent('<?=DOMAIN?>')+'?source=twitter&medium=social&campaign=rosie%20avatar'+'+%23MakeTechHerStory';
			}
			event.preventDefault();
			/* Act on the event */

		// href = 'https://www.facebook.com/sharer/sharer.php?u='+buildlink();
		window.open(href,'_blank',"height=640, width=640, toolbar=no, menubar=no, status=no,");
	});

		jQuery(document).on('click', '.social li.linkedin a', function(event) {
			event.preventDefault();
			href = 'https://www.linkedin.com/shareArticle?mini=true&url='+encodeURIComponent('<?=DOMAIN?>')+'?source=linkedin&medium=social&campaign=rosie%20avatar'+'&title=MakeTechHerStory&summary=I+created+my+own+Rosie+the+Riveter+thanks+to+CompTIA+to+help+%23MakeTechHerStory+and+empower+young+girls+to+pursue+technology+careers!+Make+your+own+at+http://maketechherstory.comptia.org';
			window.open(href,'_blank',"height=640, width=640, toolbar=no, menubar=no, status=no,");
		});
	// section 3

// form section
function form(){
	$('input').each(function(){
		$(this).on('focus',function(){
			$(this).prev('label').addClass('active');
		})
	})
	$('select').each(function(){
		$(this).on('click',function(){
			$(this).addClass('active').prev('label').addClass('active');
		})
	})
}
function magicalWall(){
	ht = wd().h;
	//console.log(ht);
	
		//magicwall
		$.getJSON("feed/index.php", function( data ) {
			var items = [];
			var i = 1;
			$.each(data.data, function( key, val ) {
				img = '';
				cl = 'item_'+i+' '+val.source;
				if(li = 'display="block"'){cl += ' block';}
				else{cl += ' nodisplay';}
				if(val.image){img = 'data-thumb="'+val.image+'"';}
				else{cl += ' noimage';}
				html  = '<li class="'+cl+'" '+img+' >';
				if(val.url) html += '<a target="_blank" href="'+val.url+'">';
				html += '<div class="hover-content ">';
				html += '<div class="wrap valign">';
				html += '<p class="caption">'+val.caption+'</p>';
				html += '<p class="user">&ndash; '+val.user+'</p>';
				html += '</div>';
				html += '</div>';
				if(val.url) html += '</a>';
				html += '</li>';
				jQuery('ul.magicwall-items').append(html);
				i++;

			});
		}).done(function(){
			$(".magicwall").magicWall({
				countX : 5,
				countY : 3,
				delay : 1000,
				animations:"fade",
			// onHoverExclude: "item",
			breakpoints:"1300,1024,640,480",
			countX_1300:4,
			countX_1024:3,
			countX_640:2,
			countX_480:1,
		});
			jQuery('.magicwall').height(ht);
		// $('.magicwall-items > li').each( function() { $(this).hoverdir(); } );
	});
	}

	jQuery(document).on('click', '.hidden div', function(event) {
		num = $(this).parents('.hidden').find('div').index(this)+1;
		category = $(this).closest('.dropdown').attr('class').replace(/dropdown/g,'').replace(/active/g,'').replace(/ /g,'');
		ga('send', 'event', 'avatar', category, num);
	});
	jQuery(document).on('click', '.item a', function(event) {
		event.preventDefault();
		h = $(this).attr('href');
		ga('send', 'event','resource', 'click', h);
	});

	$(document).ready(function(){
		stickyNav();
		anchor();
		optHeight();
		form();
		styleTray();
		Rosie();
		magicalWall();
	// spam filter
	jQuery('input.age').val('1987');

	$('.anchor.vh60').click(function(){ga('send', 'event', 'top nav', 'click', 'download')});
	$('.anchor.vh40.left').click(function(){ga('send', 'event', 'top nav', 'click', 'create')});
	$('.anchor.vh40.right').click(function(){ga('send', 'event', 'top nav', 'click', 'watch')});
	$('li.create .anchor').click(function(){ga('send', 'event', 'card', 'click', 'create')});
	$('li.watch .anchor').click(function(){ga('send', 'event', 'card', 'click', 'watch')});
	$('li.download .anchor').click(function(){ga('send', 'event', 'card', 'click', 'download')});
	$('.section2 .twitter').click(function(){ga('send', 'event', 'avatar', 'share', 'twitter')});
	$('.section2 .facebook').click(function(){ga('send', 'event', 'avatar', 'share', 'facebook')});
	$('.section2 .save').click(function(){ga('send', 'event', 'avatar', 'share', 'save')});
	$('.magicwall').click(function(){ ga('send', 'event','social feed', 'twitter', 'post')});
	$('iframe').click(function(){ ga('send', 'event', 'play', 'clicked')});
	$('input[type="submit"]').click(function(){ ga('send', 'event','ebook', 'click', 'form submit')});
	$('.section6 .hidden a').click(function(){ ga('send', 'event','ebook', 'click', 'download')});
	$('.section6 .twitter').click(function(){ ga('send', 'event','page', 'share', 'twitter')});
	$('.section6 .facebook').click(function(){ ga('send', 'event','page', 'share', 'facebook')});
	$('.section6 .linkedin').click(function(){ ga('send', 'event','page', 'share', 'linkedin')});
	$('.section7 .button').click(function(){ ga('send', 'event','button', 'click', 'Get to Know CompTIA')});

})
	$(window).resize(function(){
		optHeight();
		$(".magicwall").magicWall("update");
	})
	$(window).scroll(function(){
		stickyNav();
	})
//form submit functions
$.fn.clearForm=function(){return this.each(function(){var e=this.type,t=this.tagName.toLowerCase();return"form"==t?$(":input",this).clearForm():void("text"==e||"password"==e||"textarea"==t?this.value="":"checkbox"==e||"radio"==e?this.checked=!1:"select"==t&&(this.selectedIndex=-1))})};
function selectVal(tar){
	t = false;
	v = $( "#"+tar+" option:selected" ).text();
	if(v.length > 0){t = true}
		else{$('form.download #'+tar).closest('.fieldwrap').addClass('error');}
	return t;
}
function fieldVal(tar){
	t = false;
	v = $('form.download #'+tar).val();
	if(v.length > 0){t = true}
		else{$('form.download #'+tar).closest('.fieldwrap').addClass('error');}
	return t;
}
function validator(){
	var t = true;
	if(fieldVal('first-name') != true) {t='first-name';}
	if(fieldVal('last-name') != true) {t='last-name';}
	if(fieldVal('organization') != true) {t='organization';}
	if(selectVal('profession') != true) {t='profession';}
	if(fieldVal('email') != true) {t='email';}
	return t;
}
jQuery(document).on('submit', 'form.download', function(event) {
	event.preventDefault();
	//console.log('form sumbited');
		$('form.download .message').html(''); //reset message
		$('.fieldwrap.error').removeClass('error');
		var formData = $("form.download").serialize();
		if(validator() != true){
			$('form.download .message').append('<strong>Submission Error:</strong> Please complete all fields.');
			return false;
		}
		//console.log(formData);
		$.post( "/forms/", formData).done(function( data ) {
		//console.log(data);
		if(data.status != true){
			$('form.download .message').append('An Unknown Error Occured.');
			// ga('send','event','form','error',data.error);
		}else{ // on complete
			// ga('send','event','form','success','download');
			window.open(data.href,'_blank');
			$(this).find('.valign').addClass('active');
			$('form.download').addClass('active').animate({
				opacity:0,
				height:0
			},1000, function(){

			});
			if(wd().w > 1023){
				$('.section6 .hidden').addClass('active').animate({
					opacity:1,
					height:'65px'
				},1000);
			}
			else{
				$('.section6 .hidden').addClass('active');
			}

			$('.ebook').addClass('active');
			$('.section6 p.hidden a').attr('href', data.href);
		}
	});
	});


</script>