<?php if(!isset($v_sval)) die();?>
<p class="highlightTitle"><span class="note"> System </span> </p>
<table cellpadding="3" cellspacing="3" class="list_table" width="100%">
    <tr>
        <td width="180px">Email data </td>
        <td><?php echo $v_email_data; ?></td>
    </tr>
    <tr>
        <td>Email description </td>
        <td><?php echo $v_description; ?></td>
    </tr>
    <tr>
        <th colspan="2">Email Template</th>
    </tr>
    <tr>
        <td colspan="2">
            <p class="code">
                <?php echo $v_dsp_email; ?>
            </p>
        </td>
    </tr>
</table>






