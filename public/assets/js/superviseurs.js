var one = new Vue({

  el: "#adduser",

  data: {
    firstname: [],
    lastname: [],
    email: [],
    phone: [],
    password: []

  },

  methods: {

    creatuser: function () {
      axios.post('api/user', {

        Firstname: this.firstname,
        Lastname: this.lastname,
        email: this.email,
        phone: this.phone,
        type: this.type,
        password: this.password
      })
    },


  },

  mounted() {


  }


});

// **************************************************************


var two = new Vue({

  el: "#getusers",
  data: {
    results: [],
    firstname: [],
    lastname: [],
    email: [],
    phone: [],
    password: [],
    userrooms: []

  },

  methods: {
    passid: function (id) { 
      three.userid = id ;
      vu4.userid = id ;
      
    },

    visualize_user_rooms: function (id) 
    { 
      AddUerRoom.user_id = id ;
      axios
      .get('api/getrooms/' + id)
      .then(response => (UserRooms.userrooms = response.data))
    
    }
  },

  mounted() {
    axios
      .get('api/getusers')
      .then(response => (this.results = response.data))
  }


});


// ******************************************************************

var three = new Vue({

  el: "#edituser",

  data: {
    userid: null,
    Firstname: null,
    Lastname: null,
    email: null,
    phone: null,
    password: null

  },

  methods: {

    edituser: function(){
      axios.patch('api/patchuser', {

        id: this.userid,
        Firstname: this.Firstname,
        Lastname: this.Lastname,
        email: this.email,
        phone: this.phone,
        type: this.type,
        password: this.password

      })


    }
    
      

  },

  mounted() {

  


  }


});


// *************************************************************************
var vu4 = new Vue({

  el: "#deleteuser",

  data: {
    userid: null,
  },

  methods: {

    removeuser: function () {
      axios.delete('api/deleteuser/' + this.userid)
      alert('you have successfully deleted the user ' + this.userid);

    }

  },

  mounted() {
  }


});



var UserRooms = new Vue({

  el: "#userrooms",

  data: {
    userrooms: null,
  },

  methods: {
    passRoomId: function (id) { 
      DeleteUserRooms.roomid = id ;
      EditUserRoom.roomid = id ;

    },

    passUserId: function (id) { 
      AddUerRoom.user_id = id ;

    },

    get_user_sensors: function (room_id) { 
       
      window.location = 'roomssensors/'+ room_id ;


    },
    
  },

  mounted() {
  }


});


var DeleteUserRooms = new Vue({

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


var AddUerRoom = new Vue({

  el: "#addnewroom",

  data: {
    name: [],
    maxtemperature: -100,
    maxhumidity: -100,
    user_id: null

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

var EditUserRoom = new Vue({

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


