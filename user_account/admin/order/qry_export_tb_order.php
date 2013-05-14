<?php if(!isset($v_sval)) die();?>
<?php
if(isset($_SESSION['ss_location_where_clause'])){
	$v_where_clause = $_SESSION['ss_tb_order_where_clause'];
	$arr_where_clause = unserialize($v_where_clause);
}
if(!isset($arr_where_clause) || !is_array($arr_where_clause)) $arr_where_clause = array();
if(isset($_SESSION['ss_tb_order_sort'])){
	$v_sort = $_SESSION['ss_tb_order_sort'];
	$arr_sort = unserialize($v_sort);
}
if(!isset($arr_sort) || !is_array($arr_sort)) $arr_sort = array();
$arr_tb_order = $cls_tb_order->select($arr_where_clause, $arr_sort);
@ob_clean();
$v_sheet_index = 0;
$v_excel_file = 'export_order_'.date('Y_m_d_H_i_s').'.xls';
require_once('lib/PHPExcel.1.7.8/Classes/PHPExcel.php');
require_once('lib/PHPExcel.1.7.8/Classes/PHPExcel/IOFactory.php');
$v_row_height = 15;
$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Anvy")
	->setLastModifiedBy("Anvy")
	->setTitle('Order')
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
$sheet->setTitle('Order');
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Ord.', 'center', true, true, 5, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Order Id', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Raw Id', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Anvy Id', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Location Id', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Company Id', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Po Number', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Order Type', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Shipping Contact', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Total Order Amount', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Total Discount', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Billing Contact', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Net Order Amount', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Gross Order Amount', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Job Description', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Description', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Notes', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Order Ref', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Sale Rep', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Date Created', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Date Required', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Date Approved', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Date Modified', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Term', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Delivery Method', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Source', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Status', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Require Approved', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'User Approved', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'User Modified', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'User Name', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Dispatch', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Tax 1', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Tax 2', 'center', true, true, 20, '', true);
create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Tax 3', 'center', true, true, 20, '', true);
$v_excel_row++;
foreach($arr_tb_order as $arr){
	$v_excel_col = 1;
	$v_order_id = isset($arr['order_id'])?$arr['order_id']:0;
	$v_raw_id = isset($arr['raw_id'])?$arr['raw_id']:'';
	$v_anvy_id = isset($arr['anvy_id'])?$arr['anvy_id']:'';
	$v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_po_number = isset($arr['po_number'])?$arr['po_number']:'';
	$v_order_type = isset($arr['order_type'])?$arr['order_type']:0;
	$v_shipping_contact = isset($arr['shipping_contact'])?$arr['shipping_contact']:'';
	$v_total_order_amount = isset($arr['total_order_amount'])?$arr['total_order_amount']:0;
	$v_total_discount = isset($arr['total_discount'])?$arr['total_discount']:0;
	$v_billing_contact = isset($arr['billing_contact'])?$arr['billing_contact']:'';
	$v_net_order_amount = isset($arr['net_order_amount'])?$arr['net_order_amount']:0;
	$v_gross_order_amount = isset($arr['gross_order_amount'])?$arr['gross_order_amount']:0;
	$v_job_description = isset($arr['job_description'])?$arr['job_description']:'';
	$v_description = isset($arr['description'])?$arr['description']:'';
	$v_notes = isset($arr['notes'])?$arr['notes']:'';
	$v_order_ref = isset($arr['order_ref'])?$arr['order_ref']:'';
	$v_sale_rep = isset($arr['sale_rep'])?$arr['sale_rep']:'';
	$v_date_created = isset($arr['date_created'])?$arr['date_created']:(new MongoDate(time()));
	$v_date_required = isset($arr['date_required'])?$arr['date_required']:(new MongoDate(time()));
	$v_date_approved = isset($arr['date_approved'])?$arr['date_approved']:(new MongoDate(time()));
	$v_date_modified = isset($arr['date_modified'])?$arr['date_modified']:(new MongoDate(time()));
	$v_term = isset($arr['term'])?$arr['term']:0;
	$v_delivery_method = isset($arr['delivery_method'])?$arr['delivery_method']:0;
	$v_source = isset($arr['source'])?$arr['source']:0;
	$v_status = isset($arr['status'])?$arr['status']:0;
	$v_require_approved = isset($arr['require_approved'])?$arr['require_approved']:'0';
	$v_user_approved = isset($arr['user_approved'])?$arr['user_approved']:'';
	$v_user_modified = isset($arr['user_modified'])?$arr['user_modified']:'';
	$v_user_name = isset($arr['user_name'])?$arr['user_name']:'';
	$v_dispatch = isset($arr['dispatch'])?$arr['dispatch']:0;
	$v_tax_1 = isset($arr['tax_1'])?$arr['tax_1']:0;
	$v_tax_2 = isset($arr['tax_2'])?$arr['tax_2']:0;
	$v_tax_3 = isset($arr['tax_3'])?$arr['tax_3']:0;
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, ++$v_row, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_order_id, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_raw_id, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_anvy_id, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_location_id, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_company_id, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_po_number, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_order_type, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_shipping_contact, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_total_order_amount, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_total_discount, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_billing_contact, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_net_order_amount, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_gross_order_amount, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_job_description, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_description, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_notes, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_order_ref, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_sale_rep, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_date_created, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_date_required, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_date_approved, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_date_modified, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_term, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_delivery_method, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_source, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_status, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_require_approved, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_user_approved, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_user_modified, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_user_name, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_dispatch, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_tax_1, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_tax_2, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_tax_3, 'right');
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