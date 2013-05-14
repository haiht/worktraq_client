<?php if(!isset($v_sval)) die();?>
<?php
if(isset($_SESSION['ss_location_where_clause'])){
	$v_where_clause = $_SESSION['ss_tb_tracking_where_clause'];
	$arr_where_clause = unserialize($v_where_clause);
}
if(!isset($arr_where_clause) || !is_array($arr_where_clause)) $arr_where_clause = array();
if(isset($_SESSION['ss_tb_tracking_sort'])){
	$v_sort = $_SESSION['ss_tb_tracking_sort'];
	$arr_sort = unserialize($v_sort);
}
if(!isset($arr_sort) || !is_array($arr_sort)) $arr_sort = array();
$arr_tb_tracking = $cls_tb_tracking->select($arr_where_clause, $arr_sort);
@ob_clean();
$v_sheet_index = 0;
$v_excel_file = 'export_tracking_'.date('Y_m_d_H_i_s').'.xls';
require_once('lib/PHPExcel.1.7.8/Classes/PHPExcel.php');
require_once('lib/PHPExcel.1.7.8/Classes/PHPExcel/IOFactory.php');
$v_row_height = 15;
$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Anvy")
	->setLastModifiedBy("Anvy")
	->setTitle('Tracking')
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
$sheet->setTitle('Tracking');
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Ord.', 'center', true, true, 5, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Tracking Id', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Tracking Name', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Tracking Key', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Website', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Tracking Url', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Option Url', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Phone', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Email', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Contact Name', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Status', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Description', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Country Id', 'center', true, true, 20, '', true);
$v_excel_row++;
foreach($arr_tb_tracking as $arr){
	$v_excel_col = 1;
	$v_tracking_id = isset($arr['tracking_id'])?$arr['tracking_id']:0;
	$v_tracking_name = isset($arr['tracking_name'])?$arr['tracking_name']:'';
	$v_tracking_key = isset($arr['tracking_key'])?$arr['tracking_key']:'';
	$v_website = isset($arr['website'])?$arr['website']:'';
	$v_tracking_url = isset($arr['tracking_url'])?$arr['tracking_url']:'';
	$v_option_url = isset($arr['option_url'])?$arr['option_url']:'';
	$v_phone = isset($arr['phone'])?$arr['phone']:'';
	$v_email = isset($arr['email'])?$arr['email']:'';
	$v_contact_name = isset($arr['contact_name'])?$arr['contact_name']:'';
	$v_status = isset($arr['status'])?$arr['status']:'0';
	$v_description = isset($arr['description'])?$arr['description']:'';
	$v_country_id = isset($arr['country_id'])?$arr['country_id']:0;
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, ++$v_row, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_tracking_id, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_tracking_name, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_tracking_key, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_website, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_tracking_url, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_option_url, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_phone, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_email, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_contact_name, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_status, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_description, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_country_id, 'right');
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