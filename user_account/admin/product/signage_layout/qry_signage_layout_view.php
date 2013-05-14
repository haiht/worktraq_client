<?php
if(!isset($v_sval)) die();
?>
<?php
$v_product_images_id = isset($_GET['id'])?$_GET['id']:'0';
settype($v_product_images_id, 'int');
$v_dsp_map = '';
$v_dsp_script = '';
$v_dsp_key = '';
$v_session = session_id();
if($v_product_images_id>0){
    $v_row = $cls_tb_product_images->select_one(array('product_images_id'=>$v_product_images_id));
    if($v_row==1){
        $v_product_id = $cls_tb_product_images->get_product_id();
        $arr_map_content = $cls_tb_product_images->get_map_content();
        $arr_map_images = $cls_tb_product_images->get_map_images();
        $v_image = isset($arr_map_images['image'])?$arr_map_images['image']:'';
        $v_image1 = isset($arr_map_images['image1'])?$arr_map_images['image1']:'';
        $v_image2 = isset($arr_map_images['image2'])?$arr_map_images['image2']:'';

        $v_script='';
        if(is_array($arr_map_content)){
            for($i=0; $i<count($arr_map_content); $i++){
                $v_sub_product_id = $arr_map_content[$i]['product_id'];
                $v_sub_product_image = $arr_map_content[$i]['product_image'];
                $v_sub_product_name = $arr_map_content[$i]['product_name'];
                $v_sub_product_url = $arr_map_content[$i]['product_url'];
                $v_sub_map_shape = $arr_map_content[$i]['map_shape'];
                $v_sub_map_coords = $arr_map_content[$i]['map_coords'];
                $v_sub_map_key = $arr_map_content[$i]['map_key'];
                $v_sub_product_url = str_replace('catalogue/','admin/product/products/', $v_sub_product_url);
                $v_sub_product_url = str_replace('/info','/edit', $v_sub_product_url);
                if($v_sub_map_coords!=''){
                    $v_dsp_map .= "\n\t".'<area href="'.URL.$v_sub_product_url.'" data-state="'.$v_sub_map_key.'" target="_blank" shape="'.$v_sub_map_shape.'" coords="'.$v_sub_map_coords.'" data-full="'.$v_sub_product_name.'" />';

                    $cls_tb_product->select_one(array('product_id'=>$v_sub_product_id));
                    $v_price = $cls_tb_product->get_default_price();
                    $v_short_desc = $cls_tb_product->get_short_description();
                    $v_script .= "\nvar p{$v_sub_product_id} = '<span style=\"color:blue\"><b>Product: </b>".$v_sub_product_name.'<br /><b>Price:</b> '.format_currency($v_price).'<br />'.addslashes($v_short_desc)."</span>';";

                    if($v_dsp_key!='') $v_dsp_key.=',';
                    $v_dsp_key.='{key:"'.$v_sub_map_key.'", selected: true, toolTip:p'.$v_sub_product_id.'}';
                }
            }
            if($v_dsp_map!=''){
                $v_dsp_map = "\n".'<map id="map_'.$v_session.'" name="product_map">'.$v_dsp_map."\n</map>";
                $v_dsp_map = '<img id="image_'.$v_session.'" src="'.$v_image.'" border="0" usemap="#product_map" />'.$v_dsp_map;
                $v_dsp_script = $v_script."\n".'
                    $("#image_'.$v_session.'").mapster({
                        fillOpacity: 0.5,
                        fillColor: "d42e16",
                        stroke: true,
                        strokeColor: "00FFFF",
                        strokeOpacity: 0.8,
                        strokeWidth: 2,
                        render_highlight: {
                            fillColor: "2aff00",
                            stroke: true,
                            altImage: "'.URL.$v_image1.'"
                        },
                        render_select: {
                            fillColor: "ff000c",
                            stroke: true,
                            altImage: "'.URL.$v_image2.'"
                        },
                        fadeInterval: 50,
                        mapKey: "data-state",
                        isSelectable: true,
                        showToolTip: true,
                        onClick: function(){
                            if(this.href && this.href !== \'#\'){
                                window.open(this.href,"_blank");
                            }
                            this.rebind();
                        },
                        areas: ['.$v_dsp_key.']
                    });
                ';
            }
        }
    }
}
?>