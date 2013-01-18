<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <noscript>
        <meta http-equiv="refresh" content="0;URL=http://mpowered.umich.edu/careerfair/nojs.html">
        </noscript>
        <meta http-equiv="content-type" content="text/html">
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        <meta http-equiv="description" content="The University of Michigan's annual MPowered Startup Career Fair Website. Find all the information about the upcoming event!">
        <meta http-equiv="keywords" content="startup, career, fair, careerfair, career fair, startups, university of michigan, mpowered, students, jobs, michigan, ann arbor, entrepreneurship, intern, internship, duderstadt, pierpont, pierpont commons, opportunities, north campus, northcampus, danyaal">
        <title>Career Fair 2013</title>
        <link href="files/css/main.css?<?php echo rand(2, 2000); ?>" type="text/css" rel="stylesheet">
        <link href="files/css/bootstrap.css?<?php echo rand(2, 2000); ?>" type="text/css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
        <script src="files/js/jquery.tinysort.min.js" type="text/javascript"></script>
        <script src="files/js/scroll.js" type="text/javascript"></script>
        <script src="files/js/scripts.js?<?php echo rand(2, 2000); ?>" type="text/javascript"></script>
        <script src="files/js/placeholder.js" type="text/javascript"></script>
        
    <!-- Waypoints Stuff -->
    <script type="text/javascript" src="files/js/waypoints.js"></script>
	<script type="text/javascript" src="files/js/modernizr.custom.js"></script>
    
    <!-- Search Delay -->
    <script type="text/javascript">
	/*
	 * delayKeyup
	 * http://code.azerti.net/javascript/jquery/delaykeyup.htm
	 * Inspired by CMS in this post : http://stackoverflow.com/questions/1909441/jquery-keyup-delay
	 * Written by Gaten
	 * Exemple : $("#input").delayKeyup(function(){ alert("5 secondes passed from the last event keyup."); }, 5000);
	 */
	(function ($) {
		$.fn.delayKeyup = function(callback, ms){
			var timer = 0;
			$(this).keyup(function(){                   
				clearTimeout (timer);
				timer = setTimeout(callback, ms);
			});
			return $(this);
		};
	})(jQuery);
	</script>
    
    <!-- start analytics-->
    <script type="text/javascript">(function(c,a){window.mixpanel=a;var b,d,h,e;b=c.createElement("script");b.type="text/javascript";b.async=!0;b.src=("https:"===c.location.protocol?"https:":"http:")+'//cdn.mxpnl.com/libs/mixpanel-2.1.min.js';d=c.getElementsByTagName("script")[0];d.parentNode.insertBefore(b,d);a._i=[];a.init=function(b,c,f){function d(a,b){var c=b.split(".");2==c.length&&(a=a[c[0]],b=c[1]);a[b]=function(){a.push([b].concat(Array.prototype.slice.call(arguments,0)))}}var g=a;"undefined"!==typeof f?
    g=a[f]=[]:f="mixpanel";g.people=g.people||[];h="disable track track_pageview track_links track_forms register register_once unregister identify name_tag set_config people.identify people.set people.increment".split(" ");for(e=0;e<h.length;e++)d(g,h[e]);a._i.push([b,c,f])};a.__SV=1.1})(document,window.mixpanel||[]);
    mixpanel.init("bce4e70a1672517dedd6ef4aa3682581");</script>
	<script type="text/javascript">
    
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-36363133-1']);
      _gaq.push(['_trackPageview']);
    
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    
    </script>
    <!-- end analytics -->   
     
	<!-- mousewheel plugin -->
	<script type="text/javascript" src="files/js/jquery.mousewheel.min.js"></script>
	<!-- custom scrollbars plugin -->
	<script type="text/javascript" src="files/js/jquery.mCustomScrollbar.js"></script>
    <!--
	<script>
		(function($){
			$(window).load(function(){
				$(".company_thumbnails").mCustomScrollbar({
					scrollButtons:{
						enable:true
					}
				});
			});
		})(jQuery);
	</script>
    -->
    <script>
	$(document).ready(function() {
		//Scroll straight to filter
		//bookmarkscroll.scrollTo('one');
		
		mixpanel.track('Home Page Viewed');
				
		//Sticky element code
		$('#navstart').waypoint(function(event,direction){
			if(direction == 'down'){
				$('#menu').slideDown(200);
			}
			else{
				$('#menu').slideUp(200);
			}
		});
		$('#text').waypoint(function(event,direction){
			if(direction == 'down'){
				changeBack(1);
			}
		});
		
		$('#companyfilter').keyup(function(){
			$('#filterload').removeClass('hidden');
		});
		
		$('#companyfilter').delayKeyup(function() {
            var filter = $('#companyfilter').val(), count = 0;
			$(".company_logos:first li").each(function () {
				if ($(this).text().search(new RegExp(filter, "i")) < 0) {
					$(this).addClass("hidden");
				} else {
					$(this).removeClass("hidden");
					count++;
				}
				$('ul.company_logos>li[class!=hidden]').tsort('p.comporder', {order:'asc'});
				$('ul.company_logos>li[class=hidden]').tsort({order:'asc'});
			});
			$('#filterload').addClass('hidden');
        }, 325);
		
		setTimeout(function(){changeBack(1);setTimeout(function(){$('#sponsortop').animate({opacity:1}, 2000);},1500);}, 1000);
		
	<?php	
		if(($file = fopen("files/logos/companies.csv","r")) !== false){
			$count = 0;
			while($data = fgetcsv($file)){
				if($count){
					echo "$('#pop".$data[0]."').popover({placement:'right', title:'<h4 style=\"font-size:14px; margin-top:-3px; margin-bottom:-3px;\">Get on this companys shortlist</h4>'});\n";
					echo "$('#pop".$data[0]."').tooltip({html:'false', title:'Add your name to this company\'s shortlist and get invited to events such as their meet and greet', placement:'bottom'});";
				}
			$count++;
			}
		}
		else die('unable to get companies');
	?>
		
	});
    </script>
        <!-- end fancy slider -->
    </head>
    <body>
    <div style="display:none;">
    <!--
                           ___
                          / / \\\                   
                          \ \  \\\                      
                           \ \  \\\                                                               
             ______________ \ \  \\\__                                             
     ____  _/                       (O)\       The Great Bunny shall rule the world!
    /    \/                         ( __|   
    |____/               |      ------- \\ 
         |______________/_______________// 
    
    
    Design by Pratik Kabra, Michelle Lu and The Danyaal (Danyaal Rangwala) -->
    </div>
    <!-- Warn people that they're running ancient Internet Explorer Browsers -->
    <!--[if lte IE 6]>
    <div class="alert alert-error" style="position:fixed; bottom:-13px;"><button type="button" class="close" data-dismiss="alert">×</button><strong>Alert!</strong> We've detected that you are using an old browser. Our website looks great in 21st Century Browsers. Try it in Chrome, Firefox, Safari or IE9+!</div>
    <![endif]-->
    <!--[if lte IE 8]>
    <div class="alert alert-error" style="position:fixed; bottom:-13px;"><button type="button" class="close" data-dismiss="alert">×</button><strong>Alert!</strong> We've detected that you are using an old browser. Our website looks great in new browsers like Chrome, Firefox, Safari or IE9+</div>
    <![endif]-->
    <!-- begin nav -->
    <div class="nav-container">
    	<nav id="menu">
        	<ul class="menu-top">
            	<li>
                	<a href="javascript:bookmarkscroll.scrollTo('student');" onClick="mixpanel.track('Home Viewed Companies');" class="menu-button"><span class="menu-label">find a job</span></a>
                </li>
            	<li>
                	<a href="javascript:bookmarkscroll.scrollTo('faq');" onClick="mixpanel.track('Home Viewed FAQ');" class="menu-button"><span class="menu-label">faq</span></a>
                </li>
            	<li>
                	<a href="javascript:bookmarkscroll.scrollTo('meet');" class="menu-button"><span class="menu-label">about</span></a>
                    <div class="menu-dropdown menu-dropdown1">
                    	<ul class="menu-sub">
                        	<li><a href="http://mpowered.umich.edu" target="_blank"  onClick="mixpanel.track('Home Viewed MPowered Site');"class="menu-subbutton"><span class="menu-label sub-label">MPowered</span></a></li>
                            <li><a href="javascript:bookmarkscroll.scrollTo('meet');" onClick="mixpanel.track('Home Viewed Team');" class="menu-subbutton"><span class="menu-label sub-label">Meet the team</span></a></li>
                        </ul>
                    </div>
                </li>
            	<li>
                	<a href="javascript:bookmarkscroll.scrollTo('sponsors');" onClick="mixpanel.track('Home Viewed Sponsors');" class="menu-button"><span class="menu-label">sponsors</span></a>
                </li>
                <li>
                	<a href="#" class="menu-button menu-drop"><span class="menu-label">twitter</span></a>
                	<div class="menu-dropdown menu-dropdown3">
                    	<ul class="menu-sub">
                        <li><a class="twitter-timeline" href="https://twitter.com/startUMup13" data-widget-id="265082097868357632">Tweets by @startUMup13</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></li>
                        </ul>
                    </div>
                </li>
            	<li style="margin-left:50px;">
                	<a href="javascript:bookmarkscroll.scrollTo('top');" class="menu-button"><span class="menu-label">top</span></a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- end nav -->
    <div id="top"></div>
    <!-- begin main body -->
    <div id="top-intro">
    <p id="text">Imo.im helps people talk to their friends and make new friends &amp; glyph links consumers' financial goals to everyday decisions &amp; detroit gun works manufactures gun components &amp; recsolu builds apps for employers recruiting on campus &amp; stik helps you find small businesses recommended by friends &amp; amplifinity makes software to manage viral brand advocacy campaigns &amp; upto is a future-focused social platform &amp; quantum signal  does robotics, forensics, simulation, and volleyball &amp; comfortapp fundraises to donate iPads to fill a niche in patientcare &amp;  ultra electronics designs and manufactures portable fuel cell systems &amp; seelio is a comprehensive linkedin for college studens &amp; valicor provides separation technology and sustainability in action &amp; larky gets you all the discounts you deserve &amp; are you a human makes simple games to replace captcha on the web &amp; gdi infotech consults in information technology &amp; barracuda networks works with fast-paced, late stage startups &amp; hiredmyway connects top job seekers with employers &amp; payanywhere offers flexible payment solutions, anywhere &amp; coherix is a non-contact 3D metrology company &amp; logic solutions develops mobile and web apps for businesses &amp; think tech labs takes ideas and makes them into reality &amp; unique systems design develops custom software for transportation &amp; terumo heart improves lives for the heart failure patient &amp; deepfield.Imo.im helps people talk to their friends and make new friends &amp; glyph links consumers' financial goals to everyday decisions &amp; detroit gun works manufactures gun components &amp; recsolu builds apps for employers recruiting on campus &amp; stik helps you find small businesses recommended by friends &amp; amplifinity makes software to manage viral brand advocacy campaigns &amp; upto <b id="navstart"></b>is a future-focused social platform &amp; quantum signal  does robotics, forensics, simulation, and volleyball &amp; comfortapp fundraises to donate iPads to fill a niche in patientcare &amp;  ultra electronics designs and manufactures portable fuel cell systems &amp; seelio is a comprehensive linkedin for college studens &amp; valicor provides separation technology and sustainability in action &amp; larky gets you all the discounts you deserve &amp; are you a human makes simple games to replace captcha on the web &amp; gdi infotech consults in information technology &amp; barracuda networks works with fast-paced, late stage startups &amp; hiredmyway connects top job seekers with employers &amp; payanywhere offers flexible payment solutions, anywhere &amp; coherix is a non-contact 3D metrology company &amp; logic solutions develops mobile and web apps for businesses &amp; think tech labs takes ideas and makes them into reality &amp; unique systems design develops custom software for transportation &amp; terumo heart improves lives for the heart failure patient &amp; deepfield.Imo.im helps people talk to their friends and make new friends &amp; glyph links consumers' financial goals to everyday decisions &amp; detroit gun works manufactures gun components &amp; recsolu builds apps for employers recruiting on campus &amp; stik helps you find small businesses recommended by friends &amp; amplifinity makes software to manage viral brand advocacy campaigns &amp; upto is a future-focused social platform &amp; quantum signal  does robotics, forensics, simulation, and volleyball &amp; comfortapp fundraises to donate iPads to fill a niche in patientcare &amp;  ultra electronics designs and manufactures portable fuel cell systems &amp; seelio is a comprehensive linkedin for college studens &amp; valicor provides separation technology and sustainability in action &amp; larky gets you all the discounts you deserve &amp; are you a human makes simple games to replace captcha on the web &amp; gdi infotech consults in information technology &amp; barracuda networks</p>
    	<div id="logo"><p align="center">Startup Career Fair</p><p align="center" style="font-size:18px;">Thursday, January 17th - Pierpont Commons and Duderstadt Library</p></div>
        <div id="links">
            <div id="companies"><a href="company" onMouseOver="changeBack(1); $('#sponsortop').animate({opacity:1}, 2000);">for companies</a></div>
            <div id="students"><a href="javascript:bookmarkscroll.scrollTo('student');" onClick="mixpanel.track('Home Viewed Companies');" onMouseOver="changeBack(1); $('#sponsortop').animate({opacity:1}, 2000);">for students</a></div>
        </div>
            <div class="sponsorstop" style="opacity:0;" id="sponsortop">
            	<ul class="logorowtop">
                    <li class="logo" style="margin-right:10px;"><a href="#umcu" data-toggle="modal"><img src="files/img/umculogo.gif" style="border-width:0; height:50px;"></a></li>
                    <li class="logo" style="margin-right:10px;"><a href="#ugp" data-toggle="modal"><img src="files/img/ugplogo.png" style="border-width:0; height:70px;"></a></li>
                    <li class="logo" style="margin-right:10px;"><a href="#brinks" data-toggle="modal"><img src="files/img/brinks.png" style="border-width:0; height:160px; margin-top:60px;"></a></li>
                </ul>
                <ul class="logorowtop">
                    <li class="logo" style="margin-right:10px;"><a href="http://cfe.umich.edu" target="_blank"><img src="files/img/cfe.jpg" style="border-width:0; height:80px;"></a></li>
                    <li class="logo" style="margin-right:10px;"><a href="http://mpowered.umich.edu" target="_blank"><img src="files/img/mpowered.png" style="border-width:0; height:50px;"></a></li>
                </ul>
            </div>
    </div>
    <div class="container" style="margin:0 auto 0;">
    <div id="debug">
    </div>
    <!-- Begin main content -->
    	<div id="student" class="row light">
            <div id="search-form">
                <form class="form-search" style="" action="javascript:return false;">
                  <input type="text" id="companyfilter" class="input-xxlarge search-query" placeholder="Filter by major, industry or skill...">
                  <img src="files/img/loader.gif" id="filterload" class="hidden" style="position:absolute; margin-top:15px; margin-left:-50px;">
                </form>
                
            </div>
            <div class="company_thumbnails">
                <ul class="company_logos">
                <?php
					if(($file = fopen("files/logos/companies.csv","r")) !== false){
						$count = 0;
						while($data = fgetcsv($file)){
							if($count){
								echo "<li><a href='#".$data[0]."' data-toggle='modal'><p class='comporder' style='display:none;'>".$data[38]."</p><p class='hidden'>".$data[1]." ".$data[4]." ".$data[5]." ".$data[13]." ".$data[14]." ".$data[15]." ".$data[16]." ".$data[17]." ".$data[18]." ".$data[19]." ".$data[20]." ".$data[21]." ".$data[22]." ".$data[23]." ".$data[24]." ".$data[25]." ".$data[26]." ".$data[27]." ".$data[28]." ".$data[29]." ".$data[30]." ".$data[31]." ".$data[32]." ".$data[33]." ".$data[34]." Computer Science</p><img id='logo".$count."' src='files/logos/".$data[7].".png' width='210' height='140' /></a></li>";
							}
							$count++;
						}
					}
					else die("unable to read logos");
				?>
                </ul>
                <script>
					$('ul.company_logos>li[class!=hidden]').tsort('p.comporder', {order:'asc'});
				</script>
            </div>
            <br>
            <br>
        </div>
        <div class="row" id="faq">
            	<h2 style="padding-left:25px;">faq</h2>
            <div class="faq-container">
                <ul class="faq">
                	<li><div class="inner"><h3>When and where is the fair?</h3>
                    <p>The fair is on January 17th, 2013 between 1PM and 5PM at Pierpont and the Duderstadt Center</p></div></li>
                	<li><div class="inner"><h3>Why work for a startup?</h3>
                    <p>1. Impact: Startups are disruptive forces. You’ll be encouraged to work with agility and speed—there’s no time for bureaucracy and dawdling as you may find at other companies. Every project you work on, every problem you finally solve after days of work, will be outputted to customers for immediate feedback and benefit.</p>
                    <p>2. Culture: It’s simple. Work hard, have fun, experiment. The startups coming to this fair are committed to growing company culture that keeps their teams happy, creative, comfortable, and hardworking. This means nerf gun wars, free beer, 24 hour foosball, company lunches, etc. Additionally, the culture is accommodating. If you think there needs to be a snowball fight every December 4th, go for it. Check out each company for their individual culture quirks!</p>
                    <p>3. Learn more: startups depend on a smaller team to do big impact. Even if you’re hired as a software engineer, you may be asked to wear a analyst hat, a social media hat, etc. You’ll be challenged in a good way, asked to venture into your discomfort zone. And in the end, you’ll come out alive and smarter than you’d ever expect.</p>
                    </div></li>
                	<li><div class="inner"><h3>Does the career fair have a dress code?</h3><p>Hell no! Startups worship jeans, flip flops, and personality. So we encourage you to dress to your heart’s desire. You’ll shine brighter that way.</p></div></li>

					<li><div class="inner"><h3>How do I get from Central campus to North campus?</h3><p>There are a few buses you can take up to North Campus:
                    <br><br>
                    Bursley-Baits<br>
                    Northwood<br>
                    Commuter North<br>
                    <br>
                    All three stop at PIERPONT COMMONS, where the career fair is taking place. It’s the CC Little of North Campus, so you won’t miss it. </p></div></li>

					<li><div class="inner"><h3>Are there jobs for non-engineers?</h3><p>If you check out our website, you’ll find that the companies attending are looking for students from all majors. Finance, operations, physics, computer science, marketing, English, art & design, etc.  And here’s a secret: they care more about YOU</p></div></li>
                    <li><div class="inner"><h3>Will there be a coat and backpack check?</h3><p>Of course! We’ve got your possessions and clothing covered. Go find a job.</p></div></li>
                    
                    <li><div class="inner"><h3>How should I prepare?</h3><p>Do your research. Print out lots of resumes. Bring business cards. Bring your personality. Startups love when you know enough about their products to love them, but they’re blown away if you can make criticisms and suggestions. Keep that in mind.</p></div></li>
				</ul>
            </div>
        </div>
        <div id="meet" class="row">
        	<div class="title"><h2>Meet the team</h2></div>
        	<div class="video">
               <iframe src="http://player.vimeo.com/video/52670008?title=0&amp;byline=0&amp;portrait=0&amp;badge=0" width="700" height="393" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen align="middle"></iframe>
            </div>
        	<table class="group" style="margin-top:100px;">
            <tr>
                <td class="two">
                        <img src="files/img/team/6.png">
                        <h5>Michelle Lu<br>The Boss</h5>
                        <p>Michelle is the boss. You either work with her or you work with her, otherwise you're not doing it right. Nuff said.</p>
                </td>
                <td class="two">
                        <img src="files/img/team/2.png"  style="float:left; padding-right:10px;">
                        <h5 style="padding-top:40px;">Brandon Eagle<br>The Cooler Boss</h5>
                        <p>Brandon was born into the world with an aura of cool. The hat is the sign of order of cool. If he's wearing it backwards he's chill, if its pointing forwards, prepare for the party animal.</p>
                </td>
            </tr>
            </table>
            <table class="group-large">
            <tr>
                <td class="three">
                    <img src="files/img/team/4.png">
                    <h5>Pratik Kabra<br>The god of programming</h5>
                    <p>At the age of 5, Pratik accidently jabbed himself with a LAN cable while trying to connect his computer to the internet. He was sucked in and injected directly into the internet. No one knows what he saw in there. All we know is he's good at making websites.</p>
                </td>
                <td class="three">
                    <img src="files/img/team/1.png">
                    <h5>Tim Wimbush<br>Renaissance Man</h5>
                    <p>Have you heard of Tim Wimbush? Well Leonardo Davinci's kinda like him. To clarify, Tim plays soccer, does startups, beasts econ exams, and has the magic touch with outreach. If he ever contacts you, just say YES.</p>
                </td>
                <td class="three">
                    <img src="files/img/team/5.png">
                    <h5>Leonard Gottlieb<br>Chief Coat Man</h5>
                    <p>Leonard AKA Lenny's mind is a bubbling cauldron of imagination.  He'll find you a slogan, he'll come up with an app, but all we know for sure is you'll find him in the coat room. Check that party out the day of.</p>
                </td>
            </tr>
            </table>
            <table class="group">
            <tr>
                <td class="two">
                	<img src="files/img/team/7.jpg" style="float:left; padding-right:10px;">
                    <h5 style="padding-top:40px;">Natasja Nielsen<br>Thrifty Sweater Girl</h5>
                    <p>If it's new, it ain't touching her body. Natasja is chief of thrift shopping and sustainable decisions. She owns more male sweaters than a male sweater model. </p>
                </td>
                <td class="two">
                	<img src="files/img/team/3.png">
                    <h5>Vivek Thakkar<br>Mr. Kors</h5>
                    <p>Agent Kors was forced to retire after taking a bullet on a mission to save the Saudi Arabian King's daughter. All he kept from his past life was a watch, one that has saved him on countless ocassions. Few know exactly what it is capable of. Wanna find out? Ask him the time at 3:35 pm on January 17th.</p>
                </td>
              </tr>
            </table>
        </div>
        <div class="row" id="sponsors">
        	<h2>Sponsors</h2>
            <div class="sponsors">
            	<ul class="logorow">
                    <li class="logo"><a href="#umcu" data-toggle="modal"><img src="files/img/umculogo.gif"></a></li>
                    <li class="logo"><a href="#ugp" data-toggle="modal"><img src="files/img/ugplogo.png" style="height:175px;"></a></li>
                </ul>
            	<ul class="logorow">
                    <li class="logo"><a href="#brinks" data-toggle="modal"><img src="files/img/brinks.png" style="height:400px;"></a></li>
                    <li class="logo"><a href="http://cfe.umich.edu" target="_blank"><img src="files/img/cfe.jpg" style="margin-left:120px; height:250px; margin-top:-150px;"></a><a href="http://mpowered.umich.edu" target="_blank"><img src="files/img/mpowered.png" style="width:420px; margin-left:40px; display:block; margin-top:30px;"></a></li>
                </ul>
            </div>
        </div>
        <div class="row" id="footer">
            <br>
            <br>
        	<p>Copyright &copy;2012 Regents of the University of Michigan</p>
        </div>
    </div>
    
    <div id='umcu' class='modal hide fade' role='dialog'>
	<div class='modal-header'>
	 <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
	 <h3 id='myModalLabel'><a href="http://www.umcu.org" target="_blank">UM Credit Union</a></h3>
	</div>
	<div class='modal-body'>
    <a href="http://www.umcu.org" target="_blank"><img src="files/img/umculogo.gif"></a>
	<div>
	 <p>Would you like to work part-time while attending school or full-time after graduation? Are
    you interested in working for an organization that gives back to its employees as well as the
    community that it serves? Then consider the University of Michigan Credit Union! At UMCU you
    can enjoy a flexible work schedule, positive and professional work environment and a chance to
    become more involved in your community. Our Branch Operations team is currently searching
    for bright, professional and friendly service minded individuals to provide world-class customer
    service to our members.</p>
     <p>UMCU has six offices in Ann Arbor and a branch in Dearborn. <a href="http://www.umcu.org/about/locations/index.html" target="_blank">Click here for our office locations and hours.</a></p>
	</div>
	</div>
	<div class='modal-footer'>
	</div>
	</div>
    
    <div id='ugp' class='modal hide fade' role='dialog'>
	<div class='modal-header'>
	 <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
	 <h3 id='myModalLabel'><a href="http://undergroundshirts.com" target="_blank">Underground Printing</a></h3>
	</div>
	<div class='modal-body'>
    <a href="http://undergroundshirts.com" target="_blank"><img src="files/img/ugplogo.png" style="height:200px; float:left;"></a>
    <div style="margin-top:30px; margin-right:10px;">
        <p>Underground Printing is a national custom printed apparel provider, offering screenprinting and embroidery on a wide variety of apparel and promotional products.</p>
        <p>Founded in 2001, Underground offers high quality products, great prices, and unmatched service to customers large and small, from national retailers and Fortune 500 companies to local businesses and college student groups.</p>
        <p style="margin-left:30px;"><br>Underground provides you with high quality screenprinted and embroidered products customized with your designs. We began with t-shirts (which continue to be our specialty), but they are only the beginning of what we offer for custom decoration. Hoodies, polos, pens, hats, frisbees, magnets, jerseys, sweats, and more - we do it all at Underground Printing.</p>
	</div>
    </div>
	<div class='modal-footer'>
	</div>
	</div>
    
    <div id='brinks' class='modal hide fade' role='dialog'>
	<div class='modal-header'>
	 <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
	 <h3 id='myModalLabel'><a href="" target="_blank">Brinks, Hofer, Gilson &amp; Lione</a></h3>
	</div>
	<div class='modal-body'>
    <a href="http://www.brinkshofer.com/" target="_blank"><img src="files/img/brinks.png" style="margin-top:20px; margin-right:10px; height:400px;background-color:#fff; float:left;"></a>
	<div style="">
		<h4 style="font-size:16px;">Brinks provides premium intellectual property services, in an appropriate environment, in an ethical and professional manner.</h4>
        <h5 style="font-size:16px;">Mission Statement</h5>
        <p>Our Mission begins with the word "We." Whatever our title or position, we work for the firm. We use our different talents to maximize quality, efficiency and productivity. </p> 
        <p>We provide premium services. Our work is not merely competent, it is exceptional. We deliver high caliber work to clients who demand quality.</p> 
        <p>We specialize in IP law. Our practice is limited to patent, trademark, copyright, trade secret, internet, unfair competition, antitrust and related matters. We work hard to improve our skills and knowledge in our specialty. </p>
        <p>We seek to understand our clients’ business needs. We want them to be completely satisfied with our services, not only in the results, but also in the value that they have received. </p>
        <p>We understand that our clients have budgetary expectations and we aim to meet them. We strive to inform our clients about unexpected fees and expenses as soon as possible. We staff our projects in an efficient and cost-effective manner. </p>
        <p style="margin-left:20px;"><br>We work in an appropriate environment. We have a first-class office. All of our employees are treated with dignity and respect. Our workplace is free from intimidation and harassment. We provide competitive remuneration and benefits. </p>
        <p style="margin-left:20px;">We are ethical. We work zealously on behalf of our clients, but we do so with civility, and in compliance with the rules and canons of our profession. Our opponents know they will see a highly-skilled, scrupulously honest lawyer against them. </p>
        <p style="margin-left:20px;">We are professional. We put the interests of our clients and our profession ahead of our own. We try to lead exemplary lives. We know that if we do all these things we will be successful, happy and fulfilled.</p>
	</div>
	</div>
	<div class='modal-footer'>
	</div>
	</div>
    
    <?php
	if(($file = fopen("files/logos/companies.csv","r")) !== false){
		$count = 0;
		while($data = fgetcsv($file)){
			if($count){
				echo "<div id='".$data[0]."' class='modal hide fade' style='width:600px; margin:-28% 0 0 -17%' role='dialog'>";
				echo "<div class='modal-header'>";
				echo "  <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>";
				echo "  <h3 id='myModalLabel'><a href='".$data[2]."' target='_blank'>".$data[1]."</a><span style='float:right; padding-right:30px;'><button class='btn btn-small btn-primary' type='button' id='pop".$data[0]."' data-html='true' data-content='<form id=\"form".$data[0]."\"><p style=\"font-size:14px\">Name: <input class=\"input-medium\" type=\"text\" name=\"name\"></p><div class=\"input-append\"><p style=\"font-size:14px\">Uniqname: <input class=\"input-small\" type=\"text\" name=\"email\"><span class=\"add-on\">@umich.edu</span></p></div><p style=\"font-size:14px\">Major: <input class=\"input-medium\" type=\"text\" name=\"major\"></p><p style=\"font-size:14px\">Year: <input style=\"width:175px\" type=\"text\" placeholder=\"Freshman, Graduate, PhD..\" name=\"level\"></p><div style=\"display:none; line-height:0px;\" class=\"alert alert-block alert-error\" id=\"nerr".$data[0]."\"><button style=\"top:-8px;\" type=\"button\" class=\"close\" onclick=\"$(this.parentNode).hide();\">×</button><p style=\"font-size:10px;\">Error Name must be included</p></div><div style=\"display:none; line-height:0px;\" class=\"alert alert-block alert-error\" id=\"eerr".$data[0]."\"><button style=\"top:-8px;\" type=\"button\" class=\"close\" onclick=\"$(this.parentNode).hide();\">×</button><p style=\"font-size:10px;\">Error UniqName must be included</p></div><div style=\"display:none; line-height:0px;\" class=\"alert alert-block alert-error\" id=\"merr".$data[0]."\"><button style=\"top:-8px;\" type=\"button\" class=\"close\" onclick=\"$(this.parentNode).hide();\">×</button><p style=\"font-size:10px;\">Error Major must be included</p></div><div style=\"display:none; line-height:0px;\" class=\"alert alert-block alert-error\" id=\"lerr".$data[0]."\"><button style=\"top:-8px;\" type=\"button\" class=\"close\" onclick=\"$(this.parentNode).hide();\">×</button><p style=\"font-size:10px;\">Error Grade must be included</p></div><p align=\"right\"><button type=\"button\" class=\"btn btn-primary btn-small\" onclick=\"like(".$data[0].")\">Shortlist</button></p>' data-loading-text='Shortlisted'><i class=\"icon-file icon-white\"></i>      Shortlist</button></span></h3>";
				echo "</div>";
				echo "<div class='modal-body'>";
				echo " <div style='float:left;'><img src='files/logos/".$data[7].".png' width='210' height='140'></div>";
				echo " <div style='padding-left:230px;'>";
				echo " <h4>Sector</h4>";
				echo "  <p>".$data[4]."</p>";
				echo " <h4>About</h4>";
				echo "  <p>".$data[5]."</p>";
				echo " </div>";
				echo " <div style='padding-left:30px;'>";
				echo " <h4><br>Hiring</h4>";
				echo "  <p>".$data[11]." Full Time<br>".$data[12]." Internships</p>";
				echo " <h4>Majors</h4>";
				echo "  <p>";
				for($i=14;$i<34;$i++){
					if($data[$i] != ""){
						echo $data[$i].", ";
					}
				}
				echo "  </p>";
				echo "<h4>Available Positions</h4>";
				echo "<p>".$data[34]."</p>";
				echo " </div>";
				echo "</div>";
				echo "</div>";
			}
			$count++;
		}
	}
	else die("unable to read company info");
	?>

    <!-- end main body -->
    <!-- Le Bootstrap Scripts -->
    <script src="files/js/jquery.cookies.js"></script>
    <script src="files/js/bootstrap-transition.js"></script>
    <script src="files/js/bootstrap-alert.js"></script>
    <script src="files/js/bootstrap-modal.js"></script>
    <script src="files/js/bootstrap-dropdown.js"></script>
    <script src="files/js/bootstrap-scrollspy.js"></script>
    <script src="files/js/bootstrap-tab.js"></script>
    <script src="files/js/bootstrap-tooltip.js"></script>
    <script src="files/js/bootstrap-popover.js"></script>
    <script src="files/js/bootstrap-button.js"></script>
    <script src="files/js/bootstrap-collapse.js"></script>
    <script src="files/js/bootstrap-carousel.js"></script>
    <script src="files/js/bootstrap-typeahead.js"></script>
    </body>
</html>