var chartGauge = c3.generate({
    bindto: '#gauge',
    data: {
        columns: [
            ['Ensalada César', 91.4]
        ],
        type: 'gauge',
        onclick: function(d, i) { console.log("onclick", d, i); },
        onmouseover: function(d, i) { console.log("onmouseover", d, i); },
        onmouseout: function(d, i) { console.log("onmouseout", d, i); }
    },
    gauge: {
        //        label: {
        //            format: function(value, ratio) {
        //                return value;
        //            },
        //            show: false // to turn off the min/max labels.
        //        },
        //    min: 0, // 0 is default, //can handle negative min e.g. vacuum / voltage / current flow / rate of change
        //    max: 100, // 100 is default
        //    units: ' %',
        //    width: 39 // for adjusting arc thickness
    },
    color: {
        pattern: ['#bdca54', '#744034', '#ffc107', '#60B044'], // the three color levels for the percentage values.
        threshold: {
            //            unit: 'value', // percentage is default
            //            max: 200, // 100 is default
            values: [30, 60, 90, 100]
        }
    },
    size: {
        height: 180
    }
});

setTimeout(function() {
    chartGauge.load({
        columns: [
            ['Pollo al limón', 10]
        ]
    });
}, 1000);

setTimeout(function() {
    chartGauge.load({
        columns: [
            ['Pato a la naranja', 50]
        ]
    });
}, 2000);

setTimeout(function() {
    chartGauge.load({
        columns: [
            ['Tortilla de patatas', 70]
        ]
    });
}, 3000);

setTimeout(function() {
    chartGauge.load({
        columns: [
            ['Arroz 3 delicias', 20]
        ]
    });
}, 4000);

setTimeout(function() {
    chartGauge.load({
        columns: [
            ['Ensalada', 100]
        ]
    });
}, 5000);