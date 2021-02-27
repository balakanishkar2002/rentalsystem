function isNumber(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}

function getGraph(jdata) {
    var timeFilterVal = 3;


    var allDevices = [];
    var i = 0;
    var price = [];
    var totalPriceArray = Array();
    var devicesName = [];
    var plot2;

    var lvlChangePoint = Array();
    var myArrayPoints = Array();
    //var axisTitle = Array();
    var minVal = 999999;
    var maxVal = -1;

    single = jdata['graph_options']['single'];
    bar = jdata['graph_options']['bar'];
    shed_levels = jdata['graph_options']['shed_levels'];
    container = jdata['graph_options']['container'];
    var axisTitle = jdata['graph_options']['axisTitle'];
    show_price = jdata['graph_options']['showPrice']; // show / don't show price

    data = jdata['data'];
    if (true == show_price) {
        devicesName.push('Price');
    }

    var numberOfDevices = 0;
    var totalPrice = 0;
    var m = 0;
    var dNum = 0;

    for (x in data) {
        numberOfDevices++;
    }

    for (x in data) {
        m++;
        var j = 0;

        devicesName.push(x);
        for (y in data[x]) {

            var localPrice = parseFloat(data[x][y].price);

            if (m == 1) {
                totalPriceArray.push(localPrice);
                lvlChangePoint.push(data[x][y].level);
            }
            else {
                if (parseInt(data[x][y].level) > parseInt(lvlChangePoint[j])) {
                    lvlChangePoint[j] = parseInt(data[x][y].level);
                }
            }

            if ((totalPriceArray[j] === 'NaN') || (totalPriceArray[j] === '') || (totalPriceArray[j] === 'undefined')) {
                totalPriceArray[j] = null;
            }
            if (m != 1) {
                if (isNumber(localPrice)) {
                    totalPriceArray[j] = parseFloat(totalPriceArray[j]) + localPrice;
                }
                else {
                    totalPriceArray[j] = null;
                }
            }

            if (m == numberOfDevices) {
                if (single) {
                    price.push(totalPriceArray[j]);
                }
                else {
                    price.push([data[x][y].time, totalPriceArray[j]]);
                }
            }
            j++;
        }
    }

    if (show_price) {
        allDevices.push(price);
    }
    i = 0;

    for (x in data) {
        i++;
        var j = 0;
        var m;
        var device = [];
        for (y in data[x]) {
            var cons = data[x][y].consumption;

            j++;
            if (minVal > parseInt(cons)) {
                minVal = parseInt(cons);
            }
            if (maxVal < parseInt(cons)) {
                maxVal = parseInt(cons) + (parseInt(cons) * 10 / 100);
            }
            if (maxVal < 0) {
                maxVal = 1;
            }
            if (single) {
                device.push(cons);
                //axisTitle.push(data[x][y].time);
            }
            else {
                device.push([data[x][y].time, cons]);
            }
        }
        allDevices.push(device);
    }

    for (var q = 0; q < lvlChangePoint.length - 1; q++) {
        if (lvlChangePoint[q] != lvlChangePoint[q + 1]) {
            myArrayPoints.push({
                verticalLine:{
                    name:lvlChangePoint[q],
                    lineWidth:1,
                    shadow:false,
                    color:'red',
                    x:q
                }
            });
        }
    }

    if (true == show_price) {
        my_series = [
            {
                xaxis:'x2axis',
                yaxis:'y2axis',
                color:'orange',
                //renderer: (true == bar) ? $.jqplot.BarRenderer : undefined
                renderer:undefined
            },
            {
                color:'green',
                formatString:'$%.5f',
                renderer:(true == bar) ? $.jqplot.BarRenderer : undefined
            }
        ];
    } else {
        my_series = [
            {
                color:'green',
                formatString:'$%.5f',
                renderer:(true == bar) ? $.jqplot.BarRenderer : undefined
            }
        ];
    }

    plot2 = $.jqplot(container, allDevices, {

        animate:false,
        animateReplot:false,
        title:{
            text:jdata['graph_options']['title'],
            show:true
        },
        seriesDefaults:{
            renderer:$.jqplot.categoryAxisRenderer,
            pointLabels:{ show:false },
            yaxis:'yaxis',
            markerOptions:{
                show:true,
                style:'filledCircle',
                lineWidth:0.5,
                size:5,
                shadow:true,
                shadowAngle:45,
                shadowOffset:1,
                shadowDepth:3,
                shadowAlpha:0.07
            },
            breakOnNull:true
        },
        series:my_series,

        axesDefaults:{
            tickRenderer:$.jqplot.CanvasAxisTickRenderer,
            min:0
        },
        showTicks:false,
        axes:{
            xaxis:{
                renderer:$.jqplot.CategoryAxisRenderer,
                tickOptions:{
                    angle:-45
                },
                ticks: axisTitle// show only if not single
            },
            x2axis:{
                renderer:$.jqplot.CategoryAxisRenderer,
                tickOptions:{
                    show:false
                }
            },
            yaxis:{
                autoscale:true,
                min:0,
                max:maxVal
            },
            y2axis:{
                tickOptions:{
                    formatString:'$%.5f',
                    showGridline:false
                }
            }
        },
        canvasOverlay:{
            show:shed_levels, // level line
            objects:myArrayPoints
        },
        cursor:{
            show:true,
            zoom:true
        },
        legend:{
            renderer:$.jqplot.EnhancedLegendRenderer,
            show:true,
            labels:devicesName
        },
        highlighter:{
            show:true,
            showLabel:true,
            sizeAdjust:7.5,
            tooltipLocation:'ne'
        }
    });
    filterTimeInterval(timeFilterVal);

    if (true == shed_levels) {
        setTimeout('3000', getSize(lvlChangePoint, myArrayPoints));
    }
}

function getSize(lvlChangePoint, myArrayPoints) {
    var jqplot_yaxis;
    var jqplot_yaxis_w;
    var jqplot_title;
    var jqplot_title_h;
    var jqplot_event_canvas;
    var jqplot_event_canvas_w;
    var jqplot_section = 0;
    /**********************************************************/

    jqplot_yaxis = $('.jqplot-yaxis');
    jqplot_yaxis_w = jqplot_yaxis.outerWidth() + parseInt(jqplot_yaxis.css('marginRight'));
    jqplot_title = $('.jqplot-title');
    jqplot_title_h = jqplot_title.outerHeight() + parseInt(jqplot_title.css('marginBottom'));
    jqplot_event_canvas = $('.jqplot-event-canvas');
    jqplot_event_canvas_w = jqplot_event_canvas.outerWidth();
    jqplot_section = jqplot_event_canvas_w / lvlChangePoint.length;

    /**********************************************************/

    for (var w = 0; w < myArrayPoints.length; w++) {
        $('<span />', {
            'text':myArrayPoints[w]['verticalLine']['name'],
            'class':'chart-point'
        }).css({
                'marginLeft':myArrayPoints[w]['verticalLine']['x'] * jqplot_section - jqplot_section,
                'left':jqplot_yaxis_w,
                'top':jqplot_title_h + 10,
                'width':jqplot_section
            }).prependTo($('.chart-container'));
    }

    /**********************************************************/
}

function filterTimeInterval(timeFilterVal) {
    var timePoint = $('.jqplot-xaxis > canvas');
    timePoint.hide();
    timePoint.each(function (iterator) {
        if (iterator % timeFilterVal == 0) {
            $(this).show();
        }
    })
}
