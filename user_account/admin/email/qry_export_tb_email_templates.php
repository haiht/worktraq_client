<?php if(!isset($v_sval)) die();?>
<?php
if(isset($_SESSION['ss_location_where_clause'])){
	$v_where_clause = $_SESSION['ss_tb_email_templates_where_clause'];
	$arr_where_clause = unserialize($v_where_clause);
}
if(!isset($arr_where_clause) || !is_array($arr_where_clause)) $arr_where_clause = array();
if(isset($_SESSION['ss_tb_email_templates_sort'])){
	$v_sort = $_SESSION['ss_tb_email_templates_sort'];
	$arr_sort = unserialize($v_sort);
}
if(!isset($arr_sort) || !is_array($arr_sort)) $arr_sort = array();
$arr_tb_email_templates = $cls_tb_email_templates->select($arr_where_clause, $arr_sort);
@ob_clean();
$v_sheet_index = 0;
$v_excel_file = 'export_email_templates_'.date('Y_m_d_H_i_s').'.xls';
require_once('lib/PHPExcel.1.7.8/Classes/PHPExcel.php');
require_once('lib/PHPExcel.1.7.8/Classes/PHPExcel/IOFactory.php');
$v_row_height = 15;
$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Anvy")
	->setLastModifiedBy("Anvy")
	->setTitle('Email_templates')
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
$sheet->setTitle('Email_templates');
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Ord.', 'center', true, true, 5, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Email Id', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Email Key', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Email File', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Email Data', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Email Type', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Description', 'center', true, true, 20, '', true);
$v_excel_row++;
foreach($arr_tb_email_templates as $arr){
	$v_excel_col = 1;
	$v_email_id = isset($arr['email_id'])?$arr['email_id']:0;
	$v_email_key = isset($arr['email_key'])?$arr['email_key']:'';
	$v_email_file = isset($arr['email_file'])?$arr['email_file']:'';
	$v_email_data = isset($arr['email_data'])?$arr['email_data']:'';
	$v_email_type = isset($arr['email_type'])?$arr['email_type']:0;
	$v_description = isset($arr['description'])?$arr['description']:'';
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, ++$v_row, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_email_id, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_email_key, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_email_file, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_email_data, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_email_type, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_description, 'left');
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