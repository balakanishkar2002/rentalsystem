gvChartInit();

var maxBox2Height = 0;

$(document).ready(function()
{
	
    $(".chart1 table.myChart").each(function()
    {
        $(this).gvChart(
        {
            chartType: "ColumnChart",
            gvSettings:
            {
                width: 600,
                height: 300,
                backgroundColor:"#F9F9F9"
            }
        });
    });	
    
    $(".chart-analysis table.myChart").each(function()
    {
        $(this).gvChart(
        {
            chartType: "ColumnChart",
            gvSettings:
            {
                width: 1000,
                height: 500,
                backgroundColor:"#F9F9F9"
            }
        });
    });	    
	
});