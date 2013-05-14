/ JavaScript Document
var current_work_url = '[@URL]order/';
var material;
var material_value = 0;
var order = '';
var image_name = '';
var text_option = 0;
var item = null;
var company_product_url = '[@COMPANY_PRODUCT_URL]';
var sign_money = '';
var package_type = 0;
var graphic_id = 0;
var product_id = 0;
var image_choose = null;
var is_image_choose = 0;
var imgDropdown = null;


var size = new Array();
var mat = new Array();
var color = new Array();
var thick = new Array();

function Size(width, length, unit, row){
this.width = width;
this.length = length;
this.unit = unit;
this.row = row;
this.list = row+'';
}

function Material(id, name, row){
this.id = id;
this.name = name;
this.row = row;
this.list = row+'';
}

function Color(color, row){
this.color = color;
this.row = row;
this.list = row+'';
}
function Thickness(thick, unit, row){
this.thick = thick;
this.unit = unit;
this.row = row;
this.list = row+'';
}

function get_image(id){
var ret = '';
if(image_choose!=null && image_choose!=''){
for(var i=0; i<image_choose.length; i++){
if(image_choose[i].value==id){
ret = image_choose[i].image;
i = image_choose.length;
}
}
}
return ret;
}

function load_ajax(pid, oid, otid, imageid, imageurl)
{
$('input#product_quantity').val('1');
$('input#custom-width').val('');
$('input#custom-length').val('');
$('span#sp-custom-width').html('(in)');
$('span#sp-custom-length').html('(in)');
product_id = pid;
$.ajax({
url	:	'[@AJAX_LOAD_PRODUCT_URL]',
type	:	'POST',
data	:	{txt_product_id:pid, txt_order_id:oid, txt_order_item_id: otid, txt_image_id:imageid, txt_image_url:imageurl, txt_session_id:'[@SESSION_ID]', txt_order_ajax:100},
cache	: false,
async: false,
timeout	: 10000,
beforeSend: function(){

},
success	: function(data, type){
var ret = $.parseJSON(data);

if(ret==null){
alert('Unknown error');
return;
}
var err = ret.error;
item = null;
image_choose = null;
product = null;
if(err==0){
item = ret.item;
product = ret.product;
var image_option = '-  Printing file: ';
if (product.image_option == 0) {
image_option = image_option + "Anvy has printing file for this product. If you want to print with new printing file, please upload to ftp and paste the path here. ";
} else {
image_option = image_option +"Please upload printing file(s) to ftp and paste the path(s) here.";
}
image_option = image_option + "\n-  Note for this product: ";
$('textarea#image_text').text(image_option);

image_choose = ret.image;
material = product.material;
//alert('material:' + JSON.stringify(ret.product));
material_value = 0;
var list_size = '';
var list_mat = '';
var list_thick = '';
var list_color = '';
var temp = '';
size = new Array();
mat = new Array();
thick = new Array();
color = new Array();
for(var k = 0; k <material.length; k++){
temp = ','+material[k].width+'-'+material[k].length+'-'+material[k].usize
if(list_size.indexOf(temp)==-1){
var s = new Size(material[k].width,material[k].length,material[k].usize, k);
size.push(s);
list_size += temp;
}else{
for(var x = 0; x<size.length; x++){
if(size[x].width==material[k].width && size[x].length==material[k].length && size[x].unit==material[k].usize){
size[x].list += ','+k;
x = size.length;
}
}
}

temp = ','+material[k].id;
if(list_mat.indexOf(temp)==-1){
var s = new Material(material[k].id, material[k].name, k);
mat.push(s);
list_mat += temp;
}else{
for(var x=0; x<mat.length; x++){
if(mat[x].id==material[k].id){
mat[x].list += ',' + k;
x = mat.length;
}
}
}

temp = ','+material[k].thick+'-'+material[k].uthick;
if(list_thick.indexOf(temp)==-1){
var s = new Thickness(material[k].thick, material[k].uthick, k);
thick.push(s);
list_thick += temp;
}else{
for(var x=0; x<thick.length; x++){
if(thick[x].thick==material[k].thick && thick[x].unit==material[k].uthick){
thick[x].list += ','+k;
x = thick.length;
}
}
}
temp = ','+material[k].color;
if(list_color.indexOf(temp)==-1){
var s = new Color(material[k].color, k);
color.push(s);
list_color += temp;
}else{
for(var x=0; x<color.length; x++){
if(color[x].color==material[k].color){
color[x].list += ','+k;
x = color.length;
}
}
}

}

imgDropdown = null;
is_image_choose = 0;

package_type = product.package_type;
graphic_id = product.graphic_id;

$('h4#product_detail').html(product.product_sku+' - '+product.short_description);
$('input#txt_product_detail').val(product.product_detail);
$('input#txt_product_sku').val(product.product_sku);
var product_image_url = get_image(graphic_id);
var $img = $('<img src="'+product_image_url+'"  />');

$('div.image-item span span span span').children('img').remove();
$('div.image-item span span span span').append($img);
image_name = product_image_url;
if(product.image_option==0){
$('form#upload-image').css('display','none');
$('div#image-nofication').css('display','');
}else{
$('form#upload-image').css('display','');
$('div#image-nofication').css('display','none');
}
$('div#product_description').html('<p>'+product.short_description+'</p><p>'+product.long_description+'</p>');
$('select#product_size option').remove();
if (size.length == 0) {
var $opt = $('<option value="" selected="selected">No option for size</option>');
$('select#product_size').append($opt);
} else {
var $opt = $('<option value="" selected="selected">Select...</option>');
$('select#product_size').append($opt);
for(var i=0; i<size.length; i++){
if (size[i].width == 0 && size[i].length == 0) {
$opt = $('<option value="custom">Custom...</option>');
} else {
$opt = $('<option value="'+size[i].width+'-'+size[i].length+'-'+size[i].unit+'">'+size[i].width+' &times; '+size[i].length+' '+size[i].unit+'</option>');
}
$('select#product_size').append($opt);
}
}
/*
if(product.size_option==1){
$opt = $('<option value="custom">Custom...</option>');
$('select#product_size').append($opt);
}
*/
//setup_material();

var text = product.text;
$('ul#product_text li').remove();
text_option = product.text_option;
if(product.text_option==1){
var ttext;
if(item!=null && item!='') {
ttext = item.product_text;
}else{
ttext = new Array();
for(var i=0;i<text.length; i++){
ttext[i] = text[i].text;
}
}
for(var i=0; i<ttext.length;i++){
$opt = $('<li><label for="field-'+(i+1)+'">Field '+(i+1)+': </label><input name="txt_product_text" id="field-'+(i+1)+'" type="text" class="" value="'+ttext[i]+'" /></li>');
$('ul#product_text').append($opt);
}
$('div#text-option').css('display','');
$('div#text-nofication').css('display','none');
}else{
$('div#text-option').css('display','none');
$('div#text-nofication').css('display','');
}
$('input#txt_product_id[type="hidden"]').val(pid);
$('label#lbl_price').html('');
var q = $('input#product_quantity').val();
q = parseInt(q,10);
if(isNaN(q) || q<=0) q = 1;
$('label#lbl_price_ex').html('');
setup_startup();
}else{
alert(readKey('message', data));
}
}
});
}






function setup_thickness(sel){
var val = sel.value;
var vsize = $('select#product_size').val();
var vmaterial = $('select#product_material').val();
var $tsel = $('select#material_thickness');
$('select#material_thickness option').remove();
var $csel = $('select#material_color');
$('select#material_color option').remove();
var $opt = $('<option value="" selected="selected">Select...</option>');
$tsel.append($opt);
$opt = $('<option value="" selected="selected">Select...</option>');
$csel.append($opt);
var list = '';
var items = '';
var thicks='';
var count = 0;

for(var i=0;i< mat.length; i++){
if(val+''==mat[i].id+''){
list = mat[i].list;
i = mat.length;
}
}
if(list=='') {
$('select#material_thickness option').remove();
$opt = $('<option value="" selected="selected">No option for material thickness</option>');
$tsel.append($opt);
return;
}
items = list.split(',');
for(var i=0; i<items.length; i++){
var j = items[i];
j = parseInt(j,10);
if(thicks.indexOf(material[j].thick+'-'+material[j].uthick)==-1){
if(vsize==material[j].width+'-'+material[j].length+'-'+material[j].usize && vmaterial+''==material[j].id+''){
if (material[j].thick != 0) {
$opt = $('<option value="'+material[j].thick +'-'+material[j].uthick+'">'+material[j].thick +' '+material[j].uthick+'</option>');
$tsel.append($opt);
thicks += material[j].thick+'-'+material[j].uthick;
count++;
}
}else if(vsize=='custom' && vmaterial+''==material[j].id+''){
if(material[j].width == '0' && material[j].length == '0'){
if (material[j].thick != 0) {
$opt = $('<option value="'+material[j].thick +'-'+material[j].uthick+'">'+material[j].thick +' '+material[j].uthick+'</option>');
$tsel.append($opt);
thicks += material[j].thick+'-'+material[j].uthick;
count++;
}
}
}
}
}

if (count == 0) {
$('select#material_thickness option').remove();
$opt = $('<option value="" selected="selected">No option for material thickness</option>');
$tsel.append($opt);
}

if(count==1){
$tsel.find('option').eq(0).remove();
$tsel.find('option').eq(0).attr('selected', 'selected');
$tsel.trigger('change');
}
}
function setup_color(sel){
var val = sel.value;
var vsize = $('select#product_size').val();
var vmaterial = $('select#product_material').val();
var vthick = $('select#material_thickness').val();

var vthick_text = $("select#material_thickness option[value='']").text();
if (vthick_text == 'Select...' && vthick == '') {
return;
}

var $csel = $('select#material_color');
$('select#material_color option').remove();
var $opt = $('<option value="" selected="selected">Select...</option>');
$csel.append($opt);
var list = '';
var items = '';
var colors='';
var price = 0;
var count = 0;

if (vthick != '') {
for(var i=0;i< thick.length; i++){
//if(val+''==thick[i].thick+'-'+thick[i].unit){
if(vthick+''==thick[i].thick+'-'+thick[i].unit){
list = thick[i].list;
i = thick.length;
}
}
} else {
for(var i=0;i< mat.length; i++){
var compare = (val+'' == (mat[i].id+''));

if(compare == true){
list = mat[i].list;
i = mat.length;
}
}
}

if(list=='') {
$('select#material_color option').remove();
$opt = $('<option value="" selected="selected">No option for material color</option>');
$csel.append($opt);
return;
}

items = list.split(',');
if (vthick == '') {
vthick = '0-none';
}
for(var i=0; i<items.length; i++){
var j = items[i];
j = parseInt(j,10);
if(colors.indexOf(material[j].color+',')==-1){
if(vsize==material[j].width+'-'+material[j].length+'-'+material[j].usize && vmaterial+''==material[j].id+'' && vthick==material[j].thick+'-'+material[j].uthick){
if (material[j].color != 'None') {
$opt = $('<option value="'+material[j].color +'">'+material[j].color+'</option>');
$csel.append($opt);
colors += material[j].color+',';
count++;
}
} else if(vsize=='custom' && vmaterial+''==material[j].id+'' && vthick==material[j].thick+'-'+material[j].uthick){
if(material[j].width == '0' && material[j].length == '0'){
if (material[j].color != 'None') {
$opt = $('<option value="'+material[j].color +'">'+material[j].color+'</option>');
$csel.append($opt);
colors += material[j].color+',';
count++;
}
}
}
}
}
if (count == 0) {
$('select#material_color option').remove();
$opt = $('<option value="" selected="selected">No option for material color</option>');
$csel.append($opt);

}
if(count==1){
$csel.find('option').eq(0).remove();
$csel.find('option').eq(0).attr('selected', 'selected');
$csel.trigger('change');
}
}


