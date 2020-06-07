
var vrc5 = new Vue({

  el: "#testelem",

  data: {
    tempchart: null,
    humchart: null,
    dates: [],
    temps: [],
    humid: [],
    roomv: [],
    roomd: [],
    maxhumidity: [],
    maxtemperature: []
  },

  methods: {
    updatetemp: function () {
      axios.patch('api/updatetemp', {
        room_id: 1,
        maxtemperature: this.maxtemperature,
      })
    },

    updatehumi: function () {
      axios.patch('api/updatehum', {
        room_id: 1,
        maxhumidity: this.maxhumidity,
      })

    },

    test: function () {
      // if (this.chart != null) {
      //   this.chart.destroy();
      // }

    }
 
  },

  mounted() {
    axios.get('api/getroomdata/1')
      .then(response => (this.roomv = response.data))

    axios.get('api/getroom/1')
      .then(response => (this.roomd = response.data))

// ************************************************************
      axios
      .get('api/getroom5mesures/1')
      .then(response => {
        this.dates = response.data.map(data => {
          return data.created_at;
        });

        this.temps = response.data.map(data => {
          return data.temperature;
        });

        

        var ctx = document.getElementById('temperatureChart').getContext('2d');
        this.tempchart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: this.dates,
                datasets: [{
                    label: 'temperature',
                    data: this.temps,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                       
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                       
                    ],
                    borderWidth: 1
                }]
            },
            options: {
            }
        });
      })
      .catch(error => {
        console.log(error);
        this.errored = true;
      });


  // ************************************************************
  axios
  .get('api/getroom5mesures/1')
  .then(response => {
    this.dates = response.data.map(data => {
      return data.created_at;
    });

    this.humid = response.data.map(data => {
      return data.humidity;
    });

    var ctx = document.getElementById('humiditychart').getContext('2d');
    this.humchart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: this.dates,
            datasets: [{
                label: 'humidity',
                data: this.humid,
                backgroundColor:'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
          responsive: true,
        }
    });
  })
  .catch(error => {
    console.log(error);
    this.errored = true;
  });


  }

});

// ****************************************************************************



// ****************************************************************************
// var ctx = document.getElementById('myAreaChart').getContext('2d');
// this.chart = new Chart(ctx, {
//   // The type of chart we want to create
//   type: 'line',

//   // The data for our dataset
//   data: {
//     labels: ['jenuary', 'February', 'March', 'April', 'May', 'June', 'July'],
//     datasets: [{
//       label: 'My First dataset',
//       backgroundColor: 'rgb(255, 99, 132)',
//       borderColor: 'rgb(255, 99, 132)',
//       data: [0, 10, 5, 2, 20, 30, 45]
//     }]
//   },

//   // Configuration options go here
//   options: {}
// });
