<?php if(!isset($v_sval)) die();?>
<?php echo js_tabas();?>
<script type="text/javascript">
    $(document).ready( function() {
        $('#tab-container').easytabs();
    });
</script>
<p class="break"></p>
<p class="highlightNavTitle">..<span> Company Name:  <?php echo $v_company_name;?></span></p>
<p class="break"></p>


<div id="tab-container" class='tab-container'>
    <ul class='etabs'>
        <li class='tab'><a href="#tab_company">Company </a></li>
        <li class='tab'><a href="#tab_location">Locations</a></li>
    </ul>

    <div class='panel-container'>
        <div id="tab_company">
            <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
                <tr  valign="top">
                    <td align="right" width="180px">Company Name: </td>
                    <td align="left">
                    <?php echo $v_company_name;?>
                    </td>
                </tr>
                <tr align="right" valign="top">
                    <td>Company Code </td>
                    <td align="left">
                        <?php echo $v_company_code;?>
                    </td>
                </tr>
                <tr align="right" valign="top">
                    <td>Relationship</td>
                    <td align="left">
                        <?php echo $cls_settings->get_option_name_by_id('relationship',$v_relationship); ?>
                    </td>
                </tr>
                <tr align="right" valign="top">
                    <td>Bussines Type</td>
                    <td align="left">
                        <?php echo $cls_settings->get_option_name_by_id('bussiness_type',$v_bussines_type); ?>
                    </td>
                </tr>
                <tr align="right" valign="top">
                    <td>Industry</td>
                    <td align="left">
                        <?php echo $cls_settings->get_option_name_by_id('industry',$v_industry); ?>
                    </td>
                </tr>
                <tr align="right" valign="top">
                    <td>Sales Rep</td>
                    <td align="left">
                        <?php echo $cls_tb_contact->get_full_name_contact($v_sales_rep); ?>
                    </td>
                </tr>
                <tr align="right" valign="top">
                    <td>CSR</td>
                    <td align="left">
                        <?php echo $cls_tb_contact->get_full_name_contact($v_csr); ?>
                    </td>
                </tr>
                <tr align="right" valign="top">
                    <td>Logo File </td>
                    <td align="left">
                        <?php if(file_exists('resources/'.$v_company_code.'/'.$v_logo_file)) ?>
                        <img src="<?php echo URL.'resources/'.$v_company_code.'/'.$v_logo_file; ?> " alt="">
                    </td>
                </tr>
            </table>
        </div>
        <div id="tab_location">
            <?php
            $v_dsp_tb_location = '<table class="list_table" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';
            $v_dsp_tb_location .= '<tr align="center" valign="middle">';
            $v_dsp_tb_location .= '<th></th>';
            $v_dsp_tb_location .= '<th>Location Name</th>';
            $v_dsp_tb_location .= '<th>Location Number</th>';
            $v_dsp_tb_location .= '<th>Region</th>';
            $v_dsp_tb_location .= '<th>Banner</th>';
            $v_dsp_tb_location .= '<th>Address </th>';
            $v_dsp_tb_location .= '<th>Main Contact</th>';
            $v_dsp_tb_location .= '</tr>';
            $v_count = 1;

            $cls_tb_location = new cls_tb_location($db);
            $cls_settings = new cls_settings($db);
            $arr_tb_location = $cls_tb_location->select_limit(0,100,array('company_id'=>(int) $v_company_id));
            foreach($arr_tb_location as $arr)
            {
                $v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
                $arr_company_id = isset($arr['company_id'])?$arr['company_id']:0;
                $v_location_name = isset($arr['location_name'])?$arr['location_name']:'';
                $v_location_type = isset($arr['location_type'])?$arr['location_type']:0;
                $v_location_banner = isset($arr['location_banner'])?$arr['location_banner']:'';
                $v_location_area = isset($arr['location_area'])?$arr['location_area']:'';
                $v_location_number = isset($arr['location_number'])?$arr['location_number']:'';
                $v_main_contact = isset($arr['main_contact'])?$arr['main_contact']:'';
                $v_address_unit = isset($arr['address_unit'])?$arr['address_unit']:'';
                $v_location_phone = isset($arr['location_phone'])?$arr['location_phone']:'';
                $v_address_line_1 = isset($arr['address_line_1'])?$arr['address_line_1']:'';
                $v_address_line_2 = isset($arr['address_line_2'])?$arr['address_line_2']:'';
                $v_address_line_3 = isset($arr['address_line_3'])?$arr['address_line_3']:'';
                $v_address_city = isset($arr['address_city'])?$arr['address_city']:'';
                $v_location_region = isset($arr['location_region'])?$arr['location_region']:'';
                $v_address_province = isset($arr['address_province'])?$arr['address_province']:'';
                $v_address_postal = isset($arr['address_postal'])?$arr['address_postal']:'';
                $arr_address = isset($arr['address_country'])?$arr['address_country']:array();

                $v_address = ($v_address_unit!=''?$v_address_unit .', ':'') . ($v_address_line_1!=''?$v_address_line_1 .'<br>':'');
                $v_address .= ($v_address_city!=''?$v_address_city .'&nbsp&nbsp':'') . ($v_address_province!=''?$v_address_province .'&nbsp&nbsp':'') .($v_address_postal!=''?$v_address_postal.'&nbsp&nbsp<br>':'');
                $v_address .= ($v_location_phone!=''?$v_location_phone .'&nbsp&nbsp':'') ;

                $v_name_main_contact = $cls_tb_contact->get_full_name_contact($v_main_contact);

                $v_dsp_tb_location .= '<tr align="left" valign="middle">';
                $v_dsp_tb_location .= '<td align="right" width="10px">'.($v_count++).'</td>';
                $v_dsp_tb_location .= '<td>'.$v_location_name.'</td>';
                $v_dsp_tb_location .= '<td>'.$v_location_number.'</td>';
                $v_dsp_tb_location .= '<td>'.$v_location_region.'</td>';
                $v_dsp_tb_location .= '<td>'.$v_location_banner.'</td>';
                $v_dsp_tb_location .= '<td>'.$v_address.'</td>';
                $v_dsp_tb_location .= '<td>'.$v_name_main_contact.'</td>';
                $v_dsp_tb_location .= '</tr>';
            }
            $v_dsp_tb_location .='</table>';
            echo $v_dsp_tb_location;
            ?>
        </div>
    </div>
</div>