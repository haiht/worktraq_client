<?php if(!isset($v_sval)) die();?>
<?php
if(isset($_SESSION['ss_location_where_clause'])){
	$v_where_clause = $_SESSION['ss_tb_user_where_clause'];
	$arr_where_clause = unserialize($v_where_clause);
}
if(!isset($arr_where_clause) || !is_array($arr_where_clause)) $arr_where_clause = array();
if(isset($_SESSION['ss_tb_user_sort'])){
	$v_sort = $_SESSION['ss_tb_user_sort'];
	$arr_sort = unserialize($v_sort);
}
if(!isset($arr_sort) || !is_array($arr_sort)) $arr_sort = array();
$arr_tb_user = $cls_tb_user->select($arr_where_clause, $arr_sort);
@ob_clean();
$v_sheet_index = 0;
$v_excel_file = 'export_user_'.date('Y_m_d_H_i_s').'.xls';
require_once('lib/PHPExcel.1.7.8/Classes/PHPExcel.php');
require_once('lib/PHPExcel.1.7.8/Classes/PHPExcel/IOFactory.php');
$v_row_height = 15;
$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Anvy")
	->setLastModifiedBy("Anvy")
	->setTitle('User')
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
$sheet->setTitle('User');
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Ord.', 'center', true, true, 5, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'User Id', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'User Name', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Company Id', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Location Id', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Contact Id', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'User Password', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'User Location Approve', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'User Location Allocate', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'User Location View', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'User Type', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'User Status', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'User Lastlog', 'center', true, true, 20, '', true);
$v_excel_row++;
foreach($arr_tb_user as $arr){
	$v_excel_col = 1;
	$v_user_id = isset($arr['user_id'])?$arr['user_id']:0;
	$v_user_name = isset($arr['user_name'])?$arr['user_name']:'';
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
	$v_contact_id = isset($arr['contact_id'])?$arr['contact_id']:0;
	$v_user_password = isset($arr['user_password'])?$arr['user_password']:'';
	$v_user_location_approve = isset($arr['user_location_approve'])?$arr['user_location_approve']:'';
	$v_user_location_allocate = isset($arr['user_location_allocate'])?$arr['user_location_allocate']:'';
	$v_user_location_view = isset($arr['user_location_view'])?$arr['user_location_view']:'';
	$v_user_type = isset($arr['user_type'])?$arr['user_type']:3;
	$v_user_status = isset($arr['user_status'])?$arr['user_status']:'0';
	$v_user_lastlog = isset($arr['user_lastlog'])?$arr['user_lastlog']:(new MongoDate(time()));
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, ++$v_row, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_user_id, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_user_name, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_company_id, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_location_id, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_contact_id, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_user_password, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_user_location_approve, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_user_location_allocate, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_user_location_view, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_user_type, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_user_status, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_user_lastlog, 'right');
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