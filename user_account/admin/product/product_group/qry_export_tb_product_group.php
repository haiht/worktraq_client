<?php if(!isset($v_sval)) die();?>
<?php
if(isset($_SESSION['ss_location_where_clause'])){
	$v_where_clause = $_SESSION['ss_tb_product_group_where_clause'];
	$arr_where_clause = unserialize($v_where_clause);
}
if(!isset($arr_where_clause) || !is_array($arr_where_clause)) $arr_where_clause = array();
if(isset($_SESSION['ss_tb_product_group_sort'])){
	$v_sort = $_SESSION['ss_tb_product_group_sort'];
	$arr_sort = unserialize($v_sort);
}
if(!isset($arr_sort) || !is_array($arr_sort)) $arr_sort = array();
$arr_tb_product_group = $cls_tb_product_group->select($arr_where_clause, $arr_sort);
@ob_clean();
$v_sheet_index = 0;
$v_excel_file = 'export_product_group_'.date('Y_m_d_H_i_s').'.xls';
require_once('lib/PHPExcel.1.7.8/Classes/PHPExcel.php');
require_once('lib/PHPExcel.1.7.8/Classes/PHPExcel/IOFactory.php');
$v_row_height = 15;
$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Anvy")
	->setLastModifiedBy("Anvy")
	->setTitle('Product_group')
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
$sheet->setTitle('Product_group');
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Ord.', 'center', true, true, 5, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Product Group Id', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Company Id', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Product Group Key', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Product Group Name', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Product Group Value', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Product Group Overflow', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Product Group Order', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Product Group Parent', 'center', true, true, 20, '', true);
$v_excel_row++;
foreach($arr_tb_product_group as $arr){
	$v_excel_col = 1;
	$v_product_group_id = isset($arr['product_group_id'])?$arr['product_group_id']:0;
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_product_group_key = isset($arr['product_group_key'])?$arr['product_group_key']:'';
	$v_product_group_name = isset($arr['product_group_name'])?$arr['product_group_name']:'';
	$v_product_group_value = isset($arr['product_group_value'])?$arr['product_group_value']:0;
	$v_product_group_overflow = isset($arr['product_group_overflow'])?$arr['product_group_overflow']:0;
	$v_product_group_order = isset($arr['product_group_order'])?$arr['product_group_order']:0;
	$v_product_group_parent = isset($arr['product_group_parent'])?$arr['product_group_parent']:0;
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, ++$v_row, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_product_group_id, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_company_id, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_product_group_key, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_product_group_name, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_product_group_value, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_product_group_overflow, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_product_group_order, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_product_group_parent, 'right');
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