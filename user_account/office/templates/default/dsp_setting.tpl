<script type="text/javascript">
    $('document').ready(function(){
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
            if(confirm("[@ALERT_CONFIRM_USER] [@USERNAME]"))
                return true;
        });
    });
</script>


<section id="main">
    <ul class="breadcrumb">
        <li><a href="#" title="Home">Home</a><span class="divider">/</span></li>
        <li class="active">Settings</li>
    </ul>
    <h2 class="title-page"><span>Settings</span></h2>
    <section id="content">
        <div class="wrap-content">

            <h3>Contact Infomation</h3>
                <table cellpadding="2" cellspacing="2" border="0">
                    <tr>
                        <td>Username </td>
                        <td>:</td>
                        <td>[@USERNAME]</td>
                    </tr>
                    <tr>
                        <td>Company </td>
                        <td>:</td>
                        <td>[@COMPANY_NAME]</td>
                    </tr>
                </table>
            <h3>Change Password</h3>
            <form id="report-error" class="form-general report-error" action="http://worktraq.anvy.net/setting.html" method="post" name="report-error">
                <p class="alert-message">[@ERROR]</p>
                <p class="alert-message-success"> [@SUCCESS]</p>
                <table cellpadding="2" cellspacing="2" border="0">
                    <tr>
                        <td>New password</td>
                        <td></td>
                        <td><input type="password" id="txt_new_password" name="txt_new_password" value=""> </td>
                    </tr>
                    <tr>
                        <td>Repeat New password</td>
                        <td></td>
                        <td><input type="password" id="txt_repeat_new_password" name="txt_repeat_new_password" value=""> </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="left">
                            <button id="btn_change_password" name="btn_change_password" class="btn" title="Change password">Change password</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </section>
</section>