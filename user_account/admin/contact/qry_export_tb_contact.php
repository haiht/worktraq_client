<?php if(!isset($v_sval)) die();?>
<?php
if(isset($_SESSION['ss_location_where_clause'])){
	$v_where_clause = $_SESSION['ss_tb_contact_where_clause'];
	$arr_where_clause = unserialize($v_where_clause);
}
if(!isset($arr_where_clause) || !is_array($arr_where_clause)) $arr_where_clause = array();
if(isset($_SESSION['ss_tb_contact_sort'])){
	$v_sort = $_SESSION['ss_tb_contact_sort'];
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


$arr_tb_contact = $cls_tb_contact->select($arr_where_clause, $arr_sort);
@ob_clean();
$v_sheet_index = 0;
$v_excel_file = 'export_contact_'.date('Y_m_d_H_i_s').'.xls';
require_once('lib/PHPExcel.1.7.8/Classes/PHPExcel.php');
require_once('lib/PHPExcel.1.7.8/Classes/PHPExcel/IOFactory.php');
$v_row_height = 15;
$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Anvy")
	->setLastModifiedBy("Anvy")
	->setTitle('Contact')
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
$sheet->setTitle('Contact');

$v_tmp_company_id = 0;
$arr_company = array();
$arr_country = array();
$arr_location = array();


foreach($arr_tb_contact as $arr){
	$v_excel_col = 1;
	$v_contact_id = isset($arr['contact_id'])?$arr['contact_id']:0;
	$v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
	$v_company_id = isset($arr['company_id'])?$arr['company_id']:0;
	$v_contact_type = isset($arr['contact_type'])?$arr['contact_type']:'';
	$v_first_name = isset($arr['first_name'])?$arr['first_name']:'';
	$v_last_name = isset($arr['last_name'])?$arr['last_name']:'';
	$v_middle_name = isset($arr['middle_name'])?$arr['middle_name']:'';
	$v_birth_date = isset($arr['birth_date'])?$arr['birth_date']:NULL;
	$v_address_type = isset($arr['address_type'])?$arr['address_type']:0;
	$v_address_unit = isset($arr['address_unit'])?$arr['address_unit']:'';
	$v_address_line_1 = isset($arr['address_line_1'])?$arr['address_line_1']:'';
	$v_address_line_2 = isset($arr['address_line_2'])?$arr['address_line_2']:'';
	$v_address_line_3 = isset($arr['address_line_3'])?$arr['address_line_3']:'';
	$v_address_city = isset($arr['address_city'])?$arr['address_city']:'';
	$v_address_province = isset($arr['address_province'])?$arr['address_province']:'';
	$v_address_postal = isset($arr['address_postal'])?$arr['address_postal']:'';
	$v_address_country = isset($arr['address_country'])?$arr['address_country']:0;
	$v_direct_phone = isset($arr['direct_phone'])?$arr['direct_phone']:'';
	$v_mobile_phone = isset($arr['mobile_phone'])?$arr['mobile_phone']:'';
	$v_fax_number = isset($arr['fax_number'])?$arr['fax_number']:'';
	$v_home_phone = isset($arr['home_phone'])?$arr['home_phone']:'';
	$v_email = isset($arr['email'])?$arr['email']:'';
	$v_user_id = isset($arr['user_id'])?$arr['user_id']:0;

    if(is_object($v_birth_date)){
        $v_birth_date = date('d-M-Y',$v_birth_date->sec);

    }else{
        $v_birth_date = '';
    }
    $v_user_name = $cls_tb_user->select_scalar('user_name', array('contact_id'=>$v_contact_id));
    $v_contact_type = $cls_settings->get_option_name_by_id('contact_type', $v_contact_type);

    if(!isset($arr_company[$v_company_id])) $arr_company[$v_company_id] = $cls_tb_company->select_scalar('company_name', array('company_id'=>$v_company_id));
    if(!isset($arr_location[$v_location_id])) $arr_location[$v_location_id] = $cls_tb_location->select_scalar('location_name', array('location_id'=>$v_location_id));
    if(!isset($arr_country[$v_address_country])) $arr_country[$v_address_country] = $cls_tb_country->select_scalar('country_name', array('country_id'=>$v_address_country));

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
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Location', 'center', true, true, 30, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Contact Type', 'center', true, true, 15, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'First Name', 'center', true, true, 15, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Middle Name', 'center', true, true, 15, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Last Name', 'center', true, true, 15, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Birth Date', 'center', true, true, 15, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Address Unit', 'center', true, true, 15, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Address Line 1', 'center', true, true, 25, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Address Line 2', 'center', true, true, 20, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Address Line 3', 'center', true, true, 20, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Address City', 'center', true, true, 15, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Address Province', 'center', true, true, 20, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Address Postal', 'center', true, true, 15, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Address Country', 'center', true, true, 15, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Direct Phone', 'center', true, true, 15, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'Email', 'center', true, true, 20, '', true);
        create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, 'User Name', 'center', true, true, 15, '', true);


        $v_excel_row++;
        $v_sheet_index++;
    }



    $v_excel_col = 1;
    create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, ++$v_row, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $arr_location[$v_location_id], 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_contact_type, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_first_name, 'left');
    create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_middle_name, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_last_name, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_birth_date, 'right');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_address_unit, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_address_line_1, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_address_line_2, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_address_line_3, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_address_city, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_address_province, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_address_postal, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $arr_country[$v_address_country], 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_direct_phone, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_email, 'left');
	create_one_cell_full( $sheet, $v_excel_col++, $v_excel_row, $v_user_name, 'right');
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