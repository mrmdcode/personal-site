(function () {
	"use strict";

	// Column with Rotated Labels
	am5.ready(function () {

		// Create root element
		// https://www.amcharts.com/docs/v5/getting-started/#Root_element
		var root = am5.Root.new("column_with_rotated_labels");

		// Set themes
		// https://www.amcharts.com/docs/v5/concepts/themes/
		root.setThemes([
			am5themes_Animated.new(root)
		]);

		// Create chart
		// https://www.amcharts.com/docs/v5/charts/xy-chart/
		var chart = root.container.children.push(am5xy.XYChart.new(root, {
			panX: true,
			panY: true,
			wheelX: "panX",
			wheelY: "zoomX",
			pinchZoomX: true,
			paddingLeft: 0,
			paddingRight: 1
		}));

		// Add cursor
		// https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
		var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
		cursor.lineY.set("visible", false);


		// Create axes
		// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
		var xRenderer = am5xy.AxisRendererX.new(root, {
			minGridDistance: 30,
			minorGridEnabled: true
		});

		xRenderer.labels.template.setAll({
			rotation: -90,
			centerY: am5.p50,
			centerX: am5.p100,
			paddingRight: 15
		});

		xRenderer.grid.template.setAll({
			location: 1
		})

		var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
			maxDeviation: 0.3,
			categoryField: "country",
			renderer: xRenderer,
			tooltip: am5.Tooltip.new(root, {})
		}));

		var yRenderer = am5xy.AxisRendererY.new(root, {
			strokeOpacity: 0.1
		})

		var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
			maxDeviation: 0.3,
			renderer: yRenderer
		}));

		// Create series
		// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
		var series = chart.series.push(am5xy.ColumnSeries.new(root, {
			name: "سری 1",
			xAxis: xAxis,
			yAxis: yAxis,
			valueYField: "value",
			sequencedInterpolation: true,
			categoryXField: "country",
			tooltip: am5.Tooltip.new(root, {
				labelText: "{valueY}"
			})
		}));

		series.columns.template.setAll({ cornerRadiusTL: 5, cornerRadiusTR: 5, strokeOpacity: 0 });
		series.columns.template.adapters.add("fill", function (fill, target) {
			return chart.get("colors").getIndex(series.columns.indexOf(target));
		});

		series.columns.template.adapters.add("stroke", function (stroke, target) {
			return chart.get("colors").getIndex(series.columns.indexOf(target));
		});


		// Set data
		var data = [{
			country: "آمریکا",
			value: 2025
		}, {
			country: "چین",
			value: 1882
		}, {
			country: "ژاپن",
			value: 1809
		}, {
			country: "آلمان",
			value: 1322
		}, {
			country: "انگلیس",
			value: 1122
		}, {
			country: "فرانسه",
			value: 1114
		}, {
			country: "هند",
			value: 984
		}, {
			country: "اسپانیا",
			value: 711
		}, {
			country: "هلند",
			value: 665
		}, {
			country: "کره جنوبی",
			value: 443
		}, {
			country: "کانادا",
			value: 441
		}];

		xAxis.data.setAll(data);
		series.data.setAll(data);


		// Make stuff animate on load
		// https://www.amcharts.com/docs/v5/concepts/animations/
		series.appear(1000);
		chart.appear(1000, 100);

	}); // end am5.ready()


	// Date axis with labels near minor grid lines
	am5.ready(function () {

		// Create root element
		// https://www.amcharts.com/docs/v5/getting-started/#Root_element
		var root = am5.Root.new("date_axis");

		const myTheme = am5.Theme.new(root);

		// Move minor label a bit down
		myTheme.rule("AxisLabel", ["minor"]).setAll({
			dy: 1
		});

		// Tweak minor grid opacity
		myTheme.rule("Grid", ["minor"]).setAll({
			strokeOpacity: 0.08
		});

		// Set themes
		// https://www.amcharts.com/docs/v5/concepts/themes/
		root.setThemes([
			am5themes_Animated.new(root),
			myTheme
		]);


		// Create chart
		// https://www.amcharts.com/docs/v5/charts/xy-chart/
		var chart = root.container.children.push(am5xy.XYChart.new(root, {
			panX: false,
			panY: false,
			wheelX: "panX",
			wheelY: "zoomX",
			paddingLeft: 0
		}));


		// Add cursor
		// https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
		var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {
			behavior: "zoomX"
		}));
		cursor.lineY.set("visible", false);

		var date = new Date();
		date.setHours(0, 0, 0, 0);
		var value = 100;

		function generateData() {
			value = Math.round((Math.random() * 10 - 5) + value);
			am5.time.add(date, "day", 1);
			return {
				date: date.getTime(),
				value: value
			};
		}

		function generateDatas(count) {
			var data = [];
			for (var i = 0; i < count; ++i) {
				data.push(generateData());
			}
			return data;
		}


		// Create axes
		// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
		var xAxis = chart.xAxes.push(am5xy.DateAxis.new(root, {
			maxDeviation: 0,
			baseInterval: {
				timeUnit: "day",
				count: 1
			},
			renderer: am5xy.AxisRendererX.new(root, {
				minorGridEnabled: true,
				minGridDistance: 200,
				minorLabelsEnabled: true
			}),
			tooltip: am5.Tooltip.new(root, {})
		}));

		xAxis.set("minorDateFormats", {
			day: "dd",
			month: "MM"
		});

		var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
			renderer: am5xy.AxisRendererY.new(root, {})
		}));


		// Add series
		// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
		var series = chart.series.push(am5xy.LineSeries.new(root, {
			name: "سری",
			xAxis: xAxis,
			yAxis: yAxis,
			valueYField: "value",
			valueXField: "date",
			tooltip: am5.Tooltip.new(root, {
				labelText: "{valueY}"
			})
		}));

		// Actual bullet
		series.bullets.push(function () {
			var bulletCircle = am5.Circle.new(root, {
				radius: 5,
				fill: series.get("fill")
			});
			return am5.Bullet.new(root, {
				sprite: bulletCircle
			})
		})

		// Add scrollbar
		// https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
		chart.set("scrollbarX", am5.Scrollbar.new(root, {
			orientation: "horizontal"
		}));

		var data = generateDatas(30);
		series.data.setAll(data);


		// Make stuff animate on load
		// https://www.amcharts.com/docs/v5/concepts/animations/
		series.appear(1000);
		chart.appear(1000, 100);

	}); // end am5.ready()


	// Pie Chart
	am5.ready(function () {

		// Create root element
		// https://www.amcharts.com/docs/v5/getting-started/#Root_element
		var root = am5.Root.new("pie_chart");

		// Set themes
		// https://www.amcharts.com/docs/v5/concepts/themes/
		root.setThemes([
			am5themes_Animated.new(root)
		]);

		// Create chart
		// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
		var chart = root.container.children.push(
			am5percent.PieChart.new(root, {
				endAngle: 270
			})
		);

		// Create series
		// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
		var series = chart.series.push(
			am5percent.PieSeries.new(root, {
				valueField: "value",
				categoryField: "category",
				endAngle: 270
			})
		);

		series.states.create("hidden", {
			endAngle: -90
		});

		// Set data
		// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
		series.data.setAll([{
			category: "لیتوانی",
			value: 501.9
		}, {
			category: "چک",
			value: 301.9
		}, {
			category: "ایرلند",
			value: 201.1
		}, {
			category: "آلمان",
			value: 165.8
		}, {
			category: "استرالیا",
			value: 139.9
		}, {
			category: "اتریش",
			value: 128.3
		}, {
			category: "انگلستان",
			value: 99
		}]);

		series.appear(1000, 100);

	}); // end am5.ready()


	// Bubble-Based Heat Map
	am5.ready(function () {

		// Create root element
		// https://www.amcharts.com/docs/v5/getting-started/#Root_element
		var root = am5.Root.new("bubble_based");

		// Set themes
		// https://www.amcharts.com/docs/v5/concepts/themes/
		root.setThemes([
			am5themes_Animated.new(root)
		]);

		// Create chart
		// https://www.amcharts.com/docs/v5/charts/xy-chart/
		var chart = root.container.children.push(
			am5xy.XYChart.new(root, {
				panX: false,
				panY: false,
				wheelX: "none",
				wheelY: "none",
				layout: root.verticalLayout
			})
		);

		// Create axes and their renderers
		var yRenderer = am5xy.AxisRendererY.new(root, {
			visible: false,
			minGridDistance: 20,
			inversed: true
		});

		yRenderer.grid.template.set("visible", false);

		var yAxis = chart.yAxes.push(
			am5xy.CategoryAxis.new(root, {
				maxDeviation: 0,
				renderer: yRenderer,
				categoryField: "weekday"
			})
		);

		var xRenderer = am5xy.AxisRendererX.new(root, {
			visible: false,
			minGridDistance: 30,
			opposite: true
		});

		xRenderer.grid.template.set("visible", false);

		var xAxis = chart.xAxes.push(
			am5xy.CategoryAxis.new(root, {
				renderer: xRenderer,
				categoryField: "hour"
			})
		);

		// Create series
		// https://www.amcharts.com/docs/v5/charts/xy-chart/#Adding_series
		var series = chart.series.push(
			am5xy.ColumnSeries.new(root, {
				calculateAggregates: true,
				stroke: am5.color(0xffffff),
				clustered: false,
				xAxis: xAxis,
				yAxis: yAxis,
				categoryXField: "hour",
				categoryYField: "weekday",
				valueField: "value"
			})
		);

		series.columns.template.setAll({
			forceHidden: true
		});

		var circleTemplate = am5.Template.new({ radius: 5 });

		// Add circle bullet
		// https://www.amcharts.com/docs/v5/charts/xy-chart/series/#Bullets
		series.bullets.push(function () {
			var graphics = am5.Circle.new(
				root, {
				stroke: series.get("stroke"),
				fill: series.get("fill")
			}, circleTemplate
			);
			return am5.Bullet.new(root, {
				sprite: graphics
			});
		});

		// Set up heat rules
		// https://www.amcharts.com/docs/v5/concepts/settings/heat-rules/
		series.set("heatRules", [{
			target: circleTemplate,
			min: 5,
			max: 35,
			dataField: "value",
			key: "radius"
		}]);

		// Set data
		// https://www.amcharts.com/docs/v5/charts/xy-chart/#Setting_data
		var data = [{
			hour: "12ظهر",
			weekday: "یکشنبه",
			value: 2990
		}, {
			hour: "1ظهر",
			weekday: "یکشنبه",
			value: 2520
		}, {
			hour: "2ظهر",
			weekday: "یکشنبه",
			value: 2334
		}, {
			hour: "3ظهر",
			weekday: "یکشنبه",
			value: 2230
		}, {
			hour: "4ظهر",
			weekday: "یکشنبه",
			value: 2325
		}, {
			hour: "5ظهر",
			weekday: "یکشنبه",
			value: 2019
		}, {
			hour: "6ظهر",
			weekday: "یکشنبه",
			value: 2128
		}, {
			hour: "7ظهر",
			weekday: "یکشنبه",
			value: 2246
		}, {
			hour: "8ظهر",
			weekday: "یکشنبه",
			value: 2421
		}, {
			hour: "9ظهر",
			weekday: "یکشنبه",
			value: 2788
		}, {
			hour: "10ظهر",
			weekday: "یکشنبه",
			value: 2959
		}, {
			hour: "11صبح",
			weekday: "یکشنبه",
			value: 3018
		}, {
			hour: "12صبح",
			weekday: "یکشنبه",
			value: 3154
		}, {
			hour: "1عصر",
			weekday: "یکشنبه",
			value: 3172
		}, {
			hour: "2عصر",
			weekday: "یکشنبه",
			value: 3368
		}, {
			hour: "3عصر",
			weekday: "یکشنبه",
			value: 3464
		}, {
			hour: "4عصر",
			weekday: "یکشنبه",
			value: 3746
		}, {
			hour: "5عصر",
			weekday: "یکشنبه",
			value: 3656
		}, {
			hour: "6عصر",
			weekday: "یکشنبه",
			value: 3336
		}, {
			hour: "7عصر",
			weekday: "یکشنبه",
			value: 3292
		}, {
			hour: "8عصر",
			weekday: "یکشنبه",
			value: 3269
		}, {
			hour: "9عصر",
			weekday: "یکشنبه",
			value: 3300
		}, {
			hour: "10عصر",
			weekday: "یکشنبه",
			value: 3403
		}, {
			hour: "11عصر",
			weekday: "یکشنبه",
			value: 3323
		}, {
			hour: "12عصر",
			weekday: "دوشنبه",
			value: 3346
		}, {
			hour: "1صبح",
			weekday: "دوشنبه",
			value: 2725
		}, {
			hour: "2صبح",
			weekday: "دوشنبه",
			value: 3052
		}, {
			hour: "3صبح",
			weekday: "دوشنبه",
			value: 3876
		}, {
			hour: "4صبح",
			weekday: "دوشنبه",
			value: 4453
		}, {
			hour: "5صبح",
			weekday: "دوشنبه",
			value: 3972
		}, {
			hour: "6صبح",
			weekday: "دوشنبه",
			value: 4644
		}, {
			hour: "7صبح",
			weekday: "دوشنبه",
			value: 5715
		}, {
			hour: "8صبح",
			weekday: "دوشنبه",
			value: 7080
		}, {
			hour: "9صبح",
			weekday: "دوشنبه",
			value: 8022
		}, {
			hour: "10صبح",
			weekday: "دوشنبه",
			value: 8446
		}, {
			hour: "11صبح",
			weekday: "دوشنبه",
			value: 9313
		}, {
			hour: "12صبح",
			weekday: "دوشنبه",
			value: 9011
		}, {
			hour: "1عصر",
			weekday: "دوشنبه",
			value: 8508
		}, {
			hour: "2عصر",
			weekday: "دوشنبه",
			value: 8515
		}, {
			hour: "3عصر",
			weekday: "دوشنبه",
			value: 8399
		}, {
			hour: "4عصر",
			weekday: "دوشنبه",
			value: 8649
		}, {
			hour: "5عصر",
			weekday: "دوشنبه",
			value: 7869
		}, {
			hour: "6عصر",
			weekday: "دوشنبه",
			value: 6933
		}, {
			hour: "7عصر",
			weekday: "دوشنبه",
			value: 5969
		}, {
			hour: "8عصر",
			weekday: "دوشنبه",
			value: 5552
		}, {
			hour: "9عصر",
			weekday: "دوشنبه",
			value: 5434
		}, {
			hour: "10عصر",
			weekday: "دوشنبه",
			value: 5070
		}, {
			hour: "11عصر",
			weekday: "دوشنبه",
			value: 4851
		}, {
			hour: "12عصر",
			weekday: "سه شنبه",
			value: 4468
		}, {
			hour: "1صبح",
			weekday: "سه شنبه",
			value: 3306
		}, {
			hour: "2صبح",
			weekday: "سه شنبه",
			value: 3906
		}, {
			hour: "3صبح",
			weekday: "سه شنبه",
			value: 4413
		}, {
			hour: "4صبح",
			weekday: "سه شنبه",
			value: 4726
		}, {
			hour: "5صبح",
			weekday: "سه شنبه",
			value: 4584
		}, {
			hour: "6صبح",
			weekday: "سه شنبه",
			value: 5717
		}, {
			hour: "7صبح",
			weekday: "سه شنبه",
			value: 6504
		}, {
			hour: "8صبح",
			weekday: "سه شنبه",
			value: 8104
		}, {
			hour: "9صبح",
			weekday: "سه شنبه",
			value: 8813
		}, {
			hour: "10صبح",
			weekday: "سه شنبه",
			value: 9278
		}, {
			hour: "11صبح",
			weekday: "سه شنبه",
			value: 10425
		}, {
			hour: "12صبح",
			weekday: "سه شنبه",
			value: 10137
		}, {
			hour: "1عصر",
			weekday: "سه شنبه",
			value: 9290
		}, {
			hour: "2عصر",
			weekday: "سه شنبه",
			value: 9255
		}, {
			hour: "3عصر",
			weekday: "سه شنبه",
			value: 9614
		}, {
			hour: "4عصر",
			weekday: "سه شنبه",
			value: 9713
		}, {
			hour: "5عصر",
			weekday: "سه شنبه",
			value: 9667
		}, {
			hour: "6عصر",
			weekday: "سه شنبه",
			value: 8774
		}, {
			hour: "7عصر",
			weekday: "سه شنبه",
			value: 8649
		}, {
			hour: "8عصر",
			weekday: "سه شنبه",
			value: 9937
		}, {
			hour: "9عصر",
			weekday: "سه شنبه",
			value: 10286
		}, {
			hour: "10عصر",
			weekday: "سه شنبه",
			value: 9175
		}, {
			hour: "11عصر",
			weekday: "سه شنبه",
			value: 8581
		}, {
			hour: "12عصر",
			weekday: "چهارشنبه",
			value: 8145
		}, {
			hour: "1صبح",
			weekday: "چهارشنبه",
			value: 7177
		}, {
			hour: "2صبح",
			weekday: "چهارشنبه",
			value: 5657
		}, {
			hour: "3صبح",
			weekday: "چهارشنبه",
			value: 6802
		}, {
			hour: "4صبح",
			weekday: "چهارشنبه",
			value: 8159
		}, {
			hour: "5صبح",
			weekday: "چهارشنبه",
			value: 8449
		}, {
			hour: "6صبح",
			weekday: "چهارشنبه",
			value: 9453
		}, {
			hour: "7صبح",
			weekday: "چهارشنبه",
			value: 9947
		}, {
			hour: "8صبح",
			weekday: "چهارشنبه",
			value: 11471
		}, {
			hour: "9صبح",
			weekday: "چهارشنبه",
			value: 12492
		}, {
			hour: "10صبح",
			weekday: "چهارشنبه",
			value: 9388
		}, {
			hour: "11صبح",
			weekday: "چهارشنبه",
			value: 9928
		}, {
			hour: "12صبح",
			weekday: "چهارشنبه",
			value: 9644
		}, {
			hour: "1عصر",
			weekday: "چهارشنبه",
			value: 9034
		}, {
			hour: "2عصر",
			weekday: "چهارشنبه",
			value: 8964
		}, {
			hour: "3عصر",
			weekday: "چهارشنبه",
			value: 9069
		}, {
			hour: "4عصر",
			weekday: "چهارشنبه",
			value: 8898
		}, {
			hour: "5عصر",
			weekday: "چهارشنبه",
			value: 8322
		}, {
			hour: "6عصر",
			weekday: "چهارشنبه",
			value: 6909
		}, {
			hour: "7عصر",
			weekday: "چهارشنبه",
			value: 5810
		}, {
			hour: "8عصر",
			weekday: "چهارشنبه",
			value: 5151
		}, {
			hour: "9عصر",
			weekday: "چهارشنبه",
			value: 4911
		}, {
			hour: "10عصر",
			weekday: "چهارشنبه",
			value: 4487
		}, {
			hour: "11عصر",
			weekday: "چهارشنبه",
			value: 4118
		}, {
			hour: "12عصر",
			weekday: "پنج شنبه",
			value: 3689
		}, {
			hour: "1صبح",
			weekday: "پنج شنبه",
			value: 3081
		}, {
			hour: "2صبح",
			weekday: "پنج شنبه",
			value: 6525
		}, {
			hour: "3صبح",
			weekday: "پنج شنبه",
			value: 6228
		}, {
			hour: "4صبح",
			weekday: "پنج شنبه",
			value: 6917
		}, {
			hour: "5صبح",
			weekday: "پنج شنبه",
			value: 6568
		}, {
			hour: "6صبح",
			weekday: "پنج شنبه",
			value: 6405
		}, {
			hour: "7صبح",
			weekday: "پنج شنبه",
			value: 8106
		}, {
			hour: "8صبح",
			weekday: "پنج شنبه",
			value: 8542
		}, {
			hour: "9صبح",
			weekday: "پنج شنبه",
			value: 8501
		}, {
			hour: "10صبح",
			weekday: "پنج شنبه",
			value: 8802
		}, {
			hour: "11صبح",
			weekday: "پنج شنبه",
			value: 9420
		}, {
			hour: "12صبح",
			weekday: "پنج شنبه",
			value: 8966
		}, {
			hour: "1عصر",
			weekday: "پنج شنبه",
			value: 8135
		}, {
			hour: "2عصر",
			weekday: "پنج شنبه",
			value: 8224
		}, {
			hour: "3عصر",
			weekday: "پنج شنبه",
			value: 8387
		}, {
			hour: "4عصر",
			weekday: "پنج شنبه",
			value: 8218
		}, {
			hour: "5عصر",
			weekday: "پنج شنبه",
			value: 7641
		}, {
			hour: "6عصر",
			weekday: "پنج شنبه",
			value: 6469
		}, {
			hour: "7عصر",
			weekday: "پنج شنبه",
			value: 5441
		}, {
			hour: "8عصر",
			weekday: "پنج شنبه",
			value: 4952
		}, {
			hour: "9عصر",
			weekday: "پنج شنبه",
			value: 4643
		}, {
			hour: "10عصر",
			weekday: "پنج شنبه",
			value: 4393
		}, {
			hour: "11عصر",
			weekday: "پنج شنبه",
			value: 4017
		}, {
			hour: "12عصر",
			weekday: "جمعه",
			value: 4022
		}, {
			hour: "1صبح",
			weekday: "جمعه",
			value: 3063
		}, {
			hour: "2صبح",
			weekday: "جمعه",
			value: 3638
		}, {
			hour: "3صبح",
			weekday: "جمعه",
			value: 3968
		}, {
			hour: "4صبح",
			weekday: "جمعه",
			value: 4070
		}, {
			hour: "5صبح",
			weekday: "جمعه",
			value: 4019
		}, {
			hour: "6صبح",
			weekday: "جمعه",
			value: 4548
		}, {
			hour: "7صبح",
			weekday: "جمعه",
			value: 5465
		}, {
			hour: "8صبح",
			weekday: "جمعه",
			value: 6909
		}, {
			hour: "9صبح",
			weekday: "جمعه",
			value: 7706
		}, {
			hour: "10صبح",
			weekday: "جمعه",
			value: 7867
		}, {
			hour: "11صبح",
			weekday: "جمعه",
			value: 8615
		}, {
			hour: "12صبح",
			weekday: "جمعه",
			value: 8218
		}, {
			hour: "1عصر",
			weekday: "جمعه",
			value: 7604
		}, {
			hour: "2عصر",
			weekday: "جمعه",
			value: 7429
		}, {
			hour: "3عصر",
			weekday: "جمعه",
			value: 7488
		}, {
			hour: "4عصر",
			weekday: "جمعه",
			value: 7493
		}, {
			hour: "5عصر",
			weekday: "جمعه",
			value: 6998
		}, {
			hour: "6عصر",
			weekday: "جمعه",
			value: 5941
		}, {
			hour: "7عصر",
			weekday: "جمعه",
			value: 5068
		}, {
			hour: "8عصر",
			weekday: "جمعه",
			value: 4636
		}, {
			hour: "9عصر",
			weekday: "جمعه",
			value: 4241
		}, {
			hour: "10عصر",
			weekday: "جمعه",
			value: 3858
		}, {
			hour: "11عصر",
			weekday: "جمعه",
			value: 3833
		}, {
			hour: "12عصر",
			weekday: "شنبه",
			value: 3503
		}, {
			hour: "1صبح",
			weekday: "شنبه",
			value: 2842
		}, {
			hour: "2صبح",
			weekday: "شنبه",
			value: 2808
		}, {
			hour: "3صبح",
			weekday: "شنبه",
			value: 2399
		}, {
			hour: "4صبح",
			weekday: "شنبه",
			value: 2280
		}, {
			hour: "5صبح",
			weekday: "شنبه",
			value: 2139
		}, {
			hour: "6صبح",
			weekday: "شنبه",
			value: 2527
		}, {
			hour: "7صبح",
			weekday: "شنبه",
			value: 2940
		}, {
			hour: "8صبح",
			weekday: "شنبه",
			value: 3066
		}, {
			hour: "9صبح",
			weekday: "شنبه",
			value: 3494
		}, {
			hour: "10صبح",
			weekday: "شنبه",
			value: 3287
		}, {
			hour: "11صبح",
			weekday: "شنبه",
			value: 3416
		}, {
			hour: "12صبح",
			weekday: "شنبه",
			value: 3432
		}, {
			hour: "1عصر",
			weekday: "شنبه",
			value: 3523
		}, {
			hour: "2عصر",
			weekday: "شنبه",
			value: 3542
		}, {
			hour: "3عصر",
			weekday: "شنبه",
			value: 3347
		}, {
			hour: "4عصر",
			weekday: "شنبه",
			value: 3292
		}, {
			hour: "5عصر",
			weekday: "شنبه",
			value: 3416
		}, {
			hour: "6عصر",
			weekday: "شنبه",
			value: 3131
		}, {
			hour: "7عصر",
			weekday: "شنبه",
			value: 3057
		}, {
			hour: "8عصر",
			weekday: "شنبه",
			value: 3227
		}, {
			hour: "9عصر",
			weekday: "شنبه",
			value: 3060
		}, {
			hour: "10عصر",
			weekday: "شنبه",
			value: 2855
		}, {
			hour: "11عصر",
			weekday: "شنبه",
			value: 2625
		}];

		series.data.setAll(data);

		yAxis.data.setAll([
			{ weekday: "یکشنبه" },
			{ weekday: "دوشنبه" },
			{ weekday: "سه شنبه" },
			{ weekday: "چهارشنبه" },
			{ weekday: "پنج شنبه" },
			{ weekday: "جمعه" },
			{ weekday: "شنبه" }
		]);

		xAxis.data.setAll([
			{ hour: "12عصر" },
			{ hour: "1صبح" },
			{ hour: "2صبح" },
			{ hour: "3صبح" },
			{ hour: "4صبح" },
			{ hour: "5صبح" },
			{ hour: "6صبح" },
			{ hour: "7صبح" },
			{ hour: "8صبح" },
			{ hour: "9صبح" },
			{ hour: "10صبح" },
			{ hour: "11صبح" },
			{ hour: "12صبح" },
			{ hour: "1عصر" },
			{ hour: "2عصر" },
			{ hour: "3عصر" },
			{ hour: "4عصر" },
			{ hour: "5عصر" },
			{ hour: "6عصر" },
			{ hour: "7عصر" },
			{ hour: "8عصر" },
			{ hour: "9عصر" },
			{ hour: "10عصر" },
			{ hour: "11عصر" }
		]);

		// Make stuff animate on load
		// https://www.amcharts.com/docs/v5/concepts/animations/#Initial_animation
		chart.appear(1000, 100);

		setInterval(function () {
			var i = 0;
			series.data.each(function (d) {
				var n = {
					value: d.value + d.value * Math.random() * 0.5,
					hour: d.hour,
					weekday: d.weekday
				};
				series.data.setIndex(i, n);
				i++;
			});
		}, 1000);

	}); // end am5.ready()


	// Candlestick Chart
	am5.ready(function () {

		// Create root element
		// https://www.amcharts.com/docs/v5/getting-started/#Root_element
		var root = am5.Root.new("candlestick_chart");

		const myTheme = am5.Theme.new(root);

		myTheme.rule("Grid", ["scrollbar", "minor"]).setAll({
			visible: false
		});

		root.setThemes([
			am5themes_Animated.new(root),
			myTheme
		]);

		function generateChartData() {
			var chartData = [];
			var firstDate = new Date();
			firstDate.setDate(firstDate.getDate() - 2000);
			firstDate.setHours(0, 0, 0, 0);
			var value = 1200;
			for (var i = 0; i < 2000; i++) {
				var newDate = new Date(firstDate);
				newDate.setDate(newDate.getDate() + i);

				value += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
				var open = value + Math.round(Math.random() * 16 - 8);
				var low = Math.min(value, open) - Math.round(Math.random() * 5);
				var high = Math.max(value, open) + Math.round(Math.random() * 5);

				chartData.push({
					date: newDate.getTime(),
					value: value,
					open: open,
					low: low,
					high: high
				});
			}
			return chartData;
		}

		var data = generateChartData();

		// Create chart
		// https://www.amcharts.com/docs/v5/charts/xy-chart/
		var chart = root.container.children.push(
			am5xy.XYChart.new(root, {
				focusable: true,
				panX: true,
				panY: true,
				wheelX: "panX",
				wheelY: "zoomX",
				paddingLeft: 0
			})
		);

		// Create axes
		// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
		var xAxis = chart.xAxes.push(
			am5xy.DateAxis.new(root, {
				groupData: true,
				maxDeviation: 0.5,
				baseInterval: { timeUnit: "day", count: 1 },
				renderer: am5xy.AxisRendererX.new(root, {
					pan: "zoom",
					minorGridEnabled: true
				}),
				tooltip: am5.Tooltip.new(root, {})
			})
		);

		var yAxis = chart.yAxes.push(
			am5xy.ValueAxis.new(root, {
				maxDeviation: 1,
				renderer: am5xy.AxisRendererY.new(root, {
					pan: "zoom"
				})
			})
		);

		var color = root.interfaceColors.get("background");

		// Add series
		// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
		var series = chart.series.push(
			am5xy.CandlestickSeries.new(root, {
				fill: color,
				calculateAggregates: true,
				stroke: color,
				name: "MDXI",
				xAxis: xAxis,
				yAxis: yAxis,
				valueYField: "value",
				openValueYField: "open",
				lowValueYField: "low",
				highValueYField: "high",
				valueXField: "date",
				lowValueYGrouped: "low",
				highValueYGrouped: "high",
				openValueYGrouped: "open",
				valueYGrouped: "close",
				legendValueText:
					"باز: {openValueY} کم: {lowValueY} زیاد: {highValueY} بسته: {valueY}",
				legendRangeValueText: "{valueYClose}",
				tooltip: am5.Tooltip.new(root, {
					pointerOrientation: "horizontal",
					labelText: "باز: {openValueY}\nکم: {lowValueY}\nزیاد: {highValueY}\nبسته: {valueY}"
				})
			})
		);

		// Add cursor
		// https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
		var cursor = chart.set(
			"cursor",
			am5xy.XYCursor.new(root, {
				xAxis: xAxis
			})
		);
		cursor.lineY.set("visible", false);

		// Stack axes vertically
		// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/#Stacked_axes
		chart.leftAxesContainer.set("layout", root.verticalLayout);

		// Add scrollbar
		// https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
		var scrollbar = am5xy.XYChartScrollbar.new(root, {
			orientation: "horizontal",
			height: 50
		});
		chart.set("scrollbarX", scrollbar);

		var sbxAxis = scrollbar.chart.xAxes.push(
			am5xy.DateAxis.new(root, {
				groupData: true,
				groupIntervals: [{
					timeUnit: "week",
					count: 1
				}],
				baseInterval: { timeUnit: "day", count: 1 },
				renderer: am5xy.AxisRendererX.new(root, {
					minorGridEnabled: true,
					strokeOpacity: 0
				})
			})
		);

		var sbyAxis = scrollbar.chart.yAxes.push(
			am5xy.ValueAxis.new(root, {
				renderer: am5xy.AxisRendererY.new(root, {})
			})
		);

		var sbseries = scrollbar.chart.series.push(
			am5xy.LineSeries.new(root, {
				xAxis: sbxAxis,
				yAxis: sbyAxis,
				valueYField: "value",
				valueXField: "date"
			})
		);

		// Add legend
		// https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
		var legend = yAxis.axisHeader.children.push(am5.Legend.new(root, {}));

		legend.data.push(series);

		legend.markers.template.setAll({
			width: 10
		});

		legend.markerRectangles.template.setAll({
			cornerRadiusTR: 0,
			cornerRadiusBR: 0,
			cornerRadiusTL: 0,
			cornerRadiusBL: 0
		});

		// set data
		series.data.setAll(data);
		sbseries.data.setAll(data);

		// Make stuff animate on load
		// https://www.amcharts.com/docs/v5/concepts/animations/
		series.appear(1000);
		chart.appear(1000, 100);

	}); // end am5.ready()


	// Gauge with Bands
	am5.ready(function () {

		// Create root element
		// https://www.amcharts.com/docs/v5/getting-started/#Root_element
		var root = am5.Root.new("gauge_with_bands");


		// Set themes
		// https://www.amcharts.com/docs/v5/concepts/themes/
		root.setThemes([
			am5themes_Animated.new(root)
		]);


		// Create chart
		// https://www.amcharts.com/docs/v5/charts/radar-chart/
		var chart = root.container.children.push(am5radar.RadarChart.new(root, {
			panX: false,
			panY: false,
			startAngle: 160,
			endAngle: 380
		}));


		// Create axis and its renderer
		// https://www.amcharts.com/docs/v5/charts/radar-chart/gauge-charts/#Axes
		var axisRenderer = am5radar.AxisRendererCircular.new(root, {
			innerRadius: -40
		});

		axisRenderer.grid.template.setAll({
			stroke: root.interfaceColors.get("background"),
			visible: true,
			strokeOpacity: 0.8
		});

		var xAxis = chart.xAxes.push(am5xy.ValueAxis.new(root, {
			maxDeviation: 0,
			min: -40,
			max: 100,
			strictMinMax: true,
			renderer: axisRenderer
		}));


		// Add clock hand
		// https://www.amcharts.com/docs/v5/charts/radar-chart/gauge-charts/#Clock_hands
		var axisDataItem = xAxis.makeDataItem({});

		var clockHand = am5radar.ClockHand.new(root, {
			pinRadius: am5.percent(20),
			radius: am5.percent(100),
			bottomWidth: 40
		})

		var bullet = axisDataItem.set("bullet", am5xy.AxisBullet.new(root, {
			sprite: clockHand
		}));

		xAxis.createAxisRange(axisDataItem);

		var label = chart.radarContainer.children.push(am5.Label.new(root, {
			fill: am5.color(0xffffff),
			centerX: am5.percent(50),
			textAlign: "center",
			centerY: am5.percent(50),
			fontSize: "3em"
		}));

		axisDataItem.set("value", 50);
		bullet.get("sprite").on("rotation", function () {
			var value = axisDataItem.get("value");
			var text = Math.round(axisDataItem.get("value")).toString();
			var fill = am5.color(0x000000);
			xAxis.axisRanges.each(function (axisRange) {
				if (value >= axisRange.get("value") && value <= axisRange.get("endValue")) {
					fill = axisRange.get("axisFill").get("fill");
				}
			})

			label.set("text", Math.round(value).toString());

			clockHand.pin.animate({ key: "fill", to: fill, duration: 500, easing: am5.ease.out(am5.ease.cubic) })
			clockHand.hand.animate({ key: "fill", to: fill, duration: 500, easing: am5.ease.out(am5.ease.cubic) })
		});

		setInterval(function () {
			axisDataItem.animate({
				key: "value",
				to: Math.round(Math.random() * 140 - 40),
				duration: 500,
				easing: am5.ease.out(am5.ease.cubic)
			});
		}, 2000)

		chart.bulletsContainer.set("mask", undefined);


		// Create axis ranges bands
		// https://www.amcharts.com/docs/v5/charts/radar-chart/gauge-charts/#Bands
		var bandsData = [{
			title: "Unsustainable",
			color: "#ee1f25",
			lowScore: -40,
			highScore: -20
		}, {
			title: "Volatile",
			color: "#f04922",
			lowScore: -20,
			highScore: 0
		}, {
			title: "Foundational",
			color: "#fdae19",
			lowScore: 0,
			highScore: 20
		}, {
			title: "Developing",
			color: "#f3eb0c",
			lowScore: 20,
			highScore: 40
		}, {
			title: "Maturing",
			color: "#b0d136",
			lowScore: 40,
			highScore: 60
		}, {
			title: "Sustainable",
			color: "#54b947",
			lowScore: 60,
			highScore: 80
		}, {
			title: "High Performing",
			color: "#0f9747",
			lowScore: 80,
			highScore: 100
		}];

		am5.array.each(bandsData, function (data) {
			var axisRange = xAxis.createAxisRange(xAxis.makeDataItem({}));

			axisRange.setAll({
				value: data.lowScore,
				endValue: data.highScore
			});

			axisRange.get("axisFill").setAll({
				visible: true,
				fill: am5.color(data.color),
				fillOpacity: 0.8
			});

			axisRange.get("label").setAll({
				text: data.title,
				inside: true,
				radius: 15,
				fontSize: "0.9em",
				fill: root.interfaceColors.get("background")
			});
		});


		// Make stuff animate on load
		chart.appear(1000, 100);

	}); // end am5.ready()


	// Radar Chart Visualizing Yearly Activities
	am5.ready(function () {

		// Create root element
		// https://www.amcharts.com/docs/v5/getting-started/#Root_element
		var root = am5.Root.new("radar_chart_visualizing");

		// Create custom theme
		// https://www.amcharts.com/docs/v5/concepts/themes/#Quick_custom_theme
		const myTheme = am5.Theme.new(root);
		myTheme.rule("Label").set("fontSize", 10);
		myTheme.rule("Grid").set("strokeOpacity", 0.06);

		// Set themes
		// https://www.amcharts.com/docs/v5/concepts/themes/
		root.setThemes([am5themes_Animated.new(root), myTheme]);

		// tell that valueX should be formatted as a date (show week number)
		root.dateFormatter.setAll({
			dateFormat: "w",
			dateFields: ["valueX"]
		});

		root.locale.firstDayOfWeek = 0;

		// data
		var data = [
			{
				"Activity Date": "2019-04-07",
				"Activity Name": "ناهار",
				"Activity Type": "سواری",
				"Distance": 16901.30078125,
				"Moving Time": 4731
			},
			{
				"Activity Date": "2019-04-08",
				"Activity Name": "سواری بعد از ظهر",
				"Activity Type": "سواری",
				"Distance": 10051.400390625,
				"Moving Time": 2123
			},
			{
				"Activity Date": "2019-04-25",
				"Activity Name": "سواری بعد از ظهر",
				"Activity Type": "سواری",
				"Distance": 31012,
				"Moving Time": 7902
			},
			{
				"Activity Date": "2019-04-30",
				"Activity Name": "سواری صبحگاهی",
				"Activity Type": "سواری",
				"Distance": 8279,
				"Moving Time": 2401
			},
			{
				"Activity Date": "2019-05-01",
				"Activity Name": "سواری صبحگاهی",
				"Activity Type": "سواری",
				"Distance": 65781,
				"Moving Time": 11690
			},
			{
				"Activity Date": "2019-05-09",
				"Activity Name": "سواری عصرانه",
				"Activity Type": "سواری",
				"Distance": 18331.599609375,
				"Moving Time": 4706
			},
			{
				"Activity Date": "2019-05-05",
				"Activity Name": "ظهر سواری",
				"Activity Type": "سواری",
				"Distance": 23213,
				"Moving Time": 9471
			},
			{
				"Activity Date": "2019-05-10",
				"Activity Name": "سواری صبحگاهی",
				"Activity Type": "سواری",
				"Distance": 55106,
				"Moving Time": 12755
			},
			{
				"Activity Date": "2019-05-11",
				"Activity Name": "سواری صبحگاهی",
				"Activity Type": "سواری",
				"Distance": 67423,
				"Moving Time": 15667
			},
			{
				"Activity Date": "2019-05-12",
				"Activity Name": "سواری صبحگاهی",
				"Activity Type": "سواری",
				"Distance": 31127,
				"Moving Time": 6157
			},
			{
				"Activity Date": "2019-05-12",
				"Activity Name": "ظهر سواری",
				"Activity Type": "سواری",
				"Distance": 16067,
				"Moving Time": 4087
			},
			{
				"Activity Date": "2019-05-14",
				"Activity Name": "سواری بعد از ظهر",
				"Activity Type": "سواری",
				"Distance": 38208,
				"Moving Time": 8931
			},
			{
				"Activity Date": "2019-05-15",
				"Activity Name": "سواری صبحگاهی",
				"Activity Type": "سواری",
				"Distance": 115606,
				"Moving Time": 26471
			},
			{
				"Activity Date": "2019-05-16",
				"Activity Name": "Palma de Mallorca day 3",
				"Activity Type": "سواری",
				"Distance": 110470,
				"Moving Time": 22967
			},
			{
				"Activity Date": "2019-05-17",
				"Activity Name": "Sa Colabra epic ride",
				"Activity Type": "سواری",
				"Distance": 67143,
				"Moving Time": 18009
			},
			{
				"Activity Date": "2019-05-18",
				"Activity Name": "Mallorka last day",
				"Activity Type": "سواری",
				"Distance": 87590,
				"Moving Time": 18553
			},
			{
				"Activity Date": "2019-05-24",
				"Activity Name": "سواری عصرانه",
				"Activity Type": "سواری",
				"Distance": 21088,
				"Moving Time": 2555
			},
			{
				"Activity Date": "2019-05-25",
				"Activity Name": "سواری صبحگاهی",
				"Activity Type": "سواری",
				"Distance": 53361,
				"Moving Time": 8473
			},
			{
				"Activity Date": "2019-05-26",
				"Activity Name": "ظهر سواری",
				"Activity Type": "سواری",
				"Distance": 13463.7001953125,
				"Moving Time": 3768
			},
			{
				"Activity Date": "2019-05-26",
				"Activity Name": "سواری بعد از ظهر",
				"Activity Type": "سواری",
				"Distance": 14177.2001953125,
				"Moving Time": 3642
			},
			{
				"Activity Date": "2019-06-01",
				"Activity Name": "3.5 karto JuodkrantÄ— - KlaipÄ—da",
				"Activity Type": "سواری",
				"Distance": 75997,
				"Moving Time": 14452
			},
			{
				"Activity Date": "2019-06-27",
				"Activity Name": "سواری بعد از ظهر",
				"Activity Type": "سواری",
				"Distance": 44062,
				"Moving Time": 6016
			},
			{
				"Activity Date": "2019-06-30",
				"Activity Name": "سواری صبحگاهی",
				"Activity Type": "سواری",
				"Distance": 8756,
				"Moving Time": 3242
			},
			{
				"Activity Date": "2019-07-01",
				"Activity Name": "ظهر سواری",
				"Activity Type": "سواری",
				"Distance": 27867,
				"Moving Time": 6479
			},
			{
				"Activity Date": "2019-07-02",
				"Activity Name": "ظهر سواری",
				"Activity Type": "سواری",
				"Distance": 21775,
				"Moving Time": 5256
			},
			{
				"Activity Date": "2019-07-02",
				"Activity Name": "سواری بعد از ظهر",
				"Activity Type": "سواری",
				"Distance": 7343,
				"Moving Time": 2064
			},
			{
				"Activity Date": "2019-07-03",
				"Activity Name": "ظهر سواری",
				"Activity Type": "سواری",
				"Distance": 26956,
				"Moving Time": 6879
			},
			{
				"Activity Date": "2019-07-04",
				"Activity Name": "سواری بعد از ظهر",
				"Activity Type": "سواری",
				"Distance": 14175,
				"Moving Time": 3617
			},
			{
				"Activity Date": "2019-07-07",
				"Activity Name": "ظهر سواری",
				"Activity Type": "سواری",
				"Distance": 45489,
				"Moving Time": 11656
			},
			{
				"Activity Date": "2019-07-09",
				"Activity Name": "سواری بعد از ظهر",
				"Activity Type": "سواری",
				"Distance": 10049,
				"Moving Time": 1767
			},
			{
				"Activity Date": "2019-07-10",
				"Activity Name": "سواری بعد از ظهر",
				"Activity Type": "سواری",
				"Distance": 10000,
				"Moving Time": 1805
			},
			{
				"Activity Date": "2019-07-13",
				"Activity Name": "سواری عصرانه",
				"Activity Type": "سواری",
				"Distance": 11603,
				"Moving Time": 3127
			},
			{
				"Activity Date": "2019-07-14",
				"Activity Name": "سواری بعد از ظهر",
				"Activity Type": "سواری",
				"Distance": 8701,
				"Moving Time": 2369
			},
			{
				"Activity Date": "2019-07-15",
				"Activity Name": "سواری عصرانه",
				"Activity Type": "سواری",
				"Distance": 13021,
				"Moving Time": 2728
			},
			{
				"Activity Date": "2019-07-16",
				"Activity Name": "سواری عصرانه",
				"Activity Type": "سواری",
				"Distance": 10094,
				"Moving Time": 1823
			},
			{
				"Activity Date": "2019-07-17",
				"Activity Name": "سواری عصرانه",
				"Activity Type": "سواری",
				"Distance": 10075,
				"Moving Time": 1783
			},
			{
				"Activity Date": "2019-07-18",
				"Activity Name": "سواری عصرانه",
				"Activity Type": "سواری",
				"Distance": 10170,
				"Moving Time": 2006
			},
			{
				"Activity Date": "2019-07-19",
				"Activity Name": "سواری بعد از ظهر",
				"Activity Type": "سواری",
				"Distance": 13796,
				"Moving Time": 2487
			},
			{
				"Activity Date": "2019-07-21",
				"Activity Name": "سواری بعد از ظهر",
				"Activity Type": "سواری",
				"Distance": 9837,
				"Moving Time": 1761
			},
			{
				"Activity Date": "2019-07-23",
				"Activity Name": "سواری بعد از ظهر",
				"Activity Type": "سواری",
				"Distance": 20292,
				"Moving Time": 4581
			},
			{
				"Activity Date": "2019-07-24",
				"Activity Name": "ظهر سواری",
				"Activity Type": "سواری",
				"Distance": 43681,
				"Moving Time": 12542
			},
			{
				"Activity Date": "2019-07-27",
				"Activity Name": "سواری صبحگاهی",
				"Activity Type": "سواری",
				"Distance": 21879,
				"Moving Time": 3556
			},
			{
				"Activity Date": "2019-07-26",
				"Activity Name": "سواری بعد از ظهر",
				"Activity Type": "سواری",
				"Distance": 42881,
				"Moving Time": 7302
			},
			{
				"Activity Date": "2019-08-13",
				"Activity Name": "سواری عصرانه",
				"Activity Type": "سواری",
				"Distance": 11756.5,
				"Moving Time": 2433
			},
			{
				"Activity Date": "2019-08-26",
				"Activity Name": "سواری صبحگاهی",
				"Activity Type": "سواری",
				"Distance": 5596,
				"Moving Time": 1505
			},
			{
				"Activity Date": "2019-07-25",
				"Activity Name": "سواری بعد از ظهر",
				"Activity Type": "سواری",
				"Distance": 10639.2001953125,
				"Moving Time": 2615
			},
			{
				"Activity Date": "2019-07-26",
				"Activity Name": "سواری بعد از ظهر",
				"Activity Type": "سواری",
				"Distance": 41150.6015625,
				"Moving Time": 6795
			},
			{
				"Activity Date": "2019-07-27",
				"Activity Name": "سواری صبحگاهی",
				"Activity Type": "سواری",
				"Distance": 43459.80078125,
				"Moving Time": 6986
			},
			{
				"Activity Date": "2019-08-26",
				"Activity Name": "Norvegija su Jurgiu!",
				"Activity Type": "سواری",
				"Distance": 83720,
				"Moving Time": 21811
			},
			{
				"Activity Date": "2019-08-27",
				"Activity Name": "Norvegija su Jurgiu! Day 2",
				"Activity Type": "سواری",
				"Distance": 27739.400390625,
				"Moving Time": 8280
			},
			{
				"Activity Date": "2019-08-28",
				"Activity Name": "Norvegija su Jurgiu! day 3",
				"Activity Type": "سواری",
				"Distance": 25866.599609375,
				"Moving Time": 6333
			},
			{
				"Activity Date": "2019-09-11",
				"Activity Name": "سواری بعد از ظهر",
				"Activity Type": "سواری",
				"Distance": 4512.2998046875,
				"Moving Time": 1250
			},
			{
				"Activity Date": "2019-09-12",
				"Activity Name": "سواری بعد از ظهر",
				"Activity Type": "سواری",
				"Distance": 8641.400390625,
				"Moving Time": 3404
			},
			{
				"Activity Date": "2019-09-15",
				"Activity Name": "Nuo Pisos iki Florencijos",
				"Activity Type": "سواری",
				"Distance": 103813.6015625,
				"Moving Time": 23376
			},
			{
				"Activity Date": "2019-09-16",
				"Activity Name": "Toskana, antra diena",
				"Activity Type": "سواری",
				"Distance": 55542.6015625,
				"Moving Time": 15264
			},
			{
				"Activity Date": "2019-09-17",
				"Activity Name": "Toskana, 3 diena",
				"Activity Type": "سواری",
				"Distance": 70001.3984375,
				"Moving Time": 15377
			},
			{
				"Activity Date": "2019-09-18",
				"Activity Name": "Toskana, 4 diena",
				"Activity Type": "سواری",
				"Distance": 82216.703125,
				"Moving Time": 18648
			},
			{
				"Activity Date": "2019-09-19",
				"Activity Name": "Toskana, 5 diena",
				"Activity Type": "سواری",
				"Distance": 82086.203125,
				"Moving Time": 20213
			},
			{
				"Activity Date": "2019-09-20",
				"Activity Name": "Toskana, 6 diena, vaÅ¾iuojam namo.",
				"Activity Type": "سواری",
				"Distance": 61489.8984375,
				"Moving Time": 11320
			},
			{
				"Activity Date": "2019-09-27",
				"Activity Name": "سواری صبحگاهی",
				"Activity Type": "سواری",
				"Distance": 4236.2001953125,
				"Moving Time": 1030
			},
			{
				"Activity Date": "2019-09-27",
				"Activity Name": "سواری بعد از ظهر",
				"Activity Type": "سواری",
				"Distance": 4303.60009765625,
				"Moving Time": 1142
			},
			{
				"Activity Date": "2019-10-13",
				"Activity Name": "ظهر سواری",
				"Activity Type": "سواری",
				"Distance": 14578,
				"Moving Time": 3591
			},
			{
				"Activity Date": "2019-10-01",
				"Activity Name": "سواری صبحگاهی",
				"Activity Type": "سواری",
				"Distance": 7996.2998046875,
				"Moving Time": 2219
			},
			{
				"Activity Date": "2019-10-02",
				"Activity Name": "سواری صبحگاهی",
				"Activity Type": "سواری",
				"Distance": 4265.2998046875,
				"Moving Time": 1131
			},
			{
				"Activity Date": "2019-10-02",
				"Activity Name": "سواری بعد از ظهر",
				"Activity Type": "سواری",
				"Distance": 4353.10009765625,
				"Moving Time": 1219
			},
			{
				"Activity Date": "2019-10-03",
				"Activity Name": "سواری صبحگاهی",
				"Activity Type": "سواری",
				"Distance": 17238.80078125,
				"Moving Time": 4641
			},
			{
				"Activity Date": "2019-10-04",
				"Activity Name": "سواری صبحگاهی",
				"Activity Type": "سواری",
				"Distance": 4259.7998046875,
				"Moving Time": 1054
			},
			{
				"Activity Date": "2019-10-16",
				"Activity Name": "سواری صبحگاهی",
				"Activity Type": "سواری",
				"Distance": 14651.5,
				"Moving Time": 3184
			},
			{
				"Activity Date": "2019-10-18",
				"Activity Name": "سواری صبحگاهی",
				"Activity Type": "سواری",
				"Distance": 4194,
				"Moving Time": 1029
			},
			{
				"Activity Date": "2019-10-22",
				"Activity Name": "سواری صبحگاهی",
				"Activity Type": "سواری",
				"Distance": 4102.7998046875,
				"Moving Time": 1063
			},
			{
				"Activity Date": "2019-11-04",
				"Activity Name": "سواری صبحگاهی",
				"Activity Type": "سواری",
				"Distance": 8456.2998046875,
				"Moving Time": 2157
			},
			{
				"Activity Date": "2019-11-05",
				"Activity Name": "سواری صبحگاهی",
				"Activity Type": "سواری",
				"Distance": 8816.400390625,
				"Moving Time": 2353
			},
			{
				"Activity Date": "2019-11-06",
				"Activity Name": "سواری صبحگاهی",
				"Activity Type": "سواری",
				"Distance": 8090.7001953125,
				"Moving Time": 1911
			},
			{
				"Activity Date": "2019-11-07",
				"Activity Name": "سواری صبحگاهی",
				"Activity Type": "سواری",
				"Distance": 1382.699951171875,
				"Moving Time": 336
			},
			{
				"Activity Date": "2019-11-08",
				"Activity Name": "سواری بعد از ظهر",
				"Activity Type": "سواری",
				"Distance": 4856.2001953125,
				"Moving Time": 1351
			},
			{
				"Activity Date": "2019-11-12",
				"Activity Name": "سواری بعد از ظهر",
				"Activity Type": "سواری",
				"Distance": 5141.10009765625,
				"Moving Time": 1526
			},
			{
				"Activity Date": "2019-11-13",
				"Activity Name": "سواری بعد از ظهر",
				"Activity Type": "سواری",
				"Distance": 4582.60009765625,
				"Moving Time": 1237
			},
			{
				"Activity Date": "2019-11-14",
				"Activity Name": "سواری صبحگاهی",
				"Activity Type": "سواری",
				"Distance": 15022,
				"Moving Time": 3742
			},
			{
				"Activity Date": "2019-09-16",
				"Activity Name": "سواری صبحگاهی",
				"Activity Type": "سواری",
				"Distance": 57270.3984375,
				"Moving Time": 14393
			},
			{
				"Activity Date": "2019-09-20",
				"Activity Name": "سواری صبحگاهی",
				"Activity Type": "سواری",
				"Distance": 66988.1015625,
				"Moving Time": 12096
			},
			{
				"Activity Date": "2019-09-15",
				"Activity Name": "سواری صبحگاهی",
				"Activity Type": "سواری",
				"Distance": 103671.1015625,
				"Moving Time": 22042
			},
			{
				"Activity Date": "2019-09-19",
				"Activity Name": "سواری صبحگاهی",
				"Activity Type": "سواری",
				"Distance": 81357.5,
				"Moving Time": 18880
			},
			{
				"Activity Date": "2019-09-17",
				"Activity Name": "سواری صبحگاهی",
				"Activity Type": "سواری",
				"Distance": 74034.796875,
				"Moving Time": 16013
			},
			{
				"Activity Date": "2019-09-18",
				"Activity Name": "سواری صبحگاهی",
				"Activity Type": "سواری",
				"Distance": 82354.3984375,
				"Moving Time": 16583
			},
			{
				"Activity Date": "2019-11-20",
				"Activity Name": "Taiwan, day 1",
				"Activity Type": "سواری",
				"Distance": 94371.203125,
				"Moving Time": 18130
			},
			{
				"Activity Date": "2019-11-21",
				"Activity Name": "Taiwan, day 2, Sun Moon lake",
				"Activity Type": "سواری",
				"Distance": 115457.203125,
				"Moving Time": 21181
			},
			{
				"Activity Date": "2019-11-22",
				"Activity Name": "Taiwan day 3",
				"Activity Type": "سواری",
				"Distance": 80677.8984375,
				"Moving Time": 12403
			},
			{
				"Activity Date": "2019-11-23",
				"Activity Name": "Taiwan day 4",
				"Activity Type": "سواری",
				"Distance": 121866.796875,
				"Moving Time": 26665
			},
			{
				"Activity Date": "2019-11-24",
				"Activity Name": "Taiwan day 5",
				"Activity Type": "سواری",
				"Distance": 107690.703125,
				"Moving Time": 23386
			},
			{
				"Activity Date": "2019-11-25",
				"Activity Name": "Taiwan day 6",
				"Activity Type": "سواری",
				"Distance": 90308.203125,
				"Moving Time": 18331
			}
		];


		var weeklyData = [];
		var dailyData = [];

		var firstDay = am5.time.round(new Date(data[0]["Activity Date"]), "year", 1);
		var total = 0;
		var dateFormatter = am5.DateFormatter.new(root, {});
		var weekdays = ["یکشنبه", "دوشنبه", "سه شنبه", "چهارشنبه", "پنج شنبه", "جمعه", "شنبه"];
		var weekAxisData = [
			{ day: "یکشنبه" },
			{ day: "دوشنبه" },
			{ day: "سه شنبه" },
			{ day: "چهارشنبه" },
			{ day: "پنج شنبه" },
			{ day: "جمعه" },
			{ day: "شنبه" }
		];

		var colorSet = am5.ColorSet.new(root, {});

		// PREPARE DATA
		function prepareDistanceData(data) {
			for (var i = 0; i < 53; i++) {
				weeklyData[i] = {};
				weeklyData[i].distance = 0;
				var date = new Date(firstDay);
				date.setDate(i * 7);
				am5.time.round(date, "week", 1);
				var endDate = am5.time.round(new Date(date), "week", 1);

				weeklyData[i].date = date.getTime();
				weeklyData[i].endDate = endDate.getTime();
			}

			am5.array.each(data, function (di) {
				var date = new Date(di["Activity Date"]);
				var weekDay = date.getDay();
				var weekNumber = am5.utils.getWeek(date);

				if (weekNumber == 1 && date.getMonth() == 11) {
					weekNumber = 53;
				}

				var distance = am5.math.round(di["Distance"] / 1000, 1);

				weeklyData[weekNumber - 1].distance += distance;
				weeklyData[weekNumber - 1].distance = am5.math.round(
					weeklyData[weekNumber - 1].distance,
					1
				);
				total += distance;

				dailyData.push({
					date: date.getTime(),
					day: weekdays[weekDay],
					"Distance": distance,
					title: di["Activity Name"]
				});
			});
		}

		prepareDistanceData(data);

		var div = document.getElementById("chartdiv");

		// Create chart
		// https://www.amcharts.com/docs/v5/charts/radar-chart/
		var chart = root.container.children.push(
			am5radar.RadarChart.new(root, {
				panX: false,
				panY: false,
				wheelX: "panX",
				wheelY: "zoomX",
				innerRadius: am5.percent(20),
				radius: am5.percent(85),
				startAngle: 270 - 170,
				endAngle: 270 + 170
			})
		);

		// add label in the center
		chart.radarContainer.children.push(
			am5.Label.new(root, {
				text:
					"[fontSize:0.8em]In 2019 I cycled:[/]\n[fontSize:1.5em]" +
					Math.round(total) +
					" km[/]",
				textAlign: "center",
				centerX: am5.percent(50),
				centerY: am5.percent(50)
			})
		);

		// Add cursor
		// https://www.amcharts.com/docs/v5/charts/radar-chart/#Cursor
		var cursor = chart.set(
			"cursor",
			am5radar.RadarCursor.new(root, {
				behavior: "zoomX"
			})
		);
		cursor.lineY.set("visible", false);

		// Create axes and their renderers
		// https://www.amcharts.com/docs/v5/charts/radar-chart/#Adding_axes

		// date axis
		var dateAxisRenderer = am5radar.AxisRendererCircular.new(root, {
			minGridDistance: 20
		});

		dateAxisRenderer.labels.template.setAll({
			radius: 30,
			textType: "radial",
			centerY: am5.p50
		});

		var dateAxis = chart.xAxes.push(
			am5xy.DateAxis.new(root, {
				baseInterval: { timeUnit: "week", count: 1 },
				renderer: dateAxisRenderer,
				min: new Date(2019, 0, 1, 0, 0, 0).getTime(),
				max: new Date(2020, 0, 1, 0, 0, 0).getTime()
			})
		);

		// distance axis
		var distanceAxisRenderer = am5radar.AxisRendererRadial.new(root, {
			axisAngle: 90,
			radius: am5.percent(60),
			innerRadius: am5.percent(20),
			inversed: true,
			minGridDistance: 20
		});

		distanceAxisRenderer.labels.template.setAll({
			centerX: am5.p50,
			minPosition: 0.05,
			maxPosition: 0.95
		});

		var distanceAxis = chart.yAxes.push(
			am5xy.ValueAxis.new(root, {
				renderer: distanceAxisRenderer
			})
		);

		distanceAxis.set("numberFormat", "# ' km'");

		// week axis
		var weekAxisRenderer = am5radar.AxisRendererRadial.new(root, {
			axisAngle: 90,
			innerRadius: am5.percent(60),
			radius: am5.percent(100),
			minGridDistance: 20
		});

		weekAxisRenderer.labels.template.setAll({
			centerX: am5.p50
		});

		var weekAxis = chart.yAxes.push(
			am5xy.CategoryAxis.new(root, {
				categoryField: "day",
				renderer: weekAxisRenderer
			})
		);

		// Create series
		// https://www.amcharts.com/docs/v5/charts/radar-chart/#Adding_series
		var distanceSeries = chart.series.push(
			am5radar.RadarColumnSeries.new(root, {
				calculateAggregates: true,
				xAxis: dateAxis,
				yAxis: distanceAxis,
				valueYField: "distance",
				valueXField: "date",
				tooltip: am5.Tooltip.new(root, {
					labelText: "week {valueX}: {valueY}"
				})
			})
		);

		distanceSeries.columns.template.set("strokeOpacity", 0);

		// Set up heat rules
		// https://www.amcharts.com/docs/v5/concepts/settings/heat-rules/
		distanceSeries.set("heatRules", [{
			target: distanceSeries.columns.template,
			key: "fill",
			min: am5.color(0x673ab7),
			max: am5.color(0xf44336),
			dataField: "valueY"
		}]);

		// bubble series is a line series with stroeks hiddden
		// https://www.amcharts.com/docs/v5/charts/radar-chart/#Adding_series
		var bubbleSeries = chart.series.push(
			am5radar.RadarLineSeries.new(root, {
				calculateAggregates: true,
				xAxis: dateAxis,
				yAxis: weekAxis,
				baseAxis: dateAxis,
				categoryYField: "day",
				valueXField: "date",
				valueField: "Distance",
				maskBullets: false
			})
		);

		// only bullets are visible, hide stroke
		bubbleSeries.strokes.template.set("forceHidden", true);

		// add bullet
		var circleTemplate = am5.Template.new({});
		bubbleSeries.bullets.push(function () {
			var graphics = am5.Circle.new(root, {
				fill: distanceSeries.get("fill"),
				tooltipText: "{title}: {value} km"
			}, circleTemplate);
			return am5.Bullet.new(root, {
				sprite: graphics
			});
		});

		// Add heat rule (makes bubbles to be of a various size, depending on a value)
		// https://www.amcharts.com/docs/v5/concepts/settings/heat-rules/
		bubbleSeries.set("heatRules", [{
			target: circleTemplate,
			min: 3,
			max: 15,
			dataField: "value",
			key: "radius"
		}]);

		// set data
		// https://www.amcharts.com/docs/v5/charts/radar-chart/#Setting_data

		distanceSeries.data.setAll(weeklyData);
		weekAxis.data.setAll(weekAxisData);
		bubbleSeries.data.setAll(dailyData);

		bubbleSeries.appear(1000);
		distanceSeries.appear(1000);
		chart.appear(1000, 100);

		// create axis ranges
		var months = [
			"Jan",
			"Feb",
			"Mar",
			"Apr",
			"May",
			"Jun",
			"Jul",
			"Aug",
			"Sep",
			"Oct",
			"Nov",
			"Dec"
		];
		for (var i = 0; i < 12; i++) {
			createRange(months[i], i);
		}

		function createRange(name, index) {
			var axisRange = dateAxis.createAxisRange(
				dateAxis.makeDataItem({ above: true })
			);
			axisRange.get("label").setAll({ text: name });

			var fromTime = new Date(firstDay.getFullYear(), i, 1, 0, 0, 0).getTime();
			var toTime = am5.time.add(new Date(fromTime), "month", 1).getTime();

			axisRange.set("value", fromTime);
			axisRange.set("endValue", toTime);

			// every 2nd color for a bigger contrast
			var fill = axisRange.get("axisFill");
			fill.setAll({
				toggleKey: "active",
				cursorOverStyle: "pointer",
				fill: colorSet.getIndex(index * 2),
				visible: true,
				dRadius: 25,
				innerRadius: -25
			});
			axisRange.get("grid").set("visible", false);

			var label = axisRange.get("label");
			label.setAll({
				fill: am5.color(0xffffff),
				textType: "circular",
				radius: 8,
				text: months[index]
			});

			// clicking on a range zooms in
			fill.events.on("click", function (event) {
				var dataItem = event.target.dataItem;
				if (event.target.get("active")) {
					dateAxis.zoom(0, 1);
				} else {
					dateAxis.zoomToValues(dataItem.get("value"), dataItem.get("endValue"));
				}
			});
		}

	}); // end am5.ready()


	// Pictorial Fraction Chart
	am5.ready(function () {

		// Create root element
		// https://www.amcharts.com/docs/v5/getting-started/#Root_element
		var root = am5.Root.new("pictorial_fraction_chart");


		// Set themes
		// https://www.amcharts.com/docs/v5/concepts/themes/
		root.setThemes([am5themes_Animated.new(root)]);


		// Create chart
		// https://www.amcharts.com/docs/v5/charts/percent-charts/sliced-chart/
		var chart = root.container.children.push(am5percent.SlicedChart.new(root, {
			layout: root.verticalLayout
		}));


		// Create series
		// https://www.amcharts.com/docs/v5/charts/percent-charts/sliced-chart/#Series
		var series = chart.series.push(am5percent.PictorialStackedSeries.new(root, {
			alignLabels: true,
			orientation: "vertical",
			valueField: "value",
			categoryField: "category",
			svgPath:
				"M421.976,136.204h-23.409l-0.012,0.008c-0.19-20.728-1.405-41.457-3.643-61.704l-1.476-13.352H5.159L3.682,74.507 C1.239,96.601,0,119.273,0,141.895c0,65.221,7.788,126.69,22.52,177.761c7.67,26.588,17.259,50.661,28.5,71.548  c11.793,21.915,25.534,40.556,40.839,55.406l4.364,4.234h206.148l4.364-4.234c15.306-14.85,29.046-33.491,40.839-55.406  c11.241-20.888,20.829-44.96,28.5-71.548c0.325-1.127,0.643-2.266,0.961-3.404h44.94c49.639,0,90.024-40.385,90.024-90.024  C512,176.588,471.615,136.204,421.976,136.204z M421.976,256.252h-32c3.061-19.239,5.329-39.333,6.766-60.048h25.234  c16.582,0,30.024,13.442,30.024,30.024C452,242.81,438.558,256.252,421.976,256.252z"
		}));

		series.labelsContainer.set("width", 100);
		series.ticks.template.set("location", 0.6);


		// Set data
		// https://www.amcharts.com/docs/v5/charts/percent-charts/sliced-chart/#Setting_data
		series.data.setAll([
			{ category: "B", value: 40 },
			{ category: "A", value: 60 }
		]);


		// Add legend
		// https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
		chart.set("layout", root.verticalLayout);

		var legend = chart.children.moveValue(am5.Legend.new(root, {
			paddingBottom: 15,
			paddingTop: 15,
			x: am5.percent(50),
			dx: -150,
			centerX: am5.p50
		}), 0);

		legend.markers.template.setAll({ width: 30, height: 30 });
		legend.markerRectangles.template.setAll({
			cornerRadiusBL: 20,
			cornerRadiusBR: 20,
			cornerRadiusTL: 20,
			cornerRadiusTR: 20
		});

		legend.data.setAll(series.dataItems);


		// Play  initial se ries animation
		// https://www.amcharts.com/docs/v5/concepts/animations/#Animation_of_series
		chart.appear(1000, 100);

	}); // end am5.ready()

})();