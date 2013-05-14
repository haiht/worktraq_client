$(document).ready(function() {
	//Menu Home
	$('#megahome').mouseover(function(){
		$('#megahome').addClass('withSubHover');
	});
	$('#megahome').mouseout(function(){
		$('#megahome').removeClass('withSubHover');
	});
		//Sub menu Home
		$('#menu_update').click(function(){
			$('#menu_hethong').removeClass('selected');
            $('#menu_website').removeClass('selected');
			$('#menu_update').addClass('selected');
			$('#sphethong').hide();
			$('#spwebsite').hide();
			$('#spupdate').show();
			
		});
        $('#menu_website').click(function(){
            $('#menu_update').removeClass('selected');
            $('#menu_hethong').removeClass('selected');
            $('#menu_website').addClass('selected');
            $('#sphethong').hide();
            $('#spupdate').hide();
            $('#spwebsite').show();
        });

		
		$('#menu_hethong').click(function(){
			$('#menu_update').removeClass('selected');
			$('#menu_website').removeClass('selected');
			$('#menu_hethong').addClass('selected');
			$('#spupdate').hide();
            $('#spwebsite').hide();
			$('#sphethong').show();
		});
		
	//Menu Product
	$('#megaproduct').mouseover(function(){
		$('#megaproduct').addClass('withSubHover');
		$('#megaproduct_sub').show();
		
	});
	$('#megaproduct').mouseout(function(){
		$('#megaproduct').removeClass('withSubHover');
		$('#megaproduct_sub').hide();
	});
	
	//Menu Shop
	$('#megashop').mouseover(function(){
		$('#megashop').addClass('withSubHover');
		$('#megashop_sub').show();
	});
	$('#megashop').mouseout(function(){
		$('#megashop').removeClass('withSubHover');
		$('#megashop_sub').hide();
	});
	
	//Menu Support
	$('#megasupport').mouseover(function(){
		$('#megasupport').addClass('withSubHover');
		$('#megasupport_sub').show();
	});
	$('#megasupport').mouseout(function(){
		$('#megasupport').removeClass('withSubHover');
		$('#megasupport_sub').hide();
	});
	
	//Menu New
	$('#megaexperiencesony').mouseover(function(){
		$('#megaexperiencesony').addClass('withSubHover');
		$('#megaexperiencesony_sub').show();
	});
	$('#megaexperiencesony').mouseout(function(){
		$('#megaexperiencesony').removeClass('withSubHover');
		$('#megaexperiencesony_sub').hide();
	});

});
