<!doctype html>
<head>
	<title>Line Chart</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.1"></script>
	<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom@0.7.7"></script>
	<script src="https://cdn.jsdelivr.net/npm/hammerjs@2.0.8"></script>
	<script src="https://unpkg.com/vue"></script>
    <script src="https://unpkg.com/vuex"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

</head>

<body>
	<div style="width:75%;">
        <button onclick="resetZoom()">Reset Zoom</button>
        <canvas id="canvas"></canvas>
	</div>
	
	<div class="col-xl-6 col-lg-7">
		<div class="card mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary">Temperature Chart: @{{temp_title}}</h6>
				<div class="dropdown no-arrow">
					<a class="dropdown-toggle btn btn-primary btn-sm" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Select Periode </a>
					<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(74px, 31px, 0px);">
						<a class="dropdown-item" @click="get_1j_temp()"  >Today</a>
						<a class="dropdown-item" @click="get_7j_temp()"  >Week</a>
						<a class="dropdown-item" @click="get_30j_temp()" >Month</a>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="chart-area">
					<div class="chartjs-size-monitor">
						<div class="chartjs-size-monitor-expand">
							<div class=""></div>
						</div>
						<div class="chartjs-size-monitor-shrink">
							<div class=""></div>
						</div>
					</div>
					<canvas id="temperatureChart" style="display: block; width: 499px; height: 300px;" width="499" height="320" class="chartjs-render-monitor"></canvas>
				</div>
			</div>
		</div>
	</div>

	<script>
        //based on:
//https://github.com/chartjs/chartjs-plugin-zoom/blob/master/samples/zoom-time.html
var timeFormat = "MM/DD/YYYY HH:mm";
function randomScalingFactor() {
  return Math.round(Math.random() * 100 * (Math.random() > 0.5 ? -1 : 1));
}
function randomColorFactor() {
  return Math.round(Math.random() * 255);
}
function randomColor(opacity) {
  return (
    "rgba(" +
    randomColorFactor() +
    "," +
    randomColorFactor() +
    "," +
    randomColorFactor() +
    "," +
    (opacity || ".3") +
    ")"
  );
}
function newDate(days) {
  return moment()
    .add(days, "d")
    .toDate();
}
function newDateString(days) {
  return moment()
    .add(days, "d")
    .format(timeFormat);
}
function newTimestamp(days) {
  return moment()
    .add(days, "d")
    .unix();
}
function resetZoom() {
  window.myLine.resetZoom();
}
var config = {
  type: "line",
  data: {
    labels: [
      newDate(0),
      newDate(1),
      newDate(2),
      newDate(3),
      newDate(4),
      newDate(5),
      newDate(6)
    ], // Date Objects
    datasets: [
      {
        label: "My First dataset",
        data: [
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor()
        ],
        fill: false,
        borderDash: [5, 5]
      },
      {
        label: "My Second dataset",
        data: [
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor()
        ]
      },
      {
        label: "Dataset with point data",
        data: [
          {
            x: newDateString(0),
            y: randomScalingFactor()
          },
          {
            x: newDateString(5),
            y: randomScalingFactor()
          },
          {
            x: newDateString(7),
            y: randomScalingFactor()
          },
          {
            x: newDateString(15),
            y: randomScalingFactor()
          }
        ],
        fill: false
      }
    ]
  },
  options: {
    responsive: true,
    title: {
      display: true,
      text: "Chart.js Time Scale"
    },
    scales: {
      xAxes: [
        {
          type: "time",
          time: {
            format: timeFormat,
            // round: 'day'
            tooltipFormat: "ll HH:mm"
          },
          scaleLabel: {
            display: true,
            labelString: "Date"
          },
          ticks: {
            maxRotation: 0
          }
        }
      ],
      yAxes: [
        {
          scaleLabel: {
            display: true,
            labelString: "value"
          }
        }
      ]
    },
    pan: {
    
     
      
    },
    zoom: {
      enabled: true,
      
      mode: "x",
     
    }
  }
};
config.data.datasets.forEach(function(dataset) {
  dataset.borderColor = randomColor(0.4);
  dataset.backgroundColor = randomColor(0.5);
  dataset.pointBorderColor = randomColor(0.7);
  dataset.pointBackgroundColor = randomColor(0.5);
  dataset.pointBorderWidth = 1;
});
window.onload = function() {
  var ctx = document.getElementById("canvas").getContext("2d");
  window.myLine = new Chart(ctx, config);
};
	</script>
</body>

</html>