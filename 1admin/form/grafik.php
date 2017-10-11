<!DOCTYPE html>
<html>
<head>
<title>Grafik dengan Highchart</title>
<script src="../bootstrap/js/jquery.js"></script>
<script src="../bootstrap/js/highcharts.js"></script>
<!-- script option grafik line -->
<script type="text/javascript">
$(function () {
    $('#grafikline').highcharts({
        title: {
            text: 'Pemesanan',
            x: -20 //center
        },
        subtitle: {
            text: 'Periode Tahun',
            x: -20
        },
  credits: {
   enabled: false
  },
        xAxis: {
   title: {
                text: 'Tahun'
            },
            categories: ['2010','2011','2012','2013']
        },
        yAxis: {
            title: {
                text: 'Persentase (%)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '%'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
     name: "Bengkulu Selatan",
     data: [22.65,23.04,22.57,22.59]
    },{
     name: "Bengkulu Tengah",
     data: [7.27,6.55,6.46,6.38]
    },{
     name: "Bengkulu Utara",
     data: [14.57,14.48,14.29,14.80]
    },{
     name: "Kaur",
     data: [23.33,22.73,22.31,21.14]
    },{
     name: "Kepahyang",
     data: [16.17,15.38,15.06,14.76]
    },{
     name: "Kota Bengkulu",
     data: [21.65,22.24,22.01,17.68]
    },{
     name: "Lebong",
     data: [12.95,12.53,12.40,12.75]
    },{
     name: "Mukomuko",
     data: [13.06,13.29,13.15,14.12]
    },{
     name: "Rejang Lebong",
     data: [18.51,17.33,16.92,15.07]
    },{
     name: "Seluma",
     data: [21.91,21.26,20.91,20.74]
    }]
    });
});
</script>
</head>
<body>
<div id="grafikline" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</body>
</html>