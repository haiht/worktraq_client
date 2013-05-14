<?php echo js_tabas();?>
<script type="text/javascript">
    $(document).ready( function() {
        $('#tab-container').easytabs();
    });
</script>
<p class="break"></p>
    <h3>All About the Location!............</h3>
<div id="tab-container" class='tab-container'>
    <ul class='etabs'>
        <li class='tab'><a href="#tab_location">Location </a></li>
        <li class='tab'><a href="#tab_contact">Contact</a></li>
        <li class='tab'><a href="#tab_area">Area</a></li>
    </ul>
    <div class='panel-container'>
        <div id="tab_location">
            <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
                <tr align="right" valign="top">
                    <td width="15%">Company</td>
                    <td align="left">
                       <b> <?php  echo $cls_tb_company->get_company_name_by_id($v_company_id); ?></b>
                    </td>
                </tr>
                <tr align="right" valign="top">
                    <td>Location Name</td>
                    <td align="left">
                        <?php echo $v_location_name;  ?>
                    </td>
                </tr>
                <tr align="right" valign="top">
                    <td>Location Banner</td>
                    <td align="left">
                        <b><?php echo $v_location_banner;  ?></b>
                    </td>
                </tr>

                <tr align="right" valign="top">
                    <td>Location Type </td>
                    <td align="left"> <?php echo $cls_settings->get_option_name_by_id('location_type',$v_location_type); ?>
                    </td>
                </tr>
                <tr align="right" valign="top">
                    <td>Location Region</td>
                    <td align="left">
                        <?php echo $v_location_region;?>
                    </td>
                </tr>
                <tr align="right" valign="top">
                    <td>Location Number</td>
                    <td align="left">
                        <?php echo $v_location_number;?>
                    </td>
                </tr>

                <tr align="right" valign="top">
                    <td>Address </td>
                    <td align="left">
                        <?php echo $v_address_unit . " " .$v_address_line_1 ;?> <br>
                        <?php echo $v_address_line_2 . " " .$v_address_line_3 ;?> <br>
                        <?php echo $v_address_city . " " .$v_address_province  ;?> <br>
                        <?php echo $v_address_postal . " " .get_select_one($v_address_country,'address_country')  ;?> <br>
                    </td>
                </tr>
                <tr align="right" valign="top">
                    <td>Status</td>
                    <td align="left">
                        <?php echo $cls_settings->get_option_name_by_id('location_status',$v_status); ?>
                    </td>
                </tr>
            </table>
        </div>
        <div id="tab_contact">
        <?php
            $cls_tb_contact = new cls_tb_contact($db,LOG_DIR);
            $v_offset= 0;
            $v_num_row = 100;
            $arr_where_clause = array("location_id"=>(int)$v_location_id);

            $arr_tb_contact = $cls_tb_contact->select_limit($v_offset,$v_num_row,$arr_where_clause);
            $v_dsp_tb_contact = '<table class="list_table sortable" width="100%" cellpadding="3" cellspacing="0" border="0" align="center">';

            $v_dsp_tb_contact .= '<tr align="center" valign="middle">';
            $v_dsp_tb_contact .= '<th>Ord</th>';
            $v_dsp_tb_contact .= '<th>First Name</th>';
            $v_dsp_tb_contact .= '<th>Last Name</th>';
            $v_dsp_tb_contact .= '<th>Contact Type</th>';

            $v_dsp_tb_contact .= '<th>Direct Phone</th>';
            $v_dsp_tb_contact .= '<th>Fax Number</th>';
            $v_dsp_tb_contact .= '<th>Email</th>';
            $v_dsp_tb_contact .= '</tr>';
            $v_count = 1;

            foreach($arr_tb_contact as $arr){
                $v_mongo_id = $cls_tb_contact->get_mongo_id();
                $v_contact_id = isset($arr['contact_id'])?$arr['contact_id']:0;
                $v_location_id = isset($arr['location_id'])?$arr['location_id']:0;
                $v_contact_type = isset($arr['contact_type'])?$arr['contact_type']:'';
                $v_first_name = isset($arr['first_name'])?$arr['first_name']:'';
                $v_last_name = isset($arr['last_name'])?$arr['last_name']:'';
                $v_middle_name = isset($arr['middle_name'])?$arr['middle_name']:'';
                $v_birth_date = isset($arr['birth_date'])?date('d-M-Y H:i:s',$arr['birth_date']->sec):date('d-M-Y H:i:s', time());
                $v_address_type = isset($arr['address_type'])?$arr['address_type']:0;
                $v_address_unit = isset($arr['address_unit'])?$arr['address_unit']:'';
                $v_address_line_1 = isset($arr['address_line_1'])?$arr['address_line_1']:'';
                $v_address_line_2 = isset($arr['address_line_2'])?$arr['address_line_2']:'';
                $v_address_line_3 = isset($arr['address_line_3'])?$arr['address_line_3']:'';
                $v_address_city = isset($arr['address_city'])?$arr['address_city']:'';
                $v_address_province = isset($arr['address_province'])?$arr['address_province']:'';
                $v_address_postal = isset($arr['address_postal'])?$arr['address_postal']:'';
                $v_address_country = isset($arr['address_country'])?$arr['address_country']:array();
                $v_direct_phone = isset($arr['direct_phone'])?$arr['direct_phone']:'';
                $v_mobile_phone = isset($arr['mobile_phone'])?$arr['mobile_phone']:'';
                $v_fax_number = isset($arr['fax_number'])?$arr['fax_number']:'';
                $v_home_phone = isset($arr['home_phone'])?$arr['home_phone']:'';
                $v_email = isset($arr['email'])?$arr['email']:'';
                $v_user_id = isset($arr['user_id'])?$arr['user_id']:0;
                $v_dsp_tb_contact .= '<tr align="left" valign="middle">';
                $v_dsp_tb_contact .= '<td align="right">'.($v_count++).'</td>';
                $v_dsp_tb_contact .= '<td>'.$v_first_name.'</td>';
                $v_dsp_tb_contact .= '<td>'.$v_last_name.'</td>';
                $v_dsp_tb_contact .= '<td>'.$cls_settings->get_option_name_by_id('contact_type',$v_contact_type).'</td>';

                $v_dsp_tb_contact .= '<td>'.$v_direct_phone.'</td>';
                $v_dsp_tb_contact .= '<td>'.$v_fax_number.'</td>';
                $v_dsp_tb_contact .= '<td>'.$v_email.'</td>';
                $v_dsp_tb_contact .= '</tr>';
            }
            $v_dsp_tb_contact .= '</table>';
            echo $v_dsp_tb_contact;
            ?>
        </div>
        <div id="tab_area">
            <?php echo $v_dsp_tb_location_area;?>
        </div>
    </div>
</div>



