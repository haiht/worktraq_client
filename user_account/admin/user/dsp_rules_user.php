<?php if(!isset($v_sval)) die();?>
<script type="text/javascript" src="lib/js/yahoo-min.js"></script>
<script type="text/javascript" src="lib/js/json-min.js"></script>

<script type="text/javascript ">
$(document).ready(function(){
    $('input#check_all[type="checkbox"]').click(function(){
        var chk = $(this).attr('checked')?true:false;
        $('input#check_all_menu').each(function(){
            $(this).attr('checked', chk);
            //$(this).trigger('click');

            //var chk = $(this).attr('checked')?true:false;
            var menu = $(this).attr('data-menu');
            $('input#chk_rule_id').each(function(){
                var sub_menu = $(this).attr('data-menu');
                if(menu==sub_menu){
                    $(this).attr('checked', chk);
                    update_rules(menu, $(this).val(), $(this).attr('title'),chk);
                }
            });

        });
        parent.rule_change = check_rule_change();
    });
    $('input#check_all_menu').click(function(){
        $(this).each(function(){
            var chk = $(this).attr('checked')?true:false;
            //alert(chk);
            var menu = $(this).attr('data-menu');
            $('input#chk_rule_id').each(function(){
                var sub_menu = $(this).attr('data-menu');
                if(menu==sub_menu){
                    $(this).attr('checked', chk);
                    update_rules(menu, $(this).val(), $(this).attr('title'),chk);
                }
            });
            //$(this).attr('checked', chk);
        });
        parent.rule_change = check_rule_change();
    });
    $('input#chk_rule_id').click(function(){
        $(this).each(function(){
            var menu = $(this).attr('data-menu');
            var chk = $(this).attr('checked')?true:false;
            update_rules(menu, $(this).val(), $(this).attr('title'),chk);
        });
        parent.rule_change = check_rule_change();
    });

    $('input#btn_submit_user_rule').click(function(){
        var $this = $(this);
        var data = [];
        if(!parent.rule_change){
            alert('Not any change for user\'s rules!');
            return;
        }
        for(var i=0;i<rule.length; i++){
            //rule[i].show();
            if(rule[i].status==0){
                data.push(new Array(rule[i].menu,rule[i].key,rule[i].description));
            }
        }
        data = YAHOO.lang.JSON.stringify(data);
        $.ajax({
            url     :   '<?php echo URL.$v_admin_key;?>/ajax',
            type    : 'POST',
            async: false,
            cache: false,
            timeout: 10000,
            data    :   {txt_user_id:<?php echo $v_user_id;?>, txt_user_rule: data},
            beforeSend: function(){
                $this.attr('disabled', true);
            },
            success:function(data, type){
                var ret = $.parseJSON(data);
                if(ret.error==0){
                    parent.rule_change = false;
                    for(var i=0; i<rule.length; i++){
                        if(rule[i].status==0){
                            rule[i].old = 1;
                            rule[i].change = 0;
                        }
                    }
                    alert(ret.message)
                    $this.attr('disabled', false);
                }
            }
        });
    });
});
function check_rule_change(){
    var ret = false;
    for(var i=0; i<rule.length; i++){
        if(rule[i].change==1){
            ret = true;
            i = rule.length;
        }
    }
    return ret;
}
function update_rules(menu, key, desc, chk){
    var found = false;
    var len = rule.length;
    var pos = -1;
    for(var i=0; i<len; i++){
        if(menu==rule[i].menu && key==rule[i].key){
            found = true;
            pos = i;
            i = rule.length;
        }
    }
    if(found){
        rule[pos].status = chk?0:1;
        if(rule[pos].old==1) rule[pos].change = chk?0:1;
    }else{
        rule[len] = new UserRule(menu, key, desc, 0);
        rule[len].change = 1;
    }

}
function UserRule(menu, key, description, old){
    this.menu = menu;
    this.key = key;
    this.description = description;
    this.status = 0;
    this.change = 0;
    this.old = old;
}
UserRule.prototype.remove = function(){
    this.status = 1;
    if(this.old==1) this.change = 1;
}
UserRule.prototype.show = function(){
    var s = 'Menu: '+this.menu +"\n" + 'Key: '+this.key+"\n"+'Description: '+this.description+"\n"+'Status: '+this.status;
    s += "\n"+"Old: "+this.old+"\n"+"Change: "+this.change;
    alert(s);
}

var rule = new Array();
<?php
echo $v_dsp_script."\n";
?>
</script>


<p class="highlightNavTitle"><span> Create Rules for user: <?php echo $v_user_info;?>  </span></p>
<p class="break"></p>
<?php
echo $v_dsp_tb_rule;
?>
