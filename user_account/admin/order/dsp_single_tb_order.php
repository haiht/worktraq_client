<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
$(document).ready(function(){
    var tab_strip = $("#data_single_tab").kendoTabStrip({
        animation:  {
            open: {
                effects: "fadeIn"
            }
        }
    }).data("kendoTabStrip");

});
</script>
    <div id="div_body">
        <div id="div_splitter_content" style="height: 100%; width: 100%;">
            <div id="div_left_pane">
                <div class="pane-content">
                	<div id="div_treeview"></div>
                </div>
            </div>
            <div id="div_right_pane">
                <div class="pane-content">
                    <div id="div_title" class="k-block k-widget">
                        <h3>Order<?php echo ': #'.$v_po_number;?></h3>
                    </div>
                    <div id="div_quick">
                        <div id="div_quick_search">
                        &nbsp;
                        </div>
                        <div id="div_select"><!--
                            <form id="frm_company_id" method="post">
                        Company: <select id="txt_company_id" name="txt_company_id">
                                    <option value="0" selected="selected">-------</option>
                                    <?php
                                    //echo $v_dsp_company_option;
                                    ?>
                                </select>
                            </form>
                        --></div>
                    </div>

                    <div id="data_single_tab">
                    <ul>
                        <li class="k-state-active">Information</li>
                        <li>Order Items</li>
                        <li>Order Logs</li>
                    </ul>

                    <div class="information div_details">
                        <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
                            <tr align="right" valign="top">
                                <td width="200px">Company</td>
                                <td align="left" colspan="6">
                                    <b> <?php echo $cls_tb_company->select_scalar('company_name',array('company_id'=>(int)$v_company_id)); ?></b>
                                </td>
                            </tr>
                            <tr align="right" valign="top" >
                                <td>Location</td>
                                <td align="left" colspan="6">
                                    <b> <?php echo $cls_tb_location->select_scalar('location_name',array('location_id'=>(int)$v_order_location_id)); ?></b>
                                </td>
                            </tr>
                            <tr align="right" valign="top">
                                <td>Order Ref</td>
                                <td align="left" colspan="6">
                                    <?php echo $v_order_ref; ?>

                                </td>
                            </tr>
                            <tr align="right" valign="top" >
                                <td>Po Number</td>
                                <td align="left" colspan="6">
                                    <?php echo $v_po_number;?>
                                </td>
                            </tr>
                            <tr align="right" valign="top" >
                                <td>Order Type</td>
                                <td align="left" colspan="6">
                                    <?php echo $cls_settings->get_option_name_by_id('order_type',$v_order_type,0);?>
                                </td>
                            </tr>
                            <tr align="right" valign="top" >
                                <td>Shipping Contact</td>
                                <td align="left" colspan="6">
                                    <?php echo  $cls_tb_contact->get_infomation_contact($v_shipping_contact)  ;?>
                                </td>
                            </tr>
                            <tr align="right" valign="top">
                                <td>Total Order Amount</td>
                                <td align="left">
                                    <span class="note"><b><?php echo format_currency((float)$v_total_order_amount) ;?></b> </span>
                                </td>
                                <td>Total Discount</td>
                                <td align="left">
                                    <span class="note"><b><?php echo format_currency((float)$v_total_discount) ;?></b> </span>
                                </td>
                                <td>Billing Contact</td>
                                <td align="left">
                                    <span class="note"><b><?php echo format_currency((float)$v_billing_contact);?></b> </span>
                                </td>
                            </tr>

                            <tr align="right" valign="top">
                                <td>Net Order Amount</td>
                                <td align="left">
                                    <?php echo format_currency($v_net_order_amount);?>
                                </td>
                                <td>Gross Order Amount</td>
                                <td align="left" colspan="6">
                                    <?php echo format_currency($v_gross_order_amount);?>
                                </td>
                            </tr>

                            <tr align="right" valign="top" >
                                <td>Job Description</td>
                                <td align="left" colspan="6" >
                                    <?php echo $v_job_description;?>
                                </td>
                            </tr>
                            <tr align="right" valign="top">
                                <td>Sale Rep</td>
                                <td align="left" colspan="6">
                                    <?php echo $v_sale_rep;?>
                                </td>
                            </tr>
                            <tr align="right" valign="top">
                                <td>Date Created</td>
                                <td align="left">
                                    <?php echo fdate($v_date_created);?>
                                </td>
                                <td>Date Required</td>
                                <td align="left" colspan="6">
                                    <?php echo fdate($v_date_required);?>
                                </td>
                            </tr>

                            <tr align="right" valign="top">
                                <td>Terms</td>
                                <td align="left">
                                    <?php echo $v_term;?>
                                </td>
                            </tr>
                            <tr align="right" valign="top">
                                <td>Delivery Method</td>
                                <td align="left">
                                    <?php  echo  $cls_settings->get_option_name_by_id('delivery_method',$v_delivery_method,0);?>
                                </td>
                                <td>Source</td>
                                <td align="left">
                                    <?php  echo  $cls_settings->get_option_name_by_id('source_type',$v_source,0);?>
                                </td>
                                <td>Status</td>
                                <td align="left">
                                    <b>  <?php  echo $cls_settings->get_option_name_by_id('order_status',$v_order_status,0);?></b>
                                </td>
                            </tr>

                            <tr align="right" valign="top">
                                <td>Dispatch</td>
                                <td align="left" colspan="6">
                                    <b> <?php  echo  $cls_settings->get_option_name_by_id('dispatch',$v_dispatch,0);?></b>
                                </td>
                            </tr>
                            <tr align="right" valign="top" >
                                <td>Tax 1</td>
                                <td align="left"><?php echo format_currency($v_tax_1);?></td>
                                <td>Tax 2</td>
                                <td align="left"><?php echo format_currency($v_tax_2);?></td>
                                <td>Tax 3</td>
                                <td align="left"><?php echo format_currency($v_tax_3);?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="items div_details">
                        <?php echo $v_dsp_tb_order_items; ?>
                    </div>
                    <div class="logs div_details">
                        <?php echo $v_dsp_order_log;?>
                    </div>
                   </div>

                </div>
            </div>
        </div>
  </div>
