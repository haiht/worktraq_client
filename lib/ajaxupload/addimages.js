function addImage(src,iid, name, icons, url) {
	var newDiv = document.createElement("div");
	newDiv.className = "div_image";
	var newImg = document.createElement("img");
	newImg.className = 'thumb';
	
	var addImg = document.createElement('img');
	addImg.src = url+icons.active;
	addImg.style.display = 'none';
	addImg.title = "Go Inactive";
	addImg.id = "img_enable_"+iid;
	addImg.className = 'icon';

	if(addImg.addEventListener)
		addImg.addEventListener("click",function(){change_status(addImg, iid, name, 0, 'active');},false);
	else if (addImg.attachEvent)
		addImg.attachEvent("onclick",function(){change_status(addImg, iid, name, 0, 'active');});
	else
		addImg.onclick=function(){change_status(addImg, iid, name, 0, 'active');};

	var removeImg = document.createElement('img');
	removeImg.src = url+icons.inactive;
	removeImg.title = "Go Active";
	removeImg.id = "img_disable_"+iid;
	removeImg.className = 'icon';
	if(removeImg.addEventListener)
		removeImg.addEventListener("click",function(){change_status(removeImg, iid, name, 1, 'active');},false);
	else if (removeImg.attachEvent)
		removeImg.attachEvent("onclick",function(){change_status(removeImg, iid, name, 1, 'active');});
	else
		removeImg.onclick=function(){change_status(removeImg, iid, name, 1, 'active');};
	
	var productImg = document.createElement('img');
	productImg.src = url+icons.product;
	productImg.style.display = 'none';
	productImg.title = "Go sample image";
	productImg.id = "img_product_"+iid;
	productImg.className = 'icon';

	if(productImg.addEventListener)
		productImg.addEventListener("click",function(){change_status(productImg, iid, name, 0, 'type');},false);
	else if (productImg.attachEvent)
		productImg.attachEvent("onclick",function(){change_status(productImg, iid, name, 0, 'type');});
	else
		productImg.onclick=function(){change_status(productImg, iid, name, 0, 'type');};

	var sampleImg = document.createElement('img');
	sampleImg.src = url+icons.sample;
	//sampleImg.style.display = 'none';
	sampleImg.title = "Go product image";
	sampleImg.id = "img_sample_"+iid;
	sampleImg.className = 'icon';

	if(sampleImg.addEventListener)
		sampleImg.addEventListener("click",function(){change_status(sampleImg, iid, name, 1, 'type');},false);
	else if (sampleImg.attachEvent)
		sampleImg.attachEvent("onclick",function(){change_status(sampleImg, iid, name, 1, 'type');});
	else
		sampleImg.onclick=function(){change_status(sampleImg, iid, name, 1, 'type');};

	
	var delImg = document.createElement('img');
	delImg.src = url+icons.delete;
	delImg.id ="img_delete_"+iid;
	delImg.title = "Delete Image";
	delImg.className = 'icon';
	if(delImg.addEventListener)
		delImg.addEventListener("click",function(){delete_image(delImg, iid, name,0,'delete');},false);
	else if (delImg.attachEvent)
		delImg.attachEvent("onclick",function(){delete_image(delImg, iid, name,0,'delete');});
	else
		delImg.onclick=function(){delete_image(delImg, iid, name,0,'delete');};
	
	var divThumbs = document.getElementById("div_list_thumb");


	var savecodeImg = document.createElement('img');
	savecodeImg.src = url+icons.savecode;
	savecodeImg.style.display = '';
	savecodeImg.title = "Go sample image";
	savecodeImg.id = "img_savecode_"+iid;
	savecodeImg.className = 'icon';
	
	if(savecodeImg.addEventListener)
		savecodeImg.addEventListener("click",function(){edit_code(savecodeImg, iid, name, 'savecode');},false);
	else if (savecodeImg.attachEvent)
		savecodeImg.attachEvent("onclick",function(){edit_code(savecodeImg, iid, name, 'savecode');});
	else
		savecodeImg.onclick=function(){edit_code(savecodeImg, iid, name, 'savecode');};

	var savecodeInput = document.createElement('input');
	savecodeInput.type = 'text';
	savecodeInput.id = "txt_savecode_"+iid;
	savecodeInput.className = 'txt_code';
	savecodeInput.placeholder = 'Image Code';

	if(savecodeInput.addEventListener)
		savecodeInput.addEventListener("change",function(){save_code(savecodeInput, iid, name, 'savecode');},false);
	else if (savecodeInput.attachEvent)
		savecodeInput.attachEvent("onchange",function(){save_code(savecodeInput, iid, name, 'savecode');});
	else
		savecodeInput.onchange=function(){save_code(savecodeInput, iid, name, 'savecode');};


	/*
	var anch = document.createElement('a');
	anch.setAttribute('href', url+'admin/product/hot-spot/'+iid+'/edit');
	anch.setAttribute('target','_parent');
	anch.setAttribute('title','Create hot spot');
	var map = document.createElement('img');
	map.src = url+icons.map;
	map.border = '0';
	map.className = 'icon';
	*/
	divThumbs.insertBefore(newDiv,divThumbs.firstChild);
	newDiv.insertBefore(newImg, newDiv.firstChild);
	//newDiv.insertBefore(savecodeImg, newDiv.firstChild);
	newDiv.insertBefore(savecodeInput, newDiv.firstChild);
	newDiv.insertBefore(delImg, newDiv.firstChild);
	//newDiv.insertBefore(anch, newDiv.firstChild);
	newDiv.insertBefore(sampleImg, newDiv.firstChild);
	newDiv.insertBefore(productImg, newDiv.firstChild);
	newDiv.insertBefore(addImg, newDiv.firstChild);
	newDiv.insertBefore(removeImg, newDiv.firstChild);

	//anch.insertBefore(map, anch.firstChild);
	
	if (newImg.filters) {
		try {
			newImg.filters.item("DXImageTransform.Microsoft.Alpha").opacity = 0;
		} catch (e) {
			// If it is not set initially, the browser will throw an error.  This will set it if it is not set yet.
			newImg.style.filter = 'progid:DXImageTransform.Microsoft.Alpha(opacity=' + 0 + ')';
		}
	} else {
		newImg.style.opacity = 0;
	}

	newImg.onload = function () {
		fadeIn(newImg, 0);
	};
	//alert('Anh: '+src);
	newImg.src = url+src;
}
function addImageSignageLayout(src,iid, name, icons, url, div_id, active_status) {
	var newDiv = document.createElement("div");
	newDiv.className = "div_image";
	var newImg = document.createElement("img");
	newImg.className = 'thumb';
	
	var addImg = document.createElement('img');
	addImg.src = url+icons.active;
	addImg.title = "Go Inactive";
	addImg.id = "img_enable_"+iid;
	addImg.className = 'icon';
	if(active_status==0)
		addImg.style.display = '';
	else
		addImg.style.display = 'none';
	if(addImg.addEventListener)
		addImg.addEventListener("click",function(){change_status(addImg, iid, name, 1, 'active');},false);
	else if (addImg.attachEvent)
		addImg.attachEvent("onclick",function(){change_status(addImg, iid, name, 1, 'active');});
	else
		addImg.onclick=function(){change_status(addImg, iid, name, 1, 'active');};

	var removeImg = document.createElement('img');
	removeImg.src = url+icons.inactive;
	removeImg.title = "Go Active";
	removeImg.id = "img_disable_"+iid;
	removeImg.className = 'icon';
	if(active_status==0)
		removeImg.style.display = 'none';
	else
		removeImg.style.display = '';
	if(removeImg.addEventListener)
		removeImg.addEventListener("click",function(){change_status(removeImg, iid, name, 0, 'active');},false);
	else if (removeImg.attachEvent)
		removeImg.attachEvent("onclick",function(){change_status(removeImg, iid, name, 0, 'active');});
	else
		removeImg.onclick=function(){change_status(removeImg, iid, name, 0, 'active');};

	
	var delImg = document.createElement('img');
	delImg.src = url+icons.delete;
	delImg.id ="img_delete_"+iid;
	delImg.title = "Delete Image";
	delImg.className = 'icon';
	if(delImg.addEventListener)
		delImg.addEventListener("click",function(){delete_image(delImg, iid, name,0,'delete');},false);
	else if (delImg.attachEvent)
		delImg.attachEvent("onclick",function(){delete_image(delImg, iid, name,0,'delete');});
	else
		delImg.onclick=function(){delete_image(delImg, iid, name,0,'delete');};
	
	var divThumbs = document.getElementById(div_id);
	
	var anch = document.createElement('a');
	anch.setAttribute('href', url+'admin/product/signage-layout/'+iid+'/map');
	anch.setAttribute('target','_parent');
	anch.setAttribute('title','Create hot spot');
	var map = document.createElement('img');
	map.src = url+icons.map;
	map.border = '0';
	map.className = 'icon';
	
	divThumbs.insertBefore(newDiv,divThumbs.firstChild);
	newDiv.insertBefore(newImg, newDiv.firstChild);
	newDiv.insertBefore(delImg, newDiv.firstChild);
	newDiv.insertBefore(anch, newDiv.firstChild);
	newDiv.insertBefore(addImg, newDiv.firstChild);
	newDiv.insertBefore(removeImg, newDiv.firstChild);

	anch.insertBefore(map, anch.firstChild);
	
	if (newImg.filters) {
		try {
			newImg.filters.item("DXImageTransform.Microsoft.Alpha").opacity = 0;
		} catch (e) {
			// If it is not set initially, the browser will throw an error.  This will set it if it is not set yet.
			newImg.style.filter = 'progid:DXImageTransform.Microsoft.Alpha(opacity=' + 0 + ')';
		}
	} else {
		newImg.style.opacity = 0;
	}

	newImg.onload = function () {
		fadeIn(newImg, 0);
	};
	//alert('Anh: '+src);
	newImg.src = url+src;
}

function fadeIn(element, opacity) {
	var reduceOpacityBy = 5;
	var rate = 30;	// 15 fps


	if (opacity < 100) {
		opacity += reduceOpacityBy;
		if (opacity > 100) {
			opacity = 100;
		}

		if (element.filters) {
			try {
				element.filters.item("DXImageTransform.Microsoft.Alpha").opacity = opacity;
			} catch (e) {
				// If it is not set initially, the browser will throw an error.  This will set it if it is not set yet.
				element.style.filter = 'progid:DXImageTransform.Microsoft.Alpha(opacity=' + opacity + ')';
			}
		} else {
			element.style.opacity = opacity / 100;
		}
	}

	if (opacity < 100) {
		setTimeout(function () {
			fadeIn(element, opacity);
		}, rate);
	}
}