/*
* BAR CHART
* ---------
*/


$.plot('#bar-chart', [bar_data], {
    grid  : {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
    },
    series: {
        bars: {
        show    : true,
        barWidth: 0.5,
        align   : 'center'
        }
    },
    xaxis : {
        mode      : 'categories',
        tickLength: 0
    }
})
/* END BAR CHART */
  