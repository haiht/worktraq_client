<?php
include 'const.php';
include 'font.config.php';
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex">
<title>WorkTraq | Customize Your Product Online</title>
<link rel="shortcut icon" href="<?php echo DS_URL?>/images/icons/favicon.ic">

<!-- Start: Header Scripts Fetched from YP -->
<script src="lib/js/999.js"></script>

<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
<link href="lib/css/yp.css" rel="stylesheet" type="text/css" />
<link href="//fonts.googleapis.com/css?family=Ubuntu:400,500:latin|Neucha::latin" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="<?php echo DS_URL?>/images/icons/favicon.ico">
<style>
<!--
@font-face {font-family: 'Ubuntu'; font-style: normal; font-weight: bold; src: local('Ubuntu Medium'), local('Ubuntu-Medium'), url('//themes.googleusercontent.com/static/fonts/ubuntu/v4/OsJ2DjdpjqFRVUSto6IffD8E0i7KZn-EPnyo3HZu7kw.woff') format('woff');}
-->
</style>


<script type="text/javascript" src="lib/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="lib/js/helpers.js"></script>
<script type="text/javascript" src="lib/js/yp.js"></script>

<script type="text/javascript">
	var tracker_domain = "//tracker.worktraq.net";
	var site_code = "YP";
</script>
<script type="text/javascript" src="//www.youprint.com/js/UPTracker-1.0.1.js?1.0.3"></script>
<script type="text/javascript">
		var _log = new Tracker_Main('0', 'YP', '1');
		_log.log('PAGE_LOADED', 1);
</script>
 
<script type="text/javascript">
    /*
	var _elqQ = _elqQ || [];
	_elqQ.push(['elqSetSiteId', '639526128']);
	_elqQ.push(['elqTrackPageView']);
	(function () {
		function async_load() {
			var s = document.createElement('script'); s.type = 'text/javascript';
			s.async = true; s.src = '//img.en25.com/i/elqCfg.min.js';
			var x = document.getElementsByTagName('script')[0];
			x.parentNode.insertBefore(s, x);
		}
		if (window.addEventListener) window.addEventListener('DOMContentLoaded', async_load, false);
		else if (window.attachEvent) window.attachEvent('onload', async_load);
	})();
	*/
</script>

<script type="text/javascript">
	// Live Chat Script for Monitor Tagging and Skill
    /*
	var lpMTagConfig = {'lpServer' : "server.iad.liveperson.net",'lpNumber' : "77577663",'lpProtocol' : "https"}; function lpAddMonitorTag(src){if(typeof(src)=='undefined'||typeof(src)=='object'){src=lpMTagConfig.lpMTagSrc?lpMTagConfig.lpMTagSrc:'/hcp/html/mTag.js';}if(src.indexOf('http')!=0){src=lpMTagConfig.lpProtocol+"://"+lpMTagConfig.lpServer+src+'?site='+lpMTagConfig.lpNumber;}else{if(src.indexOf('site=')<0){if(src.indexOf('?')<0)src=src+'?';else src=src+'&';src=src+'site='+lpMTagConfig.lpNumber;}};var s=document.createElement('script');s.setAttribute('type','text/javascript');s.setAttribute('charset','iso-8859-1');s.setAttribute('src',src);document.getElementsByTagName('head').item(0).appendChild(s);} if (window.attachEvent) window.attachEvent('onload',lpAddMonitorTag); else window.addEventListener("load",lpAddMonitorTag,false);
	if (typeof(lpMTagConfig.sessionVar) == "undefined"){ lpMTagConfig.sessionVar = new Array();}
	lpMTagConfig.sessionVar[lpMTagConfig.sessionVar.length] = 'skill=YouPrint';
	*/
</script>

<script type="text/javascript">
	// GA code fetched from YP
    /*
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-32397824-1']);
	_gaq.push(['_setDomainName', 'youprint.com']);
	_gaq.push(['_setSessionCookieTimeout', 0]);
	_gaq.push(['_trackPageview']);
	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
	*/
</script>

<!-- End: Header Scripts Fetched from YP -->


<link href="lib/css/easy.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="lib/js/jquery-ui.1.9.2.min.js"></script>

<script type="text/javascript" >
	var products = {"businessCard":{"id":"1","title":"Business Cards","easy_code":"businessCard","url_code":"business+cards","sort":"15","purpose_id":"1","is_featured":"1","active":"1","default_profile":"4","vistool_code":"businessCard","bleed":"0.125","sides":"2","wrap_size":"0","print_file_type":"pdf","profile":{"id":"4","description":"Default Business Card","show_text_panel":"0","show_ruler":null}},"letterHead":{"id":"2","title":"Letterhead","easy_code":"letterHead","url_code":"letterhead","sort":"30","purpose_id":"1","is_featured":"1","active":"1","default_profile":null,"vistool_code":"upage","bleed":"0.125","sides":"1","wrap_size":"0","print_file_type":"pdf","profile":null},"envelope":{"id":"3","title":"Envelopes","easy_code":"envelope","url_code":"envelopes","sort":"40","purpose_id":"1","is_featured":"0","active":"0","default_profile":null,"vistool_code":"","bleed":"0.125","sides":"2","wrap_size":"0","print_file_type":"pdf","profile":null},"":{"id":"21","title":"Table Tents","easy_code":"","url_code":"table+tents","sort":"60","purpose_id":"4","is_featured":"0","active":"0","default_profile":null,"vistool_code":"","bleed":"0.125","sides":"2","wrap_size":"0","print_file_type":"pdf","profile":null},"sticker":{"id":"5","title":"Stickers","easy_code":"sticker","url_code":"stickers","sort":"80","purpose_id":"3","is_featured":"1","active":"1","default_profile":null,"vistool_code":"upage","bleed":"0.125","sides":"1","wrap_size":"0","print_file_type":"pdf","profile":null},"mailingLabel":{"id":"6","title":"Mailing Labels","easy_code":"mailingLabel","url_code":"mailing+labels","sort":"60","purpose_id":"1","is_featured":"0","active":"0","default_profile":null,"vistool_code":"upage","bleed":"0.0625","sides":"1","wrap_size":"0","print_file_type":"pdf","profile":null},"appointmentCard":{"id":"7","title":"Appointment Cards","easy_code":"appointmentCard","url_code":"appointment+cards","sort":"17","purpose_id":"1","is_featured":"0","active":"1","default_profile":null,"vistool_code":"upage","bleed":"0.125","sides":"2","wrap_size":"0","print_file_type":"pdf","profile":null},"brochure":{"id":"8","title":"Brochures","easy_code":"brochure","url_code":"brochures","sort":"26","purpose_id":"2","is_featured":"1","active":"1","default_profile":null,"vistool_code":"brochure","bleed":"0.125","sides":"2","wrap_size":"0","print_file_type":"pdf","profile":null},"doorHanger":{"id":"9","title":"Door Hangers","easy_code":"doorHanger","url_code":"door+hangers","sort":"40","purpose_id":"2","is_featured":"0","active":"1","default_profile":null,"vistool_code":"doorHanger","bleed":"0.125","sides":"2","wrap_size":"0","print_file_type":"pdf","profile":null},"flatPostcard":{"id":"10","title":"Postcards","easy_code":"flatPostcard","url_code":"postcards","sort":"22","purpose_id":"2","is_featured":"1","active":"1","default_profile":null,"vistool_code":"flatPostcard","bleed":"0.125","sides":"2","wrap_size":"0","print_file_type":"pdf","profile":null},"rackCard":{"id":"12","title":"Rack Cards","easy_code":"rackCard","url_code":"rack+cards","sort":"70","purpose_id":"2","is_featured":"0","active":"1","default_profile":null,"vistool_code":"upage","bleed":"0.125","sides":"2","wrap_size":"0","print_file_type":"pdf","profile":null},"productLabel":{"id":"13","title":"Product Labels","easy_code":"productLabel","url_code":"product+labels","sort":"80","purpose_id":"2","is_featured":"0","active":"0","default_profile":null,"vistool_code":"","bleed":"0.125","sides":"2","wrap_size":"0","print_file_type":"pdf","profile":null},"flatInvitation":{"id":"14","title":"Invitations","easy_code":"flatInvitation","url_code":"invitations","sort":"30","purpose_id":"2","is_featured":"0","active":"0","default_profile":null,"vistool_code":"upage","bleed":"0.125","sides":"2","wrap_size":"0","print_file_type":"pdf","profile":null},"greetingCard":{"id":"15","title":"Greeting Cards","easy_code":"greetingCard","url_code":"greeting+cards","sort":"40","purpose_id":"2","is_featured":"0","active":"0","default_profile":null,"vistool_code":"greetingCard","bleed":"0.125","sides":"2","wrap_size":"0","print_file_type":"pdf","profile":null},"cardCalendar":{"id":"16","title":"Calendars","easy_code":"cardCalendar","url_code":"calendars","sort":"50","purpose_id":"2","is_featured":"0","active":"0","default_profile":null,"vistool_code":"upage","bleed":"0.125","sides":"2","wrap_size":"0","print_file_type":"pdf","profile":null},"eventTicket":{"id":"17","title":"Event Tickets","easy_code":"eventTicket","url_code":"event+tickets","sort":"60","purpose_id":"2","is_featured":"0","active":"0","default_profile":null,"vistool_code":"","bleed":"0.125","sides":"2","wrap_size":"0","print_file_type":"pdf","profile":null},"giftCertificate":{"id":"18","title":"Gift Certificates","easy_code":"giftCertificate","url_code":"gift+certificates","sort":"85","purpose_id":"3","is_featured":"0","active":"0","default_profile":null,"vistool_code":"","bleed":"0.125","sides":"2","wrap_size":"0","print_file_type":"pdf","profile":null},"bumperSticker":{"id":"19","title":"Bumper Stickers","easy_code":"bumperSticker","url_code":"bumper+stickers","sort":"90","purpose_id":"3","is_featured":"0","active":"0","default_profile":null,"vistool_code":"upage","bleed":"0.125","sides":"1","wrap_size":"0","print_file_type":"pdf","profile":null},"vinylBanner":{"id":"20","title":"Banners","easy_code":"vinylBanner","url_code":"banners","sort":"50","purpose_id":"4","is_featured":"0","active":"1","default_profile":null,"vistool_code":"upage","bleed":"0","sides":"1","wrap_size":"0","print_file_type":"jpg","profile":null},"counterCard":{"id":"22","title":"Counter Cards","easy_code":"counterCard","url_code":"counter+cards","sort":"70","purpose_id":"4","is_featured":"0","active":"1","default_profile":null,"vistool_code":"counterCard","bleed":"0","sides":"1","wrap_size":"0","print_file_type":"jpg","profile":null},"largeFormatPoster":{"id":"23","title":"Posters","easy_code":"largeFormatPoster","url_code":"posters","sort":"80","purpose_id":"4","is_featured":"1","active":"1","default_profile":null,"vistool_code":"upage","bleed":"0","sides":"1","wrap_size":"0","print_file_type":"jpg","profile":null},"yardSign":{"id":"24","title":"Yard Signs","easy_code":"yardSign","url_code":"yard+signs","sort":"90","purpose_id":"4","is_featured":"1","active":"1","default_profile":null,"vistool_code":"upage","bleed":"0","sides":"1","wrap_size":"0","print_file_type":"jpg","profile":null},"stickyBackPoster":{"id":"25","title":"Wall Decals","easy_code":"stickyBackPoster","url_code":"wall+decals","sort":"100","purpose_id":"4","is_featured":"0","active":"0","default_profile":null,"vistool_code":"upage","bleed":"0","sides":"1","wrap_size":"0","print_file_type":"jpg","profile":null},"businessFlyer":{"id":"27","title":"Flyers","easy_code":"businessFlyer","url_code":"flyers","sort":"25","purpose_id":"2","is_featured":"1","active":"1","default_profile":null,"vistool_code":"brochure","bleed":"0.125","sides":"2","wrap_size":"0","print_file_type":"pdf","profile":null},"magneticCard":{"id":"30","title":"Business Card Magnets","easy_code":"magneticCard","url_code":"business+card+magnets","sort":"83","purpose_id":"3","is_featured":"0","active":"1","default_profile":null,"vistool_code":"upage","bleed":"0.125","sides":"1","wrap_size":"0","print_file_type":"pdf","profile":null},"windowCling":{"id":"31","title":"Window Clings","easy_code":"windowCling","url_code":"window+clings","sort":"40","purpose_id":"4","is_featured":"0","active":"1","default_profile":null,"vistool_code":"upage","bleed":"0","sides":"1","wrap_size":"0","print_file_type":"jpg","profile":null},"loyaltyCard":{"id":"32","title":"Loyalty Cards","easy_code":"loyaltyCard","url_code":"loyalty+cards","sort":"40","purpose_id":"2","is_featured":"0","active":"0","default_profile":null,"vistool_code":"upage","bleed":"0.125","sides":"2","wrap_size":"0","print_file_type":"pdf","profile":null},"returnAddressLabel":{"id":"33","title":"Return Address Labels","easy_code":"returnAddressLabel","url_code":"return+address+labels","sort":"50","purpose_id":"1","is_featured":"0","active":"0","default_profile":null,"vistool_code":"upage","bleed":"0.0625","sides":"1","wrap_size":"0","print_file_type":"pdf","profile":null}};	
	var user = {"customer_id":null,"visitor_id":null,"session_id":"qld5kqkj10c5nccgeek7akai80","site_code":"YP","email":null,"first_name":null,"last_name":null,"phone":null,"cart_items_count":0,"ffr_cart_items_count":0};	
	var config = {} ; 
	//config.fonts = {"Action Man":{"bold":true,"italic":true},"Action Man Shaded":{"bold":false,"italic":true},"Amaranth":{"bold":true,"italic":true},"Arial":{"bold":true,"italic":true},"Arial Black":{"bold":true,"italic":true},"Binner Gothic":{"bold":false,"italic":false},"BreeSerif Regular":{"bold":false,"italic":false},"Brush Script":{"bold":false,"italic":false},"Capture It":{"bold":false,"italic":false},"Capture It Inverted":{"bold":false,"italic":false},"Carton":{"bold":false,"italic":false},"Cassannet":{"bold":true,"italic":false},"Caviar Dreams":{"bold":true,"italic":true},"Century Gothic":{"bold":true,"italic":true},"Charis SIL":{"bold":true,"italic":true},"Comic Sans":{"bold":true,"italic":false},"CooperTT":{"bold":true,"italic":true},"Copperplate Gothic":{"bold":true,"italic":false},"Credit Valley":{"bold":true,"italic":true},"Debusen":{"bold":false,"italic":false},"DejaVu Sans":{"bold":true,"italic":true},"Digital Dream":{"bold":true,"italic":true},"English Towne":{"bold":false,"italic":false},"Greyscale Basic":{"bold":true,"italic":true},"Hero":{"bold":true,"italic":false},"Homestead":{"bold":false,"italic":false},"Impact URW":{"bold":false,"italic":false},"Jura":{"bold":true,"italic":true},"Kingthings":{"bold":false,"italic":false},"Komika Text":{"bold":true,"italic":true},"Kontrapunkt":{"bold":true,"italic":true},"Lobster":{"bold":false,"italic":false},"Marketing Script":{"bold":false,"italic":false},"Movavi Grotesque Black":{"bold":false,"italic":true},"Novecento":{"bold":true,"italic":false},"Old Stamper":{"bold":false,"italic":false},"Open Sans":{"bold":true,"italic":true},"Otama EP":{"bold":false,"italic":false},"PT Sans":{"bold":true,"italic":true},"PT Serif":{"bold":true,"italic":true},"RBNo2":{"bold":false,"italic":false},"Ribbon_V2":{"bold":false,"italic":false},"Roboto":{"bold":true,"italic":true},"Satellite":{"bold":false,"italic":true},"SF Arch Rival":{"bold":true,"italic":true},"SF Cartoonist Hand":{"bold":true,"italic":true},"Stencil":{"bold":false,"italic":false},"Tuffy":{"bold":true,"italic":true},"Typewriter":{"bold":true,"italic":true}} ;
    config.fonts = {<?php echo $v_dsp_font;?>} ;
	config.nextPageUrl =  'http://store.worktraq.net/specs';
	config.homeUrl = 'http://worktraq.net/' ;
	config.popupLoginUrl = 'https://store.worktraq.net/signin_popup' ;
	config.maxSvgColorSupport = 300 ;
	config.urlProfileEQ = {"id":"0","description":"worktraq.net","show_text_panel":"0","show_ruler":"0"} ;

</script>

</head>

<body> 

<div id="fb-root"></div>
<script>
 /*
  window.fbAsyncInit = function() {
    // init the FB JS SDK
    FB.init({
      appId      : '435176706526414', // App ID from the App Dashboard
      channelUrl : '//www.youprint.com/channel.php', // Channel File for x-domain communication
      status     : true, // check the login status upon init?
      cookie     : true, // set sessions cookies to allow your server to access the session?
      xfbml      : true  // parse XFBML tags on this page?
    });

    // Additional initialization code such as adding Event Listeners goes here

  };

  (function(d, debug){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
     ref.parentNode.insertBefore(js, ref);
   }(document, false));
   */
</script>

<div id="header">
<script type="text/javascript">
	var yp = {} ;
	yp.logout_url = 'http://store.worktraq.net/customer/auth/logout' ;
	yp.login_url = 'https://store.worktraq.net/signin' ;
	yp.home_url = 'http//worktraq.net/' ;
	yp.user = {"customer_id":null,"visitor_id":null,"session_id":"qld5kqkj10c5nccgeek7akai80","site_code":"YP","email":null,"first_name":null,"last_name":null,"phone":null,"cart_items_count":0,"ffr_cart_items_count":0} ;
</script>

<div id="yp_header">
	<a href="http://worktraq.net/">
    	<div id="yp_logo" class="yp-sprite"  ></div>
    </a>
	<div id="yp_top_nav">
        <!--
    	<a href='http://portal.worktraq.net/account/orders' class="top-nav-item">Order Status</a>
    	<a href="http://www.worktraq.net/account/designs" class="top-nav-item">Saved Designs</a>
    	<a href="http://www.worktraq.net/account/favorites" class="top-nav-item">Favorites</a>
    	<span id="nav_item_account" class="top-nav-item extendable" style="display: none" >
        	<span id='header_first_name'></span> <span id='header_last_name'><span class="menu-header-arrow"></span></span>
            <div class="extension yp-menu">
            	<a class="nav-menu-item" href="http://portal.worktraq.net/account/settings">Account Settings</a>
            	<span class="nav-menu-item" onclick='YpSignOut();'>Sign out</span>
            </div>
        </span>
        <span id="nav_item_sign_in" class="top-nav-item" onclick="YpSignIn()"  >Sign in</span>
    	<a href="http://store.worktraq.net/cart" class="top-nav-item" >
            	<span class="yp-sprite nav-icon yp-inline" style="background-position: -140px -120px ; width: 17px ; height:14px"></span>
                <span>Cart<span id="header_cart_items_count">0</span></span>
        </a>
        -->
    </div>
    
    <div id="header_contact">
    <!--
    	<span class="header-contact-item yp-inline"><span class="yp-sprite yp-inline header-contact-icon" style="background-position: -80px -120px ; width: 20px ; height: 22px" ></span><span class="yp-inline header-contact-title">1-800-381-2596</span></span>
    	<span class="header-contact-item yp-inline hover-link" onclick="window.open('https://server.iad.liveperson.net/hc/77577663/?cmd=file&amp;file=visitorWantsToChat&amp;site=77577663&amp;SESSIONVAR!skill=YouPrint&amp;imageUrl=https://server.iad.liveperson.net/hcp/Gallery/ChatButton-Gallery/English/General/1a/&amp;referrer='+escape(document.location),'chat77577663','width=475,height=400,resizable=yes');"><span class="yp-sprite yp-inline header-contact-icon" style="background-position: -40px -120px ; width: 25px ; height: 22px" ></span><span class="yp-inline header-contact-title">Click to Chat</span></span>
        -->
    </div>
</div>

<div id="yp_top_bar_simple"></div></div>

<div id="main_loading" style="font-size: 15px ; font-weight: bold ; position:fixed; top: 0 ; left: 0 ; width: 100% ; height: 100% ; background-color: #fff ; z-index: 100000 ; padding: 25px 30px;">Loading...</div>
<div id="gray_box" style="display:none" ></div>
<div id="notice_bar" style="display:none"><div id="notice_box"></div></div>

<div id="workspace">
	<div class="toolbar ztoolbar" id="nav_toolbar">
	<div class="top-nav-left" >
        <div id="theme_options" class="toolbar-button type5 has-menu has-menu menu-opener" style="line-height:normal ; display: none">
	        <div class="button-icon button-arrow" style="vertical-align:text-bottom"></div>
            <div class="button-menu with-divider" id="theme_menu">
            </div>
        </div>

		<div id="info_ph">
            <div id="info_design_title"></div>
            <div id="info_product_title"></div>
		</div>
        
	</div>      
        
	<div class="top-nav-right" >
    	<div id="btn_preview" class="toolbar-button type5 gray-gradient">
	        <div class="button-icon" style="background-position: -72px -16px"></div>
	        <div class="button-text">Preview</div>
        </div>
        
        <div class="toolbar-button type5 has-menu menu-opener gray-gradient">
	        <div class="button-icon" style="background-position: -24px -16px"></div>
	        <div class="button-text">Share</div>
	        <div class="button-icon button-arrow" ></div>
			<div class="button-menu with-divider thick" >
                <div id="btn_share_email" class="toolbar-button type4" >
                    <div class="button-menu-icon" style="background-position: -576px 0px"></div>
                    <div class="button-menu-text">Send by Email</div>
                </div>
                <div id="btn_share_facebook" class="toolbar-button type4" >
                    <div class="button-menu-icon" style="background-position: -1088px 0px"></div>
                    <div class="button-menu-text">Share on Facebook</div>
                </div>

			</div>
        </div>

        <div id="btn_save" class="toolbar-button type5 has-menu has-optional-menu gray-gradient">
	        <div class="button-icon" style="background-position: 0px -16px"></div>
	        <div class="button-text">Save</div>
            <div class="button-arrow-full-height menu-opener">
		        <div class="button-icon button-arrow"></div>
			</div>

			<div class="button-menu with-divider thick" >
                <div id="btn_save_2" class="toolbar-button type4" >
                    <div class="button-menu-icon" style="background-position: -592px 0px"></div>
                    <div class="button-menu-text">Save</div>
                </div>
                <div id="btn_save_as" class="toolbar-button type4" >
                    <div class="button-menu-icon" style="background-position: -608px 0px"></div>
                    <div class="button-menu-text">Save As...</div>
                </div> 

                <div id="btn_save_pdf" class="toolbar-button type4" style="display:none" >
                    <div class="button-menu-icon" style="background-position: -384px 0px"></div>
                    <div class="button-menu-text">Download PDF</div>
                </div>

			</div>

        </div>
        
    	<div id="btn_proceed" class="toolbar-button type5 green-gradient">
	        <div class="button-text">Proceed to Order</div>
        </div>
    </div>
    <div class="clearer"></div>
</div>

  <div id="top_toolbar_placeholder_wrapper" class="ztoolbar" >    
  	<div id="btn_top_toolbar_toggle" class="toolbar-button" ></div>
    <div id="top_toolbar_placeholder" class="ztoolbar" >
    	<div id="top_toolbar" class="toolbar ztoolbar">
        	<div class="toolbar-section">
            	<div class="toolbar-section-title">Insert</div>
                <div class="toolbar-section-body">
	                <div id="btn_insert_text" class="toolbar-button type1 gray-gradient" >
                    	<div class="button-icon" style="background-position: -48px -40px"></div>
                    	<div class="button-text">Text</div>
                    </div><!--
	                --><div id="btn_insert_upload" class="toolbar-button type1 gray-gradient">
                    	<div class="button-icon" style="background-position: 0 -40px"></div>
                    	<div class="button-text">Image</div>
                    </div><!--
	                    <div id="btn_insert_stock" class="toolbar-button type1 gray-gradient">
                    	<div class="button-icon"></div>
                    	<div class="button-text">Stock Image</div>
                    </div>
	                --><div id="btn_insert_shape" class="toolbar-button type1 gray-gradient has-menu menu-opener">
                    	<div class="button-icon" style="background-position: -96px -40px"></div>
                    	<div class="button-text">Shape</div>
                        <div class="button-menu with-divider">
                            <div id="btn_shape_rect" class="toolbar-button type4" >
                                <div class="button-menu-icon" style="background-position: -832px 0px"></div>
                                <div class="button-menu-text">Rectangle</div>
                            </div>
                            <div id="btn_shape_circle" class="toolbar-button type4" >
                                <div class="button-menu-icon" style="background-position: -848px 0px"></div>
                                <div class="button-menu-text">Circle</div>
                            </div>
                            <div id="btn_shape_hline" class="toolbar-button type4" >
                                <div class="button-menu-icon" style="background-position: -816px 0px"></div>
                                <div class="button-menu-text">Horizontal Line</div>
                            </div>
                            <div id="btn_shape_vline" class="toolbar-button type4" >
                                <div class="button-menu-icon" style="background-position: -800px 0px"></div>
                                <div class="button-menu-text">Vertical Line</div>
                            </div>
                        </div>
                    </div>
	                
                </div>
            </div>


            <div class="toolbar-section-divider"></div>
        	<div class="toolbar-section" id="text_tools_section">
            	<div class="toolbar-section-title">Text</div>
                <div class="toolbar-section-body">
                   	<div class="toolbar-section-row">
                        <div id="btn_text_font_face" class="toolbar-button type3 has-menu menu-opener" >
	                    	<div class="button-text">Font</div>
                            <div class="bordered">
                                <div id="selected_font_face" class="button-selected-text" style="width:80px" ></div>
                                <div class="button-arrow" ></div>
                            </div>
                            <div id="font_face_menu" class="button-menu"></div>
                        </div>
                        <div id="btn_text_font_size" class="toolbar-button type3 has-menu menu-opener">
	                    	<div class="button-text">Size</div>
                            <div class="bordered">
                                <input id="selected_font_size" class="button-textbox" type="text"  />
                                <div class="button-arrow" ></div>
                            </div>
                            <div id="font_size_menu" class="button-menu"></div>
                        </div>
                        <div id="btn_text_font_color" class="toolbar-button type3 has-menu menu-opener">
                            <div class="button-text">Color</div>
                            <div class="bordered">
                                <div id="selected_font_color" class="selected-color"></div>
                                <div class="button-arrow" ></div>
							</div>
                            <div id="font_color_menu" class="button-menu color-palette"></div>
                        </div>
                    
                    </div>
                	<div class="toolbar-section-row">
                        <div  id="btn_text_bold" class="toolbar-button type2" >
                            <div class="button-icon" style="background-position: -32px 0px"></div>
                        </div>
                        
                        <div  id="btn_text_italic" class="toolbar-button type2" >
                            <div class="button-icon" style="background-position: -48px 0px"></div>
                        </div>
                        
                        <div id="btn_text_gravity_west" class="toolbar-button type2 grouped " >
                            <div class="button-icon" style="background-position: -64px 0px"></div>
                        </div>
                        
                        <div id="btn_text_gravity_center" class="toolbar-button type2 grouped " >
                            <div class="button-icon" style="background-position: -80px 0px"></div>
                        </div>

                        <div id="btn_text_gravity_east" class="toolbar-button type2 grouped " >
                            <div class="button-icon" style="background-position: -96px 0px"></div>
                        </div>

						<div id="btn_text_bullet" class="toolbar-button type2 has-menu menu-opener" >
                            <div class="button-icon" style="background-position: -96px -16px"></div>
                            <div class="button-menu">
                            	<div id="btn_text_bullet_none" class="toolbar-button type2">
                                	<div class="bullet-text-item" style="background-position: 0 0"></div>
                                </div>

                            	<div id="btn_text_bullet_black_circle" class="toolbar-button type2">
                                	<div class="bullet-text-item" style="background-position: 0 -60px"></div>
                                </div>
                            	<div id="btn_text_bullet_white_circle" class="toolbar-button type2">
                                	<div class="bullet-text-item" style="background-position: -60px -60px"></div>
                                </div>
                                <br />
                            	<div id="btn_text_bullet_black_square" class="toolbar-button type2">
                                	<div class="bullet-text-item" style="background-position: -120px -60px"></div>
                                </div>
                            	<div id="btn_text_bullet_white_square" class="toolbar-button type2">
                                	<div class="bullet-text-item" style="background-position: -180px -60px"></div>
                                </div>
                            	<div id="btn_text_bullet_dash" class="toolbar-button type2">
                                	<div class="bullet-text-item" style="background-position: -240px -60px"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div id="btn_text_number" class="toolbar-button type2 has-menu menu-opener" >
                            <div class="button-icon" style="background-position: -112px -16px"></div>
                            <div class="button-menu">
                            	<div id="btn_text_number_none" class="toolbar-button type2">
                                	<div class="bullet-text-item" style="background-position: 0 0"></div>
                                </div>
                            	<div id="btn_text_bullet_number_dot" class="toolbar-button type2">
                                	<div class="bullet-text-item" style="background-position: -60px 0"></div>
                                </div>
                                <br />
                            	<div id="btn_text_bullet_number_dash" class="toolbar-button type2">
                                	<div class="bullet-text-item" style="background-position: -120px 0"></div>
                                </div>
                            	<div id="btn_text_bullet_number_parenth" class="toolbar-button type2">
                                	<div class="bullet-text-item" style="background-position: -180px 0"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div id="btn_text_auto_fit" class="toolbar-button type2 admin-only" >
                            <div class="button-text">Auto Fit</div>
                        </div>

                        

                    </div>

                </div>
            </div>

            <div class="toolbar-section-divider"></div>
            <div class="toolbar-section" id="bg_tools_section" style="width: 80px">
            	<div class="toolbar-section-title">Background</div>
                <div class="toolbar-section-body">
                
                    <div id="btn_bg_color" class="toolbar-button type3 has-menu menu-opener">
                        <div class="button-text">Color</div>
                        <div class="bordered">
                            <div id="selected_bg_color" class="selected-color"></div>
                            <div class="button-arrow" ></div>
                        </div>
                        <div id="bg_color_menu" class="button-menu color-palette"></div>
                    </div>

				</div>
            </div>

			<div class="toolbar-section-divider"></div>
        	<div class="toolbar-section" >
            	<div class="toolbar-section-title">Edit</div>
                <div class="toolbar-section-body">
                        <div id="btn_edit_undo" class="toolbar-button type2" >
                            <div class="button-icon" style="background-position: 0px 0px"></div>
                            <div class="button-text">Undo</div>
                        </div>
                        <div id="btn_edit_redo" class="toolbar-button type2" >
                            <div class="button-icon"  style="background-position: -16px 0px"></div>
                            <div class="button-text">Redo</div>
                        </div>
                        <div id="btn_edit_lock" class="toolbar-button type2" >
                            <div class="button-icon" style="background-position: -720px 0px"></div>
                            <div class="button-text">Lock</div>
                        </div>
						<hr />
                        <div  id="btn_edit_copy" class="toolbar-button type2" >
                            <div class="button-icon" style="background-position: -480px 0px"></div>
                            <div class="button-text">Copy</div>
                        </div>
                        <div id="btn_edit_paste" class="toolbar-button type2" >
                            <div class="button-icon" style="background-position: -496px 0px"></div>
                            <div class="button-text">Paste</div>
                        </div>
                        <div id="btn_edit_delete" class="toolbar-button type2" >
                            <div class="button-icon" style="background-position: -400px 0px"></div>
                            <div class="button-text">Delete</div>
                        </div>
                </div>
            </div>
			<div class="toolbar-section-divider"></div>
        	<div class="toolbar-section" >
            	<div class="toolbar-section-title">Advanced</div>
                <div class="toolbar-section-body">
                        <div id="btn_advance_align" class="toolbar-button type2 has-menu menu-opener">
                            <div class="button-icon" style="background-position: -144px 0px"></div>
                            <div class="button-text">Align</div>
                            <div class="button-menu with-divider" >
                            	<div id="btn_align_left" class="toolbar-button type4" >
                                	<div class="button-menu-icon" style="background-position: -144px 0px"></div>
                                	<div class="button-menu-text">Align Left</div>
                                </div>
                            	<div id="btn_align_center" class="toolbar-button type4" >
                                	<div class="button-menu-icon" style="background-position: -192px 0px"></div>
                                	<div class="button-menu-text">Align Center</div>
                                </div>
                            	<div id="btn_align_right" class="toolbar-button type4" >
                                	<div class="button-menu-icon" style="background-position: -176px 0px"></div>
                                	<div class="button-menu-text">Align Right</div>
                                </div>
                                <hr />
                            	<div id="btn_align_top" class="toolbar-button type4" >
                                	<div class="button-menu-icon" style="background-position: -128px 0px"></div>
                                	<div class="button-menu-text">Align Top</div>
                                </div>
                            	<div id="btn_align_middle" class="toolbar-button type4" >
                                	<div class="button-menu-icon" style="background-position: -208px 0px" ></div>
                                	<div class="button-menu-text">Align Middle</div>
                                </div>
                            	<div id="btn_align_bottom" class="toolbar-button type4"  >
                                	<div class="button-menu-icon" style="background-position: -160px 0px"></div>
                                	<div class="button-menu-text">Align Bottom</div>
                                </div>
                                <hr />
                            	<div id="btn_dist_ver" class="toolbar-button type4" >
                                	<div class="button-menu-icon" style="background-position: -896px 0px" ></div>
                                	<div class="button-menu-text">Distribute Vertically</div>
                                </div>
                            	<div id="btn_dist_hor" class="toolbar-button type4" >
                                	<div class="button-menu-icon"  style="background-position: -880px 0px" ></div>
                                	<div class="button-menu-text">Distribute Horizontally</div>
                                </div>
                            </div>
                        </div>
                        <div id="btn_advance_layers" class="toolbar-button type2 has-menu menu-opener">
                            <div class="button-icon" style="background-position: -320px 0px"></div>
                            <div class="button-text">Layers</div>
                            <div class="button-menu with-divider" >
                            	<div id="btn_arrange_bring_front" class="toolbar-button type4" >
                                	<div class="button-menu-icon" style="background-position: -432px 0px"></div>
                                	<div class="button-menu-text">Bring to Front</div>
                                </div>
                            	<div id="btn_arrange_send_back" class="toolbar-button type4"  >
                                	<div class="button-menu-icon" style="background-position: -464px 0px"></div>
                                	<div class="button-menu-text">Send to Back</div>
                                </div>
                            	<div id="btn_arrange_bring_forward" class="toolbar-button type4" >
                                	<div class="button-menu-icon"  style="background-position: -416px 0px"></div>
                                	<div class="button-menu-text">Bring Forward</div>
                                </div>
                            	<div id="btn_arrange_send_backward" class="toolbar-button type4" >
                                	<div class="button-menu-icon"  style="background-position: -448px 0px"></div>
                                	<div class="button-menu-text">Send Backward</div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div id="btn_advance_rotate" class="toolbar-button type2" >
                            <div class="button-icon" style="background-position: -688px 0px"></div>
                            <div class="button-text">Rotate</div>
                        </div>
                        <div id="btn_advance_crop" class="toolbar-button type2"   >
                            <div class="button-icon" style="background-position: -336px 0px"></div>
                            <div class="button-text">Crop</div>
                        </div>
                
                </div>
            </div>
			<div class="toolbar-section-divider"></div>
        	<div id="view_tools_section" class="toolbar-section" >
            	<div class="toolbar-section-title">View</div>
                <div class="toolbar-section-body">
                        <div id="btn_view_bleed" class="toolbar-button type2" style="width:50px">
                            <div class="button-icon" style="background-position: -256px 0px"></div>
                            <div class="button-text">Trim Box</div>
                        </div>
                        <div id="btn_view_grid" class="toolbar-button type2" style="width:45px">
                            <div class="button-icon" style="background-position: -272px 0px"></div>
                            <div class="button-text">Grid</div>
                        </div>

                        <div id="btn_view_snap" class="toolbar-button type2" >
                            <div class="button-icon" style="background-position: -368px 0px"></div>
                            <div class="button-text">Snap</div>
                        </div>
                        <hr />
                        <div id="btn_view_zoom_out" class="toolbar-button type2" style="width:50px" >
                            <div class="button-icon" style="background-position: -304px 0px"></div>
                            <div class="button-text">Zoom out</div>
                        </div>
                        <div id="btn_view_zoom_in" class="toolbar-button type2" style="width:45px">
                            <div class="button-icon" style="background-position: -288px 0px"></div>
                            <div class="button-text">Zoom in</div>
                        </div>
                
                        <div id="btn_view_quick_edit" class="toolbar-button type2" >
                            <div class="button-text" style="line-height:14px">Quick<br>Input</div>
                        </div>
                
                </div>
            </div>
        </div>
    	
      
    </div>
  </div>
  
  
    <div id="left_panel"  >
        <div id="text_fields" ></div>
    </div> 	

 
  <div id="design_tool" >
	<div id="page_navigation"></div>
    <div id="tool_placeholder">
    
    
    
    
    </div>
  </div>

  <!-- Start: Bottom toolbar placeholder -->
  <div id="bottom_toolbar_placeholder">
  </div>
  <!-- End Bottom toolbar placeholder -->
</div>
<!-- End: workspace -->
<div class="float-toolbar ztoolbar" id="crop_toolbar">
    <div>
        <div class="crop-toolbar-item" style="background-position: 100px 100px ;"></div>
        <div class="crop-toolbar-item" style="background-position: -1120px 0px ;" onclick="moveInnerImage('U')"></div>
        <div class="crop-toolbar-item" style="background-position: 100px 100px ;"></div>
    </div>
    <div>
        <div class="crop-toolbar-item" style="background-position: -1104px 0px ;" onclick="moveInnerImage('L')"></div>
        <div class="crop-toolbar-item" style="background-position: 100px 100px ;"></div>
        <div class="crop-toolbar-item" style="background-position: -1136px 0px ;" onclick="moveInnerImage('R')"></div>
        <div class="crop-toolbar-item" style="background-position: 100px 100px ;"></div>
        <div class="crop-toolbar-item" style="background-position: -1168px 0px ;" onclick="zoomOutInnerImage()"><span>Zoom Out</span></div>
	    <div class="crop-toolbar-item" style="width:auto; background-position: 100px 100px ; cursor:default" ><div id="crop_slider"></div></div>
        <div class="crop-toolbar-item" style="background-position: -1184px 0px ;" onclick="zoomInInnerImage()"><span>Zoom In</span></div>
        <div class="crop-toolbar-item" style="background-position: 100px 100px ;"></div>
        <div class="crop-toolbar-item" style="background-position: -688px 0px ;" onclick="rotateInnerImage(90)"><span>Rotate 90&deg;</span></div>
        <div class="crop-toolbar-item" style="background-position: -704px 0px ;" onclick="rotateInnerImage(-90)"><span>Rotate 90&deg;</span></div>
    </div>
    <div>
        <div class="crop-toolbar-item" style="background-position: 100px 100px ;"></div>
        <div class="crop-toolbar-item" style="background-position: -1152px 0px ;" onclick="moveInnerImage('D')"></div>
        <div class="crop-toolbar-item" style="background-position: 100px 100px ;"></div>
    </div>
    
    <div id="extra_crop_option" >
        <div id="btn_text_remove" class="toolbar-button type6 gray-gradient" >
        	<div class="button-icon" style="background-position: -400px 0 " ></div>
		</div>

        <div id="btn_text_remove" class="toolbar-button type6 gray-gradient"  onclick="replacePhImage()">
            <div class="button-text">Replace Image</div>
		</div>
        <div class="crop-toolbar-item" style="background-position: 100px 100px ;"></div>

        <div id="btn_crop_done" class="toolbar-button type6 green-gradient" >
            <div class="button-text">Done</div>
		</div>
 
    </div>
    
</div>

<div class="ztoolbar close" id="textbox_tools" >
	<div id="btn_text_edit" class="toolbar-button type2 close-only">
    	<div class="button-icon" style="background-position: -352px 0px"></div>
        <div class="button-text">Edit</div>
    </div>
    
    <div class="open-only">
    <div id="textbox_edit_area" style="display:block; margin-bottom: 10px">
    	<div id="textbox_tools_text_title" ></div>
		<textarea id="inline_textarea" ></textarea>
	</div>

	<div style="border-top: 0px solid #ddd; text-align: center; padding-top: 4px">


        <div id="btn_text_remove" class="toolbar-button type6 gray-gradient" >
        	<div class="button-icon" style="background-position: -400px 0 " ></div>
            <div class="button-text">Delete</div>
		</div>

        <div id="btn_text_done" class="toolbar-button type6 green-gradient" >
            <div class="button-text">Done</div>
		</div>

    </div>
	</div>
 
</div>


<div class="float-toolbar ztoolbar" id="image_toolbar">
	<div id="btn_image_delete" class="toolbar-button type2 gray-gradientt with-active" >
    	<div class="button-icon" style="background-position: -400px 0px"></div>
    	<div class="button-text">Delete</div>
    </div>

	<div id="btn_image_crop" class="toolbar-button type2 gray-gradientt with-active" >
    	<div class="button-icon" style="background-position: -336px 0px"></div>
    	<div class="button-text">Crop</div>
    </div>

	<div id="btn_image_border_color" class="toolbar-button type2 has-menu menu-opener gray-gradientt with-active" >
    	<div class="selected-color"></div>
    	<div class="button-text">Border</div>
        <div id="image_border_color_menu" class="button-menu color-palette"></div>
    </div>

	<div class="toolbar-button type2 has-menu menu-opener gray-gradientt with-active" >
    	<div class="button-icon" style="background-position: -512px 0px" ></div>
    	<div class="button-text">Weight</div>
        <div id="image_border_width_menu" class="button-menu"></div>
    </div>
    
    <div id="svg_tools" class="toolbar-button type3 has-menu">
    	<div id="svg_colors"></div>
        <div id="svg_color_menu" class="button-menu color-palette with-transparent"></div>
    </div>

</div>

<div class="float-toolbar ztoolbar" id="shape_toolbar">
	<div id="btn_shape_delete" class="toolbar-button type2 gray-gradientt with-active" >
    	<div class="button-icon" style="background-position: -400px 0px"></div>
    	<div class="button-text">Delete</div>
    </div>

	<div id="btn_shape_fill_color" class="toolbar-button type2 has-menu menu-opener" >
    	<div class="selected-color"></div>
    	<div class="button-text">Fill</div>
        <div id="shape_fill_color_menu" class="button-menu color-palette with-transparent"></div>
    </div>

	<div id="btn_shape_border_color" class="toolbar-button type2 has-menu menu-opener" >
    	<div class="selected-color"></div>
    	<div class="button-text">Border</div>
        <div id="shape_border_color_menu" class="button-menu color-palette"></div>
    </div>

	<div class="toolbar-button type2 has-menu menu-opener" >
    	<div class="button-icon" style="background-position: -512px 0px" ></div>
    	<div class="button-text">Weight</div>
        <div id="shape_border_width_menu" class="button-menu"></div>
    </div>

	<div class="toolbar-button type2 has-menu menu-opener" >
    	<div class="button-icon" style="background-position: -528px 0px" ></div>
    	<div class="button-text">Stroke</div>
        <div id="shape_border_stroke_menu" class="button-menu">
        	<div id="shape_border_stroke_solid" class="toolbar-button type4 shape-border-stroke-option" style="background-position: center -1px"></div>
        	<div id="shape_border_stroke_round_dot" class="toolbar-button type4 shape-border-stroke-option" style="background-position: center -15px"></div>
        	<div id="shape_border_stroke_square_dot" class="toolbar-button type4 shape-border-stroke-option" style="background-position: center -29px"></div>
        	<div id="shape_border_stroke_dash" class="toolbar-button type4 shape-border-stroke-option" style="background-position: center -43px"></div>
        	<div id="shape_border_stroke_dash_dot" class="toolbar-button type4 shape-border-stroke-option" style="background-position: center -58px"></div>
        	<div id="shape_border_stroke_long_dash" class="toolbar-button type4 shape-border-stroke-option" style="background-position: center -72px"></div>
        	<div id="shape_border_stroke_long_dash_dot" class="toolbar-button type4 shape-border-stroke-option" style="background-position: center -86px"></div>
        </div>
    </div>

</div>

<div id="easy_page_footer">
    
<div id="yp_footer" class='noPrint'>
	<div id="yp_footer_divider"></div>
  <div id="yp_footer_content">
  	<!--
    <div class="yp-footer-col"> 
	  <div class="yp-sprite" style="width:95px ; height: 75px; background-position:-400px 0" ></div>
      <div id="yp_copyright_text">&copy;2013 YouPrint.com.</div>
    </div>

    <div class="yp-footer-col">
      <div class="footer-col-header">Help Center </div>
      <ul>
        <li><a target="_blank" href="http://store.youprint.com/faq">F.A.Q</a></li>
        <li><a target="_blank" href="http://store.youprint.com/contact-us">Contact Us</a></li>
        <li><a onclick="javascript:window.open('https://server.iad.liveperson.net/hc/77577663/?cmd=file&amp;file=visitorWantsToChat&amp;site=77577663&amp;SESSIONVAR!skill=YouPrint&amp;imageUrl=https://server.iad.liveperson.net/hcp/Gallery/ChatButton-Gallery/English/General/1a/&amp;referrer='+escape(document.location),'chat77577663','width=475,height=400,resizable=yes');return false;" target="chat77577663" href="https://server.iad.liveperson.net/hc/77577663/?cmd=file&amp;file=visitorWantsToChat&amp;site=77577663&amp;byhref=1&amp;SESSIONVAR!skill=YouPrint&amp;imageUrl=https://server.iad.liveperson.net/hcp/Gallery/ChatButton-Gallery/English/General/1a/" id="_lpChatBtn" rel="nofollow">Live Chat</a></li>
      </ul>
    </div>
    <div class="yp-footer-col">
      <div class="footer-col-header">Shop With Confidence</div>
      <ul>
        <li><a target="_blank" href="http://store.youprint.com/policies">Privacy Policy</a></li>
        <li><a target="_blank" href="http://store.youprint.com/terms">Terms of Service</a></li>
      </ul>
    </div>
    <div class="yp-footer-col" style="width: 255px ; margin-right: 0">
      <div class="footer-col-header">Offers and Promotions</div>
      <div>Subscribe to our newsletter to receive our latest offers!</div>
      <div style="margin-top: 5px">
          <input id="subscribe_email" type="text" onfocus="jQuery(this).val('')" onblur="if(jQuery(this).val()=='') jQuery(this).val('Enter your email'); else return false;" value="Enter your email"/><input id="subscribe_button" class="action-button" type="button" onclick="subscribe();" value="Subscribe">
      </div>
    </div>
      -->
  </div>
</div>

<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 998701281;
var google_conversion_label = "Ed9oCP_OxgQQ4fGb3AM";
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/998701281/?value=0&amp;label=Ed9oCP_OxgQQ4fGb3AM&amp;guid=ON&amp;script=0"/>
</div>
</noscript></div>

<!--
<input type="text" id="temp_text" />
<iframe id="pdf_proof_iframe" name="pdf_proof_iframe" src="about:blank" frameborder="0"></iframe>
<form id= "pdf_proof_form" action="/ajax/design/getPdfProofFromJson.php" target="pdf_proof_iframe" method="post" >
	<input id="pdf_proof_json" type="hidden" name="json" value="{}" />
</form>
-->

<script type="text/javascript" src="lib/js/edit.js"></script>
<script type="text/javascript" src="lib/js/easy.js"></script>


</body>
</html>