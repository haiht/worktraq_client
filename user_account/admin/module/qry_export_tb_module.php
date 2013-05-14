<?php if(!isset($v_sval)) die();?>
<?php
if(isset($_SESSION['ss_location_where_clause'])){
	$v_where_clause = $_SESSION['ss_tb_module_where_clause'];
	$arr_where_clause = unserialize($v_where_clause);
}
if(!isset($arr_where_clause) || !is_array($arr_where_clause)) $arr_where_clause = array();
if(isset($_SESSION['ss_tb_module_sort'])){
	$v_sort = $_SESSION['ss_tb_module_sort'];
	$arr_sort = unserialize($v_sort);
}
if(!isset($arr_sort) || !is_array($arr_sort)) $arr_sort = array();
$arr_tb_module = $cls_tb_module->select($arr_where_clause, $arr_sort);
@ob_clean();
$v_sheet_index = 0;
$v_excel_file = 'export_module_'.date('Y_m_d_H_i_s').'.xls';
require_once('lib/PHPExcel.1.7.8/Classes/PHPExcel.php');
require_once('lib/PHPExcel.1.7.8/Classes/PHPExcel/IOFactory.php');
$v_row_height = 15;
$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Anvy")
	->setLastModifiedBy("Anvy")
	->setTitle('Module')
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
$sheet->setTitle('Module');
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Ord.', 'center', true, true, 5, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Module Id', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Module Pid', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Module Text', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Module Key', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Module Type', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Module Root', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Module Dir', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Module Icon', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Module Menu', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Module Role', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Module Order', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Module Index', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Module Locked', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Module Time', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Module Category', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Module Description', 'center', true, true, 20, '', true);
$v_excel_row++;
foreach($arr_tb_module as $arr){
	$v_excel_col = 1;
	$v_module_id = isset($arr['module_id'])?$arr['module_id']:0;
	$v_module_pid = isset($arr['module_pid'])?$arr['module_pid']:0;
	$v_module_text = isset($arr['module_text'])?$arr['module_text']:'';
	$v_module_key = isset($arr['module_key'])?$arr['module_key']:'';
	$v_module_type = isset($arr['module_type'])?$arr['module_type']:0;
	$v_module_root = isset($arr['module_root'])?$arr['module_root']:'admin';
	$v_module_dir = isset($arr['module_dir'])?$arr['module_dir']:'';
	$v_module_icon = isset($arr['module_icon'])?$arr['module_icon']:'';
	$v_module_menu = isset($arr['module_menu'])?$arr['module_menu']:'';
	$v_module_role = isset($arr['module_role'])?$arr['module_role']:0;
	$v_module_order = isset($arr['module_order'])?$arr['module_order']:0;
	$v_module_index = isset($arr['module_index'])?$arr['module_index']:'index.php';
	$v_module_locked = isset($arr['module_locked'])?$arr['module_locked']:0;
	$v_module_time = isset($arr['module_time'])?$arr['module_time']:(new MongoDate(time()));
	$v_module_category = isset($arr['module_category'])?$arr['module_category']:0;
	$v_module_description = isset($arr['module_description'])?$arr['module_description']:'';
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, ++$v_row, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_module_id, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_module_pid, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_module_text, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_module_key, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_module_type, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_module_root, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_module_dir, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_module_icon, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_module_menu, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_module_role, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_module_order, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_module_index, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_module_locked, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_module_time, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_module_category, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_module_description, 'left');
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