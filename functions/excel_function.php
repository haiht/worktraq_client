<?php
function apply_borders_to_cell_full(& $sheet, $cell, $border=PHPExcel_Style_Border::BORDER_THIN, $fill_color=''){
	if($border=='') $border=PHPExcel_Style_Border::BORDER_THIN;
	$sheet->getStyle($cell)->getBorders()->getTop()->setBorderStyle($border);
	$sheet->getStyle($cell)->getBorders()->getBottom()->setBorderStyle($border);
	$sheet->getStyle($cell)->getBorders()->getLeft()->setBorderStyle($border);
	$sheet->getStyle($cell)->getBorders()->getRight()->setBorderStyle($border);
	if($fill_color!=''){
		$sheet->getStyle($cell)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$sheet->getStyle($cell)->getFill()->getStartColor()->setRGB($fill_color);
	}
}
function create_one_cell_full(& $sheet, $col, $row, $value, $align, $bold=false, $wrap=false, $width=0, $format=PHPExcel_Style_NumberFormat::FORMAT_GENERAL, $border=1, $fill_color='' ){
	//PHPExcel_Style_NumberFormat::FORMAT_PERCENTAGE
	if($format=='') $format=PHPExcel_Style_NumberFormat::FORMAT_GENERAL;
	$cell = excel_col($col).$row;
	$left=PHPExcel_Style_Alignment::HORIZONTAL_LEFT;
	$right=PHPExcel_Style_Alignment::HORIZONTAL_RIGHT; 
	$center=PHPExcel_Style_Alignment::HORIZONTAL_CENTER;
	$vertical=PHPExcel_Style_Alignment::VERTICAL_CENTER;
	if($border==1){
		if($fill_color!='')
			apply_borders_to_cell_full($sheet, $cell,'',$fill_color);
		else
			apply_borders_to_cell_full($sheet, $cell);
	}
	if($align=='center'){
		$sheet->getStyle($cell)->getAlignment()->setHorizontal($center);
	}else if($align=='left'){
		$sheet->getStyle($cell)->getAlignment()->setHorizontal($left);
	}else if($align=='right'){
		$sheet->getStyle($cell)->getAlignment()->setHorizontal($right);
	}
	$sheet->getStyle($cell)->getAlignment()->setVertical($vertical);
	if($wrap) $sheet->getStyle($cell)->getAlignment()->setWrapText(true);
	//if(is_numeric($value))
	$sheet->getStyle($cell)->getNumberFormat()->setFormatCode($format);
	//else
	//if(isset($arr_value[1]))
	//	$sheet->setCellFormula($cell,$value);
	//else
		$sheet->setCellValue($cell,$value);
	if($bold) $sheet->getStyle($cell)->getFont()->setBold(true);
	if($width>0) $sheet->getColumnDimension(excel_col($col))->setWidth($width);
}
function excel_col($p_num){
    $r = '';
    $f = 0;
    while($p_num>26){
        $p_num -= 26;
        $f++;
    }
    if($f>0) $r = chr(64+$f);
    $r .= chr(64 + $p_num);
    return $r;
}
?>