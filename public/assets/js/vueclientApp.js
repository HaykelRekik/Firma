Vue.prototype.$ROOM_ID = document.querySelector("meta[name='room_id']").getAttribute('content');
var vrc5 = new Vue({

  el: "#panel",

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
      axios.patch('http://127.0.0.1:8000/api/updatetemp', {
        room_id: this.$ROOM_ID,
        maxtemperature: this.maxtemperature,
      })
    },

    updatehumi: function () {
      axios.patch('http://127.0.0.1:8000/api/updatehum', {
        room_id: this.$ROOM_ID,
        maxhumidity: this.maxhumidity,
      })

    },

    test: function () {
      // if (this.chart != null) {
      //   this.chart.destroy();
      // }

    },
    get_1j_temp: function () {
      if (this.tempchart != null) {
        this.tempchart.destroy();
      }

      axios
        .get('http://127.0.0.1:8000/api/getroom24hmesures/' + this.$ROOM_ID)
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

    get_1j_humi: function () {
      if (this.humchart != null) {
        this.humchart.destroy();
      }
      axios
        .get('http://127.0.0.1:8000/api/getroom24hmesures/' + this.$ROOM_ID)
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
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
              }]
            },
            options: {
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
        .catch(error => {
          console.log(error);
          this.errored = true;
        });

    },

  },



  mounted() {
    this.get_1j_temp();

    this.get_1j_humi();

    axios.get('http://127.0.0.1:8000/api/getroomdata/' + this.$ROOM_ID)
      .then(response => (this.roomv = response.data))

    axios.get('http://127.0.0.1:8000/api/getroom/' + this.$ROOM_ID)
      .then(response => (this.roomd = response.data))



  }


});

// ****************************************************************************





var vrc6 = new Vue({
  el: "#content",

  data: {
    temp_title: 'last day',
    humi_title: 'last day',
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
    get_1j_temp: function () {
      this.temp_title = 'last Day';
      if (this.tempchart != null) {
        this.tempchart.destroy();
      }

      axios
        .get('http://127.0.0.1:8000/api/getroom24hmesures/' + this.$ROOM_ID)
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
    get_1j_humi: function () {
      this.humi_title = 'last Day';
      if (this.humchart != null) {
        this.humchart.destroy();
      }
      axios
        .get('http://127.0.0.1:8000/api/getroom24hmesures/' + this.$ROOM_ID)
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
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
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
        .catch(error => {
          console.log(error);
          this.errored = true;
        });

    },
    get_7j_temp: function () {
      this.temp_title = 'last week';
      if (this.tempchart != null) {
        this.tempchart.destroy();
      }

      axios
        .get('http://127.0.0.1:8000/api/get_7j_mesure/' + this.$ROOM_ID)
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

    get_7j_humi: function () {
      this.humi_title = 'last week';
      if (this.humchart != null) {
        this.humchart.destroy();
      }

      axios
        .get('http://127.0.0.1:8000/api/get_7j_mesure/' + this.$ROOM_ID)
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
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
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
        .catch(error => {
          console.log(error);
          this.errored = true;
        });
    },
    get_30j_temp: function () {
      this.temp_title = 'last Mounth';
      if (this.tempchart != null) {
        this.tempchart.destroy();
      }

      axios
        .get('http://127.0.0.1:8000/api/get_30j_mesure/' + this.$ROOM_ID)
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
    get_30j_humi: function () {
      this.humi_title = 'last Mounth';
      if (this.humchart != null) {
        this.humchart.destroy();
      }

      axios
        .get('http://127.0.0.1:8000/api/get_30j_mesure/' + this.$ROOM_ID)
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
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
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
        .catch(error => {
          console.log(error);
          this.errored = true;
        });
    },

  },

  mounted() {

  }

});