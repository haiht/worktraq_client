function readKey(key,data,type){
	if(data=='undefined' || data == null || data=="")
		return "";
	var k = "{"+key+"=";
	var p = data.indexOf(k,0);
	if(p==-1) return (type=="int")?-1:"";
	var val = data.substring(p+k.length,data.length);
	p = val.indexOf("}",0);
	val = (p>=0)?val.substring(0,p):val;
	switch(type){
		case "int":
			val = parseInt(val,10);
			return isNaN(val)?-1:val;
			break;
		default:
			return val;
			break;
	}
}
function validate_numeric(This, evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
function forceNumericInput(This, AllowDot, AllowMinus, event)
{
	var event = event || window.event;
	//var charCode = (evt.which) ? evt.which : event.keyCode
	if(arguments.length == 1)
	{
		var s = This.value;
		// if "-" exists then it better be the 1st character
		var i = s.lastIndexOf("-");
		if(i == -1)
			return;
		if(i != 0)
			This.value = s.substring(0,i)+s.substring(i+1);
		return;
	}

	//var code = event.keyCode;
	var code = (event.which) ? event.which : event.keyCode;
	//alert(code);
	switch(code)
	{
		case 8:     // backspace
		case 9: //tab
		case 37:    // left arrow
		case 39:    // right arrow
		case 46:    // delete
			event.returnValue=true;
			return;
	}
	if(code == 189)     // minus sign
	{
		if(AllowMinus == false)
		{
			event.returnValue=false;
			if(event.preventDefault) event.preventDefault();
			return;
		}


		// wait until the element has been updated to see if the minus is in the right spot
		var s = "ForceNumericInput(document.getElementById('"+This.id+"'))";
		setTimeout(s, 250);
		return;
	}
	if(AllowDot && code == 190)
	{
		if(This.value.indexOf(".") >= 0)
		{
			// don't allow more than one dot
			event.returnValue=false;
			if(event.preventDefault) event.preventDefault();
			return;
		}
		event.returnValue=true;
		return;
	}
	// allow character of between 0 and 9
	if(code >= 48 && code <= 57)
	{
		event.returnValue=true;
		return;
	}
	event.returnValue=false;
	if(event.preventDefault) event.preventDefault();
}

function replaceText(str,findText, replaceText){
	var found = true;
	var p=-1;
	do{
		p = str.indexOf(findText);
		if(p>=0)
			str = str.replace(findText, replaceText);
		else
			found = false;
	}while(found);
	return str;
}

function replaceAll(str){
	str = replaceText(str,'    ','&nbsp;&nbsp;&nbsp;&nbsp;');
	str = replaceText(str,'   ','&nbsp;&nbsp;&nbsp;');
	str = replaceText(str,'  ','&nbsp;&nbsp;');
	str = replaceText(str,'<','&lt;');
	str = replaceText(str,'>','&gt;');
	str = replaceText(str,'	','&nbsp;&nbsp;&nbsp;&nbsp;');
	str = replaceText(str,'\n','<br />');
	return str;
}

function isValidEmail(email){
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return filter.test(email);
}
function isPhoneNumber(s){
 	if(s=='') return false;
	 // Check for correct phone number
	 var rePhoneNumber1 = new RegExp(/^\([0-9]\d{1}\)\s?\d{2}\-\d{3}\-\d{3}$/);
 	 var rePhoneNumber2 = new RegExp(/^\([0-9]\d{2}\)\s?\d{3}\-\d{4}$/);
 	 var rePhoneNumber3 = new RegExp(/^\([0-9]\d{3}\)\s?\d{3}\-\d{3}$/);
	 if (!rePhoneNumber1.test(s) && !rePhoneNumber2.test(s) && !rePhoneNumber3.test(s)) {
		  //alert("Phone Number Must Be Entered As: (555) 555-1234");
		  return false;
	 }
 
	return true;
} 
function isValidDateTime(datetime, spl, vn){
	var f = true;
	while(f){
		f = datetime.indexOf(' ')>=0;
		if(f) datetime = datetime.replace(' ','');
	}
	if(datetime.length<10) return false;
	var date = datetime.substring(0,10);
	var time = datetime.replace(date,'');
	var arr_d = date.split(spl);
	if(arr_d.length!=3) return false;
	var arr_t = time.split(':');
	var i =0;
	var dd = vn?arr_d[0]:arr_d[2];
	var mn = arr_d[1];
	var yy = vn?arr_d[2]:arr_d[0];
	dd = parseInt(dd,10);
	mn = parseInt(mn,10);
	yy = parseInt(yy,10);
	var hh = 0;
	var mi = 0;
	var ss = 0;
	for(i=0;i<arr_t.length;i++){
		if(i==0){
			hh = arr_t[i];
			hh = parseInt(hh,10);
			if(isNaN(hh)) hh=0;
		}else if(i==1){
			mi = arr_t[i];
			mi = parseInt(mi,10);
			if(isNaN(mi)) mi=0;
		}else if(i==2){
			ss = arr_t[i];
			ss = parseInt(ss,10);
			if(isNaN(ss)) ss=0;
		}
	}
	var cd = new Date(yy,mn-1,dd,hh,mi,ss);
	//alert(dd+'-'+mn+'-'+yy+ ' '+ hh+':'+mi+':'+ss);
	return (yy==cd.getFullYear()) && (mn-1==cd.getMonth()) && (dd==cd.getDate()) && (mi==cd.getMinutes()) && (hh==cd.getHours()) && (ss==cd.getSeconds());	
}

function set_cookie( name, value, expires, path, domain, secure ){
	// set time, it's in milliseconds
	var today = new Date();
	today.setTime( today.getTime() );
	
	/*
	if the expires variable is set, make the correct
	expires time, the current script below will set
	it for x number of days, to make it for hours,
	delete * 24, for minutes, delete * 60 * 24
	*/
	if ( expires ){
		//expires = expires * 1000 * 60 * 60 * 24;
        expires = expires * 1000 * 60;
	}
	var expires_date = new Date( today.getTime() + (expires) );
	
	document.cookie = name + "=" + value  + ( ( expires ) ? ";expires=" + expires_date.toGMTString() : "" ) + 	( ( path ) ? ";path=" + path : "" ) + 	( ( domain ) ? ";domain=" + domain : "" ) + ( ( secure ) ? ";secure" : "" );
}

// this fixes an issue with the old method, ambiguous values
// with this test document.cookie.indexOf( name + "=" );
function get_cookie( check_name ) {
	// first we'll split this cookie up into name/value pairs
	// note: document.cookie only returns name=value, not the other components
	var a_all_cookies = document.cookie.split( ';' );
	var a_temp_cookie = '';
	var cookie_name = '';
	var cookie_value = '';
	var b_cookie_found = false; // set boolean t/f default f

	for ( i = 0; i < a_all_cookies.length; i++ ){
		// now we'll split apart each name=value pair
		a_temp_cookie = a_all_cookies[i].split( '=' );


		// and trim left/right whitespace while we're at it
		cookie_name = a_temp_cookie[0].replace(/^\s+|\s+$/g, '');

		// if the extracted name matches passed check_name
		if ( cookie_name == check_name )		{
			b_cookie_found = true;
			// we need to handle case where cookie has no value but exists (no = sign, that is):
			if ( a_temp_cookie.length > 1 )	{
				cookie_value = unescape( a_temp_cookie[1].replace(/^\s+|\s+$/g, '') );
			}
			// note that in cases where cookie is initialized but no value, null is returned
			return cookie_value;
			break;
		}
		a_temp_cookie = null;
		cookie_name = '';
	}
	if ( !b_cookie_found ){
		return null;
	}
}

// this deletes the cookie when called
function delete_cookie( name, path, domain ) {
	if ( get_cookie( name ) ) 
		document.cookie = name + "=" + ( ( path ) ? ";path=" + path : "") + ( ( domain ) ? ";domain=" + domain : "" ) + ";expires=Thu, 01-Jan-1970 00:00:01 GMT";
}

function convert_time_to_string(time){
	var s = time % 60;
	time = (time - s)/60;
	var i = time % 60;
	time = (time - i)/60;
	var h = time;
	s = '0'+s;
	i = '0'+i;
	h = '0'+h;
	return h.substring(h.length-2, h.length)+':'+i.substring(i.length-2, i.length)+':'+s.substring(s.length-2, s.length);
}
function html_entity_decode (string, quote_style) {
  // http://kevin.vanzonneveld.net
  // +   original by: john (http://www.jd-tech.net)
  // +      input by: ger
  // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // +    revised by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // +   bugfixed by: Onno Marsman
  // +   improved by: marc andreu
  // +    revised by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // +      input by: Ratheous
  // +   bugfixed by: Brett Zamir (http://brett-zamir.me)
  // +      input by: Nick Kolosov (http://sammy.ru)
  // +   bugfixed by: Fox
  // -    depends on: get_html_translation_table
  // *     example 1: html_entity_decode('Kevin &amp; van Zonneveld');
  // *     returns 1: 'Kevin & van Zonneveld'
  // *     example 2: html_entity_decode('&amp;lt;');
  // *     returns 2: '&lt;'
  var hash_map = {},
    symbol = '',
    tmp_str = '',
    entity = '';
  tmp_str = string.toString();

  if (false === (hash_map = this.get_html_translation_table('HTML_ENTITIES', quote_style))) {
    return false;
  }

  // fix &amp; problem
  // http://phpjs.org/functions/get_html_translation_table:416#comment_97660
  delete(hash_map['&']);
  hash_map['&'] = '&amp;';

  for (symbol in hash_map) {
    entity = hash_map[symbol];
    tmp_str = tmp_str.split(entity).join(symbol);
  }
  tmp_str = tmp_str.split('&#039;').join("'");

  return tmp_str;
}
function get_html_translation_table (table, quote_style) {
  // http://kevin.vanzonneveld.net
  // +   original by: Philip Peterson
  // +    revised by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // +   bugfixed by: noname
  // +   bugfixed by: Alex
  // +   bugfixed by: Marco
  // +   bugfixed by: madipta
  // +   improved by: KELAN
  // +   improved by: Brett Zamir (http://brett-zamir.me)
  // +   bugfixed by: Brett Zamir (http://brett-zamir.me)
  // +      input by: Frank Forte
  // +   bugfixed by: T.Wild
  // +      input by: Ratheous
  // %          note: It has been decided that we're not going to add global
  // %          note: dependencies to php.js, meaning the constants are not
  // %          note: real constants, but strings instead. Integers are also supported if someone
  // %          note: chooses to create the constants themselves.
  // *     example 1: get_html_translation_table('HTML_SPECIALCHARS');
  // *     returns 1: {'"': '&quot;', '&': '&amp;', '<': '&lt;', '>': '&gt;'}
  var entities = {},
    hash_map = {},
    decimal;
  var constMappingTable = {},
    constMappingQuoteStyle = {};
  var useTable = {},
    useQuoteStyle = {};

  // Translate arguments
  constMappingTable[0] = 'HTML_SPECIALCHARS';
  constMappingTable[1] = 'HTML_ENTITIES';
  constMappingQuoteStyle[0] = 'ENT_NOQUOTES';
  constMappingQuoteStyle[2] = 'ENT_COMPAT';
  constMappingQuoteStyle[3] = 'ENT_QUOTES';

  useTable = !isNaN(table) ? constMappingTable[table] : table ? table.toUpperCase() : 'HTML_SPECIALCHARS';
  useQuoteStyle = !isNaN(quote_style) ? constMappingQuoteStyle[quote_style] : quote_style ? quote_style.toUpperCase() : 'ENT_COMPAT';

  if (useTable !== 'HTML_SPECIALCHARS' && useTable !== 'HTML_ENTITIES') {
    throw new Error("Table: " + useTable + ' not supported');
    // return false;
  }

  entities['38'] = '&amp;';
  if (useTable === 'HTML_ENTITIES') {
    entities['160'] = '&nbsp;';
    entities['161'] = '&iexcl;';
    entities['162'] = '&cent;';
    entities['163'] = '&pound;';
    entities['164'] = '&curren;';
    entities['165'] = '&yen;';
    entities['166'] = '&brvbar;';
    entities['167'] = '&sect;';
    entities['168'] = '&uml;';
    entities['169'] = '&copy;';
    entities['170'] = '&ordf;';
    entities['171'] = '&laquo;';
    entities['172'] = '&not;';
    entities['173'] = '&shy;';
    entities['174'] = '&reg;';
    entities['175'] = '&macr;';
    entities['176'] = '&deg;';
    entities['177'] = '&plusmn;';
    entities['178'] = '&sup2;';
    entities['179'] = '&sup3;';
    entities['180'] = '&acute;';
    entities['181'] = '&micro;';
    entities['182'] = '&para;';
    entities['183'] = '&middot;';
    entities['184'] = '&cedil;';
    entities['185'] = '&sup1;';
    entities['186'] = '&ordm;';
    entities['187'] = '&raquo;';
    entities['188'] = '&frac14;';
    entities['189'] = '&frac12;';
    entities['190'] = '&frac34;';
    entities['191'] = '&iquest;';
    entities['192'] = '&Agrave;';
    entities['193'] = '&Aacute;';
    entities['194'] = '&Acirc;';
    entities['195'] = '&Atilde;';
    entities['196'] = '&Auml;';
    entities['197'] = '&Aring;';
    entities['198'] = '&AElig;';
    entities['199'] = '&Ccedil;';
    entities['200'] = '&Egrave;';
    entities['201'] = '&Eacute;';
    entities['202'] = '&Ecirc;';
    entities['203'] = '&Euml;';
    entities['204'] = '&Igrave;';
    entities['205'] = '&Iacute;';
    entities['206'] = '&Icirc;';
    entities['207'] = '&Iuml;';
    entities['208'] = '&ETH;';
    entities['209'] = '&Ntilde;';
    entities['210'] = '&Ograve;';
    entities['211'] = '&Oacute;';
    entities['212'] = '&Ocirc;';
    entities['213'] = '&Otilde;';
    entities['214'] = '&Ouml;';
    entities['215'] = '&times;';
    entities['216'] = '&Oslash;';
    entities['217'] = '&Ugrave;';
    entities['218'] = '&Uacute;';
    entities['219'] = '&Ucirc;';
    entities['220'] = '&Uuml;';
    entities['221'] = '&Yacute;';
    entities['222'] = '&THORN;';
    entities['223'] = '&szlig;';
    entities['224'] = '&agrave;';
    entities['225'] = '&aacute;';
    entities['226'] = '&acirc;';
    entities['227'] = '&atilde;';
    entities['228'] = '&auml;';
    entities['229'] = '&aring;';
    entities['230'] = '&aelig;';
    entities['231'] = '&ccedil;';
    entities['232'] = '&egrave;';
    entities['233'] = '&eacute;';
    entities['234'] = '&ecirc;';
    entities['235'] = '&euml;';
    entities['236'] = '&igrave;';
    entities['237'] = '&iacute;';
    entities['238'] = '&icirc;';
    entities['239'] = '&iuml;';
    entities['240'] = '&eth;';
    entities['241'] = '&ntilde;';
    entities['242'] = '&ograve;';
    entities['243'] = '&oacute;';
    entities['244'] = '&ocirc;';
    entities['245'] = '&otilde;';
    entities['246'] = '&ouml;';
    entities['247'] = '&divide;';
    entities['248'] = '&oslash;';
    entities['249'] = '&ugrave;';
    entities['250'] = '&uacute;';
    entities['251'] = '&ucirc;';
    entities['252'] = '&uuml;';
    entities['253'] = '&yacute;';
    entities['254'] = '&thorn;';
    entities['255'] = '&yuml;';
  }

  if (useQuoteStyle !== 'ENT_NOQUOTES') {
    entities['34'] = '&quot;';
  }
  if (useQuoteStyle === 'ENT_QUOTES') {
    entities['39'] = '&#39;';
  }
  entities['60'] = '&lt;';
  entities['62'] = '&gt;';


  // ascii decimals to real symbols
  for (decimal in entities) {
    if (entities.hasOwnProperty(decimal)) {
      hash_map[String.fromCharCode(decimal)] = entities[decimal];
    }
  }

  return hash_map;
}

function add_to_list(chk_name,hdn_id){
    hdn_object = document.getElementById(hdn_id);
    hdn_object.value = "";
    arr_chk = document.getElementsByName(chk_name);
    p=0;
    for (i=0;i<arr_chk.length;i++){
        if (arr_chk[i].checked){
            if (p==0){
                hdn_object.value = arr_chk[i].value;
            }else{
                hdn_object.value = hdn_object.value+","+arr_chk[i].value;
            }
            p++;
        }
    }
    //alert(document.getElementById(hdn_id).value);
}
function check_all(chk_name,value){
    arr_chk = document.getElementsByName(chk_name);
    for (i=0;i<arr_chk.length;i++){
        arr_chk[i].checked = value;
    }
}