<?php
include 'const.php';
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Insert Image</title>

    <!-- Start: Header Scripts Fetched from YP -->
    <script src="//cdn.optimizely.com/js/208064236.js"></script>

    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
    <link href="//www.youprint.com/css/yp.css?1.0.4" rel="stylesheet" type="text/css" />
    <link href="//fonts.googleapis.com/css?family=Ubuntu:400,500:latin|Neucha::latin" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="<?php echo DS_URL;?>/images/icons/favicon.ico">
    <style>
        @font-face {font-family: 'Ubuntu'; font-style: normal; font-weight: bold; src: local('Ubuntu Medium'), local('Ubuntu-Medium'), url('//themes.googleusercontent.com/static/fonts/ubuntu/v4/OsJ2DjdpjqFRVUSto6IffD8E0i7KZn-EPnyo3HZu7kw.woff') format('woff');}
    </style>


    <script type="text/javascript" src="lib/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="lib/js/helpers.js"></script>
    <script type="text/javascript" src="lib/js/yp.js"></script>
    <link rel="stylesheet" href="lib/css/colorbox.css" />

    <script type="text/javascript">
        var tracker_domain = "//tracker.uprinting.com";
        var site_code = "YP";
    </script>
    <script type="text/javascript" src="//www.youprint.com/js/UPTracker-1.0.1.js?1.0.4"></script>
    <script type="text/javascript">
       // var _log = new Tracker_Main('0', 'YP', '1');
       // _log.log('PAGE_LOADED', 1);
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


    <script src="lib/js/jquery.ui.widget.js"></script>
    <script src="lib/js/jquery.iframe-transport.js"></script>
    <script type="text/javascript" src="lib/js/jquery.fileupload.js" ></script>

    <link href="lib/css/addimage.css" rel="stylesheet" type="text/css">

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
        FB.Event.subscribe('auth.authResponseChange', fbAuth) ;

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



<div class="please-wait"><div>Please wait...</div></div>

<div id="wrapper">
    <div id="close_link"></div>
<!--
    <div class="sign-in-guide">To retrieve your previously uploaded images, <span class="fake-link" id="login_link" >sign in here</span>.</div>
-->
    <div id="top_section">
        Insert Image
    </div>

    <div id="image_panel_left_section">
        <div class="left-tab" id="user_tab" >Your Images</div>
        <!--
        <div class="left-tab" id="stock_tab">Stock Images</div>
        <div class="left-tab" id="facebook_tab"><div class="fb-icon"></div>Facebook</div>
        -->
    </div>

    <div id="image_panel_right_section">
        <!--
        <div class="right-panel" id="stock_panel">
            <div id="stock_search_bar">
                <div id="stock_image_hint">Search from millions of high quality stock images. Prices start from only $1.</div>
                <div>
                    <input id="stock_search_term" type="text" />
                    <button class="action-button" id="stock_search_button">Search Images</button>
                </div>
                <div class="image-cont"></div>

            </div>
        </div>
        -->
        <div class="right-panel" id="user_panel">
            <div id="image_drop_zone">
                <div class="upload-guide">
                    <div class="upload-drag dnd-only">DRAG IMAGE FILES FROM YOUR COMPUTER HERE</div>
                    <div class="upload-format">We accept JPEG, PNG, GIF. &nbsp;&nbsp;&nbsp; Max file size: 2MB</div>
                </div>
                <div class="upload-or dnd-only">OR</div>
                <div id="btn_upload" class="action-button large">
                    Click to Upload
                    <input id="fileupload" name="Filedata" type="file" class="styled-upload" multiple="1" accept="image/png,image/jpg,image/jpeg,image/gif" data-url="upload_image.php" />
                </div>

            </div>


            <div id="image_divider"></div>
            <div id="fotolia_divider"></div>

        </div>
        <!--
        <div class="right-panel" id="facebook_panel">
            <div id="facebook_login" class="centered"><div class="fb-login-button" scope="user_photos">Connect to Facebook</div></div>
        </div>
        -->
    </div>

    <div id="bottom_section">
        <button id="select_image_button" class="action-button green disabled">Insert Image</button>
    </div>

</div>

</body>
<script type="text/javascript">
var glob = {} ; // global namespace
asset_name = '' ;
uploadInstance = 0 ;


$(document).on('click' , '.left-tab' , function(){
    $(this).addClass('on').siblings().removeClass('on') ;
    $('#' + $(this).attr('id').replace('tab' , 'panel') ).show().siblings().hide();

    if( $(this).attr('id') == 'upload_tab'){
        $('#select_image_button').hide();
        if(!uploadInstance)
            $('#upload_overlay').hide();
    }
    else
        $('#select_image_button').show();

    if($(this).attr('id') == 'stock_tab')
        $('#stock_search_term').focus();

});

$(document).ready(function(){
    var matched, browser;

// Use of jQuery.browser is frowned upon.
// More details: http://api.jquery.com/jQuery.browser
// jQuery.uaMatch maintained for back-compat
    jQuery.uaMatch = function( ua ) {
        ua = ua.toLowerCase();

        var match = /(chrome)[ \/]([\w.]+)/.exec( ua ) ||
            /(webkit)[ \/]([\w.]+)/.exec( ua ) ||
            /(opera)(?:.*version|)[ \/]([\w.]+)/.exec( ua ) ||
            /(msie) ([\w.]+)/.exec( ua ) ||
            ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec( ua ) ||
            [];

        return {
            browser: match[ 1 ] || "",
            version: match[ 2 ] || "0"
        };
    };

    matched = jQuery.uaMatch( navigator.userAgent );
    browser = {};

    if ( matched.browser ) {
        browser[ matched.browser ] = true;
        browser.version = matched.version;
    }

// Chrome is Webkit, but Webkit is also Safari.
    if ( browser.chrome ) {
        browser.webkit = true;
    } else if ( browser.webkit ) {
        browser.safari = true;
    }

    jQuery.browser = browser;

    $('#user_tab').click();
    if($.browser.msie)
        $('.dnd-only').hide();
});

function fbAuth(r){
    if(r && r.status && r.status == 'connected'){
        $('#facebook_login').hide();
        populateFbAlbums();
    }
    else {
        $('#facebook_login').show();
    }
}

function populateFbAlbums(){

    if( $('#facebook_tab').hasClass('on'))
        $('.please-wait').show();

    $.ajax({url: '/ajax/facebook/getAlbums.php' ,
        dataType: 'json',
        success: function(data){
            $('#facebook_panel').html('');
            $('.please-wait').hide();

            $('<div />').attr('id', 'fb_logout_section').appendTo('#facebook_panel');
            $('<div />').attr('id','facebook_logout')
                .addClass('facebook-link')
                .html('Log out from Facebook')
                .appendTo('#fb_logout_section')
                .click(function(){
                    parent.FB.getLoginStatus(function(){
                        $('.please-wait').show();
                        parent.FB.logout(function(){
                            setTimeout(window.location.reload() , 500);
                        });
                    }, true);
                });
            var fbAlbums = $('<div />').attr('id', 'facebook_albums').appendTo('#facebook_panel');
//					$('<div />').addClass('facebook-header').html('Your Facebook Albums').appendTo(fbAlbums);
            $.each(data.rows , function(k,v){
                var d = $('<div />').attr('id' , 'fb_album_' + v.object_id).addClass('fb-album-item').appendTo(fbAlbums );
                var d1 = $('<div />').addClass('div1').appendTo(d);
                var d2 = $('<div />').addClass('div2').appendTo(d1);
                var d3 = $('<div />').addClass('div3').appendTo(d2);
                $('<img />').attr('src' , v.src).appendTo(d3);
                $('<div />').addClass('caption').html(v.name).appendTo(d);
            });
        } ,
        error: function(){
            $('.please-wait').hide();
            console.log('An error occured while connecting to Facebook. Please try again.');
        }


    });
}

function populateFbPhotos(album_object_id){
    $('#facebook_albums').hide();
    $('.facebook-photo-group').hide();
    if($('#facebook_album_' + album_object_id).show().length > 0)
        return ;

    $('.please-wait').show();

    $.ajax({url: '/ajax/facebook/getPhotos.php' ,
        dataType: 'json',
        data: {'album_object_id' : album_object_id} ,
        success: function(data){
            $('.please-wait').hide();

            var photos = $('<div />').attr('id', 'facebook_album_' + album_object_id).addClass('facebook-photo-group').appendTo('#facebook_panel');
            $('<div />').addClass('facebook-nav').html('<span class="back-to-fb-albums facebook-link">&lt;&lt; Back to Facebook Albums</span>').appendTo(photos) ;

            $.each(data.rows , function(k,v){
                var d = $('<div />').attr('id' , 'fb_photo_' + v.object_id).addClass('fb-photo-item image-item').appendTo(photos);
                var d1 = $('<div />').addClass('div1').appendTo(d);
                var d3 = $('<div />').addClass('div3').appendTo(d1);
                $('<img />').attr('src' , v.src).appendTo(d3);
            });
        }


    });
}

$(document).on('click' , '.fb-album-item' , function(){
    populateFbPhotos($(this).attr('id').split('_').pop());
});

$(document).on('click' , '.back-to-fb-albums' , function(){
    $('#facebook_albums').show();
    $('.facebook-photo-group').hide();
});

function deselectImages(){
    $('.image-item').removeClass('selected');
    $('#select_image_button').addClass('disabled');
}


$('#login_link').click(function(){
    parent.loginAndShowAddImagePopup() ;
});


$(document).bind('drop dragover', function (e) {
    e.preventDefault();
});

$(document).bind('dragover dragenter', function (e) {
    $('#image_drop_zone').addClass('over');
});
$(document).bind('dragleave dragend drop', function (e) {
    $('#image_drop_zone').removeClass('over');
});


$(function () {
    $('#fileupload').fileupload({
        dataType: 'json',
//		forceIframeTransport: true,
        done: function (e, data) {
            console.log();
        }
    });

    $('#upload_redirect_url').val(window.location.href);


    $('#fileupload').bind('fileuploadprogress', function (e, data) {
        data.domItem.find('.upload-item-progress').css('width', data.loaded / data.total * 100  + '%');
    })

    $('#fileupload').bind('fileuploadsubmit', function (e, data) {
        console.log('fileuploadsubmit' , data);
        var name = data.files[0].name || data.files[0].fileName  || '' ;
        var size = data.files[0].size || data.files[0].fileSize || 0 ;

        data.domItem = $('<div />').addClass('upload-item').insertBefore('#image_divider');
        var ph = $('<div />').addClass('image-ph').appendTo(data.domItem);
        var st = $('<div />').addClass('upload-item-status').appendTo(ph).html('Uploading');
        $('<div />').addClass('upload-item-name').appendTo(ph).html(name);
        var pgph = $('<div />').addClass('upload-item-progress-ph').appendTo(ph);
        $('<div />').addClass('upload-item-progress').appendTo(pgph);

        if(name.length > 0 && $.inArray(name.split('.').pop().toLowerCase() , ['jpg','jpeg','png','pdf','gif'] ) == -1  ){
            data.domItem.addClass('error');
            st.html('.' + name.split('.').pop().toLowerCase() + ' files are not supported.');
            data.domItem.delay(4000).fadeOut() ;
            return false;
        }

        if(size > 20 * 1024 * 1024 ){
            data.domItem.addClass('error');
            st.html('File is too large.');
            data.domItem.delay(4000).fadeOut();
            return false ;
        }

    });

    $('#fileupload').bind('fileuploaddone', function (e, data) {
        console.log('fileuploaddone' , data);
        if(data.result.error){
            data.domItem.addClass('error');
            data.domItem.find('.upload-item-status').html('Invalid File.');
            data.domItem.delay(4000).fadeOut();
            return false;
        }
        //alert(data.result.success);
        data.domItem.remove();
        addImageToList(data.result, true);

    });


    $('#fileupload').bind('fileuploadsend', function (e, data) {
//		data.domItem.html('send');
    });

});



function populateUserImages(){
    $('#user_panel .image-item').remove();
    $.ajax({
        url: "get_user_image.php" ,
        dataType: 'json' ,
        data: {sid:'<?php echo session_id();?>'},
        success: function(data){
            $.each(data.rows , function(k,v){
                addImageToList(v);
            });
        } ,
        error: function(){
            console.log('error uploading');
        }
    });
}
function addImageToList(v, select_after_insert){
    var d = $('<div />').attr('id' , 'image_' + v.id).attr('title', v.name).addClass('image-item');
    $('<img />').attr('src' , 'get_image_thumb.php?size=100&image_id=' + v.id+'&sid=<?php echo session_id();?>').appendTo(d);
    $('<div />').addClass('image-delete-button').appendTo(d);

    if(v.fotolia_id){
        $('<div />').addClass('dollar').appendTo(d);
        d.insertAfter('#fotolia_divider') ;
    }
    else{
        d.insertAfter('#image_divider') ;
    }
    if(select_after_insert){
        d.click();
    }

}

$('body').on('click' , deselectImages ) ;

$(document).on('click' , '.image-item' , function(){
    $(this).addClass('selected');
    $('#select_image_button').removeClass('disabled');
});

$(document).on('click' , '.image-delete-button' , function(){
//		if(! confirm('Are you sure you want to remove this image?')) return ;
    var _this = this ;
    $.ajax({
        url: "delete_image.php" ,
        dataType: 'json' ,
        data: {"image_id" : $(_this).closest('.image-item').attr('id').split('_').pop(), sid: '<?php echo session_id();?>' } ,
        success: function(data){
            alert(data.success);
            $(_this).closest('.image-item').fadeOut(300);
        }

    });
});



$('#user_tab').on('click' , function(){
    populateUserImages();
});

$('#facebook_tab').on('click' , function(){
//	FB.getLoginStatus(fbAuth, true)
});


$('#stock_search_button').click(function(){
    if($(this).hasClass('disabled'))
        return ;
    $('#stock_panel .image-cont').html('');
    $('#stock_panel').scrollTop(0);
    glob.stockPage = 0 ;
    populateStockImages();
});

$('#close_link').click(function(){
    window.parent.cancelAddImage();
});


$('#select_image_button').click(function(){

    var img = $('.image-item.selected') ;
    if(img.length != 1)
        return ;
    $('.please-wait').show();
    if(img.hasClass('fotolia-result')){
        $.ajax({
            url : '/ajax/fotolia/getComp.php' ,
            data: {"fotolia_id" : img.attr('id').split('_').pop() , "asset_name" : asset_name } ,
            dataType: 'json' ,
            success: function(data){
                $('.please-wait').hide();
                useImageInParent(data);
            } ,
            error: function(){
                $('.please-wait').hide();
                alert('Sorry! An error occured while retrieving the stock image. Please try again.');
            }
        })
    }
    else if(img.hasClass('fb-photo-item')){
        $.ajax({
            url : '/ajax/facebook/registerImage.php' ,
            data: {"photo_object_id" : img.attr('id').split('_').pop() , "asset_name" : asset_name} ,
            dataType: 'json' ,
            success: function(data){
                $('.please-wait').hide();
                useImageInParent(data);
            }
        });
    }
    else {
        $.ajax({
            url : 'get_image_info.php' ,
            data: {"image_id" : img.attr('id').split('_').pop(), 'sid': '<?php echo session_id();?>'} ,
            dataType: 'json' ,
            success: function(data){
                $('.please-wait').hide();
                useImageInParent(data);
            }
        })

    }

});

$(document).on('dblclick' , '.image-item' , function(){ $('#select_image_button').click() })

$('#stock_search_term').keydown(function(e){ if(e.keyCode == 13)  $('#stock_search_button').click(); }) ;
function populateStockImages(){
    glob.stockPage++ ;
    if(glob.stockPage > 20)
        return ;
    $('#stock_search_button').html('Please Wait...').addClass('disabled');
    $.ajax({
        url : '/ajax/fotolia/getSearchResults.php' ,
        dataType: 'json' ,
        data: {"keyword" : $('#stock_search_term').val() , limit: 50 , "page" :  glob.stockPage } ,
        success: function(data){
            $('#stock_search_button').html('Search Images').removeClass('disabled');
            glob.moreStockResultRequested = false ;
            $.each(data, function(k,v) {
                if(k == 'nb_results' && v == 0){
                    if(glob.stockPage == 1)
                        alert('Sorry! No results found.') ;
                    return ;
                }
                var d = $('<div />').attr('id' , 'fotolia_' + v.id ).addClass('image-item fotolia-result').appendTo('#stock_panel .image-cont');
                $('<div />').addClass('stock-price').html('From $' + v.licenses[0].price).appendTo(d) ;
                $('<img />').attr('src' , v.thumbnail_110_url).appendTo(d);
            });
        }
    });
}

$('#stock_panel').scroll(function(){
    if($('#stock_panel')[0].scrollHeight -	$('#stock_panel').scrollTop() - $('#stock_panel').height() < 100 && ! glob.moreStockResultRequested ){
        glob.moreStockResultRequested = true ;
        populateStockImages();
    }
}) ;

function useImageInParent(data){
    window.parent.useImage(data);
}
function deleteUserImage(image_id){

    $.ajax({	url:"delete_image.php" ,
        dataType: 'json' ,
        data: {"image_id" : image_id, "sid": '<?php echo session_id();?>' } ,
        success: function(data) {
            if (data.success == 1)
                $('#user_image_thumb_wrapper_' + image_id).fadeOut(300 , adjustUserImageScrollers) ;
            else{
                alert('Sorry! We cannot not delete the image at this time!') ;
            }
        }

    }) ;
}


</script>
</html>