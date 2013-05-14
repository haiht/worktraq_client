<?php if(!isset($v_sval)) die();?>
<?php
if(isset($_SESSION['ss_location_where_clause'])){
	$v_where_clause = $_SESSION['ss_tb_shipping_where_clause'];
	$arr_where_clause = unserialize($v_where_clause);
}
if(!isset($arr_where_clause) || !is_array($arr_where_clause)) $arr_where_clause = array();
if(isset($_SESSION['ss_tb_shipping_sort'])){
	$v_sort = $_SESSION['ss_tb_shipping_sort'];
	$arr_sort = unserialize($v_sort);
}
if(!isset($arr_sort) || !is_array($arr_sort)) $arr_sort = array();
$arr_tb_shipping = $cls_tb_shipping->select($arr_where_clause, $arr_sort);
@ob_clean();
$v_sheet_index = 0;
$v_excel_file = 'export_shipping_'.date('Y_m_d_H_i_s').'.xls';
require_once('lib/PHPExcel.1.7.8/Classes/PHPExcel.php');
require_once('lib/PHPExcel.1.7.8/Classes/PHPExcel/IOFactory.php');
$v_row_height = 15;
$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Anvy")
	->setLastModifiedBy("Anvy")
	->setTitle('Shipping')
	->setSubject("Office 2003 XLS Test Document")
	->setDescription("Test document for Office 2003 XLS, generated using PHP classes.")
	->setKeywords("office 2003 openxml php")
	->setCategory("Report from Anvy");
$objPHPExcel->getDefaultStyle()->getFont()->setName('Tahoma');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(8);
$v_row = 0;
$v_excel_row = 1;
$sheet = $objPHPExcel->setActiveSheetIndex($v_sheet_index);
$v_excel_col = 1;
$sheet->getDefaultRowDimension()->setRowHeight($v_row_height);
$sheet->setTitle('Shipping');
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Ord.', 'center', true, true, 5, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Shipping Id', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Shipper', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Tracking Number', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Tracking Url', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Date Shipping', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Ship Status', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Ship Create By', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Ship Create Date', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Location From', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Location Id', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Location Name', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Location Address', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Company Id', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Shipping Detail', 'center', true, true, 20, '', true);
$v_excel_row++;
foreach($arr_tb_shipping as $arr){
	$v_excel_col = 1;
	$v_shipping_id = isset($arr['shipping_id'])?$arr['shipping_id']:0;
	$v_shipper = isset($arr['shipper'])?$arr['shipper']:'';
	$v_tracking_number = isset($arr['tracking_number'])?$arr['tracking_number']:'';
	$v_tracking_url = isset($arr['tracking_url'])?$arr['tracking_url']:'';
	$v_date_shipping = isset($arr['date_shipping'])?$arr['date_shipping']:(new MongoDate(time()));
	$v_ship_status = isset($arr['ship_status'])?$arr['ship_status']:0;
	$v_ship_create_by = isset($arr['ship_create_by'])?$arr['ship_create_by']:'';
	$v_ship_create_date = isset($arr['ship_create_date'])?$arr['ship_create_date']:(new MongoDate(time()));
	$v_location_from = isset($arr['location_from'])?$arr['location_from']:0;
	$v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
	$v_location_name = isset($arr['location_name'])?$arr['location_name']:'';
	$v_location_address = isset($arr['location_address'])?$arr['location_address']:'';
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_shipping_detail = isset($arr['shipping_detail'])?$arr['shipping_detail']:'';
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, ++$v_row, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_shipping_id, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_shipper, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_tracking_number, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_tracking_url, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_date_shipping, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_ship_status, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_ship_create_by, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_ship_create_date, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_location_from, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_location_id, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_location_name, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_location_address, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_company_id, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_shipping_detail, 'left');
	$v_excel_row++;
}
$sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
$sheet->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
$sheet->getPageSetup()->setHorizontalCentered(true);
$sheet->getPageSetup()->setFitToPage(true);
$sheet->getPageSetup()->setFitToWidth(1);
$sheet->getPageSetup()->setFitToHeight(0);
$sheet->setShowGridlines(false);
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$v_excel_file.'"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
die();
?>