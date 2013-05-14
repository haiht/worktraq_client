<?php if(!isset($v_sval)) die();?>
<?php
if(isset($_SESSION['ss_location_where_clause'])){
	$v_where_clause = $_SESSION['ss_tb_location_where_clause'];
	$arr_where_clause = unserialize($v_where_clause);
}
if(!isset($arr_where_clause) || !is_array($arr_where_clause)) $arr_where_clause = array();
if(isset($_SESSION['ss_tb_location_sort'])){
	$v_sort = $_SESSION['ss_tb_location_sort'];
	$arr_sort = unserialize($v_sort);
}
if(!isset($arr_sort) || !is_array($arr_sort))
    $arr_sort = array('company_id'=>1);
else{
    $arr_temp = array();
    $arr_temp['company_id'] = 1;
    foreach($arr_sort as $key=>$val){
        if($key!='company_id'){
            $arr_temp[$key] = $val;
        }
    }
    $arr_sort = $arr_temp;
}
$arr_tb_location = $cls_tb_location->select($arr_where_clause, $arr_sort);
@ob_clean();
$v_sheet_index = 0;
$v_excel_file = 'export_location_'.date('Y_m_d_H_i_s').'.xls';
require_once('lib/PHPExcel.1.7.8/Classes/PHPExcel.php');
require_once('lib/PHPExcel.1.7.8/Classes/PHPExcel/IOFactory.php');
$v_row_height = 15;
$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Anvy")
	->setLastModifiedBy("Anvy")
	->setTitle('Location')
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
$sheet->setTitle('Location');

$v_tmp_company_id = 0;
$arr_company = array();
foreach($arr_tb_location as $arr){
	$v_excel_col = 1;
	$v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
	$v_location_name = isset($arr['location_name'])?$arr['location_name']:'';
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_approved_contact = isset($arr['approved_contact'])?$arr['approved_contact']:0;
	$v_main_contact = isset($arr['main_contact'])?$arr['main_contact']:0;
	$v_location_type = isset($arr['location_type'])?$arr['location_type']:0;
	$v_location_number = isset($arr['location_number'])?$arr['location_number']:0;
	$v_main_contact = isset($arr['main_contact'])?$arr['main_contact']:0;
	$v_address_unit = isset($arr['address_unit'])?$arr['address_unit']:'';
	$v_address_line_1 = isset($arr['address_line_1'])?$arr['address_line_1']:'';
	$v_address_line_2 = isset($arr['address_line_2'])?$arr['address_line_2']:'';
	$v_address_line_3 = isset($arr['address_line_3'])?$arr['address_line_3']:'';
	$v_address_city = isset($arr['address_city'])?$arr['address_city']:'';
	$v_address_province = isset($arr['address_province'])?$arr['address_province']:0;
	$v_address_postal = isset($arr['address_postal'])?$arr['address_postal']:'';
	$arr_address_country = isset($arr['address_country'])?$arr['address_country']:array();

    $v_shipped_address_unit = isset($arr['shipped_address_unit'])?$arr['shipped_address_unit']:'';
    $v_shipped_address_line_1 = isset($arr['shipped_address_line_1'])?$arr['shipped_address_line_1']:'';
    $v_shipped_address_line_2 = isset($arr['shipped_address_line_2'])?$arr['shipped_address_line_2']:'';
    $v_shipped_address_line_3 = isset($arr['shipped_address_line_3'])?$arr['shipped_address_line_3']:'';
    $v_shipped_address_city = isset($arr['shipped_address_city'])?$arr['shipped_address_city']:'';
    $v_shipped_address_province = isset($arr['shipped_address_province'])?$arr['shipped_address_province']:0;
    $v_shipped_address_postal = isset($arr['shipped_address_postal'])?$arr['shipped_address_postal']:'';
    $arr_shipped_address_country = isset($arr['shipped_address_country'])?$arr['shipped_address_country']:array();


	$v_open_date = isset($arr['open_date'])?$arr['open_date']:(new MongoDate(time()));
	$v_close_date = isset($arr['close_date'])?$arr['close_date']:(new MongoDate(time()));
	$v_status = isset($arr['status'])?$arr['status']:'0';

    $v_dsp_address = (trim($v_address_unit)!=''?trim($v_address_unit) .', ':'') . (trim($v_address_line_1)!=''?trim($v_address_line_1).', ' :'');
    $v_dsp_address .= (trim($v_address_line_2)!=''?trim($v_address_line_2). ', ' :'');
    $v_dsp_address .= (trim($v_address_line_3)!=''?trim($v_address_line_3).', ' :'');
    $v_dsp_address .= (trim($v_address_city)!=''?trim($v_address_city) .', ':'') . (trim($v_address_province)!=''?trim($v_address_province) .', ':'') .(trim($v_address_postal)!=''?trim($v_address_postal).', ':'');

    $v_dsp_address = trim($v_dsp_address);
    if($v_dsp_address!=''){
        if(substr($v_dsp_address, strlen($v_dsp_address)-1)==',') $v_dsp_address = substr($v_dsp_address,0,strlen($v_dsp_address)-1);
    }

    $v_dsp_shipped_address = (trim($v_shipped_address_unit)!=''?trim($v_shipped_address_unit) .', ':'') . (trim($v_shipped_address_line_1)!=''?trim($v_shipped_address_line_1).', ' :'');
    $v_dsp_shipped_address .= (trim($v_shipped_address_line_2)!=''?trim($v_shipped_address_line_2). ', ' :'');
    $v_dsp_shipped_address .= (trim($v_shipped_address_line_3)!=''?trim($v_shipped_address_line_3).', ' :'');
    $v_dsp_shipped_address .= (trim($v_shipped_address_city)!=''?trim($v_shipped_address_city) .', ':'') . (trim($v_shipped_address_province)!=''?trim($v_shipped_address_province) .', ':'') .(trim($v_shipped_address_postal)!=''?trim($v_shipped_address_postal).', ':'');

    $v_dsp_shipped_address = trim($v_dsp_shipped_address);
    if($v_dsp_shipped_address!=''){
        if(substr($v_dsp_shipped_address, strlen($v_dsp_shipped_address)-1)==',') $v_dsp_shipped_address = substr($v_dsp_shipped_address,0,strlen($v_dsp_shipped_address)-1);
    }

    $v_main_contact = $v_main_contact>0?$cls_tb_contact->get_full_name_contact($v_main_contact):'';
    $v_approved_contact = $v_approved_contact>0?$cls_tb_contact->get_full_name_contact($v_approved_contact):'';
    if(!isset($arr_company[$v_company_id])) $arr_company[$v_company_id] = $cls_tb_company->select_scalar('company_name', array('company_id'=>$v_company_id));
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
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Location Name', 'center', true, true, 30, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Company', 'center', true, true, 30, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Loc. Number', 'center', true, true, 15, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Main Contact', 'center', true, true, 15, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Approved Contact', 'center', true, true, 15, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Address', 'center', true, true, 50, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Shipped Address', 'center', true, true, 50, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Status', 'center', true, true, 10, '', true);

        $v_excel_row++;
        $v_sheet_index++;
    }
    $v_excel_col = 1;
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, ++$v_row, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_location_name, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $arr_company[$v_company_id], 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_location_number, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_main_contact, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_approved_contact, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_dsp_address, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_dsp_shipped_address, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_status==0?'Active':'Inactive', 'right');
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