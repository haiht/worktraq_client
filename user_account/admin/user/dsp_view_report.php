<p class="highlightTitle">
    <span class="note"> User infomation </span>
</p>
<table cellpadding="2" cellspacing="2" class="list_table" width="100%">
    <tr>
        <td width="180px">Username</td>
        <td><?php  echo $v_user_name; ?> </td>
    </tr>
    <tr>
        <td width="120px" >Company </td>
        <td><?php echo $v_company_name; ?></td>
    </tr>
    <tr>
        <td>Location </td>
        <td><?php echo $v_location_name; ?></td>
    </tr>
    <tr>
        <td>Contact Name</td>
        <td><?php echo $cls_tb_contact->get_infomation_contact($v_contact_id);?></td>
    </tr>
</table>