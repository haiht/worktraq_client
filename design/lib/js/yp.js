var glob = glob || {};
$(document).on('click' , '.set-theme-option , .wishlist-item' , function(e){
	e.stopPropagation();
	return false ; 
});


$(document).ready(function(){
	/*
	var f = $('<div />').attr('id' , 'yp_feedback_box').addClass('noPrint').appendTo('body');
	var b = $('<div />').attr('id' , 'yp_feedback_box_cotent').appendTo(f);
	$('<div />').addClass('feedback-link').appendTo(b).click(function(){ 
		$('#yp_feedback_box').toggleClass('visible'); 
		$('#feedback_email').val(yp.user.email);  
		if(yp.user.email)
			$('#feedback_email_area').hide();
		else
			$('#feedback_email_area').show();
	});
	$('<h3 />').html('We truly value your opinion!').appendTo(b);
	$('<div />').html('Please describe how we can improve this page to serve you better:').css('margin-bottom' , '5px').appendTo(b);
	$('<textarea />').attr('id' , 'feedback_body' ).height(100).appendTo(b);
	var f = $('<div />').attr('id' , 'feedback_email_area').appendTo(b);
	$('<div />').html('Your email address: (optional)').appendTo(f);
	$('<input type="text" />').attr('id', 'feedback_email').appendTo(f);
	var l = $('<div />').css('text-align' , 'right').appendTo(b);
	$('<span />').html('Cancel').addClass('feedback-cancel').appendTo(l).click(function(){$('#yp_feedback_box').removeClass('visible');});
	
	$('<button />').html('Submit').addClass('action-button orange medium').appendTo(l)
		.click(function(){
			if( $.trim($('#feedback_body').val()).length == 0 ) return ;
			$.ajax({
				url: yp.home_url+'ajax/feedback/send.php' , 
				data: { 'email' : $('#feedback_email').val() , 'body' : $('#feedback_body').val() , 'url' : window.location.href} ,
				dataType: 'jsonp' ,
				success: function(data){
					if(data.success == 0) {
						alert('Please make sure you have entered a valid email address.');
					} else {						
						$('#feedback_email').val('');
						$('#feedback_body').val('');
						alert('Thank You!'); 
						$('#yp_feedback_box').removeClass('visible');
					}
				},
				error: function(){
					alert('We are sorry! We could not deliver your feedback. Please try again or contact customer service.');
					$('#yp_feedback_box').removeClass('visible');
				}
			});
	});
	*/
	var f = $('<div />').attr('id' , 'yp_feedback_box').addClass('noPrint').appendTo('body');
	var b = $('<div />').attr('id' , 'yp_feedback_box_cotent').appendTo(f);
	$('<div />').addClass('feedback-link').appendTo(b).click(function(){ 
		$('#yp_feedback_box').toggleClass('visible'); 
		$('#feedback_email').val(yp.user.email);  
		if(yp.user.email)
			$('#feedback_email_area').hide();
		else
			$('#feedback_email_area').show();
	});
	$('<h3 />').html('Choose following templates!').appendTo(b);
	var $d = $('<div />').css('margin-bottom' , '5px').appendTo(b);
	var $link = $('<ul><li>Template 1: Card 1</li><li>Template 2: Card 2</li></ul>').appendTo($d);

}) ; 

$(document).on("hover", ".template-result-item" , function(){ $(this).css('z-index' , '1000').siblings().css('z-index' , 'auto') } ) ;
$(document).on("click", ".wishlist-item" , function(e){
	e.stopPropagation();
	var template_id = $(this).attr('id').split('_').pop();
	if($(this).hasClass('on'))
		removeTemplateFromWishlist(template_id);
	else 
		addTemplateToWishlist(template_id) ;
	$(this).toggleClass('on');
});

$(document).on("click", ".template-result-item .customize-template-button" , function(){
	window.location = $(this).closest('.template-result-item').find('.template-result-link').attr('href') 
}) ;

$(document).on('mousedown' , '.yp-slider-nav-right' , function(){
	var wrapper = $(this).closest('.yp-slider-wrapper') ;
	var win = wrapper.find('.yp-slider-window');
	var slider = wrapper.find('.yp-slider');
	var totalWidth = 0;
	slider.children().each(function(){ totalWidth += $(this).outerWidth(true) ;	}) ;

	var newLeft = Math.max( slider.cssLeft() - win.width() ,  win.width() - totalWidth - 20 ) ; 
	slider.animate({left: newLeft } , 500 ) ; 
}) 

$(document).on('mousedown' , '.yp-slider-nav-left' , function(){
	var wrapper = $(this).closest('.yp-slider-wrapper') ;
	var win = wrapper.find('.yp-slider-window');
	var slider = wrapper.find('.yp-slider');
	var newLeft = Math.min(0 , slider.cssLeft() + win.width())  ;
	slider.animate({left: newLeft } , 500 ) ; 
}) 

$(document).on('click' , '.linker' , function(){
	window.location = $(this).find('a').attr('href');
});
$(document).ready(function(){
	if($.trim($('#left_section').html()) == ''){
		$('#left_section').hide();
		$('#right_section').addClass('shifted') ;
	}

	$('.yp-slider').each(function(){

		var wrapper = $('<div />').addClass('yp-slider-wrapper') ;
		var win = $('<div />').addClass('yp-slider-window').appendTo(wrapper);
		wrapper.insertAfter($(this));
		$(this).appendTo(win);
		
		var totalWidth = 0;
		$(this).children().each(function(){ totalWidth += $(this).outerWidth(true) }) ;

		if(totalWidth > win.width() ){
			$('<div />').addClass('yp-slider-nav-left').insertAfter(win);
			$('<div />').addClass('yp-slider-nav-right').insertBefore(win);
		}
	});
	

});

function setWishlistStates(){
	$.ajax( {
				url: yp.home_url+"ajax/wishlist/getCurrentUserWishlist.php" ,
				cache: false,
				dataType: 'json' ,
				success : function(data){
					$(".wishlist-item").removeClass("on");
					$.each(data.rows, function(k,v) {
						$("#wishlist_item_template_"+ v.template_id).addClass('on');
					});
				}
				
	}) ; 
}
function removeTemplateFromWishlist(template_id){
	$.ajax({ 
			url: "/ajax/wishlist/removeTemplateFromWishlist.php" ,
			data: { "template_id" : template_id} ,
			cache: false,
			dataType: 'json' ,
			success: setWishlistStates
	})

}

function addTemplateToWishlist(template_id){
	$.ajax({ 
			url: "/ajax/wishlist/addTemplateToWishlist.php" ,
			data: { "template_id" : template_id} ,
			cache: false,
			dataType: 'json' ,
			success: setWishlistStates
	})
}

function updateThemedElements(theme_id){
	$("img.themed").each(function(k2, v2){
		var src = $(v2).attr('src') ;
		if(src.search('theme_id') == -1){
			src+= '&theme_id=' ;
		}
		if(src.search('theme_id') != -1){
			src = src.replace(/theme_id=[0-9]*/ , 'theme_id=' + theme_id);
			$(v2).attr('src' , src) ;
		}
	});

	$("a.themed").each(function(k2, v2){
		var url = $(v2).attr('href') ;
		if(url.search('theme_id') == -1){
			url+= '#theme_id=' ;
		}
		if(url && url.search('theme_id') != -1){
			url = url.replace(/theme_id=[0-9]*/ , 'theme_id=' + theme_id);
			$(v2).attr('href' , url) ;
		}
	});

}



function YpSignOut(){
		window.location = yp.logout_url ; 
}

function YpSignIn(){

	if(typeof popupLoginHandler == 'function')
		popupLoginHandler();
	else
		window.location = yp.login_url+'?url=' + document.URL ;
}

function headerPostLoginHandler(info){
	$('#header_first_name').html(info.first_name);
	$('#header_last_name').html(info.last_name);
	$('#header_cart_items_count').html(info.cart_items_count);
	$('#nav_item_account').show();
	$('#nav_item_sign_in').hide();

}

$(document).on('mouseentera' , '.set-theme-option' , function(e){
	e.stopPropagation();
//	$(this).addClass('selected').siblings().removeClass('selected');
	var theme_id = $(this).attr('id').split('_').pop();
	var thumb = $(this).closest('.gallery-item').find('img');
	var newSrc = thumb.attr('src').replace(/theme_id=[0-9]*/ , 'theme_id=' + theme_id) ;
	thumb.attr('src', newSrc);
//	var lnk = $(this).closest('.gallery-item') ;
//	var newHref = lnk.attr('href').replace(/theme_id=[0-9]*/ , 'theme_id=' + theme_id) ;
//	lnk.attr('href', newHref );
	
	return false ; 
});

$(document).on('click' , '.set-theme-option' , function(e){
	e.stopPropagation();
	return false ; 
});

$(document).on('mouseenter' , '.set-theme-option' , function(e){
	e.stopPropagation();
	$(this).addClass('selected').siblings().removeClass('selected');
	var theme_id = $(this).attr('id').split('_').pop();
	var thumb = $(this).closest('.gallery-item').find('img');
	var newSrc = thumb.attr('src').replace(/theme_id=[0-9]*/ , 'theme_id=' + theme_id) ;
	thumb.attr('src', newSrc);
	var lnk = $(this).closest('.gallery-item') ;
	var newHref = lnk.attr('href').replace(/theme_id=[0-9]*/ , 'theme_id=' + theme_id) ;
	lnk.attr('href', newHref );
	
	return false ; 
})

function subscribe(){
	if(!validateEmail(jQuery('#subscribe_email').val())){
		alert('Please provide a valid email address.');
		return false;
	}
	jQuery.ajax({
		url: yp.home_url+'ajax/newsletter/subscribe.php' , 
		data: { 'email' : jQuery('#subscribe_email').val()} ,
		dataType: 'jsonp' ,
		success: function(data){
			alert(data.message);
			jQuery('#subscribe_email').val('Enter your email');
		},
		error: function(){
			alert('We are sorry! We could not process your request. Please try again or contact customer service.');
		}
	});
}
$(function(){
	$('.set-theme-option:first-child').mouseenter();
});
