var vr1 = new Vue({

  el: "#addnewroom",

  data: {
    name: [],
    maxtemperature: -100,
    maxhumidity: -100,
    user_id: []

  },

  methods: {

    creatroom: function () {
      axios.post('api/createroom', {

        name: this.name,
        maxtemperature: this.maxtemperature,
        maxhumidity: this.maxhumidity,
        user_id: this.user_id,
      })
    },


  },

  mounted() {


  }


});


//   ****************************************************************


var vr2 = new Vue({

  el: "#getallrooms",
  data: {
    rooms: [],
    name: [],
    maxtemperature: [],
    maxhumidity: [],
    user_id: []

  },

  methods: {

    passsid: function (room_id) {
      vr3.roomid = room_id;
      vr4.roomid = room_id;
    }
  },

  mounted() {
    axios
      .get('api/getallrooms')
      .then(response => (this.rooms = response.data))
  }


});




//   ****************************************************************

var vr3 = new Vue({

  el: "#editroom",

  data: {
    roomid: null,
    name: null,
    maxtemperature: null,
    maxhumidity: null

  },

  methods: {
    editroom: function () {
      axios.patch('api/updateroom', {
        room_id: this.roomid,
        newname: this.name,
        maxtemperature: this.maxtemperature,
        maxhumidity: this.maxhumidity,

      })
    }


  },

  mounted() {
  }

});


// *************************************************************************************
var vr4 = new Vue({

  el: "#deleteroom",

  data: {
    roomid: null,

  },

  methods: {
    
    removeroom: function () {
      axios.delete('api/deleteroom/' + this.roomid)
      alert('you have successfully deleted the room  ' + this.roomid);

    }

  },

  mounted() {
  }

});




// ***********************************************************************************************
// ***********************************************************************************************
// *********************************** SENSOR VUE ************************************************
// ***********************************************************************************************
// ***********************************************************************************************

var vs1 = new Vue({

  el: "#addsensor",

  data: {
    Reference: 'unknown',
    room_id: -1,
    type: []

  },

  methods: {

    creatsensor: function () {
      axios.post('api/createsensor', {

        reference: this.Reference,
        type: this.type,
        room_id: this.room_id,
      })
    },


  },

  mounted() {


  }


});



// *****************************************************************************
var vs2 = new Vue({

  el: "#getallsensors",
  data: {
    sensors: [],
  },

  methods: {

    passsid: function (sensor_id) {
      vs3.sensorid = sensor_id;
      vs4.sensorid = sensor_id;
    }
  },

  mounted() {
    axios
      .get('api/getallsensors')
      .then(response => (this.sensors = response.data))
  }


});


// ***************************************************************************************

var vs3 = new Vue({

  el: "#editsensor",

  data: {
    sensorid: null,
    Reference: 'unknown',
    room_id: -1,
    type: []

  },

  methods: {
    editsensor: function () {
      axios.patch('api/editsensor', {
        sensor_id: this.sensorid,
        reference: this.Reference,
        type: this.type,
        room_id: this.room_id,

      })
    }


  },

  mounted() {
  }

});

var vs4 = new Vue({

  el: "#deletesensor",

  data: {
    sensorid: null,

  },

  methods: {

      removesensor: function () {
        axios.delete('api/deletesensor/' + this.sensorid)
        alert('you have successfully deleted the sensor  ' + this.sensorid);

    }


  },

  mounted() {
  }

});


