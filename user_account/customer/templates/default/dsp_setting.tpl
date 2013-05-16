<script type="text/javascript">
    $('document').ready(function(){

        $("a.tab").click(function () {
            $(".active").removeClass("active");
            $(this).addClass("active");
            $(".content_table").hide();
            var content_show = $(this).attr("title");
            $("#"+content_show).show();
        });
        $("#btn_change_infor").click(function(){
            location.reload();
        });
        $("#btn_change_contact").click(function(){
            location.reload();
        });
        $("#btn_change_password").click(function(){
            var v_new_password = $("#txt_new_password").val();
            var v_repeat_new_password =  $("#txt_repeat_new_password").val();
            v_new_password = $.trim(v_new_password);
            v_repeat_new_password = $.trim(v_repeat_new_password);

            if(v_new_password.length < 6 || v_repeat_new_password.length <6)
            {

                alert("[@ALERT_INVAILD_PASSWORD]");
                return false;
            }
            if(v_new_password != v_repeat_new_password)
            {
                alert("[@ALERT_CORRECT_PASSWORD]");
                return false;
            }
        });
    });
</script>
<style>
    .field_set{
        background-color: #EBEBEB;
        border: thin solid #033F6B;
        color: #033F6B;
        font: bold 13px Arial;
        margin-top: 10px;
        padding: 0 20px;
        width: 925px;
    }

</style>
<div class="sub">
    <a href="[@URL]">HOME</a>
    <span class="icon_sub_next"></span>
    <a class="sub_active" href="[@URL_PATH]catalogue" >SETTINGS</a>
</div>
</div>
</div>
<div class="content">
    <div class="float_right">
        <div class="title_r">
            USER SETTINGS
        </div>
        <div class="right_ct_pro_lates">
            <div style="width: 990px; text-align: center; color: red">
                <p class="alert-message">[@ERROR]</p>
                <p class="alert-message-success"> [@SUCCESS]</p>
            </div>
            <p class="clear"></p>
            <form id="report-error" class="form-general report-error" action="[@URL]setting.html" method="post" name="report-error">
                <fieldset class="field_set">
                    <legend>CHANGE PASSWORD</legend>
                    <table cellpadding="2" cellspacing="2" border="0" class="table_settings">
                        <tr>
                            <td class="td_1">New password</td>
                            <td>:</td>
                            <td class="td_2"><input type="password" id="txt_new_password" name="txt_new_password" value=""> </td>
                        </tr>
                        <tr>
                            <td class="td_1">Repeat New password</td>
                            <td>:</td>
                            <td class="td_2"><input type="password" id="txt_repeat_new_password" name="txt_repeat_new_password" value=""> </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="td_2">
                                <input type="submit" id="btn_change_password" name="btn_change_password" class="btn_1" title="Change password" value="Change pass" />
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </form>
            <div class="indent">
                <div class="box_2 tabs" id="tabs">
                    <div class="infor float_left" id="tab_item">
                        <a href="#" title="user_information" class="tab active ">User Information</a>
                    </div>
                    <div class="infor float_left" id="tab_item">
                        <a href="#" title="user_contact_information" class="tab ">Contact Information</a>
                    </div>
                    <div class="infor float_left" id="tab_item">
                        <a href="#" title="company_information" class="tab ">Company Information</a>
                    </div>
                    <div class="clear"></div>
                </div>
                    <div class="reate">
                        <div class="right_ct_sup noborder content_table" id="user_information">
                            <table cellpadding="2" cellspacing="2" border="0" class="table_settings">
                                <tr>
                                    <td class="td_1" >Username </td>
                                    <td >:</td>
                                    <td class="td_2" ><span name="setting_username" style="color: red; font-size: 16px; text-decoration-style: double">[@USERNAME]</span>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="td_1">Full Name </td>
                                    <td> : </td>
                                    <td class="td_2">
                                        <span id="user_first_name" name=" user_first_name">[@FIRST_NAME]</span>
                                        <span name="user_middle_name">[@MIDDLE_NAME]</span>
                                        <span name="user_last_name">[@LAST_NAME]</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td_1">Email </td>
                                    <td> : </td>
                                    <td class="td_2"><a name="user_email">[@EMAIL]</a></td>
                                </tr>
                                <tr>
                                    <td class="td_1">Birthday </td>
                                    <td> : </td>
                                    <td class="td_2"><span name="user_birthday">[@BIRTHDAY]</span></td>
                                </tr>
                            </table>
                        </div>
                        <div class="right_ct_sup noborder content_table" id="user_contact_information" STYLE="DISPLAY: NONE">
                            <table class="table_settings" border="1" cellpadding="3" cellspacing="0">
                                <tr align="right" valign="top">
                                    <td class="td_1">Direct Phone :</td>
                                    <td class="td_2">
                                        <span name="txt_direct_phone">[@DIRECT_PHONE]</span>
                                    </td>
                                </tr>
                                <tr align="right" valign="top">
                                    <td class="td_1">Mobile Phone :</td>
                                    <td class="td_2">
                                        <span id="txt_mobile_phone" name="txt_mobile_phone">[@MOBIE_PHONE]</span>

                                    </td>
                                </tr>
                                <tr align="right" valign="top">
                                    <td class="td_1">Fax Number :</td>
                                    <td class="td_2">
                                        <span id="txt_fax_number" name="txt_fax_number">[@FAX_NUMBER]</span>
                                    </td>
                                </tr>
                                <tr align="right" valign="top">
                                    <td class="td_1">Home Phone :</td>
                                    <td class="td_2">
                                        <span id="txt_home_phone" name="txt_home_phone">[@HOME_PHONE]</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="right_ct_sup noborder content_table" id="company_information" STYLE="DISPLAY: NONE">
                                <table cellpadding="2" cellspacing="2" border="0" class="table_settings">
                                    <tr>
                                        <td class="td_1">Company Name</td>
                                        <td>:</td>
                                        <td class="td_2"><span>[@COMPANY_NAME]</span></td>
                                    </tr>
                                    <tr>
                                        <td class="td_1">Company's Location</td>
                                        <td>:</td>
                                        <td class="td_2"><span>[@LOCATION_NAME]</span></td>
                                    </tr>
                                </table>
                        </div>
                    </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
