google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);

function drawChart() {
    var categories = document.getElementsByClassName('ReportCategory');
    var sums = document.getElementsByClassName('ReportSum');
    var sum = 0;
    var procents = [];
    var resArr = [
        ['Звіт','Витрат']
    ]
    for(let i = 0 ; i < sums.length ; i++){
        sum += +sums[i].innerText;
    }
    for(let i = 0 ; i < sums.length ; i++){
        procents[i] = +sums[i].innerText * 100/sum;
        resArr[i+1] = [categories[i].innerText,procents[i]];
    }
    var data = google.visualization.arrayToDataTable(resArr);

    var options = {
        title: 'Розподіл витрат за період',
        pieHole: 0.5,
        pieSliceTextStyle: {
            color: 'black',
        },
        legend: 'none',
        backgroundColor:'#e1e1e1'
    };

    var chart = new google.visualization.PieChart(document.getElementById('donut_single'));

    chart.draw(data, options);

}