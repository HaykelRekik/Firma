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

  },

  methods: {
    passid: function (id) { 
      three.userid = id ;
      vu4.userid = id ;
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

