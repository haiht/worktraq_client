<?php if(!isset($v_sval)) die();?>
<?php
if(isset($_SESSION['ss_location_where_clause'])){
	$v_where_clause = $_SESSION['ss_tb_company_where_clause'];
	$arr_where_clause = unserialize($v_where_clause);
}
if(!isset($arr_where_clause) || !is_array($arr_where_clause)) $arr_where_clause = array();
if(isset($_SESSION['ss_tb_company_sort'])){
	$v_sort = $_SESSION['ss_tb_company_sort'];
	$arr_sort = unserialize($v_sort);
}
if(!isset($arr_sort) || !is_array($arr_sort)) $arr_sort = array();
$arr_tb_company = $cls_tb_company->select($arr_where_clause, $arr_sort);
@ob_clean();
$v_sheet_index = 0;
$v_excel_file = 'export_company_'.date('Y_m_d_H_i_s').'.xls';
require_once('lib/PHPExcel.1.7.8/Classes/PHPExcel.php');
require_once('lib/PHPExcel.1.7.8/Classes/PHPExcel/IOFactory.php');
$v_row_height = 15;
$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Anvy")
	->setLastModifiedBy("Anvy")
	->setTitle('Company')
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
$sheet->setTitle('Company');
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Ord.', 'center', true, true, 5, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Company Id', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Company Name', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Company Code', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Email Sales Rep', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Relationship', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Logo File', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Modules', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Crs Id', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Sales Rep Id', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Bussines Type', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Industry', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Website', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Status', 'center', true, true, 20, '', true);
$v_excel_row++;
foreach($arr_tb_company as $arr){
	$v_excel_col = 1;
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_company_name = isset($arr['company_name'])?$arr['company_name']:'';
	$v_company_code = isset($arr['company_code'])?$arr['company_code']:'';
	$v_email_sales_rep = isset($arr['email_sales_rep'])?$arr['email_sales_rep']:'';
	$v_relationship = isset($arr['relationship'])?$arr['relationship']:0;
	$v_logo_file = isset($arr['logo_file'])?$arr['logo_file']:'';
	$v_modules = isset($arr['modules'])?$arr['modules']:'';
	$v_crs_id = isset($arr['crs_id'])?$arr['crs_id']:0;
	$v_sales_rep_id = isset($arr['sales_rep_id'])?$arr['sales_rep_id']:0;
	$v_bussines_type = isset($arr['bussines_type'])?$arr['bussines_type']:0;
	$v_industry = isset($arr['industry'])?$arr['industry']:0;
	$v_website = isset($arr['website'])?$arr['website']:'';
	$v_status = isset($arr['status'])?$arr['status']:'0';
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, ++$v_row, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_company_id, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_company_name, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_company_code, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_email_sales_rep, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_relationship, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_logo_file, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_modules, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_crs_id, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_sales_rep_id, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_bussines_type, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_industry, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_website, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_status, 'right');
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