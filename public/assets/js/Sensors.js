Vue.prototype.$ROOM_ID = document.querySelector("meta[name='room_id']").getAttribute('content');
var AddSensor = new Vue({

  el: "#addsensor",

  data: {
    max_value: [],
    type: [],
  },

  methods: {

    creatsensor: function () {
      axios.post('http://127.0.0.1:8000/api/createsensor', {
        max_value: this.max_value,
        type: this.type,
        room_id: this.$ROOM_ID,
      })
    },
  },
});


var AllRoomSensors = new Vue({
  el: "#getallsensors",
  data: {

    sensors: [],
    daychart: [],
    dates: [],
    value: [],
    errored: [],
    fromdate: [],
    todate: []
  },

  methods: {
 
    get_1j_pdf: function (sensor_id){
      axios({
        url: 'http://127.0.0.1:8000/api/sensorPdf/' + sensor_id + '/1',
        method: 'GET',
        responseType: 'blob', // important
      }).then((response) => {
        const url = window.URL.createObjectURL(new Blob([response.data]));
        const link = document.createElement('a');
        link.href = url;
        link.setAttribute('download', 'file.pdf');
        document.body.appendChild(link);
        link.click();
      });

    },
    get_7j_pdf: function (sensor_id){

       axios({
        url: 'http://127.0.0.1:8000/api/sensorPdf/'+sensor_id+'/7',
        method: 'GET',
        responseType: 'blob', // important
      }).then((response) => {
        const url = window.URL.createObjectURL(new Blob([response.data]));
        const link = document.createElement('a');
        link.href = url;
        link.setAttribute('download', 'file.pdf');
        document.body.appendChild(link);
        link.click();
      });
    },
    get_30j_pdf: function (sensor_id){

       axios({
        url: 'http://127.0.0.1:8000/api/sensorPdf/'+sensor_id+'/30',
        method: 'GET',
        responseType: 'blob', // important
      }).then((response) => {
        const url = window.URL.createObjectURL(new Blob([response.data]));
        const link = document.createElement('a');
        link.href = url;
        link.setAttribute('download', 'file.pdf');
        document.body.appendChild(link);
        link.click();
      });

    },
    get_total_pdf: function (sensor_id){
       axios({
        url: 'http://127.0.0.1:8000/api/sensorPdftotal/'+sensor_id,
        method: 'GET',
        responseType: 'blob', // important
      }).then((response) => {
        const url = window.URL.createObjectURL(new Blob([response.data]));
        const link = document.createElement('a');
        link.href = url;
        link.setAttribute('download', 'file.pdf');
        document.body.appendChild(link);
        link.click();
      });

    },

    get_custom_pdf: function (sensor_id){
       axios({
        url: 'http://127.0.0.1:8000/api/sensorPdfcustom/' + sensor_id + '/' + this.fromdate + '/' + this.todate ,
        method: 'GET',
        responseType: 'blob', // important
      }).then((response) => {
        const url = window.URL.createObjectURL(new Blob([response.data]));
        const link = document.createElement('a');
        link.href = url;
        link.setAttribute('download', 'file.pdf');
        document.body.appendChild(link);
        link.click();
      });


    },

    passsid: function (sensor_id,maxval) {
      DeleteSensor.sensor_id = sensor_id;
      EditSensor.sensor_id = sensor_id;
      EditSensor.max_value = maxval;
    },


    get_1j_values: function (sensor_id) {
      ShowChart.sensor_id = sensor_id;
    
      axios
        .get('http://127.0.0.1:8000/api/get_24h_value/' + sensor_id)
        .then(response => {
          this.dates = response.data.map(data => {
            return data.created_at;
          });

          this.value = response.data.map(data => {
            return data.value;
          });

          var ctx = document.getElementById('myChart').getContext('2d');
          this.daychart = new Chart(ctx, {
            type: 'line',
            data: {
              labels: this.dates,
              datasets: [{
                label: 'values',
                data: this.value,
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
              responsive: true,
              scales: {
                xAxes: [{
                  display: false,
                }]
              },

              plugins: {
                zoom: {

                  pan: {
                    enabled: true,
                    mode: 'x',
                  },
                  zoom: {
                    enabled: true,
                    mode: 'x',
                  }
                },
              },
            }
          });

        })
        .then(error => {
          console.log(error);
          this.errored = true;
        });
    },

  },

  mounted() {
    axios
      .get('http://127.0.0.1:8000/api/roomsensors/' + this.$ROOM_ID)
      .then(response => (this.sensors = response.data))
  }
});

var DeleteSensor = new Vue({

  el: "#deletesensor",

  data: {
    sensor_id: null,
  },

  methods: {

    removesensor: function () {
      axios.delete('http://127.0.0.1:8000/api/deletesensor/' + this.sensor_id)
      alert('you have successfully deleted the sensor ' + this.sensor_id);

    }

  },

  mounted() {
  }


});

var EditSensor = new Vue({

  el: "#editsensor",

  data: {
    sensor_id: null,
    max_value: null,
    type: null,
  },

  methods: {

    editsensor: function () {
      axios.patch('http://127.0.0.1:8000/api/editsensor', {
        sensor_id: this.sensor_id,
        max_value: this.max_value,
        type: this.type,
      })
    },

    updatevalue: function () {
      axios.patch('http://127.0.0.1:8000/api/updatevalue', {
        sensor_id: this.sensor_id,
        max_value: this.max_value,
      })

    },
  },
});



var ShowChart = new Vue({

  el: "#showchart",

  data: {
    sensor_id: null,
    title: 'Last Day',
    tempchart: [],
    dates: [],
    value: [],
    errored: []
  },

  methods: {
    get_1j_values: function () {
      this.title = 'Last Day';

      axios
        .get('http://127.0.0.1:8000/api/get_24h_value/' + this.sensor_id)
        .then(response => {
          this.dates = response.data.map(data => {
            return data.created_at;
          });

          this.value = response.data.map(data => {
            return data.value;
          });

          var ctx = document.getElementById('myChart').getContext('2d');
          this.tempchart = new Chart(ctx, {
            type: 'line',
            data: {
              labels: this.dates,
              datasets: [{
                label: 'values',
                data: this.value,
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
              responsive: true,
              scales: {
                xAxes: [{
                  display: false,
                }]
              },

              plugins: {
                zoom: {

                  pan: {
                    enabled: true,
                    mode: 'x',
                  },
                  zoom: {
                    enabled: true,
                    mode: 'x',
                  }
                },
              },
            }
          });

        })
        .then(error => {
          console.log(error);
          this.errored = true;
        });
    },



    get_7j_values: function () {
      this.title = 'Last 7 Day';
      axios
        .get('http://127.0.0.1:8000/api/get_7j_value/' + this.sensor_id)
        .then(response => {
          this.dates = response.data.map(data => {
            return data.created_at;
          });

          this.value = response.data.map(data => {
            return data.value;
          });

          var ctx = document.getElementById('myChart').getContext('2d');
          this.tempchart = new Chart(ctx, {
            type: 'line',
            data: {
              labels: this.dates,
              datasets: [{
                label: 'values',
                data: this.value,
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
              responsive: true,
              scales: {
                xAxes: [{
                  display: false,
                }]
              },

              plugins: {
                zoom: {

                  pan: {
                    enabled: true,
                    mode: 'x',
                  },
                  zoom: {
                    enabled: true,
                    mode: 'x',
                  }
                },
              },
            }
          });

        })
        .then(error => {
          console.log(error);
          this.errored = true;
        });
    },



    get_30j_values: function () {
      this.title = 'Last 30 Day';

      axios
        .get('http://127.0.0.1:8000/api/get_30j_value/' + this.sensor_id)
        .then(response => {
          this.dates = response.data.map(data => {
            return data.created_at;
          });

          this.value = response.data.map(data => {
            return data.value;
          });

          var ctx = document.getElementById('myChart').getContext('2d');
          this.tempchart = new Chart(ctx, {
            type: 'line',
            data: {
              labels: this.dates,
              datasets: [{
                label: 'values',
                data: this.value,
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
              responsive: true,
              scales: {
                xAxes: [{
                  display: false,
                }]
              },

              plugins: {
                zoom: {

                  pan: {
                    enabled: true,
                    mode: 'x',
                  },
                  zoom: {
                    enabled: true,
                    mode: 'x',
                  }
                },
              },
            }
          });

        })
        .then(error => {
          console.log(error);
          this.errored = true;
        });
    },

  },
});




