<?php 
include('../../inc/connection.inc.php');
include('../../inc/function.inc.php');
session_start();
?>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Exp Name', 'Amount'],
        <?php 
        // $sql="SELECT SUM(amount) as amount, expense_category.name from expense, expense_category WHERE expense.expense_category_id=expense_category.id AND expense.month='".date('m')."' group by expense_category.id";
        // $res=mysqli_query($con,$sql);
        // if(mysqli_num_rows($res)>0){
        //     while($row=mysqli_fetch_assoc($res)){
        //         echo "['".$row['name']."', ".$row['amount']."],";
        //     }
        // }
        ?>
        ]);

    var options = {
        title: 'Expense ',
        <!-- is3D: true, -->

    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
}
(function ($) {
	/*-------------------------------------
		  Bar Chart 
	  -------------------------------------*/
    
    if ($("#expense-bar-chart").length) {

    var barChartData = {
        labels: [
            "Male","Female",
        ],
        datasets: [{
            backgroundColor: ["#40dfcd", "#417dfc",],
            data: [ 
                    <?php  echo gettotalstudentByMale().",".gettotalstudentByFemale();?>
            ],
            label: "Male Female Student Count"
        }, ]
    };
    var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        animation: {
            duration: 20
        },
        scales: {

        xAxes: [{
            display: false,
            maxBarThickness: 100,
            ticks: {
                display: false,
                padding: 0,
                fontColor: "#646464",
                fontSize: 14,
            },
            gridLines: {
                display: true,
                color: '#e1e1e1',
            }
        }],
        yAxes: [{
            display: true,
            ticks: {
            display: true,
            autoSkip: false,
            fontColor: "#646464",
            fontSize: 14,
            stepSize: 50,
            padding: 20,
            beginAtZero: true,
            callback: function (value) {
                var ranges = [{
                    divider: 1e6,
                    suffix: 'M'
                },
                {
                    divider: 1e3,
                    suffix: 'k'
                }
                ];

                function formatNumber(n) {
                for (var i = 0; i < ranges.length; i++) {
                    if (n >= ranges[i].divider) {
                    return (n / ranges[i].divider).toString() + ranges[i].suffix;
                    }
                }
                return n;
                }
                return formatNumber(value);
            }
            },
            gridLines: {
            display: true,
            drawBorder: true,
            color: '#e1e1e1',
            zeroLineColor: '#e1e1e1'

            }
        }]
        },
        legend: {
        display: false
        },
        tooltips: {
        enabled: true
        },
        elements: {}
    };
    var expenseCanvas = $("#expense-bar-chart").get(0).getContext("2d");
    var expenseChart = new Chart(expenseCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
    });
    }


    /*-------------------------------------
		  Doughnut Chart 
	  -------------------------------------*/
    function studentChart(mData,fData){
        if ($("#student-doughnut-chart").length) {
        var fData, mData;
        var doughnutChartData = {
            labels: ["Female Students", "Male Students"],
            datasets: [{
            backgroundColor: ["#304ffe", "#ffa601"],
            data: [fData, mData],
                label: "Total Students"
            }, ]
        };
        var doughnutChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            cutoutPercentage: 65,
            rotation: -9.4,
            animation: {
            duration: 2000
            },
            legend: {
            display: false
            },
            tooltips: {
            enabled: true
            },
        };
        var studentCanvas = $("#student-doughnut-chart").get(0).getContext("2d");
        var studentChart = new Chart(studentCanvas, {
            type: 'doughnut',
            data: doughnutChartData,
            options: doughnutChartOptions
        });
        }
    }

})(jQuery);

