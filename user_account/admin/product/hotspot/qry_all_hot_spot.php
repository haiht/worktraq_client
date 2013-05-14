<?php if(!isset($v_sval)) die();?>
<?php
    $v_page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
    settype($v_page,"int");
    $v_page = ($v_page<=0)?1:$v_page;
    $v_num_row = isset($_REQUEST['num_row'])?$_REQUEST['num_row']:ADMIN_ROWS_ONE_PAGE;
    settype($v_num_row,"int");
    $v_num_row = ($v_num_row<0)?ADMIN_ROWS_ONE_PAGE:$v_num_row;

    $arr_where_clause = array('hot_spot'=>1);

    $v_total_row = $cls_tb_product_images->count($arr_where_clause);
    $v_total_page = ceil($v_total_row /$v_num_row);
    if($v_total_page <= 0) $v_total_page = 1;
    if($v_total_page<$v_page) $v_page = $v_total_page;
    $v_offset = ($v_page - 1)*$v_num_row;

    $v_dsp_paginition = news_pagination($v_total_page, $v_page, $v_admin_key, 4, '/', "");

    $arr_tb_product_images = $cls_tb_product_images->select_limit($v_offset,$v_num_row,$arr_where_clause);
    $v_dsp_tb_product_images = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

    $v_dsp_tb_product_images .= '<tr align="center" valign="middle">';
    $v_dsp_tb_product_images .= '<th>Ord</th>';
    $v_dsp_tb_product_images .= '<th>Image Map</th>';
    $v_dsp_tb_product_images .= '<th>Refer to Product</th>';
    $v_dsp_tb_product_images .= '<th>Status</th>';
    $v_dsp_tb_product_images .= '<th>Hot Spot</th>';
    $v_dsp_tb_product_images .= '<th>&nbsp;</th>';
    $v_dsp_tb_product_images .= '</tr>';
    $v_count = $v_offset+1;

    $arr_settings = array();
foreach($arr_tb_product_images as $arr){
    $v_product_id = isset($arr['product_id'])?$arr['product_id']:0;
    $v_product_images_id = isset($arr['product_images_id'])?$arr['product_images_id']:0;
    $v_image = isset($arr['low_res_image'])?$arr['low_res_image']:'';
    $v_dir = isset($arr['saved_dir'])?$arr['saved_dir']:'';
    if(strrpos($v_dir,'/')!==strlen($v_dir)-1) $v_dir.='/';
    $v_image = $v_dir.$v_image;

    $v_status = isset($arr['status'])?$arr['status']:0;
    $v_status = $v_status==0?'Active':'Inactive';
    $v_product_sku = $cls_tb_product->select_scalar('product_sku', array('product_id'=>$v_product_id));
    $arr_map_content = isset($arr['map_content'])?$arr['map_content']:array();
    $v_dsp_map = '';
    for($i=0; $i<count($arr_map_content); $i++){
        $v_sub_product_id = $arr_map_content[$i]['product_id'];
        $v_sub_product_name = $arr_map_content[$i]['product_name'];
        $v_sub_product_image = $arr_map_content[$i]['product_image'];
        $v_sub_product_url = $arr_map_content[$i]['product_url'];
        $v_sub_map_shape = $arr_map_content[$i]['map_shape'];
        $v_dsp_map .= '<p style="clear:both"><img src="'.$v_sub_product_image.'" style="float:left; max-width:50px; margin:5px" />'.$v_sub_product_name.' ('.$v_sub_map_shape.')</p>';
    }
    $v_dsp_tb_product_images .= '<tr align="left" valign="middle">';
    $v_dsp_tb_product_images .= '<td align="right">'.($v_count++).'</td>';
    $v_dsp_tb_product_images .= '<td align="center"><img style="max-width:150px" src="'.$v_image.'" /></td>';
    $v_dsp_tb_product_images .= '<td>'.$v_product_sku.'</td>';
    $v_dsp_tb_product_images .= '<td>'.$v_status.'</td>';
    $v_dsp_tb_product_images .= '<td>'.$v_dsp_map.'</td>';
    $v_dsp_tb_product_images .= '<td align="center"><a href="'.URL.$v_admin_key.'/'.$v_product_images_id.'/edit">Edit</a></td>';
    $v_dsp_tb_product_images .= '</tr>';
}
$v_dsp_tb_product_images .= '</table>';
?>