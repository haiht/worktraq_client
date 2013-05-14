<?php if(!isset($v_sval)) die();?>
<p class="highlightTitle"><span class="note"> System </span> </p>
<div id="leftNav" class="leftNavResize3">
    <?php echo $v_list_order; ?>
</div>
<div id="rightNav" class="rightNavResize3">
    <?php echo $v_list_shipping; ?>
</div>

<p class="highlightTitle"><span> TOTAL ORDERS IN WEEK </span> </p>
<?php echo js_hight_chart(); ?>
<script type="text/javascript">
    $(function () {
        var chart;
        $(document).ready(function() {
            chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'container',
                    type: 'line'
                },
                title: {
                    text: 'Total Orders in this week'
                },
                subtitle: {
                    text: 'From <?php echo $arr_date_charts[0];?> To  <?php echo $arr_date_charts[6];?>'
                },
                xAxis: {
                    categories:
                    [
                        <?php
                           for ($i = 0; $i < 7; $i++) {
                               if($i==6)
                                    echo "'". $arr_date_charts[$i]."'";
                               else
                                   echo "'".$arr_date_charts[$i] ."',";

                           }
                        ?>
                    ]
                },
                yAxis: {
                    title: {
                        text: 'Number Orders'
                    }
                },
                tooltip: {
                    enabled: false,
                    formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                            this.x +': '+ this.y +'°C';
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: false
                    }
                },
                series: [{
                    name: 'Total Order Amount',
                    data: [
                    <?php
                    for ($i = 0; $i < 7; $i++) {
                        if($i==6)
                            echo $arr_total_order[$i];
                        else
                            echo $arr_total_order[$i] .",";

                    }
                    ?>
                    ]
                }]
            });
        });

    });
</script>
<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>