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
        <link href="files/css/main.css?<?php echo rand(2, 200000); ?>" type="text/css" rel="stylesheet">
        <link href="files/css/bootstrap.css?<?php echo rand(2, 200000); ?>" type="text/css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
        <script src="files/js/jquery.tinysort.min.js" type="text/javascript"></script>
        <script src="files/js/scroll.js" type="text/javascript"></script>
        <script src="files/js/scripts.js?<?php echo rand(2, 200000); ?>" type="text/javascript"></script>
        <script src="files/js/placeholder.js" type="text/javascript"></script>
        
    <!-- Fancy slider stuff -->
    <script type="text/javascript" src="files/js/jquery.shuffle.js"></script>  
	<script type="text/javascript" src="files/js/jquery.easing.1.3.js"></script> 
    <link rel="stylesheet" href="files/css/jquery.mCustomScrollbar.css" type="text/css">
    
    <!-- Waypoints Stuff -->
    <script type="text/javascript" src="files/js/waypoints.js"></script>
	<script type="text/javascript" src="files/js/modernizr.custom.js"></script>
    
	<!-- mousewheel plugin -->
	<script type="text/javascript" src="files/js/jquery.mousewheel.min.js"></script>
	<!-- custom scrollbars plugin -->
	<script type="text/javascript" src="files/js/jquery.mCustomScrollbar.js"></script>
    
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
    
    <!-- Le Thumbnail Scroller -->
    <link href="files/css/jquery.thumbnailScroller.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="files/js/jquery.thumbnailScroller.js"></script>
    
    <script type="text/javascript">
	$(document).ready(function() {
		bookmarkscroll.scrollTo('haveyou');
		
		mixpanel.track("Company Page View");
		
		$('#menu').css({
			display:'block',
			width: '860px'
		});	

		//Sticky element code
		$('#haveyouapp').waypoint(function(event,direction){
			if(direction == 'down'){
				$('.changeover').animate({color:'#ffcc00'}, 2000);
			}
			else{
				$('.changeover').animate({color:'#5f5f5f'}, 1000);
			}
		});
		
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
	function runThumbnail(){		
		$("#tS2").thumbnailScroller({ 
			scrollerType:"clickButtons", 
			scrollerOrientation:"horizontal", 
			scrollSpeed:2, 
			scrollEasing:"easeOutCirc", 
			scrollEasingAmount:600, 
			acceleration:4, 
			scrollSpeed:800, 
			noScrollCenterSpace:10, 
			autoScrolling:0, 
			autoScrollingSpeed:2000, 
			autoScrollingEasing:"easeInOutQuad", 
			autoScrollingDelay:500 
		});
	}
	</script>
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

        <!-- end fancy slider -->
    </head>
    <body onLoad="runThumbnail();">
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
                <a href="javascript:bookmarkscroll.scrollTo('portfolio')" onClick="mixpanel.track('Company Viewed Portfolio');" class="menu-button"><span class="menu-label">this is michigan</span></a>
            </li>
            <li>
                <a href="javascript:bookmarkscroll.scrollTo('register')" onClick="mixpanel.track('Company Viewed Registration');" class="menu-button"><span class="menu-label">register</span></a>
            </li>
            <li>
                <a href="javascript:bookmarkscroll.scrollTo('faq')" onClick="mixpanel.track('Company Viewed FAQ');" class="menu-button"><span class="menu-label">faq</span></a>
            </li>
            <li>
                <a href="javascript:bookmarkscroll.scrollTo('participants')" onClick="mixpanel.track('Company Viewed Participants');" class="menu-button"><span class="menu-label">participants</span></a>
            </li>
            <li>
                <a href="javascript:bookmarkscroll.scrollTo('sponsors')" onClick="mixpanel.track('Company Viewed Sponsors');" class="menu-button"><span class="menu-label">sponsors</span></a>
            </li>
        </ul>
    </nav>
    </div>
    <!-- end nav -->
    <!-- begin main body -->
    <div class="container">
    	<div class="row" id="portfolio">
            <br>
            <br>
            <h1 style="text-align:center; padding-top:75px; padding-bottom:50px; font-size:70px;">THIS IS MICHIGAN</h1>
            <div id="tS2" class="jThumbnailScroller">
                <div class="jTscrollerContainer">
                    <div class="jTscroller">
                        <a href="#1kp" onClick="mixpanel.track('Company Viewed 1KP Portfolio');" data-toggle="modal"><div style="left:20px;" class="thumb">1000 Pitches</div><img src="files/portfolio/1kp.jpg" /></a>
                        <a href="#crashcourse" onClick="mixpanel.track('Company Viewed Crash Course');" data-toggle="modal"><div style="left:370px;" class="thumb">Startup Crash Course</div><img src="files/portfolio/crash_course.png" /></a>
                        <a href="#edu" onClick="mixpanel.track('Company Viewed EDU Portfolio');" data-toggle="modal"><div style="left:690px;" class="thumb">EDUpreneurship Bootcamp</div><img src="files/portfolio/edu.jpg" /></a>
                        <a href="#sociale" onClick="mixpanel.track('Company Viewed Social(E)');" data-toggle="modal"><div style="left:1040px;" class="thumb">Social (E)mpact</div><img src="files/portfolio/sociale.jpg" /></a>
                        <a href="#cfe" onClick="mixpanel.track('Company Viewed CFE');" data-toggle="modal"><img src="files/portfolio/cfe.jpg" /></a>
                        <a href="#techarb" onClick="mixpanel.track('Company Viewed Techarb');" data-toggle="modal"><div style="left:1790px;" class="thumb">TechArb</div><img src="files/portfolio/techarb.jpg" /></a>
                        <a href="#startupweek" onClick="mixpanel.track('Company Viewed Startup Weekend');" data-toggle="modal"><div style="left:2190px;" class="thumb">Startup Weekend</div><img src="files/portfolio/startupweek.png" /></a>
                        <a href="#mpoweredblog" onClick="mixpanel.track('Company Viewed MPowered Blog');" data-toggle="modal"><img src="files/portfolio/mpoweredblog.png" /></a>
                    </div>
                </div>
                <a href="#" class="jTscrollerPrevButton"></a>
                <a href="#" class="jTscrollerNextButton"></a>
            </div>
        </div>
        <div id="haveyouapp"></div>
        <div class="row" id="haveyou">
        	<div id="title">
            	<h1>Have you registered yet?</h1>
                <h3>The <span class="changeover">MPowered Startup Career Fair</span> takes place on <span class="changeover">January 17th, 2013</span></h3>
                <h3><span class="changeover">1pm - 5pm</span> in <span class="changeover">Pierpont Commons</span> and the <span class="changeover">Duderstadt Center</span></h3>
                <br>
                <br>
                <h3 style="padding-left:250px;"><span class="changeover"><a href="javascript:bookmarkscroll.scrollTo('register');" class="btn btn-success">Register</a> before December 30th</span> and  get the chance to meet sweet students the night before the fair at our two meet and greets.</h3>
                <br>
                <br>
				<h3 style="padding-right:250px;">Want to <span class="changeover">connect with students</span> weeks before the fair? Students can shortlist their favorite companies using the <button type="button" class="btn btn-primary btn-small"><i class="icon-file icon-white"></i>    Shortlist</button> button. We then forward you the list of students, with their emails and majors!</h3>
            </div>
        </div>
    	<div class="row" id="register">
        	<iframe height="2488" id="wufooform" allowTransparency="true" frameborder="0" scrolling="no" style="width:100%;border:none"  src="https://wufoo03.wufoo.com/embed/z7r9k5/"><a href="https://wufoo03.wufoo.com/forms/z7r9k5/">Fill out my Wufoo form!</a></iframe>
        </div>
        <div id="faq" class="row">
            <h2 style="padding-left:25px;">faq</h2>
            <ul class="faq">
                <li><h3>Who should I contact with questions,concerns, updates?</h3></li>
                <li><p>Feel free to contact both event directors, Michelle Lu (lumich@umich.edu) or Brandon Eagle (bleagle@umich.edu).<br>
If you’d like to contact the Center for Entrepreneurship, email amyklink@umich.edu.</p></li>
                <li><h3>How much does attendance cost?</h3></li>
                <li><p>The cost of the event follows the following dates. This one-time cost includes the table, food, and day-of resources.</p><p>$100: Registration through Nov. 20, 2012</p><p>$150: Registration Nov. 21 - Jan. 3, 2013</p><p>$200: Registration Jan. 4 - Jan. 10, 2013</p><p>Transportation costs are not covered.</p></li>
                <li><h3>Are fees refundable?</h3></li>
                <li><p>Unfortunately, the registration fee is not refundable.</p></li>

                <li><h3>What is MPowered Entrepreneurship?</h3></li>
                <li><p>We’re a kickass student organization that spreads entrepreneurship to thousands of students across campus. <a href="http://mpowered.umich.edu" target="_blank">See how we do this.</a></p></li>
                
                <li><h3>Where and when will the event be held?</h3></li>
                <li><p>Jan 17, 2013 from 1-5 pm at the Duderstadt Library and Pierpont Commons, on North Campus.</p></li>

                <li><h3>What type of companies will attend?</h3></li>
                <li><p>This is a career fair for startups specifically. If you’re unsure as to whether your company is considered a startup, please feel free to shoot us an email. U of M has amazing career fairs that you can find more information on here and here.</p></li>

                <li><h3>What students will be at the fair?</h3></li>
                <li><p>Firstly, they’re all brilliant. Second, they’ll range from undergraduate to graduate students from all colleges across the university. Check out our rankings in engineering, business, literature and science, information and public policy. 
We are specifically targeting the College of Engineering, the College of Literature, Science and Arts, the Ross School of Business and the School of Information.
</p></li>
                <li><h3>To what address do I ship my items?</h3></li>
                <li><p>Ship all items to</p><p>
Center for Entrepreneurship<br>
251 Chrysler Center<br>
2121 Bonisteel Blvd.<br>
Ann Arbor, MI 48109<br>
</p></li>
            </ul>
        </div>
    	<div id="participants" class="row">
            <div id="search-form">
                <form class="form-search" style="" action="javascript:return false;">
                  <input type="text" onKeyUp="runFilter(this);" id="companyfilter" class="input-xxlarge search-query" placeholder="Filter by major, industry or skill...">
                </form>
                <p id="filterval"></p>
            </div>
            <div class="company_thumbnails">
                <ul class="company_logos">
                <?php
					if(($file = fopen("files/logos/companies.csv","r")) !== false){
						$count = 0;
						while($data = fgetcsv($file)){
							if($count){
								echo "<li><a href='#".$data[0]."' data-toggle='modal'><p class='comporder' style='display:none;'>".$data[38]."</p><p class='hidden'>".$data[1]." ".$data[4]." ".$data[5]." ".$data[13]." ".$data[14]." ".$data[15]." ".$data[16]." ".$data[17]." ".$data[18]." ".$data[19]." ".$data[20]." ".$data[21]." ".$data[22]." ".$data[23]." ".$data[24]." ".$data[25]." ".$data[26]." ".$data[27]." ".$data[28]." ".$data[29]." ".$data[30]." ".$data[31]." ".$data[32]." ".$data[33]." ".$data[34]."</p><img id='logo".$count."' src='files/logos/".$data[7].".png' width='210' height='140' /></a></li>";
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
            <br>
            <br>
            <br>
        	<p>Copyright &copy;2012 Regents of the University of Michigan</p>
        </div>
    </div>
    <!-- end main body -->
    <!-- Begin Modals -->
    
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
	if(($file = fopen("files/portfolio/groups.csv","r")) !== false){
		$count = 0;
		while($data = fgetcsv($file)){
			if($count){
				echo "<div id='".$data[1]."' class='modal hide fade' role='dialog'>";
				echo "<div class='modal-header'>";
				echo "  <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>";
				echo "  <h3 id='myModalLabel'>".$data[2]."</h3>";
				echo "</div>";
				echo "<div class='modal-body'>";
				echo " <div><img src='files/portfolio/".$data[6]."' style='float:left; padding-right:10px; padding-bottom:10px; max-width:800px;'>";
				echo " <h4>About</h4>";
				echo "  <p>".$data[3]."</p>";
				echo " <h4>Quick History</h4>";
				echo "  <p>".$data[4]."</p>";
				echo " <h4>Achievments</h4>";
				echo "  <p>".$data[5]."</p>";
				echo " <h4>The Future</h4>";
				echo "  <p>".$data[7]."</p>";
				echo " </div>";
				echo "</div>";
				echo "<div class='modal-footer'>";
				echo "</div>";
				echo "</div>";
			}
			$count++;
		}
	}
	else die("unable to read logos");
	?>
    
    <?php
	if(($file = fopen("files/logos/companies.csv","r")) !== false){
		$count = 0;
		while($data = fgetcsv($file)){
			if($count){
				echo "<div id='".$data[0]."' class='modal hide fade' style='width:600px; margin:-28% 0 0 -17%' role='dialog'>";
				echo "<div class='modal-header'>";
				echo "  <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>";
				echo "  <h3 id='myModalLabel'><a href='".$data[2]."' target='_blank'>".$data[1]."</a><span style='float:right; padding-right:30px;'><button class='btn btn-small btn-primary' type='button' id='pop".$data[0]."' data-html='true' data-content='<form id=\"form".$data[0]."\"><p style=\"font-size:14px\">Name: <input class=\"input-medium\" type=\"text\" name=\"name\"></p><div class=\"input-append\"><p style=\"font-size:14px\">Uniqname: <input class=\"input-small\" type=\"text\" name=\"email\"><span class=\"add-on\">@umich.edu</span></p></div><p style=\"font-size:14px\">Major: <input class=\"input-medium\" type=\"text\" name=\"major\"></p><div style=\"display:none; line-height:0px;\" class=\"alert alert-block alert-error\" id=\"nerr".$data[0]."\"><button style=\"top:-8px;\" type=\"button\" class=\"close\" onclick=\"$(this.parentNode).hide();\">×</button><p style=\"font-size:10px;\">Error Name must be included</p></div><div style=\"display:none; line-height:0px;\" class=\"alert alert-block alert-error\" id=\"eerr".$data[0]."\"><button style=\"top:-8px;\" type=\"button\" class=\"close\" onclick=\"$(this.parentNode).hide();\">×</button><p style=\"font-size:10px;\">Error UniqName must be included</p></div><div style=\"display:none; line-height:0px;\" class=\"alert alert-block alert-error\" id=\"merr".$data[0]."\"><button style=\"top:-8px;\" type=\"button\" class=\"close\" onclick=\"$(this.parentNode).hide();\">×</button><p style=\"font-size:10px;\">Error Major must be included</p></div><p align=\"right\"><button type=\"button\" class=\"btn btn-primary btn-small\" onclick=\"like(".$data[0].")\">Shortlist</button></p>' data-loading-text='Shortlisted'><i class=\"icon-file icon-white\"></i>      Shortlist</button></span></h3>";
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
				echo " <h4>Hiring</h4>";
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
    
    <!-- Le Bootstrap Scripts -->
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