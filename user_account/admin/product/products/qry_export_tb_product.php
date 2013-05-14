<?php if(!isset($v_sval)) die();?>
<?php
if(isset($_SESSION['ss_location_where_clause'])){
	$v_where_clause = $_SESSION['ss_tb_product_where_clause'];
	$arr_where_clause = unserialize($v_where_clause);
}
if(!isset($arr_where_clause) || !is_array($arr_where_clause)) $arr_where_clause = array();
if(isset($_SESSION['ss_tb_product_sort'])){
	$v_sort = $_SESSION['ss_tb_product_sort'];
	$arr_sort = unserialize($v_sort);
}
if(!isset($arr_sort) || !is_array($arr_sort)) $arr_sort = array();
$arr_tb_product = $cls_tb_product->select($arr_where_clause, array('company_id'=>1));
@ob_clean();
$v_sheet_index = 0;
$v_excel_file = 'export_product_'.date('Y_m_d_H_i_s').'.xls';
require_once('lib/PHPExcel.1.7.8/Classes/PHPExcel.php');
require_once('lib/PHPExcel.1.7.8/Classes/PHPExcel/IOFactory.php');
$v_row_height = 30;
$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Anvy")
	->setLastModifiedBy("Anvy")
	->setTitle('Product')
	->setSubject("Office 2003 XLS Test Document")
	->setDescription("Test document for Office 2003 XLS, generated using PHP classes.")
	->setKeywords("office 2003 openxml php")
	->setCategory("Report from Anvy");
$objPHPExcel->getDefaultStyle()->getFont()->setName('Tahoma');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(8);
$v_row = 0;
$v_excel_row = 1;
$v_excel_col = 1;

$v_tmp_company_id = 0;
$arr_company = array();
$arr_location = array();
foreach($arr_tb_product as $arr){
	$v_excel_col = 1;
	$v_product_id = isset($arr['product_id'])?$arr['product_id']:0;
	$v_product_sku = isset($arr['product_sku'])?$arr['product_sku']:'0';
	$v_short_description = isset($arr['short_description'])?$arr['short_description']:'';
	$v_long_description = isset($arr['long_description'])?$arr['long_description']:'';
	$v_product_detail = isset($arr['product_detail'])?$arr['product_detail']:'';
	$v_size_option = isset($arr['size_option'])?$arr['size_option']:0;
	$v_size_unit = isset($arr['size_unit'])?$arr['size_unit']:'0';
	$v_image_option = isset($arr['image_option'])?$arr['image_option']:0;
	$v_num_images = isset($arr['num_images'])?$arr['num_images']:0;
	$v_package_quantity = isset($arr['package_quantity'])?$arr['package_quantity']:1;
	$v_allow_single = isset($arr['allow_single'])?$arr['allow_single']:1;
	$v_package_type = isset($arr['package_type'])?$arr['package_type']:0;
	$v_image_file = isset($arr['image_file'])?$arr['image_file']:'';
	$v_image_desc = isset($arr['image_desc'])?$arr['image_desc']:'';
	$v_image_choose = isset($arr['image_choose'])?$arr['image_choose']:0;
	$v_saved_dir = isset($arr['saved_dir'])?$arr['saved_dir']:'';
	$v_text_option = isset($arr['text_option'])?$arr['text_option']:0;
	$v_sold_by = isset($arr['sold_by'])?$arr['sold_by']:'';
	$v_default_price = isset($arr['default_price'])?$arr['default_price']:0;
	$v_product_status = isset($arr['product_status'])?$arr['product_status']:0;
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
	$v_product_note = isset($arr['product_note'])?$arr['product_note']:'';
	$v_product_threshold = isset($arr['product_threshold'])?$arr['product_threshold']:-1;
	$v_product_threshold_group_id = isset($arr['product_threshold_group_id'])?$arr['product_threshold_group_id']:0;
	$v_excluded_location = isset($arr['excluded_location'])?$arr['excluded_location']:'';
	$v_file_hd = isset($arr['file_hd'])?$arr['file_hd']:'';
	$v_user_name = isset($arr['user_name'])?$arr['user_name']:'';
	$v_user_type = isset($arr['user_type'])?$arr['user_type']:0;
	$v_date_created = isset($arr['date_created'])?$arr['date_created']:(new MongoDate(time()));

    if(!isset($arr_company[$v_company_id])) $arr_company[$v_company_id] = $cls_tb_company->select_scalar('company_name', array('company_id'=>$v_company_id));
    if(!isset($arr_location[$v_location_id])) $arr_location[$v_location_id] = $cls_tb_location->select_scalar('location_name', array('location_id'=>$v_location_id));
    if($v_tmp_company_id!=$v_company_id){
        $v_row = 0;
        $v_excel_row = 1;
        if($v_sheet_index<=0)
            $sheet = $objPHPExcel->setActiveSheetIndex($v_sheet_index);
        else{
            $sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
            $sheet->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
            $sheet->getPageSetup()->setHorizontalCentered(true);
            $sheet->getPageSetup()->setFitToPage(true);
            $sheet->getPageSetup()->setFitToWidth(1);
            $sheet->getPageSetup()->setFitToHeight(0);
            $sheet->setShowGridlines(false);

            $sheet = $objPHPExcel->createSheet($v_sheet_index);
        }
        $v_tmp_company_id = $v_company_id;
        $v_excel_col = 1;
        $sheet->getDefaultRowDimension()->setRowHeight($v_row_height);
        $sheet->setTitle($arr_company[$v_company_id]);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Ord.', 'center', true, true, 5, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Product Sku', 'center', true, true, 25, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Short Description', 'center', true, true, 40, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Size Option', 'center', true, true, 10, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Image Option', 'center', true, true, 10, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Text Option', 'center', true, true, 10, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Sold By', 'center', true, true, 15, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Default Price', 'center', true, true, 15, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Product Status', 'center', true, true, 15, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Company', 'center', true, true, 30, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Location', 'center', true, true, 30, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Threshold', 'center', true, true, 15, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'User Name', 'center', true, true, 15, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Date Created', 'center', true, true, 15, '', true);
        $v_excel_row++;
        $v_sheet_index++;
    }
    $v_excel_col=1;
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, ++$v_row, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_product_sku, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_short_description, 'left',false,true);
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_size_option==1?'Custom':'', 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_image_option==1?'Custom':'', 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_text_option==1?'Custom':'', 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $cls_settings->get_option_name_by_id('sold_by',$v_sold_by), 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_default_price, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $cls_settings->get_option_name_by_id('product_status',$v_product_status), 'leftt');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $arr_company[$v_company_id], 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $arr_location[$v_location_id], 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_product_threshold, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_user_name, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, date('d-M-Y',$v_date_created->sec), 'right');
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