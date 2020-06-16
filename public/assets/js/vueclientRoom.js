Vue.prototype.$userId = document.querySelector("meta[name='user-id']").getAttribute('content');


var vrc1 = new Vue({

    el: "#addnewroom",
  
    data: {
      name: [],
      maxtemperature: -100,
      maxhumidity: -100,
      user_id: []
  
    },
  
    methods: {
  
      creatroom: function (id) {
        axios.post('api/createroom', {
  
          name: this.name,
          maxtemperature: this.maxtemperature,
          maxhumidity: this.maxhumidity,
          user_id: id,
        })
      },
    }
  });



//   *************************************************************************************************
var vrc2 = new Vue({

    el: "#getuserrooms",
    data: {
      rooms: []
    },
    methods: {
      passid: function (id) { 
        vrc3.roomid = id ;
        vrc4.roomid = id ;
      },

      getdash(room_id) {
        axios
        .get('http://127.0.0.1:8000/api/dash/' + room_id)
        .then(res => {
          console.log("faq");
      })
       }

    },
  
    mounted() {
      axios
        .get('api/getrooms/' + this.$userId)
        .then(response => (this.rooms = response.data))
    }
  
  
  });

  // *************************************************************************
var vrc3 = new Vue({

  el: "#deleteroomc",

  data: {
    roomid: null
  },

  methods: {

    deleteroom: function () {
      axios.delete('api/deleteroom/' + this.roomid)
      alert('you have successfully deleted the room ' + this.roomid);
    }

  },

  mounted() {
  }


});

//   ****************************************************************

var vrc4 = new Vue({

  el: "#editeroom",

  data: {
    roomid: null,
    name: null
  },

  methods: {
    editroom: function () {
      axios.patch('api/updatename', {
        room_id: this.roomid,
        newname: this.name,
      })
    }


  },

  mounted() {
  }

});

// *************************************************************************

var vrc6 = new Vue({

  el: "#tempchart",

  data: {
    chart: null,
    dates: [],
    temps: [],
    errored: false
  },

  methods: {
    getData: function () {
      // if (this.chart != null) {
      //   this.chart.destroy();
      // }
      alert("hello from getdata");
      axios
        .get('api/getroom5mesures/1')
        .then(response => {
          this.dates = response.data.map(data => {
            return data.created_at;
          });

          this.temps = response.data.map(data => {
            return data.temperature;
          });

          var ctx = document.getElementById('myChart');
          this.chart = new Chart(ctx, {
            type: 'line',
            data: {
              labels: this.dates,
              datasets: [
                {
                  label: 'Avg. Temp',
                  backgroundColor: 'rgba(54, 162, 235, 0.5)',
                  borderColor: 'rgb(54, 162, 235)',
                  fill: false,
                  data: this.temps
                }
              ]
            },
            options: {
              title: {
                display: true,
                text: 'Temperature with Chart.js'
              },
              tooltips: {
                callbacks: {
                  label: function (tooltipItem, data) {
                    var label = data.datasets[tooltipItem.datasetIndex].label || '';

                    if (label) {
                      label += ': ';
                    }

                    label += Math.floor(tooltipItem.yLabel);
                    return label + '°F';
                  }
                }
              },
              scales: {
                xAxes: [
                  {
                    type: 'time',
                    time: {
                      unit: 'hour',
                      displayFormats: {
                        hour: 'M/DD @ hA'
                      },
                      tooltipFormat: 'MMM. DD @ hA'
                    },
                    scaleLabel: {
                      display: true,
                      labelString: 'Date/Time'
                    }
                  }
                ],
                yAxes: [
                  {
                    scaleLabel: {
                      display: true,
                      labelString: 'Temperature (°F)'
                    },
                    ticks: {
                      callback: function (value, index, values) {
                        return value + '°F';
                      }
                    }
                  }
                ]
              }
            }
          });
        })
        .catch(error => {
          console.log(error);
          this.errored = true;
        })
    }
  }

});
