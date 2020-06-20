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

      getsensors(room_id) {
      window.location = 'RoomsSensorsUser/'+ room_id ;
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
    
    
  }

});
