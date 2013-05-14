<?php if(!isset($v_sval)) die();?>
<?php
if(isset($_SESSION['ss_location_where_clause'])){
	$v_where_clause = $_SESSION['ss_tb_tag_where_clause'];
	$arr_where_clause = unserialize($v_where_clause);
}
if(!isset($arr_where_clause) || !is_array($arr_where_clause)) $arr_where_clause = array();
if(isset($_SESSION['ss_tb_tag_sort'])){
	$v_sort = $_SESSION['ss_tb_tag_sort'];
	$arr_sort = unserialize($v_sort);
}
if(!isset($arr_sort) || !is_array($arr_sort)) $arr_sort = array();
$arr_tb_tag = $cls_tb_tag->select($arr_where_clause, $arr_sort);
@ob_clean();
$v_sheet_index = 0;
$v_excel_file = 'export_tag_'.date('Y_m_d_H_i_s').'.xls';
require_once('lib/PHPExcel.1.7.8/Classes/PHPExcel.php');
require_once('lib/PHPExcel.1.7.8/Classes/PHPExcel/IOFactory.php');
$v_row_height = 15;
$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Anvy")
	->setLastModifiedBy("Anvy")
	->setTitle('Tag')
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
$sheet->setTitle('Tag');
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Ord.', 'center', true, true, 5, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Tag Id', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Tag Name', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Tag Status', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Tag Order', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Location Id', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Company Id', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'User Name', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Date Created', 'center', true, true, 20, '', true);
$v_excel_row++;
foreach($arr_tb_tag as $arr){
	$v_excel_col = 1;
	$v_tag_id = isset($arr['tag_id'])?$arr['tag_id']:0;
	$v_tag_name = isset($arr['tag_name'])?$arr['tag_name']:'';
	$v_tag_status = isset($arr['tag_status'])?$arr['tag_status']:0;
	$v_tag_order = isset($arr['tag_order'])?$arr['tag_order']:0;
	$v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_user_name = isset($arr['user_name'])?$arr['user_name']:'';
	$v_date_created = isset($arr['date_created'])?$arr['date_created']:(new MongoDate(time()));
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, ++$v_row, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_tag_id, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_tag_name, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_tag_status, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_tag_order, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_location_id, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_company_id, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_user_name, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_date_created, 'right');
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