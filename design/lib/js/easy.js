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

});
///End jQuery.browser



var view = {} ;
var resize = {} ; // resize namespace
var config = config || {} ;

var tempTextImages = [] ;
var tempTextTimeouts = [] ;
var tempTextTimestamps = [] ;

config.maxZoomLevel = 6;
config.minZoomLevel = -2 ;
config.maxUploadSizeMB = 20 ;
config.dragLockMargin = user.admin_mode === 1 ? 1 : 8 ;  // admins don't like drag lock
config.snapMargin = 3 ;   
config.minFotoliaRes = 200 ;
config.noticeRes = 200 ;
config.warningRes = 100 ;
config.fontSizes = [7, 8, 9, 10, 11, 12, 14, 16, 18, 20, 22, 24, 30, 36, 48, 60, 72, 96, 150, 200, 300, 400, 600, 800, 1000, 1200, 1400]; 
config.borderSizes = [0, 1, 2, 3, 4, 5, 6, 8, 10, 12, 14, 16, 18, 20, 24,40];
config.color_palette = ['transparent','ffffff','ebebeb','d6d6d6','c0c0c0','a9a9a9','929292','797979','5f5f5f','424242','222222','000000',
						'00364a','162255','162255','2f143c','381421','561a17','58230f','553715','524019','67632d','515726','2c3e20',
						'004d65','2e3a77','201350','431957','51192c','821810','7b2e0e','794d1b','775a24','8b893e','6f793a','3c572a',
						'006e90','304fa1','322e72','60347a','791a3d','b43129','ad4327','a76a2e','a67d34','c3bd41','99a74a','4f7b41',
						'008eb5','4666b3','403c8e','794099','992850','e3382f','da5430','d58634','d29e37','f4eb04','c3d142','669e51',
						'00a4d7','5071b9','5746a4','914da5','ba3360','f7482b','f86c29','fca921','fcc616','faee46','d8e144','77bb57',
						'46c4ef','5a82c2','6364b1','9c66af','e73d7a','f96455','fa864c','fcb343','fec93e','fcf072','e3e66a','98cd63',
						'66d2f5','809fd2','786db4','a86eb1','ee709f','fa8b82','fca47e','fdc678','ffd778','fdf398','e9eb93','b3d78d',
						'9cdef7','aec3e5','9a89c1','c295c5','f3a3c0','fcb3b0','fcc3ab','fedaa8','fee4a9','fdf6bb','f2f1b9','cfe5b5',
						'ceedf9','d7e1f3','d4c8e2','e4c9e1','f8d3e0','fcd1d0','fddbcd','fee8cc','fdefcb','fdfdd5','f6fad3','d9eaca'];


config.preloadImages = ['images/ajax-loader.gif', 'images/ajax-loader-s.gif' ] ;
$.each(config.preloadImages, function(k,v){
	(new Image()).src = v ;
});


function proceedToNextPage(){
	$('#gray_box').click();
	
	if (! view.isDesignSaved || ! view.designId) {
		view.saveAsName = view.designName ; 
		saveDesign(proceedToNextPage, false) ;
		return 
	}
	window.location = config.nextPageUrl + '?design_id=' + view.designId ;
}

function downloadPdfProof(){
	if 	(user.customer_id == null) {
		popupLoginHandler(downloadPdfProof) ; 
		return ;
	}	

	if (!user.download_pdf) return ;
	$('#pdf_proof_json').val(JSON.stringify(view.jdesign) );
	$('#pdf_proof_form').submit();
	
	
}
function shareOnFacebook() {
	alert('shareOnFacebook');
	$.ajax({
		url : "/ajax/design/saveForShare.php"  , 
		type: 'post' , 
		data: {'json' : JSON.stringify(view.jdesign) , 'template_id' : view.templateId  } ,
		dataType: 'json' , 
		success: function(data){
			if(! data.success){
				showAlert('An error occured while sharing your design. Please try again.') ;
				return;
			}
				
			var obj = {
				method: 'feed',
				link: config.homeUrl+'design/' + data.token ,
				picture: config.homeUrl+'ajax/raster/getDesignThumb.php?long_side=150&design_id=' + data.design_id ,
				name: 'Check out the ' + products[view.jdesign.product].title + ' I created on YouPrint.com!' ,
//				caption: '',
				description: 'On YouPrint.com you can customize and order thousands of designs from Business Cards and Stationary to Flyers, Banners and Postcards.'
			};
		
			FB.ui(obj, function(data){console.log(data)});
			
		} , 
		error: function(){
				showAlert('An error occured. Please try again.') ;
		}

		
	})
}

function emailToFriend(){
	
	if 	(user.customer_id == null) {
		popupLoginHandler(emailToFriend) ; 
		return ;
	}
	$('#gray_box').show();
	var popup = createPopup('Email this Design to a Friend' , 500).show();
	var c = popup.find('.simple-popup-content') ;
	$('<div><b>Your Name: </b><br /><input id="share_design_sender_name" type="text" style="width: 100%" /></div><br />').appendTo(c);
	$('<div><b>Your friend\'s email address: </b><br /><input id="share_design_receiver_email" type="text" style="width: 100%" /></div><br />').appendTo(c);
	$('<div><b>Optional Message: </b><br /><textarea id="share_design_message" style="width: 100%" ></textarea></div>').appendTo(c);
	$('<br /><div style="text-align: right"><button id="share_design_send_button" class="action-button" >Send</button></div>').appendTo(c);
	$('#share_design_sender_name').val(user.first_name + ' ' + user.last_name) ; 

	$('#share_design_send_button').click(function(){
		if(! $(this).hasClass('disabled') )
			sendEmailToFriend() ;
	});
}

function sendEmailToFriend(){
	alert('sendEmailToFriend');
	if(! validateEmail( $.trim ($('#share_design_receiver_email').val() ))){
		alert('Invalid Email address'); 
		$('#share_design_receiver_email').css('border-color' , '#f77').focus() ;
		return ; 
	}
	$('#share_design_send_button').html('Please wait...').addClass('disabled');
	$.ajax({
		url : "/ajax/design/saveAndEmail.php"  , 
		type: 'post' , 
		data: {'json' : JSON.stringify(view.jdesign) , 
				'template_id' : view.templateId  , 
				'sender_name' : $('#share_design_sender_name').val() , 
				'receiver_email' : $('#share_design_receiver_email').val() , 
				'message' : $('#share_design_message').val() } ,
		dataType: 'json' , 
		success: function(data){
			$('#gray_box').click();
			if(data.success)
				showNotice('Succesfully Sent!'); 
			else 
				showAlert('An error occured while sending the email. Please try again.'); 
		} , 
		error: function(){
			$('#gray_box').click();
			showAlert('An error occured while sending the email. Please try again.'); 
		}
		
	});
}

function lockElement(){
	var el = getElem($('.selected').attr('id').split('outline_')[1] ) ;
	el.locked = true ; 
	$('.selected').addClass('locked').removeClass('selected'); 
	arrangeOutlineZindex() ;
	updateToolbar();
}

function replacePhImage(){
	showAddImagePopup($('.selected.croppable').attr('id').split('outline_img_').pop().replace(/(^user_|^admin_)/ , '') )
	deselectAll();
}
function zoomInInnerImage(){
	var v = $('#crop_slider').slider('value') ;  
	scaleInnerImage( Math.max(v + 0.05, $('#crop_slider').slider('option','min') )); 
	updateJdesign(); 
	adjustcropSlider() ;
}

function zoomOutInnerImage(){
	var v = $('#crop_slider').slider('value') ;  
	scaleInnerImage( Math.max(v - 0.05, $('#crop_slider').slider('option','min') )); 
	updateJdesign(); 
	adjustcropSlider() ;
}

function moveInnerImage(dir){
	var imgId = $('.selected.croppable').attr('id').split('outline_').pop() ;
	var inner = $('#inner_' + imgId);
	var outline = $('#outline_' + imgId);
	switch(dir){
		case 'L':
			inner.cssLeft(inner.cssLeft() - 10 );
			break;
		case 'R':
			inner.cssLeft(inner.cssLeft() + 10 );
			break;
		case 'U':
			inner.cssTop(inner.cssTop() - 10 );
			break;
		case 'D':
			inner.cssTop(inner.cssTop() + 10 );
			break;
	}

	inner.cssLeft( Math.max ( outline.cssWidth() - inner.cssWidth()   , inner.cssLeft() )) ;
	inner.cssLeft( Math.min ( 0 , inner.cssLeft() )) ;

	inner.cssTop( Math.max ( outline.cssHeight() - inner.cssHeight()   , inner.cssTop() )) ;
	inner.cssTop( Math.min ( 0 , inner.cssTop() )) ;
	
	view.outdatedJdesign = true ;
	updateJdesign();	
	
}

function adjustcropSlider(){
	var jimage = getElem( $('.selected.croppable').attr('id').split('outline_')[1]);
	var cropWidth = typeof jimage.cropWidth == 'undefined' ? 1 : jimage.cropWidth ;
	var cropHeight = typeof jimage.cropHeight == 'undefined' ? 1 : jimage.cropHeight ;
	var sliderValue = Math.min(1 / cropWidth, 1 / cropHeight) ;
	$('#crop_slider').slider('value' , sliderValue) ;
}

function scaleInnerImage(value){
	view.outdatedJdesign = true ;
	var imgName = $('.selected.croppable').attr('id').split('outline_img_')[1] ;

	var jimage = getElem('img_'+imgName);
	var inner = $('#inner_img_' + imgName);
	var outline = $('#outline_img_' + imgName);
	
	var innerRatio = view.imageInfo[jimage.image_id].uploadWidth  / view.imageInfo[jimage.image_id].uploadHeight  ;
	innerRatio = (jimage.rotation % 180 == 0) ? innerRatio  :  1 / innerRatio  ;
	

	var outlineRatio = outline.cssWidth()  / outline.cssHeight() ;
	
	if (innerRatio < outlineRatio) {
		var newW = outline.cssWidth() * value ;
		var newH = newW /  innerRatio  ; 
	}
	else {
		var newH = outline.cssHeight() * value  ;
		var newW = newH * innerRatio  ; 
	}

	inner.cssWidth(newW) ; 
	inner.cssHeight(newH) ; 

	inner.cssLeft( Math.max (Math.min(- inner.cssWidth() * jimage.cropLeft , 0), outline.cssWidth() - inner.cssWidth() )) ; 
	inner.cssTop( Math.max (Math.min(- inner.cssHeight() * jimage.cropTop , 0), outline.cssHeight() - inner.cssHeight()))  ; 

}

function rotateInnerImage(degree){
	var imgId = $('.selected.croppable').attr('id').split('outline_').pop() ;
	var jimage = getElem(imgId);
	var inner = $('#inner_' + imgId);
	var outline = $('#outline_' + imgId);
	outline.addClass('loading');
	
	var temp = inner.cssWidth();
	inner.cssWidth(inner.cssHeight()) ;
	inner.cssHeight(temp);
	jimage.rotation = (jimage.rotation + degree) % 360; ;
	scaleInnerImage(1);
	view.outdatedJdesign = true ;
	updateJdesign();
	inner.attr('src', getMockupSrc(jimage))
			.load(function(){
				outline.removeClass('loading');
			});
	
}

function applySvgColor(color){
	var element_id = $('.selected.svg').attr('id').split('outline_')[1] ;
	var jElement = getElem(element_id) ;
	jElement.svg_colors[$('.svg-color-item.on').index()] = color ; 
	$('#inner_'+element_id).attr('src' ,  getMockupSrc(jElement) ) ;
	view.outdatedJdesign = true ;
	pushState();
	updateToolbar();
}

function addLogoToDesign(){
	showAddImagePopup('logo');
}

function showAddImagePopup(ph_name){
	view.addImagePh = ph_name;
    /*
	if 	(user.customer_id == null && user.visitor_id == null ) {
		popupLoginHandler( function() {showAddImagePopup(ph_name)} ) ; 
		return false;
	}
	
	if(user.admin_mode){
		admin.showImagePanel();
		return;
	}
    */
    //alert($('#add_image_popup').length);
	if($('#add_image_popup').length == 0){
		$('#gray_box').show();
		//$('<iframe />' , {'src': '/panels/addImage.php' , 'frameborder' : 0}).attr('id' , 'add_image_popup').addClass('iframe-popup').appendTo('body').show() ;
        $('<iframe />' , {'src': 'addimage.php' , 'frameborder' : 0}).attr('id' , 'add_image_popup').addClass('iframe-popup').appendTo('body').show() ;
	}
	else {
		$('#gray_box , #add_image_popup').show();		
	}

	 $('#add_image_popup')[0].contentWindow.asset_name = (ph_name ? ph_name  : '') ; 
	 $('#add_image_popup').contents().find('#user_tab').click();
	$('body').css('overflow' , 'hidden');
} 

function cancelAddImage(){
	$('#temp_text').focus();
	$('#gray_box , #add_image_popup').hide();
//	$('#temp_text').blur();
	$('body').css('overflow' , 'visible');
}


function useImage(image){
	updateSingleImageInfo(image);
	if(typeof view.addImagePh == 'undefined'){
		placeDroppedImage({} , {} , image.id) ;
    }else{
		putImageInPlaceholderFamily(view.addImagePh, image.id) ;
    }
	cancelAddImage();
}

function loginAndShowAddImagePopup(){
	popupLoginHandler(function(){showAddImagePopup(view.addImagePh)}) ;
}

function placeDroppedImage(e , ui, image_id) {
	if(typeof ui != 'undefined' && typeof ui.helper != 'undefined' )
		ui.helper.hide()  ; 

	if($.browser.msie){
		$('.ui-effects-wrapper').remove() ; 
		$('.tooltip').remove() ; 
	}

	
	if (typeof image_id == 'undefined')
		var image_id = ui.draggable.attr('id').split('user_image_thumb_')[1] * 1;
	
	// In case the the image is dopped on the main canvas not on a placeholder
	if (typeof $(this).attr('id') == 'undefined' ||  $(this).attr('id') == 'droppable_layers' ) {

		var	im = { 	
			"image_id" :  image_id ,
			"name": "image_" + Math.floor(Math.random() * 100000 ),
			"zindex": 299 ,
			"rotation" : 0,
			"fixedratio" : true
		}

		var imgRatio = view.imageInfo[image_id].uploadWidth / view.imageInfo[image_id].uploadHeight ;
		
		var can = view.jdesign.canvases[view.currentPage] ; 

		if(typeof e != 'undefined' && typeof e.pageX != 'undefined'){ // Image is dropped 
			im.width = Math.min(can.width / 2 , can.height / 2 * imgRatio);
			im.height = im.width / imgRatio  ;
			im.left = (event.pageX - getCanvasX() ) / view.dpi - im.width / 2 ;
			im.top = (event.pageY - getCanvasY() ) / view.dpi - im.height / 2 ;
		}
		else {
			im.width = Math.min(can.width / 2 , can.height / 2 * imgRatio);
			im.height = im.width / imgRatio;
			im.left = (can.width - im.width) / 2 ; 
			im.top = (can.height - im.height) / 2 ;
		}

		if (typeof view.imageInfo[image_id].fotoliaId != 'undefined'){
			im.fotoliaId = view.imageInfo[image_id].fotoliaId ;
			im.fotoliaLicense = view.fotoliaLicenses[im.fotoliaId][0].name ;
		}

		if (typeof view.imageInfo[image_id].svg_id != 'undefined'){
			im.svg_id = view.imageInfo[image_id].svg_id  ;
			im.svg_colors = view.imageInfo[image_id].svg_original_colors ;
			im.fixedratio = false ;
		}

		view.jdesign.canvases[view.currentPage].images.push(im) ; 
		drawImageElement(im) ;
		arrangeImageZees() ;
		updateStockImagePrices();
		pushState() ; 
		$('#outline_img_'+im.name).mousedown();
		$('#outline_img_'+im.name).mouseup();
	}
	
	else {
		// In case that the image is dropped in a placeholder
		var phName = $(this).attr('id').split('droppable_')[1] ;
		putImageInPlaceholder(phName , image_id ) ; 
		$('#outline_img_user_' + phName).mousedown();
		$('#outline_img_user_' + phName).mouseup();
	}

	
}

function putImageInPlaceholderFamily(ph_name, image_id){
	var count = 0 ;
	var pattern = new RegExp("^"+ph_name+"(-[0-9]+|)$") ;
	$.each(view.jdesign.canvases[view.currentPage].images, function(k2, i) {
		if(pattern.test(i.name)){
			if(i.placeholder){
				putImageInPlaceholder(i.name , image_id) ;
				count++;
			}
		}
	});

	if(count == 0)
		placeDroppedImage({} , {} , image_id) ;
}


function putImageInPlaceholder(ph_name, image_id){
	var originalJPlace = getElem('img_' + ph_name) ;
	var jPlaceAdminImage = getElem('img_admin_' + ph_name) ;

	var jPlace = JSON.clone(originalJPlace) ; 
	var jPlaceRatio = jPlace.width  / jPlace.height  ;

	//jPlace.invisible
	deleteImageElementByName( ((user.admin_mode) ? 'admin' : 'user') +'_'+  ph_name) ;
	
	im = {} ; 
	im.image_id =  image_id ;
	im.name = ((user.admin_mode) ? 'admin' : 'user') + '_' + ph_name ;
	im.zindex = originalJPlace.zindex + .1 ;
	
	im.type = originalJPlace.type ;
	im.locked = originalJPlace.locked ;

	// There should be an additional parameter to detemine if border should be transferred from placeholder or not.
	if (originalJPlace.border_width){
		im.border_width = originalJPlace.border_width ;
		im.border_color = originalJPlace.border_color ;
	}
	
	im.rotation = 0 ; 
	im.fixedratio = true ;
	im.noselect = false ;
	droppedImageRatio = view.imageInfo[image_id].uploadWidth / view.imageInfo[image_id].uploadHeight ;

	if (typeof view.imageInfo[image_id].fotoliaId != 'undefined'){
		im.fotoliaId = view.imageInfo[image_id].fotoliaId ;
//		im.fotoliaLicense = view.imageInfo[image_id].licenses[0].name ;
		im.fotoliaLicense = null ; // view.fotoliaLicenses[fotoliaId].name 
	}

	if (jPlace.placeholder == 'filler') {
		im.width = jPlace.width ;
		im.height = jPlace.height ; 
		im.left = jPlace.left ; 
		im.top = jPlace.top ; 
		im.crop = true ;
		im.unmovable = true ;
		im.noresize = true ;
		im.fitted = true ;

		if (droppedImageRatio >  jPlaceRatio) {
				uncroppedWidth =  jPlace.height * droppedImageRatio ;
				im.cropLeft = (uncroppedWidth - jPlace.width ) / uncroppedWidth / 2 ;
				im.cropWidth = jPlace.width / uncroppedWidth ;
				im.cropHeight = 1 ; 
				im.cropTop = 0 ; 
		}
		else {
				uncroppedHeight =  jPlace.width / droppedImageRatio ;
				im.cropTop = (uncroppedHeight - jPlace.height ) / uncroppedHeight / 2 ;
				im.cropHeight = jPlace.height / uncroppedHeight ;
				im.cropWidth = 1 ; 
				im.cropLeft = 0 ;		
		}
	}
	else  if (jPlace.placeholder  == 'fitter' ) {
		if (droppedImageRatio >  jPlaceRatio) {
			im.width = (jPlace.width  + jPlace.height * droppedImageRatio) / 2  ;
			im.height = im.width / droppedImageRatio  ;
			im.left = jPlace.left  ;
			im.top = (jPlace.height -  im.height) / 2 +  jPlace.top ;
		}
		else {
			im.height = (jPlace.height + jPlace.width / droppedImageRatio) / 2 ;
			im.width = im.height * droppedImageRatio  ;
			im.top = jPlace.top ;
			im.left = (jPlace.width  -  im.width) / 2 +  jPlace.left  ;
		}
	}
	
	view.jdesign.canvases[view.currentPage].images.push(im) ; 
	drawImageElement(im) ;
	
	// Makes the placeholder invisble after the image is dropped. We make is visible again in case user removes the dropped image.
	if(! user.admin_mode){
		originalJPlace.invisible = true ;
		$('#img_' + originalJPlace.name).remove() ; 
		$('#outline_img_' + originalJPlace.name).remove() ; 
		
		if(jPlaceAdminImage){
			jPlaceAdminImage.invisible = true ;
			$('#img_' + jPlaceAdminImage.name).remove() ; 
			$('#outline_img_' + jPlaceAdminImage.name).remove() ; 
		}
	}

	updateStockImagePrices(); 
	arrangeImageZees() ;
	pushState() ;
	
	$('#outline_img_' + im.name).mousedown().mouseup();
} 
 

function applyThemeToToolbar(theme){
	
		$('#selected_theme').remove();
		if(theme){
			view.theme_id = theme.id ;
			$(".color-palette").each(function(){
				$(this).find('.theme-colors').remove();
				var th = $('<div />').addClass('theme-colors').prependTo($(this));
				$.each(theme.colors, function(k,v){
					$('<div />').addClass('color-pick').addClass('color-'+v+'_'+k).css('background-color' , '#' + v ).css('width', 100 / theme.colors.length - 1 + '%'  ).data('color' , v).data('color_index' , k ).appendTo(th);
				});
			});
			getThemeThumb(theme).attr('id', 'selected_theme').prependTo('#theme_options');
		}
}

function applyThemeToDesign(theme){
		view.theme_id = theme.id ; 
		var jsons = JSON.stringify(view.jdesign);
		var matches = jsons.match(/[0-9a-f]{6}#[0-9]/gi) ;
		if(! matches) return ; 
		$.each(matches , function(k,v) {
			var colorIndex = v.split('#')[1] ; 
			var regex = new RegExp( v , 'gi' ) ; 
			jsons = jsons.replace( regex , theme.colors[colorIndex] + '#' + colorIndex);
			
		});
		view.jdesign = $.parseJSON(jsons) ;
		applyThemeToToolbar(theme);
		pushState();
		refreshView();
}


function drawImageElement(newJimage) {
	//var imageClone = JSON.clone(newJimage);
	
	// In case of re-draw the original image and outline should be deleted first
	if ($('#img_' + newJimage.name).length > 0 ) {
		$('#img_' + newJimage.name).remove() ; 
		$('#outline_img_' + newJimage.name).remove() ; 
	}
	
	if(newJimage.invisible && ! user.admin_mode){ return; }

	// limiting SVG colors to 15
	if(newJimage.svg_colors){
		newJimage.svg_colors = newJimage.svg_colors.slice(0, config.maxSvgColorSupport );
	}
	
	var cropWidth = newJimage.crop ? newJimage.cropWidth : 1 ;
	var cropHeight = newJimage.crop ? newJimage.cropHeight : 1 ;
	var cropTop = newJimage.crop ? newJimage.cropTop : 0 ;
	var cropLeft = newJimage.crop ? newJimage.cropLeft : 0 ;
	
	var newImgMask = $('<div />').attr('id' , 'img_' + newJimage.name )
				.addClass('image-mask')
				.cssLeft(newJimage.left * view.dpi)
				.cssTop(newJimage.top * view.dpi )
				.cssWidth(newJimage.width * view.dpi)
				.cssHeight(newJimage.height * view.dpi)
				.css('z-index' , newJimage.zindex )
				.appendTo('#' + (newJimage.type == 'overlay' ? 'overlay_layers' :'image_layers')) ;
				
	if (newJimage.image_id){	
		var newImgBorder = $('<div />').attr('id' , 'border_img_' + newJimage.name )
										.addClass('image-border')
										.appendTo(newImgMask) 
	
		if(newJimage.border_width){
			newImgBorder.css('border-width' ,  .013836 * newJimage.border_width * view.dpi + 'px');
			newImgBorder.css('border-color' , '#' + newJimage.border_color.split('#')[0]);
		}
	}
	var newImg = $('<img />').attr('id' , 'inner_img_' + newJimage.name )

				.cssLeft(- cropLeft * newJimage.width / cropWidth * view.dpi )
				.cssTop(- cropTop * newJimage.height / cropHeight * view.dpi ) 
				.cssHeight(newJimage.height / cropHeight * view.dpi)
				.cssWidth(newJimage.width / cropWidth * view.dpi)
				.css('z-index' , '1' )
				.css('display' , 'none')
				.appendTo(newImgMask) ;
				 
	// ------------------ Inserting Outlines for Image Elements ----------------
	if ($('#outline_img_' + newJimage.name).length > 0 )
		$('#outline_img_' + newJimage.name).remove() ; 


	var outline = $('<div />').addClass('outline2 loading')
					.attr('id' , 'outline_img_' + newJimage.name)
					.cssLeft (newJimage.left * view.dpi)
					.cssTop (newJimage.top * view.dpi)
					.cssWidth(newJimage.width * view.dpi)
					.cssHeight(newJimage.height * view.dpi)
					.css('z-index' ,  newJimage.zindex ) 
					.addClass(newJimage.noselect ? 'non-selectable' : '' )
					.addClass(newJimage.unmovable ? 'unmovable' : '' )
					.addClass(newJimage.locked ? 'locked' : '' )
					.addClass(newJimage.noresize ? 'non-resizable' : '' )
					.addClass(newJimage.fixedratio ? 'fixed-ratio' : '')
					.addClass(newJimage.placeholder ? 'pholder' : '')
					.addClass(newJimage.noprint ? 'noprint' : '')
					.addClass(newJimage.fitted ? 'fitted croppable' : '')
					.addClass(newJimage.svg_id ? 'svg' : '')
					.addClass(newJimage.image_id ? 'image' : '')
					.addClass(newJimage.shape_type ? 'shape' : '')
					.addClass((newJimage.placeholder && ! user.admin_mode )? 'non-resizable unmovable' : '')
					.addClass(newJimage.image_id && view.imageInfo[newJimage.image_id].is_public ? 'public' : 'private')
					.addClass(user.admin_mode ? 'admin' : 'user')
					.appendTo('#outline_layers') ; 
					
					if (newJimage.name.search(/^admin/) == 0  && ! user.admin_mode) {
						outline.addClass('non-selectable') ; 
//						newJimage.noprint = true ;
					}
	$('<div />').addClass('selected-dash l').appendTo(outline);
	$('<div />').addClass('selected-dash t').appendTo(outline);
	$('<div />').addClass('selected-dash b').appendTo(outline);
	$('<div />').addClass('selected-dash r').appendTo(outline);
	
	var smw = $('<div />').addClass('size-measure w').appendTo(outline)
	$('<div />').addClass('value').appendTo(smw).html(newJimage.width.toFixed(2) + '&quot;' );
	$('<div />').addClass('guide').appendTo(smw);


	var smh = $('<div />').addClass('size-measure h').appendTo(outline);
	$('<div />').addClass('value').appendTo(smh).html(newJimage.height.toFixed(2) + '&quot;' );
	$('<div />').addClass('guide').appendTo(smh);


//	$('<div />').addClass('position-measure').appendTo(outline).html('X: ' + (newJimage.left - view.jdesign.canvases[view.currentPage].bleed).toFixed(2) + '&quot; , Y: ' + (newJimage.top - view.jdesign.canvases[view.currentPage].bleed).toFixed(2) + '&quot;' );
	
	if(! outline.hasClass('pholder')){		
		$('<div />').addClass('outline-hint').html('Click to Select').appendTo(outline);
		$('<div />').addClass('lock-hint').html('Double-click<br />to Unlock').appendTo(outline);
	}

	if (outline.hasClass('pholder') && ! outline.hasClass('admin')){
			$('<div />').addClass('outline-hint').html(newJimage.noprint ? 'Click to Insert Image' : 'Click to Replace Image').appendTo(outline);
			outline.click(function(){showAddImagePopup(newJimage.name)}) ;
	}
 
	
	
	// --- add nw, ne, sw, se handles for all elements excepts those that are not resizable 

		$('<div />').addClass('handle handle-nw').appendTo(outline) ; 	
		$('<div />').addClass('handle handle-ne').appendTo(outline) ; 	
		$('<div />').addClass('handle handle-sw').appendTo(outline) ; 	
		$('<div />').addClass('handle handle-se').appendTo(outline) ; 	

	// ----- Does not put N S W E handles for elements with fixed aspect ratio -------------
	if ( ! newJimage.noresize) {
		$('<div />').addClass('handle handle-w').appendTo(outline) ; 
		$('<div />').addClass('handle handle-e').appendTo(outline) ; 
		$('<div />').addClass('handle handle-n').appendTo(outline) ; 
		$('<div />').addClass('handle handle-s').appendTo(outline) ; 	
	}
	
	outline.bind("contextmenu", function(e) {
//		$('#inline_menu_img_' + newJimage.name).trigger('mousedown');
//		return false;
	}); 
	
	newImg.attr('src' , getMockupSrc(newJimage) ) ; 

	if ( document.getElementById('inner_img_' + newJimage.name).complete) 
	{
		$('#inner_img_' + newJimage.name).show() ;
		outline.removeClass('loading') ; 
	}
	else 
		document.getElementById('inner_img_' + newJimage.name).onload = function() { 
																			$(this).show() ;
																			$('#outline_' + $(this).attr('id').split('inner_')[1]).removeClass('loading') ; 
																		} ;

	if(newJimage.fotoliaId){
		$('<div />').addClass('stock-image-price-outline')
					.html('Price')
					.appendTo(outline) ; 
		
		updateFotoliaLicense(newJimage) ;
	}
	else if(newJimage.image_id){
		checkImageResolution(newJimage) ;
	}

}


function adjustProfileEQ(product){
	view.profileEQ = JSON.clone(config.urlProfileEQ) ;
	if(products[product].profile != null){
		for (var i in view.profileEQ){
			if (products[product].profile[i] != null)
			view.profileEQ[i] = products[product].profile[i] ;
		}
	}
}

function getProductDesc(){
	var desc = '';
	if(view.jdesign.product == 'foldedGreetingCard'){
		desc += products[view.jdesign.product].name + ' ';
		desc += view.jdesign.width + '&quot; x ' + view.jdesign.height + '&quot; ';
		desc += '(folds to '+(view.jdesign.canvases[0].width - (view.jdesign.canvases[0].bleed * 2))+'&quot; x '+(view.jdesign.canvases[0].height - (view.jdesign.canvases[0].bleed * 2))+'&quot;) <br>';
		desc += (view.jdesign.width > view.jdesign.height) ? 'Vertically folded' : 'Horizontally folded' ;
	}
	else {
		desc += view.jdesign.width + '&quot; x ' + view.jdesign.height + '&quot; ';
		if(view.jdesign.dieCutType != 'none') desc += getDiecutName(view.jdesign.dieCutType) + ' ';
		if(view.jdesign.folding != 'none') desc += getFoldingName(view.jdesign.folding) + ' ';
		desc += products[view.jdesign.product].title;
	}
	
	return desc ;
}

function resetView(){

	view = {} ;  // general namespace
	view.isDesignSaved = true ;
	view.callbacks = [] ; 
	view.textInsertCount = 0 ; 
	view.clipboard = [];
	view.zoomLevel = 0 ;
	view.outdatedJdesign = false ; 
	view.stateIndex = 0 ;
	view.states = [];
	view.customFontSizes = [];
	view.imageInfo = {} ; 
	view.fotoliaLicenses = {} ; 
	view.snapEnabled = true ;
	view.duplicate = getFragmentValue('dup') == 1 ; 
	view.showAdvancedToolbar = true ;
	view.showBleed = !! user.admin_mode ; 
	view.showSafeZone = false ; 
	view.showRuler = ! false ; 
	view.showGrid = false ;
	view.userTexts = [];
	view.userImages = [];
	view.hSnapBuffer = [];
	view.vSnapBuffer = [];
	view.fontSizes = [];
	$('.theme-colors').remove();
}
function zoomOut(){
	// The min zoom level is -1
	if (view.zoomLevel <= config.minZoomLevel ) return ; 
	view.zoomLevel -=  1 ;  
	refreshView(); 
}

function zoomIn(){
	// The max zoon level is 6
	if (view.zoomLevel >= config.maxZoomLevel) return ; 
	view.zoomLevel += 1 ;  
	refreshView(); 
}

function distributeElements(direction) {
		
	// Setting the intial value for minLeft, minTop, MaxRight, maxBottom
	var firstElement = $('.selected').not('.unmovable').eq(0) ; 
	var minLeft = firstElement.cssLeft();
	var minTop = firstElement.cssTop() ; 
	var maxRight = firstElement.cssLeft() + firstElement.cssWidth()  ; 
	var maxBottom  = firstElement.cssTop() + firstElement.cssHeight()  ; 
	var elementsTotalHeight = elementsTotalWidth = 0 ;
	var elementsArray = [];
	// Finding the final value of above variables
	$('.selected').not('.unmovable').each(function() {
			if ($(this).cssLeft() < minLeft) 
				minLeft = $(this).cssLeft() ; 
			
			if ($(this).cssTop() < minTop) 
				minTop = $(this).cssTop() ; 
			
			if ($(this).cssLeft() + $(this).cssWidth() > maxRight) 
				maxRight = $(this).cssLeft() + $(this).cssWidth()  ; 
			
			if ($(this).cssTop() + $(this).cssHeight() > maxBottom ) 
				maxBottom  = $(this).cssTop() + $(this).cssHeight()  ; 
				
			elementsTotalHeight += $(this).cssHeight() ;
			elementsTotalWidth += $(this).cssWidth() ;
				
			elementsArray.push($(this)) ; 
			
	}) ; 
	

	
	if (direction == 'V') {
		elementsArray.sort(function(a, b){ return a.cssTop() - b.cssTop(); } ) ;
		var d = ((maxBottom - minTop) - elementsTotalHeight) /  	($('.selected').not('.movable').length - 1);
		var nextPosition = minTop ; 

		for (var i in elementsArray) {
			(elementsArray[i]).cssTop(nextPosition) ; 
			nextPosition += elementsArray[i].cssHeight() + d ;
		}
	}
	
	else if (direction == 'H') {
		elementsArray.sort(function(a, b){ return a.cssLeft() - b.cssLeft(); } ) ;
		var d = ((maxRight - minLeft) - elementsTotalWidth) /  	($('.selected').not('.movable').length - 1);
		var nextPosition = minLeft ; 

		for (var i in elementsArray) {
			(elementsArray[i]).cssLeft(nextPosition) ; 
			nextPosition += elementsArray[i].cssWidth() + d ;
		}

	}
	
	// Apply the new outline positions to the main elements
	$('.selected').each(function() {
			$('#' +	$(this).attr('id').split('outline_')[1]).cssTop($(this).cssTop()) ;
			$('#' +	$(this).attr('id').split('outline_')[1]).cssLeft($(this).cssLeft()) ;
	});

//	$('#align_control').removeClass('open') ; 
	view.outdatedJdesign = true ;
	updateJdesign();

}


function alignEdges(direction) {
	var minLeft, minTop, maxRight, maxBottom ;
	var es = $('.selected') ;
	// Setting the intial value for minLeft, minTop, MaxRight, maxBottom
	minLeft = es.eq(0).cssLeft();
	minTop = es.eq(0).cssTop() ; 
	maxRight = es.eq(0).cssLeft() + es.eq(0).cssWidth()  ; 
	maxBottom  = es.eq(0).cssTop() + es.eq(0).cssHeight()  ; 
	// Finding the final value of above variables
	es.each(function() {
			if ($(this).cssLeft() < minLeft) 
				minLeft = $(this).cssLeft() ; 
			
			if ($(this).cssTop() < minTop) 
				minTop = $(this).cssTop() ; 
			
			if ($(this).cssLeft() + $(this).cssWidth() > maxRight) 
				maxRight = $(this).cssLeft() + $(this).cssWidth()  ; 
			
			if ($(this).cssTop() + $(this).cssHeight() > maxBottom ) 
				maxBottom  = $(this).cssTop() + $(this).cssHeight()  ; 
	}) ; 
	
	if(es.length == 1){
		var canvas = view.jdesign.canvases[view.currentPage] ;
//		var margin = canvas.bleed + Math.max( (canvas.width - canvas.bleed * 2) / 20  , canvas.bleed)  ;
		var margin = 0.25 ; 
		minLeft = margin * view.dpi ;
		maxRight = (canvas.width -  margin) * view.dpi; 
		minTop = margin * view.dpi;
		maxBottom = (canvas.height - margin) * view.dpi ; 
	}
	
	if (direction == 'L') {
		applyTextAttr('gravity' , 'west') ;
		es.not('.unmovable').cssLeft(minLeft) ;
	}
	else if (direction == 'C') {
		applyTextAttr('gravity' , 'center') ;
		es.not('.unmovable').each(function() { 
											$(this).cssLeft( (minLeft + maxRight) / 2   - $(this).cssWidth() / 2 ) ;
										}) ;
	}
	else if (direction == 'R') {
		applyTextAttr('gravity' , 'east') ;
		es.not('.unmovable').each(function() { $(this).cssLeft( maxRight - $(this).cssWidth() ) }) ;
	}
	else if (direction == 'T') 
		es.not('.unmovable').cssTop(minTop) ; 

	else if (direction == 'M') 
		es.not('.unmovable').each(function() { $(this).cssTop( (minTop + maxBottom) / 2   - $(this).cssHeight() / 2 ) }) ;
		
	else if (direction == 'B') 
		es.not('.unmovable').each(function() { $(this).cssTop( maxBottom - $(this).cssHeight() ) }) ;
	
	// Apply the new outline positions to the main elements
	es.each(function() {
			$('#' +	$(this).attr('id').split('outline_')[1]).cssTop($(this).cssTop()) ;
			$('#' +	$(this).attr('id').split('outline_')[1]).cssLeft($(this).cssLeft()) ;
	 } );
	 
//	$('#align_control').removeClass('open') ; 
	view.outdatedJdesign = true ;
	updateJdesign();
 
}

function centerElementsToCanvas(){
	$('.outline2.selected').not('.unmovable').each(function(){
		$(this).cssLeft( ($('#canvas').cssWidth() - $(this).cssWidth()) / 2  );
		$('#' +	$(this).attr('id').split('outline_')[1]).cssLeft($(this).cssLeft()) ;
	});
	view.outdatedJdesign = true ;
	updateJdesign();
}

function showPreview(){
	$('#gray_box').show()  ;
	var preview_bar = $('<div />').addClass('preview-bar').appendTo('body');
	var c = $('<div />').addClass('overlay-container').appendTo('body');
	
	var btn = $('<div />').addClass('toolbar-button type7 gray-gradient close-preview').appendTo(preview_bar);
	$('<div />').addClass('button-text').html('Close Preview').appendTo(btn);
	btn.click(function(){$('#gray_box').click()});
	
	$('<div />').attr('id' , 'preview_wait').addClass('wait').html('Generating Preview...').appendTo(c);
	var preview = $('<div />').attr('id' , 'preview_container').draggable().appendTo(c);
	getPreview(view.currentPage, preview, false);

	if (view.jdesign.canvases.length > 1) {
		getPreview(view.currentPage == 0 ? 1 : 0, preview, true);
		var btn0 = $('<div />').addClass('preview-btn gray-gradient with-active').attr('id', 'preview_btn0').appendTo(preview_bar).hide();
		$('<div />').addClass('button-text').html(getSideNameByFolding(view.jdesign.folding , 0 , view.jdesign.product)).appendTo(btn0);	
		btn0.click(function(){
            $('.large-preview').hide();
            $('#preview_0').fadeIn(300);		
			$('#preview_btn1').removeClass('on');
			$(this).addClass('on');
		});	
		var btn1 = $('<div />').addClass('preview-btn gray-gradient with-active').attr('id', 'preview_btn1').appendTo(preview_bar).hide();
		$('<div />').addClass('button-text').html(getSideNameByFolding(view.jdesign.folding , 1 , view.jdesign.product)).appendTo(btn1);
		btn1.click(function(){
            $('.large-preview').hide();
            $('#preview_1').fadeIn(300);
			$('#preview_btn0').removeClass('on');
			$(this).addClass('on');
		});
	}
}

function getPreview(page, preview, hide){
	//alert('getPreview: ');
	if (hide) $('<img />').attr('src' , config.preloadImages[1]).attr('id', 'preview_' + page).addClass('preview-load').appendTo(preview).hide();
	$.ajax({
        //url: "/ajax/raster/getJsonPreview.php" ,
        url: "get_json_preview.php" ,
		type: "post" ,  
		data: {"json" : JSON.stringify(view.jdesign) , "page" : page , "dpi" : view.baseDpi}, 
		dataType: 'json' ,
		success: function(data){
            //alert(data.file);
			$('#preview_' + page).remove();
			$('<img />').attr('src' , data.file).attr('id', 'preview_' + page).addClass('large-preview').appendTo(preview).hide()
						.load(function(){					
							if (!hide) {
								if (!$('#preview_btn' + page).siblings().hasClass('on')) {
									$(this).fadeIn(300);
									$('#preview_btn' + page).addClass('on');
								}
								$('#preview_wait').hide();
								$('.overlay-container').click(function(){
									$('#gray_box').click();
								});
								$('.preview-btn').show();
							} else if ($('#preview_btn' + page).hasClass('on')) {
								$(this).fadeIn(300);
							}
							preview.height($(this).height()).width($(this).width());
						})
						.click(stopPropag) ;			
		} ,
        beforeSend: function(){
            //alert('SEnd');
        },
		error: function(xhr, textStatus, error){
            //alert(textStatus+' --- '+ error);
			$('#gray_box').click();
			showAlert('An error occured while generating the preview. Please try again.');
		}
	}) ;	
}

function refreshView(){
	view.defaultFontSize = Math.max( Math.floor(view.jdesign.width * 2 + 2 ), config.fontSizes[0]) ;
	var currentScrollTop = getPageScrollTop()
	var jdesign = view.jdesign  ; 
	var page = view.currentPage ;
	
	jdesign.canvases[page].bleed *= 1 ;
	view.profileEQ.show_text_panel *= 1 ;
	
	if (! view.profileEQ.show_text_panel) {
		$('#text_fields').hide();
		$('#design_tool').css('margin-left' , '0');
		$('#show_text_panel_control').removeClass('on');
	} else {
		$('#text_fields').show();
		$('#design_tool').css('margin-left' , '225px');
		$('#show_text_panel_control').addClass('on');
	}


	$('#tool_placeholder').empty() ;
	$('#text_fields').empty() ; 

	view.DesignToolHeight = jdesign.canvases[page].height > 5 ? 850 : 450 ;

	if (view.profileEQ.show_text_panel){
		view.DesignToolWidth = 730 ;
	}
	else {
		view.DesignToolWidth = 955 ;
	}

	view.labelSize = 0 ; //25 ; 
	view.baseDpi = Math.min( (view.DesignToolWidth - 5 - 2 * view.labelSize) / jdesign.canvases[page].width , 	view.DesignToolHeight / jdesign.canvases[page].height ) ;
	view.baseDpi = Math.min(200 , view.baseDpi ) ;
	view.dpi = Math.floor (view.baseDpi * Math.pow (1.25 ,  view.zoomLevel) /  1) * 1 ;
	view.canvasShiftX = Math.max((view.labelSize), (view.DesignToolWidth - jdesign.canvases[page].width * view.dpi) / 2  ) 
	view.canvasShiftY = Math.max((2 + view.labelSize), ($('#tool_placeholder').css('min-height').split('px')[0] * 1 - jdesign.canvases[page].height * view.dpi) / 2  )	;

	 $('<div />').attr('id','canvas')
						.cssWidth(jdesign.canvases[page].width  * view.dpi) 
						.cssHeight(jdesign.canvases[page].height * view.dpi) 
						.cssTop(view.canvasShiftY)
						.cssLeft(view.canvasShiftX)
						.css('background-color' , '#' + jdesign.canvases[page].bg_color.split('#')[0])
						.appendTo('#tool_placeholder') ; 
						
	$('#tool_placeholder').cssWidth( Math.max(view.DesignToolWidth , $('#canvas').cssWidth() + view.canvasShiftX +  view.labelSize ) ) ;


	// ------------------ Inserting Layer Wrappers to the page -----------------------
	$('<div />').attr('id','image_layers').css('z-index' , 10).appendTo('#canvas') ;  
	$('<div />').attr('id','text_layers').css('z-index' , 20).appendTo('#canvas') ;  
	$('<div />').attr('id','overlay_layers').css('z-index' , 30).appendTo('#canvas') ;  
	$('<div />').attr('id','mask_layers').css('z-index' , 40).appendTo('#canvas') ;  
	$('<div />').attr('id','outline_layers').css('z-index' , 50).appendTo('#canvas') ;  
	$('<div />').attr('id','droppable_layers').css('z-index' , 60).appendTo('#canvas') ;  
	$('<div />').attr('id','loading').css('z-index' , 80).css('background-color' , $('body').css('background-color') ).appendTo('#canvas') ;  

	$('<div />').attr('id', 'snap_guide_x').addClass('snap-guide').appendTo('#mask_layers');
	$('<div />').attr('id', 'snap_guide_y').addClass('snap-guide').appendTo('#mask_layers');
	// ------ Inserting Ruler ----- //
	/*
	$('<img />').addClass('vertical-ruler ruler')
				.attr('src' , 'getRuler.php?ori=ver&dpi='+view.dpi+'&len='+ (jdesign.canvases[page].height - jdesign.canvases[page].bleed * 2) )
				.cssLeft(-15).appendTo('#mask_layers') ;  

	$('<img />').addClass('horizontal-ruler ruler')
				.attr('src' , '/ajax/bitmap/getRuler.php?ori=hor&dpi='+view.dpi+'&len='+ (jdesign.canvases[page].width - jdesign.canvases[page].bleed * 2) )
				.cssTop(-15).appendTo('#mask_layers') ;  
	*/			
	// Inserting Images
	for (i in jdesign.canvases[page].images)
				drawImageElement(jdesign.canvases[page].images[i]) ; 
				
	// Inserting Texts
	for (i in jdesign.canvases[page].texts) {
		addTextElement(jdesign.canvases[page].texts[i]) ; 
	}
	// Adding drop-masks
	updatePlaceholders() ;

	
	// ------------ Adding deselector -----------------------------------------
	$('<div />').addClass('outline2')
				.attr('id' , 'deselector' )
				.addClass('non-selectable')
				.css('z-index', -1)
				.appendTo('#outline_layers')
				.mousedown(function(e) {		
											
					view.selectorX = e.pageX - getCanvasX() ;
					view.selectorY = e.pageY - getCanvasY() ;
					deselectAll(); 
											
											
				})
				.bind("contextmenu", function(e) { 
					// return false;
				}) ; 

	$('<div />').attr('id' , 'multi_selector').appendTo('#outline_layers') ; 

	$('#page_navigation').empty();
	if(jdesign.canvases.length > 1){
		for(i = 0 ; i < jdesign.canvases.length ; i++){
			$('<div />').addClass('page-navigation-item gray-gradient with-active').attr('id' , 'page_navigation_' + i)
						.html(getSideNameByFolding(jdesign.folding, i, jdesign.product))
						.appendTo($('#page_navigation'));
		}
	}
	createBleedMask() ;
	createSafeZoneMask() ;
	arrangeImageZees() ;
	showLoading() ;
	setBleedAreaVisibility(0) ;
	setRulerVisibility(0) ; 
	setGridVisibility(0) ; 
	updateThemeOptions();	
	updateStockImagePrices();
	$('html,body').scrollTop(currentScrollTop);
	updateToolbar() ; 

}

function updateThemeOptions(){
	$('#theme_menu').empty();
	$('#theme_options').hide();
	if(! view.themes) {return} ; 
	$.each(view.themes , function(k,v){
		var th = $('<div />').addClass('toolbar-button type4 ez-theme-option').attr('id' , 'theme_' + v.id).appendTo('#theme_menu');
		if (k < view.themes.length - 1 ) 
			$('<hr />').appendTo('#theme_menu')
		getThemeThumb(v).appendTo(th);
	});
	if(view.themes.length > 1)
		$('#theme_options').show();
}

function getThemeThumb(theme, w, h){
	var tt = $('<div />').addClass('ez-theme-thumb');
	$.each(theme.colors, function(k1,v1){
		if(k1 < 5)
			$('<div />').addClass('ez-theme-thumb-color').css('background-color' , '#' + v1).appendTo(tt);
	})
	return tt ;
	
}

function getCanvasX() {
	return findPos($('#canvas')[0])[0] ;
}
function getCanvasY() {
	return findPos($('#canvas')[0])[1] ;
}

function updatePlaceholders() {
	return ; // Disabled since there is no drag-n-drop feature in Easy 2.0 currently
	
	$('#droppable_layers').empty() ; 

	$('#droppable_layers').droppable('destroy') ; 

	for (i in view.jdesign.canvases[view.currentPage].images){
		var im = view.jdesign.canvases[view.currentPage].images[i] ;
		if (typeof im.placeholder != 'undefined' && im.placeholder != false){
			
			// Ignore placeholder with set one-time-drop attribute that are already used
			if (im.oneTimeDrop == false || im.invisible == false || typeof im.invisible == 'undefined' || typeof im.oneTimeDrop == 'undefined' ) {
				$('<div />').addClass('drop-mask')
						.attr('id' , 'droppable_'+im.name)
						.cssLeft(im.left * view.dpi)
						.cssTop(im.top * view.dpi)
						.cssWidth(im.width * view.dpi)
						.cssHeight(im.height * view.dpi)
						.css('z-index' ,  im.zindex )
						.addClass(im.placeholder)
						.appendTo('#droppable_layers')
						.droppable({
								drop: placeDroppedImage ,
								over: function() {$(this).addClass('over')} ,
								out: function() {$(this).removeClass('over')}
						})

			}
		}
	}

	if (view.jdesign.canvases[view.currentPage].droppable) {
		$('#droppable_layers')
				.droppable({
						drop: placeDroppedImage
				});
	}
}


function addShapeToDesign(shape_type) {
	var jShape = {
		"zindex": 299 ,
		"fixedratio" : false , 
		"noselect" : false ,
		"noresize" : false ,
		"border_width" : 2 ,
		"border_color" : "797979" ,
		"fill_color" : "fdf6bb" ,
		"border_stroke" : "solid"
	}
	jShape.shape_type = shape_type ;
	jShape.name = "shape_" + Math.floor(Math.random() * 100000 ) ;
	jShape.width = jShape.height = Math.min(view.jdesign.canvases[view.currentPage].width, view.jdesign.canvases[view.currentPage].height) / 3 ;

	if (shape_type == 'hline')
		jShape.height = jShape.width / 4 ;
	else if (shape_type == 'vline')
		jShape.width = jShape.height / 4 ;
		
	jShape.left = (view.jdesign.canvases[view.currentPage].width - jShape.width) / 2 ,
	jShape.top = (view.jdesign.canvases[view.currentPage].height - jShape.height) / 2 ,
	
	view.jdesign.canvases[view.currentPage].images.push(JSON.clone(jShape)) ; 
	drawImageElement(jShape) ;
	deselectAll();
	$('#outline_img_' + jShape.name).mousedown();
	$('#outline_img_' + jShape.name).mouseup();

	arrangeImageZees() ;
	pushState() ; 
}


function deleteImageElementByName(name, restore_placeholder) {
	var element_index = getElementIndex(view.jdesign.canvases[view.currentPage].images, "name" , name ) ;

	if (typeof element_index != "number")
		return ;
	
	$('#img_'+name).remove() ; 
	$('#outline_img_'+name).remove() ; 
	view.jdesign.canvases[view.currentPage].images.splice(element_index, 1) ;
	delete view.userImages[name] ;
	

	// When a dropped image is deleted the corresponding placeholder will become visible again if available
	if(restore_placeholder && name.search(/^user_/) == 0){
			var parentPlaceHolder = getElem('img_' + name.split('user_')[1]) ;
			if (parentPlaceHolder){
				parentPlaceHolder.invisible = false ;
				drawImageElement(parentPlaceHolder) ; 
			}
			// If there has been an admin image in the placeholder, it will be restored
			var parentPlaceHolderAdminImage = getElem('img_admin_' + name.split('user_')[1]) ;
			if (parentPlaceHolderAdminImage){
				parentPlaceHolderAdminImage.invisible = false ;
				drawImageElement(parentPlaceHolderAdminImage) ; 
			}
	}
	
	// When a placeholder is deleted the corresponsing admin image will also be deleted if available
	deleteImageElementByName("admin_"+name) ; 

	updateStockImagePrices(); 
}

function createBleedMask() {
	//alert('createBleedMask');
	var jdesign = view.jdesign ;
	var page = view.currentPage ;
	/*
	var link1 = '/ajax/bitmap/getGridLines.php?'
										+'width=' + jdesign.canvases[page].width 
										+'&height=' + jdesign.canvases[page].height 
										+'&dpi=' + view.dpi
										+'&page='+page
										+'&type=minor'
										+'&bleed=' + products[jdesign.product].bleed;
	*/
	var link1 = 'images/design/getGridLines.png';										
	// ------------------------------ Creating grid lines --------------------------------
	if((view.dpi * 0.25) >= 10){
		$('<div />').addClass('grid-area-mask')
					.addClass('grid-mask')
					.css('background' , 'url(/'+ link1
										+ ')'  )
					.css('opacity' , .4) 
					.appendTo('#mask_layers') ;		
	}
	/*
	link1 = 'ajax/bitmap/getGridLines.php?'
									+'width=' + jdesign.canvases[page].width 
									+'&height=' + jdesign.canvases[page].height 
									+'&dpi=' + view.dpi
									+'&page='+page
									+'&type=major'
									+'&bleed=' + products[jdesign.product].bleed;
	*/
	link1 = 'images/design/getGridLines1.png';										
	$('<div />').addClass('grid-area-mask')
				.addClass('grid-mask')
				.css('background' , 'url(/'+link1
									+ ')'  )
				.appendTo('#mask_layers') ;					
					
	if(typeof jdesign.wrap_size != 'undefined' && jdesign.wrap_size > 0){
		createWrapMask();
		return;		
	}	
	// ----------------------------- Creating the bleed mask --------------------------------

	if (! jdesign.dieCutType || jdesign.dieCutType == 'none') {
		
		$('<div />').addClass('bleed-area-mask')
					.addClass('opacity50') 
					.css('width' , '100%')
					.css('height' , '100%')
					.css('border-width' , Math.round(jdesign.canvases[page].bleed * view.dpi) + 'px' )
					.css('border-color' , '#FFF')
					.css('border-style' , 'solid')
					.css('z-index' , 100)
					.appendTo('#mask_layers') ;
	
		$('<div />').addClass('bleed-area-mask')
					.css('width' , '100%')
					.css('height' , '100%')
					.css('border' , '1px solid gray' )
					.css('z-index' , 101)
					.appendTo('#mask_layers') ;
	
		$('<div />').addClass('bleed-area-mask')
					.cssWidth( (jdesign.canvases[page].width - jdesign.canvases[page].bleed *2 ) * view.dpi )
					.cssHeight( (jdesign.canvases[page].height - jdesign.canvases[page].bleed *2 ) * view.dpi)
					.css('margin' ,  Math.round(jdesign.canvases[page].bleed  * view.dpi) + 'px' )
					.css('border' , '1px dashed red' )
					.css('z-index' , 101)
					.appendTo('#mask_layers') ;
					
		$('<img />').addClass('bleed-area-mask')
					.attr('src' , 'images/scissors.png')
					.css('position' , 'absolute')
					.css('z-index' , 110)
					.cssTop(Math.round(jdesign.canvases[page].bleed  * view.dpi) - 15)
					.css('left' , '20%')
					.appendTo('#mask_layers')
					.hide();


		
		// -------------------------- Masks NO BLEED AREA --------------------------------
		
		$('<div />').addClass('no-bleed-area-mask canvas-shadow')
					.cssWidth( (jdesign.canvases[page].width - 2 * jdesign.canvases[page].bleed ) * view.dpi )
					.cssHeight( (jdesign.canvases[page].height - 2 * jdesign.canvases[page].bleed ) * view.dpi )
					.css('border' , '1px solid gray' )
					.css('margin' , Math.round(jdesign.canvases[page].bleed * view.dpi) + 'px' )
					.css('z-index' , 101)
					.appendTo('#mask_layers') ;
											
		$('<div />').addClass('no-bleed-area-mask')
					.css('width' ,'100%')
					.css('height' , '100%')
					.css('border-color' ,  $('body').css('background-color'))
					.css('border-style' , 'solid')
					.css('border-width' , Math.round(jdesign.canvases[page].bleed * view.dpi) + 'px' )
					.css('z-index' , 100)
					.appendTo('#mask_layers') ;								
	
	}
	// die-cut exist 
	
	
	else {
		link1 = 'getDieCutMask.php?'
										+'width=' + (jdesign.canvases[page].width - jdesign.canvases[page].bleed * 2) 
										+'&height=' + (jdesign.canvases[page].height - jdesign.canvases[page].bleed * 2) 
										+'&dpi=' + view.dpi
										+'&bleed=' + jdesign.canvases[page].bleed
										+'&dieCutType=' + jdesign.dieCutType
										+'&showBleed=0'
										+'&page='+page;
		alert('A: '+link1);
		$('<div />').addClass('no-bleed-area-mask')
					.css('width' , '100%')
					.css('height' , '100%')
					.css('background' , 'url('+link1 
										+ ')'  )
					.appendTo('#mask_layers') ;
					
		$('<div />').addClass('bleed-area-mask')
					.css('width' , '100%')
					.css('height' , '100%')
					.css('border' , '1px solid gray' )
					.css('z-index' , 101)
					.appendTo('#mask_layers') ;								
link1 = 'getDieCutMask.php?'
										+'width=' + (jdesign.canvases[page].width - jdesign.canvases[page].bleed * 2) 
										+'&height=' + (jdesign.canvases[page].height - jdesign.canvases[page].bleed * 2) 
										+'&dpi=' + view.dpi
										+'&bleed=' + jdesign.canvases[page].bleed
										+'&dieCutType=' + jdesign.dieCutType
										+'&showBleed=1' 
										+'&page='+page;
alert('B: '+link1);										
		$('<div />').addClass('bleed-area-mask')
					.css('width' , '100%')
					.css('height' , '100%')
					.css('background' , 'url('+link1
										+ ')'  )
					.appendTo('#mask_layers') ;

		$('<img />').addClass('bleed-area-mask')
					.attr('src' , 'images/scissors.png')
					.css('position' , 'absolute')
					.css('z-index' , 110)

					.cssTop(Math.round(jdesign.canvases[page].bleed  * view.dpi) - 12)
					.css('left' , '45%')
					.appendTo('#mask_layers')
					.hide();					
					
	}
	link1 = '/ajax/image/getShape.php?shape_type=circle&dpi='+view.dpi+'&width=1.35&height=1.35&border_width=1&border_color=777777&fill_color=F1F2F2&border_stroke=solid';
	//alert(link1);
	link1= 'images/design/getShape.png';
	if(jdesign.product == 'doorHanger'){
			$('<img />')
					.attr('src' , link1)
					.css('position' , 'absolute')
					.css('z-index' , 120)
					.cssTop(0.5 * view.dpi)
					.cssLeft( (jdesign.canvases[page].width - 1.35)  / 2  * view.dpi)
					.appendTo('#mask_layers');
		
	}
	// ------------------------------ Creating panel mask labels --------------------------------
/*	
	$('<div />').addClass('bleed-area-mask')
			.addClass('panel-mask')
			.cssWidth(jdesign.canvases[page].width * view.dpi + 2 * view.labelSize )
			.cssHeight(jdesign.canvases[page].height * view.dpi + 2 * view.labelSize)				
			.cssLeft(- view.labelSize)
			.cssTop(- view.labelSize)
			.css('background' , 'url(/ajax/bitmap/getPanelMask.php?'
								+'width=' + jdesign.canvases[page].width 
								+'&height=' + jdesign.canvases[page].height 
								+'&dpi=' + view.dpi
								+'&folding=' + jdesign.folding
								+'&productType=' + jdesign.product
								+'&page='+page
								+'&bleed=' + products[jdesign.product].bleed
								+ ')'  )
			.appendTo('#mask_layers') ;	
*/			
}

function createSafeZoneMask() {

	var jdesign = view.jdesign ;
	var page = view.currentPage ;
	var panel_count, ver_panel_count, hor_panel_count;
	if(typeof jdesign.wrap_size  != 'undefined' && jdesign.wrap_size > 0) return;
	if(jdesign.canvases[page].bleed == 0) return ;
	if (typeof jdesign.dieCutType === 'undefined' || jdesign.dieCutType == '' || jdesign.dieCutType == 'none'  )  {
	
		if (typeof view.jdesign.folding === 'undefined' || view.jdesign.folding == 'none' || view.jdesign.folding == '' ) 
			panel_count = 1 ;
		else if (view.jdesign.folding == 'halfFold' ) {
			if(view.jdesign.product == "foldedGreetingCard")
				panel_count = 1 ;
			else
				panel_count = 2 ;
		}
		else if (view.jdesign.folding == 'zFold' || view.jdesign.folding == 'triFold' || view.jdesign.folding == 'letterFold')	
			panel_count = 3 ;
		else if (view.jdesign.folding == 'accordionFold' || view.jdesign.folding == 'rollFold' ) 
			panel_count = 4 ;
		
		if (typeof view.jdesign.foldingDirection === 'undefined' || view.jdesign.foldingDirection == 'vertical' || view.jdesign.foldingDirection == '' ) {
			ver_panel_count = panel_count ; 
			hor_panel_count = 1 ;
		} else if (view.jdesign.foldingDirection == 'horizontal') {
			hor_panel_count = panel_count ; 
			ver_panel_count = 1 ;
		}

 		var panel_width = (jdesign.canvases[page].width - (4 + (ver_panel_count - 1) * 2 ) * jdesign.canvases[page].bleed) / ver_panel_count  ;
		var panel_height = (jdesign.canvases[page].height - (4 + (hor_panel_count -1) * 2 ) * jdesign.canvases[page].bleed) /  hor_panel_count  ;
	
	
		for (v = 1 ; v <= ver_panel_count ; v++ ){
			for (h = 1 ; h <= hor_panel_count ; h++ ){
				$('<div />').addClass('safe-zone-mask dashed')
							.cssWidth(panel_width * view.dpi)
							.cssHeight(panel_height * view.dpi)
							.cssLeft( ( 2 * v  * jdesign.canvases[page].bleed + (v - 1 ) * panel_width) * view.dpi )
							.cssTop( ( 2 * h  * jdesign.canvases[page].bleed + (h - 1 ) * panel_height) * view.dpi )
							.appendTo('#mask_layers') ;

				$('<div />').addClass('safe-zone-mask solid')
							.cssWidth(panel_width * view.dpi)
							.cssHeight(panel_height * view.dpi)
							.cssLeft( ( 2 * v  * jdesign.canvases[page].bleed + (v - 1 ) * panel_width) * view.dpi )
							.cssTop( ( 2 * h  * jdesign.canvases[page].bleed + (h - 1 ) * panel_height) * view.dpi )
							.appendTo('#mask_layers') ;
			}
		}
		/*
		$('<img />').addClass('safe-zone-mask')
					.attr('src' , '/images/easy/safezonealert.png')
					.cssRight((jdesign.canvases[page].width - jdesign.canvases[page].bleed * 2) * view.dpi )
					.cssTop(jdesign.canvases[page].bleed * 4 * view.dpi )
					.appendTo('#mask_layers') ;
		*/				
		if (ver_panel_count > 1)
			for (v = 1 ; v < ver_panel_count ; v++)
					$('<div />').addClass('folding-line-ver')
							.cssLeft( ( (2 * v + 1) * jdesign.canvases[page].bleed + v * panel_width ) * view.dpi )
							.appendTo('#mask_layers') ;

		if (hor_panel_count > 1)
			for (h = 1 ; h < hor_panel_count ; h++)
					$('<div />').addClass('folding-line-hor')
							.cssTop( ( (2 * h + 1) * jdesign.canvases[page].bleed + h * panel_height ) * view.dpi )
							.appendTo('#mask_layers') ;

	
	} else {
		$('<div />').addClass('safe-zone-mask')
					.css('width' , '100%')
					.css('height' , '100%')
					.css('background' , 'url(getDieCutSafeZone.php?' + 
														'width=' + (jdesign.canvases[page].width - 2 * jdesign.canvases[page].bleed)
														+'&height=' + (jdesign.canvases[page].height - 2 * jdesign.canvases[page].bleed)
														+'&dpi=' + view.dpi
														+'&bleed=' + jdesign.canvases[page].bleed
														+'&dieCutType=' + jdesign.dieCutType
														+'&page=' + page
														+ ')'  )
					.appendTo('#mask_layers') ;
	}

}

function createWrapMask(){
	var wrapWidth = view.jdesign.wrap_size * 1 ;
	var width = view.jdesign.canvases[view.currentPage].width * 1 ;
	var height = view.jdesign.canvases[view.currentPage].height * 1;
	var bleed = view.jdesign.canvases[view.currentPage].bleed * 1;

	$('.canvas-wrap-mask').remove();
	$('<div />').addClass('bleed-area-mask canvas-wrap-mask')
					.cssWidth((width - 2 * wrapWidth) * view.dpi - 1)
					.cssHeight(wrapWidth * view.dpi)
					.cssLeft(wrapWidth * view.dpi)
					.cssTop(0)
					.appendTo('#mask_layers') ;

	$('<div />').addClass('bleed-area-mask canvas-wrap-mask')
					.cssWidth((width - 2 * wrapWidth) * view.dpi - 1)
					.cssHeight(wrapWidth * view.dpi)
					.cssLeft(wrapWidth * view.dpi)
					.cssBottom(0)
					.appendTo('#mask_layers') ;

	$('<div />').addClass('bleed-area-mask canvas-wrap-mask')
					.cssWidth(wrapWidth * view.dpi)
					.cssHeight((height - 2 * wrapWidth) * view.dpi - 1)
					.cssLeft(0)
					.cssTop(wrapWidth * view.dpi)
					.appendTo('#mask_layers') ;

	$('<div />').addClass('bleed-area-mask canvas-wrap-mask')
					.cssWidth(wrapWidth * view.dpi)
					.cssHeight((height - 2 * wrapWidth) * view.dpi - 1)
					.cssRight(0)
					.cssTop(wrapWidth * view.dpi)
					.appendTo('#mask_layers') ;

	if (view.jdesign.wrap_color == 'transparent')
		$('.canvas-wrap-mask').addClass('gallery-wrap');
	else {
		$('.canvas-wrap-mask').removeClass('gallery-wrap');
		$('.canvas-wrap-mask').addClass('museum-wrap');
		$('.canvas-wrap-mask').css('background-color' , '#' + view.jdesign.wrap_color);
	}
// ---- 4 corners ----- //
		$('<div />').addClass('bleed-area-mask')
					.cssWidth(wrapWidth * view.dpi )
					.cssHeight(wrapWidth * view.dpi )
					.cssLeft(0)
					.cssTop(0)
					.css('z-index' , 102)
					.css('background-color' , '#eee')
					.appendTo('#mask_layers') ;

		$('<div />').addClass('bleed-area-mask')
					.cssWidth(wrapWidth * view.dpi)
					.cssHeight(wrapWidth * view.dpi)
					.cssRight(0)
					.cssTop(0)
					.css('z-index' , 103)
					.css('background-color' , '#eee')
					.appendTo('#mask_layers') ;

		$('<div />').addClass('bleed-area-mask')
					.cssWidth(wrapWidth * view.dpi )
					.cssHeight(wrapWidth * view.dpi )
					.cssLeft(0)
					.cssBottom(0)
					.css('z-index' , 104)
					.css('background-color' , '#eee')
					.appendTo('#mask_layers') ;

		$('<div />').addClass('bleed-area-mask')
					.cssWidth(wrapWidth * view.dpi )
					.cssHeight(wrapWidth * view.dpi )
					.cssRight(0)
					.cssBottom(0)
					.css('z-index' , 105)
					.css('background-color' , '#eee')
					.appendTo('#mask_layers') ;

}

function showLoading() {
	var isComplete = true ; 
	$("#image_layers img , #text_layers img , #mask_layers img").each(function () {isComplete = isComplete && this.complete; }) ; 
	for (i in tempTextImages){
		isComplete = isComplete && tempTextImages[i].complete ;
	}

	if (isComplete){
		$('#loading').hide() ; 
	}
	else {
		$('#loading').show() ; 
		view.loadingTimer = window.setTimeout("showLoading()" , 50) ;
	}
}

function getMockupSrc(jimage) {

	var url;
	if (typeof jimage.image_id != 'undefined' ){
		if(typeof jimage.svg_id != 'undefined' && jimage.svg_id != null)
			url = "/ajax/image/getSvg.php"+"?svg_id="+jimage.svg_id+"&rotation="+jimage.rotation+"&colors="+jimage.svg_colors.join(',').replace(/#[0-9]/ig , '') ;
		else 
			url = "get_mockup.php"+"?image_id="+jimage.image_id+"&rotation="+jimage.rotation ;
	}
	else if (typeof jimage.shape_type != 'undefined')
		url = "get_shape.php"+
					"?shape_type="+jimage.shape_type +
					"&dpi="+view.dpi+
					"&width="+jimage.width+
					"&height="+jimage.height +
					"&border_width="+jimage.border_width + 
					"&border_color="+jimage.border_color.split('#')[0] +
					"&fill_color="+jimage.fill_color.split('#')[0] +
					"&border_stroke="+jimage.border_stroke ;

	//var url = 'images/design/getMockup.png';
    //alert(url);
	return url;
}

function updateJdesign() {
//	console.log('updateJdesign',view.outdatedJdesign);
	if(! view.outdatedJdesign) return;
	view.outdatedJdesign = false ;
	
	$('#text_layers img').each(function() {
			jtext = getElem($(this).attr('id')); 
			jtext.left = Math.round ($(this).cssLeft() /view.dpi * 1000 ) / 1000  ;
			jtext.top = Math.round ($(this).cssTop() /view.dpi * 1000 ) / 1000  ;
			
			// update the text if the width is changed after mouse release
			if (Math.abs(jtext.width * view.dpi - $('#outline_'+$(this).attr('id')).cssWidth())  > 1 || Math.abs(jtext.height * view.dpi - $('#outline_'+$(this).attr('id')).cssHeight()) > 1 )
			{
				jtext.width = Math.round ( $('#outline_'+$(this).attr('id')).cssWidth()  / view.dpi * 1000 ) / 1000  ;
				jtext.height = Math.round ( $('#outline_'+$(this).attr('id')).cssHeight()  / view.dpi * 1000 ) / 1000  ;				
				updateTextElement('txt_'+jtext.name) ; 
			}				
			
	}) ; 
	
	$('#image_layers .image-mask , #overlay_layers .image-mask').each(function(i) {
			
			var jimage = getElem($(this).attr('id')) ; 
			var outline = $('#outline_img_' + jimage.name);
			var inner = $('#inner_img_' + jimage.name);

			jimage.left = 1 * (outline.cssLeft() / view.dpi).toFixed(3) ;
			jimage.top = 1 * (outline.cssTop() / view.dpi).toFixed(3) ;
			jimage.width = 1 * (outline.cssWidth() / view.dpi).toFixed(3) ;
			jimage.height = 1 * (outline.cssHeight() / view.dpi).toFixed(3) ;
			
			var newCropWidth = 1 * (outline.cssWidth() / inner.cssWidth()).toFixed(4);
			var newCropHeight = 1 * (outline.cssHeight() / inner.cssHeight() ).toFixed(4);

			if (newCropWidth  !=1 || newCropHeight != 1){
				jimage.crop = true ;
				jimage.cropWidth = newCropWidth ;
				jimage.cropHeight = newCropHeight ;
				jimage.cropTop = -1 * (inner.cssTop() / inner.cssHeight()).toFixed(4);
				jimage.cropLeft = -1 * (inner.cssLeft() / inner.cssWidth()).toFixed(4) ;
			} 
			else {
				jimage.crop = false ;
				delete jimage.cropWidth ;
				delete jimage.cropHeight ;
				delete jimage.cropLeft ;
				delete jimage.cropTop ;

			}

			updateFotoliaLicense(jimage);

			var resAlert = outline.find('.resolution-notice') ;
			if (resAlert.length > 0) {
				resAlert.cssTop(Math.max (-1 * outline.cssTop() , 5) ) ; 
				resAlert.cssRight(Math.max ( outline.cssLeft() + outline.cssWidth() - $('#canvas').cssWidth() , 5) ) ; 
			}
			
//			stockImagePrice = outline.find('.stock-image-price-outline') ;
//			stockImagePrice.cssTop(Math.max (-1 * outline.cssTop() , -8 ) ) ; 
//			stockImagePrice.cssLeft(Math.max (-1 * outline.cssLeft() + 40 , outline.cssWidth() / 2 - 10 ) ) ; 
//			outline.find('.stock-image-thumb-info').cssTop(Math.max (-1 * outline.cssTop() , -8 ) ).cssLeft(outline.cssWidth() / 2 + 20) ;

	}) ; 
	updateStockImagePrices();
	deleteOffCanvasElements() ; 	
	pushState() ;
	updateToolbar() ; 
}

function updateSnapPoints(){
	var cn = view.jdesign.canvases[view.currentPage] ;
	view.snapX = [0 , cn.bleed * 2 * view.dpi , (cn.width - cn.bleed * 2) * view.dpi , cn.width * view.dpi ] ;
	view.snapY = [0 , 0.25 * view.dpi , (cn.height - cn.bleed * 2) * view.dpi , cn.height * view.dpi ] ;
	$('.outline2').not('.selected').each(function(){
		view.snapX.push($(this).cssLeft()) ;
		view.snapX.push($(this).cssLeft() + $(this).cssWidth()) ;
	});
	$('.outline2').not('.selected').each(function(){
		view.snapY.push($(this).cssTop()) ;
		view.snapY.push($(this).cssTop() + $(this).cssHeight()) ;
	});
}
function deleteOffCanvasElements() {
	var toBeDeletedImages = [];
	var toBeDeletedTexts = [];

	var cnv = view.jdesign.canvases[view.currentPage] ;

	for (i in cnv.images){
		var im = cnv.images[i] ;
		if (im.top + im.height < cnv.bleed || im.left + im.width < cnv.bleed || im.left > cnv.width - cnv.bleed || im.top  > cnv.height - cnv.bleed)
			toBeDeletedImages.push(im.name) ;
	}

	for (i in toBeDeletedImages)
		deleteImageElementByName(toBeDeletedImages[i] , false) ; 

	for (i in view.jdesign.canvases[view.currentPage].texts){
		var im = cnv.texts[i] ;
		if (im.top + im.height < cnv.bleed || im.left + im.width < cnv.bleed || im.left > cnv.width - cnv.bleed || im.top  > cnv.height - cnv.bleed) {
			toBeDeletedTexts.push(im.name) ;
		}
	}

	for (i in toBeDeletedTexts)
		deleteTextElementByName(toBeDeletedTexts[i]) ; 

		
}

/* -----When a resize handle is pressed, this registers the resize direction and put the elements in resizing mode ------- */
function triggerResizing(e){	
	ie8SafePreventEvent(e) ; 
	stopPropag(e);
	
	if ($(this).parent().hasClass('non-resizable'))
		return ;
	
	$('.grabbed').removeClass('grabbed') ; 
	$('.qcrop').removeClass('qcrop') ; 

	$('.selected').removeClass('selected') ; 

	$(this).parent().addClass('selected resizing');  
	
	view.resizing = true ;
	
	resize = {} ; 
	
	resize.startX = e.pageX ;
	resize.startY = e.pageY ;

	resize.minW = 20 ; 
	resize.minH = 20 ; 
	
	resize.dir = $(this).attr('class').match(/handle-[a-z]+/)[0].split('-')[1] ;
	resize.outline = $(this).closest('.outline2');
	resize.free = resize.outline.hasClass('text') || resize.outline.hasClass('croppable') ;

	resize.fixedRatio = resize.outline.hasClass('fixed-ratio') ; 
	if (resize.outline.hasClass('croppable')){
		resize.type = 'crop2' ;
		resize.fixedRatio = false ;
		$('#'+resize.outline.attr('id').split('outline_')[1]).addClass('crop');
		var inner = $('#inner_'+resize.outline.attr('id').split('outline_')[1]);
		resize.newW = resize.initialW = resize.outline.cssWidth() ;
		resize.newH = resize.initialH = resize.outline.cssHeight(); 
		resize.newT = resize.initialT = resize.outline.cssTop(); 
		resize.newL = resize.initialL = resize.outline.cssLeft() ; 

		resize.minT = resize.initialT + inner.cssTop() ; 
		resize.minL = resize.initialL +  inner.cssLeft() ; 
		resize.maxR = resize.minL + inner.cssWidth();
		resize.maxB = resize.minT + inner.cssHeight();
	}

	else {	
		resize.minT = - Number.MAX_VALUE ; 
		resize.minL = - Number.MAX_VALUE ; 
		resize.maxR = Number.MAX_VALUE ; 
		resize.maxB = Number.MAX_VALUE ; 

		resize.type = 'resize' ;
		resize.jel =  getElem(resize.outline.attr('id').split('outline_')[1]) ; 
		if (typeof resize.jel.image_id != 'undefined')
			resize.elType = 'img' ;
		else if (typeof resize.jel.body != 'undefined' || typeof resize.jel.preset_text != 'undefined')
			resize.elType = 'txt' ;
		else if (typeof resize.jel.shape_type != 'undefined' )
			resize.elType = 'shape' ;


		resize.el = $('#' + resize.outline.attr('id').split('outline_')[1] ) ;
		resize.inner = resize.el.find('img');
		resize.newW = resize.initialW = resize.jel.width * view.dpi ; 

		if(resize.elType != 'txt')
			resize.newH = resize.initialH = resize.jel.height * view.dpi ; 
		else 
			resize.newH = resize.initialH = resize.outline.cssHeight() ; 
			
		resize.newT = resize.initialT = resize.jel.top * view.dpi ; 
		resize.newL = resize.initialL = resize.jel.left * view.dpi ; 
		resize.ratio = resize.initialW / resize.initialH ;
	}
	

	if (resize.elType == 'txt')
		resize.fixedRatio = false ; 
		
	$('.outline2').css("cursor" , resize.dir + "-resize") ; 

}


function resizeElement(e){
 	$('.float-toolbar').hide();

	var resizeX = e.pageX - resize.startX ;
	var resizeY = e.pageY  - resize.startY ;
	view.outdatedJdesign = true ;
	// corner resizes are always proportional
	if(resize.dir == 'ne' || resize.dir == 'nw' || resize.dir == 'sw' || resize.dir == 'se' ){
		if(resize.free) {
			if(resize.dir == 'ne'){
				resize.newW = Math.min(resize.initialW + resizeX, resize.maxR - resize.initialL) ; 
				resize.newH = Math.min(resize.initialH - resizeY, resize.initialT - resize.minT + resize.initialH ) ; 
				resize.newW = Math.max(resize.newW, resize.minW);
				resize.newH = Math.max(resize.newH, resize.minH);
		
				resize.newL = resize.initialL ;
				resize.newT = resize.initialT + (resize.initialH - resize.newH) ;
			}
			else if(resize.dir == 'nw'){

				resize.newW = Math.min(resize.initialW - resizeX, resize.initialL - resize.minL + resize.initialW) ; 
				
				resize.newH = Math.min(resize.initialH - resizeY, resize.initialT - resize.minT + resize.initialH ) ; 
				resize.newW = Math.max(resize.newW, resize.minW);
				resize.newH = Math.max(resize.newH, resize.minH);
		
				resize.newL = resize.initialL + resize.initialW - resize.newW;
				resize.newT = resize.initialT + resize.initialH - resize.newH ;
			}
			else if(resize.dir == 'sw'){
				resize.newW = Math.min(resize.initialW - resizeX, resize.initialL - resize.minL + resize.initialW) ; 
				resize.newH = Math.min(resize.initialH + resizeY, resize.maxB - resize.initialT ) ; 
				resize.newW = Math.max(resize.newW, resize.minW);
				resize.newH = Math.max(resize.newH, resize.minH);
		
				resize.newL = resize.initialL - (resize.newW - resize.initialW);
				resize.newT = resize.initialT ;
			}
		
			else if(resize.dir == 'se'){
				resize.newW = Math.min(resize.initialW + resizeX, resize.maxR - resize.initialL) ; 
				resize.newH = Math.min(resize.initialH + resizeY, resize.maxB - resize.initialT ) ; 
				resize.newW = Math.max(resize.newW, resize.minW);
				resize.newH = Math.max(resize.newH, resize.minH);
		
				resize.newL = resize.initialL ;
				resize.newT = resize.initialT ; 
			}
		}
		else {
			if(resize.dir == 'ne'){
				resize.newW = Math.min(resize.initialW + resizeX, resize.maxR - resize.initialL) ; 
				resize.newW = Math.min(resize.newW, (resize.maxB - resize.minT) * resize.ratio);
				resize.newW = Math.min(resize.newW, (resize.initialH - resize.minT + resize.initialT) * resize.ratio);
				resize.newW = Math.max(resize.newW, resize.minW);
				resize.newH = resize.newW / resize.ratio ;
		
				resize.newL = resize.initialL ;
				resize.newT = resize.initialT + (resize.initialH - resize.newH) ;
			}
			else if(resize.dir == 'nw'){
				resize.newW = Math.min(resize.initialW - resizeX, resize.initialL - resize.minL + resize.initialW) ; 
				resize.newW = Math.min(resize.newW, (resize.initialH - resize.minT + resize.initialT) * resize.ratio);
				resize.newW = Math.max(resize.newW, resize.minW);
				resize.newH = resize.newW / resize.ratio ;
		
				resize.newL = resize.initialL - (resize.newW - resize.initialW);
				resize.newT = resize.initialT + (resize.initialH - resize.newH) ;
			}
			else if(resize.dir == 'sw'){
				resize.newW = Math.min(resize.initialW - resizeX, resize.initialL - resize.minL + resize.initialW) ; 
				resize.newW = Math.min(resize.newW, (resize.maxB - resize.initialT) * resize.ratio);
				resize.newW = Math.max(resize.newW, resize.minW);
				resize.newH = resize.newW / resize.ratio ;
		
				resize.newL = resize.initialL - (resize.newW - resize.initialW);
				resize.newT = resize.initialT ;
			}
		
			else if(resize.dir == 'se'){
				resize.newW = Math.min(resize.initialW + resizeX, resize.maxR - resize.initialL) ; 
				resize.newW = Math.min(resize.newW, (resize.maxB - resize.initialT) * resize.ratio);
				resize.newW = Math.max(resize.newW, resize.minW);
				resize.newH = resize.newW / resize.ratio ;
		
				resize.newL = resize.initialL ;
				resize.newT = resize.initialT ; 
			}
		}
	}


	if(resize.fixedRatio){
		if(resize.dir == 'e'){
			resize.newW = Math.min(resize.initialW + resizeX, resize.maxR - resize.initialL) ; 
			resize.newW = Math.min(resize.newW, (resize.maxB - resize.minT) * resize.ratio);
			resize.newW = Math.max(resize.newW, resize.minW);
			resize.newH = resize.newW / resize.ratio ;
	
			resize.newL = resize.initialL ;
			resize.newT = resize.initialT - (resize.newW - resize.initialW) /2 / resize.ratio;
			resize.newT = Math.max(resize.newT, resize.minT) ;
			resize.newT = Math.min(resize.newT, resize.maxB - resize.newH ) ;
			
		}
	
		else if(resize.dir == 'w'){
			resize.newW = Math.min(resize.initialW - resizeX, resize.initialL + resize.initialW - resize.minL);
			resize.newW = Math.min(resize.newW, (resize.maxB - resize.minT) * resize.ratio);
			resize.newW = Math.max(resize.newW, resize.minW);
			resize.newH = resize.newW / resize.ratio ;
	
			resize.newL = resize.initialL - (resize.newW - resize.initialW);
			resize.newT = resize.initialT - (resize.newW - resize.initialW) / 2 / resize.ratio ;
			resize.newT = Math.max(resize.newT, resize.minT) ;
			resize.newT = Math.min(resize.newT, resize.maxB - resize.newH ) ;
		}
	
		else if(resize.dir == 'n'){
			resize.newH = Math.min(resize.initialH - resizeY , resize.initialT + resize.initialH - resize.minT);
			resize.newH = Math.min(resize.newH, (resize.maxR - resize.minL) / resize.ratio);
			resize.newH = Math.max(resize.newH, resize.minH);
			resize.newW = resize.newH * resize.ratio ;
	
			resize.newT = resize.initialT - (resize.newH - resize.initialH);
			resize.newL = resize.initialL - (resize.newH - resize.initialH) / 2 * resize.ratio ;
			resize.newL = Math.max(resize.newL, resize.minL) ;
			resize.newL = Math.min(resize.newL, resize.maxR - resize.newW) ;
		}
	
		else if(resize.dir == 's'){
			resize.newH = Math.min(resize.initialH + resizeY , resize.maxB - resize.initialT) ; 
			resize.newH = Math.min(resize.newH, (resize.maxR - resize.minL) / resize.ratio);
			resize.newH = Math.max(resize.newH, resize.minH);
			resize.newW = resize.newH * resize.ratio ;
	
			resize.newT = resize.initialT ;
			resize.newL = resize.initialL - (resize.newH - resize.initialH) / 2 * resize.ratio ;
			resize.newL = Math.max(resize.newL, resize.minL) ;
			resize.newL = Math.min(resize.newL, resize.maxR - resize.newW ) ;		
		}

	}
	else {
		if(resize.dir == 'e'){
			resize.newW = Math.min(resize.initialW + resizeX, resize.maxR - resize.initialL) ; 
			resize.newW = Math.max(resize.newW, resize.minW);
	
			resize.newL = resize.initialL ;
			resize.newT = resize.initialT ; 			
		}
	
		else if(resize.dir == 'w'){
			resize.newW = Math.min(resize.initialW - resizeX, resize.initialL + resize.initialW - resize.minL);
			resize.newW = Math.max(resize.newW, resize.minW);
	
			resize.newL = resize.initialL - (resize.newW - resize.initialW);
			resize.newT = resize.initialT ;
		}
	
		else if(resize.dir == 'n'){
			resize.newH = Math.min(resize.initialH - resizeY , resize.initialT + resize.initialH - resize.minT);
			resize.newH = Math.max(resize.newH, resize.minH);
	
			resize.newT = resize.initialT - (resize.newH - resize.initialH);
			resize.newL = resize.initialL ;
		}
	
		else if(resize.dir == 's'){
			resize.newH = Math.min(resize.initialH + resizeY , resize.maxB - resize.initialT) ; 
			resize.newH = Math.max(resize.newH, resize.minH);
	
			resize.newT = resize.initialT ;
			resize.newL = resize.initialL ;
		}
	}
	
	resize.outline.cssLeft(resize.newL) ; 
	resize.outline.cssTop(resize.newT) ; 
	resize.outline.cssWidth(resize.newW) ; 
	resize.outline.cssHeight(resize.newH) ; 
	resize.outline.find('.size-measure.w .value').html((resize.newW / view.dpi).toFixed(2) + '&quot;' );
	resize.outline.find('.size-measure.h .value').html((resize.newH / view.dpi).toFixed(2) + '&quot;' );

	if (resize.type == 'resize') {	
		resize.el.cssLeft(resize.newL) ; 
		resize.el.cssTop(resize.newT) ; 

		var cropWidth = resize.jel.crop ? resize.jel.cropWidth : 1 ;
		var cropHeight = resize.jel.crop ? resize.jel.cropHeight : 1 ;
		var cropTop = resize.jel.crop ? resize.jel.cropTop : 0 ;
		var cropLeft = resize.jel.crop ? resize.jel.cropLeft : 0 ;		

		if(typeof resize.inner != 'undefined' && resize.inner.length > 0){
			resize.inner.cssLeft(- cropLeft * resize.newW / cropWidth);
			resize.inner.cssTop(- cropTop * resize.newH / cropHeight ) ;
			resize.inner.cssWidth(resize.newW / cropWidth);
			resize.inner.cssHeight(resize.newH / cropHeight);
		}
		if (resize.elType != 'txt' ) {
			resize.el.cssWidth(resize.newW).cssHeight(resize.newH) ; 
		}

		if (typeof resize.jel.image_id != 'undefined' && typeof resize.jel.fotoliaId == 'undefined' ){
			checkImageResolution(resize.jel);
		}
	}
	else if(resize.type == 'crop2'){
		var imgMask = $('#' + resize.outline.attr('id').split('outline_')[1]) ;
		var inner = $('#inner_' + resize.outline.attr('id').split('outline_')[1]) ;
		imgMask.cssWidth(resize.newW).cssHeight(resize.newH).cssLeft(resize.newL).cssTop(resize.newT) ; 
		inner.cssLeft( resize.minL - resize.newL);
		inner.cssTop( resize.minT - resize.newT);
		
	}
}



function checkImageResolution(jimage) {
	if(view.imageInfo[jimage.image_id].is_vector || !! jimage.noprint) 
		return ;

	var outline = $('#outline_img_' + jimage.name);
	outline.find('.resolution-notice').remove();
	
	currentWidthPixel = view.imageInfo[jimage.image_id].uploadWidth ;
	outputUncroppedWidthInch = (jimage.rotation % 180 == 0 ?  outline.cssWidth() : outline.cssHeight() ) / view.dpi ;

	if (jimage.crop)
		outputUncroppedWidthInch /= (jimage.rotation % 180 == 0 ? jimage.cropWidth : jimage.cropHeight)  ;
		
	var outputResolution = currentWidthPixel / outputUncroppedWidthInch ;

	
	if (outputResolution < config.warningRes){
		var noticeIcon = $('<div />').addClass('general-icon resolution-notice')
					.css('background-position' , '-1056px 0px')
					.cssTop(Math.max (-1 * outline.cssTop() , 5) ) 
					.cssRight(Math.max ( outline.cssLeft() + outline.cssWidth() - $('#canvas').cssWidth() , 5) )
					.appendTo(outline) ;
		$('<div />').html('This image will look pixelated or blurry when printed due to its low resolution. You may want to resize it smaller to achieve a better result.')
					.css('background-color'  , '#ffd5cf')
					.appendTo(noticeIcon) ;

	}
	else if (outputResolution < config.noticeRes){
		var noticeIcon = $('<div />').addClass('general-icon resolution-notice')
					.css('background-position' , '-1072px 0px')
					.cssTop(Math.max (-1 * outline.cssTop() , 5) )
					.cssRight(Math.max ( outline.cssLeft() + outline.cssWidth() - $('#canvas').cssWidth() , 5) )
					.appendTo(outline) ;
		$('<div />').html('This image may look pixelated or blurry when printed due to its low resolution. You may want to resize it smaller to achieve the best result.')
					.appendTo(noticeIcon) ;
	}


}

function updateFotoliaLicense(jimage) {
	if(! jimage.fotoliaId) return ;
	var currentLicenseIndex = getElementIndex(view.fotoliaLicenses[jimage.fotoliaId] , 'name' , jimage.fotoliaLicense) ;

	if(currentLicenseIndex === false) currentLicenseIndex  = 0 ; // return ;
	
	var currentLicenseWidthPixel = view.fotoliaLicenses[jimage.fotoliaId][currentLicenseIndex].width ;
	var outputUncroppedWidthInch = jimage.rotation % 180 == 0 ?  jimage.width : jimage.height  ;

	if (jimage.crop)
		outputUncroppedWidthInch /= (jimage.rotation % 180 == 0 ? jimage.cropWidth : jimage.cropHeight)  ;
		
	var outputResolution = currentLicenseWidthPixel / outputUncroppedWidthInch ;
	var newLicenseIndex = currentLicenseIndex ;
	
	// increase the license until the resolution hits the critria or there is no bigger license available
	while (outputResolution < config.minFotoliaRes && typeof view.fotoliaLicenses[jimage.fotoliaId][newLicenseIndex + 1] != 'undefined' && view.fotoliaLicenses[jimage.fotoliaId][newLicenseIndex + 1].width * 1 > view.fotoliaLicenses[jimage.fotoliaId][newLicenseIndex].width *1   && view.fotoliaLicenses[jimage.fotoliaId][newLicenseIndex + 1].name != "X" ){
		newLicenseIndex++ ;
		outputResolution = view.fotoliaLicenses[jimage.fotoliaId][newLicenseIndex].width / outputUncroppedWidthInch ;
	}
	
	// decrease the license until the minimum necessary resolution or there is no smaller license available
	while (typeof view.fotoliaLicenses[jimage.fotoliaId][newLicenseIndex-1] != 'undefined' && (view.fotoliaLicenses[jimage.fotoliaId][newLicenseIndex-1].width / outputUncroppedWidthInch >= config.minFotoliaRes || view.fotoliaLicenses[jimage.fotoliaId][newLicenseIndex].name == 'X' )){
		newLicenseIndex-- ;
		outputResolution = view.fotoliaLicenses[jimage.fotoliaId][newLicenseIndex].width / outputUncroppedWidthInch ;
	}

	jimage.fotoliaLicense = view.fotoliaLicenses[jimage.fotoliaId][newLicenseIndex].name ;

}

function updateStockImagePrices() {
	if (typeof view.jdesign == 'undefined')
		return ;

	view.jdesign.stockImages = {} ; 
	for (c in view.jdesign.canvases){
		for(iii in view.jdesign.canvases[c].images){
			var im = view.jdesign.canvases[c].images[iii] ;

			if (typeof im.fotoliaId != 'undefined')	{
				if(typeof view.jdesign.stockImages[im.fotoliaId] == 'undefined') {
					view.jdesign.stockImages[im.fotoliaId] = {} ; 
					view.jdesign.stockImages[im.fotoliaId].fotoliaId = im.fotoliaId ;
					view.jdesign.stockImages[im.fotoliaId].maxLicense = im.fotoliaLicense ;
					view.jdesign.stockImages[im.fotoliaId].assigned = false ;
				}
				
				if(licenseValue(im.fotoliaLicense)  > licenseValue(view.jdesign.stockImages[im.fotoliaId].maxLicense))
					view.jdesign.stockImages[im.fotoliaId].maxLicense = im.fotoliaLicense ;
			}
		}
	}

	var totalStockImagePrice = 0;
	var totalStockImageCount = 0;

	for (c in view.jdesign.canvases){
		for(ii in view.jdesign.canvases[c].images){
			var im = view.jdesign.canvases[c].images[ii] ;

			if (typeof im.fotoliaId != 'undefined'){
				var priceTag = $('#outline_img_' + im.name).find('.stock-image-price-outline') ;
				if (im.fotoliaLicense == view.jdesign.stockImages[im.fotoliaId].maxLicense && ! view.jdesign.stockImages[im.fotoliaId].assigned){
					var price = getStockImagePrice(im.fotoliaId , im.fotoliaLicense) ;
					priceTag.html('$' + price) ;
					view.jdesign.stockImages[im.fotoliaId].assigned = true ;
					totalStockImagePrice +=	price;
					totalStockImageCount++ ;
				}
				else {
					priceTag.html('$0'); 
				}
			}
		}
	}

	$('#admin_stock_image_cost').html('Image Cost: $' + totalStockImagePrice);
	
	$('#status_stock_image_info').empty() ;
	if(totalStockImageCount > 0 && totalStockImagePrice > 0){
		$('#status_stock_image_info').html('Design contains <strong>'+totalStockImageCount+'</strong> stock image'+(totalStockImageCount > 1 ? 's' : '')+'. <strong>$'+totalStockImagePrice * 1 +'</strong> will be added to this order.') ;
		$('<span />').addClass('general-icon').css('background-position' , '-1040px 0px').css('cursor' , 'pointer')
		.appendTo('#status_stock_image_info').click(showStockImageHelp);
	}
}

function showStockImageHelp(){
	$('#gray_box').show() ;
	popup = createPopup('About Stock Images' , 550 ).fadeIn(300) ; 
	content = popup.find('.simple-popup-content').css('margin' , '30px') ; 
	content.html('<h3 style="margin: 10px 0 0 0">Buy it once, use it forever</h3>\
		Price of stock images used in your design will be added to your invoice. Once you pay for a stock image, it is saved to your account and you can use it in future designs free of charge.\
		<h3 style="margin: 20px 0 0 0">Price of a stock image depends on its size</h3>\
		Different sizes of a stock image cost differently. The larger the image, the higher its price. \
		That is why price changes as you resize a stock image.\
		<h3 style="margin: 20px 0 0 0">Watermarks and Resolution</h3>\
		When you add a stock image to your design you see some watermarks over it and \
		the resolution may seem to be low. \
		Upon completing your order, we replace watermarked versions with high-resolution versions \
		and your job will be printed without any watermarks and in high-resolution.');
}
function getStockImagePrice(fotolia_id , license){
	for (i in view.fotoliaLicenses[fotolia_id]){
		if(view.fotoliaLicenses[fotolia_id][i].name == license){
			return view.fotoliaLicenses[fotolia_id][i].price * 1 ;
		}
	}
	return 0 ; 
}
function licenseValue(l){
	switch(l){
		case 'XS':
			return 10;
		case 'S':
			return 20;
		case 'M':
			return 30;
		case 'L':
			return 40;
		case 'XL':
			return 50;
		case 'XXL':
			return 60;
		case 'XXXL':
			return 70;
	}
	return 0;
}
function arrangeImageZees(){
	var zArray = [];

	for (i in view.jdesign.canvases[view.currentPage].images ) {
		zArray.push(view.jdesign.canvases[view.currentPage].images[i].zindex) ;
	}

	zArray.sort(function(a,b) {return a - b});
	var jcanvasClone = JSON.clone(view.jdesign.canvases[view.currentPage]) ; 
	
	var bgIndex = 0 ; 
	var maskIndex = 0 ;
	var regularIndex = 0 ; 
	
	for(j in zArray) {
		elementIndex = getElementIndex(	view.jdesign.canvases[view.currentPage].images , "zindex" ,  zArray[j] * 1  ) ;
		jimageClone =jcanvasClone.images[elementIndex ] ; 
		
		if (jimageClone.type == 'bg') {
			jimageClone.zindex = bgIndex + 100 ;
			bgIndex++ ;
		}
		else if (jimageClone.type == 'mask') {
			jimageClone.zindex = maskIndex + 300 ;
			maskIndex++ ;
		}
		else {
			jimageClone.zindex = regularIndex + 200 ;
			regularIndex++ ;
		}

		$("#outline_img_" + jimageClone.name).css('z-index' , jimageClone.zindex * 1 ) ;
		$("#img_" + jimageClone.name).css('z-index' , jimageClone.zindex * 1 ) ;
	}

	arrangeOutlineZindex() ;
	view.jdesign.canvases[view.currentPage] = jcanvasClone ; 
}


function bringForward() {
	$('.selected').each( function() {
		getElem( $(this).attr('id').split('outline_')[1] ).zindex +=  1.1 ;
		arrangeImageZees() ;
	}) ; 
	pushState();
}

function sendBackward() {
	$('.selected').each( function() {
		getElem( $(this).attr('id').split('outline_')[1] ).zindex -=  1.1 ;
		arrangeImageZees() ;
	}) ; 
	pushState();
}
function sendToBack() {
	$('.selected').each( function() {
		getElem( $(this).attr('id').split('outline_')[1] ).zindex =  0.1 ;
		arrangeImageZees() ;
	}) ; 
	pushState();
}
function bringToFront() {
	$('.selected').each( function() {
		getElem( $(this).attr('id').split('outline_')[1] ).zindex =  500 ;
		arrangeImageZees() ;
	}) ; 
	pushState();
}

function highlight(e) {
	$(this).not('.non-selectable').not('.selected').addClass('highlighted') ; 
}

function lowlight() {
	$(this).removeClass('highlighted') ; 
}

/* ------------ Handles selection / multi-selection of elements upon a (crtl) click/ ------------ */

function selectElement(e) {
//	$('#temp_text').blur();
	ie8SafePreventEvent(e) ; 
	$('.dragged').removeClass('dragged')
	view.initialMousePosX =  e.pageX ; 
	view.initialMousePosY =  e.pageY ; 
	view.mouseDownX = e.pageX ;
	view.mouseDownY = e.pageY ;

	if ($(this).hasClass('fitted')) 
		$(this).addClass('croppable');		

	if ($(this).hasClass('croppable')){
 			$('.selected').removeClass('selected') ; 
			$(this).removeClass('highlighted').addClass('selected').addClass('qcrop');
			if(! $(this).hasClass('fitted'))
				$('#'+$(this).attr('id').split('outline_')[1]).addClass('crop');
	}
	else {
		exitInlineCrop();
		if (! e.ctrlKey && ! e.shiftKey) {    //  Clicking on an elements without holding the CTRL key
			if($(this).hasClass('selected') && ! $(this).hasClass('unmovable')) {
//				$('.selected').not('.unmovable').addClass('grabbed') ;
			}
			else {
				$('.selected').removeClass('selected') ;
				$(this).removeClass('highlighted').addClass('selected') ;			
//				$('.selected').not('.unmovable').addClass('grabbed') ;
			}
		}
	
		else {		//  Clicking on an elements while holding the CTRL key
			stopPropag(e);
			view.alignToolAutoOpen = true ;
			if($(this).hasClass('selected')) 
			{	
				$(this).removeClass('selected') ;
			}
			else {
				//stopPropag(e);
				//view.alignToolAutoOpen = true ;
				$(this).removeClass('highlighted').addClass('selected') ;
				$(".selected").not('.unmovable').addClass('grabbed') ;
			}
		}
	}
	// In case the element is non-selectable, it cancels the selection
	if ($(this).hasClass('non-selectable') || $(this).hasClass('locked') ) {
		$(this).removeClass('selected').removeClass('grabbed') ;   
		view.selectorX = e.pageX - getCanvasX() ;
		view.selectorY = e.pageY - getCanvasY() ;
	}
	 if ($(this).hasClass('locked') )
		$(this).addClass('highlighted') ; 

	arrangeOutlineZindex() ;
	updateToolbar() ; 	
	setActiveTextboxPosition() ; 
	updateSnapPoints();


}

function grabElement(e){
	$('.selected').not('.unmovable').addClass('grabbed') ;
}

function createColorPicker(){
	toolbar.colorPicker = $('<div />') ;
	$.each(config.color_palette, function(k,v){
		$('<div />').addClass('color-pick')
					.css('background-color' , '#'+ v )
					.appendTo(toolbar.colorPicker) ;
	})
}

function updateToolbar(){
//	console.log('updateToolbar');
//	$('.ztoolbar').css('z-index', 2500);
	$('.float-toolbar, #textbox_tools').hide() ; // .css('z-index' , 2510);
	if($('.left-textarea:focus').length == 0){
		$('#temp_text').focus();
	}
	$('#btn_top_toolbar_toggle').html( view.showAdvancedToolbar ? 'Hide Options' : 'Show Options');
	if(view.theme_id){
		$('#theme_' + view.theme_id).hide().siblings().show();
	}
	if(user.download_pdf)
		$('#btn_save_pdf').show();

	var o = $('#outline_layers>.selected') ;
	$('.toolbar-button').removeClass('on').removeClass('disabled');
	$('.button-textbox').removeAttr('disabled');
	
	$('.textbox-n-friends').removeClass('active2');
	$('.color-pick').removeClass('on');
	
	if (o.filter('.text').length == 0){
		$('#text_tools_section .toolbar-button').addClass('disabled');
		$('#text_tools_section .button-textbox').attr('disabled' , 'disabled');
	}
		
	if(view.snapEnabled)
		$('#btn_view_snap').addClass('on');

	if(view.zoomLevel >= config.maxZoomLevel) 
		$('#btn_view_zoom_in').addClass('disabled') ;
	
	if(view.zoomLevel <= config.minZoomLevel) 
		$('#btn_view_zoom_out').addClass('disabled') ;
	
	if(view.stateIndex == 0) 
		$('#btn_edit_undo').addClass('disabled') ;
	
	if(view.stateIndex == view.states.length - 1 || view.states.length ==0) 
		$('#btn_edit_redo').addClass('disabled') ;

	if(view.showBleed)
		$('#btn_view_bleed').addClass('on');

	if(view.showGrid)
		$('#btn_view_grid').addClass('on');

	if(view.profileEQ.show_text_panel)
		$('#btn_view_quick_edit').addClass('on');

	if(view.clipboard.length == 0)	
		$('#btn_edit_paste').addClass('disabled') ;
		
	if(o.length == 0)
		$('#btn_edit_delete').addClass('disabled') ;

	if(o.not('.pholder').length  == 0)
		$('#btn_edit_copy').addClass('disabled') ;

	if(o.length != 1 || o.filter('.image').length != 1)
		$('#btn_advance_crop').addClass('disabled') ;

	if(o.not('.text').not('.pholder').length == 0)
		$('#btn_advance_layers').addClass('disabled');

	if(o.not('.unmovable').length == 0)
		$('#btn_advance_align').addClass('disabled');

	if(o.filter('.text , .image').not('.unmovable').length != 1 || o.length > 1)
		$('#btn_advance_rotate').addClass('disabled');
	
	if(o.length != 1 || o.filter('.image , .shape').not('.pholder').length != 1)
		$('#btn_edit_lock').addClass('disabled');

	var attrs = {"font" : [], "pointsize" : [], "color" : [], "gravity" : [], "bold" : [], "italic" : [] , "fit_to_box" : [] , "bullet_style": []} ;
	o.filter('.text').each(function(){
		var jtext = getElem($(this).attr('id').split('outline_').pop()) ; 

		if ($.inArray(jtext.font, attrs.font) == -1)
			attrs.font.push(jtext.font);

		if ($.inArray(jtext.pointsize, attrs.pointsize) == -1)
			attrs.pointsize.push(jtext.pointsize);

		if ($.inArray(jtext.bold, attrs.bold) == -1)
			attrs.bold.push(jtext.bold);

		if ($.inArray(jtext.italic, attrs.italic) == -1)
			attrs.italic.push(jtext.italic);

		if ($.inArray(jtext.gravity, attrs.gravity) == -1)
			attrs.gravity.push(jtext.gravity);

		if ($.inArray(jtext.color, attrs.color) == -1)
			attrs.color.push(jtext.color);

		if ($.inArray(!! jtext.fit_to_box , attrs.fit_to_box) == -1)
			attrs.fit_to_box.push(!! jtext.fit_to_box );

		if ($.inArray(jtext.bullet_style , attrs.bullet_style) == -1)
			attrs.bullet_style.push(jtext.bullet_style);

		$('#tbox_txt_' + jtext.name).closest('.textbox-n-friends').addClass('active2');
	});
	
	
	var selectedFontFace = attrs.font.length == 1 ? attrs.font[0] : '' ;
	$('#selected_font_face').html(selectedFontFace) ; 
	$('#selected_font_size').val((attrs.pointsize.length == 1 && attrs.fit_to_box.length == 1) ? attrs.pointsize[0] : '') ; 
	$('#selected_font_color').css('background-color' , attrs.color.length == 1 ?  '#'+attrs.color[0].split('#')[0] : '' ) ; 
	$('#btn_text_bold').addClass(attrs.bold.length == 1 && attrs.bold[0] ? 'on' : ''  ) ;
	$('#btn_text_italic').addClass(attrs.italic.length == 1 && attrs.italic[0] ? 'on' : ''  ) ;
	$('#btn_text_gravity_' + attrs.gravity[0]).addClass(attrs.gravity.length == 1 ? 'on' : '');
	if(attrs['bullet_style'].length == 1){
		$('#btn_text_bullet_' + attrs['bullet_style'][0] ).addClass('on').closest('.toolbar-button.has-menu').addClass('on');
		if(attrs['bullet_style'][0] === undefined){
			$('#btn_text_bullet_none, #btn_text_number_none').addClass('on');
		}
	}
	$('#btn_text_bold').addClass( (config.fonts[selectedFontFace] && config.fonts[selectedFontFace].bold === false) ? 'disabled' : '') ;
	$('#btn_text_italic').addClass( (config.fonts[selectedFontFace] && config.fonts[selectedFontFace].italic === false) ? 'disabled' : '') ;

	$.each(attrs.color, function(k,v){
		$('#font_color_menu .color-'+ v.replace('#' , '_')).addClass('on');
	});

	if(attrs.fit_to_box.length == 1 && attrs.fit_to_box[0] === true){
		$('#selected_font_size').val('auto');
		$('#btn_text_auto_fit').addClass('on');
		$('#btn_text_bullet , #btn_text_number').addClass('disabled');
//		$('#text_tools_section .button-textbox').attr('disabled' , 'disabled');
//		$('#btn_text_font_size').addClass('disabled');
	}
		
	if (! view.profileEQ.show_text_panel && o.length == 1 && o.filter('.text').length == 1){
		var tarea = $('#inline_textarea') ;
		var jText = getElem(o.attr('id').split('outline_').pop()) ;
		tarea.val( decodeURIComponent(jText.body ));
		$('#textbox_tools').show();
		$('#textbox_tools_text_title').html( (jText.title.search(/text/i) == -1 ? jText.title+":" : 'Enter Text:'));
		$('#inline_text_name').val(jText.name);
		tarea.cssHeight(18);
		tarea.cssHeight(tarea[0].scrollHeight + 2);
		tarea.removeClass('fit').addClass(jText.fit_to_box ? 'fit' : '');
	}
	else {
		$('#inline_textarea').blur();
		$('#textbox_tools').hide();
	}

	var focusedLeftTextarea = $('.left-textarea:focus');
	if(focusedLeftTextarea.length > 0 && ! $('#' + focusedLeftTextarea.attr('id').replace('tbox_' , 'outline_')).is('.selected') ){
		$('.left-textarea:focus').blur();
	}
	
	if(o.length == 1 && o.filter('.shape').length == 1 && ( o.filter('.pholder').length == 0 || o.filter('.admin').length   == 1) ){
		var el = getElem(o.attr('id').split('outline_')[1]) ;
		if(el.shape_type.search('line') == -1) 
			$('#btn_shape_fill_color').show();
		else
			$('#btn_shape_fill_color').hide();
			
		$('#shape_toolbar').show();
		$('#shape_fill_color_menu .color-'+ el.fill_color.replace('#' , '_')).addClass('on');
		$('#shape_border_color_menu .color-'+ el.border_color.replace('#' , '_')).addClass('on');
		$('#btn_shape_border_color .selected-color').css('background-color' , '#' + el.border_color.split('#')[0]);
		$('#btn_shape_fill_color .selected-color').css('background-color' ,'transparent').css('background-color' , '#' + el.fill_color.split('#')[0]);
	}

	if(o.length == 1 && o.filter('.image').length == 1 && o.filter('.croppable').length == 0 && ( o.filter('.pholder').length == 0 || o.filter('.admin').length  == 1) ){
		var el = getElem(o.attr('id').split('outline_')[1]) ;
		var el_border_color =  el.border_color ? el.border_color : 'transparent' ;
		$('#image_toolbar').show();
		$('#image_border_color_menu .color-'+ el_border_color.replace('#' , '_')).addClass('on');
		$('#btn_image_border_color .selected-color').css('background-color' , 'transparent').css('background-color' , '#' + el_border_color.split('#')[0]);
		$('#svg_colors').empty();
		if(o.hasClass('svg') && (el.svg_colors.length < 8 || user.admin_mode) ){
			$.each(el.svg_colors, function(k,v){
				$('<div />').addClass('selected-color svg-color-item menu-opener').css('background-color' , '#' + v.split('#')[0] ).appendTo('#svg_colors');
			});
		}
	}
	
	if(o.length == 1 && o.filter('.image').length == 1 && o.filter('.croppable').length == 1 ){
		$('#crop_toolbar').show();
	}
	
	$('#bg_color_menu .color-' + view.jdesign.canvases[view.currentPage].bg_color.replace('#' , '_')).addClass('on');
	$('#selected_bg_color').css('background-color' , '#' + view.jdesign.canvases[view.currentPage].bg_color.split('#').shift() );

	if (o.filter('.admin').length == 1 && o.filter('.text').length == 0 && o.length == 1){
		var pos = findPos(o[0]);
		$('#admin_tools').show().cssTop(pos[1] + 20 ).cssLeft(pos[0] + o.cssWidth()) ;
		$('#admin_tools_menu').hide().siblings().show();
		var el = getElem(o.attr('id').split('outline_')[1]) ;
		$('#admin_tools_name').val(el.name);
		$('#admin_tools_ph').val(el.placeholder);
		$('#admin_tools_type').val(el.type);

		$('#admin_tools_width').val(el.width);
		$('#admin_tools_height').val(el.height);
		$('#admin_tools_left').val(el.left);
		$('#admin_tools_top').val(el.top);
		
		$('#admin_tools_noprint').attr('checked' , !! el.noprint ) ; 
		$('#admin_tools_noselect').attr('checked' , !! el.noselect ) ; 
		$('#admin_tools_unmovable').attr('checked' , !! el.unmovable) ; 
		$('#admin_tools_noresize').attr('checked' , !! el.noresize ) ; 
		$('#admin_tools_invisible').attr('checked' , !! el.invisible ) ; 
		$('#admin_tools_uploader').attr('checked' , !! el.uploader) ; 
	}
	
	$('#page_navigation_' + view.currentPage).addClass('on');
	
	$('#info_design_title').html(view.designName);
	$('#info_product_title').html(getProductDesc());
	
	positionToolbars();
}


function updateTextToolbars(){
//	console.log('updateTextToolbars');
	var tarea = $('#inline_textarea') ;
	var o = $('.selected') ;
	if(! view.profileEQ.show_text_panel && o.length == 1 && o.filter('.text').length == 1){
		$('#textbox_tools').show();
		if(o.hasClass('dragged') || user.admin_mode === 1)
			toggleTextboxTool(false);
		else 
			toggleTextboxTool(true);
	}
	else{
		$('#textbox_tools').hide();
	}

}

function toggleTextboxTool(value){
//	console.log('toggleTextboxTool' , value);

	if(typeof value == 'undefined'){
		value = $('#textbox_tools').hasClass('close');
	}
	
	if(value){
		$('#textbox_tools').removeClass('close').addClass('open');
		var tarea = $('#inline_textarea') ;
			
		if(! tarea.is(':focus'))
			tarea.focus()
	
		tarea.cssHeight(18);
		tarea.cssHeight(tarea[0].scrollHeight + 2)
		tarea.cssWidth(200);
	}
	else{
		$('#inline_textarea').blur();
		$('#textbox_tools').addClass('close').removeClass('open');
	}
	positionToolbars();
}

function setActiveTextboxPosition() {
	var o = $('.selected.text');
	if (o.length == 1) {
		var activeTxtbox = $('#tbox_' + o.attr('id').split('outline_').pop()) ;
		$('#text_fields')[0].scrollTop = 0
		var txtboxTop =  activeTxtbox.parent().position().top ; 
		$('#text_fields')[0].scrollTop = $('#text_fields')[0].scrollTop + ( txtboxTop - $('#text_fields').cssHeight() ) - 100 ;
	}
}


/* ---- This function puts the selected outline on top of all other outlines and put it back when it is de-selected ---- */		

function arrangeOutlineZindex() {
	$(".outline2").each(function() {
		if ($(this).hasClass('selected') && $(this).css('z-index') * 1 < 1000 )
			$(this).css('z-index' , $(this).css('z-index') * 1 + 1000)  ;
		if ( ! $(this).hasClass('selected') && $(this).css('z-index') * 1  >= 1000 )
			$(this).css('z-index' , $(this).css('z-index') * 1 % 1000)  ;
	}) ;
}


function dragElement(e) {
	ie8SafePreventEvent(e) ; 
	view.lastMousePosX = e.pageX ; 
	view.lastMousePosY = e.pageY ; 
	var dragX = view.lastMousePosX - view.initialMousePosX ;
	var dragY = view.lastMousePosY - view.initialMousePosY ;

	view.outdatedJdesign = true ;
		
	view.initialMousePosX = view.lastMousePosX ;
	view.initialMousePosY = view.lastMousePosY ;

	var cropEl = $('.qcrop') ;
	if (cropEl.length > 0){
		var inner = $('#' + cropEl.attr('id').replace('outline' , 'inner') ) ;
		var oldLeft = inner.cssLeft() ; 
		var oldTop = inner.cssTop() ;
		var newLeft = oldLeft + dragX ; 
		var newTop = oldTop + dragY  ; 

		inner.cssLeft(Math.max(cropEl.cssWidth() - inner.cssWidth() ,Math.min(newLeft, 0)));
		inner.cssTop(Math.max(cropEl.cssHeight() - inner.cssHeight() ,Math.min(newTop, 0)));
		return;
	};

	var dragX = view.mousePosX - view.mouseDownX ;
	var dragY = view.mousePosY - view.mouseDownY ;
	if(Math.abs(dragX) > config.dragLockMargin ){
		view.dragLockX = false ;
	}
	if(Math.abs(dragY) > config.dragLockMargin){
		view.dragLockY = false ;
	}
	if(view.dragLockX && view.dragLockY)
		return;
	else{
	 	$('.float-toolbar, #textbox_tools').hide();
	}


	$('.safe-zone-mask').show();
	var grabbed = $('.grabbed') ;
	$('.snap-guide').hide();
	grabbed.each(function(){
		$(this).addClass('dragged');
		var elementId = $(this).attr('id').split('outline_').pop() ;
		var el = getElem(elementId);
		var newLeft = el.left * view.dpi  + (view.dragLockX ? 0 : dragX) ;
		var newTop = el.top * view.dpi  + (view.dragLockY ? 0 : dragY) ;
		if(view.snapEnabled && grabbed.length == 1 && ! e.ctrlKey ){
			var currentEl = $(this) ;
			$.each(view.snapX, function(k,v){
				if(Math.abs(v - newLeft) < config.snapMargin ){
					newLeft = v ; 
					$('#snap_guide_x').cssLeft(v).show();
					return false;
				}
				if(Math.abs(v - newLeft - currentEl.cssWidth() ) < config.snapMargin ){
					newLeft = v - currentEl.cssWidth() ; 
					$('#snap_guide_x').cssLeft(v).show();
					return false;
				}

			});
			$.each(view.snapY, function(k,v){
				if(Math.abs(v - newTop) < config.snapMargin ){
					newTop = v ; 
					$('#snap_guide_y').cssTop(v).show();
					return false;
				}
				if(Math.abs(v - newTop - currentEl.cssHeight() ) < config.snapMargin ){
					newTop = v - currentEl.cssHeight() ; 
					$('#snap_guide_y').cssTop(v).show();
					return false;
				}
			});
		}
		$(this).cssLeft(newLeft).cssTop(newTop) ; 
		$('#'+elementId).cssLeft(newLeft).cssTop(newTop);

	});	

}

/* --- This function deletes the selected elements on canvas and their corresponding outlines --- */
function deleteSelectedElements() {
	if ($('.selected').length == 0) return ;
	$(".selected").each(function() {
		var element_id = $(this).attr('id').split('outline_')[1] ;
		var element_name = element_id.substr(4) ;

		if (element_id.split('_').shift() == 'txt') { // if it's a text element
			deleteTextElementByName(element_name) ; 			
		}
		else if (element_id.split('_').shift() == 'img') { // if it's an image element
			deleteImageElementByName(element_name, true) ; 			
		}
		
	}) ;

	view.outdatedJdesign = true ;
	pushState() ;
	updateToolbar();
}

function deleteTextElementByName(name){
	$("#txt_" + name).remove() ; 
	$("#outline_txt_" + name).remove() ; 
	var element_index = getElementIndex(view.jdesign.canvases[view.currentPage].texts , "name" , name )  ;
	view.jdesign.canvases[view.currentPage].texts.splice(element_index, 1) ;
	$('#tbox_txt_' + name).closest('.textbox-n-friends').remove() ; 
}

function createTextbox(jtext) {
	var temp = $('<div />').addClass('textbox-n-friends').appendTo('#text_fields') ;

	if(!! jtext.hide_in_panel)
		temp.hide() ; 

	var wrapper = $('<div />').addClass('tarea-wrapper').appendTo(temp);
	var tarea = $('<textarea />').addClass('left-textarea').attr('id' , 'tbox_txt_' + view.jdesign.canvases[view.currentPage].texts[i].name ).appendTo(wrapper);
	tarea.addClass(jtext.fit_to_box ? 'fit' : '');
	var bodyText = decodeURIComponent(view.jdesign.canvases[view.currentPage].texts[i].body) ;
	var label = $('<div />').addClass('tarea-label').html(jtext.title).click(function(){$(this).siblings('textarea').focus()}).appendTo(wrapper);
	var titleText = view.jdesign.canvases[view.currentPage].texts[i].title ;
	if (bodyText.length > 0){
		tarea.html(bodyText);
		tarea.closest('.tarea-wrapper').removeClass('empty') ; 
	} 
	else {
		tarea.closest('.tarea-wrapper').addClass('empty') ; 
	}

	tarea.keydown(function(e){
		if(e.keyCode == 13 && $(this).hasClass('fit'))
			return false ;

		if($(this).val().length > 0 )
			$(this).closest('.tarea-wrapper').removeClass('empty');
		else
			$(this).closest('.tarea-wrapper').addClass('empty');
	});

	tarea.keyup(function(e) { 
//		stopPropag(e);
		var element_id = $(this).attr('id').split('tbox_').pop() ;
		var jtext = getElem(element_id) ;
		updateTextBody(jtext, $(this).val());
	}) ; 
	
	// When user blur it won't wait for timer to update the text (does it immediately)
	tarea.blur(function() {
		
		
//		var text_id = $(this).attr('id').split('tbox_')[1];
//		var jtext = getElem(text_id) ;
//		$(this).closest('.active2').removeClass('active2') ;
		
//		if (jtext.body.length == 0){
//				$(this).addClass('empty').val(getElem(text_id).title) ;
/*
			if (! jtext.show_preset)
				$('#outline_' + text_id).addClass('non-selectable');
*/
//		}

	}) ; 

	tarea.focus(function(e) {
		selectElement.call(document.getElementById('outline_'+this.id.split('tbox_').pop()), e); 
		$(this).cssHeight(18);
		$(this).cssHeight(tarea[0].scrollHeight + 2);
	}) ; 
	
	//Binding paste cut and copy of browser's context menu
	tarea.bind('paste cut', function() { 
		var el = $(this); 
		setTimeout(function() { 
			$(el).keyup(); 
		}, 100); 
	}); 
	
}

function updateTextElement(element_id) {
	var jtext = getElem(element_id) ; 
	var link1 = '';
	
	if(jtext.pointsize == null || isNaN(jtext.pointsize))
		jtext.pointsize = config.fontSizes[0];
		
	if(typeof jtext.rotation == 'undefined')
		jtext.rotation = 0 ;
		
	var textEl = $('#' + element_id) ; 
	
	textEl.cssTop(jtext.top * view.dpi ) ; 
	textEl.cssLeft(jtext.left * view.dpi ) ; 

	tempTextImages[element_id] = new Image() ;
	tempTextTimestamps[element_id] = (new Date()).getTime(); ;

	$(tempTextImages[element_id]).attr('id' , 'temp_' + element_id) ;
	
	var txtBodyToShow = ((typeof jtext.show_preset == 'undefined' || jtext.show_preset === true ) && jtext.body.length == 0) ? jtext.preset_text : jtext.body ;
	
	if(! jtext.fit_to_box){
		//link1 = 'ajax/text/getText.php?body=' +  txtBodyToShow
		link1 = 'create_text.php?body=' +  txtBodyToShow
								+ '&pointsize=' + jtext.pointsize
								+ '&font=' +  jtext.font 
								+ '&fill=' +  jtext.color.split('#')[0]
								+ ((jtext.rotation == 0 || jtext.rotation == 180) ? '&width=' +  jtext.width.toFixed(3) : '')
								+ ((jtext.rotation == 90 || jtext.rotation == 270) ? '&height=' +  jtext.height.toFixed(3) : '' )
								+ '&gravity=' +  jtext.gravity
								+ '&density=' +  view.dpi 
								+ '&bold=' +  jtext.bold
								+ '&italic=' +  jtext.italic
								+ '&rotation=' + jtext.rotation
								+ '&bullet_style=' +  jtext.bullet_style  ;
		//alert('IF: '+link1);
		tempTextImages[element_id].src = link1  ;
		}
	else {
		//link1 = 'ajax/text/getText.php?body=' +  txtBodyToShow
		link1 = 'create_text.php?body=' +  txtBodyToShow
							+ '&font=' +  jtext.font 
							+ '&fill=' +  jtext.color.split('#')[0]
							+ '&width=' +  jtext.width.toFixed(3)
							+ '&height=' +  jtext.height.toFixed(3)
							+ '&gravity=' +  jtext.gravity
							+ '&density=' +  view.dpi 
							+ '&bold=' +  jtext.bold
							+ '&italic=' +  jtext.italic
							+ '&rotation=' + jtext.rotation ;	
	//alert('ELSE: '+link1);
	tempTextImages[element_id].src = link1;
}

	$(tempTextImages[element_id]).data( 'timestamp' , tempTextTimestamps[element_id]);
	

	if (tempTextImages[element_id].complete)
		replaceText(tempTextImages[element_id]) ;
	else {
		tempTextImages[element_id].onload = function() {replaceText(this)} ; 
	}
/*
	if (txtBodyToShow.length == 0 && user.admin_mode)
		if (! $('#tbox_txt_' + jtext.name).closest('.textbox-n-freinds').hasClass('active2'))
			$('#outline_txt_' + jtext.name).addClass('non-selectable') ; 
	else {
		$('#outline_txt_' + jtext.name).removeClass('non-selectable') ; 
	}
*/
}

function replaceText(temp_txt) { 

	var element_id = $(temp_txt).attr('id').split('temp_')[1] ; 
	
	if($(temp_txt).data('timestamp') * 1 != tempTextTimestamps[element_id] * 1){
		$(temp_txt).remove();
		return ;
	}
	
	$('#' + element_id).attr('src' , temp_txt.src )  ;

	var jtext = getElem(element_id) ; 

	jtext.width = temp_txt.width / view.dpi ; 
	jtext.height = temp_txt.height / view.dpi ; 
	
	var newW = Math.max(temp_txt.width, 10) ;
	var newH = Math.max(temp_txt.height, 10) ;

	var oldW = $('#outline_' + element_id).cssWidth() ; 			
	var oldH = $('#outline_' + element_id).cssHeight() ; 
	
	if(jtext.rotation == 90){
		jtext.left -= (newW - oldW) / view.dpi ;
	}

	if(jtext.rotation == 180 && oldH > 0){
		jtext.top -= (newH - oldH) / view.dpi ;
	}

	$('#' + element_id).cssWidth(temp_txt.width).cssHeight(temp_txt.height).cssLeft(jtext.left * view.dpi ).cssTop(jtext.top * view.dpi) ;
		
	$('#outline_' + element_id).cssWidth(newW).cssHeight(newH).cssLeft(jtext.left * view.dpi).cssTop(jtext.top * view.dpi) ; 
//	$('#outline_' + element_id).find('.size-measure').html( 'W: ' + (newW / view.dpi).toFixed(2) + '&quot; x H:' + (newH / view.dpi).toFixed(2) + '&quot;' );;
	$('#outline_' + element_id).find('.size-measure.w .value').html((newW / view.dpi).toFixed(2) + '&quot;' );
	$('#outline_' + element_id).find('.size-measure.h .value').html((newH / view.dpi).toFixed(2) + '&quot;' );

	$(temp_txt).remove();
} 

function rotateElements(){
	$('.selected.text').each(function() {
		var t = getElem($(this).attr('id').split('outline_')[1]) ;
		if (typeof t.rotation == 'undefined')
			t.rotation = 0 ;
			
		t.rotation = (t.rotation + 90) % 360; 
		t.left = t.left + (t.width - t.height) / 2 ; 
		t.top  = t.top + (t.height - t.width) / 2 ; 
		temp = t.width ;
		t.width = t.height ;
		t.height = temp ; 
		$(this).cssWidth(t.width * view.dpi) ; 
		$(this).cssHeight(t.height * view.dpi) ; 
		$(this).cssLeft(t.left * view.dpi) ; 
		$(this).cssTop(t.top * view.dpi); 
		updateTextElement("txt_" + t.name) ; 
		
	}) ; 

	$('.selected.image').each(function() {

		var jimage = getElem($(this).attr('id').split('outline_').pop() ) ;
			
		var temp = JSON.clone(jimage) ;
		jimage.rotation = ( (temp.rotation ? temp.rotation : 0) + 90) % 360 ; 
		jimage.width = temp.height ;
		jimage.height = temp.width ; 
		jimage.cropTop = temp.cropLeft ; 
		jimage.cropLeft = 1 - temp.cropTop - temp.cropHeight ; 
		jimage.cropWidth = temp.cropHeight  ; 
		jimage.cropHeight = temp.cropWidth ;

		jimage.left = jimage.left + (jimage.width - temp.width) / 2 ;
		jimage.top = jimage.top + (jimage.height - temp.height) / 2 ;
	
		drawImageElement(jimage) ; 
		updateStockImagePrices();
		$("#outline_img_"+jimage.name).addClass("selected") ;
	});
	
	pushState();
	updateToolbar();
}

function applyTextAttr(attr_name , attr_value) {
	$('.selected.text').each(function() {
		var jtext = getElem($(this).attr('id').split('outline_')[1]) ;
		
		jtext[attr_name] =  attr_value ;
		if(attr_name=='pointsize' && jtext.fit_to_box){
			jtext.fit_to_box = false ;
		}

		// Rremoves tha bold and italic attributes from the text whose new font does not support it
		if (jtext.bold && ! config.fonts[jtext.font]['bold'] ) { jtext.bold = false ;  }
		if (jtext.italic && ! config.fonts[jtext.font]['italic'] ) { jtext.italic = false ; }

		updateTextElement($(this).attr('id').split('outline_')[1]) ; 
		view.outdatedJdesign = true ;

	}) ;
	pushState() ;
	updateToolbar();
}

function applyImageAttr(attr_name , attr_value, colorIndex) {
	$('.selected[id^="outline_img_"]').each(function() {
		var element_id = $(this).attr('id').split('outline_')[1] ;
		var jElement = getElem(element_id) ;
		jElement[attr_name] = attr_value + (typeof colorIndex != 'undefined' ? '#' + colorIndex  : '' ) ; 
		
		if(typeof(jElement.border_color)=='undefined' && attr_name == 'border_width' && attr_value > 0)
			jElement.border_color = '000000' ;
			
		if(typeof(jElement.border_width)=='undefined') jElement['border_width'] = 0 ;
		if(typeof(jElement.border_color)=='undefined') jElement['border_color'] = 'FFFFFF';
		
		if(attr_name == 'border_color' && jElement.border_width == 0){
			jElement.border_width = 1 ;
		}

		
		var imgBorder = $('#border_'+element_id) ;
		imgBorder.css('border-width' , .013836 * jElement.border_width * view.dpi + 'px');
		imgBorder.css('border-color' , '#' + jElement.border_color.split('#')[0]);
	}) ;
	pushState() ;
	updateToolbar();
}

function applyShapeAttr(attr_name , attr_value, colorIndex ) {
	$('.shape.selected[id^="outline_img_"]').each(function() {
		var element_id = $(this).attr('id').split('outline_')[1] ;
		jElement = getElem(element_id) ;
		jElement[attr_name] = attr_value +  (typeof colorIndex != 'undefined' ? '#' + colorIndex  : '' ) ;
		$('#inner_'+element_id).attr('src' ,  getMockupSrc(jElement) ) ;
		view.outdatedJdesign = true ;

	}) ;
	pushState() ;
	updateToolbar();
}

function getElem(element_id) {
	var element_type = element_id.split('_')[0] ;
	var element_name = element_id.split(element_type + '_')[1] ;
	if (element_type == 'txt') {
		var element_index = getElementIndex(view.jdesign.canvases[view.currentPage].texts , "name" , element_name) ; 
		if (element_index != null)		
			return view.jdesign.canvases[view.currentPage].texts[element_index] ; 
	}
	else if(element_type == 'img') {
		element_index = getElementIndex(view.jdesign.canvases[view.currentPage].images, "name" , element_name) ; 
		if (element_index != null)		
			return view.jdesign.canvases[view.currentPage].images[element_index] ; 
	}
	return false ;
}

function pushState() {

	var designClone = JSON.clone(view.jdesign) ;
	// Returns if the requested state is equal to the last satate in queue
	if (view.stateIndex > 0 && JSON.stringify(view.states[view.stateIndex].design) == JSON.stringify(designClone) ) return ;
	
	// In case that an UNDO happened before this action, the rest of the array will be removed
	if (view.stateIndex != view.states.length - 1 )
		view.states.splice(view.stateIndex + 1 , view.states.length - view.stateIndex - 1 ) ;
	
	view.states.push({ "page" : view.currentPage , "design" : designClone}) ;
	view.stateIndex = view.states.length - 1 ;
	view.isDesignSaved = false ; 
	view.userWarned = false ; 
//	updateToolbar();
}

function undo() {
	if (view.stateIndex == 0 ) return ;

	view.stateIndex-- ;
	var stateClone = JSON.clone(view.states[view.stateIndex].design) ;
	view.jdesign = stateClone ;
	view.currentPage = view.states[view.stateIndex].page ;
	refreshView() ; 
}

function redo() {
	if (view.stateIndex == view.states.length - 1) return ;

	view.stateIndex++ ;
	var stateClone = JSON.clone(view.states[view.stateIndex].design) ;
	view.jdesign = stateClone ;
	view.currentPage = view.states[view.stateIndex].page
	refreshView() ; 
}


/* -------- Switch the whole view to the required canvas page ---------- */
function switchView(design , page) {
	view.currentPage = page ; 
	view.jdesign = JSON.clone(design) ; 
	refreshView() ; 
}

function setRulerVisibility(){
	view.profileEQ.show_ruler *= 1 ;
	if (view.profileEQ.show_ruler) {
		$('.ruler').show();
		$('#show_ruler_control').addClass('on') ;
	}
	else {
		$('.ruler').hide();
		$('#show_ruler_control').removeClass('on') ;
	}
}

function setGridVisibility(anim_duration){
	if (view.showGrid) {
		$('.grid-area-mask').fadeIn(anim_duration); 
	}
	else {
		$('.grid-area-mask').fadeOut(anim_duration) ; 
	}
	updateToolbar();
}

function setBleedAreaVisibility(anim_duration){
	if (view.showBleed) {
		$('.bleed-area-mask').fadeIn(anim_duration);
		$('.no-bleed-area-mask').fadeOut(anim_duration);
		$('.safe-zone-mask').fadeIn(anim_duration);
	}
	else{
		$('.bleed-area-mask').fadeOut(anim_duration);
		$('.no-bleed-area-mask').fadeIn(anim_duration);
		$('.safe-zone-mask').fadeOut(anim_duration);
	}
	updateToolbar();
}

function setSafeZoneVisibility(showSafeZone , anim_duration){
	view.showSafeZone = showSafeZone ;
	if (view.showSafeZone) {
		$('.safe-zone-mask').fadeIn(anim_duration); 
	}
	else{
		$('.safe-zone-mask').fadeOut(anim_duration); 	}

	// ---- IE  Compatibility workaround -------------------
	$('.opacity50').css( 'filter' , 'alpha(opacity=50)' )  ;
}



function getBlankJtext() {
	var bg_intensity = (parseInt(view.jdesign.canvases[view.currentPage].bg_color.substr(0 , 2) , 16) + parseInt(view.jdesign.canvases[view.currentPage].bg_color.substr(2 , 2) , 16) + parseInt(view.jdesign.canvases[view.currentPage].bg_color.substr(4 , 2) , 16)) / 3 ; 
	view.textInsertCount %= 20 ;
	var newText = {	"body": "" ,
				"name": "user_text_" + Math.floor(Math.random() * 100000) ,
				"title": "Enter text here",
				"left": Math.min(view.jdesign.canvases[view.currentPage].width / 5 ,  view.jdesign.canvases[view.currentPage].width - view.jdesign.canvases[0].bleed * 4 ) ,
				"top":  Math.min(view.jdesign.canvases[view.currentPage].height / 4 + (view.defaultFontSize / 50).toFixed(1) * (view.textInsertCount  % 5),  view.jdesign.canvases[view.currentPage].width - view.jdesign.canvases[0].bleed * 4 ) ,
				"width": Math.max(1.6, view.jdesign.canvases[view.currentPage].width / 2) ,
				"height": Math.max(1.6, view.jdesign.canvases[view.currentPage].width / 2) / 8  ,
				"gravity" : "west" ,
				"preset_text": "New Text Box...",
				"pointsize": view.defaultFontSize ,
				"font": "Arial",
				"color": bg_intensity < 128 ? 'ffffff' : '000000'
			}

	var selectedText = $('.selected.text') ;
	if(selectedText.length == 1){
		var jtext = getElem(selectedText.attr('id').split('outline_').pop());
		newText.color = jtext.color ;
		newText.gravity = jtext.gravity ;
		newText.pointsize = jtext.pointsize ;
		newText.font = jtext.font ;
		newText.bold = jtext.bold;
		newText.italic = jtext.italic ; 
		newText.rotaion = jtext.rotation ;
	}
	view.jdesign.canvases[view.currentPage].texts.push(newText);
	view.textInsertCount++ ;
	return newText ;
}

function insertText(){
	addTextElement(getBlankJtext(), true);  
	pushState();
}

function addTextElement(newJtext, select_after_add) {
		
	if(newJtext.top > (view.jdesign.canvases[view.currentPage].height - 0.25)){	//if text position is outside the canvas, text will move to the top.	
		newJtext.left = Math.min(view.jdesign.canvases[view.currentPage].width / 5 ,  view.jdesign.canvases[view.currentPage].width - view.jdesign.canvases[0].bleed * 4 );		
		newJtext.top = Math.min(view.jdesign.canvases[view.currentPage].height / 4 + (newJtext.pointsize / 50).toFixed(1) * (view.textInsertCount  % 5),  view.jdesign.canvases[view.currentPage].width - view.jdesign.canvases[0].bleed * 4 );
		//newJtext.top = Math.min(view.jdesign.canvases[view.currentPage].height / 4 + 0.2 * (view.textInsertCount  % 5),  view.jdesign.canvases[view.currentPage].width - view.jdesign.canvases[0].bleed * 4 );
	}
		
	var outline = $('<div />').attr('id' , 'outline_txt_' + newJtext.name)
					.addClass('outline2 text') 
//					.addClass(newJtext.body.length == 0 ? 'preset-text' : '')
					.cssTop(newJtext.top * view.dpi)
					.cssLeft(newJtext.left * view.dpi)
					.cssHeight(0)
					.cssWidth(newJtext.width * view.dpi)
					.css('z-index' , 500)
					.appendTo('#outline_layers')
					.addClass(user.admin_mode ? 'admin' : 'user') ;


	$('<div />').addClass('selected-dash l').appendTo(outline);
	$('<div />').addClass('selected-dash t').appendTo(outline);
	$('<div />').addClass('selected-dash b').appendTo(outline);
	$('<div />').addClass('selected-dash r').appendTo(outline);
	
	$('<div />').addClass('outline-hint').html('Click to Edit Text').appendTo(outline);
					
	$('<img />').attr('id' , 'txt_' + newJtext.name)
					.css('left', newJtext.left * view.dpi + 'px')
					.css('top', newJtext.top * view.dpi + 'px' )
					.appendTo('#text_layers') ;
					
	var smw = $('<div />').addClass('size-measure w').appendTo(outline);
	$('<div />').addClass('value').appendTo(smw);
	$('<div />').addClass('guide').appendTo(smw);
	var smh = $('<div />').addClass('size-measure h').appendTo(outline);
	$('<div />').addClass('value').appendTo(smh);
	$('<div />').addClass('guide').appendTo(smh);

//	$('<div />').addClass('size-measure').appendTo(outline); //.html( 'W: ' + (newJtext.width).toFixed(2) + '&quot; x H:' + (newJtext.height).toFixed(2) + '&quot;' );;
//	$('<div />').addClass('position-measure').appendTo(outline).html('X: ' + (newJtext.left - view.jdesign.canvases[view.currentPage].bleed).toFixed(2) + '&quot; , Y: ' + (newJtext.top - view.jdesign.canvases[view.currentPage].bleed).toFixed(2) + '&quot;' );
	
	// --- add nw, ne, sw, se handles for all elements excepts those that are not resizable 
	$('<div />').addClass('handle handle-nw').appendTo(outline) ; 	
	$('<div />').addClass('handle handle-ne').appendTo(outline) ; 	
	$('<div />').addClass('handle handle-sw').appendTo(outline) ; 	
	$('<div />').addClass('handle handle-se').appendTo(outline) ; 	

	
	// Disable Right Click
	outline.bind("contextmenu", function(e) {
		// $('#inline_menu_txt_' + newJtext.name).trigger('mousedown');
		// return false;
	}); 
	
	updateTextElement('txt_' + newJtext.name) ; 
	createTextbox(newJtext) ;
	
	// simulates clicking on a textbox
	if(select_after_add){
		outline.mousedown() ;
		outline.mouseup() ;
	}

}

function stopPropag(e) {
	e.cancelBubble = true; 
	if(e.stopPropagation) e.stopPropagation()
}

function updateFotoliaInfo(licenses){
	$.each(licenses, function(k, v) {
		view.fotoliaLicenses[k] = JSON.clone(v);
	})
}

function updateImageInfo(imageInfo){
	$.each(imageInfo, function(k, v){
		updateSingleImageInfo(v);
	})
}

function updateSingleImageInfo(data){
	view.imageInfo[data.id] = {};
	view.imageInfo[data.id].uploadWidth = data.width * 1 ;
	view.imageInfo[data.id].uploadHeight = data.height * 1  ;
	view.imageInfo[data.id].is_vector = data.is_vector * 1  ;
	view.imageInfo[data.id].is_public = data.is_public * 1  ;
	
	if(typeof data.fotolia_id != 'undefined' && data.fotolia_id != null ){
		view.imageInfo[data.id].fotoliaId = data.fotolia_id * 1 ;
		view.fotoliaLicenses[data.fotolia_id] = JSON.clone(data.licenses) ;
	}
	if(typeof data.svg_id != 'undefined' && data.svg_id != null ){
		view.imageInfo[data.id].svg_id = data.svg_id * 1  ;
		view.imageInfo[data.id].svg_original_colors = data.svg_original_colors ;
	}


}

function startInlineCrop(img_name){
	$('.selected').removeClass('selected');
	$('.croppable').not('.fitted').removeClass('croppable');
	$('#outline_img_'+img_name).addClass('croppable selected');
	updateToolbar();
}
function exitInlineCrop(){
	$('.croppable').not('.fitted').removeClass('croppable');	
	$('.croppable').removeClass('selected');
	updateStockImagePrices() ;
	
}

function getElementIndex(arr , attr , val) {
	for (i in arr) {
		if (arr[i][attr] == val)
			return i * 1 ;
	}
	return false ;
}


function positionToolbars() {
		var toolbarTopScroll = findPos($('#top_toolbar_placeholder')[0])[1]  -  getPageScrollTop() ;
		if (toolbarTopScroll < 0){
			$('#top_toolbar , #text_fields').addClass('sticky');
		}
		else {
			$('#top_toolbar , #text_fields').removeClass('sticky');
		}

		var o = $('.selected');
		if(o.length == 1){
			var pos = findPos(o[0]);
			var cvpos = findPos($('#canvas')[0]);

			$('.float-toolbar').each(function(){
				$(this).cssLeft(pos[0] - ($(this).outerWidth(true) - o.cssWidth()) / 2 );
				if(pos[1] < cvpos[1] + $(this).outerHeight(true) ||  pos[1] < getPageScrollTop() + 85){
					$(this).cssTop ( Math.min( pos[1] + o.cssHeight() + 5 , $(window).height() + getPageScrollTop() -  $(this).outerHeight(true) - 5 )) ;
				}
				else{
					$(this).cssTop(pos[1] - $(this).outerHeight(true) - 5 );
				}
			});
			
			if(pos[0] > $('#textbox_tools').outerWidth(true) + 5 )
				$('#textbox_tools').cssLeft(Math.max(5 , pos[0] - $('#textbox_tools').outerWidth(true) - 5));
			else
				$('#textbox_tools').cssLeft(Math.min( pos[0]+ o.cssWidth() + 10 ,$(window).width() - $('#textbox_tools').outerWidth(true) - 5 ));

//			if(pos[1] - getPageScrollTop() > $(window).height() / 2 )
//				$('#textbox_tools').cssTop(pos[1] - $('#textbox_tools').outerHeight(true) + o.cssHeight() + 10 )  ;
//			else
			$('#textbox_tools').cssTop(pos[1] - 10 ) ;
				
			if(! $('#textbox_tools').hasClass('open'))
				$('#textbox_tools').cssTop(pos[1]) ;


			$('#textbox_tools').cssTop(Math.max($('#textbox_tools').cssTop() , getPageScrollTop() + 125 ) ) ;
			$('#textbox_tools').cssTop(Math.min($('#textbox_tools').cssTop() , $(window).height() +  getPageScrollTop() - $('#textbox_tools').outerHeight(true) - 10 ) ) ;

		}
}

function updateTextBody(jtext, value){
	jtext.body =  encodeURIComponent(value) ; 
	clearTimeout(tempTextTimeouts[jtext.name]) ; 
	tempTextTimeouts[jtext.name] = setTimeout(function() { updateTextElement('txt_'+jtext.name) ; pushState()} , 300) ; 

	var panel_textbox = $('#tbox_txt_' + jtext.name) ;
	var inline_textbox = $('#inline_textarea') ;

	inline_textbox.cssHeight(18) ;
	inline_textbox.cssHeight(inline_textbox[0].scrollHeight + 2) ;
	panel_textbox.val(value) ;
	panel_textbox.cssHeight(panel_textbox[0].scrollHeight + 2) ;

	if(value.length > 0 )
		panel_textbox.closest('.tarea-wrapper').removeClass('empty');
	else
		panel_textbox.closest('.tarea-wrapper').addClass('empty');
	
	positionToolbars();
}

function startMultiSelect(e) {
	var targetX =  e.pageX - getCanvasX() ; 
	var targetY =  e.pageY - getCanvasY() ; 
	var multiSelector = $('#multi_selector') ;
	multiSelector.show()
				.cssLeft(Math.min (view.selectorX , targetX )) 
				.cssTop(Math.min(view.selectorY , targetY )) 
				.cssWidth(Math.abs(targetX - view.selectorX)) 
				.cssHeight(Math.abs(targetY - view.selectorY)) ; 
	var selectorLeft = multiSelector.cssLeft() ;
	var selectorTop = multiSelector.cssTop() ;
	var selectorWidth = multiSelector.cssWidth() ;
	var selectorHeight = multiSelector.cssHeight() ;
	var selectorRight = selectorLeft + selectorWidth ;
	var selectorBottom = selectorTop + selectorHeight ;


// This algorithm select any elements which is touched by selector
	$("#outline_layers .outline2").not(".non-selectable").not(".locked").each(function() {
		var shapeTop = $(this).cssTop() ; 
		var shapeBottom = $(this).cssTop() + $(this).cssHeight(); 
		var shapeLeft = $(this).cssLeft() ; 
		var shapeRight = $(this).cssLeft() + $(this).cssWidth(); 
			
		// X Intersection of selector and shape
		var xx = Math.max (Math.max (selectorRight - shapeLeft , 0) - Math.max (selectorLeft - shapeLeft , 0) - Math.max(selectorRight - shapeRight, 0) ,0) ;
		// Y intersection of selector and shape
		var yy = Math.max  (Math.max (selectorBottom - shapeTop , 0) - Math.max (selectorTop - shapeTop , 0) - Math.max(selectorBottom - shapeBottom, 0) ,0) ;
		
		if (xx * yy > 0) // Intersection area
			$(this).addClass("selected") ; 
		else 
			$(this).removeClass("selected") ; 
	}) ; 


}

function deselectAll() {
		var o = $('.outline2.selected') ;
		if(o.length > 0){
			exitInlineCrop();
			$('.outline2.selected').removeClass('selected') ; 
			arrangeOutlineZindex() ;
			updateToolbar() ;
		}
}

function applyUrlHash() {
	//if (! user.admin_mode && (window.location.hash == '#' || window.location.hash == '') && typeof view.jdesign == 'undefined') window.location = "/" ;

	$('.ui-dialog-titlebar-close').click();
	$('.iframe-popup').hide();

	var newTemplateId = getFragmentValue('template_id') ;
	var newDesignId = getFragmentValue('design_id')  ;
	var themeId = getFragmentValue('theme_id') ;
	var page = getFragmentValue('page') || 0 ;
	if (newTemplateId){
		if (newTemplateId != view.templateId)
			loadTemplate(newTemplateId, themeId, page) ; 
		else if (page != view.currentPage)	
			switchView(view.jdesign, page);
		return ;
	}
	
	if (newDesignId){
		if(newDesignId != view.designId)
			loadDesign(newDesignId, page) ;		
		else if (page != view.currentPage)	
			switchView(view.jdesign, page);
		return ;
	}

	if (typeof view.jdesign == 'undefined' && getFragmentValue('product') ){
		var product = {} ;
		product.product = getFragmentValue('product') != null ? getFragmentValue('product') : "businessCard" ;
		product.width = getFragmentValue('width') != null ? getFragmentValue('width') * 1 : 3.5 ;
		product.height = getFragmentValue('height') != null ? getFragmentValue('height') * 1 : 2 ;
		product.folding = getFragmentValue('folding') != null ? getFragmentValue('folding') : 'none' ;
		product.dieCutType = getFragmentValue('dieCutType') != null ? getFragmentValue('dieCutType') : 'none' ;
		product.wrap_color = getFragmentValue('wrap_color') != null ? getFragmentValue('wrap_color') : 'none' ;
		startNewProduct(product);
	}	
}

function applyFontSize(){
	var s = parseInt($('#selected_font_size').val()) ;
	if (isNaN(s)){
		updateToolbar();
		return;
	}
	s = Math.max(s, config.fontSizes[0]);
	s= Math.min(s, config.fontSizes[config.fontSizes.length -1]);
	applyTextAttr('pointsize' , s);
	$('#selected_font_size').blur().closest('.toolbar-button').removeClass('open');
}

function populateDropDowns(){
	//alert('populateDropDowns');
	var link1 = '';
	var fontSizeMenu = $('#font_size_menu');
	var fontFaceMenu = $('#font_face_menu');
	$.each(config.fontSizes , function(k, v){
		var menuItem = $('<div />').addClass('toolbar-button type4 font-size-option').appendTo(fontSizeMenu);
		$('<div />').addClass('button-menu-text').html(v+'pt').appendTo(menuItem)
	});
	
	$.each(config.fonts, function(k,v){
		//link1 = 'http://youprint.com/ajax/bitmap/getFontSample.php?name=' + k;
		//alert(k+': '+link1);
        //link1 = 'images/fonts/' + k+'.png';
        link1 = 'get_font_sample.php?name=' + k;
		var menuItem = $('<div />').addClass('toolbar-button type4 font-face-option').appendTo(fontFaceMenu).data('font_name' , k);
		$('<img />').addClass('button-menu-image').attr('src', link1).appendTo(menuItem);
	})

							
	for (i in config.color_palette) {
		$('<div />').data('color' , config.color_palette[i])
					.addClass('color-pick').addClass('color-'+ config.color_palette[i])
					.css('background-color' , '#'+ config.color_palette[i] )
					.appendTo('.color-palette') ; 
		
	}

	$.each(config.borderSizes, function(k,v){
		var t = $('<div />').addClass('toolbar-button type4 shape-border-width-option').appendTo('#shape_border_width_menu');
		$('<div />').addClass('button-menu-text').html(v + 'pt').appendTo(t);

		var t = $('<div />').addClass('toolbar-button type4 image-border-width-option').appendTo('#image_border_width_menu');
		$('<div />').addClass('button-menu-text').html(v + 'pt').appendTo(t);
	});
							
}

function applyBgColor(color) {
	view.jdesign.canvases[view.currentPage].bg_color = color ;

	$('#canvas').css('background' , '#' + color.split('#')[0]) ; 
	pushState() ; 
	updateToolbar();
}

JSON.clone = function (obj) {
  return $.parseJSON( JSON.stringify( obj ) );
}

function startNewProduct(jProduct) {
	resetView() ;

	jProduct.foldingDirection = jProduct.width >= jProduct.height ? 'vertical' : 'horizontal' ;
	jProduct.folding = (typeof jProduct.folding !== 'undefined' )? jProduct.folding : "none";
	jProduct.dieCutType = (typeof jProduct.dieCutType !== 'undefined')? jProduct.dieCutType : "none" ;
	
	var bleed = products[jProduct.product].bleed;
	
	
	var newJdesign = {} ;
	newJdesign.version = "2.0" ;
	newJdesign.canvases = [{texts:[] , images:[]}];
	
	if(jProduct.product == 'foldedGreetingCard'){
		if(jProduct.width < jProduct.height){
			newJdesign.canvases[0].width = jProduct.width + bleed * 2 ;
			newJdesign.canvases[0].height = (jProduct.height / 2) + bleed * 2;
		}else{
			newJdesign.canvases[0].width = (jProduct.width / 2) + bleed * 2;
			newJdesign.canvases[0].height = jProduct.height + bleed * 2 ;
		}
	}else{
		newJdesign.canvases[0].width = jProduct.width + bleed * 2 ;
		newJdesign.canvases[0].height = jProduct.height + bleed * 2 ;
		
	}
	
	newJdesign.canvases[0].name = getSideNameByFolding(jProduct.folding, 0, jProduct.product) ;
	newJdesign.canvases[0].bleed = bleed ;
	newJdesign.canvases[0].droppable = true ;

	newJdesign.canvases[0].bg_color = 'ffffff';

	newJdesign.width = jProduct.width ;
	newJdesign.height = jProduct.height ;
	newJdesign.folding = jProduct.folding ;
	newJdesign.foldingDirection = jProduct.foldingDirection ;
	newJdesign.dieCutType = jProduct.dieCutType ;
	newJdesign.wrap_size = products[jProduct.product].wrap_size * 1 ;
	newJdesign.wrap_color = jProduct.wrap_color ;
	newJdesign.product = jProduct.product ;	
	
	jProduct.sides = products[jProduct.product].sides;
	
	// Inserting the second page (backside) exculude all the one sided products 
	if (jProduct.sides == 2){
		newJdesign.canvases.push(JSON.clone(newJdesign.canvases[0])) ;
		newJdesign.canvases[1].name = getSideNameByFolding(jProduct.folding , 1, jProduct.product) ;
	}
	adjustProfileEQ(newJdesign.product);
	switchView(newJdesign, 0) ;
	$('#search_result_wrapper').hide() ;
//	window.location.hash = '#' ;
	pushState() ; 
	view.isDesignSaved = true ; // // override the false value caused by push State
}

function getSideNameByFolding(f , s , p) {

	if (f == 'halfFold' || f == 'triFold' || f == 'letterFold' || f == 'rollFold' ) {
		if(p == "foldedGreetingCard"){
			if (s==0) return 'Front' ;
			else if (s==1) return 'Inside' ;
			
		}else{
			if (s==0) return 'Outside' ;
			else if (s==1) return 'Inside' ;
		}
	}
	else {
		if (s==0) return 'Front Side' ;
		else if (s==1) return 'Back Side' ;
	}
}

function copyElements(){
	if ($('#outline_layers .selected').not('.pholder').length == 0) return ;
	view.clipboard = [];
	view.pasteCount = 0 ; 
	view.copySide = view.currentPage ;
	
	$('#outline_layers .selected').not('.pholder').each(function() {
		view.clipboard.push( JSON.clone(getElem( $(this).attr('id').split('outline_').pop() )) ) ; 
	}) ;
	updateToolbar();
}

function pasteElements() {
	if (view.clipboard.length == 0) return ;
	deselectAll();
	view.pasteCount++ ;
	view.pasteCount %= 10 ;

	// If pasting at a different page the will be no shift for the first paste
	pasteShift = view.pasteCount - (view.copySide == view.currentPage ? 0 : 1 )  ;

	$.each(view.clipboard, function(k,v) {
		jPaste = JSON.clone(v);
		jPaste.name = jPaste.name + '_' + Math.floor(Math.random() * 1000) ;
		jPaste.left += 0.2 * pasteShift ;
		jPaste.top += 0.2 * (pasteShift % 5) ;
		if(typeof v.body != 'undefined'){ // text element
			view.jdesign.canvases[view.currentPage].texts.push(jPaste) ;
			addTextElement(jPaste);
			$('#outline_txt_' + jPaste.name).addClass('selected');
		}

		else {
			delete jPaste.fitted ;
			delete jPaste.unmovable ;
			delete jPaste.noresize ;
			jPaste.zindex = 299 +  jPaste.zindex ;
			view.jdesign.canvases[view.currentPage].images.push(jPaste) ;
			drawImageElement(jPaste) ;
			$('#outline_img_' + jPaste.name).addClass('selected');
		}

	}) ; 
	arrangeImageZees();
	pushState() ;
	updateToolbar();
}

function loadTemplate(id, theme_id, page){
	var data = create_data();
	resetView() ;
	view.themes = data.themes ;
	applyThemeToToolbar(data.theme);
	var json = data.json ;
	updateImageInfo(data.images);
	updateFotoliaInfo(data.fotoliaLicenses);
	view.templateId = data.id * 1 ; 
	view.designName = data.set_title ;
	adjustProfileEQ(json.product);
	switchView(json , page) ; 
	pushState() ;
	view.isDesignSaved = true ; 
}
/*
function loadTemplate(id, theme_id, page) {
	if(! view.isDesignSaved){
		if(! confirm('You have unsaved work. Continue anyway?'))
				return ;
	}
	$('#gray_box').hide();
	//reset_view() ;

	$.ajax({url:"https://www.youprint.com/ajax/template/getTemplateById.php" ,
			data: {"template_id" : id , "with_json" : 1 , "with_image_info" : 1 ,"theme_id" : theme_id ?  theme_id : undefined } , 
			dataType: 'json' ,
			crossDomain: true,
			beforeSend: function(){
				alert('E');
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(jqXHR.innerHTML);
				alert(textStatus);
				alert(errorThrown);
			},
			success: function(data) {
				if (data.success != 1) {
					alert('Error loading template: ' + data.error);
					return ;
				}
				resetView() ;
				view.themes = data.themes ; 
				applyThemeToToolbar(data.theme);
				var json = $.parseJSON(data.json) ;
				updateImageInfo(data.images);
				updateFotoliaInfo(data.fotoliaLicenses);
				view.templateId = data.id * 1 ; 
				view.designName = data.set_title ;
				adjustProfileEQ(json.product);
				switchView(json , page) ; 
				pushState() ;
				view.isDesignSaved = true ; 
				
			}
	}) ;
}
*/

function applyLayout(id, callbackFunc){
	applyLayoutCallback = typeof callbackFunc == 'function' ? callbackFunc : null ;
	updateUserTexts() ;
	updateUserImages() ; 

	$.ajax({url:"cms/getTemplateJson.php" ,
			data: {"id" : id } , 
			dataType: 'json' ,
			success: function(data) {
				if (data.success == 1) {
					view.jdesign.template_id = view.templateId = data.id ; 
					/* EASY-2115
					if (view.designId == 0)
						window.location.hash = "#template_id=" + data.id ;
					*/
					
//					for (c in data.json.canvases)
						c = view.currentPage ; 
						for(t in data.json.canvases[c].texts)
							if (typeof view.userTexts[data.json.canvases[c].texts[t].name] !== 'undefined')
									data.json.canvases[c].texts[t].body = view.userTexts[data.json.canvases[c].texts[t].name] ;
					// apply the same page of layout to the current page of design
					view.jdesign.canvases[c] = data.json.canvases[c] ; 
					refreshView(); 
					updatePlaceholders() ;

//					for (c in view.jdesign.canvases)
						c = view.currentPage ;
						for(i2 in view.jdesign.canvases[c].images){
							if (typeof view.jdesign.canvases[c].images[i2] != 'undefined' && typeof view.userImages['user_' + view.jdesign.canvases[c].images[i2].name] !== 'undefined') {
								putImageInPlaceholder(view.jdesign.canvases[c].images[i2].name , view.userImages['user_' + view.jdesign.canvases[c].images[i2].name]  ) ;
							}
						}

					pushState() ;
					
					if (typeof applyLayoutCallback == 'function'){
						applyLayoutCallback(); 
					}
					
					
				}
				else {
					alert('Error: ' + data.error) ; 
				}
			}
	}) ;
}
function showNotice(text) {
	$('#notice_box').html(text).addClass('notice').removeClass('alert') ;
	$('#notice_bar').show() ;
	window.setTimeout("$('#notice_bar').fadeOut(300)" , 3000) ; 
} 

function showAlert(text) {
	$('#notice_box').html(text).addClass('alert').removeClass('notice');
	$('#notice_bar').show() ;
	window.setTimeout("$('#notice_bar').fadeOut(300)" , 8000) ; 
} 

function hideAlert(){
	$('#notice_bar').fadeOut(300);
}

function loadDesign(id, page){
	alert('loadDesign');
	if(! view.isDesignSaved){
		if(! confirm('You have unsaved work. Continue anyway?'))
				return ;
	}

//	if (! warnUnsaved(function() {loadDesign(id)} )) return ;
	 
	$.ajax({ 	url : "/ajax/design/getDesignById.php" ,
				data: {"design_id" : id} ,
				dataType: 'json' ,
				success: function(data) {
					if (data.success != 1) {
						showAlert('Error: ' + data.error);
						return;
					}
					resetView() ; 
					view.themes = data.themes ; 
					applyThemeToToolbar(data.theme);
					var json = $.parseJSON(data.json) ;
					view.jdesign = json ; 	
					updateImageInfo(data.images);
					updateFotoliaInfo(data.fotoliaLicenses);
					view.designId = id * 1 ; 
					view.designName = data.name ;
					view.templateId = data.template_id * 1;
					adjustProfileEQ(view.jdesign.product);
					switchView(view.jdesign , page) ; 
					window.location.hash = '#design_id=' + id  ;
					pushState() ; 
					view.isDesignSaved = true ;
					if (view.duplicate || data.status != 'saved'){
						window.location.hash = '#' ;
						delete view.designId ;
					}


				}
	}) ;
}

function updateUserTexts() {
	if (! view.jdesign) return ;
	for (i in view.jdesign.canvases)
		for (j in view.jdesign.canvases[i].texts)
			if (view.jdesign.canvases[i].texts[j].body.length > 0)
				view.userTexts[view.jdesign.canvases[i].texts[j].name] = view.jdesign.canvases[i].texts[j].body ;
}

function updateUserImages() {
	if (typeof view.jdesign == 'undefined') return ;
	for (c in view.jdesign.canvases)
		for (i in view.jdesign.canvases[c].images)
			if (typeof view.jdesign.canvases[c].images[i].image_id !== 'undefined')
				view.userImages[view.jdesign.canvases[c].images[i].name] = 1 * view.jdesign.canvases[c].images[i].image_id ;
}

function saveDesign(callbackFunc, skipLogin) { 
alert('saveDesign');
	view.callbacks.save = callbackFunc ;

	if 	(! user.customer_id && ! skipLogin || ! user.customer_id && ! user.visitor_id) {
		popupLoginHandler( function() {saveDesign(view.callbacks.save)} ) ; 
		return false;
	}
	// In case design_id is null (i.e. new design) uses save as.
	if(! view.designId) {
		saveDesignAs(callbackFunc, skipLogin) ; 
		return false;
	}

	showNotice("Working...") ; 

	updateStockImagePrices();

	$.ajax({	url : "/ajax/design/updateDesign.php" ,
				data: {"json" : JSON.stringify(view.jdesign) , "design_id" :view.designId , "template_id" : view.templateId, "theme_id" : view.theme_id } ,
				dataType: 'json' ,
				type: 'POST' ,
				success: function(data) {
					if (data.success == 1) {
						view.isDesignSaved = true ;
						if (typeof view.callbacks.save == 'function')
							view.callbacks.save() ; 
							showNotice("Successfully saved.") ; 
							updateToolbar();
					}
					else {
						showAlert("An error occurred while saving your design. Please try again.") ; 
					}
				} ,
				error: function() {
					showAlert("An error occurred while saving your design. Please try again.") ; 
				}
	})  ;
}

function saveDesignAs(callbackFunc, skipLogin) {
	alert('saveDesignAs');
	view.callbacks.save = callbackFunc ;

	if 	(! user.customer_id && ! skipLogin || ! user.customer_id && ! user.visitor_id) {
		popupLoginHandler( function() {saveDesignAs(view.callbacks.save)} ) ; 
		return false;
	}
		
	if (! view.saveAsName) {
		var p = createPopup('Save Design' , 400).attr('id' , 'save_as_popup' ).show() ;
		var b = p.find('.simple-popup-content') ;
		$('<h5 />').css('margin' , '20px 0px 10px 0px').html('Please enter a name for your design:').appendTo(b) ; 
		$('#gray_box').show() ;
		$('<input type="text" id="save_as_name" maxlength="50" />')
						.val(typeof view.designName == 'undefined' ? "Untitled Design" : view.designName)
						.appendTo(b).focus().select()
						.keydown(function(e){
							if(e.keyCode == 13){
								$('#save_popup_button').click();
							}
						});

		var buttonWrapper =  $('<div />').css('text-align' , 'right').css('margin' , '12px 0').appendTo(b) ; 
		$('<input />').attr('type' , 'button').val('Save')
					.attr('id', 'save_popup_button')
					.addClass('action-button')
					.appendTo(buttonWrapper)
					.click(function() {  
							if($('#save_as_name').val().length == 0) 
								return ; 
							view.saveAsName = $('#save_as_name').val() ; 
							$('#gray_box').hide(); 
							$('#save_as_popup').remove() ; 
							saveDesignAs(callbackFunc , skipLogin) ;
							_gaq.push(['_trackPageview', '/easy-design-saved.html']);
							}) ;
		return ;
	}

	showNotice("Working...") ; 

	view.designName = view.saveAsName ; 
	$.ajax({	url : "/ajax/design/createDesign.php" ,
				data: {"json" : JSON.stringify(view.jdesign) , "name" : view.saveAsName , "template_id" : view.templateId, "theme_id" : view.theme_id } ,
				dataType: 'json' ,
				type: 'POST' ,
				success: function(data) {
					if (data.success == 1) {
						window.location.hash = '#design_id=' + data.design_id ;
						view.designId = data.design_id ;

						view.isDesignSaved = true ;
						if (typeof view.callbacks.save == 'function')
							view.callbacks.save() ;
							showNotice("Your design has been saved.") ; 
							updateToolbar();
					}
					else {
						alert("An error occurred while saving your design. Please try again.") ; 
					}
				} ,
				error: function() {
					showAlert("An error occurred while saving your design. Please try again.") ; 
				}

	})  ;
	view.saveAsName = null ; 
}

/*
function warnUnsaved(callbackFunc) {
	if (view.isDesignSaved || view.userWarned) {
		view.userWarned = false ;
		return true ;
	}

	view.userWarned = false ;
//	view.callbacks.warn = callbackFunc ;
	var p = createPopup('Warning' , 420).attr('id' , 'save_warning' ).show() ;
	var b = p.find('.simple-popup-content')
	$('<h4 />').css('margin' , '15px 0px').html('The current design is not saved. Do you want to save it?').appendTo(b) ; 
	$('#gray_box').show() ;
	var buttonWrapper =  $('<div />').css('text-align' , 'center').appendTo(b) ; 
	$('<input />').attr('type' , 'button').val('Save').addClass('action-button medium green').appendTo(buttonWrapper).click(function() {$('#gray_box').hide(); $('#save_warning').remove() ; saveDesign(callbackFunc)}) 
	$('<input />').attr('type' , 'button').val("Don't save").addClass('action-button medium green').appendTo(buttonWrapper).click(function() {$('#gray_box').hide();$('#save_warning').remove() ; view.userWarned = true ; callbackFunc() }) 
	$('<input />').attr('type' , 'button').val("Cancel").addClass('action-button medium green').appendTo(buttonWrapper).click(function() {$('#gray_box').hide(); $('#save_warning').remove() }) 
	
//	return  confirm("Continue without saving?") ;
}
*/

function updateInlineTextEdit(){
	var el = $('.selected.text') ;
	if(el.length != 1) { return } ;
	var element_id = el.attr('id').split('outline_').pop();
	var jtext = getElem(element_id) ;
	updateTextBody(jtext, $(this).val());
}

// Show the login popup
function popupLoginHandler( callbackFunc ) {
	alert('popupLoginHandler');
	showNotice('Please sign in to continue...') ;
	$('#gray_box').show() ;		
	view.callbacks.login = callbackFunc ;
	var loginPopup = createPopup('Sign in or Register', 700).attr('id' , 'login_popup_new').addClass('transparent-popup').fadeIn(300) ;	
	loginPopup.find('.simple-popup-content').remove();
	$('#add_image_popup').remove();
	
	$('<iframe />').attr('id', 'api_login_iframe')
						.attr('src', config.popupLoginUrl + '?url=' + encodeURIComponent('http://' + document.location.hostname + '/ajax/user/easyLoginRedirect.php') ) 
						.attr('frameborder',0)
						.attr('allowtransparency' , true)
						.attr('scrolling' ,'no')
						.height(500)
						.width(700)
						.appendTo(loginPopup);
}

function easyPostLoginHandler(userInfo) {

	if(typeof userInfo.admin_mode != 'undefined' && userInfo.admin_mode * 1 == 1 )
		window.location.reload();
	
	user = userInfo ;
	showNotice('Successfully logged in.') ; 
	$('#gray_box').hide() ;
	$('#login_popup_new').remove();
	$('#add_image_popup').remove();
	
	if (typeof view.callbacks.login == 'function')
		view.callbacks.login(userInfo) ;

	if (typeof headerPostLoginHandler == 'function')
		headerPostLoginHandler(userInfo) ;

	updateToolbar();
}

function isActiveCanvas(){
	return ! ($('#gray_box').is(':visible') || $("input[type='text'] , textarea").not('#temp_text').is(':focus').length > 0 )  ;
}

$(document).on('click', '.menu-opener' , function(e){
	e.stopPropagation();
});

$(document).on('click' , '.toolbar-button' , function(e){
	$(this).parents('.has-menu').removeClass('open');
	e.stopPropagation();

	if( $(this).hasClass('disabled')) {
		return;
	}
	
	switch ($(this).attr('id')){
		case 'btn_insert_text':
			insertText() ;
			break ;

		case 'btn_text_bold':
			applyTextAttr('bold' , ! $(this).hasClass('on') ); 			
			break ;

		case 'btn_text_italic':
			applyTextAttr('italic' , ! $(this).hasClass('on') );
			break ;

		case 'btn_text_gravity_west':
			applyTextAttr('gravity' ,'west');
			break ;

		case 'btn_text_gravity_center':
			applyTextAttr('gravity' ,'center');
			break ;

		case 'btn_text_gravity_east':
			applyTextAttr('gravity' ,'east');
			break ;

		case 'btn_text_auto_fit':
			applyTextAttr('fit_to_box' , ! $(this).hasClass('on') );
			break ;

		case 'btn_edit_undo':

			undo() ;
			break ;
			
		case 'btn_edit_redo':
			redo() ;
			break ;

		case 'btn_edit_lock':
			lockElement() ;
			break ;

		case 'btn_edit_copy':
			copyElements() ;
			break ;

		case 'btn_edit_paste':
			pasteElements() ;
			break ;

		case 'btn_shape_delete':
		case 'btn_image_delete':
		case 'btn_edit_delete':
			deleteSelectedElements() ;
			break ;

		case 'btn_align_left':
			alignEdges('L') ;
			break ;

		case 'btn_align_center':
			alignEdges('C') ;
			break ;

		case 'btn_align_right':
			alignEdges('R') ;
			break ;

		case 'btn_align_top':
			alignEdges('T') ;
			break ;

		case 'btn_align_middle':
			alignEdges('M') ;
			break ;

		case 'btn_align_bottom':
			alignEdges('B') ;
			break ;

		case 'btn_dist_ver':
			distributeElements('V') ;
			break ;

		case 'btn_dist_hor':
			distributeElements('H') ;
			break ;

		case 'btn_arrange_bring_front':
			bringToFront() ;
			break ;

		case 'btn_arrange_send_back':
			sendToBack() ;
			break ;

		case 'btn_arrange_bring_forward':
			bringForward() ;
			break ;

		case 'btn_arrange_send_backward':
			sendBackward() ;
			break ;

		case 'btn_advance_rotate':
			rotateElements() ;
			break ;

		case 'btn_advance_crop':
		case 'btn_image_crop':
			startInlineCrop($('.selected').attr('id').split('outline_img_')[1] ) ;
			break ;

		case 'btn_view_bleed':
			view.showBleed = ! view.showBleed ;
			setBleedAreaVisibility() ;
			break ;

		case 'btn_view_grid':
			view.showGrid = ! view.showGrid ;
			setGridVisibility() ;
			break ;

		case 'btn_view_snap':
			view.snapEnabled = ! view.snapEnabled ; 
			updateToolbar();
			break ;

		case 'btn_view_zoom_out':
			zoomOut() ;
			break ;

		case 'btn_view_zoom_in':
			zoomIn() ;
			break ;

		case 'btn_view_quick_edit':
			view.profileEQ.show_text_panel = ! view.profileEQ.show_text_panel ;
			view.zoomLevel = 0 ;
			refreshView();
			break ;
			
		case 'btn_insert_upload':
			showAddImagePopup();
			break;
		
		case 'btn_proceed':
			proceedToNextPage();
			break;
		
		case 'btn_preview':
			showPreview();
			break;
			
		case 'btn_save':
			saveDesign();
			break;

		case 'btn_save_2':
			saveDesign(undefined , false);
			break;

		case 'btn_save_as':
			saveDesignAs(undefined, false);
			break;
			
		case 'btn_share_email' :
			emailToFriend() ;
			break;
			
		case 'btn_share_facebook' :
			shareOnFacebook() ;
			break;


		case 'btn_save_pdf' :
			downloadPdfProof() ;
			break;

		case 'btn_text_edit' :
			toggleTextboxTool();
			break;

		case 'btn_text_done' :
			toggleTextboxTool(false);
			break;

		case 'btn_text_remove' :
			deleteSelectedElements();
			break;

		case 'btn_crop_done' :
			deselectAll();
			break;

		case 'btn_shape_vline' :
			addShapeToDesign('vline');
			break;

		case 'btn_shape_rect' :
			addShapeToDesign('rect');
			break;
		
		case 'btn_shape_circle' :
			addShapeToDesign('circle');
			break;
		
		case 'btn_shape_hline' :
			addShapeToDesign('hline');
			break;
		
		case 'btn_shape_vline' :
			addShapeToDesign('vline');
			break;
		
		case 'btn_text_bullet_white_circle' :
			applyTextAttr('bullet_style' ,  'white_circle');
			break;

		case 'btn_text_bullet_black_circle' :
			applyTextAttr('bullet_style' ,  'black_circle');
			break;

		case 'btn_text_bullet_white_square' :
			applyTextAttr('bullet_style' ,  'white_square');
			break;

		case 'btn_text_bullet_black_square' :
			applyTextAttr('bullet_style' ,  'black_square');
			break;

		case 'btn_text_bullet_dash' :
			applyTextAttr('bullet_style' ,  'dash');
			break;

		case 'btn_text_bullet_number_dot' :
			applyTextAttr('bullet_style' ,  'number_dot');
			break;

		case 'btn_text_bullet_number_dash' :
			applyTextAttr('bullet_style' ,  'number_dash');
			break;

		case 'btn_text_bullet_number_parenth' :
			applyTextAttr('bullet_style' ,  'number_parenth');
			break;

		case 'btn_text_bullet_none' :
		case 'btn_text_number_none' :
			applyTextAttr('bullet_style' , undefined);
			break;

		
		case 'btn_top_toolbar_toggle':
			view.showAdvancedToolbar = !view.showAdvancedToolbar ;
			if(! view.showAdvancedToolbar) 
				$('#top_toolbar_placeholder').slideUp(300, positionToolbars); 
			else 
				$('#top_toolbar_placeholder').slideDown(300, function(){$(this).css('overflow' , 'visible'); positionToolbars() ;});
			updateToolbar();
			break;

	}
	

});

$(document).on('click' , '.page-navigation-item' , function(e) {
	switchView(view.jdesign, $(this).attr('id').split('_').pop());
});

$(document).on('mouseover' , '.left-textarea' , function(e) {
	highlight.call(  document.getElementById(this.id.replace('tbox_' , 'outline_' )) , e)
}) ; 

$(document).on('mouseout' , '.left-textarea' , function(e) {
	lowlight.call(  document.getElementById(this.id.replace('tbox_' , 'outline_' )) , e)
}) ; 

$(document).on('mousedown' , '.stock-image-price-outline' , showStockImageHelp)

$('#selected_font_size').keydown(function(e){
	if(e.keyCode == 13)
		applyFontSize();
})

$('#design_tool').on('dblclick' , '.outline2.non-selectable.admin' , function(){
	$(this).addClass('selected');
	arrangeImageZees();
	updateToolbar();
});

$('#design_tool').on('dblclick' , '.outline2.locked' , function(e){
	$(this).removeClass('locked');
	selectElement.call(this, e);
});




$(document).on('mousedown', '.outline2' , selectElement);
$(document).on('mousedown', '.outline2' , grabElement);
$(document).on('mouseover', '.outline2' , highlight);
$(document).on('mouseout', '.outline2' , lowlight);
$(document).on('mousedown', '.handle' , triggerResizing);
$(document).on('keydown' , 'textarea , input' , function(e){if (e.keyCode != 27 && $(this).attr('id') != 'temp_text' ) stopPropag(e);});
$(document).on('keyup' , 'textarea , input' , function(e){if ($(this).attr('id') != 'temp_text' ) stopPropag(e);});
$(document).on('keypress' , 'textarea , input' , function(e){if ($(this).attr('id') != 'temp_text' ) stopPropag(e);});
$(document).on( 'mouseup mousedown click' , 'textarea , input' ,stopPropag);

$(document).on('mousedown' , '.menu-opener' , function(e){
	var btn = $(this).closest('.toolbar-button')
	var menu = btn.find('.button-menu');
	if( $(e.target).closest('.button-menu').length == 0 && ! btn.hasClass('disabled') ){ // mousedown on menu items won't close the menu
		btn.toggleClass('open');
	}
	if(btn.hasClass('open') && btn.closest('.float-toolbar').length > 0){
		menu.css('top' , 'auto') ;
		if (findPos(menu[0])[1] + menu.outerHeight(true) > $(window).height() + getPageScrollTop() ){
			menu.cssTop( - menu.outerHeight(true) );
		}
	}
});
$('.ztoolbar').on('mousedown' , function(){
	$('.ztoolbar').css('z-index' , 2500);
	$(this).css('z-index' , 2510);
});
$(document).on('mousedown' , function(e){
	$('.toolbar-button.has-menu').not( $(e.target).closest('.toolbar-button.has-menu') ).removeClass('open');
});


$('#design_tool').on('mouseup', function(e){
	view.mouseUpX = e.pageX ;
	view.mouseUpY = e.pageY ; 
	updateTextToolbars();
});

$(document).on('click' , '.font-size-option' , function(e){
	$('#selected_font_size').val( $(this).text() ) ;
	applyFontSize();
});

$(document).on('click' , '.shape-border-stroke-option' , function(e){
	applyShapeAttr('border_stroke' , $(this).attr('id').split('shape_border_stroke_').pop() ) ; 
});

$(document).on('click' , '.shape-border-width-option' , function(e){
	applyShapeAttr('border_width' , parseInt( $(this).text() ) ) ; 
});

$(document).on('click' , '.image-border-width-option' , function(e){
	applyImageAttr('border_width' , parseInt( $(this).text() ) ) ; 
});

$(document).on('click' , '.font-face-option' , function(e){
	applyTextAttr('font' , $(this).data('font_name') );
});

$('#gray_box').click(function(){
	if($('#add_image_popup').is(':visible') )
		return ;
		
	$('.simple-popup-close').click() ; 
	$('.iframe-popup , #gray_box').hide() ;
	$('.overlay-container').remove() ;
	$('.preview-bar').remove();
	$('#temp_text').focus();
});

function selectNextTextElement(e){
	ie8SafePreventEvent(e) ; 
	e.stopPropagation();

	var current = $('.selected.text') ;
	if(e.shiftKey){
		if(current.prev('.text').length > 0 )
			current.prev('.text').mousedown().mouseup();
		else
			current.parent().find('.text').eq(0).mousedown().mouseup() ;
	}
	else {
		if(current.next('.text').length > 0){
			current.next('.text').mousedown().mouseup();
		}
		else{
			current.parent().find('.text').eq(0).mousedown().mouseup();
		}
	}
}

$(document).ready(function() {
	resetView();
	$('*').not('input').not('textarea').attr('unselectable', 'on').on('selectstart', false);

//	$('input,textarea').keydown(stopPropag).keyup(stopPropag);

//	$('#textbox_tools').append($('<div />').addClass('float-toolbar-handle open-only')).draggable({'handle' : '.float-toolbar-handle'});
	$('#textbox_tools').draggable({'handle' : '#textbox_tools_text_title'});
	$('#text_fields').mouseenter(function(){$(this).css('overflow' , 'auto') });
	$('#text_fields').mouseleave(function(){$(this).css('overflow' , 'hidden') });

	$('#inline_textarea')
		.keyup(updateInlineTextEdit)
		.bind('paste cut', function() { 
				var _this = this ;
				setTimeout(function() { 
					updateInlineTextEdit.call(_this);
				}, 100); 
		})
		.bind('keydown' , function(e){
			if(e.keyCode == 13 && ( e.ctrlKey || e.shiftKey )){
				$('#btn_text_done').click();
			}
			if(e.keyCode == 13 && ( $(this).val().length == 0 || $(this).hasClass('fit') ) ){
				return false ;
			}
			if(e.keyCode == 9){
				selectNextTextElement(e);
			}
		}) ;

	
	window.onbeforeunload = function (e) {
		if (view.isDesignSaved )
			return ; 
		
		var e = e || window.event;
		  // For IE and Firefox
		  if (e) {
			e.returnValue = 'You will lose your design if you leave this page.';
		  }
		  // For Safari
		  return 'You will lose your design if you leave this page.';
		
	}

//	applyUserSettings() ; 
	applyUrlHash() ;
	populateDropDowns() ;

	$('#main_loading').remove() ;
		
	$('#crop_slider').slider({
		min: 1 ,
		max: 2 ,
		step: 0.01,
		slide: function(event, ui) { 
			scaleInnerImage(ui.value);
		} ,
		stop: function(event, ui){
			updateJdesign();
			adjustcropSlider() ;
		}
	});
	

}) ;  

window.onhashchange = applyUrlHash ;
$(document).on('mouseup' , '.color-pick' , stopPropag) ;
$(document).on('click' , '.color-pick' , function(e){
	var btn = $(this).closest('.toolbar-button') ;
	btn.removeClass('open');
	var colorCode = $(this).data('color') + (typeof $(this).data('color_index')!= 'undefined' ? ('#' +  $(this).data('color_index')) : '' ) ;

	switch(btn.attr('id')){
		case 'btn_text_font_color': 
			applyTextAttr('color' , colorCode ) ;
			break;

		case 'btn_shape_fill_color': 
			applyShapeAttr('fill_color' ,  colorCode) ;
			break;

		case 'btn_shape_border_color': 
			applyShapeAttr('border_color' ,  colorCode) ;
			break;

		case 'btn_image_border_color': 
			applyImageAttr('border_color' ,  colorCode) ;
			break;

		case 'btn_bg_color': 
			applyBgColor(colorCode) ;
			break;

		case 'svg_tools': 
			applySvgColor(colorCode) ;
			break;

	}
});

$(document).on('mouseup', '.svg-color-item' , stopPropag) ; 
$(document).on('mousedown', '.svg-color-item' , function(){
	var el= getElem($('.selected.svg').attr('id').split('outline_')[1]) ;
	$(this).addClass('on').siblings().removeClass('on');
	$('#svg_color_control').addClass('open');
	$('#svg_color_menu .color-pick').removeClass('on');
	$('#svg_color_menu .color-'+ el.svg_colors[$(this).index()].replace('#' , '_') ).addClass('on');
});

//document.oncontextmenu = function(){return false};
$(document).mousedown(function(e) {
	view.mouseDownX = e.pageX ;
	view.mouseDownY = e.pageY ;
	view.dragLockX = true;
	view.dragLockY = true;
	if ( e.target  == document.body || ($.inArray(e.target.id , ['tool_placeholder','workspace','left_panel','page_navigation'] ) != -1 )) {
		view.selectorX = e.pageX - getCanvasX() ;
		view.selectorY = e.pageY - getCanvasY() ;
		deselectAll() ;
	}
}) ; 


$(document).mouseup(function(e) {
		view.mouseUpX = e.pageX ;
		view.mouseUpY = e.pageY ; 
		if(! view.showBleed) 
			$('.safe-zone-mask').hide();
		$('.snap-guide').hide();
		$('.image-mask').removeClass('crop');
		$('.grabbed').removeClass('grabbed') ; 
		$('.qcrop').removeClass('qcrop') ; 
		$('.resizing').removeClass('resizing') ; 
		$('.outline2').css("cursor" , "") ; 
		$('#droppable_layers').hide() ;
		arrangeOutlineZindex() ; 
		
		for (i in view.hSnapPoints)
			view.hSnapBuffer[i] = 0 ;

		for (i in view.hSnapPoints)
			view.vSnapBuffer[i] = 0 ;

		updateJdesign() ;

		// Exist the tool from resizing state
		if (view.resizing ){
			view.resizing = false ; 

			if (typeof resize.jel != 'undefined') {
				if (typeof resize.jel.fotoliaId != 'undefined'){
					updateFotoliaLicense(resize.jel) ;
					updateStockImagePrices() ;
				}
				// Regular Images
				else if (typeof resize.jel.image_id != 'undefined'){
					checkImageResolution(resize.jel) ;
				}
				else if (typeof resize.jel.shape_type!= 'undefined'){
					$('#inner_img_'+resize.jel.name).attr('src' , getMockupSrc(resize.jel));
				}
			
			}
			
		}

		if (typeof view.selectorX != 'undefined')  {
			delete view.selectorX ;
			delete view.selectorY ; 
			$('#multi_selector').hide() ; 
			updateToolbar() ; 
		}

}) ;

$(window).resize(positionToolbars) ;
$(window).scroll(positionToolbars) ;

$(document).keyup(function(e) {
//	console.log(e.keyCode);
	// push movement with cursor when the key is released 
	if (isActiveCanvas() || e.keyCode == 83 && e.ctrlKey) {
		ie8SafePreventEvent(e) ; 
		if (e.keyCode == 37 ||  e.keyCode == 38 || e.keyCode == 39 || e.keyCode == 40 ) {
				updateJdesign() ; 
		}
	}

	if(e.keyCode == 13 && ! e.ctrlKey && !  e.shiftKey && $('#textbox_tools').is(':visible') &&  $('#textbox_tools').hasClass('close')){
		toggleTextboxTool(true);
	}


}) ; 

$(document).keypress(function(e) {
	// disabling browser save action on Ctrl + S
//	console.log('keypress', e.charCode);
	if (e.ctrlKey  && (e.charCode == 115 || e.charCode == 83 )) {
		ie8SafePreventEvent(e) ; 
	}

	// CTRL + A
	if (e.ctrlKey && (e.charCode == 65 || e.charCode == 97) ) {
		ie8SafePreventEvent(e) ; 
		if(isActiveCanvas()){
			$('#outline_layers .outline2').not('.locked').not('.non-selectable').addClass('selected') ; 
			updateToolbar() ; 
		}
	}

}) ;

$(document).keydown(function(e) { 
//	console.log('keydown' , e.keyCode);
	// CTRL + A
	if (e.ctrlKey && e.keyCode == 65) {
		ie8SafePreventEvent(e) ; 
		if(isActiveCanvas()){
			$('#outline_layers .outline2').not('.locked').not('.non-selectable').not('.pholder').addClass('selected') ; 
			updateToolbar() ; 
		}
	}
	
	// disable browser zoom in and out 
	if (!window.ActiveXObject && e.ctrlKey && (e.keyCode == 187 || e.keyCode == 107 || e.keyCode == 61) ){
		ie8SafePreventEvent(e) ; 
		zoomIn();
	}

	if (!window.ActiveXObject && e.ctrlKey && ( e.keyCode == 189 || e.keyCode == 109 || e.keyCode == 173)) {
		ie8SafePreventEvent(e) ; 
		zoomOut();
	}

	// ESC key
		
	if(e.keyCode == 27){
		$('#gray_box').click() ; 
		$('.drop-down').removeClass('open') ; 
		deselectAll();
		$('#loading').hide();
		clearTimeout(view.loadingTimer);
	}
	
	// Ctrl + S
	if (e.keyCode == 83 && e.ctrlKey) {
		ie8SafePreventEvent(e) ; 
		if (user.admin_mode === 1){
			if(e.shiftKey){
				admin.saveTemplate();
			} else {
				admin.updateTemplate();
			}
		}
		else {
			if(e.shiftKey){
				saveDesignAs();
			} else {
				saveDesign();
			}
		}
	}

	if (isActiveCanvas()) {
		if (e.keyCode == 9){
			selectNextTextElement(e);
		}
		// CTRL + Z
		else if (e.keyCode == 90 && e.ctrlKey){
			ie8SafePreventEvent(e) ; 
			undo() ;
		}
		// CTRL + Y
		else if (e.keyCode == 89 && e.ctrlKey){
			ie8SafePreventEvent(e) ; 
			redo() ;
		}
		// CTRL + C
		else if (e.keyCode == 67 && e.ctrlKey){
			ie8SafePreventEvent(e) ; 
			copyElements() ;
		}
		// CTRL + V
		else if (e.keyCode == 86 && e.ctrlKey){
			ie8SafePreventEvent(e) ; 
			pasteElements() ;
		}

		// DEL key and Backspace key
		else if (e.keyCode == 46 || e.keyCode == 8) {
			ie8SafePreventEvent(e) ;
			deleteSelectedElements() ; 
			updateToolbar() ; 
			return ;
		}


		// left cursor
		else if (e.keyCode == 37) {
			ie8SafePreventEvent(e) ; 
			$(".selected").not('.unmovable').not('.crop-box').each(function() {
				view.outdatedJdesign = true ;
				newL = $(this).cssLeft() - 1 ;
				$(this).cssLeft(newL) ;
				$('#' +	$(this).attr('id').split('outline_')[1]).cssLeft(newL) ;
			}) ; 
		}
		// up cursor
		else if (e.keyCode == 38) {
			ie8SafePreventEvent(e) ; 
			$(".selected").not('.unmovable').not('.crop-box').each(function() {
				view.outdatedJdesign = true ;					
				newT = $(this).cssTop() - 1 ;
				$(this).cssTop(newT) ;
				$('#' +	$(this).attr('id').split('outline_')[1]).cssTop(newT) ;
			}) ; 
		}
		// right cursor
		else if (e.keyCode == 39) {
			ie8SafePreventEvent(e) ; 
			$(".selected").not('.unmovable').not('.crop-box').each(function() {
				view.outdatedJdesign = true ;					
				var newL = $(this).cssLeft() + 1 ;
				$(this).cssLeft(newL) ;
				$('#' +	$(this).attr('id').split('outline_')[1]).cssLeft(newL) ;
			}) ; 
		}

		// down cursor
		else if (e.keyCode == 40) {
			ie8SafePreventEvent(e) ; 
			$(".selected").not('.unmovable').not('.crop-box').each(function() {
				view.outdatedJdesign = true ;					
				var newT = $(this).cssTop() + 1 ;
				$(this).cssTop(newT) ;
				$('#' +	$(this).attr('id').split('outline_')[1]).cssTop(newT) ;
			}) ; 
		}
	}
	
}) ;

$(document).mousemove(function(e) {
	view.mousePosX = e.pageX ;
	view.mousePosY = e.pageY ;
	
	if (typeof view.selectorX !== 'undefined'){
		ie8SafePreventEvent(e) ;
		startMultiSelect(e) ; 
	}
	else if (view.resizing) {
		resizeElement(e) ;
	}
	else if ($(".grabbed").length > 0 || $(".qcrop").length > 0 ) {
		dragElement(e) ; 
	}
}) ;

$(document).on('click' , '.ez-theme-option' , function(e){
	var theme_id = $(this).attr('id').split('_').pop() ;
	var theme ;
	$.each(view.themes, function(k,v){
		if(v.id * 1 == theme_id *1 ){
			theme = v ;
		}
	});
	applyThemeToDesign(theme);
});

/*
function easyLogout(){
	if (typeof warnUnsaved != 'undefined' && ! warnUnsaved(easyLogout)) return ;
	window.location = env.logoutURL ;
}
*/


