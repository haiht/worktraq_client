// JavaScript Document
$.datepicker.regional['vi'] = {
	closeText: 'Đóng',
	prevText: '<Trước',
	nextText: 'Sau>',
	currentText: 'Hôm nay',
	monthNames: ['Tháng Giêng','Tháng Hai','Tháng Ba','Tháng Tư','Tháng Năm','Tháng Sáu',
	'Tháng Bảy','Tháng Tám','Tháng Chín','Tháng Mười','Tháng Một','Tháng Chạp'],
	monthNamesShort: ['Thg 1','Thg 2','Thg 3','Thg 4','Thg 5','Thg 6',
	'Thg 7','Thg 8','Thg 9','Thg 10','Thg 11','Thg 12'],
	dayNames: ['Chủ Nhật','Thứ Hai','Thứ Ba','Thứ Tư','Thứ Năm','Thứ Sáu','Thứ Bảy'],
	dayNamesShort: ['C. Nhật','T. Hai','T. Ba','T. Tư','T. Năm','T. Sáu','T. Bảy'],
	dayNamesMin: ['CN','TH','TB','TT','TN','TS','TB'],
	weekHeader: 'Tuần',
	dateFormat: 'dd-mm-yy',
	firstDay: 1,
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['vi']);

$.timepicker.regional['vi'] = {
	timeOnlyTitle: 'Chọn',
	timeText: 'Thời gian',
	hourText: 'Giờ',
	minuteText: 'Phút',
	secondText: 'Giây',
	millisecText: 'Mili giây',
	currentText: 'Hiện tại',
	closeText: 'Đóng',
	ampm: false
};
$.timepicker.setDefaults($.timepicker.regional['vi']);

$.datepicker.parseDateTime = function(val){
	val = $.trim(val);
	var p = val.indexOf(' ',0);
	var d = val.substring(0,p);
	var t = val.substring(p+1,val.length);
	val = $.datepicker.parseDate('dd-mm-yy', d);
	val = $.datepicker.formatDate('yy-mm-dd', val);
	//alert (val+' '+t);
	return val+' '+t;
}